<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwitterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TwitterController::class, 'getTweets']);