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
		<meta name="google-site-verification" content="k1ziQJbp0ogvxEck-5eDye2pedBi5-8CHPUkvjdfN94" />

		{{-- clear cache start --}}
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="0">
		{{-- clear cache end --}}

		<link rel="icon" href="{{ asset('assets') }}/images/favicon/favicon.webp" type="image/x-icon" />
		<link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon/favicon.webp" type="image/x-icon" />
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
		<!-- botman -->
		<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> -->
		<!--icon css-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/font-awesome.css" />
		<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/themify.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
		<!--Slick slider css-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/slick.css" />
		<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/slick-theme.css" />
		<!--Animate css-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/animate.css" />
		<!-- Bootstrap css -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.css" />
		<!-- Theme css -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/color10.css" media="screen" id="color" />

		<!-- select 2 css & js -->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet"
				href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />

		<!-- css custom agung -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/custom/custom.css" />

		<link rel="stylesheet" href="{{ asset('assets') }}/owl/owl.carousel.min.css" />
		<link rel="stylesheet" href="{{ asset('assets') }}/owl/owl.theme.default.min.css" />

		<link rel="stylesheet" href="{{ asset('assets') }}/css/simplyCountdown.css">

		<link rel="stylesheet" type="text/css">
		<script src="{{ asset('assets') }}/js/countDown.js"></script>

		<!-- sweat alert -->
		{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"> --}}
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

		<style>
				/* CSS untuk latar belakang hitam */
				.black-overlay {
						position: fixed;
						top: 0;
						left: 0;
						width: 100%;
						height: 100%;
						background-color: rgba(0, 0, 0, 0.7);
						z-index: 9999;
						display: none;
						/* Mengatur awalnya disembunyikan */
				}

				/* CSS untuk kotak pop-up */
				.custom-popup {
						width: 100%;
						position: absolute;
						top: 1rem;
						right: 1rem;
						bottom: 1rem;
						left: 1rem;
						overflow-y: auto;
						background-color: #fff;
						padding: 1rem;
						display: flex;
						flex-direction: column;
						/* Menyusun elemen secara vertikal */
				}

				.close-popup-btn {
						align-self: flex-end;
						background: none;
						border: none;
						font-size: 20px;
						cursor: pointer;
						padding: 0;
						margin: 0;
						position: absolute;
						top: 0.5rem;
						right: 0.5rem;
				}

				body.popup-open {
						overflow: hidden;
				}

				.space-l {
						margin-left: 20px !important;
				}
		</style>



		@stack('css')


</head>

<body class="bg-light" style="max-width: 2000px;">
		{{-- @include('sweetalert::alert') --}}

		@include('user.layouts.partials.header')

		@yield('content')

		@include('user.layouts.partials._modal_lokasi')

		{{-- <div id="#lokasi_modal_wrapper"></div> --}}

		{{-- <x-modal-lokasi></x-modal-lokasi> --}}

		@include('user.layouts.partials.footer')

		<!-- video modal start -->
		<div class="modal modal-v-sec fade" id="v-section1" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
						<!-- Modal content-->
						<div class="modal-content">
								<!-- <i class="close ti-close" data-bs-dismiss="modal"></i>            -->
								{{-- <iframe src="https://www.youtube.com/watch?v=b9kGXU_g0c0"
										allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
										allowfullscreen></iframe> --}}

								<iframe width="560" height="315" src="https://www.youtube.com/embed/8W9OlymohU0?si=HyFuG2ioOZjfyddH"
										title="YouTube video player" frameborder="0"
										allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
										allowfullscreen></iframe>
						</div>
				</div>
		</div>
		<!-- video modal start -->


		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-K73QGFKNRE"></script>
		<script>
				window.dataLayer = window.dataLayer || [];

				function gtag() {
						dataLayer.push(arguments);
				}
				gtag('js', new Date());

				gtag('config', 'G-K73QGFKNRE');
		</script>

		<!-- add to  setting bar  end-->
		<!-- latest jquery-->
		<script src="{{ asset('assets') }}/js/jquery-3.3.1.min.js"></script>
		<!-- slick js-->
		<script src="{{ asset('assets') }}/js/slick.js"></script>

		<!-- tool tip js -->

		<script src="{{ asset('assets') }}/js/tippy-popper.min.js"></script>
		<script src="{{ asset('assets') }}/js/tippy-bundle.iife.min.js"></script>

		<!-- popper js-->
		<script src="{{ asset('assets') }}/js/popper.min.js"></script>

		<!-- menu js-->
		<script src="{{ asset('assets') }}/js/menu.js"></script>

		<!-- ajax search js -->
		<script src="{{ asset('assets') }}/js/typeahead.bundle.min.js"></script>
		<script src="{{ asset('assets') }}/js/typeahead.jquery.min.js"></script>
		<script src="{{ asset('assets') }}/js/ajax-custom.js"></script>

		<!-- father icon -->
		<script src="{{ asset('assets') }}/js/feather.min.js"></script>
		<script src="{{ asset('assets') }}/js/feather-icon.js"></script>

		<!-- Bootstrap js-->
		<script src="{{ asset('assets') }}/js/bootstrap.js"></script>
		<!-- Bootstrap js-->
		<script src="{{ asset('assets') }}/js/bootstrap-notify.min.js"></script>
		<!-- Theme js-->
		<script src="{{ asset('assets') }}/js/slider-animat-three.js"></script>
		<script src="{{ asset('assets') }}/js/script.js"></script>
		<script src="{{ asset('assets') }}/js/modal.js"></script>

		<!-- select 2 js  -->
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script src="{{ asset('assets') }}/js/custom/custom.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
		<script src="{{ asset('assets') }}/owl/owl.carousel.min.js"></script>



		<script>
				const isDev = "{{ env('JS_LOG') }}" === 'development';

				isDev && console.log('Mode development aktif');



				// functional untuk tap 3 detik alihkan ke halaman admin
				$(document).ready(function() {
						let holdTimeout;

						$('.brand-logo a').on('mousedown', function(event) {
								event.preventDefault();
								holdTimeout = setTimeout(function() {
										window.location.href = '/app/dashboard';
								}, 4000);
						});

						$('.brand-logo a').on('mouseup mouseout', function() {
								clearTimeout(holdTimeout);
						});
				});


				$(document).ready(function() {
						$('#kategoriPencarian').on('invalid', function() {
								this.setCustomValidity('Silakan pilih kategori dahulu untuk melanjutkan.');
						}).on('change', function() {
								this.setCustomValidity('');
						});
				});
		</script>

		<script src="{{ asset('assets/js/main.js') }}"></script>

		@stack('script')


		{{-- <script src="{{ asset('assets/js/nohack.js') }}"></script> --}}


		<!-- botman -->
		<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
		<script>
				var botmanWidget = {
						// chatServer: '/botman',
						// frameEndpoint: '/botman',
						aboutText: 'BliMoto',
						// introMessage: 'Selamat Datang !, Silahkan ketik <strong class="text-danger">mulai</strong> untuk memulai percakapan atau ketik <strong class="text-danger">isi data</strong> untuk langsung mengisi form dan mengubungi admin',
						introMessage: 'Untuk memulai percakapan silahkan ketik <strong>y</strong> untuk melanjutkan ...',
						title: 'Customer Service BliMoto',
						headerTextColor: '#fff',
						mainColor: '#DD0202',
						bubbleBackground: '#DD0202',
						mobileHeight: '99vh',
						desktopHeight: '70vh',
						desktopWidth: '40vh',
						mobileWidth: '80vh',
						init: function() {
								console.log('Widget BotMan dimulai');
								setTimeout(function() {
										console.log('Mengirim perintah start_conversation');
										BotmanWidget.api.send('start_conversation');
								}, 3000);
						}


				};
		</script>

</body>

</html>
