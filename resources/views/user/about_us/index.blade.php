@extends('user.layouts.main') @section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">About Us</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">Home</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">About Us</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<section id="hero">
				<div style="height: 600px;" class="hero-about"></div>
		</section>

		<section class="bg-white px-5">
				<div class="container-fluid px-md-5 px-2">
						<div class="row">
								<div class="col-12 col-md-12 col-lg-6">
										<div class="welcome-item" style="margin-top: -5rem;">
												<div class="welcome-wrapper p-5">
														<h2>BLIMOTO</h2>
														<h3>Selamat datang di Blimoto !</h3>
														<p>
																Sebuah platform yang mempermudah anda dalam mencari informasi terkait harga, angsuran hingga diskon yang
																sesungguhnya dari sebuah produk kendaraan yang sedang anda cari. Blimoto menyediakan fitur yang membuat
																anda
																cukup diam ditempat tanpa harus mengunjungi dealer konfensional hanya untuk mencari informasi terkait,
																Blimoto
																juga memberikan pelayanan untuk anda agar dapat melakukan pembelian kendaraan tanpa harus beranjak dari
																tempat
																anda berada.

																karena BLIMOTO solusi kita bersma.
														</p>
												</div>
										</div>
								</div>
								<div class="col-12 col-md-12 col-lg-6">
										<div class="fitur-kami-wrapper p-5">
												<h4 class="mb-3 text-black">Jelajahi Fitur Kami : </h4>
												<div class="row">
														<div class="col-12 col-md-6 p-2">
																<div class="rounded-lg p-4" style="border: 1px solid #D22232; background-color: #FFF6F7;">
																		<h5 class="text-black">Diskon Terbaik!</h5>
																		<p class="text-black">Nikmati penawaran diskon eksklusif untuk motor impianmu di Blimoto!</p>
																		<a href="{{ route('home.index') }}" class="btn btn-basic btn-fitur-kami">Lihat Diskon</a>
																</div>
														</div>
														<div class="col-12 col-md-6 p-2">
																<div class="rounded-lg p-4" style="border: 1px solid #01E928; background-color: #E3FFE8;">
																		<h5 class="text-black">DP Termurah!</h5>
																		<p class="text-black">Miliki motor impian dengan DP terjangkau hanya di Blimoto!</p>
																		<a href="{{ route('home.index') }}" style="background-color: #00EB27; color: white;"
																				class="btn btn-fitur-kami">Lihat
																				DP</a>
																</div>
														</div>
														<div class="col-12 col-md-6 p-2">
																<div class="rounded-lg p-4" style="border: 1px solid #FC0; background-color: #FFFAE4;">
																		<h5 class="text-black">Harga Terbawah!</h5>
																		<p class="text-black">Temukan harga terbaik untuk motor pilihanmu hanya di Blimoto!</p>
																		<a href="{{ route('home.index') }}" style="background-color: #FC0; color: white;"
																				class="btn btn-fitur-kami">Lihat
																				Harga</a>
																</div>
														</div>
														<div class="col-12 col-md-6 p-2">
																<div class="rounded-lg p-4" style="border: 1px solid #9747FF; background-color: #FFEDFF;">
																		<h5 class="text-black">Angsuran Ringan!</h5>
																		<p class="text-black">Nikmati angsuran ringan untuk memudahkan kepemilikan motor di Blimoto!</p>
																		<a href="{{ route('home.index') }}" style="background-color: #9747FF; color: white;"
																				class="btn btn-fitur-kami">Lihat
																				Angsuran</a>
																</div>
														</div>
												</div>

										</div>
								</div>
						</div>
						<div class="row mt-5">
								<div class="col-12">
										<h3 class="mb-3 text-black">Sejarah</h3>
										<p class="about-text text-black">Blimoto diluncurkan pada tanggal 23 bulan November 2023 dengan tujuan untuk
												memberikan
												informasi yang paling
												relevan mengenai semua kendaraan roda dua yang tersedia pada satu tempat.</p>
								</div>
						</div>
						<div class="row mt-5">
								<div class="col-12">
										<h3 class="mb-3 text-black">Alamat</h3>
										<p class="about-text text-black">Jl. Dr. Saharjo Jl. Tebet Raya No.319, RT.10/RW.1, Tebet Bar., Kec. Tebet, Kota
												Jakarta
												Selatan, Daerah
												Khusus Ibukota Jakarta 12810</p>
								</div>
						</div>
						<div class="row mt-5 py-5">
								<div class="col-12">
										<h3 class="mb-3 text-black">Hubungi Kami</h3>
										<div class="about-text mb-3 text-black">
												<i class="fa fa-whatsapp" aria-hidden="true"></i>
												<span>0823-2222-2023</span>
										</div>
										<div class="about-text mb-3 text-black">
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<span>blimotoindnesia@gmail.com</span>
										</div>

								</div>
						</div>
				</div>
		</section>
@endsection
