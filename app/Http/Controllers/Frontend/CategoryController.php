<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        //
    }

    public function show($id)
    {
       $category = Category::findOrFail($id);
       if(!is_null($category))
       {
            return view('frontend.product.show',compact('category'));
       }
    }
}
