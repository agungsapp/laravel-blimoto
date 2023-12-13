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
																		<a class="text-white" href="javascript:void(0)">Brosur Motor</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<!-- brosur download start -->
		<section class="section-download-brosur mb-5 mt-5 bg-white py-4">
				<div class="container">
						<div class="row mb-3">
								<div class="col-12">
										<h4 class="text-black">Download Brosur Motor</h4>
								</div>
						</div>

						<div class="row">
								<div class="col-5">
										<form action="{{ route('brosur.index') }}" method="get">
												@csrf
												<div class="input-group mb-3">
														<input type="text" class="form-control" name="search" placeholder="Cari brosur motor impian !"
																value="{{ $pencarian }}" aria-label="Recipient's username" aria-describedby="button-addon2">
														<button class="btn btn-basic" type="submit" id="button-addon2">Cari</button>
												</div>
										</form>
								</div>
						</div>


						{{-- display none --}}
						<div class="row d-none">
								<div class="col-5 col-md-3">
										<div class="card border-0 p-5 py-3"
												style="
                background-color: #fff2f2;
                display: flex;
                justify-content: center;
                align-items: center;
              ">
												<div class="rounded-circle p-0"
														style="
                  background-color: #ffe4e4;
                  width: 100px;
                  height: 100px;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                ">
														<i class="fa fa-file-pdf-o fs-1" aria-hidden="true" style="color: #dd0202"></i>
												</div>
										</div>
								</div>
								<div class="col-7 col-md-3">
										{{-- ======== select ============ --}}
										<div class="form-group">
												<label for="selections" class="mb-0" style="font-size: 12px">Pilih Merek</label>
												<select id="selections" class="js-example-basic-single form-select form-select-sm" multiple="multiple"
														style="width: 100%" name="merk">
												</select>
										</div>
										{{-- ========== select ============ --}}
										<button class="btn bg-basic w-100 text-white">
												Download Brosur <i class="fa fa-download" aria-hidden="true"></i>
										</button>
										<div class="d-flex justify-content-between mt-2">
												<p style="font-size: 8px">
														<i class="fa fa-check text-success" aria-hidden="true"></i>
														<span class="text-black">Spesifikasi Mendetail</span>
												</p>
												<p style="font-size: 8px">
														<i class="fa fa-check text-success" aria-hidden="true"></i>
														<span class="text-black">Format PDF</span>
												</p>
												<p style="font-size: 8px">
														<i class="fa fa-check text-success" aria-hidden="true"></i>
														<span class="text-black">Brosur Resmi</span>
												</p>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- brosur download end -->

		<div class="title8 mb-4">
				<h4 style="text-transform: capitalize">Brosur Motor Terbaik</h4>
		</div>
		<!-- brosur motor populer slider -->
		<section id="brosur-motor-populer" class="ratio_asos product b-g-light mb-5 pb-5 pt-3">
				<div class="container">
						<div class="row">
								<div class="col-12 slide-download-populer">

										@foreach ($motors as $m)
												<div class="d-flex justify-content-center align-items-center">
														<div class="card border-0">
																<img src="{{ asset('assets') }}/images/detail-motor/{{ $m->image }}" class="card-img-top"
																		alt="{{ $m->id }}" />
																<div class="card-body">
																		<h5 class="card-title">{{ $m->nama }}</h5>
																		<p class="card-text">{{ Str::rupiah($m->harga) }}</p>
																		<a href="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/download/{{ $m->brosur }}" target="_blank"
																				class="btn bg-basic w-100 mt-2 text-white">Download Brosur</a>
																</div>
														</div>
												</div>
										@endforeach

								</div>
						</div>
				</div>
		</section>
		<!-- brosur motor populer slider -->



		<div class="title8 mb-4">
				<h4 style="text-transform: capitalize">Brosur Motor Populer</h4>
		</div>
		<!-- brosur motor populer slider -->
		<section id="brosur-motor-populer" class="ratio_asos product b-g-light mb-5 pb-5 pt-3">
				<div class="container">
						<div class="row">
								<div class="col-12 slide-download-populer">

										@foreach ($populer as $t)
												<div class="d-flex justify-content-center align-items-center">
														<div class="card border-0">
																<img src="{{ asset('assets') }}/images/detail-motor/{{ $t->image }}" class="card-img-top"
																		alt="{{ $t->id }}" />
																<div class="card-body">
																		<h5 class="card-title">{{ $t->nama }}</h5>
																		<p class="card-text">{{ Str::rupiah($t->harga) }}</p>
																		<a href="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/uploads/download/{{ $t->brosur }}"
																				target="_blank" class="btn bg-basic w-100 mt-2 text-white">Download Brosur</a>
																</div>
														</div>
												</div>
										@endforeach

								</div>
						</div>
				</div>
		</section>
		<!-- brosur motor populer slider -->


		<div class="title8 mb-4">
				<h4 style="text-transform: capitalize">Mitra Kami</h4>
		</div>
		<!-- mitra kami slider start -->
		<section class="ratio_asos product b-g-light mb-5 pb-5 pt-3">
				<div class="container">
						<div class="row">
								<div class="col-12 slide-mitra-kami">

										@php
												$links = ['https://imgcdn.oto.com/brandlogo/motor/honda-1652082402.png', 'https://imgcdn.oto.com/brandlogo/motor/yamaha-1651737896.png', 'https://imgcdn.oto.com/brandlogo/motor/suzuki-1652082502.png', 'https://imgcdn.oto.com/brandlogo/motor/vespa-1652082723.png', 'https://imgcdn.oto.com/brandlogo/motor/royal-enfield-1651738163.png', 'https://imgcdn.oto.com/brandlogo/motor/triumph.png', 'https://imgcdn.oto.com/brandlogo/motor/bajaj.png', 'https://imgcdn.oto.com/brandlogo/motor/sym-1652082655.png', 'https://imgcdn.oto.com/brandlogo/motor/mv-agusta.png', 'https://imgcdn.oto.com/brandlogo/motor/kymco.png', 'https://imgcdn.oto.com/brandlogo/motor/piaggio-1652082560.png', 'https://imgcdn.oto.com/brandlogo/motor/diablo.png', 'https://imgcdn.oto.com/brandlogo/motor/sm-sport-1652082624.png'];
										@endphp

										@foreach ($links as $link)
												<div class="d-flex justify-content-center align-items-center">
														<div class="card d-flex justify-content-center align-items-center px-3 py-2"
																style="width: 100px; height: 80px; padding: 2rem">
																<img src="{{ $link }}" alt="" class="img-mitra" />
														</div>
												</div>
										@endforeach
								</div>
						</div>
				</div>
		</section>
		<!-- mitra kami slider end -->
@endsection
