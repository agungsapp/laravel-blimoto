@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Kredit</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">Kredit</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">info-leasing</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->


		<section class="mt-5">
				<div class="container">
						<div class="row">
								<div class="col-12">
										<h4 class="f-w-300 text-black">Leasing yang bekerja sama dengan kami</h4>
								</div>
								<div class="col-12 d-flex justify-content-between">
										{{-- for loop --}}

										@php
												$image = ['2023-10-11_W1.png', '2023-10-11_W4.webp', '2023-10-11_W3.webp', '2023-10-11_w2.webp'];
												$name = ['FIF Group', 'Adira Finance', 'MCF', 'OTO'];
										@endphp

										@for ($i = 0; $i < 4; $i++)
												<div class="info-leasing-wrapper py-4">
														<div class="img-info-leasing position-relative">
																<img class="img-fluid" src="{{ asset('assets') }}/images/custom/leasing/{{ $image[$i] }}"
																		alt="{{ $image[$i] }}">

																<div class="info-leasing-overlay w-100 h-100 d-flex justify-content-center align-items-center">
																		<a href="#" class="f-w-400 fs-6 btn-basic btn rounded-lg px-4 py-0 text-white">LIHAT INFO</a>
																</div>

														</div>
														<div class="py-3">
																<p class="fw-bold fs-6 text-center text-black">{{ $name[$i] }}</p>
														</div>
												</div>
										@endfor

										{{-- end loop --}}
								</div>
						</div>
				</div>
		</section>
@endsection


@push('css')
		<link rel="stylesheet" href="{{ asset('assets') }}/css/custom/info-leasing.css">
@endpush



{{-- 
	sampe belum menambahkan modal 

	next : 
	tambahin modal intergrasu sama modal bostrap bisa di center .
	--}}
