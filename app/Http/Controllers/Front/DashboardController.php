<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index(){
        $category = Category::with('subcategorymany')->get();
        return view('web.home',compact('category'));
    }
    public function aboutUs(){
        $category = Category::with('subcategorymany')->get();
        return view('web.about',compact('category'));
    }
    public function service(){

    }
    public function contactUs(){
        $category = Category::with('subcategorymany')->get();
        return view('web.contact',compact('category'));
    }
}
