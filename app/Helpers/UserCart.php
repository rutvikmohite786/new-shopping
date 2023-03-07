<?php

use App\Models\UserCart;

function user_cart_data(){
   $userCart = UserCart::where('user_id',auth()->user()->id)->get();
   return $userCart;
}