<body class="hold-transition sidebar-mini layout-fixed">
<div >


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('img/lightroom.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Real Education</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/man.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           
                
          <li class="nav-item has-treeview ">
            <a href="{{ route('home') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Services
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('service.create') }}" class="nav-link ">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('service.index') }}" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>View Service</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                About US
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('about.create') }}" class="nav-link ">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add About</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{ route('about.show') }}" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>View About</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Study Abroad
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('abroad.create') }}" class="nav-link ">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add Country</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{ route('abroad.index') }}" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>View Country </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Test Preparation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('testp.create') }}" class="nav-link ">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add Test</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{ route('testp.index') }}" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>View Test </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Albums
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('album.create') }}" class="nav-link ">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add Album</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{ route('album.index') }}" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>View Albums </p>
                </a>
              </li>
            </ul>
          </li>
          

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-thumbs-up"></i>
              <p>
                Reviews
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('review.create') }}" class="nav-link ">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add Review</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{ route('review.index') }}" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>View Reviews </p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Carousels
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('carousel.create') }}" class="nav-link ">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add Carousel</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{ route('carousel.index') }}" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>View Carousels </p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Choose US
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('choose.create') }}" class="nav-link ">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add Feature</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{ route('choose.index') }}" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>View Features </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Event
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('event.create') }}" class="nav-link ">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add Event</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{ route('event.index') }}" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>View Events </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-registered"></i>
              <p>
                Event Registration
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('eregister.create') }}" class="nav-link ">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add Registation</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{ route('eregister.index') }}" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>View Events Registration </p>
                </a>
              </li>
            </ul>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 

    
    @yield('homecontent')
  
</div>



</body>



