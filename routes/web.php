<?php

use Illuminate\Support\Facades\Route;
use App\Events\WebsocketEvent;

header('Content-Type: text/html; charset=utf-8');
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');
    // $exitCode = Artisan::call('config:cache');
    return "cache,config,view -cleared";
});

Route::post('vsm-mobile-validate2/', function () {
    return view('vsm-mobile-validate');
});

Route::get('/', function () {
// broadcast(new WebsocketEvent('some data'));
    return view('welcome');
});
Route::post('/valid-mobile-number','Ambulance\IndexController@number_validation');
Route::post('/ambulance-booking','Ambulance\IndexController@ambulance_booking');
// Route::get('/valid-mobile-number/{mobile}','Ambulance\IndexController@number_validation1');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/login',function () {return view('admin.login');});
Route::post('admin-login', 'Admin\AdminController@admin_login')->name('admin-login');

Route::middleware('auth')->group(function(){
    Route::match(['get', 'post'],'/dashboard', 'Admin\DashboardController@dashboard')->name('dashboard');
    Route::get('/user','Admin\DashboardController@admin_users')->name('user');
    Route::get('/ambulance','Admin\DashboardController@ambulance')->name('ambulance');
    Route::get('/booking-request','Admin\RequestController@booking_request')->name('booking-request');
    Route::get('/user-search','Admin\RequestController@user_search')->name('user-search');
    Route::post('ambulance-form','Admin\DashboardController@ambulance_form');
    Route::get('/get-record/{id}', 'Admin\DashboardController@get_record');
    Route::post('admin-logout', 'Admin\AdminController@admin_logout')->name('admin-logout');
});
