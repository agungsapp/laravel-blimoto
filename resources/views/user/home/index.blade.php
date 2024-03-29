@extends('user.layouts.main')
@section('content')
		<!-- new hook slider start -->
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
						@foreach ($hooks as $hook)
								<div class="carousel-item {{ $hook->id == 1 ? 'active' : '' }}" data-bs-interval="3500">
										<img src="{{ asset('assets') }}/images/custom/hook/{{ $hook->gambar }}" class="d-block w-100"
												alt="{{ $hook->gambar }}" />
										<div class="carousel-caption d-none d-md-block">
												<a href="{{ $hook->link }}"
														style="background-color: {{ $hook->warna }}; color: {{ $hook->warna_teks }}; font-weight: bold;"
														class="btn rounded-pill fs-sm-4 fs-md-4 fs-lg-4 btn-hook px-5">Lihat Promo</a>
										</div>
								</div>
						@endforeach

				</div>
		</div>
		<!-- new hook slider end -->


		{{-- inclide home promo --}}
		@include('user.home._home_promo')

		<p id="hehe"></p>
		<!-- simulasi kredit start -->
		<section id="simulasi" class="my-2">
				<div class="custom-container">
						<div class="row d-flex justify-content-center">
								<div class="col-11 col-md-10 px-3 py-3">
										<p class="fs-4 fw-bold mb-1 text-start text-black">Cari Diskon Terbaik Disini</h>
								</div>
								{{-- py-lg-0 pt-lg-4 pe-lg-0 py-5 pe-5 ps-5 --}}
								<div class="col-11 col-md-10 card-diskon-terbaik overflow-hidden p-4">
										{{-- <h3 class="title8 mb-3 text-center">Cari Diskon Terbaik</h3> --}}

										<div class="row">
												<div class="col-12 col-lg-8">
														<h4 class="text-black">Temukan kendaraan impianmu !</h4>
														<p class="mt-2">
																Kami telah membantu lebih dari 2000 orang untuk menemukan
																kendaraan yang sesuai dengan kebutuhan mereka dan impian mereka.
														</p>

														<form id="form-simulasi" action="" class="mt-2">
																<div class="row">
																		<!-- kota -->
																		<div class="col-12 col-md-4">
																				<div class="form-group">
																						<label for="SelectKota" class="mb-0" style="font-size: 12px">Kota</label>
																						<select id="SelectKota" class="js-example-basic-single form-select form-select-sm"
																								style="width: 100%" name="kota">
																								<option value="" selected>-- Pilih Kota --</option>
																								{{-- <option value="1">Jakarta</option> --}}
																						</select>
																				</div>
																		</div>

																		<!-- merk -->
																		<div class="col-12 col-md-4">
																				<div class="form-group">
																						<label for="merk" class="mb-0" style="font-size: 12px">merk</label>
																						<select id="merk" class="js-example-basic-single form-select form-select-sm"
																								style="width: 100%" name="merk">
																								<option value="0" selected>-- Merk --</option>
																						</select>
																				</div>
																		</div>

																		<!-- Tipe -->
																		<div class="col-12 col-md-4">
																				<div class="form-group">
																						<label for="SelectKota" class="mb-0" style="font-size: 12px">Tipe</label>
																						<select id="tipe" class="js-example-basic-single form-select form-select-sm"
																								style="width: 100%" name="tipe">
																								<option value="0" selected>-- Pilih Tipe --</option>
																						</select>
																				</div>
																		</div>

																		<!-- pembayaran -->
																		<div class="col-12 col-md-4">
																				<div class="form-group">
																						<label for="SelectKota" class="mb-0" style="font-size: 12px">Pembayaran</label>
																						<select id="pembayaran" class="js-example-basic-single form-select form-select-sm"
																								style="width: 100%" name="pembayaran">
																								<option value="" selected>-- Pilih Pembayaran --</option>
																								<option value="2">Cash</option>
																								<option value="1">Kredit</option>
																						</select>
																				</div>
																		</div>

																		<!-- model motor -->
																		<div class="col-12 col-md-4">
																				<div class="form-group">
																						<label for="SelectKota" class="mb-0" style="font-size: 12px">Nama Motor</label>
																						<select id="model" class="js-example-basic-single form-select form-select-sm"
																								style="width: 100%" name="model">
																								<option value="0" selected>-- Pilih Model --</option>
																						</select>
																				</div>
																		</div>


																		<!-- tenor -->
																		<div class="col-12 col-md-4">
																				<div class="form-group">
																						<label for="tenor" class="mb-0" style="font-size: 12px">Tenor</label>
																						<select id="tenor" class="js-example-basic-single form-select form-select-sm"
																								style="width: 100%" name="tenor">
																								<option value="" selected>-- Pilih Tenor --</option>
																								<option value="11">11 Bulan</option>
																								<option value="17">17 Bulan</option>
																								<option value="23">23 Bulan</option>
																								<option value="29">29 Bulan</option>
																								<option value="35">35 Bulan</option>
																						</select>
																				</div>
																		</div>

																</div>

																<div class="row">
																		<div class="d-flex align-items-center mt-4">
																				<div class="col-8 d-flex">
																						<button class="btn bg-basic btn-submit text-white" type="submit">
																								Submit
																						</button>
																						<button id="reset_simulasi" class="btn bg-secondary btn-submit ms-2 text-white" type="reset">
																								Reset
																						</button>
																				</div>
																		</div>
																</div>
														</form>
												</div>
												{{-- img simulasi kanan --}}
												<div class="col-12 col-lg-4 d-none d-lg-block h-100 p-0">
														<div class="w-100 h-100 d-flex justify-content-end align-items-end">
																<img src="{{ asset('assets') }}/images/custom/simulasi/simulasi.png" class="w-75 h-100" style=""
																		alt="simulasi.png">
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- simulasi kredit end -->

		<!-- best motor -->
		<div class="list-product">
				<div class="tab-content">
						<div class="tab-pane fade"></div>
				</div>
		</div>
		<!-- best motor end -->


		{{-- place bandingkan motr --}}


		{{-- motor populer start --}}
		<div class="container-fluid padding-primary mt-4">
				<div class="row">
						<div class="col-11 col-md-10 px-3 py-3">
								<p class="fs-4 fw-bold mb-1 text-start text-black">Motor Populer</h>
						</div>
						@php
								$motor_terbaru = [
								    '2023-10-13_Produk Promo BEAT CBS BLACK.webp',
								    '2023-10-13_Produk Promo Deluxe Silver.webp',
								    '2023-10-13_Produk Promo CB150X GREEN.webp',
								    '2023-10-13_Produk Promo V160 CBS WHITE gold.webp',
								    '2023-10-13_Produk Promo BSTREET SILVER.webp',
								];
						@endphp
						<div class="col-12">
								<div class="owl-home-slider owl-theme position-relative overflow-hidden">
										@foreach ($populer as $pop)
												<div class="item d-flex justify-content-center justify-content-md-start py-4">
														<div class="card rounded-3 shadow-home-card overflow-hidden">
																<img src="{{ asset('assets') }}/images/detail-motor/{{ $pop->image }}" alt="{{ $pop->image }}"
																		srcset="">
																<div class="p-3">
																		<p class="fw-bold fs-5 mb-2 text-black">{{ $pop->nama }}</p>


																		<div class="mt-2">
																				<div class="d-flex justify-content-between">
																						<p class="text-doff">Diskon promo </p>
																						<p class="text-basic fw-bold">{{ Str::rupiah($pop->diskon_promo ?? '0') }}</p>
																				</div>
																				<p class="mb-3">Cicilan. 979.000 x 35 Bulan</p>
																		</div>
																		<form class="mt-3" action="{{ route('detail-motor') }}" method="GET">
																				@csrf
																				<input class="id_lokasi" type="hidden" name="id_lokasi">
																				<input type="hidden" name="id_motor" value="{{ $pop->id }}">
																				<button type="submit" class="btn-basic rounded-lg px-3 py-0">Lihat Diskon
																						Terbaik</button>
																		</form>


																		{{-- <p>Rp. 1.000.000</p>
																		<p class="mb-3">DP. 979.000 x 35 Bulan</p>
																		<a href="#" class="btn-basic rounded-lg px-3 py-1">Lihat Angsuran</a> --}}
																</div>
														</div>
												</div>
										@endforeach
								</div>
						</div>

				</div>
		</div>
		{{-- motor populer end --}}

		{{-- motor terbaru start --}}
		<div class="container-fluid padding-primary mt-4">
				<div class="row">
						<div class="col-11 col-md-10 px-3 py-3">
								<p class="fs-4 fw-bold mb-1 text-start text-black">Motor Terbaru</h>
						</div>
						<div class="col-12">
								<div class="owl-home-slider owl-theme position-relative overflow-hidden">
										@foreach ($terbaru as $baru)
												<div class="item d-flex justify-content-center justify-content-md-start py-4">
														<div class="card rounded-3 shadow-home-card overflow-hidden">
																<img src="{{ asset('assets') }}/images/detail-motor/{{ $baru->image }}" alt="{{ $baru->image }}"
																		srcset="">
																<div class="p-3">
																		<p class="fw-bold fs-5 mb-2 text-black">{{ $baru->nama }}</p>
																		<div class="mt-2">
																				<div class="d-flex justify-content-between">
																						<p class="text-doff">Diskon promo </p>
																						<p class="text-basic fw-bold">{{ Str::rupiah($baru->diskon_promo ?? '0') }}</p>
																				</div>
																				<p class="mb-3">Cicilan. 979.000 x 35 Bulan</p>
																		</div>
																		<form class="mt-3" action="{{ route('detail-motor') }}" method="GET">
																				@csrf
																				<input class="id_lokasi" type="hidden" name="id_lokasi">
																				<input type="hidden" name="id_motor" value="{{ $baru->id }}">
																				<button type="submit" class="btn-basic rounded-lg px-3 py-0">Lihat Diskon
																						Terbaik</button>
																		</form>
																</div>
														</div>
												</div>
										@endforeach
								</div>
						</div>
				</div>
		</div>
		{{-- motor terbaru end --}}


		<!-- video section start -->
		<section class="video-banner">
				<img src="{{ asset('assets') }}/images/banner/banner-yt.webp" alt="video-banner" class="img-fluid bg-img" />
				<div class="custom-container">
						<div class="row">
								<div class="col-12 position-relative">
										<div class="video-banner-contain">
												<div>
														<a class="video-btn" tabindex="0" data-bs-toggle="modal" data-bs-target="#v-section1"><i
																		class="fa fa-play"></i></a>

														<h2></h2>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		{{-- <section class="video-blimoto"
				style="height: 400px; display:flex; justify-content: center; background-image: url('https://i.postimg.cc/G23P7gwy/blur-sss.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
				<iframe height="400px" width="50%" src="https://www.youtube.com/embed/b9kGXU_g0c0?rel=0&si=WD3_aM76gMOSqAO7"
						title="YouTube video player" frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen></iframe>
		</section> --}}

		<!-- video section end-->


		{{-- NEW berita blog start --}}
		<div class="container-fluid padding-primary mb-3 mt-4">
				<div class="row">
						<div class="col-11 col-md-10 px-3 py-3">
								<p class="fs-4 fw-bold mb-1 text-start text-black">Berita Blog</p>
						</div>
						<div class="col-12">
								<div class="owl-home-slider owl-theme position-relative overflow-hidden">
										@foreach ($blogs as $blog)
												<div class="item d-flex justify-content-center">
														<div class="card rounded-3 card-berita-blog overflow-hidden">
																<div class="card-body p-0">
																		{{-- <img src="{{ asset('assets') }}/images/thumbnail-blog/{{ $blog->thumbnail }}"
																				style="max-height: 150px;" class="img-fluid" alt="{{ $blog->thumbnail }}" srcset=""> --}}
																		<div class="berita-blog-image"
																				style="background-image: url('{{ asset('assets') }}/images/thumbnail-blog/{{ $blog->thumbnail }}'); width: 100%; height: 200px;">
																		</div>
																		<div class="p-3" style=" min-height: 175px">
																				<p class="fw-bold fs-6 mb-2 text-black">{{ $blog->judul }}</p>
																				<p class="mb-3">
																						{{ strlen($blog->cuplikan) > 50 ? substr($blog->cuplikan, 0, 50) . '...' : $blog->cuplikan }}
																				</p>
																		</div>
																</div>
																<div class="card-footer border-0 bg-white py-3">
																		<a href="{{ route('blog.show', $blog->id) }}" class="btn-basic mt-3 rounded-lg px-3 py-1">Lihat
																				Detail</a>
																</div>
														</div>
												</div>
										@endforeach

								</div>
						</div>
				</div>
		</div>
		{{-- NEW berita blog end --}}

		{{-- video dari blimoto start --}}
		<section class="section-review">
				<div class="container-fluid padding-primary">
						<div class="row mb-3">
								<div class="col-11 col-md-10 px-3 py-3">
										<p class="fs-4 fw-bold mb-1 text-start text-black">Video Dari Blimoto</p>
								</div>
								<div class="col-12">
										@php
												$thumbnail = ['1.webp', '2.webp', '3.webp', '4.webp'];
												$text = [
												    'Motor ADV 2024 TELAH RILIS',
												    'Motor yang COCOK UNTUK PAUTRI',
												    'TEST DRIVE - BeAT Street Motor HEMAT BBM',
												    'MOTORNYA MUDA MUDI Sat Set Motornya',
												];
												$link = [
												    'https://youtu.be/3g4hMdYp8Ug?si=0HgD6sVKO9BkKWpr',
												    'https://youtu.be/1QVGV5wEMU8?si=lX6XpKc6wb6yJqEb',
												    'https://youtu.be/8atEqcpHgNU?si=W-sLmE-N6NMzFD2P',
												    'https://youtu.be/7tDfPq0kzrs?si=wYGxbp8fasQz4uQY',
												    'https://youtu.be/kdBAMAXRTGg?si=oYuZPKblPr-2t_Wd',
												];
										@endphp
										{{-- owl --}}
										<div class="owl-home-slider owl-theme position-relative overflow-hidden">

												{{-- item for loop review --}}
												@for ($i = 0; $i < 4; $i++)
														<a class="item d-flex justify-content-center" tabindex="0" data-bs-toggle="modal"
																data-bs-target="#dariblimoto{{ $i }}">
																<div class="card rounded-3 card-video-blimotot overflow-hidden">
																		<img src="{{ asset('assets') }}/images/custom/video-blimoto/{{ $thumbnail[$i] }}"
																				alt="2023-10-13_Produk Promo BEAT CBS BLACK.webp" srcset="">
																		<div class="d-flex flex-column justify-content-between p-3" style="min-height: 120px;">
																				<p class="fw-bold fs-6 mb-2 text-black">{{ $text[$i] }}</p>
																				<p class="text-black">11 November 2023</p>
																		</div>
																</div>
														</a>
												@endfor




												{{-- end loop --}}
										</div>
								</div>
						</div>
				</div>
		</section>
		{{-- video dari blimoto end --}}


		<!-- review start -->
		{{-- <div class="title8 mb-4 mt-5" id="testimonial">
				<h4>Review Pengguna</h4>
		</div> --}}
		<section class="section-review">
				<div class="container-fluid padding-primary">
						<div class="row mb-3">
								<div class="col-12 d-flex justify-content-between px-3 py-3">
										<p class="fs-4 fw-bold mb-1 text-start text-black">Review Pengguna</p>
										<div>
												<p class="fs-4 fw-bold text-basic">5 dari 5</p>
												<div class="d-flex">
														<i class="fa fa-star text-warning"></i>
														<i class="fa fa-star text-warning"></i>
														<i class="fa fa-star text-warning"></i>
														<i class="fa fa-star text-warning"></i>
														<i class="fa fa-star text-warning"></i>
												</div>
										</div>
								</div>
								<div class="col-12">
										{{-- owl --}}
										<div class="mau-di-kasi-owl owl-carousel owl-theme">

												@php
														$motor = ['Honda PCX', 'Scoopy', 'BeAt Deluxe', 'Honda PCX'];
														$img = ['testi1.webp', 'testi2.webp', 'testi3.webp', 'testi4.webp'];
														$nama = ['Agus Setiawan', 'Yunus Gunawan', 'Gatot Edi Hidayat', 'Amalia Safitri'];
														$review = [
														    'Harga terbaik untuk area Jabodetabek',
														    'CS nya ramah banget, Syarat pengajuan kreditnya juga gampang',
														    'Kenapa ga ada dari dulu ya biar mudah',
														    'Sangat membantu, bisa tau harga motor sekarang tanpa harus ke delaer ❤',
														];
												@endphp

												{{-- item for loop review --}}
												@for ($i = 0; $i < 4; $i++)
														<div class="item d-flex justify-content-center h-100 py-4">
																<div class="review-wrapper" style="width: 16rem;">
																		<div class="review-motor">Membeli : {{ $motor[$i] }}</div>
																		<div class="d-flex justify-content-center img-review">
																				{{-- <img class="img-fluid" style=""
																						src="{{ asset('assets') }}/images/review/{{ $img[$i] }}" alt="{{ $img[$i] }}"> --}}
																				<div class="img-review-bg"
																						style="background-image: url('{{ asset('assets') }}/images/review/{{ $img[$i] }}'); width: 80%; height: 200px;">
																				</div>
																		</div>
																		<div class="review-text w-100 d-block p-2" style="min-height: 100px;">
																				<div class="rating d-flex justify-content-center mb-1 mt-2">
																						<i class="fa fa-star text-warning"></i>
																						<i class="fa fa-star text-warning"></i>
																						<i class="fa fa-star text-warning"></i>
																						<i class="fa fa-star text-warning"></i>
																						<i class="fa fa-star text-warning"></i>
																						{{-- <i class="fa fa-star"></i> --}}
																				</div>
																				<h4 class="card-title mb-1 text-center">{{ $nama[$i] }}</h4>
																				<p class="text-center">{{ $review[$i] }}</p>
																		</div>
																</div>
														</div>
												@endfor

												{{-- end loop --}}
										</div>
								</div>
						</div>
				</div>
		</section>
		<!--  review end -->

		<div class="title8 mb-4 mt-5">
				<h4 style="text-transform: capitalize">Pilihan Perusahaan Pembiayaan</h4>
		</div>
		<!-- mitra kami slider start -->
		<section class="ratio_asos product b-g-light mb-5 pb-5 pt-3">
				<div class="container">
						<div class="row">
								<div class="col-12 slide-mitra-kami">
										@foreach ($mitras as $mitra)
												<div>
														<div class="card d-flex justify-content-center align-items-center px-3 py-2"
																style="width: 100px; height: 80px; padding: 2rem">
																<img src="{{ '/assets/images/custom/mitra/' . $mitra->gambar }}" alt="" class="img-mitra" />
														</div>
												</div>
										@endforeach
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
						<img src="{{ asset('assets') }}/images/why/tunggu-apa-lagi.webp" alt="" class="bg-img" />
						<div class="container">
								<div class="row">
										<div class="col">
												<div class="banner-contain">
														<h3>Tunggu apalagi ?</h3>
														<!-- <h3>food market</h3> -->
														<!-- <h4>special offer</h4> -->
														<a href="https://wa.me/6282322222023?text=halo%20admin%20,%20saya%20ingin%20informasi%20cara%20pengajuan%20kredit%20di%20blimoto"
																target="_blank" class="btn bg-basic btn-rounded fs-3 mt-3 px-5"><i class="fa fa-whatsapp"
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


		@php
				$link_bli = [
				    'https://www.youtube.com/embed/3g4hMdYp8Ug?si=hbiClKS_ibe4jOGH',
				    'https://www.youtube.com/embed/1QVGV5wEMU8?si=s4HPsOCR5ERGP5dg',
				    'https://www.youtube.com/embed/8atEqcpHgNU?si=PZcGD4U7H6XFJUHP',
				    'https://www.youtube.com/embed/7tDfPq0kzrs?si=klI_0aFQoVWsTeYu',
				    'https://www.youtube.com/embed/3g4hMdYp8Ug?si=60pAlHI_goBJaYo3',
				];
		@endphp

		@for ($i = 0; $i < 4; $i++)
				{{-- loop video pop up --}}
				<div class="modal modal-v-sec fade" id="dariblimoto{{ $i }}" role="dialog">
						<div class="modal-dialog modal-dialog-centered">
								<!-- Modal content-->
								<div class="modal-content">
										<iframe width="560" height="315" src="{{ $link_bli[$i] }}" title="YouTube video player"
												frameborder="0"
												allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
												allowfullscreen></iframe>
								</div>
						</div>
				</div>
				{{-- loop video pop up end --}}
		@endfor
