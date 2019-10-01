@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
				<li>Carousel</li>
				<li>Add Carousel</li>
			</ul>
		</div>
		
		
		<div class="card mt-auto ">
			<div class="card-header">
				<h3 class="card-title text-center">Add Carousel Details</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					
					
					
					
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('image')}}</div>
						<label for="image">Carousel Image</label>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input preview" id="image" name="image">
								<label class="custom-file-label" for="image">Choose file</label>
							</div>
							
						</div>
					</div>
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('altimage')}}</div>
						<label for="altimage">Carousel Alt Image</label>
						<input type="text" class="form-control" id="altimage" placeholder="Enter Carousel image name" name="altimage" value="{{old('altimage')}}">
					</div>
					
					
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('description')}}</div>
						<label for="name">Carousel Description</label>
						<textarea name="description" class="form-control summernote" placeholder="Enter Carousel description "></textarea>
					</div>
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('active')}}</div>
						<label>Carousel  Status</label>
						<select class="form-control" name="active" id="active">
							<option value="">Select Carousel Status</option>
							<option value="1"{{old('active')=='1'?'selected':""}}>Active</option>
							<option value="0"{{old('active')=='0'?'selected':""}}>InActive</option>
						</select>
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