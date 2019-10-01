@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li>Choose Us</li>
		  <li><a href="{{ route('choose.index') }}">View Features</a></li>
      <li>Feature Details</li>

		</ul>
		</div>
			
		
	<div class="card mt-auto ">

              <div class="card-header">

                <h3 class="card-title text-center">Feature Details</h3>
                <p><strong>Feature Title:</strong>{{e($cho['title'])}}</p>

                
                <p><strong>Feature Description:</strong>{!! $cho['description'] !!}</p>
                
                
                

              
            </div>
            <div class="card-footer clearfix ">
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$cho['id']}}">Delete Feature</button>
              </div>
              
              
            </div>
</div>
</div>

<div class="modal fade" id="delete{{$cho['id']}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$cho['id']}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Feature</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$cho['title']}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('choose.destroy',$cho->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Feature</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection