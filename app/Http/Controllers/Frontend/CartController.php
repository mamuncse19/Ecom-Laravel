<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Cart;
use App\Model\Order;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'product_id' => 'required'
    ],
    [
        'product_id.required' => 'Please give a product'
       ]);
       
       if(Auth::check()){
       $cart = Cart::where('user_id',Auth::user()->id)
       ->where('product_id',$request->product_id)
       ->first();
   }else{
        $cart = Cart::where('ip_address',request()->ip())
       ->where('product_id',$request->product_id)
       ->first();
   }
       if(!is_null($cart))
       {
            $cart->increment('product_quantity');
       }else{

            $cart = new Cart();

           if(Auth::check())
           {
                $cart->user_id = Auth::user()->id;
           }

           $cart->product_id = $request->product_id;
           $cart->ip_address = request()->ip();

           $cart->save();
       }

       $sms = array(
        'message' => 'Product has added to cart!!',
        'alert-type' => 'success'
       );

       return back()->with($sms);
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
