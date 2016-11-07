<?php

function triggerPusher($roomChannel, $event, $data){
	$pusher = new Pusher(env('PUSHER_KEY'), env('PUSHER_SECRET'), env('PUSHER_APP_ID'));
	$pusher->trigger($roomChannel, $event, $data);
}

function getAvatar($avatar){
	$path = public_path('images/avatars/');

	if(file_exists($path.$avatar))
		return url('/images/avatars/'.$avatar);

	return url('/images/avatars/no-profile.jpg');
}