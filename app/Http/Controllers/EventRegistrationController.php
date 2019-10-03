<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\EventRegister;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventFormMail; 
use App\Mail\QuickFormMail; 

use App\ContactReply;

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

    public function eregistersentmsg()
    {
        $creplys = ContactReply::all();
        $eregisters = EventRegister::all();

        return view('cd-admin.home.eventregistration.sentmsg',compact('creplys','eregisters'));
    }

     public function eregistershow(EventRegister $er)
    {
   		return view('cd-admin.home.eventregistration.show',compact('er'));
    }

    public function eregistercompose(EventRegister $er)
    {   
   		return view('cd-admin.home.eventregistration.compose',compact('er'));
    }

    public function eregistercompose1()
    {   
        return view('cd-admin.home.eventregistration.compose1');
    }

    public function eregisterdestroy(EventRegister $er)
    {	
    	$er->delete();
  		return redirect('/eregisterindex')->with('toast_success', 'Event Registration Deleted Successfully!');
    }

    public function eregisterreply()
     { 

        $data = request()->validate([
            'emailto' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'contact_id' => 'required'
        ]);
        $a = [];
        $a['created_at'] = Carbon::now();
        $final = array_merge($a,$data);
        DB::table('contact_replies')->insert($final);
        Mail::to($data['emailto'])->send(new EventFormMail($data));
        return redirect('/eregisterindex')->with('toast_success', ' Message Sent Successfully!');

        

    }

    public function eregisterreply1()
     {

        $data = request()->validate([
            'emailto' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $a = [];
        $a['created_at'] = Carbon::now();
        $final = array_merge($a,$data);

        DB::table('composes')->insert($final);
        Mail::to($data['emailto'])->send(new QuickFormMail($data));
        return redirect()->back()->with('toast_success', ' Message Sent Successfully!');

        

    }

    public function einboxdestroy(EventRegister $eve)
    {   
        $eve->delete();
        return redirect('/eregisterindex')->with('toast_success', ' Message Deleted Successfully!');
    }

    public function esentdestroy(ContactReply $eve)
    {
        $eve->delete();
        return redirect('/eregistersentmsg')->with('toast_success', ' Message Deleted Successfully!');
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
