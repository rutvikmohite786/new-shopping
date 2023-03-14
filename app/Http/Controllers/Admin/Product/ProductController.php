<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\ProductImage;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
  public function index()
  {
    $product = Product::with('subcategory.category','brand')->paginate(config('const.pagination'));
    $cat = SubCategory::all();
    return view('form.product.product', compact('cat', 'product'));
  }
  public function add()
  {
    $subcategory = SubCategory::all();
    $brand = Brand::all();
    return view('form.product.add', compact('subcategory','brand'));
  }
  public function store(Request $request)
  {
    $product = new Product();
    $validator = Validator::make($request->all(),$product->rules);
    if ($validator->fails()) {
       return redirect()->back()->withErrors($validator);
    }
    $product->sub_categories_id =  $request->subcategory;
    $product->name = $request->name;
    $product->brand_id = isset($request->brand) ? $request->brand : null ;
    $product->save();

    //store images
    if ($request->img != null) {
      foreach ($request->img as $image) {
        $name = time() . '.' . $image->extension();
       // $path = $image->storeAs('public/images', $name);
        $destinationPath = 'images';
        $image->move(public_path($destinationPath), $name);
        $save = new ProductImage();
        $save->name = $name;
        $save->path = $destinationPath.'/'.$name;
        $save->product_id  = $product->id;
        $save->save();
      }
    } 
    return redirect()->route('index.product')->with('message','Product added');
  }
  public function edit($id)
  {
    $data =  Product::with('subcategory','images','brand')->where('id', $id)->first();
    $subcategory = SubCategory::all();
    $brand = Brand::all();
    return view('form.product.update', compact('data', 'subcategory','brand'));
  }
  public function update(Request $request)
  {
    $product =  Product::find($request->id);
    $product->name = $request->name;
    $product->sub_categories_id = $request->subcategory;
    $product->brand_id = isset($request->brand) ? $request->brand : null ;
    $product->save();
    
    //store images
    if ($request->img != null) {
      foreach ($request->img as $image) {
        $name = time() . '.' . $image->extension();
        // $path = $image->storeAs('public/images', $name);
        $destinationPath = 'images';
        $image->move(public_path($destinationPath), $name);
        $save = new ProductImage();
        $save->name = $name;
        $save->path = $destinationPath.'/'.$name;
        $save->product_id  = $request->id;
        $save->save();
      }
    }
    return redirect()->route('index.product')->with('message','Product updated');
  }
  public function productDelete($id)
  {
    Product::where('id', $id)->delete();
    return redirect()->back();
  }
  public function productImageEdit($id)
  {
    $data = ProductImage::find($id);
    return view('form.product.image', compact('data'));
  }
  public function productImageUpdate(Request $request)
  {
    $name = time() . '.' . $request->img->extension();
    $destinationPath = 'images';
    // $path = $request->img->storeAs('public/images', $name);
    $request->img->move(public_path($destinationPath), $name);
    $save = ProductImage::find($request->id);
    $save->name = $name;
    $save->path = $destinationPath.'/'.$name;
    $save->save();
    return redirect()->back();
  }
  public function delete($id){
      Product::where('id',$id)->delete();
      return redirect()->back();
  }
}
