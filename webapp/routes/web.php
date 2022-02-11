<?php

use App\Http\Middleware\ProfileJsonResponse;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/import', 'ContactController@store')->middleware(ProfileJsonResponse::class);
});
