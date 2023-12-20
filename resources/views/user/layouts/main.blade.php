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

		@include('user.layouts.partials.header')

		@yield('content')

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
				console.log("aman running")
				var lokasiNow = 1;

				var locationLinks = document.querySelectorAll('.select-lokasi-user li a');
				var defaultLocationId = '1';
				var currentLocationId = sessionStorage.getItem('lokasiUser');

				if (!currentLocationId) {
						currentLocationId = defaultLocationId;
						sessionStorage.setItem('lokasiUser', defaultLocationId);
						console.log("change lokasi di tangkap !!!!!!!!!!!")
				}
				// Set nilai lokasi ke dalam input field dan teks menu saat halaman dimuat
				setLokasiToInput();
				setTeksMenuLokasi();
				updateLokasi(sessionStorage.getItem('lokasiUser'))

				console.log("aman running")
				var lokasiNow = 1;

				for (var i = 0; i < locationLinks.length; i++) {
						locationLinks[i].addEventListener('click', function(e) {
								e.preventDefault();
								var id = this.dataset.id;
								var location = this.textContent;
								sessionStorage.setItem('lokasiUser', id);
								var selectElement = document.querySelector('.lokasiTextShow');
								selectElement.textContent = location;
								var stickyNav = document.getElementById('lokasiTextShow2');
								stickyNav.textContent = location;

								// Update nilai variabel global saat lokasi berubah
								lokasiNow = id;
								setLokasiToInput();
								updateLokasi(lokasiNow);
								console.log(`behasil ubah id lokasi ke ${lokasiNow}`);
						});
				}

				function setLokasiToInput() {
						// Mendapatkan nilai dari session
						var lokasiId = sessionStorage.getItem('lokasiUser');

						var inputElement = document.getElementById('lokasi-user-pencarian');
						inputElement.value = lokasiId;
						window.idLokasi = lokasiId;
						console.log(`input elemen search id lokasi berhasil di ubah ${lokasiId}`);
						$('input[name="id_lokasi"]').val(lokasiId);
				}

				function setTeksMenuLokasi() {
						// Mendapatkan nilai dari session
						var lokasiId = sessionStorage.getItem('lokasiUser');

						// Mendapatkan elemen link berdasarkan id lokasi
						var linkElement = document.querySelector('.select-lokasi-user li a[data-id="' + lokasiId + '"]');

						// Mendapatkan teks lokasi dari elemen link
						var lokasiText = linkElement.textContent;

						// Men-set teks tersebut ke dalam elemen menu
						var selectElement = document.querySelector('.lokasiTextShow');
						selectElement.textContent = lokasiText;
						var stickyNav = document.getElementById('lokasiTextShow2');
						stickyNav.textContent = lokasiText;

				}



				// request ke server untuk melakukan update session lokasi user 
				function updateLokasi(lokasiUser) {
						$.ajax({
								type: 'POST',
								url: '/updateLokasi',
								data: {
										lokasiUser: lokasiUser,
										_token: '{{ csrf_token() }}'
								},
								success: function(response) {
										console.log('Data berhasil dikirim ke server');

								}
						});

				}

				// manipulasi navigasi
				$(document).ready(function() {
						$('#lokasi-ambang').hide();

						$(window).scroll(function() {
								var currentPosition = $(window).scrollTop();
								var triggerElementPosition = $('#stickyheader').offset().top;

								if (currentPosition >= triggerElementPosition) {
										$('#lokasi-ambang').show();
								} else {
										$('#lokasi-ambang').hide();
								}
						});

						watchTextChanges();


						// Attach a click event listener to the section with class 'video-banner'
						$('.video-banner').on('click', function(event) {
								// Prevent the default action and stop event propagation
								event.preventDefault();
								event.stopPropagation();

								// Trigger the click event of the anchor tag with class 'video-btn'
								$(this).find('.video-btn').trigger('click');
						});


						$(document).ready(function() {
								$('.sosiyal li').click(function(e) {
										// Mencegah aksi default jika targetnya bukan <a>
										if (!$(e.target).is('a')) {
												e.preventDefault();
												$(this).find('a')[0].click();
										}
								});
						});




				});


				function watchTextChanges() {
						// Simpan teks awal
						var previousText = $('#lokasiTextShow').text();

						// Set interval untuk memeriksa perubahan setiap detik
						setInterval(function() {
								// Periksa apakah teks telah berubah
								var currentText = $('#lokasiTextShow').text();
								if (currentText !== previousText) {
										// Jika teks berubah, lakukan reload halaman
										location.reload();
								}
						}, 1000); // Interval dapat disesuaikan sesuai kebutuhan
				}



				$(document).ready(function() {
						$('#kategoriPencarian').on('invalid', function() {
								this.setCustomValidity('Silakan pilih kategori dahulu untuk melanjutkan.');
						}).on('change', function() {
								this.setCustomValidity('');
						});
				});
		</script>

		@stack('script')


		<script src="{{ asset('assets/js/nohack.js') }}"></script>

</body>

</html>
<!-- botman -->
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
<script>
		var botmanWidget = {
				// chatServer: '/botman',
				// frameEndpoint: '/botman',
				aboutText: 'BliMoto',
				introMessage: 'Selamat Datang !, Silahkan ketik "mulai" untuk memulai percakapan.',
				title: 'Customer Service BliMoto',
				headerTextColor: '#fff',
				mainColor: '#DD0202',
				bubbleBackground: '#DD0202',
				mobileHeight: '100vh',
				desktopHeight: '70vh',
				desktopWidth: '40vh',
				mobileWidth: '80vh',

		};
</script>
