<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller{

	public function addNewMessage(AddMessageRequest $request){
		$message = new Message();
		$message->user_id = Auth::user()->id;
		$message->room_id = $request->room_id;
		$message->body = $request->message;
		if($message->save())
			return 'done';

		return 'err';
	}
}
