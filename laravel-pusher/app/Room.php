<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model{

	public function messages(){
		return $this->hasMany('App\Message', 'room_id');
	}
}
