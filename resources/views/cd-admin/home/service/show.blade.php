@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li>Services</li>
		  <li><a href="{{ route('service.index') }}">View Service</a></li>
      <li>Service Details</li>

		</ul>
		</div>
			
		
	<div class="card mt-auto ">

              <div class="card-header">

                <h3 class="card-title text-center">Service Details</h3>
                <img src="" alt="">
                <p><strong>Title:</strong>{{e($serv['title'])}}</p>
                
                <p><strong>Service Description:</strong>{!! $serv['description'] !!}</p>
                <img src="{{ asset('uploads/service/'.$serv['image']) }}" style="height: 350px;width: 350px;" alt="">
                
                <p class="mt-3"><strong>Seo Title:</strong>{{e($serv['seotitle'])}}</p>
                <p><strong>Seo Keyword:</strong>{{e($serv['seokeyword'])}}</p>
                <p><strong>Seo Description:</strong>{!!$serv['seodescription']!!}</p>

              
            </div>
            <div class="card-footer clearfix ">
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$serv->id}}">Delete Service</button>
              </div>
              
              
            </div>
</div>
</div>

<div class="modal fade" id="delete{{$serv->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$serv->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$serv->title}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('service.destroy',$serv->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Service</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection