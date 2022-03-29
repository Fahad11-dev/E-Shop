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
            $cart = Cart::where('user_id',Auth::user()->id)->count();
            $product = Product::all();
            $category = Category::all();
            return view('frontend.home',compact('product','category','cart'));
        }
            $product = Product::all();
            $category = Category::all();
            return view('frontend.home',compact('product','category'));
    }


    public function returnCategory()
    {
        $category = Category::all();
        return view('layout.header',compact('category'));
    }
}
