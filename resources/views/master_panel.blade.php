<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kemenag Sawahlunto | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('assets/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('assets/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('assets/panel/css/adminlte.min.css') }}">
  
  <link rel="stylesheet" href="{{ url('assets/danshouse/danshouse.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('assets/iCheck/all.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ url('assets/datepicker/datepicker3.css') }}">

  <link rel="icon" href="{{ url('img/kemenag-logo.png') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark bg-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link btn btn-danger btn-sm" href="{{ url('logout') }}">
          <i class="fa fa-sign-out"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  @include('master_panel_aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      @yield('header')
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
    <!-- /.content -->
  </div>

  @yield('modal')

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="http://danshouse.site">danshouse</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0-alpha
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('assets/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ url('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- datepicker -->
<script src="{{ url('assets/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ url('assets/slimScroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ url('assets/iCheck/icheck.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('assets/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/panel/js/adminlte.js') }}"></script>

@section('js')
@show
</body>
</html>
