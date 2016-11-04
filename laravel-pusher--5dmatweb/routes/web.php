<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('/add-room', 'RoomController@addNewRoom');
Route::get('/all-rooms', 'RoomController@getAllRooms');
Route::get('/my-rooms', 'RoomController@getMyRooms');
Route::get('/delete-room/{roomId}', 'RoomController@deleteRoom');
Route::get('/get-online/{roomId}', 'RoomController@getMeOnline');

Route::post('/add-message', 'MessageController@addNewMessage');

Auth::routes();

Route::get('/home', 'HomeController@index');
