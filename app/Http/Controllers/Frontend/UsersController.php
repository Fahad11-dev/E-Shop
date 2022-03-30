<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function returnLogin()
    {
        return view('frontend.login');
    }

    public function returnRegister()
    {
        return view('frontend.register');
    }

    /*
     * Register Function For User
    */
    public function DoRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|string|min:6|max:25|regex:/^(?=.*[a-zA-Z])(?=.*[0-9]).{6,}$/',
        ]);
        if($validator->fails()){
            return redirect('/register')->withErrors($validator->errors());
        }
        $data = $request->all();
        if(!filter_var($data['email'] , FILTER_VALIDATE_EMAIL)){
            return redirect('/register')->with('message','Your Email is Not Valid');
        }
        $user = new User([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
            'is_active'=>'active'
        ]);
        if($user->save()){
            return redirect('/login')->with('message','Please Login to Continue');
        }
    }


    /*
     * Login Function For User
    */
    public function DoLogin(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(),[
            'email'=> 'required|string|email|regex:/(.+)@(.+)\.(.+)/i',
            'password'=>'required|string'
        ]);
        if($validator->fails()) {
            return redirect('/login')->withErrors($validator->errors());
        }
        #Check Email IF EXIST
        $checkEmail = User::where(['email'=>$data['email']])->exists();
        if(!$checkEmail){
            return redirect('/login')->with('message','Your Email does not exist');
        }

        $credentials = request(['email','password']);
        if (Auth::attempt($credentials)) {
            if(Auth::user()->status == 'inactive'){
                return redirect('/login')->with('message','Your Account is not Active');
            }
            $updateStatus = User::where('id',Auth::user()->id)->update(['is_user_active'=>'online']);
            return redirect()->intended('/');
        }else{
            return redirect('/login')->with('message','Password is Incorrect');
        }
    }

    /*
     * Logout Function For User
    */
    public function DoLogout()
    {
        $updateStatus = User::where('id',Auth::user()->id)->update(['is_user_active'=>'offline']);
        Auth()->logout();
        return redirect('/login')->with('message','You have been logged out');
    }
}
