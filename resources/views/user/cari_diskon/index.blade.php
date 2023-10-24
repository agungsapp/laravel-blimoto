@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Cari Diskon</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">home</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">cari diskon</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<section>
				<div class="container-fluid p-5 pt-5">
						<div id="detail-motor-baru " class="row">
								<div id="motor-baru" class="col-12 col-md-6 col-lg-4 col-xl-3 rounded-3 min-vh-50"
										style="box-shadow: 2px 2px 15px 2px rgba(0, 0, 0, 0.25); padding: 16px; border-radius: 20px">
										<img src="{{ asset('assets') }}/images/detail-motor/{{ $data['motor']['detail_motor'][0]['gambar'] }}"
												class="img-fluid" alt="{{ $data['motor']['detail_motor'][0]['gambar'] }}" srcset=""
												style="max-width: 100%; height: auto;">
										<div class="product-right py-5">
												<div class="d-flex justify-content-between">
														<p class="text-dark nama-motor fs-lg-4 fw-bold">{{ $data['motor']['nama'] }}</h>
														<div class="fs-5 nama-motor"><i class="fa text-danger fa-map-marker" aria-hidden="true"></i>
																<span class="ms-2">{{ $lokasi }}</span>
														</div>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Harga OTR</h6>
														<p class="nama-motor" style="font-weight: bold; color: red;">{{ Str::rupiah($data['motor']['otr']) }}</p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="product-title nama-motor">Metode Pembayaran</h6>
														<span class="badge bg-success nama-motor">Kredit</span>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Tipe</h6>
														<p class="nama-motor">{{ $data['motor']['type'] }}</p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Merk</h6>
														<p class="nama-motor">{{ $data['motor']['merk'] }}</p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Stock</h6>
														<p class="nama-motor" style="font-weight: bold; color: green;">Tersedia</p>
												</div>
										</div>
								</div>
								<div id="slick-cari-diskon"
										class="col-12 col-md-6 col-lg-8 col-xl-9 d-flex mt-lg-0 justify-content-center slick-cari-diskon mt-5">
										@foreach ($data['cicilan_motor'] as $les1)
												<div class="p-1">
														<div class="card" style="width: 15rem; margin-left: 10px; margin-bottom: 20px;">
																<img
																		style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
																		src="{{ asset('assets') }}/images/custom/leasing/{{ $les1['gambar'] }}" class="card-img-top"
																		alt="{{ $les1['gambar'] }}">
																<ul class="list-group list-group-flush">
																		<li class="list-group-item d-flex justify-content-between">
																				<p>DP</p>

																				<p>{{ Str::rupiah($les1['dp']) }} </p>
																		</li>
																		<li class="list-group-item d-flex justify-content-between">
																				<p>Diskon</p>
																				<p>{{ Str::rupiah($les1['diskon']) }}</p>
																		</li>
																		<li class="list-group-item d-flex justify-content-between">
																				<p>DP Bayar</p>
																				<p style="font-weight: bold; color: red;">{{ Str::rupiah($les1['dp_bayar']) }}</p>
																		</li>
																		<li class="list-group-item d-flex justify-content-between">
																				<p>Angsuran</p>
																				<p style="font-weight: bold; color: red;">{{ Str::rupiah($les1['angsuran']) }}</p>
																		</li>
																		<li class="list-group-item d-flex justify-content-between">
																				<p>Tenor</p>
																				<p>{{ $les1['tenor'] }} Bulan</p>
																		</li>
																		<li class="list-group-item d-flex justify-content-between">
																				<p>Potongan Tenor</p>
																				<p>{{ $les1['potongan_tenor'] }} Bulan</p>
																		</li>
																		<li class="list-group-item d-flex justify-content-between">
																				<p>Total Tenor</p>
																				<p>{{ $les1['total_tenor'] }} Bulan</p>
																		</li>
																		<li class="list-group-item d-flex justify-content-between">
																				<p>Total Bayar</p>
																				<p style="font-weight: bold; color: red;">{{ Str::rupiah($les1['total_bayar']) }}</p>
																		</li>
																</ul>
																<div class="card-body d-flex justify-content-center">
																		<a href="https://wa.me/6281373939116?text=Hallo%20Admin.%20%0Asaya%20ingin%20bertanya%20terkait%20dengan%20unit%20{{ $data['motor']['merk'] . ' ' . $data['motor']['nama'] }}%20untuk%20kredit%20dengan%20leasing%20%20{{ $les1['nama_leasing'] }}%20angsuran%20{{ Str::rupiah($les1['angsuran']) }}%20tenor%20{{ $les1['tenor'] }}.%20syarat%20pengajuan%20nya%20apa%20saja%20ya%20?%20"
																				target="_blank" class="btn btn-success w-100">Ajukan Sekarang</a>
																</div>
														</div>
												</div>
										@endforeach

										@for ($i = count($data['cicilan_motor']); $i < 7; $i++)
												<div class="p-1"></div>
										@endfor

								</div>
								<div class="d-flex justify-content-around text-basic position-relative"
										style="width: 100%; margin-top: 3rem; top: -37vh;">
										<div class="prev arrow_prev">
												<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>Prev
										</div>
										<div class="next arrow_next">
												<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
										</div>
								</div>

								{{-- <div>
										<div id="prev" class="arrow_prev">
												<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
										</div>
										<div id="next" class="arrow_next">
												<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
										</div>
								</div> --}}

								{{-- <div id="leasing-baru"
										class="col-12 col-md-6 col-lg-8 col-xl-9 d-flex justify-content-center slick-result-modal mt-lg-0 mt-3 flex-row"
										style="flex-direction: row;"></div> --}}
								{{-- nav slick slider custom --}}
								{{-- <div class="d-flex justify-content-between nav-wrapper">
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
								</div> --}}
								{{-- nav slick slider end --}}
						</div>
						<div class="collection-img">
								<img class="w-100 mx-auto mt-5" src="{{ asset('assets') }}/images/custom/banner-Rekomendasi.webp" class="w-100"
										alt="banner">
						</div>
						{{-- {{ count($rekomendasi[0]['cicilan_motor']) }} --}}
						{{-- loop rekomendasi motor --}}
						@foreach ($rekomendasi as $rek)
								<div id="rekomendasi-motor" class="row mt-5">
										<div id="motor-baru" class="col-12 col-md-6 col-lg-4 col-xl-3 rounded-3 min-vh-50"
												style="box-shadow: 2px 2px 15px 2px rgba(0, 0, 0, 0.25); padding: 16px; border-radius: 20px">
												<img src="{{ asset('assets') }}/images/detail-motor/{{ $rek['motor']['detail_motor'][0]['gambar'] }}"
														class="img-fluid" alt="{{ $rek['motor']['detail_motor'][0]['gambar'] }}" srcset=""
														style="max-width: 100%; height: auto;">
												<div class="product-right py-5">
														<div class="d-flex justify-content-between">
																<p class="text-dark nama-motor fs-lg-4 fw-bold">{{ $rek['motor']['nama'] }}</h>
																<div class="fs-5 nama-motor"><i class="fa text-danger fa-map-marker" aria-hidden="true"></i>
																		<span class="ms-2">{{ $lokasi }}</span>
																</div>
														</div>
														<div class="d-flex justify-content-between mt-2">
																<h6 class="fw-bold text-doff nama-motor">Harga OTR</h6>
																<p class="nama-motor" style="font-weight: bold; color: red;">{{ Str::rupiah($rek['motor']['otr']) }}
																</p>
														</div>
														<div class="d-flex justify-content-between mt-2">
																<h6 class="product-title nama-motor">Metode Pembayaran</h6>
																<span class="badge bg-success nama-motor">Kredit</span>
														</div>
														<div class="d-flex justify-content-between mt-2">
																<h6 class="fw-bold text-doff nama-motor">Tipe</h6>
																<p class="nama-motor">{{ $rek['motor']['type'] }}</p>
														</div>
														<div class="d-flex justify-content-between mt-2">
																<h6 class="fw-bold text-doff nama-motor">Merk</h6>
																<p class="nama-motor">{{ $rek['motor']['merk'] }}</p>
														</div>
														<div class="d-flex justify-content-between mt-2">
																<h6 class="fw-bold text-doff nama-motor">Stock</h6>
																<p class="nama-motor" style="font-weight: bold; color: green;">Tersedia</p>
														</div>
												</div>
										</div>
										<div class="col-12 col-md-6 col-lg-8 col-xl-9 d-flex mt-lg-0 justify-content-center slick-cari-diskon mt-5">
												{{-- @dd($rek) --}}
												@foreach ($rek['cicilan_motor'] as $reles)
														<div class="p-1">
																<div class="card" style="width: 15rem; margin-left: 10px; margin-bottom: 20px;">
																		<img
																				style="min-height: 130px; background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp');"
																				src="{{ asset('assets') }}/images/custom/leasing/{{ $reles['gambar'] }}" class="card-img-top"
																				alt="{{ $reles['gambar'] }}">
																		<ul class="list-group list-group-flush">
																				<li class="list-group-item d-flex justify-content-between">
																						<p>DP</p>
																						<p>{{ Str::rupiah($reles['dp']) }}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Diskon</p>
																						<p>{{ Str::rupiah($reles['diskon']) }}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>DP Bayar</p>
																						<p style="font-weight: bold; color: red;">{{ Str::rupiah($reles['dp_bayar']) }}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Angsuran</p>
																						<p style="font-weight: bold; color: red;">{{ Str::rupiah($reles['angsuran']) }}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Tenor</p>
																						<p>{{ Str::rupiah($reles['tenor']) }} Bulan</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Potongan Tenor</p>
																						<p>{{ Str::rupiah($reles['potongan_tenor']) }} Bulan</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Total Tenor</p>
																						<p>{{ Str::rupiah($reles['total_tenor']) }} Bulan</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Total Bayar</p>
																						<p style="font-weight: bold; color: red;">{{ Str::rupiah($reles['total_bayar']) }} </p>
																				</li>
																		</ul>
																		<div class="card-body d-flex justify-content-center">
																				<a href="https://wa.me/6281373939116?text=Hallo%20Admin.%20%0Asaya%20ingin%20bertanya%20terkait%20dengan%20unit%20{{ $rek['motor']['merk'] . ' ' . $rek['motor']['nama'] }}%20untuk%20kredit%20dengan%20leasing%20%20{{ $reles['nama_leasing'] }}%20angsuran%20{{ Str::rupiah($reles['angsuran']) }}%20tenor%20{{ $reles['tenor'] }}.%20syarat%20pengajuan%20nya%20apa%20saja%20ya%20?%20"
																						target="_blank" class="btn btn-success w-100">Ajukan Sekarang</a>
																		</div>
																</div>
														</div>
												@endforeach

												@for ($i = count($rek['cicilan_motor']); $i < 7; $i++)
														<div class="p-1"></div>
												@endfor
										</div>
										{{-- <div id="leasing-baru"
										class="col-12 col-md-6 col-lg-8 col-xl-9 d-flex justify-content-center slick-result-modal mt-lg-0 mt-3 flex-row"
										style="flex-direction: row;"></div> --}}
										{{-- nav slick slider custom --}}
										{{-- <div class="d-flex justify-content-between nav-wrapper">
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
								</div> --}}
										{{-- nav slick slider end --}}
								</div>
								<hr>
						@endforeach
				</div>
		</section>
@endsection
