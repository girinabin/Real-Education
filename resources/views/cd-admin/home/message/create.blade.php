@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
				<li>Message</li>
				<li>Add Message</li>
			</ul>
		</div>
		
		
		<div class="card mt-auto ">
			<div class="card-header">
				<h3 class="card-title text-center">Add Message</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="{{ route('message.store') }}" method="POST">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('username')}}</div>
						<label for="username">Name</label>
						<input type="text" class="form-control" id="title" placeholder="Username" name="username" value="{{old('username')}}">
					</div>

					<div class="form-group">
						<div class="text text-danger">{{$errors->first('email')}}</div>
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
					</div>

					<div class="form-group">
						<div class="text text-danger">{{$errors->first('number')}}</div>
						<label for="number">Mobile Number</label>
						<input type="number" class="form-control" id="number" placeholder="Contact Number" name="number" value="{{old('number')}}">
					</div>

					<div class="form-group">
						<div class="text text-danger">{{$errors->first('message')}}</div>
						<label for="number">Message</label>
						<textarea type="number" class="form-control summernote"  placeholder="Type your message" name="message">{{old('number')}}</textarea> 
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