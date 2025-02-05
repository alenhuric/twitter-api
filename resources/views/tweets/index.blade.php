<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X API</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            color: #1d9bf0;
            text-align: center;
            margin-top: 20px;
        }

        .description {
            font-size: 14px;
            color: #657786;
            text-align: center; 
            margin: 0 auto; 
            width: 80%;
            margin-bottom: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .tweet {
            background-color: #fff;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.2s ease-in-out;
        }

        .tweet:hover {
            background-color: #f7f9fa;
        }

        .tweet-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #e1e8ed;
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: bold;
            color: #14171a;
        }

        .user-handle {
            font-size: 14px;
            color: #657786;
        }

        .tweet-info {
            font-size: 12px;
            color: #657786;
        }

        .tweet-text {
            font-size: 16px;
            line-height: 1.5;
            color: #14171a;
            margin-top: 8px;
        }

        .error {
            color: red;
            text-align: center;
            font-size: 16px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #657786;
        }

        .footer a {
            color: #1d9bf0;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .github-logo {
            width: 20px;
            height: 20px;
            margin-left: 5px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <h1>Recent tweets from the alen_developer X account</h1>

    <p class="description">
    This page showcases a Laravel application hosted under the subdomain api.alenhuric.com,<br />  which fetches posts using the X API and displays them with a Blade-powered frontend. 
    </p>

    <div class="container">
        @if(isset($error))
            <p class="error">Error: {{ $error }}</p>
        @elseif(count($tweets) > 0)
            @foreach($tweets as $tweet)
                <div class="tweet">
                    <div class="tweet-header">
                        <div class="user-info">
                            <img src="https://abs.twimg.com/sticky/default_profile_images/default_profile_400x400.png" alt="Profile Image" class="profile-img">
                            <div class="user-details">
                                <span class="user-name">Alen Huric</span>
                                <span class="user-handle">@alen_developer</span>
                            </div>
                        </div>
                        <span class="tweet-info">{{ \Carbon\Carbon::parse($tweet['created_at'])->diffForHumans() }}</span>
                    </div>

                    <p class="tweet-text">{{ $tweet['text'] }}</p>
                </div>
            @endforeach
        @else
            <p>No tweets available...</p>
        @endif
    </div>

    <div class="footer">
        <p>Check out the source code on 
            <a href="https://github.com/alenhuric/twitter-api" target="_blank">
                GitHub.
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Octicons-mark-github.svg" alt="GitHub Logo" class="github-logo">
            </a>
        </p>
    </div>
</body>
</html>
