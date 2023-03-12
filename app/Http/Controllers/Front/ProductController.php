<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\UserCart;
use Auth;

class ProductController extends Controller
{
    public function catgoryProductList($id){
      // $subcategory = SubCategory::where('categories_id',$id)->with('product')->get();
      $subcategory = SubCategory::where('categories_id',$id)->get();
      $cat_id = $id;
      return view('web.collection.subcategory',compact('subcategory','cat_id'));
      // return view('web.collection.category',compact('subcategory','cat_id'));
    }
    public function subcatgoryProductList($id){
      $subcategory = SubCategory::where('id',$id)->with('product')->get();
      $cat_id = $id;
      return view('web.collection.category',compact('subcategory','cat_id'));
    }
    public function getproductDetail($id){
      $produtDetail = Product::with('attribute.atter')->find($id);
      return view('web.view',compact('produtDetail'));
    }
    public function addtoCart(Request $request){
        $userCart = UserCart::where('product_id',$request->product_id)->where('user_id',Auth::id())->where('product_attribute_id',$request->product_attribute_id)->first();
        if($userCart){
             $userCart->quantity = $userCart->quantity+$request->quantity;
             $userCart->save();
        }else{
        UserCart::create([
          'product_id'=>$request->product_id,
          'quantity'=>$request->quantity,
          'user_id'=>Auth::id(),
          'product_attribute_id'=>$request->product_attribute_id
        ]);
      }
    }
}
