@extends('cd-admin.home-master')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="clearfix mt-1">
      <ul class="breadcrumb float-right">
        <li>QuickMail</li>
      <li>View QuickMail</li>
        
        

      </ul>
    </div>
    
    <div class="row">
    
    <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Quick/Compose Sent Message </h3>

              
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @foreach($creplys as $creply)
                  <tr>
                    <td>
                      <div >
                       <button  class="btn btn-danger" data-toggle="modal" data-target="#delete{{$creply->id}}"><i class="fas fa-trash"></i></button>
                       <a href="{{ route('quick.view',$creply->id) }}">
                         <button class="btn btn-success"><i class="fas fa-eye"></i></button>
                       </a>
                       
                        <a href="{{ route('quick.compose',$creply->id) }}">
                          <button class="btn btn-primary"><i class="fas fa-reply"></i></button>
                        </a>
                        
                      </div>
                    </td>
                    
                    <td>{{$creply['emailto']}}</td>
                    <td class="mailbox-subject"><b>Subject </b> {{$creply['subject']}}
                    </td>
                    <td>{!! str_limit($creply['message'],'20') !!}</td>

                    
                    
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

@foreach($creplys as $creply)
<div class="modal fade" id="delete{{$creply['id']}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$creply['id']}}" aria-hidden="true">
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
            <form action="{{ route('quick.destroy',$creply->id) }}" method="POST">
              @csrf
            <button type="submit" class="btn btn-danger">Delete Sent Message</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection