@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Carousel</li>
        <li><a href="{{ route('carousel.index') }}">View Carousel </a></li>
        <li>Carousel Details</li>
      </ul>
    </div>
    
    
    <div class="card mt-auto ">
      <div class="card-header">
        <h3 class="card-title text-center">  Carousel Details</h3>
        <a href="{{ route('carousel.create',$car['id']) }}">
          <button class="btn btn-app"><i class="fas fa-plus"></i><b><i>Add Carousel</i></b></button>
        </a>
        
        <p><strong>Carousel Description:</strong>{!!$car['description']!!}</p>
        <img src="{{ asset('uploads/carousel/'.$car->image) }}" alt="" style="height: 350px;width: 350px;">
      </div>
    

    <div class="card-footer clearfix ">
        <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$car->id}}">Delete Carousel</button>
    </div>
    
    
  </div>
</div>
</div>

<div class="modal fade" id="delete{{$car->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$car->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Carousel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('carousel.destroy',$car->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Delete Carousel</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection