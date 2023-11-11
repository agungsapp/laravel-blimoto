<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Blimoto Login</title>
		<link rel="shortcut icon" href="/assets/images/favicon/favicon.webp" type="image/x-icon" />
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/fontawesome-free/css/all.min.css">
		<!-- icheck bootstrap -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/icheck-bootstrap/icheck-bootstrap.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('dist') }}/css/AdminLTE.min.css">

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

								@error('error')
										<div class="alert alert-danger">
												{{ $message }}
										</div>
								@enderror

								<form action="{{ route('admin.login') }}" method="post">
										@csrf
										@method('POST')
										<div class="input-group mb-3">
												<input type="text" class="form-control" name="username" placeholder="Username"
														value="{{ old('username') }}" autofocus>
												<div class="input-group-append">
														<div class="input-group-text">
																<span class="fas fa-user"></span>
														</div>
												</div>
										</div>
										@error('username')
												<span class="text-danger">{{ $message }}</span>
										@enderror
										<div class="input-group mb-3">
												<input type="password" class="form-control" placeholder="Password" name="password">
												<div class="input-group-append">
														<div class="input-group-text">
																<span class="fas fa-lock"></span>
														</div>
												</div>
										</div>
										@error('password')
												<span class="text-danger">{{ $message }}</span>
										@enderror
										<div class="social-auth-links mb-3 mt-2 text-center">
												<button type="submit" class="btn btn-block btn-primary">
														Login
												</button>

												<a href="{{ asset('home') }}" class="btn btn-block btn-danger">
														Home
												</a>
										</div>
								</form>

								@if (session('login'))
										<div class="alert alert-danger">
												{{ session('login') }}
										</div>
								@endif

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
