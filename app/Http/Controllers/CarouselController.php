<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Carousel;

class CarouselController extends Controller
{
    public function carouselcreate(){
    	return view('cd-admin.home.carousel.create');
    }

    public function carouselstore(){
    	$request = Request()->all();
        $data = $this->validateRequest();
        $a = [];
        $a['created_at'] = Carbon::now();
        if(isset($request['image']))
        {
             $file = $request['image'];
             $fileName = time().$file->getClientOriginalName();
             $des = public_path('uploads/carousel');
             $file->move($des,$fileName);
             $a['image'] = $fileName;
         }
         $final = array_merge($data,$a);
         DB::table('carousels')->insert($final);
         return redirect('/carouselindex')->with('toast_success', 'Carousel Added Successfully!');

    }

    public function carouselindex()
    {    $carousels = Carousel::all();
         return view('cd-admin.home.carousel.index',compact('carousels'));
     }

    public function carouselstatus(Carousel $car)
      {

        if($car->active == 'Active'){
            $car->update([
                'active' => 0
            ]);
        }else{
            $car->update([
                'active' => 1
            ]);

        }
        return redirect()->back();
   
       }
       public function carouselshow(Carousel $car)
     {
         return view('cd-admin.home.carousel.show',compact('car'));
      }
 
      	public function carouseldestroy(Carousel $car)
    {
         if(file_exists(public_path('uploads/carousel/'.$car->image)))
         {
             unlink(public_path('uploads/carousel/'.$car->image));
          }
         $car->delete();
         return redirect('/carouselindex')->withToastSuccess('Carousel Deleted !');

     } 

    public function validateRequest(){
    	return Request()->validate([
    		'description' => 'required',
    		'altimage' => 'required',
    		'image' => 'required|mimes:jpeg,png,jpg,JPEG,JPG,PNG',
    		'active' => 'required'

    	]);
    	
    }
}
