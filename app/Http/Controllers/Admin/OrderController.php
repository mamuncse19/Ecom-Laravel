<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','desc')->get();
        return view('admin.order.order',compact('orders'));
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $order->is_seen_by_admin = 1;
        $order->save();
        return view('admin.order.view',compact('order'));
    }

    
    public function paid($id)
    {
        $order = Order::findOrFail($id);
        if($order->is_paid)
        {
            $order->is_paid = 0;

            $order->save();

            $sms = array(
                'message' => 'Order Payment Cancelled.',
                'alert-type' => 'warning'
            );

        return back()->with($sms);

        }else{
            $order->is_paid = 1;

            $order->save();

            $sms = array(
                'message' => 'Order Payment Completed.',
                'alert-type' => 'success'
            );

        return back()->with($sms);
        
        }
    } 



    public function complete($id)
    {
        $order = Order::findOrFail($id);
        if($order->is_completed)
        {
            $order->is_completed = 0;

            $order->save();

        $sms = array(
            'message' => 'Order Cancelled.',
            'alert-type' => 'warning'
        );

        return back()->with($sms);

        }else{
            $order->is_completed = 1;

            $order->save();

        $sms = array(
            'message' => 'Order Completed.',
            'alert-type' => 'success'
        );

        return back()->with($sms);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        $notification = array(
            'message' => 'Order Deleted Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
