<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function returnCheckout()
    {
        $user_id = Auth::user()->id;
        $category = Category::all();
        $cart = Cart::where(['user_id'=>$user_id,'status'=>'incomplete'])->count();
        $total = Cart::where(['user_id'=>$user_id,'status'=>'incomplete'])->sum('total_price');
        return view('frontend.checkout',compact('total','category','cart'));
    }

    public function CheckOut(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = $request->all();
        if(!isset($data['full_name'])){
            return redirect('/checkout')->with('message','Full name is required');
        }else if(!isset($data['number'])){
            return redirect('/checkout')->with('message','Number is required');
        }else if(!isset($data['country_name'])){
            return redirect('/checkout')->with('message','Country is required');
        }else if(!isset($data['state_province'])){
            return redirect('/checkout')->with('message','State province is required');
        }else if(!isset($data['address'])){
            return redirect('/checkout')->with('message','Address is required');
        }else if(!isset($data['post'])){
            return redirect('/checkout')->with('message','Postal Code is required');
        }else if(!isset($data['card_number'])){
            return redirect('/checkout')->with('message','Card Number is required');
        }else if(!isset($data['card_expiry'])){
            return redirect('/checkout')->with('message','Expiry Date is required');
        }else if(!isset($data['security_number'])){
            return redirect('/checkout')->with('message','Security Number is required');
        }
        $nameCheck = Checkout::where(['phone'=>$data['number']])->exists();
        if($nameCheck){
            return redirect('/checkout')->with('message','Number Already Exist');
        }
        $checkout = new Checkout;
        $checkout->user_id = $user_id;
        $checkout->full_name = $request->full_name;
        $checkout->phone = $request->number;
        $checkout->country_name = $request->country_name;
        $checkout->state_province = $request->state_province;
        $checkout->address = $request->address;
        $checkout->postal_code = $request->post;
        $checkout->card_number = $request->card_number;
        $checkout->card_expiry = $request->card_expiry;
        $checkout->security_number = $request->security_number;
        $checkout->total_price = $request->total_price;
        $checkout->status = 'pending';
        $checkout->save();
        $updateCart = Cart::where('user_id',$user_id)->update(['status'=>'complete']);
        return redirect('/checkout')->with('success','Order Placed');
       
        
        
        

    }

}
