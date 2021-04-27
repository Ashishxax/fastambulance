<?php

use Illuminate\Support\Facades\Route;
use App\Events\WebsocketEvent;


Route::post('vsm-mobile-validate2/', function () {
    return view('vsm-mobile-validate');
});

Route::get('/', function () {
    broadcast(new WebsocketEvent('some data'));
    return view('welcome');
});
Route::post('/valid-mobile-number','Ambulance\IndexController@number_validation');
Route::post('/ambulance-booking','Ambulance\IndexController@ambulance_booking');
// Route::get('/valid-mobile-number/{mobile}','Ambulance\IndexController@number_validation1');



