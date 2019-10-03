@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Message</li>
        <li><a href="{{ route('message.index') }}">View Message</a></li>
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
          <form action="{{ route('message.reply',$msg->id) }}" method="POST">
            @csrf
            <div class="form-group">
              <input class="form-control" placeholder="To:" value="{{e($msg['email'])}}" name="emailto">
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Subject:" value="{{old('subject')}}" name="subject">
            </div>
            <div class="form-group">
              <textarea name="message" id="message" cols="30" rows="10" class="form-control summernote" >{{old('message')}}</textarea>
            </div>
            <input type="hidden" name="message_id" value="{{$msg['id']}}">
            
            
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