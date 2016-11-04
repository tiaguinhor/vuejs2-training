<?php

function triggerPusher($roomChannel, $event, $data){
	$pusher = new Pusher(env('PUSHER_KEY'), env('PUSHER_SECRET'), env('PUSHER_APP_ID'));
	$pusher->trigger($roomChannel, $event, $data);
}