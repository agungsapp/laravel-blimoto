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


		<!-- section detail motor -->
		<section class="section-big-pt-space b-g-light">
				<div class="collection-wrapper">
						<div class="custom-container">
								<div class="row">
										<div class="col-lg-12 col-sm-12 col-xs-12">
												<div class="container-fluid">
														<div class="row">
																<div class="col-lg-6">
																		<div class="product-slick">
																				@foreach ($motor['detail_motor'] as $det)
																						<div>
																								<img src="/assets/images/detail-motor/{{ $det->gambar }}" alt="{{ $det->gambar }}"
																										class="img-fluid image_zoom_cls-0">
																						</div>
																				@endforeach

																		</div>
																		<div class="row">
																				<div class="col-12 p-0">
																						<div class="p-3">
																								<h4 class="fw-bold bg-basic p-3 text-center text-white">Pilih warna favorit kamu disini</h4>
																						</div>
																						<div class="slider-nav">
																								@foreach ($motor['detail_motor'] as $det)
																										<div>
																												<img src="/assets/images/detail-motor/{{ $det->gambar }}" alt="{{ $det->gambar }}"
																														class="img-fluid image_zoom_cls-0">
																										</div>
																								@endforeach
																								{{-- <div><img src="/assets/images/detail-color/1.webp" alt="1.webp" class="img-fluid">
																								</div> --}}
																						</div>
																				</div>
																		</div>
																</div>
																<div class="col-lg-6 rtl-text mt-lg-0 mt-5">
																		<div class="product-right">
																				<div class="pro-group d-flex justify-content-between align-items-baseline">
																						<div>
																								<h2>{{ $motor['nama'] }}</h2>
																								<ul class="pro-price">
																										<li>{{ Str::rupiah($motor['harga']) }}</li>
																								</ul>
																						</div>
																						<div class="d-flex align-items-baseline stok">
																								<p class="me-3">Stok: </p>
																								<h3 class="badge badge-pill bg-success badge-success">Tersedia</h3>
																						</div>
																				</div>
																				<div class="pro-group">
																						<div class="product-offer">
																								<h6 class="product-title"><i class="fa fa-tags"></i>Diskon 5 Leasing Terbaik </h6>
																								<div class="offer-contain mt-3">
																										<h3 class="text-danger mb-4 text-center">** Promo Motor Spesial Hari Ini! ** 🚀</h3>
																										<ul>

																												@foreach ($diskon_leasing as $les)
																														<li class="w-100 card-detail-motor row">
																																<div class="row">
																																		<h3 class="text-doff w-100 text-center">{{ $les->nama }}</h3>
																																</div>
																																<div class="row">
																																		<div class="col-7 mt-0">
																																				<h5 class="text-doff mt-2">DP Normal : <span
																																								class="text-basic">{{ Str::rupiah($les->dp) }}</span></h5>
																																				<div class="d-flex justify-content-between mt-3">
																																						<h5 class="text-doff">Diskon DP Pembayaran</h5>
																																						<del class="text-basic">
																																								<h5>{{ Str::rupiah($les->diskon_normal) }}</h5>
																																						</del>
																																				</div>
																																				<div class="d-flex justify-content-between mt-2">
																																						<h5 class="text-doff">DP Normalnya</h5>
																																						<del class="text-basic">
																																								<h5>{{ Str::rupiah($les->dp - $les->diskon_normal) }}</h5>
																																						</del>
																																				</div>
																																				<h5 class="bg-basic mt-2 py-1 text-center text-white">Hanya hari ini !</h5>
																																				<div class="d-flex justify-content-between align-items-baseline mt-2">
																																						<h5 class="text-doff">Diskon DP Promo</h5>
																																						<div class="label-diskon">
																																								<p class="text-basic">{{ Str::rupiah($les->diskon) }}</p>
																																						</div>
																																				</div>
																																				<div class="d-flex justify-content-between align-items-baseline mt-2">
																																						<h5 class="text-doff">DP Bayar</h5>
																																						<div class="label-diskon">
																																								<p class="text-basic">{{ Str::rupiah($les->dp - $les->diskon) }}</p>
																																						</div>
																																				</div>
																																		</div>
																																		<div class="col-4 offset-1 d-flex align-items-start justify-content-center flex-column">
																																				<img class="img-fluid"
																																						src="{{ asset('assets') }}/images/custom/leasing/{{ $les->gambar }}"
																																						alt="{{ $les->gambar }}">

																																		</div>
																																</div>
																																<div class="row">
																																		<div class="col-8">
																																				<p class="text-basic fw-bold">Hemat hingga
																																						{{ Str::rupiah($les->dp - $les->diskon_normal - ($les->dp - $les->diskon)) }} !
																																						Segera hubungi kami.
																																						Penawaran
																																						terbatas! 🏍💨</p>
																																				<a href="https://wa.me/6281373939116?text=Hallo%2C%20admin%0Asaya%20mau%20pesan%20unit%20Honda%20{{ $motor['nama'] }}%2C%20dengan%20pembayaran%20kredit%20melalui%20leasing%20{{ $les->nama }}.%20%0AApakah%20saat%20ini%20unit%20tersedia%20%3F%20"
																																						target="_blank" class="btn btn-sm btn-success mt-1 text-white"><i
																																								class="fa fa-whatsapp" aria-hidden="true"></i><span class="ms-2">Ajukan
																																								Sekarang</span></a>

																																		</div>
																																		<div class="col-4">
																																				{{-- <a href="#" class="btn btn-block bg-basic text-white">Lihat Detail</a> --}}
																																				<form action="{{ route('detail-leasing-no-reload') }}" method="get">
																																						@csrf
																																						<input type="hidden" name="id_motor" value="{{ $id_motor }}">
																																						<input type="hidden" name="id_leasing" value="{{ $les->id }}">
																																						<button type="submit" class="btn btn-block bg-basic text-white">Lihat
																																								detail</button>
																																				</form>
																																		</div>
																																</div>
																														</li>
																												@endforeach
																										</ul>
																								</div>
																						</div>
																				</div>
																				<div class="pro-group">
																						<div class="d-flex justify-content-between">
																								<h6 class="product-title">Promo berlaku sampai dengan :</h6>
																								<p style="border-radius: 10px;" class="btn btn-sm bg-doff text-white">15 Oktober 2023</p>
																						</div>
																						<div class="simply-countdown" id="timer">
																						</div>
																				</div>
																		</div>
																</div>
														</div>
												</div>


												<section class="tab-product tab-exes creative-card creative-inner">
														<div class="row">
																<div class="col-sm-12 col-lg-12">
																		<ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
																				<li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
																								href="#top-deskripsi" role="tab" aria-selected="true"><i
																										class="icofont icofont-ui-home"></i>Description</a>
																						<div class="material-border"></div>
																				</li>
																				<li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
																								href="#top-feature" role="tab" aria-selected="false"><i
																										class="icofont icofont-man-in-glasses"></i>Feature</a>
																						<div class="material-border"></div>
																				</li>
																				<li class="nav-item"><a class="nav-link" id="bonus-top-tab" data-bs-toggle="tab"
																								href="#bonus-feature" role="tab" aria-selected="false"><i
																										class="icofont icofont-man-in-glasses"></i>Bonus</a>
																						<div class="material-border"></div>
																				</li>
																		</ul>
																		<div class="tab-content nav-material" id="top-tabContent">
																				<div class="tab-pane fade show active mt-4" id="top-deskripsi" role="tabpanel"
																						aria-labelledby="top-home-tab">
																						{!! $motor['deskripsi'] !!}
																				</div>
																				<div class="tab-pane fade mt-4" id="top-feature" role="tabpanel"
																						aria-labelledby="profile-top-tab">
																						{!! $motor['fitur'] !!}
																				</div>
																				<div class="tab-pane fade mt-4" id="bonus-feature" role="tabpanel"
																						aria-labelledby="bonus-top-tab">
																						{!! $motor['bonus'] !!}
																				</div>
																		</div>
																</div>
														</div>
												</section>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- Section detail motor ends -->

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


		{{-- section rekomendasi motor --}}
		<section class="ratio_40 section-pb-space mt-5">
				<div class="custom-container product">
						<div class="row">
								<div class="col pr-0">
										<div class="theme-tab product">
												<div class="tab-content-cls">
														<!-- content tab 1 best diskon -->
														<div id="tab-1" class="tab-content active default">
																<div class="product-slide-5 product-m no-arrow">
																		{{-- for loop --}}
																		@foreach ($rekomendasi as $rek)
																				<div>
																						<div class="product-box">
																								<div class="product-imgbox img-rekomendasi-detail-mortor">
																										<div class="product-front">
																												<a href="product-page(left-sidebar).html">
																														<img src="{{ asset('assets') }}/images/detail-motor/{{ $rek->detailMotor[0]->gambar }}"
																																class="img-fluid" alt="{{ $rek->detailMotor[0]->gambar }}" />
																												</a>
																										</div>

																								</div>
																								<div class="product-detail product-detail2 rekomendasi-motor-detail-motor">
																										<a href="product-page(left-sidebar).html">
																												<h3>{{ $rek->nama }}</h3>
																										</a>

																										<div class="mt-2">
																												<div class="d-flex justify-content-between">
																														<p class="text-doff">Harga OTR : </p>
																														<p class="text-basic fw-bold">{{ Str::rupiah($rek->harga) }}</p>
																												</div>
																												<div class="d-flex justify-content-between">
																														<p class="text-doff">DP Minimal : </p>
																														<p class="text-basic">{{ Str::rupiah($rek->cicilanMotor[0]->min_dp) }}</p>
																												</div>
																										</div>
																										<form action="{{ route('detail-motor') }}" method="GET">
																												@csrf
																												<input type="hidden" name="id_lokasi" value="">
																												<input type="hidden" name="id_motor" value="{{ $rek->id }}">
																												<button type="submit" class="btn btn-sm btn-danger d-block w-100 py-2">Lihat
																														Detail</button>
																										</form>
																								</div>
																						</div>
																				</div>
																		@endforeach
																		{{-- for loop --}}
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		{{-- section end rekomendasi motor --}}
@endsection


@push('script')
		<script>
				// count down :
				simplyCountdown('#timer', {
						year: 2023, // required
						month: 10, // required
						day: 15, // required
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
		</script>
@endpush
