@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Detail</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">home</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">detail motor </a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<div class="container-fluid mt-5">
				<div class="row px-4">
						<div id="motor-baru" class="col-12 col-md-4 col-lg-4 col-xl-3 rounded-3 min-vh-50"
								style="box-shadow: 2px 2px 15px 2px rgba(0, 0, 0, 0.25); padding: 16px; border-radius: 20px">
								<img src="{{ asset('assets') }}/images/detail-motor/2023-10-13_Produk Promo BEAT CBS BLACK.webp" class="img-fluid"
										alt="2023-10-13_Produk Promo BEAT CBS BLACK.webp" srcset="" style="max-width: 100%; height: auto;">
								<div class="product-right py-5">
										<div class="d-flex justify-content-between">
												<p class="text-dark nama-motor fs-lg-4 fw-bold">Honda Misteri</h>
												<div class="fs-5 nama-motor"><i class="fa text-danger fa-map-marker" aria-hidden="true"></i>
														<span class="ms-2">Jakarta</span>
												</div>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Harga OTR</h6>
												<p class="nama-motor" style="font-weight: bold; color: red;">Rp. 1.xxx.xxx</p>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="product-title nama-motor">Metode Pembayaran</h6>
												<span class="badge bg-success nama-motor">Kredit</span>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Tipe</h6>
												<p class="nama-motor">Beat Mber</p>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Merk</h6>
												<p class="nama-motor">Honde</p>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Stock</h6>
												<p class="nama-motor" style="font-weight: bold; color: green;">Tersedia</p>
										</div>
								</div>
						</div>
						<div
								class="col-12 col-md-8 col-lg-8 col-xl-9 mt-lg-0 owl-carousel-leasing d-flex align-items-center mt-3 overflow-hidden">
								<div class="card" style=" margin-left: 10px;">
										<img style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_w2.webp" class="card-img-top"
												alt="2023-10-11_w2.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>
								</div>
								<div class="card" style=" margin-left: 10px;">
										<img style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_W3.webp" class="card-img-top"
												alt="2023-10-11_W3.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>

								</div>
								<div class="card" style=" margin-left: 10px;">
										<img style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_w2.webp" class="card-img-top"
												alt="2023-10-11_w2.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>
								</div>
								<div class="card" style=" margin-left: 10px;">
										<img style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_W3.webp" class="card-img-top"
												alt="2023-10-11_W3.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>
								</div>
								<div class="card" style=" margin-left: 10px;">
										<img style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_w2.webp" class="card-img-top"
												alt="2023-10-11_w2.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>
								</div>
								<div class="card" style=" margin-left: 10px;">
										<img
												style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_W3.webp" class="card-img-top"
												alt="2023-10-11_W3.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>
								</div>
						</div>
				</div>
		</div>

		<hr>

		{{-- banner rekomendasi  --}}
		<section class="container-fluid">
				<div class="row">
						<div class="col-12 d-flex justify-content-center">
								<img class="img-fluid" src="{{ asset('assets') }}/images/custom/banner-Rekomendasi.webp"
										alt="banner-Rekomendasi.webp" srcset="">
						</div>
				</div>
		</section>


		<div class="container-fluid mb-5 mt-5">
				<div class="row px-4">
						<div id="motor-baru" class="col-12 col-md-4 col-lg-4 col-xl-3 rounded-3 min-vh-50"
								style="box-shadow: 2px 2px 15px 2px rgba(0, 0, 0, 0.25); padding: 16px; border-radius: 20px">
								<img src="{{ asset('assets') }}/images/detail-motor/2023-10-13_Produk Promo BEAT CBS BLACK.webp"
										class="img-fluid" alt="2023-10-13_Produk Promo BEAT CBS BLACK.webp" srcset=""
										style="max-width: 100%; height: auto;">
								<div class="product-right py-5">
										<div class="d-flex justify-content-between">
												<p class="text-dark nama-motor fs-lg-4 fw-bold">Honda Misteri</h>
												<div class="fs-5 nama-motor"><i class="fa text-danger fa-map-marker" aria-hidden="true"></i>
														<span class="ms-2">Jakarta</span>
												</div>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Harga OTR</h6>
												<p class="nama-motor" style="font-weight: bold; color: red;">Rp. 1.xxx.xxx</p>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="product-title nama-motor">Metode Pembayaran</h6>
												<span class="badge bg-success nama-motor">Kredit</span>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Tipe</h6>
												<p class="nama-motor">Beat Mber</p>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Merk</h6>
												<p class="nama-motor">Honde</p>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Stock</h6>
												<p class="nama-motor" style="font-weight: bold; color: green;">Tersedia</p>
										</div>
								</div>
						</div>
						<div class="col-12 col-md-8 col-lg-8 col-xl-9 mt-lg-0 owl-carousel-leasing d-flex align-items-center mt-3 overflow-hidden">
								<div class="card" style=" margin-left: 10px;">
										<img
												style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_w2.webp" class="card-img-top"
												alt="2023-10-11_w2.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>
								</div>
								<div class="card" style=" margin-left: 10px;">
										<img
												style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_W3.webp" class="card-img-top"
												alt="2023-10-11_W3.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>
								</div>
								<div class="card" style=" margin-left: 10px;">
										<img
												style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_w2.webp" class="card-img-top"
												alt="2023-10-11_w2.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>
								</div>
								<div class="card" style=" margin-left: 10px;">
										<img
												style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_W3.webp" class="card-img-top"
												alt="2023-10-11_W3.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>
								</div>
								<div class="card" style=" margin-left: 10px;">
										<img
												style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_w2.webp" class="card-img-top"
												alt="2023-10-11_w2.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>
								</div>
								<div class="card" style=" margin-left: 10px;">
										<img
												style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
												src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_W3.webp" class="card-img-top"
												alt="2023-10-11_W3.webp">
										<ul class="list-group list-group-flush">
												<li class="list-group-item d-flex justify-content-between">
														<p>DP</p>
														<p>xxxxxxxxxxxxxx </p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Diskon</p>
														<p>xxxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>DP Bayar</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Angsuran</p>
														<p style="font-weight: bold; color: red;">xxxxxxxxxxxxx</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Potongan Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Tenor</p>
														<p>xx Bulan</p>
												</li>
												<li class="list-group-item d-flex justify-content-between">
														<p>Total Bayar</p>
														<p style="font-weight: bold; color: red;">xx</p>
												</li>
										</ul>
										<div class="card-body d-flex justify-content-center">
												<a href="" target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp"
																aria-hidden="true"></i><span class="ms-2">Ajukan Sekarang</span></a>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection


