@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Event</li>
        <li><a href="{{ route('eregister.index') }}">View Events</a></li>
        <li>Compose</li>
      </ul>
    </div>
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Compose New Message</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="">
            <div class="form-group">
              <input class="form-control" placeholder="To:" value="{{e($er['email'])}}">
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Subject:" value="{{old('subject')}}">
            </div>
            <div class="form-group">
              <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote" placeholder="Enter Review Description">{{old('message')}}</textarea>
            </div>
            
            
            <!-- /.card-body -->
            <div class="card-footer text-center">
              
              
              <button type="submit" class="btn btn-primary float-right"><i class="fas fa-envelope"></i> Send</button>
              
              
            </div>
          </form>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    
    
    
    
    
    
    
    
    
  </div>
</div>
@endsection