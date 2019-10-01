@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
				<li>Choose US</li>
				<li>Add Feature</li>
			</ul>
		</div>
		
		
		<div class="card mt-auto ">
			<div class="card-header">
				<h3 class="card-title text-center">Add Feature</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="{{ route('choose.store') }}" method="POST">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('title')}}</div>
						<label for="title">Feature Title</label>
						<input type="text" class="form-control" id="title" placeholder="Enter Feature Title" name="title" value="{{old('title')}}">
					</div>
					
					
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('description')}}</div>
						<label for="description">Feature Description</label>
						<textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter Feature Description">{{old('description')}}</textarea>
					</div>
					
				
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('active')}}</div>
						<label>Feature Status</label>
						<select class="form-control" name="active" id="active">
							<option value="">Select Feature Status</option>
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