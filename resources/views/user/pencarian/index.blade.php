@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Pencarian</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">home</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">pencarian motor</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<!-- list motor terbaru start -->
		<section class="section-big-pt-space ratio_asos b-g-light">
				<div class="collection-wrapper">
						<div class="custom-container">
								<div class="row">
										<div class="collection-content col-12">
												<div class="page-main-content">
														<div class="row">
																<div class="col-sm-12">
																		<div class="top-banner-wrapper">
																				<a href="product-page(left-sidebar).html">
																						<img src="{{ asset('assets') }}/images/motor-terbaru-termurah/All Moto.webp" class="img-fluid"
																								alt="" />
																				</a>
																				<div class="top-banner-content small-section">
																						<h3 class="text-doff">
																								<i class="fa fa-search" aria-hidden="true"></i>
																								Menampilkan hasil pencarian untuk :
																								<strong class="text-capitalize text-basic">'{{ $keyword }}'
																								</strong>
																						</h3>
																				</div>
																				<div class="d-flex align-items-baseline gap-3">
																						<div>
																								<h4 class="text-doff">Urutkan :</h4>
																						</div>
																						<select class="form-select" style="width: 9rem" aria-label="Default select example">
																								<option selected>Harga</option>
																								<option value="1">Harga: Rendah ke tinggi</option>
																								<option value="2">Harga: Tinggi ke rendah</option>
																						</select>
																				</div>
																				<hr>
																		</div>
																		<div class="collection-product-wrapper">

																				{{-- before is filter place --}}

																				<div class="product-wrapper-grid product-load-more product">
																						<div class="row">
																								@foreach ($data as $d)
																										<div class="col-xl-3 col-md-4 col-6 col-grid-box">
																												<div class="product-box">
																														<div class="product-imgbox">
																																<div class="product-front">
																																		<img
																																				src="{{ asset('assets') }}/images/detail-motor/{{ $d->detailMotor[0]->gambar }}"
																																				class="img-fluid" alt="{{ $d->detailMotor[0]->gambar }}" />
																																</div>

																														</div>
																														<div class="product-detail product-detail2 text-start">

																																<h4 class="fw-bold text-doff fw-bold mt-2 text-center">{{ $d->nama }}</h4>

																																<h3>Harga Mulai</h3>
																																<h5>
																																		{{ Str::rupiah($d->harga) }}
																																</h5>
																																<form action="{{ route('detail-motor') }}" method="GET">
																																		@csrf
																																		<input type="hidden" name="id_lokasi" value="">
																																		<input type="hidden" name="id_motor" value="{{ $d->id }}">
																																		<button type="submit" class="btn btn-sm btn-danger d-block w-100 py-2">Lihat Promo
																																				Menarik</button>
																																</form>
																														</div>
																												</div>
																										</div>
																								@endforeach

																						</div>
																				</div>
																				@if ($data->count() >= 7)
																						<div class="load-more-sec">
																								<a href="javascript:void(0)" class="loadMore">load more</a>
																						</div>
																				@endif
																				@if ($data->count() == 0)
																						<div class="container-fluid d-flex flex-column">
																								<div class="mx-auto text-center">
																										<img width="300" class="d-block" src="{{ asset('assets') }}/images/gif/sorry.gif"
																												alt="sorry.gif">
																										<h4 class="text-center">
																												Yah Maaf banget pencarian motor <strong>"{{ $keyword }}"</strong> untuk lokasi kota
																												<strong>"{{ $lokasi[0]->nama }}"</strong> belum ada
																										</h4>
																								</div>
																						</div>
																				@endif
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- list motor terbaru end -->
@endsection
