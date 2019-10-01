@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
			<ul class="breadcrumb float-right">
				<li>Event Registration</li>
				<li>Add Registration</li>
			</ul>
		</div>
		
		
		<div class="card mt-auto ">
			<div class="card-header">
				<h3 class="card-title text-center">Add Registration</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="{{ route('eregister.store') }}" method="POST">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('username')}}</div>
						<label for="username">Username</label>
						<input type="text" class="form-control" id="title" placeholder="Username" name="username" value="{{old('username')}}">
					</div>

					<div class="form-group">
						<div class="text text-danger">{{$errors->first('email')}}</div>
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
					</div>

					<div class="form-group">
						<div class="text text-danger">{{$errors->first('number')}}</div>
						<label for="number">Contact Number</label>
						<input type="number" class="form-control" id="number" placeholder="Contact Number" name="number" value="{{old('number')}}">
					</div>
					
					
					
					<div class="form-group">
						<div class="text text-danger">{{$errors->first('event')}}</div>
						<label>Choose Event</label>
						<select class="form-control" name="event" id="event">
							<option value="">Select Event</option>
							<option value="event1">event1</option>
							<option value="event2">event2</option>
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