@endsection




@push('script')
		<script>
				$(document).ready(function() {
						let lokasiUser = sessionStorage.getItem('lokasiUser');
						$(".id_lokasi").val(lokasiUser);
				});

				$("#dp_lainnya").hide();
				$("#dp_lainnya-check").click(function() {
						if ($(this).is(":checked")) {
								$("#dp_lainnya").show(100);
						} else {
								$("#dp_lainnya").hide(100);
						}
				});
		</script>
		@if ($errors->any())
				<script>
						var jsError = localStorage.getItem("jsError");
						localStorage.removeItem("jsError"); // Bersihkan error setelah diambil
						Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Terjadi kesalahan dalam pengisian formulir:',
								html: `
                <ul>
                    ${jsError ? '<li>' + jsError + '</li>' : ''}
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
						});

						$(document).ready(function() {
								setTimeout(function() {
										var element = $('#simulasi');
										if (element.length) {
												var offset = 300;
												var elementPosition = element.offset().top;
												$('html, body').animate({
														scrollTop: elementPosition - offset
												}, 'smooth');
										}
								}, 100);
						});
				</script>
		@endif

		<script src="{{ asset('/assets/js/custom/home.js') }}"></script>
@endpush


@push('css')
		<link rel="stylesheet" href="{{ asset('assets') }}/css/custom/home.css">
@endpush
