@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Cari Diskon</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">home</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">cari diskon</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		{{-- =============================NEW=========================== --}}

		<div class="container-fluid mt-5">
				<div class="row px-4">
						<div class="col-12 col-md-4 col-lg-4 col-xl-3">
								<div class="row bg-white px-2 py-3" style="max-width: 450px">
										<div class="d-flex justify-content-between">
												<h3 class="fw-bold text-black">{{ $data['motor']['nama'] }}</h3>
												<div class="fs-5 nama-motor"><i class="fa text-danger fa-map-marker" aria-hidden="true"></i>
														<span class="ms-2">{{ $lokasi }}</span>
												</div>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Harga OTR</h6>
												<p class="nama-motor" style="font-weight: bold; color: red;">{{ Str::rupiah($data['motor']['otr']) }}</p>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="product-title nama-motor">Metode Pembayaran</h6>
												<span class="badge bg-success nama-motor">Kredit</span>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Tipe</h6>
												<p class="nama-motor">{{ $data['motor']['type'] }}</p>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Merk</h6>
												<p class="nama-motor">{{ $data['motor']['merk'] }}</p>
										</div>
										<div class="d-flex justify-content-between mt-2">
												<h6 class="fw-bold text-doff nama-motor">Stock</h6>
												<p class="nama-motor" style="font-weight: bold; color: green;">Tersedia</p>
										</div>
								</div>
								<div class="product-slick">
										@foreach ($data['motor']['detail_motor'] as $dm)
												<div>
														<img src="/assets/images/detail-motor/{{ $dm['gambar'] }}" alt="{{ $dm['gambar'] }}"
																class="img-fluid image_zoom_cls-0">
												</div>
										@endforeach
								</div>
								<div class="row">
										<div class="col-12 p-0">
												<div class="p-3">
														<h4 class="fw-bold bg-basic p-3 text-center text-white">Pilih warna favorit kamu disini</h4>
												</div>
												<div class="slider-nav">
														@foreach ($data['motor']['detail_motor'] as $dm)
																<div>
																		<img src="/assets/images/detail-motor/{{ $dm['gambar'] }}" alt="{{ $dm['gambar'] }}"
																				class="img-fluid image_zoom_cls-0">
																</div>
														@endforeach
														{{-- <div><img src="/assets/images/detail-color/1.webp" alt="1.webp" class="img-fluid">
																								</div> --}}
												</div>
										</div>
								</div>
						</div>
						<div class="col-12 col-md-8 col-lg-8 col-xl-9 mt-lg-0">
								<div class="owl-carousel-leasing d-flex align-items-center row mt-3 overflow-hidden">

										@foreach ($data['cicilan_motor'] as $a)
												<div class="card item" style=" margin-left: 10px;">
														{{-- background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp'); --}}
														<img style="min-height: 130px;" src="{{ asset('assets') }}/images/custom/leasing/{{ $a['gambar'] }}"
																class="card-img-top" alt="{{ $a['gambar'] }}">
														<ul class="list-group list-group-flush">
																<li class="list-group-item d-flex justify-content-between">
																		<p>DP</p>
																		<p>{{ Str::rupiah($a['dp']) }}</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>Diskon</p>
																		<p style="font-weight: bold; color: red;">{{ Str::rupiah($a['diskon']) }}</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>DP Bayar</p>
																		<p style="font-weight: bold; color: red;">{{ Str::rupiah($a['dp_bayar']) }}</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>Angsuran</p>
																		<p style="font-weight: bold; color: red;">{{ Str::rupiah($a['angsuran']) }}</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>Tenor</p>
																		<p>{{ $a['tenor'] }} Bulan</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>Total Bayar</p>
																		<p style="font-weight: bold; color: red;">{{ Str::rupiah($a['total_bayar']) }}</p>
																</li>
														</ul>
														<div class="card-body d-flex justify-content-center">
																<a href="https://wa.me/6282322222023?text=Hai,%20Admin%20saya%20ingin%20informasi%20lebih%20lanjut%20mengenai%20unit%20kendaraan%20berikut.%20%0A%0AMerk%20:%20{{ $data['motor']['merk'] }}%0AKategori%20:%20{{ $data['motor']['type'] }}%0AType%20:%20{{ $data['motor']['nama'] }}%0Aleasing%20:%20{{ $a['nama_leasing'] }}%20,%20%0ATenor%20:%20{{ $a['tenor'] }}%20bulan,%0ADP%20pembayaran%20:%20{{ Str::rupiah($a['dp']) }}."
																		target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp" aria-hidden="true"></i><span
																				class="ms-2">Ajukan Sekarang</span></a>
														</div>
												</div>
										@endforeach
								</div>
								{{-- <div class="row mt-4 px-2">
										<div class="pro-group">
												<div class="d-flex align-items-baseline gap-5">
														<h6 class="product-title">Promo berlaku sampai dengan :</h6>
														<p style="border-radius: 10px;" class="btn btn-sm bg-doff text-white">{{ date('d F Y') }}</p>
												</div>
												<div class="simply-countdown" id="timer">
												</div>
										</div>
								</div> --}}
						</div>
				</div>
		</div>

		<hr>

		{{-- banner rekomendasi  --}}
		<section class="container-fluid">
				<div class="row">
						<div class="col-12 d-flex justify-content-center">
								<img class="img-fluid" src="{{ asset('assets') }}/images/custom/banner-Rekomendasi.webp"
										alt="banner-Rekomendasi.webp" srcset="">
						</div>
				</div>
		</section>
		<hr>

		@foreach ($rekomendasi as $r)
				@php
						$rm = $r['motor'];
				@endphp
				<div class="container-fluid mb-5 mt-5">
						<div class="row px-4">
								<div class="col-12 col-md-4 col-lg-4 col-xl-3">
										<div class="row bg-white px-2 py-3" style="max-width: 450px">
												<div class="d-flex justify-content-between">
														<h3 class="fw-bold text-black">{{ $data['motor']['nama'] }}</h3>
														<div class="fs-5 nama-motor"><i class="fa text-danger fa-map-marker" aria-hidden="true"></i>
																<span class="ms-2">{{ $lokasi }}</span>
														</div>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Harga OTR</h6>
														<p class="nama-motor" style="font-weight: bold; color: red;">{{ Str::rupiah($rm['otr']) }}</p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="product-title nama-motor">Metode Pembayaran</h6>
														<span class="badge bg-success nama-motor">Kredit</span>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Tipe</h6>
														<p class="nama-motor">{{ $rm['type'] }}</p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Merk</h6>
														<p class="nama-motor">{{ $rm['merk'] }}</p>
												</div>
												<div class="d-flex justify-content-between mt-2">
														<h6 class="fw-bold text-doff nama-motor">Stock</h6>
														<p class="nama-motor" style="font-weight: bold; color: green;">Tersedia</p>
												</div>
										</div>
										<div class="product-slick">

												@foreach ($rm['detail_motor'] as $dm)
														<div>
																<img src="/assets/images/detail-motor/{{ $dm['gambar'] }}" alt="{{ $dm['gambar'] }}"
																		class="img-fluid image_zoom_cls-0">
														</div>
												@endforeach

										</div>
										<div class="row">
												<div class="col-12 p-0">
														<div class="p-3">
																<h4 class="fw-bold bg-basic p-3 text-center text-white">Pilih warna favorit kamu disini</h4>
														</div>
														<div class="slider-nav">
																@foreach ($rm['detail_motor'] as $dm)
																		<div>
																				<img src="/assets/images/detail-motor/{{ $dm['gambar'] }}" alt="{{ $dm['gambar'] }}"
																						class="img-fluid image_zoom_cls-0">
																		</div>
																@endforeach
														</div>
												</div>
										</div>
								</div>
								<div
										class="col-12 col-md-8 col-lg-8 col-xl-9 mt-lg-0 owl-carousel-leasing d-flex align-items-center mt-3 overflow-hidden">

										@foreach ($r['cicilan_motor'] as $rc)
												<div class="card item" style=" margin-left: 10px; ">
														{{-- background: url('{{ asset('assets') }}/images/custom/leasing/bg-leasing.webp'); --}}
														<img style="min-height: 130px;" src="{{ asset('assets') }}/images/custom/leasing/{{ $rc['gambar'] }}"
																class="card-img-top" alt="{{ $rc['gambar'] }}">
														<ul class="list-group list-group-flush">
																<li class="list-group-item d-flex justify-content-between">
																		<p>DP</p>
																		<p>{{ Str::rupiah($rc['dp']) }}</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>Diskon</p>
																		<p>{{ Str::rupiah($rc['diskon']) }}</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>DP Bayar</p>
																		<p style="font-weight: bold; color: red;">{{ Str::rupiah($rc['dp_bayar']) }}</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>Angsuran</p>
																		<p style="font-weight: bold; color: red;">{{ Str::rupiah($rc['angsuran']) }}</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>Tenor</p>
																		<p>{{ $rc['tenor'] }} Bulan</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>Potongan Tenor</p>
																		<p>{{ $rc['potongan_tenor'] }} Bulan</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>Total Tenor</p>
																		<p>{{ $rc['total_tenor'] }} Bulan</p>
																</li>
																<li class="list-group-item d-flex justify-content-between">
																		<p>Total Bayar</p>
																		<p style="font-weight: bold; color: red;">{{ Str::rupiah($rc['total_bayar']) }}</p>
																</li>
														</ul>
														<div class="card-body d-flex justify-content-center">
																<a href="https://wa.me/6282322222023?text=Hai,%20Admin%20saya%20ingin%20informasi%20lebih%20lanjut%20mengenai%20unit%20kendaraan%20berikut.%20%0A%0AMerk%20:%20{{ $rm['merk'] }}%0AKategori%20:%20{{ $rm['type'] }}%0AType%20:%20{{ $rm['nama'] }}%0Aleasing%20:%20{{ $rc['nama_leasing'] }}%20,%20%0ATenor%20:%20{{ $rc['tenor'] }}%20bulan,%0ADP%20pembayaran%20:%20{{ Str::rupiah($rc['dp']) }}."
																		target="_blank" class="btn btn-success w-100"><i class="fa fa-whatsapp" aria-hidden="true"></i><span
																				class="ms-2">Ajukan Sekarang</span></a>
														</div>
												</div>
										@endforeach

								</div>
						</div>
				</div>

				<hr>
		@endforeach

		{{-- ====================== OLD DELETED ============================== --}}
@endsection


@push('script')
		<script>
				$('#id_lokasi').val(window.idLokasi)


				// get current date
				let now = new Date();
				let year = now.getFullYear();
				let month = now.getMonth() + 1; // JavaScript months are 0-11
				let day = now.getDate();



				// count down :
				simplyCountdown('#timer', {
						year: year, // required
						month: month, // required
						day: day, // required
						hours: 23, // Default is 0 [0-23] integer
						minutes: 0, // Default is 0 [0-59] integer
						seconds: 0, // Default is 0 [0-59] integer
						words: { //words displayed into the countdown
								days: {
										singular: 'Hari',
										plural: 'Hari'
								},
								hours: {
										singular: 'Jam',
										plural: 'Jam'
								},
								minutes: {
										singular: 'Menit',
										plural: 'Menit'
								},
								seconds: {
										singular: 'Detik',
										plural: 'Detik'
								}
						},
				})
				console.log("running owl-carousel-leasing")

				$(document).ready(function() {

				});


				var owl = $('.leasing-owl-carousel');
				owl.owlCarousel({
						items: 4,
						loop: true,
						margin: 10,
						autoplay: true,
						autoplayTimeout: 1000,
						autoplayHoverPause: true
				});
				$('.play').on('click', function() {
						owl.trigger('play.owl.autoplay', [1000])
				})
				$('.stop').on('click', function() {
						owl.trigger('stop.owl.autoplay')
				})
		</script>
@endpush
