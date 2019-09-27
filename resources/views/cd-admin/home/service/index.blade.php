@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Services</li>
        <li>View Service</li>
      </ul>
    </div>
    
    
    
    <div class="col-md-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title text-center">Available Services</h3>
          <a href="{{ route('service.create') }}">
            <button class="btn btn-app"><i class="fas fa-plus"></i><b><i>Add Services</i></b></button>
          </a>
          
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                
                <th>Service</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($services as $service)
              <tr>
                <td >{{ e($service->title) }}</td>
                <td><img src="{{ asset('uploads/service/'.$service->image) }}" alt="" style="width: 50px;height: 50px;"></td>
                <td>
                  <div class="btn-group">
                    @if($service->active=='Active')
                    <button type="button" class="btn btn-success bsize" >{{$service->active}}</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @else
                    <button type="button" class="btn btn-danger bsize" >{{$service->active}}</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @endif
                    
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <form action="{{ route('service.status',$service->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item ">{{$service->active =='Active' ? 'Inactive' : 'Active'}}</button>
                        
                      </form>
                    </div>
                  </div>
                </td>
                
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Action</button>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#edit{{$service->id}}"><i class="fas fa-edit"></i>Edit</a>
                      <a class="dropdown-item  " href="{{ route('service.show',$service->id) }}"><i class="fas fa-eye"></i>View</a>
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#delete{{$service->id}}"><i class="fas fa-trash"></i>Delete</a>
                      
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
@foreach($services as $service)
<div class="modal fade" id="edit{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="edit{{$service->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('service.update',$service->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('title')}}</div>
              <label for="title">Service Title</label>
              <input type="text" class="form-control" id="title" placeholder="Enter Service title" name="title" value="{{e($service->title)}}">
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('description')}}</div>
              <label for="description">Service Description</label>
              <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter About Description">{!!$service->description!!}</textarea>
            </div>
            
            
            
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('image')}}</div>
              <label for="image">Service Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input preview" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
                
              </div>
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('altimage')}}</div>
              <label for="altimage">Alt Image</label>
              <input type="text" class="form-control" id="altimage" placeholder="Enter image name" name="altimage" value="{{e($service->altimage)}}">
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('seotitle')}}</div>
              <label for="seotitle">Seo Title</label>
              <input type="text" class="form-control" name="seotitle" id="seotitle" value="{{e($service->seotitle)}}" placeholder="Enter Seo title : not more than 60 character">
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('seokeyword')}}</div>
              <label for="seokeyword">Seo Keyword</label>
              <input type="text" class="form-control" name="seokeyword" id="seokeyword" value="{{e($service->seokeyword)}}" placeholder="Enter Seo keyword : not more than 60 character">
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('seodescription')}}</div>
              <label for="name">Seo Description</label>
              <textarea name="seodescription" class="form-control summernote" placeholder="Enter Seo description : between 50-160 character">{!!$service->seodescription!!}</textarea>
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('active')}}</div>
              <label>Service Status</label>
              <select class="form-control" name="active" id="active">
                <option value="">Select Service Status</option>
                <option value="1"{{$service->active=='Active'?'selected':""}}>Active</option>
                <option value="0"{{$service->active=='Inactive'?'selected':""}}>InActive</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          
          
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Service</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

{{-- delete modal --}}
@foreach($services as $service)
<div class="modal fade" id="delete{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$service->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$service->title}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('service.destroy',$service->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Service</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection