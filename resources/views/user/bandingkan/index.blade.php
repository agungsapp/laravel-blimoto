@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white"></h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)"></a>
																</li>
																<li>
																		<!-- <i class="fa fa-angle-double-right text-white"></i> -->
																</li>
																<li>
																		<a class="text-white" href="javascript:void(0)"></a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<!-- hero motor start -->
		<section>
				<div class="custom-container">
						<div class="row d-flex justify-content-center">
								<div style="margin-top: -3rem" class="col-11 col-md-10 card rounded-3 px-3 py-3">
										<h3 class="mb-3 text-center">Bandingkan Motor</h3>

										<h4 class="text-black">Temukan kendaraan impianmu !</h4>
										<h4 class="fw-normal mt-2">
												Apakah Anda berencana membeli sepeda motor baru pada tahun 2023?
												BliMoto bisa membantu Anda dengan menyediakan rangkaian lengkap motor
												baru yang tersedia di Indonesia dengan daftar harga terbaru 2023.
												Melalui berbagai filter, Anda bisa dengan mudah mengurutkan model
												berdasarkan budget, tipe bahan bakar, tipe transmisi, tipe bodi
												(seperti cafe racer, cruiser, sport, scooter, off-road, super
												sport, maxi scooter, touring, street, dan moped), dan kategori
												(termasuk big bikes, naked, dan commuter).
										</h4>
								</div>
						</div>
				</div>
		</section>
		<!-- hero motor end -->

		<!-- input bandingkan start -->
		<section class="my-5">
				<div class="container">
						<div class="row d-flex justify-content-around align-items-center">
								<div class="col-md-3 text-start">
										{{-- box result --}}
										<div id="hasil-pilihan1" class="card bg-light d-none pb-3 shadow" data-bss-hover-animate="pulse"
												style="background: rgb(234, 168, 168); border-radius: 10px">

										</div>
										{{-- box tigger modal open ! --}}
										<div id="select-motor1" class="card bg-light pb-3 shadow" data-bss-hover-animate="pulse"
												style="background: rgb(234, 168, 168); border-radius: 10px">
												<a data-bs-toggle="modal" data-bs-target="#modalCariMotor">
														<div class="card-body m-3 text-center">
																<img src="https://image.pngaaa.com/73/4388073-middle.png" width="50" />
														</div>
												</a>
												<h6 style="text-align: center">Pilih Motor</h6>
										</div>
								</div>
								<div class="col-md-3 select-motor1">
										{{-- select selanjutnya --}}
										<div id="hasil-pilihan2" class="card bg-light d-none pb-3 shadow" data-bss-hover-animate="pulse"
												style="background: rgb(234, 168, 168); border-radius: 10px">

										</div>
										{{-- box tigger modal open ! --}}
										<div id="select-motor2" class="card bg-light pb-3 shadow" data-bss-hover-animate="pulse"
												style="background: rgb(234, 168, 168); border-radius: 10px">
												<a data-bs-toggle="modal" data-bs-target="#modalCariMotor2">
														<div class="card-body m-3 text-center">
																<img src="https://image.pngaaa.com/73/4388073-middle.png" width="50" />
														</div>
												</a>
												<h6 style="text-align: center">Pilih Motor</h6>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- input bandingkan end -->

		{{-- modalku bawaan --}}

		{{-- modal cari motor start  ======================================================================== --}}
		<!-- Modal -->
		<div class="modal fade" id="modalCariMotor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="myModalLabel">Cari Motor</h5>
										<button id="btn-close-modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
										<form id="cariMotor">
												<div class="row">
														<div class="form-group col-6">
																<label for="merk" class="mb-0" style="font-size: 12px">Merk</label>
																<select id="merk" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="merk">
																		<option value="" selected>-- Pilih Merk --</option>
																</select>
														</div>
														<div class="form-group col-6">
																<label for="tipe" class="mb-0" style="font-size: 12px">Tipe</label>
																<select id="tipe" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="tipe">
																		<option value="" selected>-- Pilih Tipe --</option>
																</select>
														</div>
												</div>
												<div class="form-group">
														<label for="SelectKota" class="mb-0" style="font-size: 12px">Nama Motor</label>
														<select id="model" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																name="model">
																<option value="" selected>-- Pilih Model --</option>
														</select>
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
										</form>
								</div>
						</div>
				</div>
		</div>
		{{-- modal cari motor end ============================================================================ --}}


		{{-- modal cari motor start  ======================================================================== --}}
		<!-- Modal -->
		<div class="modal fade" id="modalCariMotor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="myModalLabel">Cari Motor</h5>
										<button id="btn-close-modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
										<form id="cariMotor">
												<div class="row">
														<div class="form-group col-6">
																<label for="merk" class="mb-0" style="font-size: 12px">Merk</label>
																<select id="merk" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="merk">
																		<option value="" selected>-- Pilih Merk --</option>
																</select>
														</div>
														<div class="form-group col-6">
																<label for="tipe" class="mb-0" style="font-size: 12px">Tipe</label>
																<select id="tipe" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="tipe">
																		<option value="" selected>-- Pilih Tipe --</option>
																</select>
														</div>
												</div>
												<div class="form-group">
														<label for="SelectKota" class="mb-0" style="font-size: 12px">Nama Motor</label>
														<select id="model" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																name="model">
																<option value="" selected>-- Pilih Model --</option>
														</select>
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
										</form>
								</div>
						</div>
				</div>
		</div>
		{{-- modal cari motor end ============================================================================ --}}


		<!-- bandingkan start -->
		<div class="container" data-select2-id="4">

				<div class="row">
						<div class="col-lg-5">
								<div class="mt-2">
										<div class="title text-lg-right">
												<h2 class="font-weight-bold mb-1 mt-3">Motor 1</h2>
												<div data-item="rating" class="motor-1 rating large"></div>
										</div>
								</div>
						</div>
						<div class="col-lg-2"></div>
						<div class="col-lg-5">
								<div class="mt-2">
										<div class="title text-left">
												<h2 class="font-weight-bold mb-1 mt-3">Motor 2</h2>
												<div data-item="rating" class="motor-2 rating large"></div>
										</div>
								</div>
						</div>
				</div>
				<div class="row">
						<div class="col-lg-5 text-lg-right">
								<table class="table-borderless table border-0">
										<tbody>
												<tr>
														<td>
																<h5>Transmisi</h5>
																<h6>-</h6>
														</td>
														<td>
																<h5>Kapasitas Mesin</h5>
																<h6>-</h6>
														</td>
												</tr>
												<tr>
														<td>
																<h5>Pembakaran</h5>
																<h6>-</h6>
														</td>
														<td>
																<h5>Tenaga</h5>
																<h6>-</h6>
														</td>
												</tr>
												<tr>
														<td>
																<h5>Variant</h5>
																<h6>-</h6>
														</td>
														<td>
																<h5>Leasing</h5>
																<h6>-</h6>
														</td>
												</tr>
										</tbody>
								</table>
								<a data-item="name_slug" href="#" class="motor-1 btn btn-primary mt-4">LIHAT DETAIL</a>
						</div>
						<div class="col-lg-2"></div>
						<div class="col-lg-5 text-lg-right">
								<table class="table-borderless table border-0">
										<tbody>
												<tr>
														<td>
																<h5>Transmisi</h5>
																<h6>-</h6>
														</td>
														<td>
																<h5>Kapasitas Mesin</h5>
																<h6>-</h6>
														</td>
												</tr>
												<tr>
														<td>
																<h5>Pembakaran</h5>
																<h6>-</h6>
														</td>
														<td>
																<h5>Tenaga</h5>
																<h6>-</h6>
														</td>
												</tr>
												<tr>
														<td>
																<h5>Variant</h5>
																<h6>-</h6>
														</td>
														<td>
																<h5>Leasing</h5>
																<h6>-</h6>
														</td>
												</tr>
										</tbody>
								</table>
								<a data-item="name_slug" href="#" class="motor-1 btn btn-primary mt-4">LIHAT DETAIL</a>
						</div>
				</div>

		</div>
		</section> -->
		<!-- bandingkan end -->

		<!-- bandingkan 2 start -->
		<section class="compare-padding section-big-py-space b-g-light">
				<div class="custom-container">
						<div class="row d-flex justify-content-center">
								<div class="col-11 col-md-10 px-3 py-3">
										<div class="compare-page">
												<div class="table-wrapper table-responsive">
														<table class="table">
																<tbody id="table-compare">
																		<tr>
																				<th class="product-name">Nama Motor</th>
																				<td class="grid-link__title">New Beat Sporty CBS</td>
																				<td class="grid-link__title">New Beat Sporty CBS</td>
																		</tr>
																		<tr>
																				<th class="product-name">Gambar Motor</th>
																				<td class="item-row">
																						<img src="https://motoloka.com/assets/uploads/NEW_BEAT_SPORTY_CBS.png" alt="product"
																								class="featured-image" />
																						<form class="variants clearfix">
																								<input type="hidden" />
																								<button title="Add to Cart" class="add-to-cart btn btn-success">
																										Ajukan Sekarang
																								</button>
																						</form>
																				</td>
																				<td class="item-row">
																						<img src="https://motoloka.com/assets/uploads/NEW_BEAT_SPORTY_CBS.png" alt="product"
																								class="featured-image" />
																						<form class="variants clearfix">
																								<input type="hidden" />
																								<button title="Add to Cart" class="add-to-cart btn btn-success">
																										Ajukan Sekarang
																								</button>
																						</form>
																				</td>
																		</tr>
																		<tr>
																				<th class="product-name">DP</th>
																				<td class="item-row">
																						<div class="product-price product_price">
																								<strong>Rp. 1.250.000</strong>
																						</div>
																				</td>
																				<td class="item-row">
																						<div class="product-price product_price">
																								<strong>Rp. 1.250.000</strong>
																						</div>
																				</td>
																		</tr>
																		<tr>
																				<th class="product-name">Diskon</th>
																				<td class="item-row">
																						<div class="product-price product_price">
																								<strong>Rp. 250.000</strong>
																						</div>
																				</td>
																				<td class="item-row">
																						<div class="product-price product_price">
																								<strong>Rp. 250.000</strong>
																						</div>
																				</td>
																		</tr>
																		<tr>
																				<th class="product-name">Angsuran</th>
																				<td class="item-row">
																						<div class="product-price product_price">
																								<strong>Rp. 750.000</strong>
																						</div>
																				</td>
																				<td class="item-row">
																						<div class="product-price product_price">
																								<strong>Rp. 750.000</strong>
																						</div>
																				</td>
																		</tr>
																		<tr>
																				<th class="product-name">Deskripsi Motor</th>
																				<td class="item-row">
																						<p class="description-compare">
																								Honda Beat CBS 2023 akan dilengkapi dengan jok tempat
																								duduk setinggi 740 mm dan berbobot 89 kg. Motor matic
																								ini hadir dengan rem depan cakram dan rem belakang
																								tromol, sehingga sistem pengeremannya akan lebih kuat
																								dan responsif. Sedangkan untuk performanya sendiri,
																								dikabarkan akan lebih lincah dan gesit dibandingkan
																								Honda Beat CBS 2022.
																						</p>
																				</td>
																				<td class="item-row">
																						<p class="description-compare">
																								Honda Beat CBS 2023 akan dilengkapi dengan jok tempat
																								duduk setinggi 740 mm dan berbobot 89 kg. Motor matic
																								ini hadir dengan rem depan cakram dan rem belakang
																								tromol, sehingga sistem pengeremannya akan lebih kuat
																								dan responsif. Sedangkan untuk performanya sendiri,
																								dikabarkan akan lebih lincah dan gesit dibandingkan
																								Honda Beat CBS 2022.
																						</p>
																				</td>
																		</tr>
																		<tr>
																				<th class="product-name">Fitur Utama</th>
																				<td class="availabel-stock">
																						<p>
																								New BeAT Sporty CBS ; Volume Langkah, 109.5cc ; Sistem
																								Suplai Bahan Bakar, Injeksi (PGM-FI) ; Diameter X
																								Langkah, 47.0 x 63.1 mm ; Tipe Tranmisi, Otomatis,
																								V-Matic.
																						</p>
																				</td>
																				<td class="availabel-stock">
																						<p>
																								New BeAT Sporty CBS ; Volume Langkah, 109.5cc ; Sistem
																								Suplai Bahan Bakar, Injeksi (PGM-FI) ; Diameter X
																								Langkah, 47.0 x 63.1 mm ; Tipe Tranmisi, Otomatis,
																								V-Matic.
																						</p>
																				</td>
																		</tr>
																</tbody>
														</table>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- bandingkan 2 end -->

		<!-- media tab start -->
		<section class="section-pb-space mt-4">
				<div class="title8">
						<h2>Motor Rekomendasi</h2>
				</div>
				<div class="custom-container product">
						<div class="row">
								<div class="col pr-0">
										<div class="theme-tab product">
												<div class="tab-content-cls">
														<div id="tab-1" class="tab-content active default">
																<div class="product-slide-5 product-m no-arrow">
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<img
																												src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/ahm-gaul-sideview-deluxe-black-7-01022023-085330.png"
																												class="img-fluid" alt="product" />
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Detail Motor
																								</button>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>BeAT</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 23,050,000
																										<span>Rp. 18,050,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<img
																												src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/ahm-gaul-sideview-deluxe-black-7-01022023-085330.png"
																												class="img-fluid" alt="product" />
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Detail Motor
																								</button>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>BeAT</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 23,050,000
																										<span>Rp. 18,050,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<img
																												src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/ahm-gaul-sideview-deluxe-black-7-01022023-085330.png"
																												class="img-fluid" alt="product" />
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Detail Motor
																								</button>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>BeAT</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 23,050,000
																										<span>Rp. 18,050,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<img
																												src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/ahm-gaul-sideview-deluxe-black-7-01022023-085330.png"
																												class="img-fluid" alt="product" />
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Detail Motor
																								</button>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>BeAT</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 23,050,000
																										<span>Rp. 18,050,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<img
																												src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/ahm-gaul-sideview-deluxe-black-7-01022023-085330.png"
																												class="img-fluid" alt="product" />
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Detail Motor
																								</button>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>BeAT</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 23,050,000
																										<span>Rp. 18,050,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- media tab end -->
@endsection


@push('script')
		<script type="module" src="{{ asset('/assets/js/custom/bandingkan.js') }}"></script>
@endpush
