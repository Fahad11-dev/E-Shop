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
        $total = Cart::where(['user_id'=>$user_id,'status'=>'incomplete'])->sum('total_price');
        $items = Cart::where('user_id',$user_id)->select("id")
        ->leftjoin('products','carts.product_id','=','products.id')->select('*','carts.id as c_id')->get();
        $category = Category::all();
        $cart = Cart::where(['user_id'=>$user_id,'status'=>'incomplete'])->count();
        return view('frontend.cart',compact('items','cart','total','category'));

        return view('frontend.cart',compact('cart','total','category'));

    }


    public function Cartadd(Request $request)
    {

        $id = $request->id;
        if(Auth::check())
        {

            $product = Product::find($id);            
            $data = Cart::where('product_id',$id)->first();
            if($data != ""){
            $increase = $data['product_quantity']+1;
            $updateqty = Cart::where('product_id',$id)->update(['product_quantity'=>$increase]);
            $updateqty = Cart::where('product_id',$id)->sum('total_price');
            return response()->json(['subtotal'=>$updateqty]);
            } 
            
            $cart = Cart::insert([
                'user_id'=>auth()->user()->id,
                'product_id'=>$id,
                'product_title'=>$product->product_title,
                'product_price'=>$product->product_price,
                'product_quantity'=>1,
                'total_price'=>$product->product_price,
            ]);

            $product = Product::findOrFail($id);
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $id;
            $cart->product_title = $product->product_title;
            $cart->product_price = $product->product_price;
            $cart->product_quantity = 1;
            $cart->total_price = $product->product_price;
            $cart->status = 'incomplete';
            $cart->save();

//            return view('/cart',compact('category'));

        }else{
           return  redirect('/login')->with('message','You Have to Login');
        }
    }




    public function cartUpdate(Request $request)
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('id',$request->id)
        ->update(['product_quantity'=>$request->quantity,'total_price'=>$request->total]);

        $subtotal = Cart::where(['user_id'=>$user_id,'status'=>'incomplete'])->sum('total_price');
        return response()->json(['result'=>$request->total,'subtotal'=>$subtotal]);
    }




    public function deleteItem($id)
    {
        $deleteItem = Cart::find($id);
        $deleteItem->delete();
        return redirect('/cart');
        $total = Cart::where(['user_id'=>$user_id,'status'=>'incomplete'])->sum('total_price');
        return response()->json(['result'=>$request->total,'total'=>$total]);

    }
}
