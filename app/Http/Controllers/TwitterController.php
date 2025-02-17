<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;

class TwitterController extends Controller
{
    public function getTweets(Request $request)
    {
        $bearerToken = 'AAAAAAAAAAAAAAAAAAAAALTTyAEAAAAAsIEq50vTohW%2BGI8oTfQ%2BAMi0z3c%3DJtEe0l3LCp3mB2jZfBWPht2qcIZOKlwaDgzE8GtRPeiGhKIBWV';

        $baseUrl = 'https://api.twitter.com/2';

        $username = 'alen_developer';
        $cacheKey = "tweets:$username";

        $tweets = Cache::get($cacheKey);

        if (!$tweets) {
            $client = new Client();

            try {
                $userResponse = $client->get("$baseUrl/users/by/username/$username", [
                    'headers' => ['Authorization' => 'Bearer ' . $bearerToken,],
                ]);

                $userData = json_decode($userResponse->getBody(), true);
                $userId = $userData['data']['id'];

                $tweetsResponse = $client->get("$baseUrl/users/$userId/tweets", [
                    'headers' => ['Authorization' => 'Bearer ' . $bearerToken,],
                    'query' => [
                        'max_results' => 20,
                        'tweet.fields' => 'created_at,text',
                    ],
                ]);

                $tweets = json_decode($tweetsResponse->getBody(), true)['data'] ?? [];

                Cache::put($cacheKey, $tweets, now()->addMinutes(15));

            } catch (RequestException $e) {
                if ($e->getResponse() && $e->getResponse()->getStatusCode() == 429) {
                    $resetTime = $e->getResponse()->getHeader('x-rate-limit-reset')[0] ?? null;

                    if ($resetTime) {
                        $waitMinutes = ceil(($resetTime - time()) / 60);
                        $errorMessage = "The X API has a request limit. Please try again in about $waitMinutes minutes.";
                    } else {
                        $errorMessage = "The X API has a request limit. Please try again later.";
                    }
                } else {
                    $errorMessage = "An error occurred while fetching tweets. Please try again later.";
                }

                if ($request->wantsJson()) {
                    return response()->json(['error' => $errorMessage], 500);
                }

                return view('tweets.index', ['error' => $errorMessage]);
            }
        }

        if ($request->wantsJson()) {
            return response()->json($tweets);
        }

        return view('tweets.index', compact('tweets'));
    }
}
