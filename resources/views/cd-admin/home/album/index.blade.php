@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Albums</li>
        <li>View Albums </li>
      </ul>
    </div>
    
    
    
    <div class="col-md-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title text-center">Available Albums</h3>
          <a href="{{ route('album.create') }}">
            <button class="btn btn-app"><i class="fas fa-plus"></i><b><i>Add Album</i></b></button>
          </a>
          
        </div>
        <!-- /.card-header -->
        
          <div class="row mt-3">
          @foreach($albums as $album)

          <div class="col-md-4">
            <figure class="ml-3">

            <img class="img-fluid" src="{{ asset('uploads/album/'.$album->image) }}" alt="" style="height: 350px;width: 350px;">
            <figcaption class="text-center"><strong>{{e($album['name'])}}</strong></figcaption>
            <a href="{{ route('image.create',$album->id) }}"><button class="btn btn-sm btn-primary">
            <i class="fas fa-plus fa-fw"></i><i class="fas fa-image fa-fw"></i></button></a>
            <div class="btn-group">
                    @if($album->active=='Active')
                    <button type="button" class="btn btn-sm  btn-success bsmallsize" >{{$album->active}}</button>
                    <button type="button" class="btn btn-sm btn-success dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @else
                    <button type="button" class="btn btn-sm btn-danger bsmallsize " >{{$album->active}}</button>
                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @endif
                    
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <form action="{{ route('album.status',$album->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item ">{{$album->active =='Active' ? 'Inactive' : 'Active'}}</button>
                        
                      </form>
                    </div>
                  </div>
                  <a style="margin-left: 130px;" href="{{ route('album.show',$album->id) }}"><button class="btn btn-warning"><i class="fas fa-eye float-right "></i></button></a>
                  <a class="btn  btn-danger"  href="#" data-toggle="modal" data-target="#delete{{$album->id}}"><i class="fas fa-trash float-right"></i></a>
            </figure>
          </div>
          @endforeach

          </div>
          
       
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      
      <!-- /.card -->
    </div>
    
    
    
    
    
  </div>
</div>

{{-- delete modal --}}
@foreach($albums as $album)
<div class="modal fade" id="delete{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$album->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Album</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{e($album['name'])}}??

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('album.destroy',$album->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Delete {{e($album['name'])}} Album</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection