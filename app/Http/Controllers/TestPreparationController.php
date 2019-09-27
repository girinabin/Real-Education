<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\TestPreparation;

class TestPreparationController extends Controller
{
     public function testpcreate(){
    	return view('cd-admin.home.testpreparation.create');
    }

    public function testpindex(){
    	$testps = TestPreparation::all();
    	return view('cd-admin.home.testpreparation.index',compact('testps'));
    }

     public function testpstatus(TestPreparation $tst)
      {

        if($tst->active == 'Active'){
            $tst->update([
                'active' => 0
            ]);
        }else{
            $tst->update([
                'active' => 1
            ]);

        }
        return redirect()->back();
   
       }

     public function testpstore(){
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
    	 DB::table('test_preparations')->insert($final);
    	 return redirect('/testpindex')->with('toast_success', 'Test Added Successfully!');

    }

    public function testpshow(TestPreparation $tst)
     {
         return view('cd-admin.home.testpreparation.show',compact('tst'));
      }

       public function testpdestroy(TestPreparation $tst)
    {
         if(file_exists('public/uploads/testpreparation/'.$tst->image))
         {
             unlink('public/uploads/testpreparation/'.$tst->image);
          }
         $tst->delete();
         return redirect('/testpindex')->withToastSuccess('Test  Deleted !');

     }

     public function vimage($image){
    		  
    		  $file = $image;
              $fileName = time().$file->getClientOriginalName();
              $des = public_path('uploads/testpreparation');
              $file->move($des,$fileName);
              return $fileName;
    }

    public function testpupdate(TestPreparation $tst)
    {
    	$request = Request()->all();
    	if(isset($request['image']))
    	{

    		if(isset($request['cimage'])){
				$a = [];
             $a['updated_at'] = Carbon::now();
            
             $data = $this->cvalidateRequest();

             if(file_exists('public/uploads/testpreparation/'.$tst->image))
             {
             	unlink('public/uploads/testpreparation/'.$tst->image);
             }
             $img = $request['cimage'];
			$dimg = $this->vimage($img);
			$a['cimage'] = $dimg;
			$final = array_merge($data,$a);
			DB::table('test_preparations')->where('id',$tst->id)->update($final);
			}
			$a = [];
             $a['updated_at'] = Carbon::now();
            
             $data = $this->ivalidateRequest();

             if(file_exists('public/uploads/testpreparation/'.$tst->image))
             {
             	unlink('public/uploads/testpreparation/'.$tst->image);
             }
             $img = $request['image'];
			$dimg = $this->vimage($img);
			$a['image'] = $dimg;
			$final = array_merge($data,$a);
			DB::table('test_preparations')->where('id',$tst->id)->update($final);
			return redirect('/testpshow/'.$tst->id)->with('toast_success','Test Updated Successfully!');
    	}
    
    	elseif(isset($request['cimage']))
    	{	
    		 $a = [];
             $a['updated_at'] = Carbon::now();
            
             $data = $this->cvalidateRequest();

             if(file_exists('public/uploads/testpreparation/'.$tst->image))
             {
             	unlink('public/uploads/testpreparation/'.$tst->image);
             }
             $img = $request['cimage'];
			$dimg = $this->vimage($img);
			$a['cimage'] = $dimg;
			$final = array_merge($data,$a);
			DB::table('test_preparations')->where('id',$tst->id)->update($final);
			return redirect('/testpshow/'.$tst->id)->with('toast_success','Test Updated Successfully!');
			
            
    	}elseif(isset($request['image']))
    	{
    		$a = [];
             $a['updated_at'] = Carbon::now();
            
             $data = $this->ivalidateRequest();

             if(file_exists('public/uploads/test_preparations/'.$tst->image))
             {
             	unlink('public/uploads/test_preparations/'.$tst->image);
             }
             $img = $request['image'];
			$dimg = $this->vimage($img);
			$a['image'] = $dimg;
			$final = array_merge($data,$a);
			DB::table('test_preparations')->where('id',$tst->id)->update($final);
			return redirect('/testpshow/'.$tst->id)->with('toast_success','Test Updated Successfully!');

    		

    }else{
			$a = [];
			$a['updated_at'] = Carbon::now();
			$data = $this->uvalidateRequest();
			$final = array_merge($data,$a);
			DB::table('test_preparations')->where('id',$tst->id)->update($final);
			return redirect('/testpshow/'.$tst->id)->with('toast_success','Test Updated Successfully!');
    }
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
