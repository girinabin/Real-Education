@extends('cd-admin.home-master')
@section('page-title')
About Show
@endsection
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
	<section class="content-header">
		<h1>
		About
		</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-dashboard"></i>Dashboard/About/Show About</li>
		</ol>
	</section>
	<!-- Main content -->
	
				<section class="content">
					<div class="row">
						<!-- left column -->
						<div class="col-md-12">
							<!-- general form elements -->
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title"></h3>
                <a href="{{ route('about') }}"><button class="btn btn-primary">Add About</button></a>

									<div>
            <div class="box-header">
              {{-- <h3 class="box-title">Data Table With Full Features</h3> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>About Name</th>
                  <th>About Tagline</th>
                  <th>About Action</th>
                  
                </tr>
                </thead>
                <tbody>
                  @foreach($about as $a)
                <tr>
                  <td>{{e(str_limit($a->name,$limits='30'))}}</td>
                  <td>{{e(str_limit($a->tagline,$limits='30'))}}</td>
                  
                  <td>
		                <div class="btn-group">
		                  <button type="button" class="btn btn-primary">Action</button>
		                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
		                    <span class="caret"></span>
		                    <span class="sr-only">Toggle Dropdown</span>
		                  </button>
		                  <ul class="dropdown-menu" role="menu">
		                    <li><a href=""  data-toggle="modal" data-target="#myModal{{$a->id}}">
               					<i class="fa fa-edit"></i> Edit</a></li>
                        <li><a href=""  data-toggle="modal" data-target="#delete{{$a->id}}">
                        <i class="fa fa-trash"></i> Delete</a></li>

               					{{-- edit modal below
               					 --}}
              				

		                    <li><a href="{{route('aboutdetail',$a->id)}}"><i class="fa fa-eye"></i>View</a></li>
		                  </ul>
		              </div>
                  </td>
                </tr>
              @endforeach

                </tbody>
                <tfoot>
                <tr>
                  <th>About Name</th>
                  <th>About Tagline</th>
                  <th>About Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
								</div>
								
							</div>
						</div>
					</div>
					
				</section>
	</div>			
</div>





<!-- edit model -->
@foreach($about as $a)

<div id="myModal{{$a->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit About</h4>
      </div>
      <div class="modal-body">
        <div class="box box-primary">  
             <form role="form" method="post" action="{{ route('aboutupdate',$a->id) }}" enctype="multipart/form-data">
              @csrf
                <div class="box-body">
                  <div class="form-group">
                    <div class="text text-danger">{{$errors->first('name')}}</div>
                    <label for="name">About Name</label>
                    <input type="text" class="form-control" name="name"  value="{{ $a->name }}">
                  </div>
                  <div class="form-group">
                    <div class="text text-danger">{{$errors->first('tagline')}}</div>

                    <label for="name">About Tagline</label>
                    <input type="text" class="form-control" name="tagline" value="{{$a->tagline}}">
                  </div>
                  
                  <div class="form-group">
                    <div class="text text-danger">{{$errors->first('image')}}</div>

                    <label for="name">About Image</label>
                    <input type="file" class="form-control" name="image"  >
                  </div>
                  <div class="form-group">
                    <div class="text text-danger">{{$errors->first('altimage')}}</div>

                    <label for="altimage">Alt Image</label>
                    <input type="text" class="form-control"  name="altimage" value="{{$a->altimage}}" >
                  </div>
                  <div class="form-group">
                    <div class="text text-danger">{{$errors->first('description')}}</div>

                    <label for="description">About Description</label>
                    <textarea name="description" class="form-control summernote" style="height=100px;" >{{ $a->description}}</textarea>
                  </div>
                
                  <div class="form-group">
                    <div class="text text-danger">{{$errors->first('pdf')}}</div>

                    <label for="pdf">Pdf</label>
                    <input type="file" class="form-control" name="pdf">
                  </div>
                  <div class="form-group">
                    <div class="text text-danger">{{$errors->first('video')}}</div>

                    <label for="video">Video link</label>
                    <input type="url" class="form-control" name="video" value="{{$a->video}}">
                  </div>

                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>

                </div>
              </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

{{-- delete modal --}}
<div id="delete{{$a->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete About</h4>
      </div>
      <div class="modal-body">
        <h2> <p>Are you sure {{e($a->name)}}??</p> </h2>
      </div>
      <div class="modal-footer">
        <form action="{{ route('abouts.destroy',$a->id) }}" method="POST">
          @csrf
          @method('DELETE')
        <button type="submit" class="btn btn-danger pull-left">Delete</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


      </div>
    </div>

  </div>
</div>
@endforeach


@endsection