<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){

    	return view('login.index');
    }

    public function verify(Request $request){

    	$user = user::where('username',$request->username)
                            ->where('password',$request->password)
                            ->first();
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
        else{
        		echo "worng username/pass";
             return redirect('/login');
        
        }
    }
}
