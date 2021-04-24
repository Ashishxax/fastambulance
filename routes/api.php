<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
});
    

Route::middleware('auth:api')->group(function () {
    
    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
});
