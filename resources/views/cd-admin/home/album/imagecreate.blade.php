@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
				<li>Albums</li>
				<li><a href="{{ route('album.index') }}">View Album</a></li>
				<li><a href="{{ route('album.show',$album['id']) }}">Album Details</a></li>
				<li>Add Image</li>
			</ul>
		</div>
		
		
		<div class="card mt-auto ">
			<div class="card-header">
				<h3 class="card-title text-center">Add Image Details</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<strong>Album Name:</strong>{{strtoupper(e($album['name']))}}
						<input type="hidden" name="album_id" value="{{$album['id']}}">
					</div>
			
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('image')}}</div>
						<label for="image"> Image</label>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input preview" id="image" name="image">
								<label class="custom-file-label" for="image">Choose file</label>
							</div>
							
						</div>
					</div>
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('altimage')}}</div>
						<label for="altimage"> Alt Image</label>
						<input type="text" class="form-control" id="altimage" placeholder="Enter  image name" name="altimage" value="{{old('altimage')}}">
					</div>
					
					
					
					
					
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('active')}}</div>
						<label>Image  Status</label>
						<select class="form-control" name="active" id="active">
							<option value="">Select Album Status</option>
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
