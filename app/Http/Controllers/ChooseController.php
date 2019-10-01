<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\ChooseUs;

class ChooseController extends Controller
{
     public function choosecreate(){
    	return view('cd-admin.home.choose.create');
    }

    public function choosestore(){
    	$request = Request()->all();
        $data = $this->validateRequest();
        $a = [];
        $a['created_at'] = Carbon::now();
         $final = array_merge($data,$a);
         DB::table('choose_us')->insert($final);
         return redirect('/chooseindex')->with('toast_success', 'Feature Added Successfully!');

    }

    public function chooseindex()
    {    $chooses = ChooseUs::all();
         return view('cd-admin.home.choose.index',compact('chooses'));
     }

     public function chooseshow(ChooseUs $cho)
     {
         return view('cd-admin.home.choose.show',compact('cho'));
      }

      public function choosestatus(ChooseUs $cho)
      {

        if($cho->active == 'Active'){
            $cho->update([
                'active' => 0
            ]);
        }else{
            $cho->update([
                'active' => 1
            ]);

        }
        return redirect()->back();
   
       }

         public function chooseupdate(ChooseUs $cho)
    {      

    	  $request= Request()->all();
          $a = [];
          $a['updated_at'] = Carbon::now();
          $data = $this->validateRequest();
          $final = array_merge($data,$a);
          DB::table('choose_us')->where('id',$cho->id)->update($final);
          return redirect('/chooseindex')->withToastSuccess('Feature Updated Successfully!');
     }

      public function choosedestroy(ChooseUs $cho)
    {
         
         $cho->delete();
         return redirect('/chooseindex')->withToastSuccess('Feature Deleted !');

     }

    public function validateRequest(){
    	return Request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'active' => 'required'

    	]);
    	
    }

}
