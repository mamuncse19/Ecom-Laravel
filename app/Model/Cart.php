<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
   protected $fillable = [
   	'product_id','user_id','order_id','ip_address','product_quantity'

   ];

   public function product()
   {
   		return $this->belongsTo(Product::class);
   }

   public function user()
   {
   		return $this->belongsTo('App\User');
   }

   public function order()
   {
   		return $this->belongsTo(Order::class);
   }


   
   public static function totalItem()
   {
      // if(Auth::check())
      // {
      //    $carts = Cart::where('order_id',NULL)->where(function($query){$query->where('user_id',Auth::user()->id)->orWhere('ip_address',request()->ip());})->get();
      // }else{
      //    $carts = Cart::where('ip_address',request()->ip())->where('order_id',NULL)->get();
      // }
      
      $carts = Cart::totalCarts();
      

      $total = 0;
      foreach ($carts as $key => $cart) {
         $total += $cart->product_quantity;
      }

      return $total;
   }



   public static function totalCarts()
   {
      if(Auth::check())
      {
         $carts = Cart::where('order_id',NULL)->where(function($query){$query->where('user_id',Auth::user()->id)->orWhere('ip_address',request()->ip());})->get();
      }else{
         $carts = Cart::where('ip_address',request()->ip())->where('order_id',NULL)->get();
      }

      return $carts;
   }


   
}
