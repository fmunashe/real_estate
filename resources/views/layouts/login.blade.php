<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Real Estate</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Font Awesome -->
  <link rel="stylesheet" href="/libs/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/libs/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/libs/admin-lte/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	
</head>
<body class="hold-transition login-page">
	@yield('content')
</div>
<!-- /.login-box -->
<!-- <script src="{{asset('js/app.js')}}"></script> -->
<!-- jQuery -->
<script src="/libs/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/libs/admin-lte/js/adminlte.min.js"></script>
</body>
</html>
