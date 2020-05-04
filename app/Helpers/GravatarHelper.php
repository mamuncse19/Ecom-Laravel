<?php
namespace App\Helpers;
/**
 * Gravatar Helper
 */
class GravatarHelper
{
	public static function validate_gravatar($email)
	{
		$hash = md5($email);
		$url = 'http://www.gravatar.com/avatar/'.$hash.'?d=404';
		$headers = @get_headers($url);
		if(!preg_match("|200|", $headers[0])){
			$has_valid_avatar = FALSE;
		}else{
			$has_valid_avatar = TRUE;
		}
		return $has_valid_avatar;
	}


	public static function gravatar_image($email, $size=0, $d="")
	{
		$hash = md5($email);
		$image_url = 'http://www.gravatar.com/avatar/'.$hash.'?s='.$size.'&d='.$d;
		return $image_url;
	}
}