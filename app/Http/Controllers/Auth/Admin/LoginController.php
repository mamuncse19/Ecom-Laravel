<?php

namespace App\Http\Controllers\Auth\Admin;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

     public function login(Request $request)
    {
        $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string'
        ]);

            if (Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)) {
               return redirect()->intended(route('admin.dashboard'));
            }
            else
            {
               $sms = array(
                'message' => 'Incorrect email or password',
                'alert-type' => 'error'
                );
                return back()->with($sms);
            }
       
        }


    public function logout(Request $request)
        {
            $this->guard()->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('admin.login');
        }
}
