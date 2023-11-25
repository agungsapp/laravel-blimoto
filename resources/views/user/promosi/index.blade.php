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
		<section class="section-py-space my-3" style="height: 1000px">
				<div class="title8 mt-5">
						<h4>Daftar Promo</h4>
				</div>
				<div class="container">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
								@php
										$promo = collect([
										    [
										        'judul' => 'Honda Genio - Style yang Autentik',
										        'deskripsi' => 'Bawa pulang kenyamanan dan gaya dengan Honda Genio. Nikmati diskon istimewa hingga jutaan Rupiah selama periode September-Desember 2023. Promo spesial ini hanya berlaku bulan ini, jangan lewatkan!',
										        'gambar' => 'PROMO GENIO.webp',
										    ],
										    [
										        'judul' => 'Honda PCX - Tampil Terbaik, Hanya PCX',
										        'deskripsi' => 'Bersiaplah untuk menguasai jalan raya dengan Honda PCX dan nikmati diskon hingga Rp 1.500.000! Periode promo dari September-Desember 2023. Ingat, kesempatan ini hanya datang sekali, eksklusif hanya untuk bulan ini!',
										        'gambar' => 'PROMO PCX.webp',
										    ],
										    [
										        'judul' => 'Honda Vario - Urban Ride, Gaya Hidup Bebas',
										        'deskripsi' => 'Upgrade gaya urban Anda dengan Honda Vario dan rebut diskon menarik hingga Rp 1.600.000. Penawaran ini berlangsung dari September hingga Desember 2023. Jangan lewatkan, diskon spesial hanya tersedia di bulan ini!',
										        'gambar' => 'PROMO VARIO 160.webp',
										    ],
										])->map(function ($item) {
										    return (object) $item;
										});

								@endphp

								@foreach ($promo as $p)
										<div class="col">
												<div class="card">
														<img src="{{ asset('assets') }}/images/custom/promo/{{ $p->gambar }}" alt="..." />
														<div class="card-body">
																<div class="row">
																		<h5 class="card-title">
																				{{ $p->judul }}
																		</h5>
																</div>
																<p class="card-text">
																		{{ $p->deskripsi }}
																</p>
														</div>
												</div>
										</div>
								@endforeach


						</div>
				</div>
		</section>
@endsection
