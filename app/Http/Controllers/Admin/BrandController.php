<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;

class BrandController extends Controller
{

   public function __construct()
   {
      $this->middleware('auth:admin');
   }
   
    public function index()
   {
   		$brands = Brand::orderBy('id','desc')->get();
   		return view('admin.brand.brand',compact('brands'));
   }

   public function store(Request $request)
   {
   		$validatedData = $request->validate([
        'name' => 'required|unique:brands|max:255',
        'image' => 'image'
    	]);

   		$brand = new Brand();
   		$brand->name = $request->name;
   		$brand->description = $request->description;
   		if($request->hasFile('image')){
   			$image = $request->file('image');
   			$img_name = time().'.'.$image->getClientOriginalExtension();
   			$location = "images/brand/";
   			if($image->move($location,$img_name)){
   			$brand->image= $img_name;
   			$brand->save();
   			$sms = array(
   				'message' => 'Brand Inserted Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('brands')->with($sms);
   		}
   		}
   		else
   		{
   		$brand->save();
   			$sms = array(
   				'message' => 'Brand Inserted Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('brands')->with($sms);
   		}
   }

   public function edit($id)
   {
   		$brand = Brand::findOrFail($id);
   		return view('admin.brand.editBrand',compact('brand'));
   }

   public function update(Request $request,$id)
   {
   		$validatedData = $request->validate([
        'image' => 'image'
    	]);
   		$brand = Brand::findOrFail($id);
   		$brand->name = $request->name;
   		$brand->description = $request->description;
   		if($request->hasFile('image')){
   			$image = $request->file('image');
   			$img_name = time().'.'.$image->getClientOriginalExtension();
   			$location = "images/brand/";
   			$remove_from_directory = "images/brand/".$brand->image;
   			if($image->move($location,$img_name)){
				if($brand->image!=NULL){
   				unlink($remove_from_directory);}
   			$brand->image= $img_name;
   			$brand->save();
   			$sms = array(
   				'message' => 'Brand Updated Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('brands')->with($sms);
   		}
   		}
   		else
   		{
   		$brand->save();
   			$sms = array(
   				'message' => 'Brand Updated Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('brands')->with($sms);
   		}
   }

   public function delete($id)
   {
   		$brand = Brand::findOrFail($id);
   		
   	if($brand->image!=NULL){
   		unlink("images/brand/".$brand->image);
   	}
   	$brand->delete();

   		$sms = array(
   				'message' => 'Brand Deleted Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('brands')->with($sms);
   	
   	
   }
}
