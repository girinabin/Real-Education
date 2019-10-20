@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li>Study Procedure</li>
		  <li><a href="{{ route('pro.index') }}">View Procedure</a></li>
      <li>Procedure Details</li>

		</ul>
		</div>
			
		
	<div class="card mt-auto ">

              <div class="card-header">

                <h3 class="card-title text-center">Abroad Study Details</h3>
                <p><strong> Title:</strong>{{e($pro['title'])}}</p>
                <p><strong> Step:</strong>{{e($pro['step'])}}</p>


                
                <p><strong>Description:</strong>{!! $pro['description'] !!}</p>
                
                
                

              
            </div>
            <div class="card-footer clearfix ">
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$pro['id']}}">Delete Procedure</button>
              </div>
              
              
            </div>
</div>
</div>

<div class="modal fade" id="delete{{$pro['id']}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$pro['id']}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Procedure</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('pro.destroy',$pro->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Procedure</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection