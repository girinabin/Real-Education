<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Event;
class EventController extends Controller
{
    public function eventcreate(){
    	return view('cd-admin.home.event.create');
    }

    public function eventstore(){
    	$request = Request()->all();
        $data = $this->validateRequest();
        $a = [];
        $a['created_at'] = Carbon::now();
         $final = array_merge($data,$a);
         DB::table('events')->insert($final);
         return redirect('/eventindex')->with('toast_success', 'Event Added Successfully!');

    }

     public function eventindex()
    {    $events = Event::all();
         return view('cd-admin.home.event.index',compact('events'));
     }

     public function eventshow(Event $eve)
     {
         return view('cd-admin.home.event.show',compact('eve'));
      }

      public function eventstatus(Event $eve)
      {

        if($eve->active == 'Active'){
            $eve->update([
                'active' => 0
            ]);
        }else{
            $eve->update([
                'active' => 1
            ]);

        }
        return redirect()->back();
   
       }

         public function eventupdate(Event $eve)
    {      

    	  $request= Request()->all();
          $a = [];
          $a['updated_at'] = Carbon::now();
          $data = $this->validateRequest();
          $final = array_merge($data,$a);
          DB::table('events')->where('id',$eve->id)->update($final);
          return redirect('/eventindex')->withToastSuccess('Event Updated Successfully!');
     }

      public function eventdestroy(Event $eve)
    {
         
         $eve->delete();
         return redirect('/eventindex')->withToastSuccess('Event Deleted !');

     }

    public function validateRequest(){
    	return Request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'time' =>'required',
    		'active' => 'required'

    	]);
    	
    }
}
