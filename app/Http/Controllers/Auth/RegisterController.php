<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Model\Division;
use App\Model\District;
use Illuminate\Support\Str;
use App\Notifications\EmailVerify;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
    * @override
    * showRegistrationForm 
    * @return void 
    */
    public function showRegistrationForm()
    {
        $divisions = Division::orderBy('name','asc')->get();
        $districts = District::orderBy('name','asc')->get();
        return view('auth.register',compact('divisions','districts'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:30',
            'last_name' => 'string|max:15',
            'phone_no' => 'required|numeric',
            'email' => 'required|email|max:100|string|unique:users',
            'password' => 'required|string|min:3|confirmed',
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'street_address' => 'required|string|max:180',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => Str::slug($request->first_name.$request->last_name),
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'street_address' => $request->street_address,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'ip_address' => request()->ip(),
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
            'status' => 0
        ]);

        $user->notify(new EmailVerify($user));
        $sms = array(
                'message' => 'A confirmation email has sent to you...Please check and verify your email then you eligible to login',
                'alert-type' => 'success'
            );
        return back()->with($sms);
    }
}
