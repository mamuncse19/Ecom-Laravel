<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Model\Division;
use App\Model\District;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

   public function dashboard()
   {
   		$user = Auth::user();
   		return view('users.userDashboard')->with('user',$user);
   }

   public function profile()
   {
   		$divisions = Division::orderBy('name','asc')->get();
   		$districts = District::orderBy('name','asc')->get();
   		$user = Auth::user();
   		return view('users.userProfile',compact('user','divisions','districts'));
   }

   public function profileUpdate(Request $request)
   {
   		$user = Auth::user();

   		$this->validate($request,[
   			'first_name' => 'required|string|max:30',
            'last_name' => 'string|max:15',
            'phone_no' => 'required|numeric|unique:users,phone_no,'.$user->id,
            'email' => 'required|email|max:100|string|unique:users,email,'.$user->id,
            'username' => 'required|alpha_dash|max:100|string|unique:users,username,'.$user->id,
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'street_address' => 'required|string|max:180',

   		]);

   		$user->first_name = $request->first_name;
   		$user->last_name = $request->last_name;
   		$user->username = $request->username;
   		$user->email = $request->email;
   		$user->phone_no = $request->phone_no;
   		$user->division_id = $request->division_id;
   		$user->district_id = $request->district_id;
   		$user->street_address = $request->street_address;
   		$user->shipping_address = $request->shipping_address;

   		if($request->password!=NULL || $request->password!="")
   		{
   			$user->password = Hash::make($request->password);
   		}

   		$user->ip_address = request()->ip();

   		$user->save();

   		$sms = array(
   			'message' => 'Updated Successfully',
   			'alert-type' => 'success'
   		);

   		return back()->with($sms);
   }
}
