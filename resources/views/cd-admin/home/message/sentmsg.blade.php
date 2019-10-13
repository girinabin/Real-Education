@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Message</li>
        <li>View Message</li>
        <li>Sent</li>

      </ul>
    </div>
    
    <div class="row">
    <div class="col-md-3">
          <a href="{{ route('eregister.compose1') }}" class="btn btn-primary btn-block mb-3">Compose</a>

          <div class="card">
            
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="{{ route('message.index') }}" class="nav-link">
                    <i class="fas fa-inbox"></i> Inbox
                    <span class="badge bg-primary float-right"></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('message.sent') }}" class="nav-link">
                    <i class="fas fa-envelope"></i> Sent
                  </a>
                </li>
               
                
                
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          
          <!-- /.card -->
    </div>
    <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title"> Sent Message </h3>

              
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @foreach($messages as $message)
                  <tr>
                    <td>
                      <div >
                       <button  class="btn btn-danger" data-toggle="modal" data-target="#delete{{$message->id}}"><i class="fas fa-trash"></i></button>
                       <a href="{{ route('message.sentshow',$message->id) }}">
                         <button class="btn btn-success"><i class="fas fa-eye"></i></button>
                       </a>
                       
                        <a href="{{ route('message.compose1',$message['id']) }}">
                          <button class="btn btn-primary"><i class="fas fa-reply"></i></button>
                        </a>
                       
                      </div>
                    </td>
                    
                    <td>{{$message['emailto']}}</td>
                    <td class="mailbox-subject"><b>Subject </b> {{$message['subject']}}
                    </td>
                    <td>{!! str_limit($message['message'],'20') !!}</td>

                    
                    
                  </tr>
                  
                  </tbody>
                  @endforeach
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
    </div>
  </div>
  </div>
            <!-- /.card-body -->
            
    
    
    
    
    
    
    
    
  </div>
</div>

@foreach($messages as $message)
<div class="modal fade" id="delete{{$message['id']}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$message['id']}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Sent Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('sent.destroy',$message->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Sent Message</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection