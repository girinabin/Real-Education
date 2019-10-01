<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Review;

class ReviewController extends Controller
{
    public function reviewcreate(){
    	return view('cd-admin.home.review.create');
    }

     public function reviewstore(){
    	$request = Request()->all();
        $data = $this->validateRequest();
        $a = [];
        $a['created_at'] = Carbon::now();
         $final = array_merge($data,$a);
         DB::table('reviews')->insert($final);
         return redirect('/reviewindex')->with('toast_success', 'Reveiw Added Successfully!');

    }

     public function reviewindex()
    {    $reviews = Review::all();
         return view('cd-admin.home.review.index',compact('reviews'));
     }

     public function reviewshow(Review $rev)
     {
         return view('cd-admin.home.review.show',compact('rev'));
      }

      public function reviewstatus(Review $rev)
      {

        if($rev->active == 'Active'){
            $rev->update([
                'active' => 0
            ]);
        }else{
            $rev->update([
                'active' => 1
            ]);

        }
        return redirect()->back();
   
       }

       public function reviewupdate(Review $rev)
    {      

    	  $request= Request()->all();
          $a = [];
          $a['updated_at'] = Carbon::now();
          $data = $this->validateRequest();
          $final = array_merge($data,$a);
          DB::table('reviews')->where('id',$rev->id)->update($final);
          return redirect('/reviewindex')->withToastSuccess('Review Updated Successfully!');
     }

     public function reviewdestroy(Review $rev)
    {
         
         $rev->delete();
         return redirect('/reviewindex')->withToastSuccess('Review Deleted !');

     }

     public function validateRequest(){
    	return Request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'college' =>'required',
    		'active' => 'required'

    	]);
    	
    }
}
