@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Reviews</li>
        <li>View Review</li>
      </ul>
    </div>
    
    
    
    <div class="col-md-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title text-center">Available Review</h3>
          <a href="{{ route('review.create') }}">
            <button class="btn btn-app"><i class="fas fa-plus fa-fw"></i><b><i>Add Reviews</i></b></button>
          </a>
          
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                
                <th>Review</th>
                <th>University</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reviews as $review)
              <tr>
                <td >{{ e($review->title) }}</td>
                <td >{{ e($review->college) }}</td>
                <td>

                
                  <div class="btn-group">
                    @if($review->active=='Active')
                    <button type="button" class="btn btn-success bsize" >{{$review->active}}</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @else
                    <button type="button" class="btn btn-danger bsize" >{{$review->active}}</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @endif
                    
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <form action="{{ route('review.status',$review->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item ">{{$review->active =='Active' ? 'Inactive' : 'Active'}}</button>
                        
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
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#edit{{$review->id}}"><i class="fas fa-edit"></i>Edit</a>
                      <a class="dropdown-item  " href="{{ route('review.show',$review->id) }}"><i class="fas fa-eye"></i>View</a>
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#delete{{$review->id}}"><i class="fas fa-trash"></i>Delete</a>
                      
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
@foreach($reviews as $review)
<div class="modal fade" id="edit{{$review->id}}" tabindex="-1" role="dialog" aria-labelledby="edit{{$review->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('review.update',$review->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('title')}}</div>
              <label for="title">Review Title</label>
              <input type="text" class="form-control" id="title" placeholder="Enter Student Name" name="title" value="{{e($review->title)}}">
            </div>

            <div class="form-group">
              <div class="text text-danger">{{$errors->first('college')}}</div>
              <label for="college">University Name</label>
              <input type="text" class="form-control" id="college" placeholder="Enter University Name" name="college" value="{{e($review->college)}}">
            </div>
            

            <div class="form-group">
              <div class="text text-danger">{{$errors->first('description')}}</div>
              <label for="description">Review Description</label>
              <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter About Description">{!!$review->description!!}</textarea>
            </div>
            
            
            
            
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('active')}}</div>
              <label>Review Status</label>
              <select class="form-control" name="active" id="active">
                <option value="">Select Review Status</option>
                <option value="1"{{$review->active=='Active'?'selected':""}}>Active</option>
                <option value="0"{{$review->active=='Inactive'?'selected':""}}>InActive</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          
          
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Review</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

{{-- delete modal --}}
@foreach($reviews as $review)
<div class="modal fade" id="delete{{$review->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$review->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$review->title}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('review.destroy',$review->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Review</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection