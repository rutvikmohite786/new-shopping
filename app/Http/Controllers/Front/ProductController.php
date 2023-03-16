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
    $attribute = Attribute::withWhereHas('attribute',function($q) use ($id){
      $q->where('product_id',$id);
    })->get();
    $color = Color::withWhereHas('productcolor',function($q) use ($id){
      $q->where('product_id',$id);
    })->get();
    // dd($color);
    return view('web.view', compact('produtDetail','attribute'));
  }
  public function addtoCart(Request $request)
  {
    $userCart = UserCart::where('product_id', $request->product_id)->where('user_id', Auth::id())->where('product_attribute_id', $request->product_attribute_id)->first();
    if ($userCart) {
      $userCart->quantity = $userCart->quantity + $request->quantity;
      $userCart->save();
    } else {
      UserCart::create([
        'product_id' => $request->product_id,
        'quantity' => $request->quantity,
        'user_id' => Auth::id(),
        'product_attribute_id' => $request->product_attribute_id
      ]);
    }
  }
  public function removetoCart(Request $request){
   dd($request->all());
  }
}
