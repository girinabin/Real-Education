<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\About;

class AboutController extends Controller
{
    public function aboutcreate(){
    	return view('cd-admin.home.about.create');
    }
    public function aboutshow(){
        $about = About::first();
    	return view('cd-admin.home.about.show',compact('about'));
    }
    public function aboutstore(){
    	$request = Request()->all();
    	$data = $this->validateRequest();
    	$a = [];
        $a['created_at'] = Carbon::now();
        if(isset($request['image']))
        {
             $file = $request['image'];
             $fileName = time().$file->getClientOriginalName();
             $des = public_path('uploads/about');
             $file->move($des,$fileName);
             $a['image'] = $fileName;
         }
         $final = array_merge($data,$a);
         DB::table('abouts')->insert($final);
         return redirect('/aboutindex')->with('toast_success', 'About Us Added Successfully!');

    }
    public function aboutupdate()
    {   
        $request = Request()->all(); 
        $about = DB::table('abouts')->first();
         if(isset($request['image']))
         {
             $a = [];
             $a['updated_at'] = Carbon::now();
            
             $data = $this->validateRequest();
             
             if(file_exists('public/uploads/about/'.$about->image))
             {
                 unlink('public/uploads/about/'.$about->image);
             }
              $file = $request['image'];
              $fileName = time().$file->getClientOriginalName();
              $des = public_path('uploads/about');
              $file->move($des,$fileName);
              $a['image'] = $fileName;
              $final = array_merge($data,$a);
              DB::table('abouts')->update($final);
              return redirect('/aboutshow')->with('toast_success','About Us Updated Successfully!');
          }
          $a = [];
          $a['updated_at'] = Carbon::now();
          $data = $this->uvalidateRequest();
          $final = array_merge($data,$a);
          DB::table('abouts')->update($final);
          return redirect('/aboutshow')->withToastSuccess('About Us Updated Successfully!');

     }

    public function validateRequest(){
    	return Request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'mtitle' => 'required',
    		'message' => 'required',
    		'altimage' => 'required',
    		'seotitle' => 'required|max:65',
    		'seokeyword' => 'required|max:65',
    		'seodescription' => 'required|max:180',
    		'image' => 'required|mimes:jpeg,png,jpg,JPEG,JPG,PNG',

    	]);
    	
    }

    public function uvalidateRequest(){
        return Request()->validate([
            'title' => 'required',
            'description' => 'required',
            'mtitle' => 'required',
            'message' => 'required',
            'altimage' => 'required',
            'seotitle' => 'required|max:65',
            'seokeyword' => 'required|max:65',
            'seodescription' => 'required|max:180',
            'image' => 'mimes:jpeg,png,jpg,JPEG,JPG,PNG',

        ]);
        
    }
}
