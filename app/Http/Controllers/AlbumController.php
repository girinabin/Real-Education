<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Album;
use App\Image;


class AlbumController extends Controller
{
    public function albumcreate(){
    	return view('cd-admin.home.album.create');
    }

    public function imagecreate($id){
    	$album =  Album::where('id',$id)->get()->first();
    	return view('cd-admin.home.album.imagecreate',compact('album'));
    }

     public function albumstore(){
    	$request = Request()->all();
        $data = $this->validateRequest();
        $a = [];
        $a['created_at'] = Carbon::now();
        if(isset($request['image']))
        {
             $file = $request['image'];
             $fileName = time().$file->getClientOriginalName();
             $des = public_path('uploads/album');
             $file->move($des,$fileName);
             $a['image'] = $fileName;
         }
         $final = array_merge($data,$a);
         DB::table('albums')->insert($final);
         return redirect('/albumindex')->with('toast_success', 'Album Added Successfully!');

    }

    public function imagestore(){
    	$request = Request()->all();

        $data = $this->ivalidateRequest();
        $a = [];
        $a['created_at'] = Carbon::now();
        if(isset($request['image']))
        {
             $file = $request['image'];
             $fileName = time().$file->getClientOriginalName();
             $des = public_path('uploads/image');
             $file->move($des,$fileName);
             $a['image'] = $fileName;
         }
         $final = array_merge($data,$a);
         DB::table('images')->insert($final);


         return redirect('/albumshow/'.$final['album_id'])->with('toast_success', 'Image Added Successfully!');

    }
    

    public function albumindex()
    {    $albums = Album::all();
         return view('cd-admin.home.album.index',compact('albums'));
     }

     public function albumshow(Album $alb)
     {	
     	$images = Image::all();
         return view('cd-admin.home.album.show',compact('alb','images'));
      } 

     public function albumstatus(Album $alb)
      {

        if($alb->active == 'Active'){
            $alb->update([
                'active' => 0
            ]);
        }else{
            $alb->update([
                'active' => 1
            ]);

        }
        return redirect()->back();
   
       }

       public function imagestatus(Image $img)
      {

        if($img->active == 'Active'){
            $img->update([
                'active' => 0
            ]);
        }else{
            $img->update([
                'active' => 1
            ]);

        }
        return redirect()->back();
   
       }

       	public function imagedestroy(Image $img)
    {
         if(file_exists(public_path('uploads/image/'.$img->image)))
         {
             unlink(public_path('uploads/image/'.$img->image));
          }
         $img->delete();
         return redirect()->back()->withToastSuccess('image Deleted !');

     } 

       	public function albumdestroy(Album $alb)
    {
         if(file_exists(public_path('uploads/album/'.$alb->image)))
         {	
             unlink(public_path('uploads/album/'.$alb->image));

         }
             $img = Image::where('album_id',$alb->id)->get();

             foreach($img as $im)
             {
             if(file_exists(public_path('uploads/image/'.$im->image)))
         		{
             		unlink(public_path('uploads/image/'.$im->image));
         	 	}
         	 	$im->delete();
             }
          
         $alb->delete();
         return redirect('/albumindex')->withToastSuccess('Album Deleted !');

     } 

    public function validateRequest(){
    	return Request()->validate([
    		'name' => 'required',
    		'altimage' => 'required',
    		'seotitle' => 'required|max:65',
    		'seokeyword' => 'required|max:65',
    		'seodescription' => 'required|max:180',
    		'image' => 'required|mimes:jpeg,png,jpg,JPEG,JPG,PNG',
    		'active' => 'required'

    	]);
    	
    }

    public function ivalidateRequest(){
    	return Request()->validate([
    		'altimage' => 'required',
    		'image' => 'required|mimes:jpeg,png,jpg,JPEG,JPG,PNG',
    		'active' => 'required',
    		'album_id' => 'required'

    	]);
    	
    }
}
