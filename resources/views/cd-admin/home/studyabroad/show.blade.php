@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li>Study Abroad</li>
		  <li><a href="{{ route('abroad.index') }}">View </a></li>
      <li>Country Details</li>

		</ul>
		</div>
			
		
	<div class="card mt-auto ">

              <div class="card-header">

                <h3 class="card-title text-center">Service Details</h3>
                <img src="" alt="">
                <p><strong>Country Name:</strong>{{e($abr['title'])}}</p>
                
                <p><strong>Country Description:</strong>{!! $abr['description'] !!}</p>
                <p><strong>Country Carousel Image:</strong></p>


                <img src="{{ asset('uploads/studyabroad/'.$abr['cimage']) }}" style="height: 350px;width: 350px;" alt="">
                <p class="mt-3"><strong>Country Normal Image:</strong></p>
                <img src="{{ asset('uploads/studyabroad/'.$abr['image']) }}" style="height: 350px;width: 350px;" alt="">
                <p class="mt-3"><strong>Seo Title:</strong>{{e($abr['seotitle'])}}</p>
                <p><strong>Seo Keyword:</strong>{{e($abr['seokeyword'])}}</p>
                <p><strong>Seo Description:</strong>{!!$abr['seodescription']!!}</p>

              
            </div>
            <div class="card-footer clearfix ">
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$abr->id}}">Delete Country</button>
              </div>
              
              
            </div>
</div>
</div>

<div class="modal fade" id="delete{{$abr->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$abr->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$abr->title}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('abroad.destroy',$abr->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Country</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection