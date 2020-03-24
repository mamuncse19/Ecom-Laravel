<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
	protected $fillable = [
        'title','description','quantity', 'price',
    ];


    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id');
    }
}
