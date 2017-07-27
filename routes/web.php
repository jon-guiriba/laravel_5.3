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
	return view('calendar');
});
Route::get('/eventListings','HomeController@eventListings')->name('eventListings');

Route::post('/addEvent', 'EventController@add')->name('addEvent');
Route::post('/updateEvent', 'EventController@update')->name('updateEvent');
Route::post('/deleteEvent', 'EventController@delete')->name('deleteEvent');
Route::get('/getAllEvents', 'EventController@getAllEvents')->name('getAllEvents');


Route::get('/albums', 'AlbumController@home')->name('albumHome');
Route::post('/addAlbum', 'AlbumController@add')->name('addAlbum');