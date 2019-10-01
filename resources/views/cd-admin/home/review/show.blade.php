@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li>Review</li>
		  <li><a href="{{ route('review.index') }}">View Review</a></li>
      <li>Review Details</li>

		</ul>
		</div>
			
		
	<div class="card mt-auto ">

              <div class="card-header">

                <h3 class="card-title text-center">Review Details</h3>
                <p><strong>Review Title:</strong>{{e($rev['title'])}}</p>
                <p><strong>University Name:</strong>{{e($rev['college'])}}</p>

                
                <p><strong>Review Description:</strong>{!! $rev['description'] !!}</p>
                
                
                

              
            </div>
            <div class="card-footer clearfix ">
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$rev['id']}}">Delete Review</button>
              </div>
              
              
            </div>
</div>
</div>

<div class="modal fade" id="delete{{$rev['id']}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$rev['id']}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$rev['title']}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('review.destroy',$rev->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Review</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection