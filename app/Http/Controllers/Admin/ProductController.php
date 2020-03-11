<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\ProductImage;

class ProductController extends Controller
{
   public function index()
   {
   		$product = Product::orderBy('id','desc')->get();
   		return view('admin.product.product')->with('product',$product);
   }

   public function store(Request $request)
   {
   		$validatedData = $request->validate([
        'title' => 'required|max:155',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
    ]);

   		$product = new Product();
   		$product->title = $request->title;
   		$product->description = $request->description;
   		$product->price = $request->price;
   		$product->quantity = $request->quantity;
   		$product->admin_id = 1;
   		$product->slug = Str::slug($request->title);
   		$product->admin_id = 1;
   		$product->category_id = 1;
   		$product->brand_id = 1;
   		$product->save();

   		// single image insert
   		// if($request->hasFile('image')){
   		// 	$img = $request->file('image');
   		// 	$full_name = time().'.'.$img->getClientOriginalExtension();
   		// 	$path = "images/product/";
   		// 	$url = $path.$full_name;
   		// 	$location = $img->move($path,$full_name);

   		// 	$product_image = new ProductImage();
   		// 	$product_image->product_id = $product->id;
   		// 	$product_image->image = $url;
   		// 	$product_image->save();
   		// 	$sms = array(
	    //             'message' => 'Product inserted successfully.',
	    //             'alert-type' => 'success'
	    //         );
   		// 	return Redirect()->back()->with($sms);

   		// }

   		// multiple image insert
   		if(count($request->image)>0){
   			foreach ($request->image as $img) {
   			$full_name = time().'.'.$img->getClientOriginalExtension();
   			$path = "images/product/";
   			$url = $path.$full_name;
   			$location = $img->move($path,$full_name);

   			$product_image = new ProductImage();
   			$product_image->product_id = $product->id;
   			$product_image->image = $url;
   			$product_image->save();
   			}
   		}
   		$sms = array(
	                'message' => 'Product inserted successfully.',
	                'alert-type' => 'success'
	            );
   		return Redirect()->back()->with($sms);
   }
}
