@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
				<li>Albums</li>
				<li>Add Album</li>
			</ul>
		</div>
		
		
		<div class="card mt-auto ">
			<div class="card-header">
				<h3 class="card-title text-center">Add Album Details</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('name')}}</div>
						<label for="name">Album Name</label>
						<input type="text" class="form-control" id="name" placeholder="Enter Album Name" name="name" value="{{old('name')}}">
					</div>
					
					
					
					
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('image')}}</div>
						<label for="image">Album Image</label>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input preview" id="image" name="image">
								<label class="custom-file-label" for="image">Choose file</label>
							</div>
							
						</div>
					</div>
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('altimage')}}</div>
						<label for="altimage">Album Alt Image</label>
						<input type="text" class="form-control" id="altimage" placeholder="Enter Album image name" name="altimage" value="{{old('altimage')}}">
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
						<label>Album  Status</label>
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
					<a href="{{ URL()->previous() }}"class="btn btn-danger float-right">Go Back</a>
				</div>
			</form>
			
			
		</div>
		
	</div>
</div>
@endsection
