<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/add-room', 'RoomController@addNewRoom');
Route::get('/all-rooms', 'RoomController@getAllRooms');
Route::get('/my-rooms', 'RoomController@getMyRooms');
Route::get('/delete-room/{roomId}', 'RoomController@deleteRoom');

Route::get('/add-message', 'MessageController@addNewMessage');

Auth::routes();

Route::get('/home', 'HomeController@index');
