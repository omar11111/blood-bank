<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blood Bank</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}">

 <link rel="icon" href="{{asset('adminlte/img/blood_icon.png')}}" type="image/xl-icon">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->
 
      

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{asset('adminlte/img/blood_icon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Blood Bank </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/img/my_photoo.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Omar ALGalfy</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url(route('posts.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
          
          <li class="nav-item">
            <a href="{{url(route('category.index'))}}" class="nav-link">
              <i class="fas fa-city  mr-1 fa-lg"></i>
              <p>
               Posts Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>

          <li class="nav-item">
            <a href="{{url(route('governorate.index'))}}" class="nav-link">
              <i class="fas fa-city  mr-1 fa-lg"></i>
              <p>
                Governorates
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>

          <li class="nav-item">
            <a href="{{url(route('city.index'))}}" class="nav-link">
              <i class="fas fa-city  mr-1 fa-lg"></i>
              <p>
                Cities
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>
         
          <li class="nav-item">
            <a href="{{url(route('client.index'))}}" class="nav-link">
              <i class="fas fa-users "></i>
              <p>
                Clients
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>
        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>

        
          
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('page_title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">@yield('tap_title')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  
    </div>
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

{{-- AJAX --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/js/demo.js')}}"></script>
</body>
</html>

{{-- <script>
  $(document).read(function(){
    fetch_client_data();
    function fetch_client_data(query='') {
      $.ajax({
        url:"{{route('client.action')}}",
        method:"GET",
        data:{query:query},
        dataType:'json',
        success:function(data)
        {
          $('tbody').html(data.tabel_data);
          $('#total_records').text(data.total_data);
        }

      })
     
    }
    $(document).on(Keyup,#search,function(){
       var query = $this.val();
       fetch_client_data(query);
    })
  });
</script> --}}
<script>
  $(document).read(function(){
    function fetch_client_data(params) {
      $.ajax({
        'url':"{{url(route('client.index'))}}",
        method:"GET"

      })
    }
  });
</script>
