@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Motor</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">home</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">daftar-motor</a>
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
										<div class="col-sm-3 collection-filter category-page-side">
												<!-- side-bar colleps block stat -->
												<form action="/testingform" method="GET"
														class="collection-filter-block creative-card creative-inner category-side">
														@csrf
														<!-- brand filter start -->
														<div class="collection-mobile-back">
																<span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i>
																		back</span>
														</div>
														<div class="collection-collapse-block open">
																<h3 class="collapse-block-title mt-0">Merk Motor</h3>
																<div class="collection-collapse-block-content">
																		<div class="collection-brand-filter">
																				@foreach ($merks as $merk)
																						<div class="custom-control custom-checkbox form-check collection-filter-checkbox">
																								<input type="checkbox" name="merk[]" value="{{ $merk->id }}"
																										class="custom-control-input form-check-input" id="{{ $merk->name . $merk->id }}" />
																								<label class="custom-control-label form-check-label"
																										for="{{ $merk->name . $merk->id }}">{{ $merk->nama }}</label>
																						</div>
																				@endforeach

																		</div>
																</div>
														</div>
														<div class="collection-collapse-block open">
																<h3 class="collapse-block-title mt-3">Jenis Motor</h3>
																<div class="collection-collapse-block-content">
																		<div class="collection-brand-filter">
																				@foreach ($types as $type)
																						<div class="custom-control custom-checkbox form-check collection-filter-checkbox">
																								<input type="checkbox" name="type[]" value="{{ $type->id }}"
																										class="custom-control-input form-check-input" id="{{ $type->nama . $type->id }}" />
																								<label class="custom-control-label form-check-label"
																										for="{{ $type->nama . $type->id }}">{{ $type->nama }}</label>
																						</div>
																				@endforeach

																		</div>
																</div>
														</div>
														<div class="collection-collapse-block open">
																<h3 class="collapse-block-title">Filter harga</h3>
																<div class="collection-collapse-block-content">
																		<div class="filter-harga-wrapper mt-3">
																				<div class="input-group mb-3">
																						<span class="input-group-text" id="inputGroup-sizing-default">Min</span>
																						<input id="min" type="text" class="form-control" aria-label="Sizing example input"
																								onkeyup="formatRupiah(this)" aria-describedby="inputGroup-sizing-default"
																								placeholder="Contoh: 20.000.000" name="min_price">
																				</div>
																				<div class="input-group mb-3">
																						<span class="input-group-text" id="inputGroup-sizing-default">Max</span>
																						<input onkeyup="formatRupiah(this)" type="text" class="form-control"
																								aria-label="Sizing example input" placeholder="Contoh : 25.000.000"
																								aria-describedby="inputGroup-sizing-default" name="max_price">
																				</div>
																		</div>
																</div>
																<div class="mt-5">

																		<button type="submit" class="btn bg-basic btn-block fw-bold text-white">Terapkan</button>
																		<button class="btn btn-outline-dark btn-block fw-bold mt-2">Reset</button>
																</div>
														</div>
												</form>
												{{-- end form --}}
										</div>
										{{-- end col --}}
										<div class="collection-content col">
												<div class="page-main-content">
														<div class="row">
																<div class="col-sm-12">
																		<div class="top-banner-wrapper">
																				<a href="product-page(left-sidebar).html"><img
																								src="./assets/images/motor-terbaru-termurah/All Moto.webp" class="img-fluid" alt="" /></a>
																				<div class="top-banner-content small-section">
																						<h4>Honda One Heart</h4>
																						<p>
																								Kami mempersembahkan kombinasi teknologi pintar dan
																								fitur canggih yang memudahkan mulai dari sebelum Anda
																								berkendara hingga tiba ke tempat tujuan dengan penuh
																								senyuman. eSP teknologi mesin terbaru inovasi Honda
																								yang diterapkan secara global, melalui aplikasi
																								teknologi mutakhir dan ACG starter, dirancang sempurna
																								untuk menghasilkan performa tinggi dengan efisiensi
																								bahan bakar yang lebih baik dan ramah lingkungan.
																								Teknologi canggih yang membantu menyeimbangkan
																								pengereman roda belakang dan depan secara optimal,
																								memungkinkan kemudahan pengoperasian rem dengan
																								menarik tuas rem kiri, rem depan, rem belakang dapat
																								berfungsi dengan tepat.
																						</p>
																				</div>
																		</div>
																		<div class="collection-product-wrapper">
																				<div>
																						<div class="row">
																								<div class="col-xl-12">
																										<div class="filter-main-btn">
																												<span class="filter-btn"><i class="fa fa-filter" aria-hidden="true"></i>
																														Filter</span>
																										</div>
																								</div>
																						</div>
																						<div class="row">
																								<div class="col-12">
																										<ul class="text-lg-center text-start" style="font-size: medium">
																												<li class="text-doff">
																														<h4>Urutan :</h4>
																												</li>
																												<li>
																														<a class="text-dark" href="javascript:void(0)">Motor Terbaru |
																														</a>
																												</li>

																												<li>
																														<select id="sortHarga" class="form-select" style="width: fit-content"
																																aria-label="Default select example">
																																<option selected>Harga</option>
																																<option value="{{ url('/sort/rendah') }}">Harga: Rendah ke tinggi</option>
																																<option value="{{ url('/sort/tinggi') }}">Harga: Tinggi ke rendah</option>
																														</select>
																												</li>
																										</ul>
																								</div>
																						</div>
																				</div>
																				<div class="product-wrapper-grid product">
																						<div class="row">
																								@foreach ($data as $motor)
																										<div class="col-xl-3 col-md-4 col-6 col-grid-box">
																												<div class="product-box">
																														<div class="product-imgbox">
																																<div class="product-front">
																																		<img
																																				src="{{ asset('assets') }}/images/detail-motor/{{ $motor->detailMotor[0]->gambar }}"
																																				class="img-fluid" alt="{{ $motor->detailMotor[0]->gambar }}" />
																																</div>
																														</div>
																														<div class="product-detail product-detail2 text-start">
																																<a href="product-page(left-sidebar).html" tabindex="0">
																																		<h3>{{ $motor->nama }}</h3>
																																</a>
																																<h3>Harga Spesial</h3>
																																<h5>{{ Str::rupiah($motor->harga) }}</h5>
																														</div>
																												</div>
																										</div>
																								@endforeach
																								<div class="mb-5 mt-5">
																										{{ $data->links('user.layouts.partials.pagination') }}
																								</div>


																						</div>
																				</div>
																				{{-- <div class="load-more-sec">
																						<a href="javascript:void(0)" class="loadMore">load more</a>
																				</div> --}}
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

@push('script')
		<script>
				function formatRupiah(input) {
						var value = input.value.replace(/\D/g, '');
						input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
				}

				$(document).ready(function() {
						$('#sortHarga').change(function() {
								window.location.href = $(this).val();
						});
				});
		</script>
@endpush
