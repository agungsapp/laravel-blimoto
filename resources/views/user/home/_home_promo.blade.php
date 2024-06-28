<div class="container-home-promo">
		<div class="style-border-home-promo">
				<!--temukan kendaraanmu start-->
				<div class="">
						<div class="tab-product-main">
								<div class="tab-prodcut-contain">
										<ul class="tabs mb-4">
												<li class="current"><a href="tab-1">DISKON TERBAIK</a></li>
												<li class=""><a href="tab-2">DP TERMURAH</a></li>
												<li class=""><a href="tab-3">HARGA TERBAWAH</a></li>
												<li class=""><a href="tab-4">ANGSURAN RINGAN</a></li>
												<!-- <li class=""><a href="tab-5">toys</a></li>
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																										<li class=""><a href="tab-6">books</a></li> -->
										</ul>
								</div>
						</div>
				</div>

				<!-- media tab start -->
				<div class="ratio_40 section-pb-space">
						<div class="custom-container product">
								<div class="row">
										<div class="col pr-0">
												<div class="theme-tab product">
														<div class="tab-content-cls">
																<!-- content tab 1 best diskon -->
																<div id="tab-1" class="tab-content active default">
																		<div class="product-slide-5 product-m no-arrow">
																				<!-- custom card produk box for loop -->
																				@foreach ($best1 as $item1)
																						<div>
																								<div class="product-box">
																										<div class="product-imgbox">
																												<div class="product-front">
																														<a href="#">
																																<img src="{{ asset('assets') }}/images/detail-motor/{{ $item1->image }}"
																																		class="img-fluid" alt="{{ $item1->image }}" />
																														</a>
																												</div>
																												{{-- <button type="button" class="btn btn-outline btn-cart">Lihat Promo</button> --}}
																												<div class="best-label" style="border-radius: 19px 0 19px 0;">
																														<div>Best Diskon</div>
																												</div>
																										</div>
																										<div class="product-detail product-detail2">
																												<a href="#">
																														<h3>{{ $item1->nama }}</h3>
																												</a>
																												<div class="mt-2">
																														<div class="d-flex justify-content-between">
																																<p class="text-doff">Diskon promo </p>
																																<p class="text-basic fw-bold">{{ Str::rupiah($item1->diskon_promo ?? '0') }}</p>
																														</div>
																														<div class="d-flex justify-content-between">
																																<p class="text-doff">Diskon normal </p>
																																<del class="text-basic">{{ Str::rupiah($item1->diskon ?? '0') }}</del>
																														</div>
																												</div>
																												<form action="{{ route('detail-motor') }}" method="GET">
																														@csrf
																														<input class="id_lokasi" type="hidden" name="id_lokasi" value="1">
																														<input type="hidden" name="id_motor" value="{{ $item1->id }}">
																														<button type="submit" class="btn btn-sm btn-danger d-block w-100 py-2">Lihat Diskon
																																Terbaik</button>
																												</form>
																										</div>
																								</div>
																						</div>
																				@endforeach
																				<!-- custom card produk box for loop end -->
																		</div>
																</div>
																<!-- content tab 2 best dp termurah -->
																<div id="tab-2" class="tab-content">
																		<div class="product-slide-5 product-m no-arrow">
																				<!-- custom card produk box for loop -->
																				@foreach ($best2 as $item2)
																						<div>
																								<div class="product-box">
																										<div class="product-imgbox">
																												<div class="product-front">
																														<a href="#">
																																<img src="{{ asset('assets') }}/images/detail-motor/{{ $item2->image }}"
																																		class="img-fluid" alt="{{ $item2->image }}" />
																														</a>
																												</div>
																												<div class="best-label" style="border-radius: 19px 0 19px 0;">
																														<div>Best DP</div>
																												</div>
																										</div>
																										<div class="product-detail product-detail2">
																												<a href="#">
																														<h3>{{ $item2->nama }}</h3>
																												</a>
																												<div class="mt-2">
																														<div class="d-flex justify-content-between">
																																<p class="text-doff text-start">DP Normal </p>
																																<del class="text-basic">{{ Str::rupiah($item2->dp ?? '0') }}</del>
																														</div>
																														<div class="d-flex justify-content-between">
																																<p class="text-doff text-start">Diskon </p>
																																<p class="text-basic fw-bold">{{ Str::rupiah($item2->diskon_promo ?? '0') }}</p>
																														</div>
																														<div class="d-flex justify-content-between">
																																<p class="text-doff text-start">DP Bayar </p>
																																<p class="text-basic fw-bold">{{ Str::rupiah($item2->dp - $item2->diskon_promo) }}
																																</p>
																														</div>
																												</div>
																												<form action="{{ route('detail-motor') }}" method="GET">
																														@csrf
																														<input type="hidden" name="id_lokasi" value="">
																														<input type="hidden" name="id_motor" value="{{ $item2->id }}">
																														<button type="submit" class="btn btn-sm btn-danger d-block w-100 py-2">Lihat DP
																																Termurah</button>
																												</form>
																										</div>
																								</div>
																						</div>
																				@endforeach
																				<!-- custom card produk box for loop end -->
																		</div>
																</div>

																<!-- content tab 2 best dp -->
																<div id="tab-3" class="tab-content">
																		<div class="product-slide-5 product-m no-arrow">
																				<!-- custom card produk box for loop -->
																				@foreach ($best3 as $item3)
																						<div>
																								<div class="product-box">
																										<div class="product-imgbox">
																												<div class="product-front">
																														<a href="#">
																																<img src="{{ asset('assets') }}/images/detail-motor/{{ $item3->image }}"
																																		class="img-fluid" alt="{{ $item3->image }}" />
																														</a>
																												</div>
																												<div class="best-label" style="border-radius: 19px 0 19px 0;">
																														<div>Best Termurah</div>
																												</div>
																										</div>
																										<div class="product-detail product-detail2">
																												<a href="#">
																														<h3>{{ $item3->nama }}</h3>
																												</a>
																												<div class="mt-2">
																														<div class="d-flex justify-content-between">
																																<p class="text-doff">Harga OTR </p>
																																<p class="text-basic fw-bold">
																																		{{ Str::rupiah($item3->motorKota[0]->harga_otr ?? '0') }}
																																</p>
																														</div>
																														<div class="d-flex justify-content-between">
																																<p class="text-doff">Diskon promo </p>
																																<p class="text-basic fw-bold">
																																		{{ Str::rupiah($item3->diskon_promo ?? '0') }}
																																</p>
																														</div>
																														<div class="d-flex justify-content-between">
																																<p class="text-doff">Diskon normal </p>
																																<del class="text-basic">{{ Str::rupiah($item3->diskon ?? '0') }}</del>
																														</div>
																												</div>
																												<form action="{{ route('detail-motor') }}" method="GET">
																														@csrf
																														<input type="hidden" name="id_lokasi" value="">
																														<input type="hidden" name="id_motor" value="{{ $item3->id }}">
																														<button type="submit" class="btn btn-sm btn-danger d-block w-100 py-2">Lihat Harga
																																Terbawah</button>
																												</form>
																										</div>
																								</div>
																						</div>
																				@endforeach
																				<!-- custom card produk box for loop end -->
																		</div>
																</div>

																<!-- content tab 4 best dp -->
																<div id="tab-4" class="tab-content">
																		<div class="product-slide-5 product-m no-arrow">
																				<!-- custom card produk box for loop -->
																				@foreach ($best4 as $item4)
																						<div>
																								<div class="product-box">
																										<div class="product-imgbox">
																												<div class="product-front">
																														<a href="#">
																																<img src="{{ asset('assets') }}/images/detail-motor/{{ $item4->image }}"
																																		class="img-fluid" alt="{{ $item4->image }}" />
																														</a>
																												</div>
																												<div class="best-label" style="border-radius: 19px 0 19px 0;">
																														<div>Best Termurah</div>
																												</div>
																										</div>
																										<div class="product-detail product-detail2">
																												<a href="#">
																														<h3>{{ $item4->nama }}</h3>
																												</a>
																												<div class="mt-2">
																														<div class="d-flex justify-content-between">
																																<p class="text-doff">Harga OTR </p>
																																<p class="text-basic fw-bold">
																																		{{ Str::rupiah($item4->motorKota[0]->harga_otr ?? 0) }}
																																</p>
																														</div>
																														<div class="d-flex justify-content-between">
																																<p class="text-doff">DP normal </p>
																																<del class="text-basic">{{ Str::rupiah($item4->dp) }}</del>
																														</div>
																														<div class="d-flex justify-content-between">
																																<p class="text-doff">Diskon </p>
																																<p class="text-basic fw-bold">
																																		{{ Str::rupiah($item4->diskon ?? '0') }}
																																</p>
																														</div>

																														<div class="d-flex justify-content-between">
																																<p class="text-doff">DP Bayar </p>
																																<p class="text-basic fw-bold">
																																		{{ Str::rupiah($item4->dp - $item4->diskon_promo) }}
																																</p>
																														</div>
																														<div class="d-flex justify-content-between">
																																<p class="text-doff">Cicilan. </p>
																																<p class="text-basic fw-bold">
																																		{{ Str::rupiah($item4->cicilan) . ' x ' . $item4->tenor }}
																																</p>
																														</div>
																														<div class="d-flex justify-content-between">
																																<p class="text-doff">Total Bayar </p>
																																<p class="text-basic fw-bold">
																																		{{ Str::rupiah($item4->cicilan * $item4->tenor + $item4->dp) }}
																																</p>
																														</div>
																												</div>
																												<form action="{{ route('detail-motor') }}" method="GET">
																														@csrf
																														<input type="hidden" name="id_lokasi" value="">
																														<input type="hidden" name="id_motor" value="{{ $item4->id }}">
																														<button type="submit" class="btn btn-sm btn-danger d-block w-100 py-2">Lihat Angsuran
																																Ringan</button>
																												</form>
																										</div>
																								</div>
																						</div>
																				@endforeach
																				<!-- custom card produk box for loop end -->
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
				<!-- media tab end -->
				<!--temukan kendaraanmu end-->
		</div>
</div>
