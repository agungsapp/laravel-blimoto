<!DOCTYPE html>
<!--
This is a sangkuriang project 🔥 must be fast to build ges.
-->
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Administrator BliMoto</title>

		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/fontawesome-free/css/all.min.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-buttons/css/buttons.bootstrap4.min.css">

		<!-- Tempusdominus Bootstrap 4 -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

		<!-- Select2 -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/select2/css/select2.min.css">
		<link rel="stylesheet" href="{{ asset('plugins') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('dist') }}/css/AdminLTE.min.css">

		<!-- summernote -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">

		{{-- fancy box --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

		<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css" />

		<!-- lightbox -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">


</head>

<body class="hold-transition sidebar-mini">
		<div class="wrapper">

				<!-- Navbar -->
				@include('admin.layouts.partials.navbar')
				<!-- /.navbar -->

				<!-- Main Sidebar Container -->
				@include('admin.layouts.partials.sidebar')

				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper">
						<!-- Content Header (Page header) -->
						<div class="content-header">
								<div class="container-fluid">
										<div class="row mb-2">
												<div class="col-sm-6">

														@php
																$currentRouteName = Route::currentRouteName();
																$routeParts = explode('.', $currentRouteName);
																$pageTitlePart = isset($routeParts[1]) ? $routeParts[1] : 'dashboard';
																$pageTitle = ucwords(str_replace('-', ' ', $pageTitlePart));
														@endphp


														<h1 class="m-0">{{ $pageTitle ?? 'Dashboard' }}</h1>
												</div><!-- /.col -->
												<div class="col-sm-6">
														<ol class="breadcrumb float-sm-right">
																<li class="breadcrumb-item"><a href="#">Home</a></li>
																<li class="breadcrumb-item active">Dashboard</li>
														</ol>
												</div><!-- /.col -->
										</div><!-- /.row -->
								</div><!-- /.container-fluid -->
						</div>
						<!-- /.content-header -->

						<!-- Main content -->
						<div class="content">
								<div class="container-fluid">
										@yield('content')
										<!-- /.row -->
								</div><!-- /.container-fluid -->
						</div>
						<!-- /.content -->
				</div>
				<!-- /.content-wrapper -->

				<!-- Control Sidebar -->
				{{-- <aside class="control-sidebar control-sidebar-dark">
						<!-- Control sidebar content goes here -->
						<div class="p-3">
								<h5>Admin BliMoto</h5>
								<p>Sidebar content</p>
						</div>
				</aside> --}}
				<!-- /.control-sidebar -->

				<!-- Main Footer -->
				@include('admin.layouts.partials.footer')
		</div>
		<!-- ./wrapper -->



		<!-- REQUIRED SCRIPTS -->

		<!-- jQuery -->
		<script src="{{ asset('plugins') }}/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- DataTables  & Plugins -->
		<script src="{{ asset('plugins') }}/datatables/jquery.dataTables.min.js"></script>
		<script src="{{ asset('plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="{{ asset('plugins') }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="{{ asset('plugins') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
		<script src="{{ asset('plugins') }}/datatables-buttons/js/dataTables.buttons.min.js"></script>
		<script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
		<script src="{{ asset('plugins') }}/jszip/jszip.min.js"></script>
		<script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.html5.min.js"></script>
		<script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.print.min.js"></script>
		<script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.colVis.min.js"></script>


		<!-- Select2 -->
		<script src="{{ asset('plugins') }}/select2/js/select2.full.min.js"></script>

		<!-- InputMask -->
		<script src="{{ asset('plugins') }}/moment/moment.min.js"></script>
		<script src="{{ asset('plugins') }}/inputmask/jquery.inputmask.min.js"></script>

		<!-- Tempusdominus Bootstrap 4 -->
		<script src="{{ asset('plugins') }}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

		<!-- AdminLTE App -->
		<script src="{{ asset('dist') }}/js/adminlte.min.js"></script>

		<!-- Summernote -->
		<script src="{{ asset('plugins') }}/summernote/summernote-bs4.min.js"></script>
		{{-- fancy box --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		{{-- sweet alert --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

		<!-- light box -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>


		@stack('script')

</body>

</html>
