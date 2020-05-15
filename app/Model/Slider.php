<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
    	'title','image','text','button_text','button_link','priority'
    ];
}
