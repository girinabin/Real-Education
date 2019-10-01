@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
				<li>Review</li>
				<li>Add Review</li>
			</ul>
		</div>
		
		
		<div class="card mt-auto ">
			<div class="card-header">
				<h3 class="card-title text-center">Add Review</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('title')}}</div>
						<label for="title">Review Title</label>
						<input type="text" class="form-control" id="title" placeholder="Enter Student Name" name="title" value="{{old('title')}}">
					</div>
					
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('college')}}</div>
						<label for="title">University Name</label>
						<input type="text" class="form-control" id="college" placeholder="Enter University Name" name="college" value="{{old('college')}}">
					</div>
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('description')}}</div>
						<label for="description">Review Description</label>
						<textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter Review Description">{{old('description')}}</textarea>
					</div>
					
				
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('active')}}</div>
						<label>Review Status</label>
						<select class="form-control" name="active" id="active">
							<option value="">Select Review Status</option>
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