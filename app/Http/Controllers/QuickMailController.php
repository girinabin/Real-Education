<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compose;

class QuickMailController extends Controller
{
    public function qindex()
    {	
    	$creplys = Compose::orderBY('id','desc')->get();
    	return view('cd-admin.home.quickmail.sentmsg',compact('creplys'));
    }

    public function qview(Compose $quick)
    {
    	return view('cd-admin.home.quickmail.sentshow',compact('quick'));
    }

    public function qdestroy(Compose $quick)
    {
    	$quick->delete();
    	return redirect('/quickmail')->withToastSuccess('Message Deleted !');
    }

    public function qcompose(Compose $quick)
    {
    	return view('cd-admin.home.quickmail.compose',compact('quick'));
    }
}
