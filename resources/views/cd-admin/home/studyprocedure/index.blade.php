@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        
        <li>Study Procedure</li>
        <li>View Procedure</li>
      </ul>
    </div>
    
    
    
    <div class="col-md-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title text-center">Abroad Study Procedure</h3>
          <a href="{{ route('event.create') }}">
            <button class="btn btn-app"><i class="fas fa-plus fa-fw"></i><b><i>Add Procedure</i></b></button>
          </a>
          
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                
                <th>Step</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($events as $event)
              <tr>
                <td >{{ e($event['step']) }}</td>
                <td>{{ e($event['title']) }}</td>
                <td>{!!str_limit($event['description'],'50')!!}</td>
              
                
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary bsize">Action</button>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#edit{{$event->id}}"><i class="fas fa-edit"></i>Edit</a>
                      <a class="dropdown-item  " href="{{ route('pro.show',$event->id) }}"><i class="fas fa-eye"></i>View</a>
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#delete{{$event->id}}"><i class="fas fa-trash"></i>Delete</a>
                      
                    </div>
                  </div>
                </td>
              </tr>
              
              
            </tbody>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      
      <!-- /.card -->
    </div>
    
    
    
    
    
  </div>
</div>
<!-- Modal -->
@foreach($events as $event)
<div class="modal fade" id="edit{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="edit{{$event->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit Study Procedure</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('pro.update',$event->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">

            <div class="form-group">
              <div class="text text-danger">{{$errors->first('step')}}</div>
              <label for="step">Step</label>
              <input type="number" class="form-control" id="step"  name="step" value="{{e($event->step)}}">
            </div>

            <div class="form-group">
              <div class="text text-danger">{{$errors->first('title')}}</div>
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title"  name="title" value="{{e($event->title)}}">
            </div>

            

            <div class="form-group">
              <div class="text text-danger">{{$errors->first('description')}}</div>
              <label for="description">Description</label>
              <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" >{!!e($event->description)!!}</textarea>
            </div>
            
            
            
            
            
            
          </div>
          <!-- /.card-body -->
          
          
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Procedure</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

{{-- delete modal --}}
@foreach($events as $event)
<div class="modal fade" id="delete{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$event->id}}" aria-hidden="true">
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
            <form action="{{ route('pro.destroy',$event->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Procedure</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection