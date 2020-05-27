<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/', function(){
    return view('home');
});

Route::get('/smart1', function(){
    return view('smart');
});

Route::get('/tnt', function(){
    return view('tnt');
});

Route::get('/globe', function(){
    return view('globe');
});
Route::get('/tnt', function(){
    return view('tnt');
});
Route::get('/smart', function(){
    return view('keyboard');
});
Route::get('/cignal', function(){
    return view('cignal');
});
Route::get('/satlite', function(){
    return view('satlite');
});
Route::get('/loadwallet', function(){
    return view('loadwallet');
});

Route::get('/dashboard', function(){
    return view('layouts.dashboard');
});

Route::get('/dashboard', function(){
    return view('dashboard');
});
Route::get('/all_reports', 'EloadController@index');
Route::get('/daily_reports', 'EloadController@dailyreport');
Route::get('/getStatus', 'EloadController@getStatus');
Route::get('/smartpromo', 'PromoController@smartPromo' );

Route::resource('/promo', 'PromoController' );

Route::post('/smartload', 'EloadController@store')->name('smartload');
