<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Compose;
use DB;

class DashboardController extends Controller
{
    public function logout(){

        Auth::logout();
        return redirect()->back()->withToastSuccess('Logout Successfull');
    }

    public function index()
    {	
    	// dd(Auth::guard());
    	$services = DB::table('services')->count();
    	$event = DB::table('events')->count();
    	$gallery = DB::table('albums')->count();


    	$testpreparation = DB::table('test_preparations')->count();

    	$composes = Compose::orderBy('id','desc')->get()->take(4);

        return view('cd-admin.home.home',compact('composes','services','testpreparation','event','gallery'));
    }


}
