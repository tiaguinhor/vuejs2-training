<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests\AddMessageRequest;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller{

	public function addNewMessage(AddMessageRequest $request){
		$message = new Message();
		$message->user_id = Auth::user()->id;
		$message->room_id = $request->roomId;
		$message->body = $request->message;
		if($message->save()):
			$message = Message::where('id', $message->id)->with('users', 'rooms')->first();
			triggerPusher($message->rooms->id.'-room', 'newMessages', $message);

			return $message;
		endif;

		return 'err';
	}
}
