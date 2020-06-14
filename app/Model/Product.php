<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
	protected $fillable = [
        'title','description','quantity', 'price','category_id','brand_id'
    ];


    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
