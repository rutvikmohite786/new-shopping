<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\UserCart;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Attribute;
use App\Models\ProductColor;
use Auth;

class ProductController extends Controller
{
  public function catgoryProductList($id)
  {
    $subcategory = SubCategory::where('categories_id', $id)->get();
    $cat_id = $id;
    return view('web.collection.subcategory', compact('subcategory', 'cat_id'));
  }
  public function subcatgoryProductList($id)
  {
    $subcategory = SubCategory::where('id', $id)->with('product.brand', 'category', 'product.attribute.atter', 'product.cart')->get();
    $brand = Brand::whereHas('product.subcategory', function ($q) use ($id) {
      $q->where('id', $id);
    })->get();
    $cat_id = $subcategory[0]->category->id;
    $sub_id = $id;
    return view('web.collection.category', compact('subcategory', 'cat_id', 'sub_id', 'brand'));
  }
  public function getproductDetail($id)
  {
    $produtDetail = Product::with('attribute.atter')->find($id);
    $userCart = UserCart::where('user_id',Auth::id())->where('product_id',$id)->get();
    $attribute = Attribute::withWhereHas('attribute',function($q) use ($id){
      $q->where('product_id',$id);
    })->get();
    $color = Color::withWhereHas('productcolor',function($q) use ($id){
      $q->where('product_id',$id);
    })->get();
    return view('web.view', compact('produtDetail','attribute','userCart','color'));
  }
  public function addtoCart(Request $request)
  {
    $userCart = UserCart::where('product_id', $request->product_id)->where('user_id', Auth::id())->where('product_attribute_id', $request->product_attribute_id)->first();
    if ($userCart) {
      $userCart->quantity = $userCart->quantity + $request->quantity;
      $userCart->save();
    } else {
    $newCart = UserCart::create([
        'product_id' => $request->product_id,
        'quantity' => $request->quantity,
        'user_id' => Auth::id(),
        'product_attribute_id' => $request->product_attribute_id
      ]);
    }
    $product_atter_id = $request->product_attribute_id;
    if($request->product_attribute_id!=null){
        $data = UserCart::withWhereHas('product.attribute',function ($q) use($product_atter_id){
          $q->where('id',$product_atter_id);
        })->with('product.images')->where('product_id',$request->product_id)->where('user_id',Auth::id())->where('product_attribute_id',$request->product_attribute_id)->first();
    }else{
        $data = UserCart::with('product.attribute','product.images')->where('product_id',$request->product_id)->where('user_id',Auth::id())->first();
    }
    return response()->json([
      'data' => $data
      ]);
  }
  public function removetoCart(Request $request){
     $removeFormCart = new UserCart();
     if($request->product_attribute_id!=null){
        $removeFormCart->where('user_id',Auth::id())->where('product_id',$request->product_id)->delete();
     }else{
        $removeFormCart->where('user_id',Auth::id())->where('product_id',$request->product_id)->delete();
     } 
  }
  public function changeAtter(Request $request){
      dd($request->all());
  }
}
