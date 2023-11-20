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
																		<a class="text-white" href="javascript:void(0)">Promosi</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">Promosi</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->
		<section class="section-py-space my-3">
				<div class="title8 mt-5">
						<h4>Daftar Promo</h4>
				</div>
				<div class="container">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
								@php
										$img = ['PROMO GENIO.webp', 'PROMO PCX.webp', 'PROMO VARIO 160.webp'];
								@endphp

								@for ($i = 0; $i < 3; $i++)
										<div class="col">
												<div class="card">
														<img src="{{ asset('assets') }}/images/custom/promo/{{ $img[$i] }}" alt="..." />
														<div class="card-body">
																<div class="row">
																		<h5 class="card-title">
																				Program Sales Honda CBR150R September - Desember 2023
																		</h5>
																</div>
																<p class="card-text">
																		Diskon mulai dari Rp 1.000.000 untuk setiap pembelian Honda
																		CBR150R*
																</p>
														</div>
												</div>
										</div>
								@endfor


						</div>
				</div>
		</section>
@endsection
