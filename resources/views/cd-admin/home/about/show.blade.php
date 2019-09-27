@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li><a href="#">About Us</a></li>
		  <li><a href="#">View About</a></li>
		</ul>
		</div>
			
		
	<div class="card mt-auto ">
              <div class="card-header">

                <h3 class="card-title text-center">About US</h3>
                
                <p><strong>Title:</strong>{{e($about['title'])}}</p>
                
                <p><strong>About Description:</strong>{!! $about['description'] !!}</p>
                <p><strong>{{e($about['mtitle'])}}</strong></p>
                <img src="{{ asset('uploads/about/'.$about['image']) }}" style="height: 350px;width: 350px;" alt="">
                <p class="mt-3"><strong>Message From Director:</strong>{!!$about['message']!!}</p>
                <p><strong>Seo Title:</strong>{{e($about['seotitle'])}}</p>
                <p><strong>Seo Keyword:</strong>{{e($about['seokeyword'])}}</p>
                <p><strong>Seo Description:</strong>{!!$about['seodescription']!!}</p>

              <div class="card-footer clearfix ">
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#aboutedit">Edit About</button>
              </div>
            </div>

              
              
            </div>
</div>
</div>

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="aboutedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit About Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form role="form" action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="card-body">
                      <div class="form-group">
                        <div class="text text-danger">{{$errors->first('title')}}</div>
                        <label for="title">About Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter About title" name="title" value="{{$about['title']}}">
                      </div>
                      <div class="form-group">
                        <div class="text text-danger">{{$errors->first('description')}}</div>

                        <label for="description">About Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter About Description">{{$about['description']}}</textarea>
                      </div>
                      <div class="form-group">
                        <div class="text text-danger">{{$errors->first('mtitle')}}</div>
                        
                        <label for="mtitle">Director Message Title</label>
                        <input type="text" class="form-control" id="mtitle" placeholder="Enter Directore Message Title" name="mtitle" value="{{$about['mtitle']}}">
                      </div>
                      <div class="form-group">
                        <div class="text text-danger">{{$errors->first('message')}}</div>

                        <label for="description">Director Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control summernote" placeholder="Enter Director Message">{{$about['message']}}</textarea>
                      </div>
                      <div class="form-group">
                        <div class="text text-danger">{{$errors->first('image')}}</div>

                        <label for="image">Director Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input preview" id="image" name="image" value="{{$about['image']}}">
                            <label class="custom-file-label" for="image">Choose file</label>
                          </div>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="text text-danger">{{$errors->first('altimage')}}</div>

                        <label for="altimage">Alt Image</label>
                        <input type="text" class="form-control" id="altimage" placeholder="Enter image name" name="altimage" value="{{$about['altimage']}}">
                      </div>
                      <div class="form-group">
                        <div class="text text-danger">{{$errors->first('seotitle')}}</div>
                        <label for="seotitle">Seo Title</label>
                        <input type="text" class="form-control" name="seotitle" id="seotitle" value="{{e($about['seotitle'])}}" placeholder="Enter Seo title : not more than 60 character">
                      </div>
                      <div class="form-group">
                        <div class="text text-danger">{{$errors->first('seokeyword')}}</div>
                        <label for="seokeyword">Seo Keyword</label>
                        <input type="text" class="form-control" name="seokeyword" id="seokeyword" value="{{e($about['seokeyword'])}}" placeholder="Enter Seo keyword : not more than 60 character">
                      </div>
                      <div class="form-group">
                        <div class="text text-danger">{{$errors->first('seodescription')}}</div>
                        <label for="name">Seo Description</label>
                        <textarea name="seodescription" class="form-control summernote" placeholder="Enter Seo description : between 50-160 character">{!!$about['seodescription']!!}</textarea>
                      </div>
              </div>  
      
               <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update About</button>
               </div>
       </form>

    </div>
  </div>
</div>
@endsection