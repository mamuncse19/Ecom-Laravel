<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Notifications\EmailVerify;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function login(Request $request)
    {
        $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string'
        ]);

        $user = User::where('email',$request->email)->first();
        if(!is_null($user)){
        if ($user->status==1) {
            if (Auth::guard('web')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)) {
               return redirect()->intended('/');
            }
            else
            {
               $sms = array(
                'message' => 'Incorrect password',
                'alert-type' => 'error'
                );
                return back()->with($sms);
            }
        }
        else
        {
                $user->notify(new EmailVerify($user));
                $sms = array(
                'message' => 'Sorry!!...Your account is not active. A confirmation mail has sent to you. Please Check your email and continue login',
                'alert-type' => 'info'

            );
            return back()->with($sms);
             
        }
    }
    else
    {

         $sms = array(
        'message' => 'Incorrect email',
        'alert-type' => 'error'
    );
        return back()->with($sms);
    }
}
}
