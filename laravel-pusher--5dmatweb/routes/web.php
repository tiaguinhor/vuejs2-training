<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('/add-room', 'RoomController@addNewRoom');
Route::get('/all-rooms', 'RoomController@getAllRooms');
Route::get('/my-rooms', 'RoomController@getMyRooms');
Route::get('/delete-room/{roomId}', 'RoomController@deleteRoom');
Route::get('/get-online/{roomId}', 'RoomController@getMeOnline');
Route::get('/leaving/{roomId}', 'RoomController@leaving');

Route::post('/add-message', 'MessageController@addNewMessage');
Route::get('/auth-user-avatar', 'UserController@getAuthUserAvatar');
Route::post('/upload-avatar', 'UserController@uploadAvatar');

Auth::routes();

Route::get('/home', 'HomeController@index');
