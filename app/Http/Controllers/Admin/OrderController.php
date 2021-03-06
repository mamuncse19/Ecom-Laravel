<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Product;
use PDF;

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
            'message' => 'Order Not Completed.',
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




    public function confirm($id)
    {
        $order = Order::findOrFail($id);
        if($order->is_confirmed)
        {
            $order->is_confirmed = 0;
            $order->save();

            foreach ($order->carts as $cart) {
            $product_id = $cart->product_id;
            $product_quantity = $cart->product_quantity;

            $product = Product::findOrFail($product_id);
            $product->quantity = $product->quantity+$product_quantity;
            $product->save();
        }

         $sms = array(
            'message' => 'Order Cancelled.',
            'alert-type' => 'success'
        );

        return back()->with($sms);

        }
        else{

            $order->is_confirmed = 1;
            $order->save();

            foreach ($order->carts as $cart) {
            $product_id = $cart->product_id;
            $product_quantity = $cart->product_quantity;

            $product = Product::findOrFail($product_id);
            $product->quantity = $product->quantity-$product_quantity;
            $product->save();
        }

         $sms = array(
            'message' => 'Order Confirmed.',
            'alert-type' => 'success'
        );

        return back()->with($sms);

        }

        
    }



    public function discountShippingCostUpdate(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->shipping_cost = $request->shipping_cost;
        $order->custom_discount = $request->custom_discount;
        $order->save();

        $sms = array(
            'message' => 'Order Updated.',
            'alert-type' => 'success'
        );

        return back()->with($sms);
        

        
    }


    public function invoiceGenerate($id)
    {
        $order = Order::findOrFail($id);

        $pdf = PDF::loadView('admin.order.invoice',compact('order'));
        // For image path found
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('invoice.pdf');
        

        
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
