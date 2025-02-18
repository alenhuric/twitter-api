<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## X API Post Service

This Laravel application provides an API endpoint to retrieve recent posts from a specified X (formerly Twitter) account using the X API. It features a Blade view frontend for displaying posts and also serves as the backend for a [Vue.js](https://https://x-api-vue.alenhuric.com) application. The project is deployed on a Hostinger subdomain via SFTP with FileZilla.

## Features

-   Fetches recent posts from a specified X account
-   Uses Laravel and Guzzle to interact with the X API
-   Returns posts in JSON format via a REST API
-   Includes a Blade frontend for direct viewing
-   Serves as the backend for a Vue.js application
-   Implements caching to reduce API requests and avoid rate limits

## Installation

-   Clone the repository:
    git clone https://github.com/alenhuric/twitter-api.git
    cd twitter-api
-   Install dependencies:
    composer install
    Run the Laravel development server:
    php artisan serve

## Usage

-   Send a GET request to the following endpoint to retrieve recent tweets:
    GET http://127.0.0.1:8000/api/tweets
