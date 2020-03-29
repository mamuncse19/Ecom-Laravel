<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description', 'image','parent_id'
    ];

    public function parent()
    {
    	return $this->belongsTo(Category::class,'parent_id');
    }
    
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public static function parentOrNot($parent_id,$child_id)
    {
    	$category = Category::where('id',$child_id)->where('parent_id',$parent_id)->get();
    	if(!is_null($category))
    	{
    		return true;
    	}else{
    		return false;
    	}
    }
}
