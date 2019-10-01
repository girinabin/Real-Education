@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Carousel</li>
        <li>View Carousel </li>
      </ul>
    </div>
    
    
    
    <div class="col-md-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title text-center">Available Carousel</h3>
          <a href="{{ route('carousel.create') }}">
            <button class="btn btn-app"><i class="fas fa-plus"></i><b><i>Add Carousel</i></b></button>
          </a>
          
        </div>
        <!-- /.card-header -->
        
          <div class="row mt-3">
          @foreach($carousels as $carousel)

          <div class="col-md-4">
            <figure class="ml-3">

            <img class="img-fluid" src="{{ asset('uploads/carousel/'.$carousel->image) }}" alt="" style="height: 350px;width: 350px;">
            
            
            <div class="btn-group mt-1">
                    @if($carousel->active=='Active')
                    <button type="button" class="btn btn-sm  btn-success bsmallsize" >{{$carousel->active}}</button>
                    <button type="button" class="btn btn-sm btn-success dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @else
                    <button type="button" class="btn btn-sm btn-danger bsmallsize " >{{$carousel->active}}</button>
                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @endif
                    
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <form action="{{ route('carousel.status',$carousel->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item ">{{$carousel->active =='Active' ? 'Inactive' : 'Active'}}</button>
                        
                      </form>
                    </div>
                  </div>
                  <a style="margin-left: 175px;"  href="{{ route('carousel.show',$carousel->id) }}"><button class="btn btn-warning mt-1"><i class="fas fa-eye float-right "></i></button></a>
                  <a class="btn  btn-danger mt-1"  href="#" data-toggle="modal" data-target="#delete{{$carousel->id}}"><i class="fas fa-trash float-right"></i></a>
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
@foreach($carousels as $carousel)
<div class="modal fade" id="delete{{$carousel->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$carousel->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete carousel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('carousel.destroy',$carousel->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Delete Carousel</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection