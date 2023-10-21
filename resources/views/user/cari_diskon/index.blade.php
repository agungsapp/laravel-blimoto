@extends('user.layouts.main')
@section('content')
		<section>
				<div class="container pt-5">
						<div id="detail-motor-baru " class="row">
								<div id="motor-baru" class="col-12 col-md-6 col-lg-4 col-xl-3 rounded-3 min-vh-50"
										style="box-shadow: 2px 2px 15px 2px rgba(0, 0, 0, 0.25); padding: 16px; border-radius: 20px">
										<img src="/assets/images/detail-motor/2023-10-07_Produk Promo 31 - Copy.webp" class="img-fluid"
												alt="${motorData.detail_motor[0].gambar
                    }" srcset=""
												style="max-width: 100%; height: auto;">
										<div class="product-right py-5">
												<div class="d-flex justify-content-between">
														<p class="text-dark nama-motor fs-lg-4 fw-bold">Beat</h>
														<div class="fs-5 nama-motor"><i class="fa text-danger fa-map-marker" aria-hidden="true"></i>
																<span class="ms-2">Jakarta</span>
														</div>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Harga OTR</h6>
														<p class="nama-motor" style="font-weight: bold; color: red;">Rp. 1.000.000 </p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="product-title nama-motor">Metode Pembayaran</h6>
														<span class="badge bg-success nama-motor">Kredit</span>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Tipe</h6>
														<p class="nama-motor">Matic</p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Merk</h6>
														<p class="nama-motor">Honda</p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Stock</h6>
														<p class="nama-motor" style="font-weight: bold; color: green;">Tersedia</p>
												</div>
										</div>
								</div>
								<div id="leasing-baru"
										class="col-12 col-md-6 content-slick-wrapper col-lg-8 col-xl-9 d-flex justify-content-center slick-result-modal mt-lg-0 mt-3 flex-row"
										style="flex-direction: row;">

										<div class="card" style="width: 15rem; margin-left: 10px; margin-bottom: 20px;">
												<img
														style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
														src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_W1.png" class="card-img-top"
														alt="2023-10-11_W1.png">
												<ul class="list-group list-group-flush">
														<li class="list-group-item d-flex justify-content-between">
																<p>DP</p>
																<p>Rp. 1.000.000 </p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Diskon</p>
																<p>Rp. 1.000.000 </p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>DP Bayar</p>
																<p style="font-weight: bold; color: red;">Rp. 1.000.000 </p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Angsuran</p>
																<p style="font-weight: bold; color: red;">Rp. 1.000.000 </p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Tenor</p>
																<p>1 Bulan</p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Potongan Tenor</p>
																<p>1 Bulan</p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Total Tenor</p>
																<p>1 Bulan</p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Total Bayar</p>
																<p style="font-weight: bold; color: red;">Rp. 1.000.000 </p>
														</li>
												</ul>
												<div class="card-body d-flex justify-content-center">
														<a href="#" class="btn btn-success w-100">Ajukan Sekarang</a>
												</div>
										</div>
								</div>
								{{-- nav slick slider custom --}}
								<div class="d-flex justify-content-between nav-wrapper">
										<div id="next" class="next">
												<span>
														<i class="fa fa-1x fa-arrow-circle-right" aria-hidden="true"></i>
												</span>
										</div>
										<div id="prev" class="prev d-none">
												<span>
														<i class="fa fa-2x fa-arrow-circle-left" aria-hidden="true"></i>
												</span>
										</div>
								</div>
								{{-- nav slick slider end --}}
						</div>
						<div class="collection-img">
								<img class="w-100 mx-auto mt-5" src="{{ asset('assets') }}/images/custom/banner-Rekomendasi.webp" class="w-100"
										alt="banner">
						</div>
						<div class="row mb-5 mt-5">
								<div id="motor-baru" class="col-12 col-md-6 col-lg-4 col-xl-3 rounded-3 min-vh-50"
										style="box-shadow: 2px 2px 15px 2px rgba(0, 0, 0, 0.25); padding: 16px; border-radius: 20px">
										<img src="/assets/images/detail-motor/2023-10-07_Produk Promo 31 - Copy.webp" class="img-fluid" alt="gambar"
												srcset="" style="max-width: 100%; height: auto;">
										<div class="product-right py-5">
												<div class="d-flex justify-content-between">
														<p class="text-dark nama-motor fs-lg-4 fw-bold">Beat</h>
														<div class="fs-5 nama-motor"><i class="fa text-danger fa-map-marker" aria-hidden="true"></i>
																<span class="ms-2">Jakarta</span>
														</div>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Harga OTR</h6>
														<p class="nama-motor" style="font-weight: bold; color: red;">Rp. 1.000.000 </p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="product-title nama-motor">Metode Pembayaran</h6>
														<span class="badge bg-success nama-motor">Kredit</span>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Tipe</h6>
														<p class="nama-motor">Matic</p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Merk</h6>
														<p class="nama-motor">Honda</p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Stock</h6>
														<p class="nama-motor" style="font-weight: bold; color: green;">Tersedia</p>
												</div>
										</div>
								</div>
								<div
										class="col-12 col-md-6 content-slick-wrapper col-lg-8 col-xl-9 d-flex justify-content-center slick-result-modal mt-lg-0 mt-3 flex-row"
										style="flex-direction: row;">

										<div class="card" style="width: 15rem; margin-left: 10px; margin-bottom: 20px;">
												<img
														style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
														src="{{ asset('assets') }}/images/custom/leasing/2023-10-11_W1.png" class="card-img-top"
														alt="2023-10-11_W1.png">
												<ul class="list-group list-group-flush">
														<li class="list-group-item d-flex justify-content-between">
																<p>DP</p>
																<p>Rp. 1.000.000 </p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Diskon</p>
																<p>Rp. 1.000.000 </p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>DP Bayar</p>
																<p style="font-weight: bold; color: red;">Rp. 1.000.000 </p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Angsuran</p>
																<p style="font-weight: bold; color: red;">Rp. 1.000.000 </p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Tenor</p>
																<p>1 Bulan</p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Potongan Tenor</p>
																<p>1 Bulan</p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Total Tenor</p>
																<p>1 Bulan</p>
														</li>
														<li class="list-group-item d-flex justify-content-between">
																<p>Total Bayar</p>
																<p style="font-weight: bold; color: red;">Rp. 1.000.000 </p>
														</li>
												</ul>
												<div class="card-body d-flex justify-content-center">
														<a href="#" class="btn btn-success w-100">Ajukan Sekarang</a>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
@endsection
