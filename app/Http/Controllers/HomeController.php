<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::count();
        $category = Category::count();
        $product = Product::count();
        $subcategory = SubCategory::count();
        return view('welcome', compact('user', 'category', 'product', 'subcategory'));
    }
    public function dashboard(){
        $user = User::count();
        $category = Category::count();
        $product = Product::count();
        $subcategory = SubCategory::count();    
        $count = [$user,$category,$product,$subcategory];
        $name = ['user','category','product','subcategory'];    
        return view('welcome', compact('user', 'category', 'product', 'subcategory'))->with('year',json_encode($name,JSON_NUMERIC_CHECK))->with('name',json_encode($count,JSON_NUMERIC_CHECK));
    }
}
