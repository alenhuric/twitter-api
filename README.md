<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## X/Twitter API Laravel Project

This Laravel application provides an API endpoint to retrieve recent tweets from a specified Twitter account using Twitter's v2 API.

## Features

- Fetches recent tweets from a given Twitter username
- Uses Laravel and Guzzle for making API requests
- Returns tweets in JSON format

## Installation
- Clone the repository:
git clone https://github.com/alenhuric/twitter-api.git
cd twitter-api
- Install dependencies:
composer install
Run the Laravel development server:
php artisan serve

## Usage
- Send a GET request to the following endpoint to retrieve recent tweets:
GET http://127.0.0.1:8000/api/tweets