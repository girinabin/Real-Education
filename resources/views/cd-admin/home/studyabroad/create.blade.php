@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
			  <li>Study Abroad</li>
			  <li>Add Country</li>
			</ul>
		</div>
			
		
				<div class="card mt-auto ">

		              <div class="card-header">

		                <h3 class="card-title text-center">Add Country Details</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form role="form" action="{{ route('abroad.store') }}" method="POST" enctype="multipart/form-data">
		              	@csrf
		                <div class="card-body">
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('title')}}</div>
		                    <label for="title">Country Name</label>
		                    <input type="text" class="form-control" id="title" placeholder="Enter Country Name" name="title" value="{{old('title')}}">
		                  </div>
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('description')}}</div>

		                    <label for="description">Country Details</label>
		                    <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter Country Details">{{old('description')}}</textarea>
		                  </div>
		                  
		                 
		                  
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('cimage')}}</div>

		                    <label for="cimage">Country Carousel Image</label>
		                    <div class="input-group">
		                      <div class="custom-file">
		                        <input type="file" class="custom-file-input preview" id="cimage" name="cimage">
		                        <label class="custom-file-label" for="cimage">Choose file</label>
		                      </div>
		                      
		                    </div>
		                  </div>
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('caltimage')}}</div>

		                    <label for="caltimage">Carousel Alt Image</label>
		                    <input type="text" class="form-control" id="caltimage" placeholder="Enter carousel image name" name="caltimage" value="{{old('caltimage')}}">
		                  </div>

		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('image')}}</div>

		                    <label for="image">Country Body Image</label>
		                    <div class="input-group">
		                      <div class="custom-file">
		                        <input type="file" class="custom-file-input preview" id="image" name="image">
		                        <label class="custom-file-label" for="image">Choose file</label>
		                      </div>
		                      
		                    </div>
		                    <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('altimage')}}</div>

		                    <label for="altimage">Country Body Alt Image</label>
		                    <input type="text" class="form-control" id="altimage" placeholder="Enter  image name" name="altimage" value="{{old('altimage')}}">
		                  </div>
		                  </div>
			                <div class="form-group">
								<div class="text text-danger">{{$errors->first('seotitle')}}</div>
								<label for="seotitle">Seo Title</label>
								<input type="text" class="form-control" name="seotitle" id="seotitle" value="{{old('seotitle')}}" placeholder="Enter Seo title : not more than 60 character">
							</div>
							<div class="form-group">
								<div class="text text-danger">{{$errors->first('seokeyword')}}</div>
								<label for="seokeyword">Seo Keyword</label>
								<input type="text" class="form-control" name="seokeyword" id="seokeyword" value="{{old('seokeyword')}}" placeholder="Enter Seo keyword : not more than 60 character">
							</div>
							<div class="form-group">
								<div class="text text-danger">{{$errors->first('seodescription')}}</div>
								<label for="name">Seo Description</label>
								<textarea name="seodescription" class="form-control summernote" placeholder="Enter Seo description : between 50-160 character"></textarea>
							</div>
							<div class="form-group">
								<div class="text text-danger">{{$errors->first('active')}}</div>
	                        	<label>Country  Status</label>
	                        	<select class="form-control" name="active" id="active">
	                          	<option value="">Select Country Status</option>
	                          	<option value="1"{{old('active')=='1'?'selected':""}}>Active</option>
	                          	<option value="0"{{old('active')=='0'?'selected':""}}>InActive</option>
	                        	</select>
                      		</div>
						</div>
		                <!-- /.card-body -->

		                <div class="card-footer text-center">
		                  <button type="submit" class="btn btn-primary float-left">Submit</button>
		                  <a href="{{ URL()->previous() }}" class="btn btn-danger float-right">Cancel</a>
		                </div>
		              </form>
		              
		             
		    	</div>
		    	 
</div>
</div>
@endsection

