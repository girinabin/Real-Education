@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Albums</li>
        <li><a href="{{ route('album.index') }}">View Albums </a></li>
        <li>Album Details</li>
      </ul>
    </div>
    
    
    <div class="card mt-auto ">
      <div class="card-header">
        <h3 class="card-title text-center"> {{strtoupper(e($alb['name']))}} Album Details</h3>
        <a href="{{ route('image.create',$alb['id']) }}">
          <button class="btn btn-app"><i class="fas fa-plus"></i><b><i>Add Image</i></b></button>
        </a>
        <p class="mt-3"><strong>Seo Title:</strong>{{e($alb['seotitle'])}}</p>
        <p><strong>Seo Keyword:</strong>{{e($alb['seokeyword'])}}</p>
        <p><strong>Seo Description:</strong>{!!$alb['seodescription']!!}</p>
      </div>
      <div class="row mt-3">
        @foreach($images as $image)
        <div class="col-md-4">
          <figure class="ml-3">
            <img class="img-fluid" src="{{ asset('uploads/image/'.$image->image) }}" alt="" style="height: 350px;width: 350px;">
            
            
            <div class="btn-group mt-2">
              @if($image->active=='Active')
              <button type="button" class="btn btn-sm  btn-success bsmallsize" >{{$image->active}}</button>
              <button type="button" class="btn btn-sm btn-success dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
              <span class="caret"></span>
              <span class="sr-only">Toggle Dropdown</span>
              </button>
              @else
              <button type="button" class="btn btn-sm btn-danger bsmallsize " >{{$image->active}}</button>
              <button type="button" class="btn btn-sm btn-danger dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
              <span class="caret"></span>
              <span class="sr-only">Toggle Dropdown</span>
              </button>
              @endif
              
              <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                <form action="{{ route('image.status',$image->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item ">{{$image->active =='Active' ? 'Inactive' : 'Active'}}</button>
                  
                </form>
              </div>
            </div>
            
            <a style="margin-left: 225px;" class="btn  btn-danger mt-2"  href="#" data-toggle="modal" data-target="#imagedelete{{$image->id}}"><i class="fas fa-trash float-right"></i></a>
          </figure>
        </div>
        @endforeach
      </div>
      
      
      
      
      
    </div>

    <div class="card-footer clearfix ">
      <button class="btn btn-danger float-right" data-toggle="modal" data-target="#delete{{$alb->id}}">Delete Test</button>
    </div>
    
    
  </div>
</div>
@foreach($images as $image)
<div class="modal fade" id="imagedelete{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$image->id}}" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" >Delete Image</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <form action="{{ route('image.destroy',$image->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Delete Image</button>
      </form>
    </div>
  </div>
</div>
</div>
@endforeach

<div class="modal fade" id="delete{{$alb->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$alb->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Album</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{e($alb['name'])}}??

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('album.destroy',$alb->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Delete {{e($alb['name'])}} Album</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection