<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRoomRequest;
use App\Room;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller{

	public function addNewRoom(AddRoomRequest $request){
		$room = new Room();
		$room->user_id = Auth::user()->id;
		$room->name = $request->name;
		if($room->save())
			return 'done';

		return 'err';
	}

	public function getAllRooms(){
		return Room::with('users')->get();
	}

	public function getMyRooms(){
		return Room::where('user_id', Auth::user()->id)->get();
	}

	public function deleteRoom($roomId){
		if(Room::find($roomId)->delete())
			return 'done';

		return 'err';
	}
}
