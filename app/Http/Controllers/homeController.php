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
use PDF;
use Goutte\Client;
use App\Http\Requests;
use Illuminate\Http\Request;

class homeController extends Controller
{

	private $states = [];
    private $bd_states = [];

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

    

     public function search_campaigns(Request $req){


    	return redirect('LiveSearch');
    }

     public function generateReport()
	 {

	 	$campaign = donation::all();
    	return view('report.reportgenerate',['campaigns'=>$campaign]);

       // return view('admin.report');
    }

    public function downloadReport(Request $req)
    {	

    		//$variable = donation::all();
    		$campaigns = donation::all();

    	 $pdf = PDF::loadView('report.download',compact('campaigns'));

         //$pdf = PDF::loadView('report.reportgenerate',compact('variable'));
        return $pdf->download('donations.pdf');
       }

    public function searchCampaign(Request $req){
        if($req->ajax()){
            $campaign = Campaign::getCampaignBySearch($req);
            return response()->json($campaign);
        }
        else{
            return Redirect()->Back();
        }
    }

     public function allcampaignlist(Request $req){
       

       	$client = new Client();
        
        $page = $client->request('GET', 'http://localhost:3000/home/campaigns');
        // echo '<pre>';
        // print_r($page);
        // $total = $page->filter('.maincounter-number')->text();

        $page->filter('.maincounter-number')->each(function($item) {
            array_push($this->states, $item->text());
            //echo $item->text();
        });

        $page_bd = $client->request('GET', 'http://localhost:3000/home/campaigns');

        $page_bd->filter('.maincounter-number1')->each(function($item) {
            array_push($this->bd_states, $item->text());
        });

        $result = $this->returnResult();

        return response($result, 200);
    }

        private function returnResult() {
        $output = [];
        $output['first_title'] = $this->states[0];
        $output['second_title'] = $this->states[1];
        $output['third_title'] = $this->states[2];

        $output['1st_discription'] = $this->bd_states[0];
        $output['2st_discription'] = $this->bd_states[1];
        $output['3st_discription'] = $this->bd_states[2];

        return $output;
    }





}
