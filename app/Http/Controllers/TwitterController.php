<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TwitterController extends Controller
{
    public function getTweets()
    {
        $bearerToken = 'AAAAAAAAAAAAAAAAAAAAALTTyAEAAAAAsIEq50vTohW%2BGI8oTfQ%2BAMi0z3c%3DJtEe0l3LCp3mB2jZfBWPht2qcIZOKlwaDgzE8GtRPeiGhKIBWV';

        $baseUrl = 'https://api.twitter.com/2';

        $username = 'alen_developer';

        $client = new Client();

        try {
            $userResponse = $client->get("$baseUrl/users/by/username/$username", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $bearerToken,
                ],
            ]);

            $userData = json_decode($userResponse->getBody(), true);
            $userId = $userData['data']['id'];

            $tweetsResponse = $client->get("$baseUrl/users/$userId/tweets", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $bearerToken,
                ],
                'query' => [
                    'max_results' => 10,
                    'tweet.fields' => 'created_at,text',
                ],
            ]);

            $tweets = json_decode($tweetsResponse->getBody(), true);

            return response()->json($tweets);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
