@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Detail Leasing</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">Home</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">detail motor </a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">detail leasing </a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->



		{{-- section logo leasing --}}
		<div class="container-fluid mb-5 mt-5">
				<div class="row">
						<div class="col-12 d-flex justify-content-center">
								<img src="{{ asset('assets') }}/images/custom/leasing/{{ $data[0]->gambar }}" alt="{{ $data[0]->gambar }}"
										srcset="">
						</div>
				</div>
				<div class="row mt-5">
						<div class="col-12 bg-basic p-4">
								<h3 class="text-center text-white">Opsi angsuran {{ $motor->nama }} terbaik untukmu hari ini !</h3>
						</div>
				</div>
		</div>


		{{-- section detail cicilan --}}
		<section class="container mb-5">
				<div class="row px-4">
						<div class="col-12">

								<ul>
										<li>
												<h4 class="text-doff">Filter By Tenor :</h4>
										</li>
										@foreach ($tenor as $t)
												<li>
														<a href="{{ request()->fullUrl() }}&tenor={{ $t->tenor }}"
																class="btn btn-sm {{ request()->get('tenor') != null ? (request()->get('tenor') == $t->tenor ? 'btn-basic' : 'btn-outline-basic') : 'btn-outline-basic' }} btn-rounded">Tenor
																{{ $t->tenor }}</a>
												</li>
										@endforeach

								</ul>

						</div>
						{{-- for loop --}}
						@foreach ($data as $d)
								<div class="col-12 cicilan-wrapper d-flex flex-column mt-3 p-3">
										<h4 class="text-doff fw-bold text-start">Cicilan:</h4>
										<h4 class="text-danger fw-bold text-start">{{ Str::rupiah($d->cicilan) }} x {{ $d->tenor }} Bulan</h4>
										<div class="d-flex justify-content-between align-content-end mt-4">
												<div class="d-flex align-content-end btn-wrapper">
														<a href="" class="cicilan-link bg-success fw-bold text-white"> <i class="fa fa-whatsapp"
																		aria-hidden="true"></i><span class="ms-2">Ajukan
																		Sekarang</span></a>
												</div>
												<div>
														<del class="text-doff text-end">DP Normal : {{ Str::rupiah($d->diskon_normal) }}</del>
														<h5 class="text-doff text-end">DP Diskon : {{ Str::rupiah($d->diskon) }}</h5>
												</div>
										</div>
								</div>
						@endforeach
						{{-- end --}}
				</div>
		</section>
@endsection
