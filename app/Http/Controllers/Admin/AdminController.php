<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

   public function index()
    {
    	$toDay = date('Y-m-d');
    	$toDaysOrder = Order::where('is_paid','=',1)->where('order_date',$toDay)->get();
    	return view('admin.dashboard',compact('toDaysOrder'));
    }
}
