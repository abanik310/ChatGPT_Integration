<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenAiController;

Route::get('/', function () {
    return view('login');
});

Route::post('/check_login', ['as' => 'check_login', 'uses' => '\App\Http\Controllers\userController@check_login']);
Route::get('/welcome', ['as' => 'welcome', 'uses' => '\App\Http\Controllers\userController@welcome']);

Route::get('/open_ai', ['as' => 'login', 'uses' => '\App\Http\Controllers\OpenAiController@index']);
