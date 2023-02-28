<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductPricestock;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductPricestocksController extends Controller
{
    public function index(){
        $productpricestock = ProductPricestock::with('product')->paginate(config('const.pagination'));
        return view('form.productpricestock.index', compact('productpricestock'));
    }
    public function add(){
        $product = Product::all();
        return view('form.productpricestock.add', compact('product'));
    }
    public function store(Request $request){
        $pricestock = new ProductPricestock();
        $validator = Validator::make($request->all(), $pricestock->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $pricestock->create([
            'product_id'=>$request->product,
            'unit_price'=>$request->unitprice,
            'discount_amount'=>$request->discountamount,
            'quantity'=>$request->quantity,
            'selling_price'=>$request->sellingprice
        ]);
        return redirect()->route('index.pricestock.product')->with('message','Product added');
    }
    public function edit($id){
     $pricestock = ProductPricestock::find($id);
     $product = Product::all();
     return view('form.productpricestock.update',compact('pricestock','product'));
    }
    public function update(Request $request){
        $pricestock = new ProductPricestock();
        $validator = Validator::make($request->all(), $pricestock->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $pricestock->where('id',$request->id)->update([
            'product_id'=>$request->product,
            'unit_price'=>$request->unitprice,
            'discount_amount'=>$request->discountamount,
            'quantity'=>$request->quantity,
            'selling_price'=>$request->sellingprice
        ]);
        return redirect()->route('index.pricestock.product')->with('message','Product added');
    }
    public function delete($id){
        ProductPricestock::where('id',$id)->delete();
        return redirect()->route('index.pricestock.product')->with('error','Product added');
    }
}
