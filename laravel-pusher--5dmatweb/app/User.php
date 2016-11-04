<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{

	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function messages(){
		return $this->hasMany('App\Messages', 'user_id');
	}

	public function rooms(){
		return $this->hasMany('App\Rooms', 'user_id');
	}

	public function onlines(){
		return $this->hasOne('App\Online', 'user_id');
	}
}
