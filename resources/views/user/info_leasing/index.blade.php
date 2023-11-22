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
																		<button type="button"
																				class="f-w-400 size-lihat-info btn-basic btn px-lg-4 rounded-lg px-2 py-0 text-white"
																				data-bs-toggle="modal" data-bs-target="#ModalLeasing{{ $i }}">
																				LIHAT INFO
																		</button>
																</div>

														</div>
														<div class="py-3">
																<p class="fw-bold fs-lg-6 text-center text-black">{{ $name[$i] }}</p>
														</div>
												</div>
										@endfor

										{{-- end loop --}}
								</div>
						</div>
				</div>
		</section>

		<!-- Button trigger modal -->

		<!-- Modal -->

		@php
				$desc = [
				    'Temukan kebebasan dalam berkendara dengan solusi pembiayaan yang mudah dan fleksibel dari FIF Group. Sebagai bagian dari Astra International, kami memberikan akses ke berbagai pilihan kendaraan impian Anda dengan proses yang cepat dan praktis.',
				    'Wujudkan impian Anda bersama Adira Finance. Dengan beragam pilihan pembiayaan kendaraan, kami hadir untuk memudahkan setiap langkah Anda menuju mobilitas yang lebih baik. Pilihan cerdas untuk investasi kendaraan Anda, karena kepuasan Anda adalah prioritas kami.',
				    'Raih kemudahan pembiayaan kendaraan dengan Mandiri Tunas Finance. Sebagai bagian dari Bank Mandiri, kami menyediakan pilihan pembiayaan yang terpercaya dan terjangkau untuk membantu Anda mendapatkan kendaraan yang Anda butuhkan, dengan jaminan keamanan dan kenyamanan.',
				    'OTO Finance, mitra terpercaya untuk pembiayaan kendaraan Anda. Kami menawarkan proses aplikasi yang simpel, persetujuan cepat, dan jaringan yang tersebar luas untuk mendukung mobilitas dan gaya hidup dinamis Anda. Pilih OTO Finance, dan jalani perjalanan Anda tanpa hambatan.',
				];
		@endphp


		@for ($i = 0; $i < 4; $i++)
				<div class="modal fade" id="ModalLeasing{{ $i }}" tabindex="-1" aria-labelledby="ModalLeasingLabel"
						aria-hidden="true" style="border: 1px solid rgba(0, 0, 0, 0.50); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
						<div class="modal-dialog modal-lg modal-dialog-centered">
								<div class="modal-content">
										<div class="modal-body">
												<div class="text-center">
														<img class="w-25" src="{{ asset('assets') }}/images/custom/leasing/{{ $image[$i] }}"
																alt="{{ $image[$i] }}">
												</div>
												<div class="mt-3 px-4">
														<p class="text-dark fs-6 text-center">
																{{ $desc[$i] }}
														</p>
												</div>
										</div>
										<div class="modal-footer d-flex justify-content-center border-0">
												<button type="button" class="f-w-400 fs-6 btn-basic btn rounded-lg px-4 py-0 text-white"
														data-bs-dismiss="modal">Tutup</button>
										</div>
								</div>
						</div>
				</div>
		@endfor
@endsection


@push('css')
		<link rel="stylesheet" href="{{ asset('assets') }}/css/custom/info-leasing.css">
@endpush



{{-- 
	sampe belum menambahkan modal 

	next : 
	tambahin modal intergrasi sama modal bostrap bisa di center .
	--}}

@push('script')
		<script>
				$('#ModalLeasing').modal('hide');
		</script>
@endpush
