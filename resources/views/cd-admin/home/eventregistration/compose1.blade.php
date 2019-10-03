@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
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
          <form action="{{ route('eregister.reply1') }}" method="POST">
            @csrf
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('emailto')}}</div>
              <input class="form-control" placeholder="To:" value="{{old('emailto')}}" name="emailto">
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('subject')}}</div>

              <input class="form-control" placeholder="Subject:" value="{{old('subject')}}" name="subject">
            </div>
            <div class="form-group">
              <div class="text text-danger">{{$errors->first('message')}}</div>

              <textarea name="message" id="message" cols="30" rows="10" class="form-control summernote" >{{old('message')}}</textarea>
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