<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function returnCart()
    {

        $user_id = Auth::user()->id;
        $total = Cart::where(['user_id'=>$user_id])->sum('total_price');
        $items = Cart::where('user_id',$user_id)->select("id")
        ->leftjoin('products','carts.product_id','=','products.id')->select('*','carts.id as c_id')->get();
        $category = Category::all();
        $cart = Cart::where(['user_id',$user_id,'status'=>'incomplete'])->count();
        return view('frontend.cart',compact('items','cart','total','category'));
    }


    public function Cartadd(Request $request)
    {
        $id = $request->id;
        if(Auth::check())
        {
            $product = Product::findOrFail($id);
            $cart = Cart::insert([
                'user_id'=>auth()->user()->id,
                'product_id'=>$id,
                'product_title'=>$product->product_title,
                'product_price'=>$product->product_price,
                'product_quantity'=>1,
                'total_price'=>$product->product_price,
            ]);
            // $category = Category::all();
            // return view('frontend.cart',compact('category'));
        }else{
           return  redirect('/login')->with('message','You Have to Login');
        }
    }




    public function cartUpdate(Request $request)
    {
        // /dd($request->all());
        $user_id = Auth::user()->id;
        $cart = Cart::where('id',$request->id)
        ->update(['product_quantity'=>$request->quantity,'total_price'=>$request->total]);
        return response()->json(['result'=>$request->total]);
    }
}
