<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SliderBaner;

class DashboardController extends Controller
{
    public function index(){
        $banner = SliderBaner::all();
        return view('web.home',compact('banner'));
    }
    public function aboutUs(){
        return view('web.about');
    }
    public function service(){

    }
    public function contactUs(){
        return view('web.contact');
    }
    public function servicePage(){
        return view('web.service');
    }
    public function contactStore(Request $request){
        dd($request->all());
    }
}
