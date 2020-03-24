<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Category extends Model
{
    protected $fillable = [
        'name', 'description', 'image','parent_id'
    ];

    public function parent()
    {
    	return $this->belongsTo(Category::class,'parent_id');
    }
    
}
