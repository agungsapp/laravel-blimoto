@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Promosi</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">Home</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">detail promosi</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<!--section start-->
		<section class="blog-detail-page section-big-py-space ratio2_3">
				<div class="container">
						<div class="row section-big-pb-space">
								<div class="col-sm-12 blog-detail">
										<div class="creative-card">
												<img src="{{ asset('assets') }}/images/custom/promo/{{ $promo->thumbnail }}" class="img-fluid w-100"
														alt="blog" />
												<h3>
														{{ $promo->judul }}.
												</h3>
												<ul class="post-social">
														<li>
																@if ($promo->tanggal_promo)
																		Berlaku dari tanggal
																		<strong>{{ \Carbon\Carbon::parse($promo->tanggal_promo)->translatedFormat('d F Y') }}</strong> <br />
																		hingga <strong>{{ \Carbon\Carbon::parse($promo->tanggal_berakhir)->translatedFormat('d F Y') }}</strong>
																@else
																		Tanggal tidak tersedia
																@endif

														</li>

												</ul>
												<div class="body">
														{!! $promo->deskripsi !!}
												</div>
												<div class="footer mt-5">
														<a href="https://wa.me/{{ $promo->nomor ?? '6282322222023' }}?text=Halo%20Admin,%20apakah%20promo%20ini%20masih%20ada?"
																target="_blank" class="btn btn-danger"><i class="fa fa-whatsapp" aria-hidden="true"></i> <span
																		class="ms-2">Hubungi
																		Sekarang</span></a>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!--Section ends-->

		<!-- recent blog start -->
		<section class="section-big-py-space blog-page">
				<div class="container">
						<h2 class="title8 mb-2">Promo Yang Lain</h2>
						<div class="col-xl-12">

								@foreach ($recents as $recent)
										{{-- @dd($recent->thumbnail) --}}
										<div class="row blog-media">
												<div class="col-xl-6 col-sm-12">
														<div class="blog-left">
																<a href="{{ route('promosi.show', $recent->id) }}">
																		<img {{-- style="width: 120px !important" --}} src="{{ asset('assets') }}/images/custom/promo/{{ $recent->thumbnail }}"
																				class="img-fluid w-100" alt="{{ $recent->thumbnail }}" /></a>
																<div class="date-label">26 nov 2019</div>
														</div>
												</div>
												<div class="col-xl-6 col-sm-12">
														<div class="blog-right">
																<div>
																		<a href="{{ route('promosi.show', $recent->id) }}">
																				<h4>
																						{{ $recent->judul }}
																				</h4>
																		</a>
																		<p>
																				{{ strlen($recent->cuplikan) > 50 ? substr($recent->cuplikan, 0, 50) . '...' : $recent->cuplikan }}
																		</p>
																</div>
														</div>
												</div>
										</div>
								@endforeach

						</div>
				</div>
		</section>
		<!-- recent blog end -->
@endsection
