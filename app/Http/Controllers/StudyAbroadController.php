<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\StudyAbroad;

class StudyAbroadController extends Controller
{
    public function abroadcreate(){
    	return view('cd-admin.home.studyabroad.create');
    }

    public function abroadindex(){
    	$abroads = StudyAbroad::all();
    	return view('cd-admin.home.studyabroad.index',compact('abroads'));
    }

     public function abroadshow(StudyAbroad $abr)
     {
         return view('cd-admin.home.studyabroad.show',compact('abr'));
      }

       public function abroadstatus(StudyAbroad $abr)
      {

        if($abr->active == 'Active'){
            $abr->update([
                'active' => 0
            ]);
        }else{
            $abr->update([
                'active' => 1
            ]);

        }
        return redirect()->back();
   
       }

    public function abroadstore(){
    	$request = Request()->all();
    	$a = [];
    	$a['created_at'] = Carbon::now();
    	$data = $this->validateRequest();
    	$img = $request['image'];
    	$cimg = $request['cimage'];
    	if($img)
    	{
    		$dimg = $this->vimage($img);
    		$a['image'] = $dimg;

    	}
    	if($cimg){
    		$cimg = $this->vimage($cimg);
    		$a['cimage'] = $cimg;
    	}
    	 $final = array_merge($data,$a);
    	 DB::table('study_abroads')->insert($final);
    	 return redirect('/abroadindex')->with('toast_success', 'Country Added Successfully!');

    }

     public function abroaddestroy(StudyAbroad $abr)
    {
         if(file_exists('public/uploads/studyabroad/'.$abr->image))
         {
             unlink('public/uploads/studyabroad/'.$abr->image);
          }
         $abr->delete();
         return redirect('/abroadindex')->withToastSuccess('Country Deleted !');

     }

    public function abroadupdate(StudyAbroad $abr)
    {
    	$request = Request()->all();
    	if(isset($request['image']))
    	{

    		if(isset($request['cimage'])){
				$a = [];
             $a['updated_at'] = Carbon::now();
            
             $data = $this->cvalidateRequest();

             if(file_exists('public/uploads/studyabroad/'.$abr->image))
             {
             	unlink('public/uploads/studyabroad/'.$abr->image);
             }
             $img = $request['cimage'];
			$dimg = $this->vimage($img);
			$a['cimage'] = $dimg;
			$final = array_merge($data,$a);
			DB::table('study_abroads')->where('id',$abr->id)->update($final);
			}
			$a = [];
             $a['updated_at'] = Carbon::now();
            
             $data = $this->ivalidateRequest();

             if(file_exists('public/uploads/studyabroad/'.$abr->image))
             {
             	unlink('public/uploads/studyabroad/'.$abr->image);
             }
             $img = $request['image'];
			$dimg = $this->vimage($img);
			$a['image'] = $dimg;
			$final = array_merge($data,$a);
			DB::table('study_abroads')->where('id',$abr->id)->update($final);
			return redirect('/abroadshow/'.$abr->id)->with('toast_success','Country Updated Successfully!');
    	}
    
    	elseif(isset($request['cimage']))
    	{	
    		 $a = [];
             $a['updated_at'] = Carbon::now();
            
             $data = $this->cvalidateRequest();

             if(file_exists('public/uploads/studyabroad/'.$abr->image))
             {
             	unlink('public/uploads/studyabroad/'.$abr->image);
             }
             $img = $request['cimage'];
			$dimg = $this->vimage($img);
			$a['cimage'] = $dimg;
			$final = array_merge($data,$a);
			DB::table('study_abroads')->where('id',$abr->id)->update($final);
			return redirect('/abroadshow/'.$abr->id)->with('toast_success','Country Updated Successfully!');
			
            
    	}elseif(isset($request['image']))
    	{
    		$a = [];
             $a['updated_at'] = Carbon::now();
            
             $data = $this->ivalidateRequest();

             if(file_exists('public/uploads/studyabroad/'.$abr->image))
             {
             	unlink('public/uploads/studyabroad/'.$abr->image);
             }
             $img = $request['image'];
			$dimg = $this->vimage($img);
			$a['image'] = $dimg;
			$final = array_merge($data,$a);
			DB::table('study_abroads')->where('id',$abr->id)->update($final);
			return redirect('/abroadshow/'.$abr->id)->with('toast_success','Country Updated Successfully!');

    		

    }else{
			$a = [];
			$a['updated_at'] = Carbon::now();
			$data = $this->uvalidateRequest();
			$final = array_merge($data,$a);
			DB::table('study_abroads')->where('id',$abr->id)->update($final);
			return redirect('/abroadshow/'.$abr->id)->with('toast_success','Country Updated Successfully!');
    }
}

    public function vimage($image){
    		  
    		  $file = $image;
              $fileName = time().$file->getClientOriginalName();
              $des = public_path('uploads/studyabroad');
              $file->move($des,$fileName);
              return $fileName;
    }

    public function validateRequest(){
    	return Request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'altimage' => 'required',
    		'caltimage' => 'required',
    		'seotitle' => 'required|max:65',
    		'seokeyword' => 'required|max:65',
    		'seodescription' => 'required|max:180',
    		'image' => 'required|mimes:jpeg,png,jpg,JPEG,JPG,PNG',
    		'cimage' => 'required|mimes:jpeg,png,jpg,JPEG,JPG,PNG',
    		'active' => 'required'

    	]);
    	
    }

     public function ivalidateRequest(){
    	return Request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'altimage' => 'required',
    		'caltimage' => 'required',
    		'seotitle' => 'required|max:65',
    		'seokeyword' => 'required|max:65',
    		'seodescription' => 'required|max:180',
    		'image' => 'required|mimes:jpeg,png,jpg,JPEG,JPG,PNG',
    		'active' => 'required'

    	]);
    }

    	 public function cvalidateRequest(){
    	return Request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'altimage' => 'required',
    		'caltimage' => 'required',
    		'seotitle' => 'required|max:65',
    		'seokeyword' => 'required|max:65',
    		'seodescription' => 'required|max:180',
    		'cimage' => 'required|mimes:jpeg,png,jpg,JPEG,JPG,PNG',
    		'active' => 'required'

    	]);
    	
    }

     public function uvalidateRequest(){
    	return Request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'altimage' => 'required',
    		'caltimage' => 'required',
    		'seotitle' => 'required|max:65',
    		'seokeyword' => 'required|max:65',
    		'seodescription' => 'required|max:180',
    		'cimage' => 'mimes:jpeg,png,jpg,JPEG,JPG,PNG',
    		'image' => 'mimes:jpeg,png,jpg,JPEG,JPG,PNG',
    		'active' => 'required'

    	]);
    	
    }
}
