<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\StudyProcedure;

class StudyProcedureController extends Controller
{
     public function procreate()
    {
    	return view('cd-admin.home.studyprocedure.create');
    }

    public function prostore()
    {
    	$a = [];
    	$a['created_at'] = Carbon::now();
    	$data = $this->requestvalidate();
    	$final  = array_merge($a,$data);
    	DB::table('study_procedures')->insert($final);
    	return redirect()->back()->with('toast_success', 'Procedure Added Successfully!');


    }

    public function requestvalidate()
    {
    	$data = Request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'step' =>'required|unique:study_procedures',
    		
    	]);
    	return $data;
    }

    public function urequestvalidate()
    {
    	$data = Request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'step' =>'required',
    		
    	]);
    	return $data;
    }

    public function proindex()
    {
    	$events = StudyProcedure::orderBy('step','asc')->get();
    	return view('cd-admin.home.studyprocedure.index',compact('events'));
    }

    public function proupdate(StudyProcedure $pro)
    {
    	$a = [];
    	$a['updated_at'] = Carbon::now();
    	$data = $this->urequestvalidate();
    	$final = array_merge($a,$data);
    	DB::table('study_procedures')->where('id',$pro->id)->update($final);
    	return redirect('/procedureindex')->withToastSuccess('Procedure Updated Successfully');
    }

    public function proshow(StudyProcedure $pro)
    {
         return view('cd-admin.home.studyprocedure.show',compact('pro'));
     }

     public function prodestroy(StudyProcedure $pro)
     {  
         $pro->delete();
         return redirect()->route('pro.index')->withToastSuccess('Procedure Deleted Successfully');
      }
}

