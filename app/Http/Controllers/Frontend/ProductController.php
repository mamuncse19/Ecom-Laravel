<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\ProductImage;
use App\Model\Category;
use Illuminate\Support\Collection;
use App\Providers\AppServiceProvider;
//use Illuminate\Database\Eloquent\Collection;



class ProductController extends Controller
{
   public function index()
   {
   		$products = Product::orderBy('id','desc')->limit(8)->get();
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
   		$products = Product::orderBy('id','desc')
         ->orWhere('title','like','%'.$search.'%')
		   ->orWhere('description','like','%'.$search.'%')
   		->orWhere('slug','like','%'.$search.'%')
   		->orWhere('quantity','like','%'.$search.'%')
   		->orWhere('price','like','%'.$search.'%')
   		->paginate(9);
   		return view('frontend.product.searchProduct',compact('products','search'));
   }

   public function allProduct()
   {
      $products = Product::orderBy('id','desc')->paginate(9);
      return view('frontend.product.allProduct',compact('products'));
   }


   public function categoryWisePorductShow($id)
   {
      $category = Category::findOrFail($id);
      if($category->parent_id==NULL){
         $childs = Category::where('parent_id',$category->id)->get();

         if(count($childs)==0){
            $products = Product::where('category_id',$category->id)->orderBy('title','asc')->paginate(9);
               
               return view('frontend.product.allProduct',compact('products'));
         }else{

            $result = new Collection();

            foreach ($childs as $child) {
               $product = Product::where('category_id',$child->id)->orderBy('title','asc')->get();

               foreach ($product as $pro) {

               $products = $result->push($pro)->paginate(9);
                  
               }
                           
            }
            //dd($products);
            return view('frontend.product.allProduct',compact('products'));
         }
      }else{
         $products = Product::where('category_id',$id)->orderBy('title','asc')->paginate(9);

      return view('frontend.product.allProduct',compact('products'));
      }
      
   }
}
