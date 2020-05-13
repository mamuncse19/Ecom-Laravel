<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Product;
use App\Model\ProductImage;

class ProductController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
  }

   public function index()
   {
   		$product = Product::orderBy('id','desc')->get();
   		return view('admin.product.product')->with('product',$product);
   }

   public function store(Request $request)
   {
   		$validatedData = $request->validate([
        'title' => 'required|max:155|unique:products',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'category_id' => 'required',
        'brand_id' => 'required'
    ]);

   		$product = new Product();
   		$product->title = $request->title;
   		$product->description = $request->description;
   		$product->price = $request->price;
   		$product->quantity = $request->quantity;
   		$product->admin_id = 1;
   		$product->slug = Str::slug($request->title);
   		$product->category_id = $request->category_id;
   		$product->brand_id = $request->brand_id;
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
   			$full_name = time().'_'.$img->getClientOriginalName();
   			$path = "images/product/";
   			$location = $img->move($path,$full_name);

   			$product_image = new ProductImage();
   			$product_image->product_id = $product->id;
   			$product_image->image = $full_name;
   			$product_image->save();
   			}
   		}
   		$sms = array(
	                'message' => 'Product inserted successfully.',
	                'alert-type' => 'success'
	            );
   		return Redirect()->back()->with($sms);
   }

   public function edit($id)
   {
      $product = Product::findOrFail($id);
      return view('admin.product.editProduct',compact('product'));
   }

   public function update(Request $request,$id)
   {
      $validatedData = $request->validate([
        'title' => 'required|max:155',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'category_id' => 'required',
        'brand_id' => 'required'
    ]);

      $product = Product::findOrFail($id);
      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->category_id = $request->category_id;
      $product->brand_id = $request->brand_id;
      $product->save();
      $sms = array(
                   'message' => 'Product Updated successfully.',
                   'alert-type' => 'success'
               );
         return Redirect()->route('products')->with($sms);
   }


   public function delete($id)
   {
   		$product = Product::findOrFail($id);
   		$product->delete();
         foreach ($product->images as $image) {
            $dir = "images/product/".$image->image;
            $image->delete();
            unlink($dir);
         }
   		
   		$sms = array(
	                'message' => 'Product deleted successfully.',
	                'alert-type' => 'success'
	            );
   		return Redirect()->back()->with($sms);
   }
}
