<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\ProductImage;
use App\Model\Category;

class ProductController extends Controller
{
   public function index()
   {
   		$products = Product::orderBy('id','desc')->paginate(12);
   		return view('pages.index')->with('products',$products);
   }

   public function singleProductShow($slug)
   {
   		$product = Product::where('slug',$slug)->first();
   		return view('frontend.product.singleProduct',compact('product'));
   }


   public function productSearch(Request $request)
   {
   		$search = $request->search;
   		$products = Product::orWhere('title','like','%'.$search.'%')
		   ->orWhere('description','like','%'.$search.'%')
   		->orWhere('slug','like','%'.$search.'%')
   		->orWhere('quantity','like','%'.$search.'%')
   		->orWhere('price','like','%'.$search.'%')
         ->orderBy('id','desc')
   		->paginate(9);
   		return view('frontend.product.searchProduct',compact('products','search'));
   }	
}
