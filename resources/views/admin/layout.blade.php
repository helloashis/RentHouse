<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>RentHouse Admin - @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend') }}/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend') }}/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('backend') }}/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('backend') }}/css/tree.min.css">

  <link rel="stylesheet" href="{{ asset('backend') }}/sweetalert2/sweetalert2.min.css">
  <link href="{{ asset('backend') }}/toastr/toastr.css" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('backend') }}/css/imgupload.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 <!-- include summernote css/js -->
<link href="{{ asset('backend') }}/summernote/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('backend') }}/bootstrap/bootstrap-tagsinput.css">

  <style type="text/css">
    .file {
      visibility: hidden;
      position: absolute;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('backend') }}/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">RentHouse</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend') }}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.manage') }}" class="nav-link {{ Request::is('admin/manage') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Manager Admin
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ Request::is('admin/users/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('admin/users/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                User Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.manage') }}" class="nav-link {{ request()->is('admin/users/manage-users') ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Users</p>
                </a>
              </li>
            </ul>
          </li>


            <li class="nav-item has-treeview {{ Request::is('admin/posts/*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('admin/posts/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Posts Options
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('posts.manage') }}" class="nav-link {{ request()->is('admin/posts/manage-posts') ? 'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Posts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('posts.manage') }}" class="nav-link {{ request()->is('admin/posts/padding-posts') ? 'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pending Posts</p>
                        </a>
                    </li>
                </ul>
            </li>

            
            <li class="nav-item">
                <a href="{{ route('admin.renttype') }}" class="nav-link {{ Request::is('admin/rent-type') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Rent Type
                </p>
                </a>
            </li>

            <li class="nav-item has-treeview {{ Request::is('admin/location/*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('admin/location/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Location Options
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('divisions.manage') }}" class="nav-link {{ request()->is('admin/location/divisions/manage') ? 'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Divisions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('upzilla.manage') }}" class="nav-link {{ request()->is('admin/location/upzilla/manage') ? 'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage City/Upzilla</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-header">EXTRA</li>

            <li class="nav-item">
                <a href="{{ route('admin.about') }}" class="nav-link {{ Request::is('admin/about') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    About
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.terms') }}" class="nav-link {{ Request::is('admin/terms-&-conditions') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Terms & Condition
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.specialty') }}" class="nav-link {{ Request::is('admin/specialty') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Specialty
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.policy') }}" class="nav-link {{ Request::is('admin/policy') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Policy
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.social') }}" class="nav-link {{ Request::is('admin/social-link') ? 'active' : '' }}">
                <i class="nav-icon fas fa-link"></i>
                <p>
                    Social Area
                </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('admin.logout') }}" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('sweetalert::alert')
        @yield('content')
    </div>
    <!-- /.content-wrapper -->


    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.2
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="{{ asset('backend') }}/jquery/jquery.min.js"></script>
<script src="{{ asset('backend') }}/summernote/summernote.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="{{ asset('backend') }}/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('backend') }}/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend') }}/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend') }}/js/demo.js"></script>
<script src="{{ asset('backend') }}/js/app.js"></script>
{{-- toastr js --}}
<script src="{{ asset('backend') }}/toastr/toastr.min.js"></script>
<script src="{{ asset('backend') }}/sweetalert2/sweetalert2.min.js"></script>
<script src="{{ asset('backend') }}/bootstrap/bootstrap-tagsinput.min.js"></script>
<script>
  
    $(document).ready(function() {
        var loader = $('#loader'),
            district = $('#district');
            district.attr('disabled','disabled');
            loader.hide();
        $('select[name="division"]').on('change', function() {
            
            var divID = $(this).val();
            loader.show();
            district.attr('disabled','disabled');
            if(divID) {
                $.ajax({
                    url: '/admin/finddistrict/'+divID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="district"]').empty();
                        $('select[name="district"]').append('<option value="" selected>===Select District===</option>');
                        $.each(data, function(key, value) {
                            $('select[name="district"]').append('<option value="'+ value.id +'">'+ value.title +'</option>');
                        });
                        loader.hide();
                        district.removeAttr('disabled');


                    }


                });
            }else{
                $('select[name="district"]').empty();
            }
        });
    });

 
    $(document).ready(function() {
        $("select").val();
        
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
        
        $('#summernote').summernote();
    });
</script>

</body>
</html>
