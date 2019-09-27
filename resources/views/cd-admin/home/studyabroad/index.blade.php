@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Study Abroad</li>
        <li>View </li>
      </ul>
    </div>
    
    
    
    <div class="col-md-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title text-center">Available Countries</h3>
          <a href="{{ route('abroad.create') }}">
            <button class="btn btn-app"><i class="fas fa-plus"></i><b><i>Add Country</i></b></button>
          </a>
          
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                
                <th>Country</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($abroads as $abroad)
              <tr>
                <td >{{ e($abroad->title) }}</td>
                <td>
                  <div class="btn-group">
                    @if($abroad->active=='Active')
                    <button type="button" class="btn btn-success bsize" >{{$abroad->active}}</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @else
                    <button type="button" class="btn btn-danger bsize" >{{$abroad->active}}</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @endif
                    
                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                      <form action="{{ route('abroad.status',$abroad->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item ">{{$abroad->active =='Active' ? 'Inactive' : 'Active'}}</button>
                        
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
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#edit{{$abroad->id}}"><i class="fas fa-edit"></i>Edit</a>
                      <a class="dropdown-item  " href="{{ route('abroad.show',$abroad->id) }}"><i class="fas fa-eye"></i>View</a>
                      <a class="dropdown-item  " href="#" data-toggle="modal" data-target="#delete{{$abroad->id}}"><i class="fas fa-trash"></i>Delete</a>
                      
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
@foreach($abroads as $abroad)
<div class="modal fade" id="edit{{$abroad->id}}" tabindex="-1" role="dialog" aria-labelledby="edit{{$abroad->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit abroad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('abroad.update',$abroad->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('title')}}</div>
              <label for="title">Country Title</label>
              <input type="text" class="form-control" id="title" placeholder="Enter abroad title" name="title" value="{{e($abroad->title)}}">
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('description')}}</div>
              <label for="description">abroad Description</label>
              <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter About Description">{!!$abroad->description!!}</textarea>
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('cimage')}}</div>
              <label for="cimage">Country Carousel Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input preview" id="cimage" name="cimage">
                  <label class="custom-file-label" for="cimage">Choose file</label>
                </div>
                
              </div>
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('caltimage')}}</div>
              <label for="caltimage">Carousel Alt Image</label>
              <input type="text" class="form-control" id="caltimage" placeholder="Enter carousel image name" name="caltimage" value="{{e($abroad->caltimage)}}">
            </div>
            
            
            
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('image')}}</div>
              <label for="image">Country Body Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input preview" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
                
              </div>
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('altimage')}}</div>
              <label for="altimage">Country Body Alt Image</label>
              <input type="text" class="form-control" id="altimage" placeholder="Enter image name" name="altimage" value="{{e($abroad->altimage)}}">
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('seotitle')}}</div>
              <label for="seotitle">Seo Title</label>
              <input type="text" class="form-control" name="seotitle" id="seotitle" value="{{e($abroad->seotitle)}}" placeholder="Enter Seo title : not more than 60 character">
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('seokeyword')}}</div>
              <label for="seokeyword">Seo Keyword</label>
              <input type="text" class="form-control" name="seokeyword" id="seokeyword" value="{{e($abroad->seokeyword)}}" placeholder="Enter Seo keyword : not more than 60 character">
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('seodescription')}}</div>
              <label for="name">Seo Description</label>
              <textarea name="seodescription" class="form-control summernote" placeholder="Enter Seo description : between 50-160 character">{!!$abroad->seodescription!!}</textarea>
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('active')}}</div>
              <label>abroad Status</label>
              <select class="form-control" name="active" id="active">
                <option value="">Select abroad Status</option>
                <option value="1"{{$abroad->active=='Active'?'selected':""}}>Active</option>
                <option value="0"{{$abroad->active=='Inactive'?'selected':""}}>InActive</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          
          
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update abroad</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
{{-- delete modal --}}
@foreach($abroads as $abroad)
<div class="modal fade" id="delete{{$abroad->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$abroad->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete abroad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$abroad->title}}??
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('abroad.destroy',$abroad->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Delete abroad</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection