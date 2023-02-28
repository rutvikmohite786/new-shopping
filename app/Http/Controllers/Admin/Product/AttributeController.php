<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use Illuminate\Support\Facades\Validator;


class AttributeController extends Controller
{
    public function index()
    {
        $attribute = Attribute::paginate(config('const.pagination'));
        return view('form.attribute.index', compact('attribute'));
    }
    public function add()
    {
        return view('form.attribute.add');
    }
    public function store(Request $request)
    {
        $attribute = new Attribute();
        $validator = Validator::make($request->all(), $attribute->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $attribute->create([
         'name'=>$request->name,
         'value'=>$request->value
        ]);
        return redirect()->route('index.attribute')->with('message','Attribute added');
    }
    public function edit($id)
    {
        $attribute =  Attribute::find($id);
        return view('form.attribute.update', compact('attribute'));
    }
    public function update(Request $request)
    {
        $attribute = new Attribute();
        $validator = Validator::make($request->all(), $attribute->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $attribute->where('id',$request->id)->update([
         'name'=>$request->name,
         'value'=>$request->value
        ]);
        return redirect()->route('index.attribute')->with('message','Attribute updated');
    }
    public function delete($id)
    {
        Attribute::where('id',$id)->delete();
        return redirect()->route('index.attribute')->with('error','Attribute Delete');
    }
}
