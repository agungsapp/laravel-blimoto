<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AdminLTE 3 | Log in (v2)</title>

		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/fontawesome-free/css/all.min.css">
		<!-- icheck bootstrap -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/icheck-bootstrap/icheck-bootstrap.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('dist') }}/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
		<div class="login-box">
				<!-- /.login-logo -->
				<div class="card card-outline card-primary">
						<div class="card-header text-center">
								<a href="" class="h1">
										<img src="/assets/images/logo/Logo-blimoto.webp" alt="logo blimoto" srcset="">
								</a>
						</div>
						<div class="card-body">
								<h3 class="login-box-msg fw-bold">Login</h3>

								<form action="../../index3.html" method="post">
										<div class="input-group mb-3">
												<input type="email" class="form-control" placeholder="Email">
												<div class="input-group-append">
														<div class="input-group-text">
																<span class="fas fa-envelope"></span>
														</div>
												</div>
										</div>
										<div class="input-group mb-3">
												<input type="password" class="form-control" placeholder="Password">
												<div class="input-group-append">
														<div class="input-group-text">
																<span class="fas fa-lock"></span>
														</div>
												</div>
										</div>
										<div class="row">
												<div class="col-8">
														<div class="icheck-primary">
																<input type="checkbox" id="remember">
																<label for="remember">
																		Remember Me
																</label>
														</div>
												</div>
												<!-- /.col -->
												<div class="col-4">
														<button type="submit" class="btn btn-primary btn-block">Sign In</button>
												</div>
												<!-- /.col -->
										</div>
								</form>

								<div class="social-auth-links mb-3 mt-2 text-center">
										<a href="#" class="btn btn-block btn-primary">
												<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
										</a>
										<a href="#" class="btn btn-block btn-danger">
												<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
										</a>
								</div>
								<!-- /.social-auth-links -->

								<p class="mb-1">
										<a href="forgot-password.html">I forgot my password</a>
								</p>
								<p class="mb-0">
										<a href="register.html" class="text-center">Register a new membership</a>
								</p>
						</div>
						<!-- /.card-body -->
				</div>
				<!-- /.card -->
		</div>
		<!-- /.login-box -->

		<!-- jQuery -->
		<script src="{{ asset('plugins') }}/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('dist') }}/js/adminlte.min.js"></script>
</body>

</html>














<!DOCTYPE html>
<html>

<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>BliMoto Admin | Log in</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('dist') }}/css/AdminLTE.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/iCheck/square/blue.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Google Font -->
		<link rel="stylesheet"
				href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
		<div class="login-box">
				<div class="login-logo">
						<a href="../../index2.html"><b>BliMoto</b>Admin</a>
				</div>
				<!-- /.login-logo -->
				<div class="login-box-body">
						<p class="login-box-msg">Sign in to start your session</p>

						@error('error')
								<div class="alert alert-danger">
										{{ $message }}
								</div>
						@enderror

						<form action="{{ route('admin.login') }}" method="post">
								@method('POST') @csrf
								<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Username" name="username"
												value="{{ old('username') }}">
										@error('username')
												<span class="text-danger">{{ $message }}</span>
										@enderror
								</div>
								<div class="form-group has-feedback">
										<input type="password" class="form-control" placeholder="Password" name="password">
										<span class="glyphicon glyphicon-lock form-control-feedback"></span>
										@error('password')
												<span class="text-danger">{{ $message }}</span>
										@enderror
								</div>
								<div class="row">
										<!-- /.col -->
										<div class="col-xs-4">
												<button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
										</div>
										<!-- /.col -->
								</div>
						</form>
						@if (session('login'))
								<div class="alert alert-danger">
										{{ session('login') }}
								</div>
						@endif

				</div>
				<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->

		<!-- jQuery 3 -->
		<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- iCheck -->
		<script src="{{ asset('plugins') }}/iCheck/icheck.min.js"></script>
		<script>
				$(function() {
						$('input').iCheck({
								checkboxClass: 'icheckbox_square-blue',
								radioClass: 'iradio_square-blue',
								increaseArea: '20%' /* optional */
						});
				});
		</script>
</body>

</html>
