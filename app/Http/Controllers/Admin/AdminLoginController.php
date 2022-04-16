<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function AdminAuth(Request $request)
    {
        if(!isset($request->email)){
            return redirect('/E-Shop-Admin')->with('message','Email is Required');
        }
            else if(!isset($request->password)){
                return redirect('/E-Shop-Admin')->with('message','Password is Required');
            }
        else{

            $credentials = request(['email','password']);
//            dd($credentials);
            if(Auth::attempt($credentials)){
                return redirect('/dashboard');
            }else{
                return redirect('/E-Shop-Admin')->with('message','Your Credentials Does Not Match Our Record');
            }
       }

    }




    public function logoutAdmin()
    {
        Auth()->logout();
        return redirect('/E-Shop-Admin')->with('message','Logout Successfully');
    }
}
