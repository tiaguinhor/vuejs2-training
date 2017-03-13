<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller{

	public function getAuthUserAvatar(){
		return getAvatar(Auth::user()->avatar);
	}

	public function uploadAvatar(Request $request){
		$user = Auth::user();
		$path = public_path('images/avatars/');
		$image = $request->file('avatar');
		$imageName = time().$user->name.$image->getClientOriginalName();

		if($user->avatar != ''):
			if(file_exists($path.$user->avatar))
				@unlink($path.$user->avatar);
		endif;

		$img = Image::make($image);
		$img->resize(100, 100);
//		$img->crop(100, 100);
		$img->save($path.$imageName, 60);

		$user->avatar = $imageName;
		$user->save();

		return url('/images/avatars/'.$imageName);
	}
}
