<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){

    	return view('login.index');
    }


     public function redirectToGoogle(){

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $req){

        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user,$req);
    }


    public function verify(Request $request){

    	$request->validate([
            'username' => 'required',
            'password' => 'required',

        ]);


    	$user = user::where('username',$request->username)
                            ->where('password',$request->password)
                            ->first();
        if($user != ""){
        if($request->username =="admin" && $request->password == "admin"){
            return "admin";
        }
        else if($user["type"] ==3){
        	$request->session()->put('username',$user['username']);
        	$request->session()->put('uid',$user['id']);
        	$request->session()->put('email',$user['email']);
        	$request->session()->put('type',$user['type']);
            return redirect('/home');
        }
    }
        else{
        		echo "worng username/pass";
             return redirect('/login');
        
        }
    }

      public function _registerOrLoginUser($data,Request $req){
        $user = User::where('provider_id',$data->id)->first();
        if(!$user){
            $user = new User();
            $user->username = $data->email;
            $user->password = "";
            $user->email = $data->email;
            //$user->image = $data->avatar;
            $user->type = 3;
            $user->status = 1;
            $user->provider_id = $data->id;
            $user->save();

            // $admin = new Admin();
            // $admin->name = $data->name;
            // // $admin->phone = $req->phone;
            // // $admin->address = $req->address;
            // // $admin->sq = $req->sq;
            // $admin->uid = $user->id;
            // $admin->save();

            $req->session()->put('uname',$user->username);
            $req->session()->put('utype',$user->type);
            $req->session()->put('uid',$user->id);
            echo "<h1>Login Successfull </h1>";
           //  return redirect('/home');
        }
        else{
            $req->session()->put('uname',$user->username);
            $req->session()->put('utype',$user->type);
            $req->session()->put('uid',$user->id);
             //return redirect('/home');
            echo "<h1>Login Successfull else</h1>";
        }
    }


}
