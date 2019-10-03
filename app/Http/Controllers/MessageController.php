<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Mail;
use App\Message;
use App\Mail\MessageFormMail;
use App\MessageReply;
use App\EventRegister;


class MessageController extends Controller
{	
	public function messagecreate()
    {
    	return view('cd-admin.home.message.create');
    }
    
    public function messagestore()
    {
    	$request = Request()->all();
    	$data = $this->requestvalidate();
    	$a = [];
    	$a['created_at'] = Carbon::now();
    	$final = array_merge($data,$a);
    	DB::table('messages')->insert($final);
   	 	return redirect()->back()->with('toast_success', 'Message Added Successfully!');
    }

     public function messageindex()
    {
    	$messages = Message::orderBy('id','desc')->get();
   		return view('cd-admin.home.message.index',compact('messages'));
    }

     public function messageshow(Message $msg)
    {
   		return view('cd-admin.home.message.show',compact('msg'));
    }

    public function messagecompose(Message $msg)
    {   
   		return view('cd-admin.home.message.compose',compact('msg'));
    }

    public function messagesentshow(MessageReply $msg)
    {
   		return view('cd-admin.home.message.sentshow',compact('msg'));
    }

     public function messagereply()
     { 

        $data = request()->validate([
            'emailto' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'message_id' => 'required'
        ]);
        $a = [];
        $a['created_at'] = Carbon::now();
        $final = array_merge($a,$data);
        DB::table('message_replies')->insert($final);
        Mail::to($data['emailto'])->send(new \App\Mail\MessageFormMail($data));
        return redirect('/messageindex')->with('toast_success', ' Message Sent Successfully!');

        

    }

    public function messagesent()
    {
        $messages = MessageReply::orderBy('id','desc')->get();
        $eregisters = EventRegister::all();


        return view('cd-admin.home.message.sentmsg',compact('messages','eregisters'));
    }

    public function inboxdestroy(Message $msg)
    {
    	$msg->delete();
    	return redirect('/messageindex')->with('toast_success', ' Message Deleted Successfully!');
    }

    public function sentdestroy(MessageReply $msg)
    {
    	$msg->delete();
    	return redirect('/messagesent')->with('toast_success', ' Message Deleted Successfully!');
    }
    public function requestvalidate(){

    	return Request()->validate([
    		'username' => 'required',
    		'email' => 'required|email',
    		'number' => 'required|integer',
    		'message' => 'required',

    	]);
    }

}
