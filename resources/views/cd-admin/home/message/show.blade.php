@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li>Message</li>
		  <li><a href="{{ route('message.index') }}">View Message</a></li>
      <li><a href="{{ route('message.index') }}">Inbox</a></li>

      <li> Inbox Message Details</li>

		</ul>
		</div>
			
		
	<div class="card mt-auto ">

              <div class="card-header">

                <h3 class="card-title text-center">Message Details</h3>
                <p><strong>UserName: </strong>{{e($msg['username'])}}</p>
                <p><strong>Email: </strong>{{e($msg['email'])}}</p>
                <p><strong>Contact Number: </strong>{{e($msg['number'])}}</p>
                <p><strong>Feedback: </strong>{!!$msg['message']!!}</p>

              
            </div>
            <div class="card-footer clearfix ">
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$msg['id']}}">Delete Message</button>
              </div>
              
              
            </div>
</div>
</div>

<div class="modal fade" id="delete{{$msg['id']}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$msg['id']}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('inbox.destroy',$msg->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Message</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection