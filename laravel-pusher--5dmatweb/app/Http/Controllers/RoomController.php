<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRoomRequest;
use App\Online;
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

	public function getMeOnline($roomId){
		$user = Auth::user();
		$userOnline = Online::where('user_id', $user->id);
		if($userOnline->count() > 0):
			$userOnline->delete();

			$room = Online::where('room_id', $roomId)->count();
			triggerPusher($roomId.'-offline', 'leaveUser', $room);
		endif;

		//new user
		$online = new Online();
		$online->user_id = $user->id;
		$online->room_id = $roomId;
		$online->timelogin = time();
		$online->timelogout = time();
		$online->save();

		$room = Online::where('room_id', $roomId)->count();
		triggerPusher($roomId.'-online', 'onlineUser', $room);

		return 'done';
	}

	public function deleteRoom($roomId){
		if(Room::find($roomId)->delete())
			return 'done';

		return 'err';
	}
}
