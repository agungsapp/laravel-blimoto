@extends('user.layouts.main')
@section('content')
		<!-- new hook slider start -->
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
						<div class="carousel-item active" data-bs-interval="2500">
								<img src="assets/images/custom/hook-img1.webp" class="d-block w-100" alt="..." />
								<div class="carousel-caption d-none d-md-block">
										<a href="#" class="btn bg-basic rounded-pill fs-sm-4 fs-md-4 fs-lg-4 px-5 text-white">Lihat Promo</a>
								</div>
						</div>
						<div class="carousel-item" data-bs-interval="2500">
								<img src="assets/images/custom/hook-img2.webp" class="d-block w-100" alt="..." />
								<div class="carousel-caption d-none d-md-block">
										<a href="#" class="btn btn-white text-dark rounded-pill fs-sm-4 fs-md-4 fs-lg-4 px-5">Selengkapnya</a>
								</div>
						</div>
						<div class="carousel-item" data-bs-interval="2500">
								<img src="assets/images/custom/hook-img3.webp" class="d-block w-100" alt="..." />
								<div class="carousel-caption d-none d-md-block">
										<a href="#" class="btn bg-doff rounded-pill fs-sm-4 fs-md-4 fs-lg-4 px-5 text-white">Beli Sekarang</a>
								</div>
						</div>
				</div>
		</div>
		<!-- new hook slider end -->

		<!-- simulasi kredit start -->
		<section>
				<div class="custom-container simulasi-container">
						<div class="row d-flex justify-content-center simulasi-wrapper">
								<div class="col-11 col-md-10 card rounded-3 px-3 py-3">
										<h3 class="title8 mb-3 text-center">Simulasi Kredit</h3>

										<h4 class="text-black">Temukan kendaraan impianmu !</h4>
										<p class="mt-2">
												Kami telah membantu lebih dari 2000 orang untuk menemukan
												kendaraan yang sesuai dengan kebutuhan mereka dan impian mereka.
										</p>

										<form id="form-simulasi" action="" class="mt-2">
												<div class="row">
														<!-- kota -->
														<div class="col-6 col-md-3">
																<div class="form-group">
																		<label for="SelectKota" class="mb-0" style="font-size: 12px">Kota</label>
																		<select id="SelectKota" class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																				name="merk">
																				<option value="0" selected>-- Pilih Kota --</option>
																				<option value="JA">Jakarta</option>
																				<option value="BO">Bogor</option>
																				<option value="DE">Depok</option>
																				<option value="TA">Tanggerang</option>
																				<option value="BE">Bekasi</option>
																		</select>
																</div>
														</div>

														<!-- merk -->
														<div class="col-6 col-md-3">
																<div class="form-group">
																		<label for="SelectKota" class="mb-0" style="font-size: 12px">merk</label>
																		<select class="js-example-basic-single form-select form-select-sm" style="width: 100%" name="merk">
																				<option value="0" selected>-- Merk --</option>
																				<option value="HO">Honda</option>
																				<option value="KA">Kawasaki</option>
																				<option value="YA">Yamaha</option>
																				<option value="SU">Suzuki</option>
																		</select>
																</div>
														</div>

														<!-- Tipe -->
														<div class="col-6 col-md-3">
																<div class="form-group">
																		<label for="SelectKota" class="mb-0" style="font-size: 12px">Tipe</label>
																		<select class="js-example-basic-single form-select form-select-sm" style="width: 100%" name="tipe">
																				<option value="0" selected>-- Pilih Tipe --</option>
																				<option value="MA">Matic</option>
																				<option value="BE">Bebek/Cub</option>
																				<option value="SP">Sport</option>
																				<option value="BI">Big Bike</option>
																		</select>
																</div>
														</div>

														<!-- pembayaran -->
														<div class="col-6 col-md-3">
																<div class="form-group">
																		<label for="SelectKota" class="mb-0" style="font-size: 12px">Pembayaran</label>
																		<select class="js-example-basic-single form-select form-select-sm" style="width: 100%"
																				name="pembayaran">
																				<option value="0" selected>-- Pilih Pembayaran --</option>
																				<option value="CA">Cash</option>
																				<option value="CE">Kredit</option>
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
																				<option value="0" selected>-- Pilih Tenor --</option>
																				<option value="12">12 Bulan</option>
																				<option value="18">18 Bulan</option>
																				<option value="24">24 Bulan</option>
																				<option value="30">30 Bulan</option>
																				<option value="36">36 Bulan</option>
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
																<input type="range" min="100000" max="20000000" class="form-range range" step="50000"
																		value="50000" oninput="updateBubble(this)" />
																<output id="bubble" class="bubble">Rp 100,000</output>
														</div>

														<!-- <div class="double-slider-box">
																																<h3 class="range-title">DP / Angsuran</h3>
																														</div> -->
														<div class="d-flex align-items-center mt-5">
																<div class="col-8 d-flex">
																		<button class="btn bg-basic btn-submit text-white" type="submit">
																				Submit
																		</button>
																		<a class="btn btn-dark btn-ajukan ms-2 text-white" href="#"><i class="fa fa-whatsapp"
																						aria-hidden="true"></i> Ajukan
																				Sekarang</a>
																</div>

																<div class="col-4">
																		<h5 class="text-hasil text-view text-end">
																				Rp. 1.000.000/Bln
																		</h5>
																</div>
														</div>
												</div>
										</form>
								</div>
						</div>
				</div>
		</section>
		<!-- simulasi kredit end -->

		<!--temukan kendaraanmu start-->
		<section class="section-py-space mt-3">
				<div class="tab-product-main">
						<div class="tab-prodcut-contain">
								<ul class="tabs tab-title">
										<li class="current"><a href="tab-1">DISKON TERBAIK</a></li>
										<li class=""><a href="tab-2">DP TERMURAH</a></li>
										<li class=""><a href="tab-3">HARGA TERBAWAH</a></li>
										<li class=""><a href="tab-4">ANGSURAN RINGAN</a></li>
										<!-- <li class=""><a href="tab-5">toys</a></li>
																										<li class=""><a href="tab-6">books</a></li> -->
								</ul>
						</div>
				</div>
		</section>

		<!-- media tab start -->
		<section class="ratio_40 section-pb-space">
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
																										<a href="product-page(left-sidebar).html">
																												<img src="assets/images/custom/diskon-terbaik/1.webp" class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Diskon</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>BeAT ss</h3>
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

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img src="assets/images/custom/diskon-terbaik/2.webp" class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Diskon</div>
																								</div>
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

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img src="assets/images/custom/diskon-terbaik/3.webp" class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Diskon</div>
																								</div>
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

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img src="assets/images/custom/diskon-terbaik/4.webp" class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Diskon</div>
																								</div>
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

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img src="assets/images/custom/diskon-terbaik/5.webp" class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Diskon</div>
																								</div>
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

																		<!-- custom card produk box for loop end -->
																</div>
														</div>
														<!-- content tab 2 best dp -->
														<div id="tab-2" class="tab-content">
																<div class="product-slide-5 product-m no-arrow">
																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thumbnail-motor-new-crf150l-1-25102021-084848.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best DP</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>CRF150L</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 35,930,000
																										<span>Rp. 39,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thumbnail-motor-new-crf150l-1-25102021-084848.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best DP</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>CRF150L</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 35,930,000
																										<span>Rp. 39,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thumbnail-motor-new-crf150l-1-25102021-084848.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best DP</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>CRF150L</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 35,930,000
																										<span>Rp. 39,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thumbnail-motor-new-crf150l-1-25102021-084848.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best DP</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>CRF150L</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 35,930,000
																										<span>Rp. 39,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thumbnail-motor-new-crf150l-1-25102021-084848.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best DP</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>CRF150L</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 35,930,000
																										<span>Rp. 39,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->
																</div>
														</div>

														<!-- content tab 2 best dp -->
														<div id="tab-3" class="tab-content">
																<div class="product-slide-5 product-m no-arrow">
																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thmbnail-product-2-24012022-110536.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Termurah</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>Revo</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 16,020,000
																										<span>Rp. 19,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thmbnail-product-2-24012022-110536.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Termurah</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>Revo</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 16,020,000
																										<span>Rp. 19,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thmbnail-product-2-24012022-110536.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Termurah</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>Revo</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 16,020,000
																										<span>Rp. 19,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thmbnail-product-2-24012022-110536.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Termurah</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>Revo</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 16,020,000
																										<span>Rp. 19,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thmbnail-product-2-24012022-110536.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Termurah</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>Revo</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 16,020,000
																										<span>Rp. 19,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->
																</div>
														</div>

														<!-- content tab 4 best dp -->
														<div id="tab-4" class="tab-content">
																<div class="product-slide-5 product-m no-arrow">
																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thmbnail-product-2-24012022-110536.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Termurah</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>Revo</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 16,020,000
																										<span>Rp. 19,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>

																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thmbnail-product-2-24012022-110536.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Termurah</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>Revo</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 16,020,000
																										<span>Rp. 19,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thmbnail-product-2-24012022-110536.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Termurah</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>Revo</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 16,020,000
																										<span>Rp. 19,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thmbnail-product-2-24012022-110536.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Termurah</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>Revo</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 16,020,000
																										<span>Rp. 19,000,000</span>
																								</h5>
																						</div>
																				</div>
																		</div>
																		<!-- custom card produk box for loop end -->

																		<!-- custom card produk box for loop -->
																		<div>
																				<div class="product-box">
																						<div class="product-imgbox">
																								<div class="product-front">
																										<a href="product-page(left-sidebar).html">
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:w-550,f-auto/uploads/product/thumbnail/thmbnail-product-2-24012022-110536.png"
																														class="img-fluid" alt="product" />
																										</a>
																								</div>
																								<button type="button" class="btn btn-outline btn-cart">
																										Lihat Promo
																								</button>
																								<div class="best-label">
																										<div>Best Termurah</div>
																								</div>
																						</div>
																						<div class="product-detail product-detail2">
																								<a href="product-page(left-sidebar).html">
																										<h3>Revo</h3>
																								</a>
																								<h3>Harga Mulai</h3>
																								<h5>
																										Rp. 16,020,000
																										<span>Rp. 19,000,000</span>
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

		<!--temukan kendaraanmu end-->

		<!-- best motor -->
		<div class="list-product">
				<div class="tab-content">
						<div class="tab-pane fade"></div>
				</div>
		</div>
		<!-- best motor end -->

		<!--kenapa harus blimoto start-->
		<section class="collection-banner section-py-space b-g-white">
				<div class="container-fluid">
						<div class="row collection-p4">
								<div class="col-md-4">
										<div class="collection-banner-main p-center p-top banner-16 banner-style7 text-center">
												<div class="collection-img">
														<img src="assets/images/custom/why.png" class="img-fluid bg-img" alt="banner" />
												</div>
												<div class="collection-banner-contain">
														<div>
																<h1 id="why" class="text-doff">Kenapa Harus BliMoto ?</h1>
														</div>
												</div>
										</div>
								</div>
								<div class="col-md-4">
										<div class="row">
												<div class="col-12">
														<div class="collection-banner-main p-left banner-13 banner-style7 text-center">
																<div class="collection-img">
																		<img src="assets/images/testimonial/1.jpg" class="img-fluid bg-img" alt="banner" />
																</div>
																<div class="collection-banner-contain">
																		<div>
																				<h3>Testimoni</h3>
																				<!-- <h4>Video Founder BliMoto.com</h4> -->
																				<a class="btn btn-rounded btn-xs px-5" data-bs-toggle="modal" data-bs-target="#v-founder">
																						Play
																				</a>
																		</div>
																</div>
														</div>
												</div>
												<div class="col-12">
														<div class="collection-banner-main p-left banner-13 banner-style7 text-center">
																<div class="collection-img">
																		<img src="assets/images/testimonial/2.jpg" class="img-fluid bg-img" alt="banner" />
																</div>
																<div class="collection-banner-contain">
																		<div>
																				<h3>Leasing</h3>
																				<!-- <h4>Video Founder BliMoto.com</h4> -->
																				<a class="btn btn-rounded btn-xs px-5" data-bs-toggle="modal" data-bs-target="#v-testimoni">
																						Play
																				</a>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
								<div class="col-md-4">
										<div class="collection-banner-main p-center p-top banner-16 banner-style7 text-center">
												<div class="collection-img">
														<img src="assets/images/testimonial/3.jpg" class="img-fluid bg-img" alt="banner" />
												</div>
												<div class="collection-banner-contain">
														<div>
																<h3>Founder</h3>
																<!-- <h4>Video Founder BliMoto.com</h4> -->
																<a class="btn btn-rounded btn-xs px-5" data-bs-toggle="modal" data-bs-target="#v-leasing">
																		Play
																</a>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!--kenapa harus blimoto end-->

		<!--motor terbaru start-->
		<section class="hot-deal hotdeal-first b-g-white section-big-pb-space space-abjust">
				<div class="custom-container">
						<div class="row hot-2">
								<div class="col-12">
										<!--title start-->
										<div class="title8 b-g-white mt-5 text-left">
												<h4>Motor Terbaru Dengan Harga Terbaik</h4>
										</div>
										<!--titel end-->
								</div>
								<div class="col-lg-9">
										<div class="slide-1 no-arrow">
												<div>
														<div class="hot-deal-contain">
																<div class="row hot-deal-subcontain hotdeal-block1">
																		<div class="col-lg-4 col-md-4">
																				<div class="hotdeal-right-slick border-0">
																						<a href="product-page(left-sidebar).html">
																								<div class="img-wrraper">
																										<div>
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-red-matte-cbs-515x504-tr-3-02082023-091019.png"
																														alt="hot-deal" class="img-fluid bg-img" />
																										</div>
																								</div>
																						</a>
																						<a href="product-page(left-sidebar).html">
																								<div class="img-wrraper">
																										<div>
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-white-matte-abs-515x504-tr-4-02082023-090911.png"
																														alt="hot-deal" class="img-fluid bg-img" />
																										</div>
																								</div>
																						</a>
																						<a href="product-page(left-sidebar).html">
																								<div class="img-wrraper">
																										<div>
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-black-matte-abs-515x504-tr-3-02082023-090925.png"
																														alt="hot-deal" class="img-fluid bg-img" />
																										</div>
																								</div>
																						</a>
																						<a href="product-page(left-sidebar).html">
																								<div class="img-wrraper">
																										<div>
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-white-matte-cbs-sp-515x504-tr-3-02082023-090932.png"
																														alt="hot-deal" class="img-fluid bg-img" />
																										</div>
																								</div>
																						</a>
																						<a href="product-page(left-sidebar).html">
																								<div class="img-wrraper">
																										<div>
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-black-matte-cbs-sp-515x504-tr-6-02082023-094319.png"
																														alt="hot-deal" class="img-fluid bg-img" />
																										</div>
																								</div>
																						</a>
																						<a href="product-page(left-sidebar).html">
																								<div class="img-wrraper">
																										<div>
																												<img
																														src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-black-matte-cbs-515x504-tr-6-02082023-091008.png"
																														alt="hot-deal" class="img-fluid bg-img" />
																										</div>
																								</div>
																						</a>
																				</div>
																		</div>
																		<div class="col-lg-6 col-md-6 deal-order-3">
																				<div class="hotdeal-right-slick border-0">
																						<div>
																								<div>
																										<a href="product-page(left-sidebar).html">
																												<h5>Vario 160</h5>
																										</a>
																										<ul class="rating">
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star-o"></i></li>
																										</ul>
																										<p>ACTIVE MATTE RED | CBS TYPE</p>
																										<h6>Rp. 26,639,000<span>Rp. 28,639,000</span></h6>
																										<div class="timer">
																												<p id="demo"></p>
																										</div>
																										<a href="product-page(left-sidebar).html" class="btn btn-normal btn-md">shop now</a>
																								</div>
																						</div>
																						<div>
																								<div>
																										<a href="product-page(left-sidebar).html">
																												<h5>Vario 160</h5>
																										</a>
																										<ul class="rating">
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star-o"></i></li>
																										</ul>
																										<p>GRANDE MATTE WHITE | ABYS TYPE</p>
																										<h6>Rp. 26,639,000<span>Rp. 28,639,000</span></h6>
																										<div class="timer">
																												<p id="demo"></p>
																										</div>
																										<a href="product-page(left-sidebar).html" class="btn btn-normal btn-md">shop now</a>
																								</div>
																						</div>
																						<div>
																								<div>
																										<a href="product-page(left-sidebar).html">
																												<h5>Vario 160</h5>
																										</a>
																										<ul class="rating">
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star-o"></i></li>
																										</ul>
																										<p>GRANDE MATTE BLACK | ABYS TYPE</p>
																										<h6>Rp. 26,639,000<span>Rp. 28,639,000</span></h6>
																										<div class="timer">
																												<p id="demo"></p>
																										</div>
																										<a href="product-page(left-sidebar).html" class="btn btn-normal btn-md">shop now</a>
																								</div>
																						</div>
																						<div>
																								<div>
																										<a href="product-page(left-sidebar).html">
																												<h5>Vario 160</h5>
																										</a>
																										<ul class="rating">
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star-o"></i></li>
																										</ul>
																										<p>GRANDE MATTE WHITE | CBS TYPE</p>
																										<h6>Rp. 26,639,000<span>Rp. 28,639,000</span></h6>
																										<div class="timer">
																												<p id="demo"></p>
																										</div>
																										<a href="product-page(left-sidebar).html" class="btn btn-normal btn-md">shop now</a>
																								</div>
																						</div>
																						<div>
																								<div>
																										<a href="product-page(left-sidebar).html">
																												<h5>Vario 160</h5>
																										</a>
																										<ul class="rating">
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star-o"></i></li>
																										</ul>
																										<p>GRANDE MATTE BLACK | CBS TYPE</p>
																										<h6>Rp. 26,639,000<span>Rp. 28,639,000</span></h6>
																										<div class="timer">
																												<p id="demo"></p>
																										</div>
																										<a href="product-page(left-sidebar).html" class="btn btn-normal btn-md">shop now</a>
																								</div>
																						</div>
																						<div>
																								<div>
																										<a href="product-page(left-sidebar).html">
																												<h5>Vario 160</h5>
																										</a>
																										<ul class="rating">
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star"></i></li>
																												<li><i class="fa fa-star-o"></i></li>
																										</ul>
																										<p>ACTIVE MATTE BLACK | CBS TYPE</p>
																										<h6>Rp. 26,639,000<span>Rp. 28,639,000</span></h6>
																										<div class="timer">
																												<p id="demo"></p>
																										</div>
																										<a href="product-page(left-sidebar).html" class="btn btn-normal btn-md">shop now</a>
																								</div>
																						</div>
																				</div>
																		</div>
																		<div class="col-md-2">
																				<div class="hotdeal-right-nav">
																						<div>
																								<img
																										src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-red-matte-cbs-515x504-tr-3-02082023-091019.png"
																										alt="hot-dea" class="img-fluid" />
																						</div>
																						<div>
																								<img
																										src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-white-matte-abs-515x504-tr-4-02082023-090911.png"
																										alt="hot-dea" class="img-fluid" />
																						</div>
																						<div>
																								<img
																										src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-black-matte-abs-515x504-tr-3-02082023-090925.png"
																										alt="hot-dea" class="img-fluid" />
																						</div>
																						<div>
																								<img
																										src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-white-matte-cbs-sp-515x504-tr-3-02082023-090932.png"
																										alt="hot-dea" class="img-fluid" />
																						</div>
																						<div>
																								<img
																										src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-black-matte-cbs-sp-515x504-tr-6-02082023-094319.png"
																										alt="hot-dea" class="img-fluid" />
																						</div>
																						<div>
																								<img
																										src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/product-draft/colors/var160-black-matte-cbs-515x504-tr-6-02082023-091008.png"
																										alt="hot-dea" class="img-fluid" />
																						</div>
																				</div>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
								<div class="col-lg-3">
										<div class="slide-1-section no-arrow">
												<div>
														<div class="media-banner border-0">
																<div class="media-banner-box">
																		<div class="media-heading">
																				<h5>Motor Terbaru Lainya</h5>
																		</div>
																</div>
																<div class="media-banner-box">
																		<div class="media">
																				<a href="product-page(left-sidebar).html">
																						<img style="width: 86px; height: 110px" src="assets/images/custom/beat-green.png"
																								class="img-fluid" alt="beat deluxe green" />
																				</a>
																				<div class="media-body">
																						<div class="media-contant">
																								<div>
																										<div class="product-detail">
																												<ul class="rating">
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star-o"></i></li>
																												</ul>
																												<a href="product-page(left-sidebar).html">
																														<p>Deluxe (CBS-ISS) Variants</p>
																												</a>
																												<h6>Rp. 18,050,000<span>Rp. 19,050,000</span></h6>
																										</div>
																										<div class="cart-info">
																												<a class="btn btn-basic w-100" href="#">Lihat Sekarang</a>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="media-banner-box">
																		<div class="media">
																				<a href="product-page(left-sidebar).html">
																						<img style="width: 86px; height: 110px" src="assets/images/custom/scopy-green.png"
																								class="img-fluid" alt="banner" />
																				</a>
																				<div class="media-body">
																						<div class="media-contant">
																								<div>
																										<div class="product-detail">
																												<ul class="rating">
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star-o"></i></li>
																												</ul>
																												<a href="product-page(left-sidebar).html">
																														<p>Prestige Green</p>
																												</a>
																												<h6>Rp. 21,875,000<span>Rp. 23,875,000</span></h6>
																										</div>
																										<div class="cart-info">
																												<a class="btn btn-basic w-100" href="#">Lihat Sekarang</a>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="media-banner-box">
																		<div class="media">
																				<a href="product-page(left-sidebar).html">
																						<img style="width: 86px; height: 110px" src="assets/images/custom/genio-green.png"
																								class="img-fluid" alt="banner" />
																				</a>
																				<div class="media-body">
																						<div class="media-contant">
																								<div>
																										<div class="product-detail">
																												<ul class="rating">
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star-o"></i></li>
																												</ul>
																												<a href="product-page(left-sidebar).html">
																														<p>Fabolous Matte Green</p>
																												</a>
																												<h6>Rp. 19,110,000<span>Rp. 22,110,000</span></h6>
																										</div>
																										<div class="cart-info">
																												<a class="btn btn-basic w-100" href="#">Lihat Sekarang</a>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="media-banner-box">
																		<div class="media-view">
																				<h5 class="viewmore opacity-0">View More</h5>
																		</div>
																</div>
														</div>
												</div>
												<div>
														<div class="media-banner border-0">
																<div class="media-banner-box">
																		<div class="media-heading">
																				<h5>New Products</h5>
																		</div>
																</div>
																<div class="media-banner-box">
																		<div class="media">
																				<a href="product-page(left-sidebar).html">
																						<img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid" alt="banner" />
																				</a>
																				<div class="media-body">
																						<div class="media-contant">
																								<div>
																										<div class="product-detail">
																												<ul class="rating">
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star-o"></i></li>
																												</ul>
																												<a href="product-page(left-sidebar).html">
																														<p>sumsung galaxy</p>
																												</a>
																												<h6>$78.05 <span>$68.21</span></h6>
																										</div>
																										<div class="cart-info">
																												<button onclick="openCart()" class="tooltip-top">
																														<i data-feather="shopping-cart"></i>
																												</button>
																												<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																														data-tippy-content="Add to Wishlist"><i data-feather="heart"></i></a>
																												<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																														class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																												<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																data-feather="refresh-cw"></i></a>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="media-banner-box">
																		<div class="media">
																				<a href="product-page(left-sidebar).html">
																						<img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid" alt="banner" />
																				</a>
																				<div class="media-body">
																						<div class="media-contant">
																								<div>
																										<div class="product-detail">
																												<ul class="rating">
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star-o"></i></li>
																												</ul>
																												<a href="product-page(left-sidebar).html">
																														<p>Bajaj GX-1 Mixer</p>
																												</a>
																												<h6>$72.05 <span>$63.21</span></h6>
																										</div>
																										<div class="cart-info">
																												<button onclick="openCart()" class="tooltip-top">
																														<i data-feather="shopping-cart"></i>
																												</button>
																												<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																														data-tippy-content="Add to Wishlist"><i data-feather="heart"></i></a>
																												<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																														class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																												<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																data-feather="refresh-cw"></i></a>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="media-banner-box">
																		<div class="media">
																				<a href="product-page(left-sidebar).html">
																						<img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid" alt="banner" />
																				</a>
																				<div class="media-body">
																						<div class="media-contant">
																								<div>
																										<div class="product-detail">
																												<ul class="rating">
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star-o"></i></li>
																												</ul>
																												<a href="product-page(left-sidebar).html">
																														<p>rechargeable fan</p>
																												</a>
																												<h6>82.05 <span>$75.21</span></h6>
																										</div>
																										<div class="cart-info">
																												<button onclick="openCart()" class="tooltip-top">
																														<i data-feather="shopping-cart"></i>
																												</button>
																												<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																														data-tippy-content="Add to Wishlist"><i data-feather="heart"></i></a>
																												<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																														class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																												<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																data-feather="refresh-cw"></i></a>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>

																<div class="media-banner-box">
																		<div class="media-view">
																				<h5>View More</h5>
																		</div>
																</div>
														</div>
												</div>
												<div>
														<div class="media-banner border-0">
																<div class="media-banner-box">
																		<div class="media-heading">
																				<h5>New Products</h5>
																		</div>
																</div>

																<div class="media-banner-box">
																		<div class="media">
																				<a href="product-page(left-sidebar).html">
																						<img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid" alt="banner" />
																				</a>
																				<div class="media-body">
																						<div class="media-contant">
																								<div>
																										<div class="product-detail">
																												<ul class="rating">
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star-o"></i></li>
																												</ul>
																												<a href="product-page(left-sidebar).html">
																														<p>rechargeable fan</p>
																												</a>
																												<h6>$79.05 <span>$47.21</span></h6>
																										</div>
																										<div class="cart-info">
																												<button onclick="openCart()" class="tooltip-top">
																														<i data-feather="shopping-cart"></i>
																												</button>
																												<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																														data-tippy-content="Add to Wishlist"><i data-feather="heart"></i></a>
																												<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																														class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																												<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																data-feather="refresh-cw"></i></a>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="media-banner-box">
																		<div class="media">
																				<a href="product-page(left-sidebar).html">
																						<img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid" alt="banner" />
																				</a>
																				<div class="media-body">
																						<div class="media-contant">
																								<div>
																										<div class="product-detail">
																												<ul class="rating">
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star-o"></i></li>
																												</ul>
																												<a href="product-page(left-sidebar).html">
																														<p>sumsung galaxy</p>
																												</a>
																												<h6>$51.05 <span>$76.21</span></h6>
																										</div>
																										<div class="cart-info">
																												<button onclick="openCart()" class="tooltip-top">
																														<i data-feather="shopping-cart"></i>
																												</button>
																												<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																														data-tippy-content="Add to Wishlist"><i data-feather="heart"></i></a>
																												<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																														class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																												<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																data-feather="refresh-cw"></i></a>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="media-banner-box">
																		<div class="media">
																				<a href="product-page(left-sidebar).html">
																						<img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid" alt="banner" />
																				</a>
																				<div class="media-body">
																						<div class="media-contant">
																								<div>
																										<div class="product-detail">
																												<ul class="rating">
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star"></i></li>
																														<li><i class="fa fa-star-o"></i></li>
																												</ul>
																												<a href="product-page(left-sidebar).html">
																														<p>Bajaj GX-1 Mixer</p>
																												</a>
																												<h6>$24.05 <span>$56.21</span></h6>
																										</div>
																										<div class="cart-info">
																												<button onclick="openCart()" class="tooltip-top">
																														<i data-feather="shopping-cart"></i>
																												</button>
																												<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																														data-tippy-content="Add to Wishlist"><i data-feather="heart"></i></a>
																												<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																														class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																												<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																data-feather="refresh-cw"></i></a>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="media-banner-box">
																		<div class="media-view">
																				<h5>View More</h5>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!--motor terbaru start-->

		<!-- perbandingan motor populer start -->
		<div class="title8 mt-5">
				<h4>Bandingkan Motor</h4>
		</div>

		<section class="collection-banner section-py-space b-g-white">
				<div class="container-fluid">
						<div class="row collection2">
								<!-- url(&quot;assets/images/custom/compare.png&quot;); -->

								<div class="col-md-4">
										<div class="collection-banner-main p-left banner-13 text-center">
												<div class="d-flex position-relative">
														<div class="order-1">
																<div class="image-wrapper">
																		<img class="img-fluid" src="assets/images/custom/perbandingan2.webp" alt="Honda Scoopy"
																				title="Honda Scoopy" data-src="assets/images/custom/perbandingan2.webp" />
																</div>
														</div>
														<div>
																<div class="image-wrapper">
																		<img class="img-fluid" src="assets/images/custom/perbandingan1.webp" alt="Yamaha Fazzio"
																				title="Yamaha Fazzio" data-src="assets/images/custom/perbandingan1.webp"
																				onclick="gd.common.goto('https://www.oto.com/en/motor-baru/yamaha/fazzio')" />
																</div>
														</div>

														<div class="versus position-absolute">
																<div class="bg-light rounded-circle">
																		<p>VS</p>
																</div>
														</div>

														<div class="desc-versus position-absolute">
																<h3 class="mt-4">Beat vs Beat Steet</h3>
																<a class="btn btn-rounded btn-sm mt-2">Lihat Comparasi</a>
														</div>
												</div>
										</div>
								</div>

								<div class="col-md-4">
										<div class="collection-banner-main p-left banner-13 text-center">
												<div class="d-flex position-relative">
														<div class="order-1">
																<div class="image-wrapper">
																		<img class="img-fluid" src="assets/images/custom/perbandingan2.webp" alt="Honda Scoopy"
																				title="Honda Scoopy" data-src="assets/images/custom/perbandingan2.webp" />
																</div>
														</div>
														<div>
																<div class="image-wrapper">
																		<img class="img-fluid" src="assets/images/custom/perbandingan1.webp" alt="Yamaha Fazzio"
																				title="Yamaha Fazzio" data-src="assets/images/custom/perbandingan1.webp"
																				onclick="gd.common.goto('https://www.oto.com/en/motor-baru/yamaha/fazzio')" />
																</div>
														</div>

														<div class="versus position-absolute">
																<div class="bg-light rounded-circle">
																		<p>VS</p>
																</div>
														</div>

														<div class="desc-versus position-absolute">
																<h3 class="mt-4">Beat vs Beat Steet</h3>
																<a class="btn btn-rounded btn-sm mt-2">Lihat Comparasi</a>
														</div>
												</div>
										</div>
								</div>

								<div class="col-md-4">
										<div class="collection-banner-main p-left banner-13 text-center">
												<div class="d-flex position-relative">
														<div class="order-1">
																<div class="image-wrapper">
																		<img class="img-fluid" src="assets/images/custom/perbandingan2.webp" alt="Honda Scoopy"
																				title="Honda Scoopy" data-src="assets/images/custom/perbandingan2.webp" />
																</div>
														</div>
														<div>
																<div class="image-wrapper">
																		<img class="img-fluid" src="assets/images/custom/perbandingan1.webp" alt="Yamaha Fazzio"
																				title="Yamaha Fazzio" data-src="assets/images/custom/perbandingan1.webp"
																				onclick="gd.common.goto('https://www.oto.com/en/motor-baru/yamaha/fazzio')" />
																</div>
														</div>

														<div class="versus position-absolute">
																<div class="bg-light rounded-circle">
																		<p>VS</p>
																</div>
														</div>

														<div class="desc-versus position-absolute">
																<h3 class="mt-4">Beat vs Beat Steet</h3>
																<a class="btn btn-rounded btn-sm mt-2">Lihat Comparasi</a>
														</div>
												</div>
										</div>
								</div>

								<!-- <div class="collection-banner-contain">
																																						<div>
																																									<h3>best discount </h3>
																																									<h4>cordless tools</h4>
																																									<a href="product-page(left-sidebar).html" class="btn btn-rounded btn-sm">shop now</a>
																																						</div>
																																			</div> -->

								<!-- <div class="col-md-4">
																																<div class="collection-banner-main p-left banner-style3 banner-13 text-center">
																																			<div class="collection-img bg-size" style="background-image: url(&quot;assets/images/custom/compare.png&quot;); background-size: cover; background-position: center center; display: block;"> <img src="assets/images/custom/compare.png" class="img-fluid bg-img" alt="banner" style="display: none;"> </div>
																																			<div class="collection-banner-contain">
																																						<div>
																																									<h3>best discount </h3>
																																									<h4>cordless tools</h4>
																																									<a href="product-page(left-sidebar).html" class="btn btn-rounded btn-sm">shop now</a>
																																						</div>
																																			</div>
																																</div>
																													</div> -->

								<!-- <div class="col-md-4">
																																<div class="collection-banner-main banner-style3 p-left banner-13 text-center">
																																			<div class="collection-img bg-size" style="background-image: url(&quot;assets/images/tools/collection-banner/2.jpg&quot;); background-size: cover; background-position: center center; display: block;"> <img src="assets/images/tools/collection-banner/2.jpg" class="img-fluid bg-img" alt="banner" style="display: none;"> </div>
																																			<div class="collection-banner-contain">
																																						<div>
																																									<h3>up to 50% off</h3>
																																									<h4>replaair parts</h4>
																																									<a href="product-page(left-sidebar).html" class="btn btn-rounded btn-sm">shop now</a>
																																						</div>
																																			</div>
																																</div>
																													</div> -->
						</div>
				</div>
		</section>

		<!-- tukar motor anda start-->
		<section class="collection-banner mt-5">
				<div class="custom-container">
						<div class="row">
								<div class="col">
										<div class="collection-banner-main banner-5 p-center">
												<div class="collection-img"
														style="
                  background-size: contain;
                  background-repeat: no-repeat;
                  background-position: center center;
                  display: block;
                ">
														<img src="https://nexianmotor.shop/wp-content/uploads/2023/04/jual-motor.jpg" class="w-100"
																alt="banner" />
												</div>
												<div class="d-flex align-items-center justify-content-center">
														<div class="position-absolute" style="margin-top: -6rem">
																<div class="shop">
																		<a class="btn btn-normal" href="product-page(left-sidebar).html">
																				Klik Disini
																		</a>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- tukar motor anda end-->

		<!-- perbandingan motor populer end -->

		<!--blog start-->
		<div class="title8 mt-5">
				<h4>Berita Blog</h4>
		</div>
		<section class="blog section-big-pb-space">
				<div class="custom-container">
						<div class="row">
								<div class="col pr-0">
										<div class="blog-slide-4 no-arrow">
												<div>
														<div class="blog-contain">
																<div class="blog-img">
																		<a href="blog-details.html">
																				<img src="assets/images/custom/berita1.png" alt="blog" class="img-fluid w-100" />
																		</a>
																</div>
																<div class="blog-details-2 text-start">
																		<a href="blog-details.html">
																				<h4>Ini Judul Berita</h4>
																		</a>
																		<p>
																				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
																				Curabitur eleifend a massa rhoncus gravida.
																		</p>
																</div>
																<div class="blog-label1">27 <br />nov</div>
														</div>
												</div>
												<div>
														<div class="blog-contain">
																<div class="blog-img">
																		<a href="blog-details.html">
																				<img src="assets/images/custom/berita2.png" class="img-fluid w-100" alt="blog"
																						class="img-fluid w-100" />
																		</a>
																</div>
																<div class="blog-details-2 text-start">
																		<a href="blog-details.html">
																				<h4>Ini Judul Berita</h4>
																		</a>
																		<p>
																				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
																				Curabitur eleifend a massa rhoncus gravida.
																		</p>
																</div>
																<div class="blog-label1">27 <br />nov</div>
														</div>
												</div>
												<div>
														<div class="blog-contain">
																<div class="blog-img">
																		<a href="blog-details.html">
																				<img src="assets/images/custom/berita3.png" class="img-fluid w-100" class="img-fluid w-100" />
																		</a>
																</div>
																<div class="blog-details-2 text-start">
																		<a href="blog-details.html">
																				<h4>Ini Judul Berita</h4>
																		</a>
																		<p>
																				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
																				Curabitur eleifend a massa rhoncus gravida.
																		</p>
																</div>
																<div class="blog-label1">27 <br />nov</div>
														</div>
												</div>
												<div>
														<div class="blog-contain">
																<div class="blog-img">
																		<a href="blog-details.html">
																				<img
																						src="https://asset.kompas.com/crops/VNShGIZ1UidiaF3bKd9ynRTBm0k=/224x173:1305x894/1200x800/data/photo/2023/09/13/6501722b9ca43.jpeg"
																						alt="blog" class="img-fluid w-100" />
																		</a>
																</div>
																<div class="blog-details-2 text-start">
																		<a href="blog-details.html">
																				<h4>
																						Hyundai IONIQ 5 2023 Versi Bluelink, Makin Pintar?
																				</h4>
																		</a>
																		<p>
																				IONIQ 5 dengan Hyundai Bluelink juga dilengkapi fitur
																				navigasi yang lebih lengkap.
																		</p>
																</div>
																<div class="blog-label1">27 <br />nov</div>
														</div>
												</div>
												<div>
														<div class="blog-contain">
																<div class="blog-img">
																		<a href="blog-details.html">
																				<img
																						src="https://imgcdnblog.carbay.com/wp-content/uploads/2023/09/12114412/United-e-motor-2-500x333.jpg"
																						alt="blog" class="img-fluid w-100" />
																		</a>
																</div>
																<div class="blog-details-2 text-start">
																		<a href="blog-details.html">
																				<h4>Ini Judul Berita</h4>
																		</a>
																		<p>
																				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
																				Curabitur eleifend a massa rhoncus gravida.
																		</p>
																</div>
																<div class="blog-label1">27 <br />nov</div>
														</div>
												</div>
												<div>
														<div class="blog-contain">
																<div class="blog-img">
																		<a href="blog-details.html">
																				<img
																						src="https://imgcdnblog.carbay.com/wp-content/uploads/2023/09/12114412/United-e-motor-2-500x333.jpg"
																						alt="blog" class="img-fluid w-100" />
																		</a>
																</div>
																<div class="blog-details-2 text-start">
																		<a href="blog-details.html">
																				<h4>Ini Judul Berita</h4>
																		</a>
																		<p>
																				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
																				Curabitur eleifend a massa rhoncus gravida.
																		</p>
																</div>
																<div class="blog-label1">27 <br />nov</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!--blog end-->

		<!-- video section start -->
		<section class="video-banner">
				<img src="./assets/images/custom/banner-yt.webp" alt="video-banner" class="img-fluid bg-img" />
				<div class="custom-container">
						<div class="row">
								<div class="col-12 position-relative">
										<div class="video-banner-contain">
												<div>
														<a class="video-btn" tabindex="0" data-bs-toggle="modal" data-bs-target="#v-section1"><i
																		class="fa fa-play"></i></a>
														<h3>BELI MOTOR LANGSUNG ATAU ONLINE</h3>
														<h2></h2>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- video section end-->

		<!-- review start -->
		<div class="title8 mb-4 mt-5" id="testimonial">
				<h4>Review Pengguna</h4>
		</div>
		<section class="section-review">
				<div class="container">
						<div class="row">
								<div class="col-12">
										<div class="owl-carousel owl-theme">
												<div class="item card border-12 p-2">
														<div class="img-wrapper d-flex justify-content-center py-2">
																<img src="./assets/images/testimonial/1.jpg" alt="testimonial"
																		class="img-fluid rounded-circle w-25" />
														</div>
														<div class="pt-2 text-center">
																<div class="d-flex justify-content-center">
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star"></i>
																</div>
																<h4 class="card-title">Review Jujur</h4>
														</div>
														<p class="card-text pt-2">
																Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos,
																dolorem. Voluptatum officia assumenda harum in!
														</p>
														<div class="mt-auto pt-2">
																<a href="https://www.instagram.com/agung.sapp/" class="fw-bold">Ipan</a>
																<p>6 Sepetember 2023</p>
														</div>
												</div>
												<div class="item card border-12 p-2">
														<div class="img-wrapper d-flex justify-content-center py-2">
																<img src="./assets/images/testimonial/1.jpg" alt="testimonial"
																		class="img-fluid rounded-circle w-25" />
														</div>
														<div class="pt-2 text-center">
																<div class="d-flex justify-content-center">
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star"></i>
																</div>
																<h4 class="card-title">Review Jujur</h4>
														</div>
														<p class="card-text pt-2">
																Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos,
																dolorem. Voluptatum officia assumenda harum in!
														</p>
														<div class="mt-auto pt-2">
																<a href="https://www.instagram.com/agung.sapp/" class="fw-bold">Ipan</a>
																<p>6 Sepetember 2023</p>
														</div>
												</div>
												<div class="item card border-12 p-2">
														<div class="img-wrapper d-flex justify-content-center py-2">
																<img src="./assets/images/testimonial/1.jpg" alt="testimonial"
																		class="img-fluid rounded-circle w-25" />
														</div>
														<div class="pt-2 text-center">
																<div class="d-flex justify-content-center">
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star"></i>
																</div>
																<h4 class="card-title">Review Jujur</h4>
														</div>
														<p class="card-text pt-2">
																Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos,
																dolorem. Voluptatum officia assumenda harum in!
														</p>
														<div class="mt-auto pt-2">
																<a href="https://www.instagram.com/agung.sapp/" class="fw-bold">Ipan</a>
																<p>6 Sepetember 2023</p>
														</div>
												</div>
												<div class="item card border-12 p-2">
														<div class="img-wrapper d-flex justify-content-center py-2">
																<img src="./assets/images/testimonial/1.jpg" alt="testimonial"
																		class="img-fluid rounded-circle w-25" />
														</div>
														<div class="pt-2 text-center">
																<div class="d-flex justify-content-center">
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star"></i>
																</div>
																<h4 class="card-title">Review Jujur</h4>
														</div>
														<p class="card-text pt-2">
																Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos,
																dolorem. Voluptatum officia assumenda harum in!
														</p>
														<div class="mt-auto pt-2">
																<a href="https://www.instagram.com/agung.sapp/" class="fw-bold">Ipan</a>
																<p>6 Sepetember 2023</p>
														</div>
												</div>
												<div class="item card border-12 p-2">
														<div class="img-wrapper d-flex justify-content-center py-2">
																<img src="./assets/images/testimonial/1.jpg" alt="testimonial"
																		class="img-fluid rounded-circle w-25" />
														</div>
														<div class="pt-2 text-center">
																<div class="d-flex justify-content-center">
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star"></i>
																</div>
																<h4 class="card-title">Review Jujur</h4>
														</div>
														<p class="card-text pt-2">
																Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos,
																dolorem. Voluptatum officia assumenda harum in!
														</p>
														<div class="mt-auto pt-2">
																<a href="https://www.instagram.com/agung.sapp/" class="fw-bold">Ipan</a>
																<p>6 Sepetember 2023</p>
														</div>
												</div>
												<div class="item card border-12 p-2">
														<div class="img-wrapper d-flex justify-content-center py-2">
																<img src="./assets/images/testimonial/1.jpg" alt="testimonial"
																		class="img-fluid rounded-circle w-25" />
														</div>
														<div class="pt-2 text-center">
																<div class="d-flex justify-content-center">
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star text-warning"></i>
																		<i class="fa fa-star"></i>
																</div>
																<h4 class="card-title">Review Jujur</h4>
														</div>
														<p class="card-text pt-2">
																Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos,
																dolorem. Voluptatum officia assumenda harum in!
														</p>
														<div class="mt-auto pt-2">
																<a href="https://www.instagram.com/agung.sapp/" class="fw-bold">Ipan</a>
																<p>6 Sepetember 2023</p>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!--  review end -->
		<!--discount banner start-->
		<section class="discount-banner">
				<div class="container">
						<div class="row">
								<div class="col-12">
										<div class="discount-banner-contain">
												<h2>Diskon untuk setiap unit di situs kami..</h2>
												<h1><span>Lihat dan </span> klik sekarang untuk<span> Penawaran terbaik!</span></h1>
												<div class="rounded-contain rounded-inverse">
														<div class="rounded-subcontain">
																Bagaimana rasanya saat melihat penawaran diskon besar untuk setiap produk?
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!--discount banner end-->

		<!--collection big banner end-->


		<section>
				<div class="container">
						<div class="row">
								<div class="col-12">
										<div class="owl-carousel owl-theme">
												<div class="item border-12">
														<div class="card px-3 py-3">
																<img src="https://img.youtube.com/vi/N4UyJtNmlrs/mqdefault.jpg" class="card-img-top img-fluid" />
																<div class="card-body">
																		<div class="row">
																				<div class="col">
																						<h5 class="card-title">Judul Video</h5>
																				</div>
																				<div class="col-2">
																						<a
																								href="https://www.google.com/maps/dir/?api=1&amp;origin=My+Location&amp;destination=-8.65861,%20115.210666&amp;travelMode=motorcycle">
																								<i class="fa fa-location-arrow fs-5" aria-hidden="true"></i>
																						</a>
																				</div>
																		</div>
																		<p class="card-text">
																				Lorem ipsum, dolor sit amet consectetur adipisicing elit.
																				Saepe, quia.
																		</p>
																</div>
														</div>
												</div>
												<div class="item border-12">
														<div class="card px-3 py-3">
																<img src="https://img.youtube.com/vi/yROhxSBucUQ/mqdefault.jpg" class="card-img-top img-fluid" />
																<div class="card-body">
																		<div class="row">
																				<div class="col">
																						<h5 class="card-title">Judul Video</h5>
																				</div>
																				<div class="col-2">
																						<a
																								href="https://www.google.com/maps/dir/?api=1&amp;origin=My+Location&amp;destination=-8.65861,%20115.210666&amp;travelMode=motorcycle">
																								<i class="fa fa-location-arrow fs-5" aria-hidden="true"></i>
																						</a>
																				</div>
																		</div>
																		<p class="card-text">
																				Lorem ipsum, dolor sit amet consectetur adipisicing elit.
																				Saepe, quia.
																		</p>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- video terbaru end -->

		<div class="title8 mb-4 mt-5">
				<h4 style="text-transform: capitalize">Mitra Kami</h4>
		</div>
		<!-- mitra kami slider start -->
		<section class="ratio_asos product b-g-light mb-5 pb-5 pt-3">
				<div class="container">
						<div class="row">
								<div class="col-12 slide-mitra-kami">
										<div>
												<div class="card d-flex justify-content-center align-items-center px-3 py-2"
														style="width: 100px; height: 80px; padding: 2rem">
														<img src="https://imgcdn.oto.com/brandlogo/motor/honda-1652082402.png" alt=""
																class="img-mitra" />
												</div>
										</div>
										<div>
												<div class="card d-flex justify-content-center align-items-center px-3 py-2"
														style="width: 100px; height: 80px; padding: 2rem">
														<img src="https://imgcdn.oto.com/brandlogo/motor/yamaha-1651737896.png" alt=""
																class="img-mitra" />
												</div>
										</div>
										<div>
												<div class="card d-flex justify-content-center align-items-center px-3 py-2"
														style="width: 100px; height: 80px; padding: 2rem">
														<img src="https://imgcdn.oto.com/brandlogo/motor/suzuki-1652082502.png" alt=""
																class="img-mitra" />
												</div>
										</div>
										<div>
												<div class="card d-flex justify-content-center align-items-center px-3 py-2"
														style="width: 100px; height: 80px; padding: 2rem">
														<img src="https://imgcdn.oto.com/brandlogo/motor/kawasaki-1652082467.png" alt=""
																class="img-mitra" />
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- mitra kami slider end -->

		<!--services start-->
		<section class="services services-inverse">
				<div class="container">
						<div class="row service-block">
								<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="media">
												<svg height="679pt" viewBox="0 -117 679.99892 679" width="679pt" xmlns="http://www.w3.org/2000/svg">
														<path
																d="m12.347656 378.382812h37.390625c4.371094 37.714844 36.316407 66.164063 74.277344 66.164063 37.96875 0 69.90625-28.449219 74.28125-66.164063h241.789063c4.382812 37.714844 36.316406 66.164063 74.277343 66.164063 37.96875 0 69.902344-28.449219 74.285157-66.164063h78.890624c6.882813 0 12.460938-5.578124 12.460938-12.460937v-352.957031c0-6.882813-5.578125-12.464844-12.460938-12.464844h-432.476562c-6.875 0-12.457031 5.582031-12.457031 12.464844v69.914062h-105.570313c-4.074218.011719-7.890625 2.007813-10.21875 5.363282l-68.171875 97.582031-26.667969 37.390625-9.722656 13.835937c-1.457031 2.082031-2.2421872 4.558594-2.24999975 7.101563v121.398437c-.09765625 3.34375 1.15624975 6.589844 3.47656275 9.003907 2.320312 2.417968 5.519531 3.796874 8.867187 3.828124zm111.417969 37.386719c-27.527344 0-49.851563-22.320312-49.851563-49.847656 0-27.535156 22.324219-49.855469 49.851563-49.855469 27.535156 0 49.855469 22.320313 49.855469 49.855469 0 27.632813-22.21875 50.132813-49.855469 50.472656zm390.347656 0c-27.53125 0-49.855469-22.320312-49.855469-49.847656 0-27.535156 22.324219-49.855469 49.855469-49.855469 27.539063 0 49.855469 22.320313 49.855469 49.855469.003906 27.632813-22.21875 50.132813-49.855469 50.472656zm140.710938-390.34375v223.34375h-338.375c-6.882813 0-12.464844 5.578125-12.464844 12.460938 0 6.882812 5.582031 12.464843 12.464844 12.464843h338.375v79.761719h-66.421875c-4.382813-37.710937-36.320313-66.15625-74.289063-66.15625-37.960937 0-69.898437 28.445313-74.277343 66.15625h-192.308594v-271.324219h89.980468c6.882813 0 12.464844-5.582031 12.464844-12.464843 0-6.882813-5.582031-12.464844-12.464844-12.464844h-89.980468v-31.777344zm-531.304688 82.382813h99.703125v245.648437h-24.925781c-4.375-37.710937-36.3125-66.15625-74.28125-66.15625-37.960937 0-69.90625 28.445313-74.277344 66.15625h-24.929687v-105.316406l3.738281-5.359375h152.054687c6.882813 0 12.460938-5.574219 12.460938-12.457031v-92.226563c0-6.882812-5.578125-12.464844-12.460938-12.464844h-69.796874zm-30.160156 43h74.777344v67.296875h-122.265625zm0 0" />
												</svg>
												<div class="media-body">
														<h5>Gratis Ongkir</h5>
												</div>
										</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="media">
												<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
														xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 417.12 417.12"
														style="enable-background:new 0 0 417.12 417.12;" xml:space="preserve">
														<g>
																<g>
																		<path
																				d="M409.12,200.741c-4.418,0-8,3.582-8,8c-0.06,106.525-86.464,192.831-192.988,192.772
                                C101.607,401.453,15.3,315.049,15.36,208.524C15.42,102,101.824,15.693,208.348,15.753c51.36,0.029,100.587,20.54,136.772,56.988
                                l-17.84-0.72c-4.418,0-8,3.582-8,8s3.582,8,8,8l36.72,1.52c1.013,0.003,2.018-0.188,2.96-0.56l0.88-0.56
                                c1.381-0.859,2.534-2.039,3.36-3.44c0.034-0.426,0.034-0.854,0-1.28c0.183-0.492,0.317-1.001,0.4-1.52l3.2-36.72
                                c0.376-4.418-2.902-8.304-7.32-8.68s-8.304,2.902-8.68,7.32l-1.6,18.16c-80.799-82.092-212.848-83.14-294.939-2.341
                                s-83.14,212.848-2.341,294.939s212.848,83.14,294.939,2.341c39.786-39.159,62.212-92.635,62.261-148.459
                                C417.12,204.323,413.538,200.741,409.12,200.741z" />
																</g>
														</g>
														<g>
																<g>
																		<path
																				d="M200.4,256.341c-3.716-2.516-8.162-3.726-12.64-3.44h-56c1.564-2.442,3.302-4.768,5.2-6.96
                                c6.727-7.402,14.088-14.201,22-20.32c10.667-8.747,18.293-15.147,22.88-19.2c5.252-4.976,9.752-10.689,13.36-16.96
                                c4.377-7.234,6.649-15.545,6.56-24c-0.009-11.177-4.27-21.931-11.92-30.08c-3.725-3.941-8.181-7.12-13.12-9.36
                                c-8.709-3.645-18.08-5.443-27.52-5.28c-8.048-0.163-16.055,1.194-23.6,4c-6.2,2.328-11.862,5.894-16.64,10.48
                                c-4.219,4.117-7.565,9.042-9.84,14.48c-2.098,4.853-3.213,10.074-3.28,15.36c-0.192,3.547,1.081,7.018,3.52,9.6
                                c2.345,2.352,5.56,3.626,8.88,3.52c3.499,0.231,6.903-1.19,9.2-3.84c2.503-3.303,4.424-7.01,5.68-10.96
                                c0.939-3.008,2.144-5.926,3.6-8.72c4.562-7.738,12.94-12.416,21.92-12.24c4.114,0.077,8.149,1.147,11.76,3.12
                                c3.625,1.82,6.693,4.583,8.88,8c2.194,3.673,3.329,7.882,3.28,12.16c-0.067,4.437-1.105,8.806-3.04,12.8
                                c-2.129,4.829-5.019,9.286-8.56,13.2c-4.419,4.617-9.298,8.772-14.56,12.4c-5.616,4.247-10.96,8.843-16,13.76
                                c-7.787,7.04-16.453,15.467-26,25.28c-2.638,2.966-4.773,6.344-6.32,10c-1.632,3.159-2.612,6.614-2.88,10.16
                                c-0.018,3.939,1.605,7.707,4.48,10.4c3.393,3.096,7.896,4.684,12.48,4.4h78.4c3.842,0.312,7.641-0.993,10.48-3.6
                                c2.291-2.379,3.53-5.579,3.44-8.88C204.691,262.051,203.173,258.598,200.4,256.341z" />
																</g>
														</g>
														<g>
																<g>
																		<path
																				d="M333.76,222.901c-4.254-1.637-8.809-2.346-13.36-2.08h-4.56v-82.48c0-12.373-5.333-18.56-16-18.56
                                c-3.185-0.052-6.261,1.155-8.56,3.36c-3.331,3.343-6.382,6.956-9.12,10.8l-56.48,75.6l-3.92,5.2c-1.067,1.44-2.107,2.907-3.12,4.4
                                c-0.916,1.374-1.668,2.851-2.24,4.4c-0.475,1.308-0.718,2.689-0.72,4.08c-0.237,4.699,1.607,9.263,5.04,12.48
                                c4.323,3.358,9.742,4.984,15.2,4.56h53.52v20.08c-0.273,4.252,1.006,8.459,3.6,11.84c5.276,5.346,13.887,5.403,19.233,0.127
                                c0.043-0.042,0.085-0.084,0.127-0.127c2.587-3.384,3.866-7.589,3.6-11.84v-20h6.48c4.242,0.298,8.476-0.677,12.16-2.8
                                c2.877-2.141,4.425-5.63,4.08-9.2C339.301,228.744,337.319,224.811,333.76,222.901z M289.36,220.581h-45.84l45.84-61.92V220.581z" />
																</g>
														</g>
												</svg>
												<div class="media-body">
														<h5>Pelayanan 24X7 </h5>
												</div>
										</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="media">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 295.82 295.82"
														xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 295.82 295.82">
														<g>
																<g>
																		<path
																				d="m269.719,43.503h-243.617c-13.921,0-26.102,12.181-26.102,26.102v156.611c0,13.921 12.181,26.102 26.102,26.102h243.617c13.921,0 26.102-12.181 26.102-26.102v-156.611c-0.001-13.921-12.182-26.102-26.102-26.102zm-243.617,17.401h243.617c5.22,0 8.701,3.48 8.701,8.701v13.921h-261.019v-13.921c-1.06581e-14-5.22 3.481-8.701 8.701-8.701zm252.317,40.023v13.921h-261.018v-13.921h261.018zm-8.7,133.989h-243.617c-5.22,0-8.701-3.48-8.701-8.701v-93.966h261.018v93.966c0,5.221-3.48,8.701-8.7,8.701z" />
																		<path
																				d="m45.243,172.272h45.243c5.22,0 8.701-3.48 8.701-8.701 0-5.22-3.48-8.701-8.701-8.701h-45.243c-5.22,0-8.701,3.48-8.701,8.701 0.001,5.221 3.481,8.701 8.701,8.701z" />
																		<path
																				d="m151.391,191.413h-106.148c-5.22,0-8.701,3.48-8.701,8.701s3.48,8.701 8.701,8.701h106.147c3.48,0 8.701-3.48 8.701-8.701s-3.48-8.701-8.7-8.701z" />
																</g>
														</g>
												</svg>
												<div class="media-body">
														<h5>Pengembalian Mudah</h5>
												</div>
										</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="media">
												<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
														xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 448 448"
														style="enable-background:new 0 0 448 448;" xml:space="preserve">
														<g>
																<g>
																		<g>
																				<path
																						d="M384,172.4C384,83.6,312.4,12,224,12S64,83.6,64,172c0,0,0,0,0,0.4C28.4,174.4,0,204,0,240v8c0,37.6,30.4,68,68,68h3.6
                                   l28.4,45.2c20,32,54,50.8,91.6,50.8h5.6c3.6,13.6,16,24,30.8,24c17.6,0,32-14.4,32-32c0-17.6-14.4-32-32-32
                                   c-14.8,0-27.2,10.4-30.8,24h-5.6c-32,0-61.2-16.4-78-43.6L90.4,316H96c8.8,0,16-7.2,16-16V188c0-8.8-7.2-16-16-16H80
                                   c0-79.6,64.4-144,144-144s144,64.4,144,144h-16c-8.8,0-16,7.2-16,16v112c0,8.8,7.2,16,16,16h28c37.6,0,68-30.4,68-68v-8
                                   C448,204,419.6,174.4,384,172.4z M228,388c8.8,0,16,7.2,16,16s-7.2,16-16,16s-16-7.2-16-16S219.2,388,228,388z M96,188v112H68
                                   c-28.8,0-52-23.2-52-52v-8c0-28.8,23.2-52,52-52H96z M432,248c0,28.8-23.2,52-52,52h-28V188h28c28.8,0,52,23.2,52,52V248z" />
																				<path
																						d="M290.4,72.4c-0.8-0.4-2-1.2-3.2-2c-1.2-0.8-2.4-1.6-3.2-2c-3.6-2.4-8.8-1.2-10.8,2.8S272,79.6,276,82
                                   c0.8,0.4,2,1.2,3.2,2s2.4,1.6,3.6,2c1.2,0.8,2.8,1.2,4,1.2c2.8,0,5.2-1.2,6.8-4C295.6,79.6,294.4,74.8,290.4,72.4z" />
																				<path
																						d="M224,52c-34,0-66,14.8-88,40.4c-2.8,3.2-2.4,8.4,0.8,11.2c1.6,1.2,3.2,2,5.2,2c2.4,0,4.4-0.8,6-2.8
                                   c19.2-22,46.8-34.8,76-34.8c7.2,0,14.4,0.8,21.6,2.4c4.4,0.8,8.4-2,9.6-6s-2-8.4-6-9.6C240.8,52.8,232.4,52,224,52z" />
																		</g>
																</g>
														</g>
												</svg>
												<div class="media-body">
														<h5>Pembayaran COD</h5>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!--services end-->
		<!-- Parallax banner -->
		<section class="section-big-pt-space">
				<div class="full-banner parallax p-left text-left">
						<img src="assets/images/custom/deal-ok.png" alt="" class="bg-img" />
						<div class="container">
								<div class="row">
										<div class="col">
												<div class="banner-contain">
														<h3>Tunggu apalagi ?</h3>
														<!-- <h3>food market</h3> -->
														<!-- <h4>special offer</h4> -->
														<a href="#" class="btn bg-basic btn-rounded fs-3 mt-3 px-5"><i class="fa fa-whatsapp"
																		aria-hidden="true"></i><span class="ms-1">Ajukan Sekarang</span></a>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- Parallax banner end -->


		<!-- modal area kenapa harus blimoto start -->
		<div class="modal modal-v-sec fade" id="v-founder" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
						<!-- Modal content-->
						<div class="modal-content">
								<!-- <i class="close ti-close" data-bs-dismiss="modal"></i>            -->
								<iframe width="560" height="315" src="https://www.youtube.com/embed/X8ohxpWhWOA?si=kUNP41h87pjEdCMl"
										title="YouTube video player" frameborder="0"
										allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
										allowfullscreen></iframe>
						</div>
				</div>
		</div>
		<div class="modal modal-v-sec fade" id="v-testimoni" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
						<!-- Modal content-->
						<div class="modal-content">
								<!-- <i class="close ti-close" data-bs-dismiss="modal"></i>            -->
								<iframe width="560" height="315" src="https://www.youtube.com/embed/X8ohxpWhWOA?si=kUNP41h87pjEdCMl"
										title="YouTube video player" frameborder="0"
										allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
										allowfullscreen></iframe>
						</div>
				</div>
		</div>
		<div class="modal modal-v-sec fade" id="v-leasing" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
						<!-- Modal content-->
						<div class="modal-content">
								<!-- <i class="close ti-close" data-bs-dismiss="modal"></i>            -->
								<iframe width="560" height="315" src="https://www.youtube.com/embed/X8ohxpWhWOA?si=kUNP41h87pjEdCMl"
										title="YouTube video player" frameborder="0"
										allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
										allowfullscreen></iframe>
						</div>
				</div>
		</div>
		<!-- modal area kenapa harus blimoto end -->
@endsection


@push('script')
		<script>
				// gpt

				$(document).ready(function() {
						console.log('jQuery aman bang !')
				})

				function updateBubble(input) {
						const val = input.value;
						const bubble = document.getElementById("bubble");

						// Konversi nilai ke format mata uang Rupiah
						const formattedValue = formatToRupiah(val);
						bubble.textContent = formattedValue;

						// Sorta magic numbers based on size of the native UI thumb
						const min = input.min ? parseFloat(input.min) : 0;
						const max = input.max ? parseFloat(input.max) : 100;
						const newVal = ((val - min) * 100) / (max - min);
						bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
				}

				function formatToRupiah(value) {
						// Gunakan metode Intl.NumberFormat untuk mengonversi nilai menjadi format mata uang Rupiah
						return new Intl.NumberFormat("id-ID", {
								style: "currency",
								currency: "IDR",
						}).format(value);
				}
		</script>
@endpush