@push('script')
		<script>
				$('#id_lokasi').val(window.idLokasi)
				// count down :
				simplyCountdown('#timer', {
						year: 2023, // required
						month: 10, // required
						day: 29, // required
						hours: 24, // Default is 0 [0-23] integer
						minutes: 0, // Default is 0 [0-59] integer
						seconds: 0, // Default is 0 [0-59] integer
						words: { //words displayed into the countdown
								days: {
										singular: 'Hari',
										plural: 'Hari'
								},
								hours: {
										singular: 'Jam',
										plural: 'Jam'
								},
								minutes: {
										singular: 'Menit',
										plural: 'Menit'
								},
								seconds: {
										singular: 'Detik',
										plural: 'Detik'
								}
						},
				})

				$(document).ready(function() {
						$(".owl-carousel-leasing").owlCarousel({
								nav: false,
								navText: ['prev', 'next'],
								// margin: 10,
								autoplay: true,
								autoplayTimeout: 2000,
								autoplayHoverPause: false,
								loop: false,
								items: 5,
								merge: true,
								// stagePadding: 1,
								responsive: {
										0: {
												items: 1,
												nav: true
										},
										600: {
												items: 2,
												nav: false
										},
										1000: {
												items: 3,
												nav: true,
												loop: false
										},
										1500: {
												items: 4,
												nav: true,
												loop: false
										},
										1700: {
												items: 5,
												nav: true,
												loop: false
										}
								},

						});
				});
		</script>
@endpush
