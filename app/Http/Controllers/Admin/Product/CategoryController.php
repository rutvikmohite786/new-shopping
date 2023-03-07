<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
   public function index()
   {
      $category = Category::paginate(config('const.pagination'));
      return view('form.category.category', compact('category'));
   }
   public function add()
   {
      return view('form.category.add');
   }
   public function store(Request $request)
   {
      $category = new Category();
      $validator = Validator::make($request->all(), $category->rules);
      if ($validator->fails()) {
         return redirect()->back()->withErrors($validator);
      }
      $category->name = $request->name;

      $name = time() . '.' . $request->img->extension();
      $destinationPath = 'images/category';
      $request->img->move(public_path($destinationPath), $name);
      $category->image = $name;
      $category->save();
      return redirect()->route('index.category')->with('message', 'Category added');
   }
   public function edit($id)
   {
      $data = Category::find($id);
      return view('form.category.update', compact('data'));
   }
   public function delete($id)
   {
      Category::where('id', $id)->delete();
      return redirect()->back();
   }
   public function update(Request $request)
   {
      $category = new Category();
      $validator = Validator::make($request->all(), $category->rules);
      if ($validator->fails()) {
         return redirect()->back()->withErrors($validator);
      }
      $categoryUpdate = $category->find($request->id);
      $categoryUpdate->name = $request->name;
      if (isset($request->img)) {
         $validator2 = Validator::make($request->all(), $category->rules2);
         if ($validator2->fails()) {
            return redirect()->back()->withErrors($validator2);
         }
         $name = time() . '.' . $request->img->extension();
         $destinationPath = 'images/category';
         $request->img->move(public_path($destinationPath), $name);
         $categoryUpdate->image = $name;
      }
      $categoryUpdate->save();

      // $category->where('id', $request->id)->update([
      //    'name' => $request->name
      // ]);
      return redirect()->route('index.category')->with('message', 'Category updeted');
   }
}
