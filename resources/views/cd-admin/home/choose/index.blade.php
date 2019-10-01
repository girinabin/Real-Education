@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Choose Us</li>
        <li>View Features</li>
      </ul>
    </div>
    
    
    
    <div class="col-md-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title text-center">Available Features</h3>
          <a href="{{ route('choose.create') }}">
            <button class="btn btn-app"><i class="fas fa-plus fa-fw"></i><b><i>Add Features</i></b></button>
          </a>
          
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                
                <th>Feature</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($chooses as $choose)
              <tr>
                <td >{{ e($choose['title']) }}</td>
                <td>

                
                  <div class="btn-group">
                    @if($choose->active=='Active')
                    <button type="button" class="btn btn-success bsize" >{{$choose->active}}</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @else
                    <button type="button" class="btn btn-danger bsize" >{{$choose->active}}</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @endif
                    
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <form action="{{ route('choose.status',$choose->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item ">{{$choose->active =='Active' ? 'Inactive' : 'Active'}}</button>
                        
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
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#edit{{$choose->id}}"><i class="fas fa-edit"></i>Edit</a>
                      <a class="dropdown-item  " href="{{ route('choose.show',$choose->id) }}"><i class="fas fa-eye"></i>View</a>
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#delete{{$choose->id}}"><i class="fas fa-trash"></i>Delete</a>
                      
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
@foreach($chooses as $choose)
<div class="modal fade" id="edit{{$choose->id}}" tabindex="-1" role="dialog" aria-labelledby="edit{{$choose->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit Feature</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('choose.update',$choose->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('title')}}</div>
              <label for="title">Feature Title</label>
              <input type="text" class="form-control" id="title" placeholder="Enter Feature Name" name="title" value="{{e($choose->title)}}">
            </div>

            

            <div class="form-group">
              <div class="text text-danger">{{$errors->first('description')}}</div>
              <label for="description">Feature Description</label>
              <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter Feature Description">{!!$choose->description!!}</textarea>
            </div>
            
            
            
            
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('active')}}</div>
              <label>Feature Status</label>
              <select class="form-control" name="active" id="active">
                <option value="">Select Feature Status</option>
                <option value="1"{{$choose->active=='Active'?'selected':""}}>Active</option>
                <option value="0"{{$choose->active=='Inactive'?'selected':""}}>InActive</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          
          
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Feature</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

{{-- delete modal --}}
@foreach($chooses as $choose)
<div class="modal fade" id="delete{{$choose->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$choose->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Feature</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$choose['title']}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('choose.destroy',$choose->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Feature</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection