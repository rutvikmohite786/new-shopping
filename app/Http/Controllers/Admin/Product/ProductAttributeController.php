<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;


class ProductAttributeController extends Controller
{
    public function index()
    {
        $atterProduct = ProductAttribute::with('atter', 'product', 'color')->paginate(config('const.pagination'));
        return view('form.productatter.index', compact('atterProduct'));
    }
    public function add()
    {
        $atter = Attribute::all();
        $color = Color::all();
        $product = Product::all();
        return view('form.productatter.add', compact('atter', 'color', 'product'));
    }
    public function store(Request $request)
    {
        $atterProduct = new ProductAttribute();
        $validator = Validator::make($request->all(), $atterProduct->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $atterProduct->create([
            'color_id' => $request->color,
            'product_id' => $request->product,
            'attribute_id' => $request->atter,
            'attribute_value' => $request->attervalue,
            'selling_price' => $request->sellingprice,
            'quantity'=>$request->quantity
        ]);
        return redirect()->route('index.attribute.product')->with('message', 'Color added');
    }
    public function edit($id)
    {
        $atterProduct = ProductAttribute::with('atter', 'product', 'color')->find($id);
        $atter = Attribute::all();
        $color = Color::all();
        $product = Product::all();
        return view('form.productatter.update', compact('atterProduct', 'atter', 'color', 'product'));
    }
    public function update(Request $request)
    {
        $atterProduct = new ProductAttribute();
        $validator = Validator::make($request->all(), $atterProduct->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $atterProduct->where('id', $request->id)->update([
            'color_id' => $request->color,
            'product_id' => $request->product,
            'attribute_id' => $request->atter,
            'attribute_value' => $request->attervalue,
            'selling_price' => $request->sellingprice,
            'quantity'=>$request->quantity
        ]);
        return redirect()->route('index.attribute.product')->with('message', 'Product attribute has benn updated');
    }
    public function delete($id)
    {
        ProductAttribute::where('id',$id)->delete();
        return redirect()->route('index.attribute.product')->with('error', 'Product attribute has been deleted');
    }
}
