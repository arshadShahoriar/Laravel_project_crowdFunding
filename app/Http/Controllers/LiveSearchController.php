<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Campaigns;
use App\Models\donation;
use App\Models\Bookmarks;
use App\Models\Reports;
use App\Models\Contractadmin;
use App\Models\volunteer;
use App\Models\user;

class LiveSearchController extends Controller
{
    function index()
    {
    	
     return view('live_search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('Campaigns')
         ->where('id', 'like', '%'.$query.'%')
         ->orwhere('title', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('Campaigns')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
                <td>'.$row->title.'</td>
                <td>'.$row->target_fund.'</td>
                <td>'.$row->raised_fund.'</td>
             
                <td>'.$row->ctype.'</td>
            
            
               <td>'.$row->description.'</td>
               <td>'.$row->image.'</td>
               <td>'.$row->publisedDate.'</td>
               <td>'.$row->endDate.'</td>
               <td>'.$row->status.'</td>

         
          
         
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}

