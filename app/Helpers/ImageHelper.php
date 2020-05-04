<?php

namespace App\Helpers;
use App\User;
use App\Helpers\GravatarHelper;
/**
 * Image Helper 
 */
class ImageHelper
{
	public static function getUserImage($id)
	{
		$user = User::findOrFail($id);
		$avatar_url = "";
		if($user!=NULL){
			if($user->avatar==NULL){
				// Return his gravatar image
				if(GravatarHelper::validate_gravatar($user->email)){
					$avatar_url = GravatarHelper::gravatar_image($user->email,100);
				}else{
					// when there is no gravatar image
					$avatar_url = url('users/default_image/default.png');
				}
			}else{
				// return that image
				$avatar_url = url('users/images'.$user->avatar);
			}
		}else{
			//return redirect('/');
		}
		return $avatar_url;
	}
}