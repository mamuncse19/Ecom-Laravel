<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{

   public function __construct()
   {
      $this->middleware('auth:admin');
   }
   
   public function index()
   {
   		$category = Category::orderBy('id','desc')->get();
   		$parent_cat = Category::orderBy('name','asc')->where('parent_id',NULL)->get();
   		return view('admin.category.category',compact('category','parent_cat'));
   }

   public function store(Request $request)
   {
   		$validatedData = $request->validate([
        'name' => 'required|unique:categories|max:255',
        'image' => 'image'
    	]);

   		$category = new Category();
   		$category->name = $request->name;
   		$category->description = $request->description;
   		$category->parent_id = $request->parent_id;
   		if($request->hasFile('image')){
   			$image = $request->file('image');
   			$img_name = time().'_'.$image->getClientOriginalName();
   			$location = "images/category/";
   			if($image->move($location,$img_name)){
   			$category->image= $img_name;
   			$category->save();
   			$sms = array(
   				'message' => 'Category Inserted Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('categories')->with($sms);
   		}
   		}
   		else
   		{
   		$category->save();
   			$sms = array(
   				'message' => 'Category Inserted Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('categories')->with($sms);
   		}
   }

   public function edit($id)
   {
   		$parent_cat = Category::orderBy('name','asc')->where('parent_id',NULL)->get();
   		$category = Category::findOrFail($id);
   		return view('admin.category.editCategory',compact('category','parent_cat'));
   }

   public function update(Request $request,$id)
   {
   		$validatedData = $request->validate([
        'image' => 'image'
    	]);
   		$cat = Category::findOrFail($id);
   		$cat->name = $request->name;
   		$cat->description = $request->description;
   		$cat->parent_id = $request->parent_id;
   		if($request->hasFile('image')){
   			$image = $request->file('image');
   			$img_name = time().'_'.$image->getClientOriginalName();
   			$location = "images/category/";
   			$remove_from_directory = "images/category/".$cat->image;
   			if($image->move($location,$img_name)){
				if($cat->image!=NULL){
   				unlink($remove_from_directory);}
   			$cat->image= $img_name;
   			$cat->save();
   			$sms = array(
   				'message' => 'Category Updated Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('categories')->with($sms);
   		}
   		}
   		else
   		{
   		$cat->save();
   			$sms = array(
   				'message' => 'Category Updated Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('categories')->with($sms);
   		}
   }

   public function delete($id)
   {
   		$category = Category::findOrFail($id);
   		if($category->parent_id==NULL){
   			$cat = Category::orderBy('name','asc')->where('parent_id',$category->id)->get();
   			foreach ($cat as $sub_cat) {
   				if($sub_cat->image!=NULL){
   					unlink("images/category/".$sub_cat->image);
   				}
   				$sub_cat->delete();
   			}
   		
   	}

   	if($category->image!=NULL){
   		unlink("images/category/".$category->image);
   	}
   	$category->delete();

   		$sms = array(
   				'message' => 'Category Deleted Successfully.',
   				'alert-type' => 'success'
   			);
   			return Redirect()->route('categories')->with($sms);
   	
   	
   }
}
