<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     protected $fillable = [
        'name', 'description', 'image'
    ];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
