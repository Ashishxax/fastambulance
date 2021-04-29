<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
    Route::post('bookAmbulance', 'Api\Ambulance\BookingController@bookingAmbulance')->name('Ambulance');
    Route::post('notify-ambulance', 'Api\Ambulance\BookingController@notify_ambulance')->name('notify');
});
    

Route::middleware('auth:api')->group(function () {
    Route::post('sync-ambulance-gps', 'Api\Ambulance\SyncGPSController@sync_ambulance_gps')->name('sync');
    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
});
