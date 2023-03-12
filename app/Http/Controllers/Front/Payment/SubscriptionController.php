<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class SubscriptionController extends Controller
{
    public function index(){
        $plans = Plan::get();
        return view("web.payment.subscription", compact("plans"));
    }
    public function paymentSubscription($id, Request $request){
        $intent = auth()->user()->createSetupIntent();
        $plan =  Plan::find($id);
        return view("web.payment.subscriptiondetail", compact("plan", "intent"));
    }
    public function buySubscription(Request $request){
        $plan = Plan::find($request->plan);
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
                        ->create($request->token);
        // return view("subscription_success");
    }
}
