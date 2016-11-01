<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRoomRequest;
use App\Room;

class RoomController extends Controller{

	public function addNewRoom(AddRoomRequest $request){
		$room = new Room();
		$room->user_id = Auth::user()->id;
		$room->name = $request->name;
		if($room->save())
			return 'done';

		return 'err';
	}

	public function allRooms(){
		return Room::with('users')->get();
	}
}
