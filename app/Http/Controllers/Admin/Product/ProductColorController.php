<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductColor;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductColorController extends Controller
{
    public function index()
    {
        $productcolor = ProductColor::with(['color', 'product'])->paginate(config('const.pagination'));
        return view('form.productcolor.index', compact('productcolor'));
    }
    public function add()
    {
        $product = Product::all();
        $color = Color::all();
        return view('form.productcolor.add', compact('product', 'color'));
    }
    public function store(Request $request)
    {
        $productcolor = new ProductColor();
        $validator = Validator::make($request->all(), $productcolor->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $productcolor->product_id = $request->product;
        $productcolor->color_id = $request->color;
        $productcolor->save();
        return redirect()->route('index.product.color')->with('message','Color added');
    }
    public function edit($id)
    {
        $productcolor = ProductColor::with(['color', 'product'])->where('id', $id)->first();
        $product = Product::all();
        $color = Color::all();
        return view('form.productcolor.update', compact('productcolor', 'color','product'));
    }
    public function update(Request $request)
    {
       $productcolor = new ProductColor();
       $validator = Validator::make($request->all(), $productcolor->rules);
       if ($validator->fails()) {
           return redirect()->back()->withErrors($validator);
       }
       $productcolor->where('id',$request->id)->update([
         'product_id'=>$request->product,
         'color_id'=>$request->color
       ]);
       return redirect()->route('index.product.color')->with('message','Color updated');
    }
    public function delete($id)
    {
        ProductColor::where('id',$id)->delete();
        return redirect()->route('index.product.color');
    }
}
