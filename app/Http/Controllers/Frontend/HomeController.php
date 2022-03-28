<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function returnHome()
    {
        $cart = Cart::where('user_id',Auth::user()->id)->count();
        $product = Product::all();
        $category = Category::all();
        return view('frontend.home',compact('product','category','cart'));
    }


    public function returnCategory()
    {
        $category = Category::all();
        return view('layout.header',compact('category'));
    }
}
