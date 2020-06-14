<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Payment;
use App\Model\Order;
use App\Model\Cart;
use App\Model\District;
use Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_methods = Payment::orderBy('priority','asc')->get();
        return view('frontend.payment.checkOut',compact('payment_methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_no' => 'required',
            'shipping_address' => 'required',
            'payment_method_id' => 'required | string'

        ]);

        if($request->payment_method_id!="cash_in")
        {
            if($request->transaction_id==NULL || empty($request->transaction_id))
            {
                $sms = array(
                    'message' => 'Please Enter Transaction ID.',
                    'alert-type' => 'error'
                );

                return back()->with($sms);
            }
        }

        $order = new Order();

        $payment_id = Payment::where('short_name',$request->payment_method_id)->first()->id;

        if(Auth::check())
        {
            $order->name = $request->name;
            $order->user_id = Auth::user()->id;
            $order->ip_address = request()->ip();
            $order->phone_no = $request->phone_no;
            $order->shipping_address = $request->shipping_address;
            $order->email = $request->email;
            $order->message = $request->message;
            $order->transaction_id = $request->transaction_id;
            $order->payment_id = $payment_id;
            $order->order_date = date('Y-m-d');

            $order->save();

            foreach (Cart::totalCarts() as $item) {
                $item->order_id = $order->id;
                $item->save();
            }

             $sms = array(
                        'message' => 'Your order has been taken by admin',
                        'alert-type' => 'success'
                    );
            return redirect()->route('allProduct.show')->with($sms);

        }else{
           return redirect()->route('login');
        }

        

        
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
