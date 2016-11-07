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
			$leaveRoom = $userOnline->first();
			$userOnline->delete();

			$this->onlineUsers($leaveRoom->room_id, "{$user->name} leave the room {$leaveRoom->name}", 'offline');
		endif;

		$this->createOnline($user->id, $roomId);
		$this->onlineUsers($roomId, "{$user->name} logged in the room {$user->name}", 'online');

		return 'done';
	}

	public function deleteRoom($roomId){
		if(Room::find($roomId)->delete())
			return 'done';

		return 'err';
	}

	public function leaving($roomId){
		$user = Auth::user();
		Online::where('user_id', $user->id)->delete();
		$this->onlineUsers($roomId, "{$user->name} leave this room", 'offline');
	}

	protected function createOnline($userId, $roomId){
		$online = new Online();
		$online->user_id = $userId;
		$online->room_id = $roomId;
		$online->timelogin = time();
		$online->timelogout = time();
		$online->save();
	}

	public function onlineUsers($roomId, $action, $type){
		$room = Room::find($roomId)->withCount('onlines')->first()->onlines_count;
		$onlineUser = Online::where('room_id', $roomId)->with('users')->get();
		$array = [
			'count'  => $room,
			'user'   => $onlineUser,
			'action' => $action
		];

		triggerPusher("{$roomId}-{$type}", "{$type}User", $array);

		return $array;
	}
}
