<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [

    	'name','image','priority','short_name','a_c_no','type'
    ];
}
