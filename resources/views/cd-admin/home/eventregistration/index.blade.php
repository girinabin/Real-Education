@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>Event Registration</li>
        <li>View Events Registration</li>

      </ul>
    </div>
    <div class="row">
    <div class="col-md-3">
          <a href="{{ route('eregister.compose1') }}" class="btn btn-primary btn-block mb-3">Compose</a>

          <div class="card">
            
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="#" class="nav-link">
                    <i class="fas fa-inbox"></i> Inbox
                    <span class="badge bg-primary float-right"></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('eregister.sentmsg') }}" class="nav-link">
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
              <h3 class="card-title">Event Registration Request</h3>

              
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @foreach($eregisters as $eregister)
                  <tr>
                    <td>
                      <div >
                       <button  class="btn btn-danger" data-toggle="modal" data-target="#delete{{$eregister->id}}"><i class="fas fa-trash"></i></button>
                       <a href="{{ route('eregister.show',$eregister->id) }}">
                         <button class="btn btn-success"><i class="fas fa-eye"></i></button>
                       </a>
                        <a href="{{ route('eregister.compose',$eregister->id) }}">
                          <button class="btn btn-primary"><i class="fas fa-reply"></i></button>
                        </a>
                      </div>
                    </td>
                    
                    <td class="mailbox-name">{{$eregister['username']}}</td>
                    <td>{{$eregister['email']}}</td>
                    <td class="mailbox-subject"><b>Event </b> {{$eregister['event']}}
                    </td>
                    
                    
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
            <!-- /.card-body -->
            
    
    
    
    
    
    
    
    
  </div>
</div>

@foreach($eregisters as $eregister)
<div class="modal fade" id="delete{{$eregister['id']}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$eregister['id']}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Delete Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$eregister['username']}}??
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('einbox.destroy',$eregister->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Event Registration</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection