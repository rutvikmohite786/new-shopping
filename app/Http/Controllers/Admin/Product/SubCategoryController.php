<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
  public function index()
  {
    $sub = SubCategory::with('category')->paginate(5);
    $cat = Category::all();
    return view('form.subcategory.sub', compact('sub', 'cat'));
  }
  public function add(){
    $category = Category::all(); 
    return view('form.subcategory.add', compact('category'));
  }
  public function store(Request $request)
  {
      $sub = new SubCategory();
      $validator = Validator::make($request->all(),$sub->rules);
      if ($validator->fails()) {
         return redirect()->back()->withErrors($validator);
      }
      //image store
      $name = time() . '.' . $request->img->extension();
      $destinationPath = 'images/subcategory';
      $request->img->move(public_path($destinationPath), $name);
      $sub->image = $name;

      $sub->categories_id =  $request->category;
      $sub->name = $request->name;
      $sub->save();
      return redirect()->route('index.subcategory')->with('message','Category added');
  }
  public function edit($id)
  {
    $data =  SubCategory::with('category')->where('id', $id)->first();
    $category = Category::all();
    return view('form.subcategory.update',compact('data','category'));
  }
  public function delete($id){
      SubCategory::find($id)->delete();
      return redirect()->back();
  }
  public function update(Request $request){
      $subcategory = new SubCategory();
      $validator = Validator::make($request->all(),$subcategory->rules);
      if ($validator->fails()) {
         return redirect()->back()->withErrors($validator);
      } 
      if (isset($request->img)) {
        // $validator2 = Validator::make($request->all(), $category->rules2);
        // if ($validator2->fails()) {
        //    return redirect()->back()->withErrors($validator2);
        // }
        $name = time() . '.' . $request->img->extension();
        $destinationPath = 'images/subcategory';
        $request->img->move(public_path($destinationPath), $name);
        //$categoryUpdate->image = $name;
      }
      $subcategory->where('id',$request->id)->update([
        'name'=>$request->name,
        'categories_id'=>$request->category,
        'image'=>$name
     ]);
     return redirect()->route('index.subcategory')->with('message','Category updeted');
  }
}
