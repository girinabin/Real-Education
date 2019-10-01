<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Service;
use Alert;


class ServiceController extends Controller
{
    public function servicecreate(){
    	return view('cd-admin.home.service.create');
    }

    public function servicestore(){
    	$request = Request()->all();
        $data = $this->validateRequest();
        $a = [];
        $a['created_at'] = Carbon::now();
        if(isset($request['image']))
        {
             $file = $request['image'];
             $fileName = time().$file->getClientOriginalName();
             $des = public_path('uploads/service');
             $file->move($des,$fileName);
             $a['image'] = $fileName;
         }
         $final = array_merge($data,$a);
         DB::table('services')->insert($final);
         return redirect('/serviceindex')->with('toast_success', 'Service Added Successfully!');

    	


    }

    public function serviceindex()
    {    $services = Service::all();
         return view('cd-admin.home.service.index',compact('services'));
     }

    public function serviceupdate(Service $serv)
    {      $request= Request()->all();
         if(isset($request['image']))
         {
             $a = [];
             $a['updated_at'] = Carbon::now();
            
             $data = $this->validateRequest();
             
             
             if(file_exists('public/uploads/service/'.$serv->image))
             {
                 unlink('public/uploads/service/'.$serv->image);
             }
              $file = $request['image'];
              $fileName = time().$file->getClientOriginalName();
              $des = public_path('uploads/service');
              $file->move($des,$fileName);
              $a['image'] = $fileName;
              $final = array_merge($data,$a);
              DB::table('services')->where('id',$serv->id)->update($final);
              return redirect('/serviceindex')->with('toast_success','Review Updated Successfully!');
          }
          $a = [];
          $a['updated_at'] = Carbon::now();
          $data = $this->uvalidateRequest();
          $final = array_merge($data,$a);
          DB::table('services')->where('id',$serv->id)->update($final);
          return redirect('/serviceindex')->withToastSuccess('Review Updated Successfully!');
     }

     public function serviceshow(Service $serv)
     {
         return view('cd-admin.home.service.show',compact('serv'));
      }

      public function servicestatus(Service $serv)
      {

        if($serv->active == 'Active'){
            $serv->update([
                'active' => 0
            ]);
        }else{
            $serv->update([
                'active' => 1
            ]);

        }
        return redirect()->back();
   
       }

    public function servicedestroy(Service $serv)
    {
         if(file_exists('public/uploads/service/'.$serv->image))
         {
             unlink('public/uploads/service/'.$serv->image);
          }
         $serv->delete();
         return redirect('/serviceindex')->withToastSuccess('Service Deleted !');

     }


    public function validateRequest(){
    	return Request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'altimage' => 'required',
    		'seotitle' => 'required|max:65',
    		'seokeyword' => 'required|max:65',
    		'seodescription' => 'required|max:180',
    		'image' => 'required|mimes:jpeg,png,jpg,JPEG,JPG,PNG',
    		'active' => 'required'

    	]);
    	
    }
    public function uvalidateRequest(){
        return Request()->validate([
            'title' => 'required',
            'description' => 'required',
            'altimage' => 'required',
            'seotitle' => 'required|max:65',
            'seokeyword' => 'required|max:65',
            'seodescription' => 'required|max:180',
            'image' => 'mimes:jpeg,png,jpg,JPEG,JPG,PNG',
            'active' => 'required'

        ]);
        
    }
}
