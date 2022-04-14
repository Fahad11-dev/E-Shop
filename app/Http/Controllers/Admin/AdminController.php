<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Checkout;
use DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /*
     * Return Active User To Admin Dashboard
    */
    public function returnAdmin()
    {
        $GetAcitveUsers = User::select('*')->where('is_user_active','online')->count();
        $getOfflineUsers = User::select('*')->where('is_user_active','offline')->count();
        $getAllUsers = User::all()->count();
        return view('Admin.layout.dashboard',compact('GetAcitveUsers','getOfflineUsers','getAllUsers'));
    }


    public  function  returnCategory()
    {
        return view('Admin.layout.add_category');
    }

    public function Categories()
    {
        $category = Category::all();
        return view('Admin.layout.category',compact('category'));
    }

    public function returnProduct()
    {
        $category = Category::all();
        return view('Admin.layout.add_product',compact('category'));
    }

    public function returnProducts()
    {
        $product = Product::select("*")->leftjoin('categories','category_id','=','categories.id')->get();
        return view('Admin.layout.products', compact('product'));
    }


    public function AddCategory(Request $request)
    {
        if(!isset($request->name)){
            return redirect('/category_add')->with('message','Please add Category Name');
        }
        $addCategory = Category::insert(['name'=>$request->name]);
        return redirect('/categories');
    }


    public function productAdd(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'product_title'=>'string|required',
            'product_price'=>'required',
            'stock'=>'required',
            'product_image'=>'required',
        ]);
        if($validator->fails()){
            return redirect('/product')->withErrors($validator->errors());
        }
        $product = new Product;
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin_assets/uploads/product/',$filename);
            $product->product_image = $filename;
        }
        $product->category_id = $request->category_id;
        $product->product_title = $request->product_title;
        $product->product_price = $request->product_price;
        $product->stock = $request->stock;
        $product->save();
        return redirect('/products');
    }


    public function DeleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $productdel = Product::where(['id'=>$id])->delete();
        if($productdel){
            return redirect('/products')->with('message','Product has been deleted');
        }
    }

    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/categories');
    }

    public function editProduct($id,$category_id)
    {
        $product = Product::select("*")
        ->leftjoin('categories','products.category_id','=','categories.id')
        ->where('products.id',$id)
        ->first();
        return view('Admin.layout.update_product', compact('product'));
    }


    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.layout.update_category',compact('category'));
    }


    public function productUpdate(Request $request)
    {
        $product = Product::findOrFail($request->id);
        if ($request->hasFile('product_image')) {
            $path = 'admin_assets/uploads/product/'.$product->product_image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('product_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin_assets/uploads/product/',$filename);
            $product->product_image = $filename;

        }
        $product->category_id = $product->category_id;
        $product->product_title = $request->product_title;
        $product->product_price = $request->product_price;
        $product->stock = $request->stock;
        $product->save();
        return redirect('/products');
    }

    public function CategoryUpdate(Request $request)
    {
        $category = Category::findOrFail($request->id);
        if(!isset($request->name)){
            return redirect('/category_add')->with('message','Please add Category Name');
        }
        $category->name = $request->name;
        $category->save();
        return redirect('/categories');
    }




    public function returnInventory()
    {
        // $getdetails = User::select('*')->join('checkouts','users.id','checkouts.user_id')->select('*','checkouts.id as c_id')->get();
        $products = DB::table('products')
        ->join('categories', 'products.category_id', '=' ,'categories.id')
        ->select('products.id','products.product_title','products.product_price','products.product_image','products.product_price','products.stock'
        ,'products.created_at','categories.name')->get()->toArray();
        return view('Admin.layout.inventory',compact('products'));
    }

    public function OrderAprrove($id)
    {
        $aprroveOrder = Checkout::where('id',$id)->update(['status'=>'approve']);
        return redirect('/Orders')->with('message','Admin has Approve this order');
    }

    public function orderCancel($id)
    {
        $aprroveOrder = Checkout::where('id',$id)->update(['status'=>'cancel']);
        return redirect('/Orders')->with('message','Admin has Cancel this order');   
    }


    public function sales()
    {
        $products = DB::table('products')
        ->join('categories', 'products.category_id', '=' ,'categories.id')
        ->select('products.id','products.product_title','products.product_price','products.product_image','products.product_price','products.stock'
        ,'products.created_at','categories.name')->get()->toArray();
        return view('Admin.layout.sales',compact('products'));
    }


}
