<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderBaner;
use Illuminate\Support\Facades\Validator;
use File;

class BannerController extends Controller
{
    public function index(){
        $banner = SliderBaner::paginate(config('const.pagination'));
        return view('form.banner.slider.index', compact('banner'));
    }
    public function add(){
        return view('form.banner.slider.add');
    }
    public function store(Request $request){
        $banner = new SliderBaner();
        $validator = Validator::make($request->all(), $banner->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $banner->name = $request->name;
        $banner->description =  $request->desc;
        $banner->link = $request->link;
        //image store
        $name = time() . '.' . $request->img->extension();
        $destinationPath = 'images/banner/slider';
        $request->img->move(public_path($destinationPath), $name);

        $banner->image =  $name;
        $banner->save();
        return redirect()->route('index.banner.product')->with('message', 'Banner added');

    }
    public function edit($id){
      $banner = SliderBaner::find($id);
      return view('form.banner.slider.update', compact('banner'));      
    }
    public function update(Request $request){
        // dd($request->all());
        $banner = new SliderBaner();
        $validator = Validator::make($request->all(), $banner->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $bannerUpdate = $banner->find($request->id);
        $bannerUpdate->name = $request->name;
        $bannerUpdate->description =  $request->desc;   
        $bannerUpdate->link = $request->link;
        if($request->img){
            $validator2 = Validator::make($request->all(), $banner->rules2);
            if ($validator2->fails()) {
                return redirect()->back()->withErrors($validator2);
            }
            $destinationPath = 'images/banner/slider';
            if(File::exists($bannerUpdate->image.'/'.$destinationPath)) {
                File::delete($bannerUpdate->image.'/'.$destinationPath);
            }
            $name = time() . '.' . $request->img->extension();
            $request->img->move(public_path($destinationPath), $name);
            $bannerUpdate->image =  $name;
        }
        $bannerUpdate->save();
        return redirect()->route('index.banner.product')->with('message', 'Banner update');
    }
    public function delete($id){
       SliderBaner::where('id',$id)->delete();
       return redirect()->route('index.banner.product')->with('error', 'Sider has been deleted');
    }
}
