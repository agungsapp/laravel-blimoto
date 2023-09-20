@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main text-white" style="background-color: black">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2>Syarat Kredit</h2>
														<ul>
																<li><a href="javascript:void(0)">home</a></li>
																<li><i class="fa fa-angle-double-right"></i></li>
																<li><a href="javascript:void(0)">syarat-kredit</a></li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<!-- simulasi kredit start -->
		<section>
				<div class="custom-container">
						<div class="row d-flex justify-content-center">
								<div style="margin-top: -2rem" class="col-11 col-md-10 card rounded-3 px-3 py-3">
										<h3 class="mb-3 text-center">Simulasi Kredit</h3>

										<h4 class="text-black">Temukan kendaraan impianmu !</h4>
										<p class="mt-2">
												Kami telah membantu lebih dari 2000 orang untuk menemukan
												kendaraan yang sesuai dengan kebutuhan mereka dan impian mereka.
										</p>

										<form id="form-simulasi" action="" class="mt-2">
												<div class="row">
														<!-- kota -->
														<div class="col-12 col-md-3">
																<div class="form-group">
																		<label for="SelectKota" class="mb-0" style="font-size: 12px">Kota</label>
																		<select id="kotaSelect" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																				name="kota">
																				<option value="" style="width: 100%"></option>
																		</select>
																</div>
														</div>

														<!-- merk -->
														<div class="col-12 col-md-3">
																<div class="form-group">
																		<label for="SelectKota" class="mb-0" style="font-size: 12px">merk</label>
																		<select class="js-example-basic-single form-select form-select-sm" style="width: 100%" name="merk">
																				<option value="AL">Alabama</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																		</select>
																</div>
														</div>

														<!-- Tipe -->
														<div class="col-12 col-md-3">
																<div class="form-group">
																		<label for="SelectKota" class="mb-0" style="font-size: 12px">Tipe</label>
																		<select class="js-example-basic-single form-select form-select-sm" style="width: 100%" name="tipe">
																				<option value="AL">Alabama</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																		</select>
																</div>
														</div>

														<!-- pembayaran -->
														<div class="col-12 col-md-3">
																<div class="form-group">
																		<label for="SelectKota" class="mb-0" style="font-size: 12px">Pembayaran</label>
																		<select class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																				name="pembayaran">
																				<option value="AL">Alabama</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																		</select>
																</div>
														</div>
												</div>
												<!-- baris 2 -->
												<div class="row">
														<!-- tenor -->
														<div class="col-12 col-md-3">
																<div class="form-group">
																		<label for="SelectKota" class="mb-0" style="font-size: 12px">Tenor</label>
																		<select class="js-example-basic-single form-select form-select-sm" style="width: 100%" name="tenor">
																				<option value="AL">Alabama</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																				<option value="WY">Wyoming</option>
																		</select>
																</div>
														</div>

														<!-- <div class="col-md-6">
																				<label for="dp" class="form-label">DP</label>
																						<input type="range" min="100000" max="20000000" class="form-range" id="dp">
																						<output class="bubble"></output>
																		</div> -->

														<!-- <div class="col-md-6 range-wrap">
																						<label for="dp" class="form-label">DP</label>
																						<input type="range" min="100000" max="1000000" class="form-range range" oninput="bubble.value=value"/>
																						<output id="bubble" class="bubble">50</output>
																		</div> -->

														<div class="col-md-6 range-wrap">
																<label for="dp" class="form-label">DP</label>
																<input type="range" min="100000" max="1000000" class="form-range range" step="50000"
																		oninput="updateBubble(this)" />
																<output id="bubble" class="bubble">Rp 100,000</output>
														</div>

														<!-- <div class="double-slider-box">
																				<h3 class="range-title">DP / Angsuran</h3>
																		</div> -->
														<div class="col-6">
																<button class="btn btn-danger" type="submit">Submit</button>
																<button class="btn btn-success" type="submit">
																		Ajukan Sekarang
																</button>
														</div>
														<div class="col-6">
																<h3 class="text-hasil text-end">Rp. 1.000.000/Bln</h3>
														</div>
												</div>
										</form>
								</div>
						</div>
				</div>
		</section>
		<!-- simulasi kredit end -->

		<!-- syarat kredit start -->
		<section class="faq-section section-big-py-space b-g-light">
				<div class="title8">
						<h2>Persyaratan Kredit</h2>
				</div>
				<div class="container">
						<div class="row">
								<div class="col-12">
										<div class="accordion" id="accordionExample">
												<div class="accordion-item">
														<h2 class="accordion-header" id="headingone">
																<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
																		data-bs-target="#collapseone" aria-expanded="false">
																		Kredit Perorangan
																</button>
														</h2>
														<div id="collapseone" class="accordion-collapse collapse" aria-labelledby="headingone"
																data-bs-parent="#accordionExample">
																<div class="accordion-body">
																		<ul class="fs-6">
																				<li style="display: list-item">
																						Fotocopy KTP pemohon &amp; suami / istri / penjamin
																				</li>
																				<li style="display: list-item">
																						Fotocopy kartu keluarga (bisa digantikan dengan surat
																						nikah atau akte kelahiran)
																				</li>
																				<li style="display: list-item">
																						Data lain (hanya jika diperlukan)
																				</li>
																		</ul>
																</div>
														</div>
												</div>
												<div class="accordion-item">
														<h2 class="accordion-header" id="headingtwo">
																<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
																		data-bs-target="#collapsetwo" aria-expanded="false">
																		Kredit Perusahaan
																</button>
														</h2>
														<div id="collapsetwo" class="accordion-collapse collapse" aria-labelledby="headingtwo"
																data-bs-parent="#accordionExample">
																<div class="accordion-body">
																		<ul class="fs-6">
																				<li style="display: list-item">
																						Fotocopy akte pendirian &amp; perubahannya
																				</li>
																				<li style="display: list-item">
																						Fotocopy pengesahan kehakiman
																				</li>
																				<li style="display: list-item">
																						Fotocopy SIUP, NPWP, SITU / Domisili, TDP
																				</li>
																				<li style="display: list-item">
																						Fotocopy Rek. Koran 3 bulan terakhir
																				</li>
																				<li style="display: list-item">
																						Fotocopy KTP direksi &amp; komisaris
																				</li>
																		</ul>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>

		<!-- syarat kredit end -->

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
														<!-- content tab 1 best diskon -->
														<div id="tab-1" class="tab-content active default">
																<div class="product-slide-5 product-m no-arrow">
																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<img
																												src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/ahm-gaul-sideview-deluxe-black-7-01022023-085330.png"
																												class="img-fluid" alt="product" />
																								</div>
																								<button type="button" class="btn btn-outline btn-cart tooltip-top add-cartnoty"
																										data-tippy-content="pilih untuk simulasi">
																										pilih untuk simulasi
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
																								<button type="button" class="btn btn-outline btn-cart tooltip-top add-cartnoty"
																										data-tippy-content="pilih untuk simulasi">
																										pilih untuk simulasi
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
																								<button type="button" class="btn btn-outline btn-cart tooltip-top add-cartnoty"
																										data-tippy-content="pilih untuk simulasi">
																										pilih untuk simulasi
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
																								<button type="button" class="btn btn-outline btn-cart tooltip-top add-cartnoty"
																										data-tippy-content="pilih untuk simulasi">
																										pilih untuk simulasi
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
																								<button type="button" class="btn btn-outline btn-cart tooltip-top add-cartnoty"
																										data-tippy-content="pilih untuk simulasi">
																										pilih untuk simulasi
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
																		<!-- custom card produk box for loop end -->
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
