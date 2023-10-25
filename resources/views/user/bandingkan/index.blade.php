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
								{{-- compare pertama --}}
								<div class="col-md-3 text-start">
										{{-- box result --}}
										<div id="hasil-pilihan1" class="card bg-light d-none pb-3 shadow" data-bss-hover-animate="pulse"
												style="background: rgb(234, 168, 168); border-radius: 10px">

										</div>
										{{-- box tigger modal open ! --}}
										<div id="select-motor1" class="card bg-light pb-3 shadow" data-bss-hover-animate="pulse"
												style="background: rgb(234, 168, 168); border-radius: 10px">
												<a data-bs-toggle="modal" data-bs-target="#modalCariMotor1">
														<div class="card-body m-3 text-center">
																<img src="https://image.pngaaa.com/73/4388073-middle.png" width="50" />
														</div>
												</a>
												<h6 style="text-align: center">Pilih Motor</h6>
										</div>
								</div>
								{{-- compare kedua  --}}
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
								{{-- compare ketiga  --}}
								<div class="col-md-3 select-motor1">
										{{-- select selanjutnya --}}
										<div id="hasil-pilihan2" class="card bg-light d-none pb-3 shadow" data-bss-hover-animate="pulse"
												style="background: rgb(234, 168, 168); border-radius: 10px">

										</div>
										{{-- box tigger modal open ! --}}
										<div id="select-motor2" class="card bg-light pb-3 shadow" data-bss-hover-animate="pulse"
												style="background: rgb(234, 168, 168); border-radius: 10px">
												<a data-bs-toggle="modal" data-bs-target="#modalCariMotor3">
														<div class="card-body m-3 text-center">
																<img src="https://image.pngaaa.com/73/4388073-middle.png" width="50" />
														</div>
												</a>
												<h6 style="text-align: center">Pilih Motor</h6>
										</div>
								</div>
								{{-- compare keempat  --}}
								<div class="col-md-3 select-motor1">
										{{-- select selanjutnya --}}
										<div id="hasil-pilihan2" class="card bg-light d-none pb-3 shadow" data-bss-hover-animate="pulse"
												style="background: rgb(234, 168, 168); border-radius: 10px">

										</div>
										{{-- box tigger modal open ! --}}
										<div id="select-motor2" class="card bg-light pb-3 shadow" data-bss-hover-animate="pulse"
												style="background: rgb(234, 168, 168); border-radius: 10px">
												<a data-bs-toggle="modal" data-bs-target="#modalCariMotor4">
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

		{{-- modal cari motor pertama start  ======================================================================== --}}
		<!-- Modal -->
		<div class="modal fade" id="modalCariMotor1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="myModalLabel">Compare motor pertama</h5>
										<button id="btn-close-modal1" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
										<form id="cariMotor">
												<div class="row">
														<div class="form-group col-6">
																<label for="merk1" class="mb-0" style="font-size: 12px">Merk</label>
																<select id="merk1" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="merk">
																		<option value="" selected>-- Pilih Merk --</option>
																</select>
														</div>
														<div class="form-group col-6">
																<label for="tipe1" class="mb-0" style="font-size: 12px">Tipe</label>
																<select id="tipe1" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="tipe">
																		<option value="" selected>-- Pilih Tipe --</option>
																</select>
														</div>
												</div>
												<div class="form-group">
														<label for="model1" class="mb-0" style="font-size: 12px">Nama Motor</label>
														<select id="model1" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
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


		{{-- modal cari motor kedua start  ======================================================================== --}}
		<div class="modal fade" id="modalCariMotor2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="myModalLabel">Compare motor kedua</h5>
										<button id="btn-close-modal2" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
										<form id="cariMotor">
												<div class="row">
														<div class="form-group col-6">
																<label for="merk2" class="mb-0" style="font-size: 12px">Merk</label>
																<select id="merk2" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="merk">
																		<option value="" selected>-- Pilih Merk --</option>
																</select>
														</div>
														<div class="form-group col-6">
																<label for="tipe2" class="mb-0" style="font-size: 12px">Tipe</label>
																<select id="tipe2" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="tipe">
																		<option value="" selected>-- Pilih Tipe --</option>
																</select>
														</div>
												</div>
												<div class="form-group">
														<label for="model2" class="mb-0" style="font-size: 12px">Nama Motor</label>
														<select id="model2" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
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

		{{-- modal cari motor kedua start  ======================================================================== --}}
		<div class="modal fade" id="modalCariMotor3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="myModalLabel">Compare motor ketiga</h5>
										<button id="btn-close-modal3" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
										<form id="cariMotor">
												<div class="row">
														<div class="form-group col-6">
																<label for="merk3" class="mb-0" style="font-size: 12px">Merk</label>
																<select id="merk3" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="merk">
																		<option value="" selected>-- Pilih Merk --</option>
																</select>
														</div>
														<div class="form-group col-6">
																<label for="tipe3" class="mb-0" style="font-size: 12px">Tipe</label>
																<select id="tipe3" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="tipe">
																		<option value="" selected>-- Pilih Tipe --</option>
																</select>
														</div>
												</div>
												<div class="form-group">
														<label for="model3" class="mb-0" style="font-size: 12px">Nama Motor</label>
														<select id="model3" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																name="model3">
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

		{{-- modal cari motor kedua start  ======================================================================== --}}
		<div class="modal fade" id="modalCariMotor4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="myModalLabel">Compare motor ke empat</h5>
										<button id="btn-close-modal4" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
										<form id="cariMotor">
												<div class="row">
														<div class="form-group col-6">
																<label for="merk4" class="mb-0" style="font-size: 12px">Merk</label>
																<select id="merk4" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="merk">
																		<option value="" selected>-- Pilih Merk --</option>
																</select>
														</div>
														<div class="form-group col-6">
																<label for="tipe4" class="mb-0" style="font-size: 12px">Tipe</label>
																<select id="tipe4" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																		name="tipe">
																		<option value="" selected>-- Pilih Tipe --</option>
																</select>
														</div>
												</div>
												<div class="form-group">
														<label for="model4" class="mb-0" style="font-size: 12px">Nama Motor</label>
														<select id="model4" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
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
