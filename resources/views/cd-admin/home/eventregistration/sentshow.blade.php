@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li>EventsRegistation</li>
      <li><a href="{{ route('eregister.index') }}">View EventRegistations</a></li>

      <li>Sent Message Details</li>

		</ul>
		</div>
			
		
	<div class="card mt-auto ">

              <div class="card-header">

                <h3 class="card-title text-center">Sent Message Details</h3>
                <p><strong>Email: </strong>{{e($er['emailto'])}}</p>
                <p><strong>Subject: </strong>{{e($er['subject'])}}</p>
                <p><strong>Message: </strong>{!!$er['message']!!}</p>

              
            </div>
            <div class="card-footer clearfix ">
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$er['id']}}">Delete Message</button>
              </div>
              
              
            </div>
</div>
</div>

<div class="modal fade" id="delete{{$er['id']}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$er['id']}}" aria-hidden="true">
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
            <form action="{{ route('esent.destroy',$er->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Message</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection