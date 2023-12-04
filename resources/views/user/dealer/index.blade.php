@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Motor</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">motor</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">dealer</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->
		<!-- dealer -->
		<section class="section-py-space my-3">
				<div class="title8 mt-5">
						<h4>Cari Dealer</h4>
				</div>

				<div class="container py-4">
						<div class="input-block">
								<div class="input-box">

										<form class="form-inline" action="{{ route('dealer.index') }}" method="GET">
												<div class="input-group">
														{{-- <span class="input-group-text" style="background-color: red;">

														</span> --}}
														<input type="search" class="form-control" placeholder="Cari dealer Anda!" name="keyword">
														<div class="input-group-text bg-basic" style="border: 1px solid red;">
																<select class="form-select" name="lokasi">
																		<option {{ $lokasi == 1 ? 'selected' : '' }} value="1">Jakarta Selatan</option>
																		<option {{ $lokasi == 2 ? 'selected' : '' }} value="2">Bogor</option>
																		<option {{ $lokasi == 3 ? 'selected' : '' }} value="3">Depok</option>
																		<option {{ $lokasi == 4 ? 'selected' : '' }} value="4">Tangerang</option>
																		<option {{ $lokasi == 5 ? 'selected' : '' }} value="5">Bekasi</option>
																</select>
														</div>
														<button type="submit" class="btn btn-basic"><i class="fa fa-search text-white"></i><span
																		class="ms-2">Cari</span></button>
												</div>
										</form>

								</div>
						</div>
				</div>

				<div class="container">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
								@foreach ($dealers as $d)
										<div class="col">
												<div class="card">
														<div style="background-image: url('/assets/images/dealer/{{ $d->gambar }}')" class="img-dealer"></div>
														{{-- <img src="" class="card-img-top img-fluid" alt="..." /> --}}
														<div style="min-height: 170px;" class="card-body">
																<div class="row">
																		<div class="col">
																				<h5 class="card-title">{{ $d->nama }}</h5>
																		</div>
																		<div class="col-2">
																				<a href="{{ $d->link_map }}" target="_blank">
																						<i class="fa fa-location-arrow fs-5" aria-hidden="true"></i>
																				</a>
																		</div>
																</div>
																<p class="card-text">
																		{{ $d->alamat }}
																</p>
																{{-- <p class="card-text mt-2">
																		<a href="tel:0361487130">Telp: 0361487130</a>
																</p> --}}
														</div>
												</div>
										</div>
								@endforeach

						</div>
				</div>
		</section>
@endsection
