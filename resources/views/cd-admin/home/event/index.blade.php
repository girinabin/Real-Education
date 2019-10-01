@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Event</li>
        <li>View Events</li>
      </ul>
    </div>
    
    
    
    <div class="col-md-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title text-center">Events List</h3>
          <a href="{{ route('event.create') }}">
            <button class="btn btn-app"><i class="fas fa-plus fa-fw"></i><b><i>Add Event</i></b></button>
          </a>
          
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                
                <th>Event</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($events as $event)
              <tr>
                <td >{{ e($event['title']) }}</td>
                <td>{{ e($event['time']) }}</td>
                <td>

                
                  <div class="btn-group">
                    @if($event->active=='Active')
                    <button type="button" class="btn btn-success bsize" >{{$event->active}}</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @else
                    <button type="button" class="btn btn-danger bsize" >{{$event->active}}</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @endif
                    
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <form action="{{ route('event.status',$event->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item ">{{$event->active =='Active' ? 'Inactive' : 'Active'}}</button>
                        
                      </form>
                    </div>
                  </div>
                </td>
                
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary bsize">Action</button>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#edit{{$event->id}}"><i class="fas fa-edit"></i>Edit</a>
                      <a class="dropdown-item  " href="{{ route('event.show',$event->id) }}"><i class="fas fa-eye"></i>View</a>
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
        <h5 class="modal-title" >Edit Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('event.update',$event->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('title')}}</div>
              <label for="title">Event Title</label>
              <input type="text" class="form-control" id="title" placeholder="Enter Feature Name" name="title" value="{{e($event->title)}}">
            </div>

            

            <div class="form-group">
              <div class="text text-danger">{{$errors->first('description')}}</div>
              <label for="description">Event Description</label>
              <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter Feature Description">{!!$event->description!!}</textarea>
            </div>
            <div class="form-group">
            <label>Date and time range:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-clock"></i></span>
              </div>
              <input type="text
              " class="form-control float-right" id="reservationtime" name="time" value="{{$event['time']}}">
            </div>
            <!-- /.input group -->
          </div>
            
            
            
            
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('active')}}</div>
              <label>Event Status</label>
              <select class="form-control" name="active" id="active">
                <option value="">Select Event Status</option>
                <option value="1"{{$event->active=='Active'?'selected':""}}>Active</option>
                <option value="0"{{$event->active=='Inactive'?'selected':""}}>InActive</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          
          
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Event</button>
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
        <h5 class="modal-title" >Delete Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$event['title']}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('event.destroy',$event->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Event</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection