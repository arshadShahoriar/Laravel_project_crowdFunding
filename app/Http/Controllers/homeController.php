<?php

namespace App\Http\Controllers;
use App\Models\Campaigns;
use App\Models\donation;
use App\Models\Bookmarks;
use App\Models\Reports;
use App\Models\Contractadmin;
use App\Models\volunteer;
use App\Models\user;
use Carbon\Carbon;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $req){

    	if ($req->session()->has('uid')) {
    
				

    	$campaign = Campaigns::all();
    	return view('volunteer.index',['campaigns'=>$campaign]);
    }
    else
    	return redirect('login');
    	//return view('volunteer.index');
    }

    public function createCampaigns(){

    	return view('volunteer.create_campaigns');
    }

     public function createCampaignspost(Request $req){

     	  $req->validate([
            'target_fund' => 'required',
            'raised_fund' => 'required',
            'ctype' => 'required',
            'description' => 'required',
            'Publish_date' => 'required',
            'endDate' => 'required',
            'status' => 'required',
            'title' => 'required',
             'image' => 'required',

        ]);

     	if($req->hasFile('image')){
            // get filename with the extention
            $fileNameWithExt = $req->file('image')->getClientOriginalName();

            // get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get just Ext
            $extention = $req->file('image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;

            // upload image
            $path = $req->file('image')->storeAs('public/images',$fileNameToStore);
        }else{
            $fileNameStore='noimage.jpg';
        }        

     	$campaign = new Campaigns;
     	$campaign->uid = $req->session()->get('uid');
    	$campaign->target_fund=$req->target_fund;
    	$campaign->raised_fund=$req->raised_fund;
    	$campaign->ctype=$req->ctype;
    	$campaign->description=$req->description;
    	$campaign->image=$fileNameToStore;
    	//$campaign->image=$;
    	$campaign->publisedDate=$req->Publish_date;
    	$campaign->endDate=$req->endDate;
    	$campaign->status=$req->status;
    	$campaign->title=$req->title;
    	
    	$campaign->save();
    	return redirect('home');
    }

     public function contract(){

    	return view('volunteer.contract');
    }

     public function post_contract(Request $req){

     	$req->validate([
            'description' => 'required',


        ]);
  		$dt = Carbon::now();
		$date = $dt->toDateString();

  		$contract = new Contractadmin;

  		//return $req;

     	$contract->uid = $req->session()->get('uid');
     	$contract->description	= $req->description;
    	$contract->updatedDate	= $date;

    	$contract->save();
    	return redirect('home');
    }

     public function sharedCampaigns(){

    	return "sharedCampaigns all";
    }

      public function edit($id){
      		$campaigns= Campaigns::find($id);
    		//return $campaigns;
    	return view('campaigns.Editcampaigns',['campaigns'=>$campaigns]);
    }

     public function postedit(Request $req,$id){

     		 $req->validate([
            'target_fund' => 'required',
            'raised_fund' => 'required',
            'ctype' => 'required',
            'description' => 'required',
            'Publish_date' => 'required',
            'endDate' => 'required',
            'status' => 'required',
            'title' => 'required',
             'image' => 'required',

        ]);

      		if($req->hasFile('image')){
            // get filename with the extention
            $fileNameWithExt = $req->file('image')->getClientOriginalName();

            // get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get just Ext
            $extention = $req->file('image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;

            // upload image
            $path = $req->file('image')->storeAs('public/images',$fileNameToStore);
        }else{
            $fileNameStore='noimage.jpg';
        }        

     	//$campaign = new Campaigns;
     	//$campaign = Campaigns::find($id);
     	$id=$req->id;
     	$campaign= Campaigns::where('id',$id)->first();
     	$campaign->id=$req->id;
     	
     	$campaign->uid = $req->session()->get('uid');
    	$campaign->target_fund=$req->target_fund;
    	$campaign->raised_fund=$req->raised_fund;
    	$campaign->ctype=$req->ctype;
    	$campaign->description=$req->description;
    	$campaign->image=$fileNameToStore;
    	//$campaign->image=$;
    	$campaign->publisedDate=$req->Publish_date;
    	$campaign->endDate=$req->endDate;
    	$campaign->status=$req->status;
    	$campaign->title=$req->title;
    	$campaign->update();

    		// Campaigns::where('id',$id)->update($request->all());
    	// Campaigns::where('id',$req->id)->update($req->title);
    	return redirect('home');
    }

  public function bookmark(Request $req,$id){

  		$dt = Carbon::now();
		$date = $dt->toDateString();
	
  		$bookmark = new Bookmarks;
  		$bookmark->cid=$id;
     	$bookmark->uid = $req->session()->get('uid');
    	$bookmark->UpdatedDate	= $date;

    	$bookmark->save();
    	return redirect('home');
    }

  public function report($id){
  			//$id=$id;
    	return view('campaigns.report',['id'=>$id]);
    }
    
    public function reportpost(Request $req,$id){

    	 $req->validate([
            'description' => 'required',


        ]);
  		$dt = Carbon::now();
		$date = $dt->toDateString();
	
  		$report = new Reports;

  		$report->cid=$req->id;
     	$report->uid = $req->session()->get('uid');
     	$report->description	= $req->description;
    	$report->updatedDate	= $date;

    	$report->save();
    	return redirect('home');
    }

  public function delete($id){
        $data= Campaigns::find($id);
        $data->delete();
        return redirect('home');
    }


     public function logout(Request $req){
       $req->session()->flush();
        return redirect('login');
    }

    public function donation(Request $req,$id){
      
        return view('volunteer.donation',['id'=>$id]);
    }

     public function postdonation(Request $req){
      		
      		 $req->validate([
            'amount' => 'required',


        ]);
		$dt = Carbon::now();
		$date = $dt->toDateString();
		
		$id=$req->cid;
		$newdonate=$req->amount;
  		$donate = new donation;

  		
     	$donate->uid = $req->session()->get('uid');
     	$donate->cid=$req->cid;
     	$donate->amount	= $req->amount;
    	$donate->date	= $date;

    	$donate->save();

    	
    	$campaign= Campaigns::where('id',$id)->first();

    	$amount=$campaign['raised_fund'];

    	$total= $amount+$newdonate;

    	$campaign->raised_fund=$total;

    	$campaign->update();


    	 

        return redirect('home');
    }


    public function about(Request $req){
 		$id =	$req->session()->get('uid');
 		
        $user = user::find($id);
         $volunteer = volunteer::find($id);
    	return view('volunteer.about',['users'=>$user,'volunteers'=>$volunteer]);
    }

    public function aboutpost(Request $req){

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

 			
 		$id =	$req->session()->get('uid');
 		$user= user::where('id',$id)->first();
 			
     	$user->username = $req->username;
    	$user->email=$req->email;
    	$user->password=$req->password;
    	$user->type=$req->type;
    	$user->status=$req->status;
    	$user->update();
    	//return $req;
    	//$campaign->image=$;
    	$volunteer= volunteer::where('id',$id)->first();
    	$volunteer->id=$id;
    	$volunteer->name=$req->name;
    	$volunteer->contactno=$req->contactno;
    	$volunteer->gender=$req->gender;
    	$volunteer->address=$req->address;


    	
    	$volunteer->update();
        return redirect('home');
    }





}
