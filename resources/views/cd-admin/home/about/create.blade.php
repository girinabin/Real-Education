@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
			  <li><a href="#">About Us</a></li>
			  <li><a href="#">Add About</a></li>
			</ul>
		</div>
			
		
				<div class="card mt-auto ">

		              <div class="card-header">

		                <h3 class="card-title text-center">About US</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form role="form" action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
		              	@csrf
		                <div class="card-body">
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('title')}}</div>
		                    <label for="title">About Title</label>
		                    <input type="text" class="form-control" id="title" placeholder="Enter About title" name="title" value="{{old('title')}}">
		                  </div>
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('description')}}</div>

		                    <label for="description">About Description</label>
		                    <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter About Description">{{old('description')}}</textarea>
		                  </div>
		                  
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('mtitle')}}</div>
		                  	
		                    <label for="mtitle">Director Message Title</label>
		                    <input type="text" class="form-control" id="mtitle" placeholder="Enter Directore Message Title" name="mtitle" value="{{old('mtitle')}}">
		                  </div>
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('message')}}</div>

		                    <label for="description">Director Message</label>
		                    <textarea name="message" id="message" cols="30" rows="10" class="form-control summernote" placeholder="Enter Director Message">{{old('message')}}</textarea>
		                  </div>
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('image')}}</div>

		                    <label for="image">Director Image</label>
		                    <div class="input-group">
		                      <div class="custom-file">
		                        <input type="file" class="custom-file-input preview" id="image" name="image">
		                        <label class="custom-file-label" for="image">Choose file</label>
		                      </div>
		                      
		                    </div>
		                  </div>
		                  <div class="form-group">
		                  	<div class="text text-danger">{{$errors->first('altimage')}}</div>

		                    <label for="altimage">Alt Image</label>
		                    <input type="text" class="form-control" id="altimage" placeholder="Enter image name" name="altimage" value="{{old('altimage')}}">
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
						</div>
		                <!-- /.card-body -->

		                <div class="card-footer text-center">
		                  <button type="submit" class="btn btn-primary float-left">Submit</button>
		                  <a href="{{ URL()->previous() }}" class="btn btn-danger float-right">Go Back</a>
		                </div>
		              </form>
		              
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