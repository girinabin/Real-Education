@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
			  <li>Test Preparation</li>
			  <li>Add Test</li>
			</ul>
		</div>
			
		
				<div class="card mt-auto ">

		              <div class="card-header">

		                <h3 class="card-title text-center">Add Test Details</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form role="form" action="{{ route('testp.store') }}" method="POST" enctype="multipart/form-data">
		              	@csrf
		                <div class="card-body">
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('title')}}</div>
		                    <label for="title">Test Topic</label>
		                    <input type="text" class="form-control" id="title" placeholder="Enter Test Topic" name="title" value="{{old('title')}}">
		                  </div>
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('description')}}</div>

		                    <label for="description">Test Description</label>
		                    <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter Test Topic Details">{{old('description')}}</textarea>
		                  </div>
		                  
		                 
		                  
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('cimage')}}</div>

		                    <label for="cimage">Test Carousel Image</label>
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

		                    <label for="image">Test Body Image</label>
		                    <div class="input-group">
		                      <div class="custom-file">
		                        <input type="file" class="custom-file-input preview" id="image" name="image">
		                        <label class="custom-file-label" for="image">Choose file</label>
		                      </div>
		                      
		                    </div>
		                    <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('altimage')}}</div>

		                    <label for="altimage">Test Body Alt Image</label>
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
	                        	<label>Test  Status</label>
	                        	<select class="form-control" name="active" id="active">
	                          	<option value="">Select Test Topic Status</option>
	                          	<option value="1"{{old('active')=='1'?'selected':""}}>Active</option>
	                          	<option value="0"{{old('active')=='0'?'selected':""}}>InActive</option>
	                        	</select>
                      		</div>
						</div>
		                <!-- /.card-body -->

		                <div class="card-footer text-center">
		                  <button type="submit" class="btn btn-primary float-left">Submit</button>
		                </div>
		              </form>
		              <div class=" card-footer text-center ">
		              	<a href="{{ URL()->previous() }}"><button class="btn btn-danger float-right">Cancel</button></a>
		         	  </div>
		             
		    	</div>
		    	 
</div>
</div>
@endsection

{{-- @extends('cd-admin.home-master')
@section('page-title')
About Form
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
	<section class="content-header">
		<h1>
			About
		</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-dashboard"></i> Dashboard/About/Add About</li>
		</ol>
	</section>
	<!-- Main content -->
	
			<section class="content">
				<div class="row">
					<!-- left column -->
					<div class="col-md-12">
						<!-- general form elements -->
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Add About</h3>
							</div>
							<form role="form" method="post" action="" enctype="multipart/form-data">
								@csrf
								<div class="box-body">
									<div class="form-group">
										<div class="text text-danger">{{$errors->first('name')}}</div>
										<label for="name">About Name</label>
										<input type="text" class="form-control" name="name" value="{{old('name')}}"id="name" placeholder="Enter Name">
									</div>
									<div class="form-group">
										<div class="text text-danger">{{$errors->first('tagline')}}</div>
										<label for="name">About Tagline</label>
										<input type="text" class="form-control" name="tagline" id="name" value="{{old('tagline')}}" placeholder="Enter Tagline for name">
									</div>
									
									<div class="form-group">
										<div class="text text-danger">{{$errors->first('image')}}</div>
										<label for="name">About Image</label>
										<input type="file" class="form-control" name="image" id="image">
									</div>
									<div class="form-group">
										<div class="text text-danger">{{$errors->first('altimage')}}</div>

										<label for="altimage">Alt Image</label>
										<input type="text" class="form-control" name="altimage" value="{{old('altimage')}}" id="altimage" placeholder="Enter image name">
									</div>
									<div class="form-group">
										<div class="text text-danger">{{$errors->first('description')}}</div>

										<label for="description">About Description</label>
										<textarea name="description" class="form-control "  value="{{old('descripiton')}}"></textarea>
									</div>
									
									<div class="form-group">
										<div class="text text-danger">{{$errors->first('pdf')}}</div>

										<label for="pdf">Pdf</label>
										<input type="file" class="form-control"  name="pdf" id="pdf">
									</div>
									<div class="form-group">
										<div class="text text-danger">{{$errors->first('video')}}</div>
										<label for="video">Video link</label>
										<input type="url" class="form-control" name="video" value="{{old('video')}}" id="video">
									</div>

								</div>
								<div class="box-footer">
									<button type="submit" class="btn btn-primary">Add About</button>

								</div>
							</form>
							<div class="box-footer bn">
									<a href="{{ URL()->previous() }}"><button class="btn btn-danger pull-right">Cancel</button></a>
							</div>
						</div>
					</div>
				</div>

			</section>
	</div>			
</div>
@endsection --}}