@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li>EventsRegistation</li>
		  <li><a href="{{ route('eregister.index') }}">View EventRegistations</a></li>
      <li>Registration Details</li>

		</ul>
		</div>
			
		
	<div class="card mt-auto ">

              <div class="card-header">

                <h3 class="card-title text-center">EventRegistration Details</h3>
                <p><strong>UserName: </strong>{{e($er['username'])}}</p>
                <p><strong>Email: </strong>{{e($er['email'])}}</p>
                <p><strong>Contact Number: </strong>{{e($er['number'])}}</p>
                <p><strong>Registered Event: </strong>{{e($er['event'])}}</p>

              
            </div>
            <div class="card-footer clearfix ">
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$er['id']}}">Delete Event Registration</button>
              </div>
              
              
            </div>
</div>
</div>

<div class="modal fade" id="delete{{$er['id']}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$er['id']}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$er['username']}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('einbox.destroy',$er->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Event Registration</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection