<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Page Title -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('page-title')</title>


 {{-- <link rel="stylesheet" href="/css/app.css"> --}}
 <link rel="stylesheet" href="{{ url('/css/app.css') }}">

 <link rel="stylesheet" href="{{ asset('cd-admin/creatu/css/btn.css') }}">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
 
 




  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="description" content="@yield('description')">
  <meta name="keywords" content="@yield('keyword')">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper" id="app">

    @include('cd-admin.header.header')
    @include('cd-admin.sidebar.sidebar')

    
      @yield('content')
    

    @include('cd-admin.footer.footer')
  </div>


</body>
 

{{-- <script src="/js/app.js"></script> --}}
<script src="{{ asset('/js/app.js') }}"></script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script>
      $(document).ready(function() {
      $('.summernote').summernote();

        });
</script>




 <script>
            $('.preview').on('change',function(){
                //get the file name
                var fileName = $(this).val().replace('C:\\fakepath\\', " ");;
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
</script>
<script src="{{ asset('cd-admin/creatu/js/daterangepicker.js') }}"></script>
<script>
  $(function () {
    
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'DD/MM/YYYY  hh:mm A'
      }
    })
    })
</script>


@include('sweetalert::alert')




</html>