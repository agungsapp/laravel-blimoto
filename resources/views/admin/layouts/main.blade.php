<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Administrator BliMoto</title>

		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/fontawesome-free/css/all.min.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-buttons/css/buttons.bootstrap4.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('dist') }}/css/adminlte.min.css">

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
														<h1 class="m-0">Dashboard</h1>
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

		{{-- modal logout start --}}
		<div id="modal-logout" class="modal" tabindex="-1">
				<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
										<p>Modal body text goes here.</p>
								</div>
								<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save changes</button>
								</div>
						</div>
				</div>
		</div>
		{{-- modal logout end --}}

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
		<script src="{{ asset('plugins') }}/pdfmake/pdfmake.min.js"></script>
		<script src="{{ asset('plugins') }}/pdfmake/vfs_fonts.js"></script>
		<script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.html5.min.js"></script>
		<script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.print.min.js"></script>
		<script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.colVis.min.js"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('dist') }}/js/adminlte.min.js"></script>

		<script>
				$(document).ready(function() {
						console.log("window selesai di load")
						$('#btn-logout').on('click', function() {
								console.log("klik bang")
								$('#modal-logout').show();
						})
				})
		</script>

		@stack('script')

</body>

</html>
