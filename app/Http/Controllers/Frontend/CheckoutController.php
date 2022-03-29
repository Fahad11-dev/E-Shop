<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function returnCheckout()
    {
        $user_id = Auth::user()->id;
        // $user_details = Checkout::
        // dd($user_details);
        return view('frontend.checkout');
    }

    public function CheckOut(Request $request)
    {
        $user_id = Auth::user()->id;
        
        $status  = $request->status;
        foreach($request->cart_id as $cart){
            $checkout = Checkout::insertGetId(['user_id'=>$user_id,'cart_id'=>$cart,'status'=>$status]);
            dd($checkout);
        }
        
    }

}
