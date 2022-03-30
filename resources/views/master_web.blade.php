<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kemenag Sawahlunto | Cetak</title>
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
<body>
  @yield('content')
<!-- jQuery -->
<script src="{{ url('assets/jquery/jquery.min.js') }}"></script>
<script src="{{ url('assets/jQueryUI/jquery-ui.min.js') }}"></script>

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

<script src="{{ url('assets/panel/js/scrolling-nav.js') }}"></script>
@section('js')
@show
</body>
</html>
