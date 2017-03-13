<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Online extends Model{

	public function users(){
		return $this->belongsTo('App\User', 'user_id');
	}

	public function rooms(){
		return $this->belongsTo('App\Room', 'room_id');
	}
}
