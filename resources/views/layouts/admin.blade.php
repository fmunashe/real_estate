<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MS Resource</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
   <!-- Font Awesome -->
  <link rel="stylesheet" href="/libs/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/libs/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/libs/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/libs/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/libs/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/libs/admin-lte/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/libs/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/libs/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/libs/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app">

        <!-- Header -->
        @include('layouts.header')

        <!-- Sidebar -->
        @include('layouts.sidebar')

        @yield('content')

        <!-- Main Footer -->
        @include('layouts.footer')
    </div>
    <!-- jQuery -->
<script src="/libs/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bootstrap datepicker -->
    <script src="/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- DataTables -->
<script src="/libs/datatables/jquery.dataTables.js"></script>
<script src="/libs/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- ChartJS -->
<script src="/libs/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/libs/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/libs/jqvmap/jquery.vmap.min.js"></script>
<script src="/libs/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/libs/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/libs/moment/moment.min.js"></script>
<script src="/libs/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/libs/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/libs/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/libs/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/libs/admin-lte/js/adminlte.js"></script>
<script src="/js/custom.js"></script>
@yield('reports')
@yield('home')
@yield('location')
<script>
  $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
</body>
</html>
