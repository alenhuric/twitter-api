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
            width: 65%;
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
            cursor: pointer;
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

        .tweet-text {
            font-size: 16px;
            line-height: 1.5;
            color: #14171a;
            margin-top: 8px;
        }

        .tweet-timestamp {
            font-size: 12px;
            color: #657786;
            text-align: left;
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

        .vue-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            width: 60px;
            height: 60px;
            background-color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .vue-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .vue-btn svg {
            width: 40px;
            height: 40px;
            transition: transform 0.2s ease-in-out;
        }

        .vue-btn:hover svg {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <h1>Recent tweets from the alen_developer X account</h1>

    <p class="description">
    This page showcases a Laravel application that retrieves recent tweets from the X API and displays them with a Blade-powered frontend.
    </p>

    <div class="container">
        @if(isset($error))
            <p class="error">Error: {{ $error }}</p>
        @elseif(count($tweets) > 0)
            @foreach($tweets as $tweet)
            <div class="tweet" onclick="window.open('https://twitter.com/alen_developer/status/{{ $tweet['id'] }}', '_blank')">
                    <div class="tweet-header">
                        <div class="user-info">
                            <img src="https://abs.twimg.com/sticky/default_profile_images/default_profile_400x400.png" alt="Profile Image" class="profile-img">
                            <div class="user-details">
                                <span class="user-name">Alen Huric</span>
                                <span class="user-handle">@alen_developer</span>
                            </div>
                        </div>
                    </div>

                    <p class="tweet-text">{{ $tweet['text'] }}</p>

                    <div class="tweet-timestamp">
                        {{ \Carbon\Carbon::parse($tweet['created_at'])->timezone('America/New_York')->format('g:i A \· M j, Y') }}
                    </div>
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

    <a href="https://x-api-vue.alenhuric.com" class="vue-btn" target="_blank">
        <svg viewBox="0 0 261.76 226.69" xmlns="http://www.w3.org/2000/svg">
            <path d="M161.096.001l-30.224 52.35L100.647.002H.003l130.877 226.687L261.76.001z" fill="#41b883"/>
            <path d="M161.096.001l-30.224 52.35L100.647.002H52.346l78.526 136.01L209.398.001z" fill="#34495e"/>
        </svg>
    </a>
</body>
</html>