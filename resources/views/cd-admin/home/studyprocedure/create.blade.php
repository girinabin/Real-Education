@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
				<li>Study Procedure</li>
				<li>Add Procedure</li>
			</ul>
		</div>
		
		
		<div class="card mt-auto ">
			<div class="card-header">
				<h3 class="card-title text-center">Add Procedure</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="{{ route('pro.store') }}" method="POST">
				@csrf
				<div class="card-body">

					<div class="form-group">
						<div class="text text-danger">{{$errors->first('step')}}</div>
						<label for="step">Steps</label>
						<input type="number" class="form-control" id="step" placeholder="Enter Steps" name="step" value="{{old('step')}}">
					</div>
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('title')}}</div>
						<label for="title">Title</label>
						<input type="text" class="form-control" id="title" placeholder="Abroad Study Procedure Title" name="title" value="{{old('title')}}">
					</div>
					
					
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('description')}}</div>
						<label for="description"> Description</label>
						<textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter Event Description">{{old('description')}}</textarea>
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
