<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SubCategory;
use App\Models\Brand;

class FilterController extends Controller
{
  public function userFilter(Request $request)
  {
    $data =  User::where('email_verified_at', null);
    if ($request->has('name')) {
      $data->orderBy('id', 'desc');
    }
    $user =  $data->paginate(config('const.pagination'));
    return view('form.user.index', compact('user'));
  }
  public function brandFilter(Request $request)
  {
    $sub_id = $request->sub_id;
    $brand_id = $request->brand_id;  
    if($brand_id!=null){
    $subcategory = SubCategory::where('id', $sub_id)->with(['category', 'product.attribute.atter', 'product.cart','product.brand'=>function($q) use($brand_id){
      $q->whereIn('id',$brand_id);
    }])->get();
    } else{
      $subcategory = SubCategory::where('id', $sub_id)->with('product.brand', 'category', 'product.attribute.atter', 'product.cart')->get();
    }
    $brand = Brand::whereHas('product.subcategory', function ($q) use ($sub_id) {
      $q->where('id', $sub_id);
    })->get();
    $cat_id = $subcategory[0]->category->id;
    return view('web.append.brandfilter', compact('subcategory', 'cat_id', 'sub_id', 'brand','brand_id'));
  }
}
