<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\volunteer;
use Illuminate\Http\Request;

class registrationController extends Controller
{
    public function index(){
    
				
    	//return "post";
    	return view('registration.index');
    
   
    	//return view('volunteer.index');
    }

    public function register(Request $req){
        
        $req->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:3|max:10',
            'type' => 'required',
            'status' => 'required',
            'name' => 'required',
            'contactno' => 'required',
            'gender' => 'required',
             'address' => 'required',


        ]);
         

				$user = new user;
     	$user->username = $req->username;
    	$user->email=$req->email;
    	$user->password=$req->password;
    	$user->type=$req->type;
    	$user->status=$req->status;
    	$user->save();
    	//return $req;
    	//$campaign->image=$;
    	$volunteer = new volunteer();
    	$volunteer->id='1';
    	$volunteer->name=$req->name;
    	$volunteer->contactno=$req->contactno;
    	$volunteer->gender=$req->gender;
    	$volunteer->address=$req->address;


    	
    	$volunteer->save();
    	return redirect('login');


    	//return view('registration.index');
    
   
    	//return view('volunteer.index');
    }



}
