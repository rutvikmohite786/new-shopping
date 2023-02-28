<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::paginate(config('const.pagination'));
        return view('form.brand.index', compact('brand'));
    }
    public function add()
    {
        return view('form.brand.add');
    }
    public function store(Request $request)
    {
        $brand = new Brand();
        $validator = Validator::make($request->all(), $brand->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $brand->name = $request->name;
        $name = time() . '.' . $request->img->extension();
        $destinationPath = 'logo';
        $request->img->move(public_path($destinationPath), $name);
        $brand->logo = $name;
        $brand->description = $request->desc;
        $brand->save();
        return redirect()->route('index.brand.product')->with('message', 'Category added');
    }
    public function update(Request $request)
    {
       
        $brand = new Brand();
        $brandUpdate = $brand->find($request->id);
        $validator = Validator::make($request->all(), $brandUpdate->rules2);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        if (isset($request->img)) {
            $validator2 = Validator::make($request->all(), $brandUpdate->rules);
            if ($validator2->fails()) {
                return redirect()->back()->withErrors($validator2);
            }
            $name = time() . '.' . $request->img->extension();
            $destinationPath = 'logo';
            $request->img->move(public_path($destinationPath), $name);
            $brandUpdate->logo = $name;
        }
        $brandUpdate->name = $request->name;
        $brandUpdate->description = $request->desc;
        $brandUpdate->save();
        return redirect()->route('index.brand.product')->with('message', 'Brand update');

    }
    public function delete($id)
    {
        Brand::where('id', $id)->delete();
        return redirect()->route('index.brand.product')->with('error', 'Category delete');
    }
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('form.brand.update', compact('brand'));
    }
}
