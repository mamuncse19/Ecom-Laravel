<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class userVerifyController extends Controller
{
    public function verify($token)
    {
    	$user = User::where('remember_token',$token)->first();
    	if(!is_null($user))
    	{
    		$user->status = 1;
    		$user->remember_token = NULL;
    		$user->save();
    		$sms = array(
    			'message' => 'Your Registration Successfully Completed. Please Login',
    			'alert-type' => 'success'
    		);
    		return Redirect()->route('login')->with($sms);
    	}
    	else
    	{
    		$sms = array(
    			'message' => 'Sorry!!..Your token not matched',
    			'alert-type' => 'error'
    		);
    		return redirect('/')->with($sms);
    	}
    }
}
