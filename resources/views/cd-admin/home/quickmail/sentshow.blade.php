@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li>QuickMail</li>
      <li><a href="{{ route('quick.index') }}">View QuickMail</a></li>

      <li>Sent Message Details</li>

		</ul>
		</div>
			
		
	<div class="card mt-auto ">

              <div class="card-header">

                <h3 class="card-title text-center">Sent Message Details</h3>
                <p><strong>Email: </strong>{{e($quick['emailto'])}}</p>
                <p><strong>Subject: </strong>{{e($quick['subject'])}}</p>
                <p><strong>Message: </strong>{!!$quick['message']!!}</p>

              
            </div>
            <div class="card-footer clearfix ">
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$quick['id']}}">Delete Message</button>
              </div>
              
              
            </div>
</div>
</div>

<div class="modal fade" id="delete{{$quick['id']}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$quick['id']}}" aria-hidden="true">
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
            <form action="{{ route('quick.destroy',$quick->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Message</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection