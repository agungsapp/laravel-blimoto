<!DOCTYPE html>
<html lang="en">

<head>
		<title>BliMoto</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="description"
				content="Blimoto adalah startup pembelian motor baru dengan harga terbaik, proses cepat dan mudah serta terpercaya untuk wilayah jabodetabek " />
		<meta name="keywords" content="Blimoto" />
		<meta name="author" content="Blimoto" />
		<link rel="icon" href="assets/images/favicon/favicon.webp" type="image/x-icon" />
		<link rel="shortcut icon" href="assets/images/favicon/favicon.webp" type="image/x-icon" />
		<!--Google font-->
		<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet" />
		<link
				href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
				rel="stylesheet" />
		<link
				href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
				rel="stylesheet" />
		<link
				href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
				rel="stylesheet" />
		<!--icon css-->
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/themify.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
		<!--Slick slider css-->
		<link rel="stylesheet" type="text/css" href="assets/css/slick.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css" />
		<!--Animate css-->
		<link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
		<!-- Bootstrap css -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
		<!-- Theme css -->
		<link rel="stylesheet" type="text/css" href="assets/css/color10.css" media="screen" id="color" />

		<!-- select 2 css & js -->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet"
				href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />

		<!-- css custom agung -->
		<link rel="stylesheet" type="text/css" href="assets/css/custom/custom.css" />

		<link rel="stylesheet" href="assets/owl/owl.carousel.min.css" />
		<link rel="stylesheet" href="assets/owl/owl.theme.default.min.css" />

</head>

<body class="bg-light">


		<div class="container mt-5 text-center">
				<a href="/home">
						<img src="assets/images/logo/Logo-blimoto.webp" alt="">
				</a>
		</div>


		<!--section start-->
		<section class="login-page section-big-py-space b-g-light">
				<div class="custom-container">
						<div class="row">
								<div class="col-lg-4 offset-lg-4">
										<div class="theme-card shadow-sm">
												<h3 class="title8 mb-3 text-center">Login</h3>
												<form class="theme-form" action="{{ route('requestOTP') }}" method="post">
														@csrf
														<div class="row g-3">
																<label for="nohp">Nomor Hp</label>
																<div class="col-md-12 input-group mb-4">
																		<span class="input-group-text" id="nohp">+62</span>
																		<input type="text" class="form-control @error('nohp') is-invalid @enderror"
																				placeholder="08xxxxxxxxxx" name="nohp" aria-describedby="nohp" required>
																		@error('nohp')
																				{{-- <div class="alert alert-danger">{{ $message }}</div> --}}
																				<div class="invalid-feedback">
																						{{ $message }}
																				</div>
																		@enderror
																</div>

														</div>
														<div class="row g-3">
																<div class="col-md-12 form-group">
																		<button type="submit" class="btn btn-rounded">
																				Login
																		</button>
																</div>
														</div>
														<div class="row g-3">
																<div class="col-md-12">
																		<p>Belum punya akun ? <a href="{{ route('register') }}" class="txt-default">klik</a> di sini untuk
																				&nbsp;<a href="{{ route('register') }}" class="txt-default">daftar</a></p>
																</div>
														</div>
												</form>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!--Section ends-->

		<!-- video modal start -->
		<div class="modal modal-v-sec fade" id="v-section1" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
						<!-- Modal content-->
						<div class="modal-content">
								<!-- <i class="close ti-close" data-bs-dismiss="modal"></i>            -->
								<iframe src="https://www.youtube.com/embed/XUNKidriodQ?si=S99O0CtYIJo7vYu-"
										allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
										allowfullscreen></iframe>
						</div>
				</div>
		</div>
		<!-- video modal start -->



		<!-- add to  setting bar  end-->
		<!-- latest jquery-->
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<!-- slick js-->
		<script src="assets/js/slick.js"></script>

		<!-- tool tip js -->

		<script src="assets/js/tippy-popper.min.js"></script>
		<script src="assets/js/tippy-bundle.iife.min.js"></script>

		<!-- popper js-->
		<script src="assets/js/popper.min.js"></script>

		<!-- menu js-->
		<script src="assets/js/menu.js"></script>

		<!-- ajax search js -->
		<script src="assets/js/typeahead.bundle.min.js"></script>
		<script src="assets/js/typeahead.jquery.min.js"></script>
		<script src="assets/js/ajax-custom.js"></script>

		<!-- father icon -->
		<script src="assets/js/feather.min.js"></script>
		<script src="assets/js/feather-icon.js"></script>

		<!-- Bootstrap js-->
		<script src="assets/js/bootstrap.js"></script>
		<!-- Bootstrap js-->
		<script src="assets/js/bootstrap-notify.min.js"></script>
		<!-- Theme js-->
		<script src="assets/js/slider-animat-three.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/modal.js"></script>

		<!-- select 2 js  -->
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script src="assets/js/custom/custom.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

		<script src="assets/owl/owl.carousel.min.js"></script>

		@stack('script')

</body>

</html>
