<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function returnHome()
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $cart = Cart::where(['user_id'=>$user_id,'status'=>'incomplete'])->count();
            $product = Product::all();
            $category = Category::all();
            $items = Cart::where('user_id',$user_id)->select("id")
            ->leftjoin('products','carts.product_id','=','products.id')->select('*','carts.id as c_id')->get();
            return view('frontend.home',compact('product','category','cart','items'));
        }
            $product = Product::all();
            $category = Category::all();
            return view('frontend.home',compact('product','category'));
    }

}
