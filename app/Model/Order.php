<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'user_id','ip_address','name','phone_no','shipping_address','email','message','is_paid','is_completed','is_seen_by_admin','payment_id','transaction_id','custom_discount','shipping_cost'

    ];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function carts()
    {
    	return $this->hasMany(Cart::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
