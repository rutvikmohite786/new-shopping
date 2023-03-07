<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FilterController extends Controller
{
    public function userFilter(Request $request){
        dd($request->all());
        $data =  User::where('email_verified_at',null);
        if($request->has('name')){
          $data->orderBy('id','desc');
        
          
        }
        // if($request->name=="desc"){
        //     $user->orderBy('name','desc');
        // }
        $user =  $data->paginate(config('const.pagination'));
        return view('form.user.index', compact('user'));
    }
}
