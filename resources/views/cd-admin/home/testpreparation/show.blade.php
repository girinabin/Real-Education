@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="clearfix mt-1">
		<ul class="breadcrumb float-right">
		  <li>Test Preparation</li>
		  <li><a href="{{ route('testp.index') }}">View Test </a></li>
      <li>{{$tst->title}} Details</li>

		</ul>
		</div>
			
		
	<div class="card mt-auto ">

              <div class="card-header">

                <h3 class="card-title text-center"> {{strtoupper(e($tst['title']))}} Details</h3>
                
                <p><strong>Test Topic:</strong>{{strtoupper(e($tst['title']))}}</p>
                
                <p><strong>{{strtoupper(e($tst['title']))}} Description:</strong>{!! $tst['description'] !!}</p>
                <p><strong>{{strtoupper(e($tst['title']))}} Carousel Image:</strong></p>


                <img src="{{ asset('uploads/testpreparation/'.$tst['cimage']) }}" style="height: 350px;width: 350px;" alt="">
                <p class="mt-3"><strong>{{strtoupper(e($tst['title']))}} Normal Image:</strong></p>
                <img src="{{ asset('uploads/testpreparation/'.$tst['image']) }}" style="height: 350px;width: 350px;" alt="">
                <p class="mt-3"><strong>Seo Title:</strong>{{e($tst['seotitle'])}}</p>
                <p><strong>Seo Keyword:</strong>{{e($tst['seokeyword'])}}</p>
                <p><strong>Seo Description:</strong>{!!$tst['seodescription']!!}</p>

              
            </div>
            <div class="card-footer clearfix ">
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$tst->id}}">Delete Test</button>
              </div>
              
              
            </div>
</div>
</div>

<div class="modal fade" id="delete{{$tst->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$tst->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Test</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{strtoupper(e($tst['title']))}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('testp.destroy',$tst->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Test</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection