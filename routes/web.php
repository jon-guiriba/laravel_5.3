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

Route::get('/test', 'HomeController@test')->name('test');
Route::get('/', 'HomeController@home')->name('home');

Route::post('/addEvent', 'EventController@add')->name('addEvent');
Route::post('/updateEvent', 'EventController@update')->name('updateEvent');
Route::post('/deleteEvent', 'EventController@delete')->name('deleteEvent');

Route::get('/getAllEvents', 'EventController@getAllEvents')->name('getAllEvents');

Route::post('/testUpload', 'HomeController@testUpload')->name('testUpload');