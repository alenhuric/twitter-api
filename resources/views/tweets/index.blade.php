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

        p1 {
            display: block; 
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
            border-bottom: 1px solid #e6ecf0;
            padding: 15px 0;
            display: flex;
            flex-direction: column;
        }

        .tweet:last-child {
            border-bottom: none;
        }

        .tweet-header {
            margin-bottom: 10px;
        }

        .tweet-info {
            font-size: 14px;
            color: #657786;
        }

        .tweet-text {
            font-size: 16px;
            line-height: 1.5;
            margin-top: 10px;
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

    <p1>
    This page is powered by a Laravel application hosted on the subdomain api.alenhuric.com under my Hostinger account.<br />
    The app fetches recent tweets using the Twitter API and is integrated into my personal portfolio.<br />
    </p1>

    <div class="container">
        @if(isset($error))
            <p class="error">Error: {{ $error }}</p>
        @elseif(count($tweets) > 0)
            @foreach($tweets as $tweet)
                <div class="tweet">
                    <div class="tweet-header">
                        <p><strong>alen_developer</strong> @alen_developer</p>
                        <p class="tweet-info">{{ $tweet['created_at'] }}</p>
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
