@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li>Event</li>
		  <li><a href="{{ route('event.index') }}">View Events</a></li>
      <li>Event Details</li>

		</ul>
		</div>
			
		
	<div class="card mt-auto ">

              <div class="card-header">

                <h3 class="card-title text-center">Event Details</h3>
                <p><strong>Event Title:</strong>{{e($eve['title'])}}</p>
                <p><strong>Event Duration:</strong>{{e($eve['time'])}}</p>


                
                <p><strong>Feature Description:</strong>{!! $eve['description'] !!}</p>
                
                
                

              
            </div>
            <div class="card-footer clearfix ">
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$eve['id']}}">Delete Event</button>
              </div>
              
              
            </div>
</div>
</div>

<div class="modal fade" id="delete{{$eve['id']}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$eve['id']}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$eve['title']}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('event.destroy',$eve->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Event</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection