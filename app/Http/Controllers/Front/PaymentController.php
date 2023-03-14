<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\ProductAttribute;

class PaymentController extends Controller
{

    public function produtPaymentDetail(Request $request)
    {
        $productAttr = ProductAttribute::where('product_id',$request->id)->first();
        $price = $productAttr->selling_price*$request->quantity;
        $product_id = $request->id;
        return view('web.payment.buy',compact('price','product_id'));
        // return view('web.payment.buy',['data'=>$request->all()]);
    }
    public function stripePost(Request $request)
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51MiZ7ZSACc6Xcr5BjtHIfAqZXuHzZw2dywB5pGuALdaM02BKjKkvZPWlL6c6xz6gSa3uj9UnwNM6Xar2m3kCiwcE00sgxULXUr'
        );
        $stripe->paymentIntents->create([
            'amount' => 5000,
            'currency' => 'inr',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);
        Session::flash('success', 'Payment Successfull!');
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }
}
