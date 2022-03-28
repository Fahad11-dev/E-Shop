<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function returnHome()
    {
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
