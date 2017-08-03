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
Route::get('/eventListings','EventController@home')->name('eventListings');

Route::get('/calendar', 'BookingController@home');

Route::post('/addBooking', 'BookingController@add')->name('addBooking');
Route::post('/updateBooking', 'BookingController@update')->name('updateBooking');
Route::post('/deleteBooking', 'BookingController@delete')->name('deleteBooking');
Route::post('/getAllBookings', 'BookingController@getAllBookings')->name('getAllEvents');

Route::get('/albums', 'AlbumController@home')->name('albumHome');
Route::post('/addAlbum', 'AlbumController@add')->name('addAlbum');