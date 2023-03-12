<?php

use App\Models\UserCart;

function user_cart_data(){
   $userCart = UserCart::with('product','productatter')->where('user_id',auth()->user()->id)->get();
   //  dd($userCart);
   return $userCart;
}