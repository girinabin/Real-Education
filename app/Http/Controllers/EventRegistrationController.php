<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\EventRegister;

class EventRegistrationController extends Controller
{
    public function eregistercreate()
    {
    	return view('cd-admin.home.eventregistration.create');
    }

    public function eregisterstore()
    {
    	$request = Request()->all();
    	$data = $this->requestvalidate();
    	$a = [];
    	$a['created_at'] = Carbon::now();
    	$final = array_merge($data,$a);
    	DB::table('event_registers')->insert($final);
   	 	return redirect()->back()->with('toast_success', 'Event Registration Successfully!');
    }

    public function eregisterindex()
    {
    	$eregisters = EventRegister::all();
   		return view('cd-admin.home.eventregistration.index',compact('eregisters'));
    }

     public function eregistershow(EventRegister $er)
    {
   		return view('cd-admin.home.eventregistration.show',compact('er'));
    }

    public function eregistercompose(EventRegister $er)
    {
   		return view('cd-admin.home.eventregistration.compose',compact('er'));
    }

    public function eregisterdestroy(EventRegister $er)
    {	
    	$er->delete();
  		return redirect('/eregisterindex')->with('toast_success', 'Event Registration Deleted Successfully!');
    }

    public function requestvalidate(){

    	return Request()->validate([
    		'username' => 'required',
    		'email' => 'required|email',
    		'number' => 'required|integer',
    		'event' => 'required',

    	]);
    }
}
