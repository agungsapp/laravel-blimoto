@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Syarat Kredit</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">kredit</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">syarat kredit</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<!-- simulasi kredit start -->

		<!-- syarat kredit start -->
		<section class="faq-section section-big-py-space b-g-light">
				<div class="title8">
						<h2>Persyaratan Kredit</h2>
				</div>
				<div class="container">
						<div class="row">
								<div class="col-12">
										<div class="accordion" id="accordionExample">
												<div class="accordion-item">
														<h2 class="accordion-header" id="headingone">
																<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
																		data-bs-target="#collapseone" aria-expanded="false">
																		Kredit Perorangan
																</button>
														</h2>
														<div id="collapseone" class="accordion-collapse collapse" aria-labelledby="headingone"
																data-bs-parent="#accordionExample">
																<div class="accordion-body">
																		<ul class="fs-6">
																				<li style="display: list-item">
																						Fotocopy KTP pemohon &amp; suami / istri / penjamin
																				</li>
																				<li style="display: list-item">
																						Fotocopy kartu keluarga (bisa digantikan dengan surat
																						nikah atau akte kelahiran)
																				</li>
																				<li style="display: list-item">
																						Data lain (hanya jika diperlukan)
																				</li>
																		</ul>
																</div>
														</div>
												</div>
												<div class="accordion-item">
														<h2 class="accordion-header" id="headingtwo">
																<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
																		data-bs-target="#collapsetwo" aria-expanded="false">
																		Kredit Perusahaan
																</button>
														</h2>
														<div id="collapsetwo" class="accordion-collapse collapse" aria-labelledby="headingtwo"
																data-bs-parent="#accordionExample">
																<div class="accordion-body">
																		<ul class="fs-6">
																				<li style="display: list-item">
																						Fotocopy akte pendirian &amp; perubahannya
																				</li>
																				<li style="display: list-item">
																						Fotocopy pengesahan kehakiman
																				</li>
																				<li style="display: list-item">
																						Fotocopy SIUP, NPWP, SITU / Domisili, TDP
																				</li>
																				<li style="display: list-item">
																						Fotocopy Rek. Koran 3 bulan terakhir
																				</li>
																				<li style="display: list-item">
																						Fotocopy KTP direksi &amp; komisaris
																				</li>
																		</ul>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- syarat kredit end -->

		<!-- simulasi kredit start -->
		<section class="my-2">
				<div class="custom-container">
						<div class="row d-flex justify-content-center">
								<div class="col-11 col-md-10 px-3 py-3">
										<p class="fs-4 fw-bold mb-1 text-start text-black">Cari Diskon Terbaik Disini</h>
								</div>
								<div class="col-11 col-md-10 card-diskon-terbaik py-lg-0 pt-lg-4 pe-lg-0 overflow-hidden py-5 pe-5 ps-5">
										{{-- <h3 class="title8 mb-3 text-center">Cari Diskon Terbaik</h3> --}}

										<div class="row">
												<div class="col-12 col-lg-8">
														<h4 class="text-black">Temukan kendaraan impianmu !</h4>
														<p class="mt-2">
																Kami telah membantu lebih dari 2000 orang untuk menemukan
																kendaraan yang sesuai dengan kebutuhan mereka dan impian mereka.
														</p>

														<form id="form-simulasi" action="" class="mt-2">
																<div class="row">
																		<!-- kota -->
																		<div class="col-12 col-md-4">
																				<div class="form-group">
																						<label for="SelectKota" class="mb-0" style="font-size: 12px">Kota</label>
																						<select id="SelectKota" class="js-example-basic-single form-select form-select-sm"
																								style="width: 100%" name="kota">
																								<option value="" selected>-- Pilih Kota --</option>
																								{{-- <option value="1">Jakarta</option> --}}
																						</select>
																				</div>
																		</div>

																		<!-- merk -->
																		<div class="col-12 col-md-4">
																				<div class="form-group">
																						<label for="merk" class="mb-0" style="font-size: 12px">merk</label>
																						<select id="merk" class="js-example-basic-single form-select form-select-sm"
																								style="width: 100%" name="merk">
																								<option value="0" selected>-- Merk --</option>
																						</select>
																				</div>
																		</div>

																		<!-- Tipe -->
																		<div class="col-12 col-md-4">
																				<div class="form-group">
																						<label for="SelectKota" class="mb-0" style="font-size: 12px">Tipe</label>
																						<select id="tipe" class="js-example-basic-single form-select form-select-sm"
																								style="width: 100%" name="tipe">
																								<option value="0" selected>-- Pilih Tipe --</option>
																						</select>
																				</div>
																		</div>

																		<!-- pembayaran -->
																		<!-- <div class="col-12 col-md-4">
																	<div class="form-group">
																		<label for="SelectKota" class="mb-0" style="font-size: 12px">Pembayaran</label>
																		<select id="pembayaran" class="js-example-basic-single form-select form-select-sm" style="width: 100%" name="pembayaran">
																			<option value="0" selected>-- Pilih Pembayaran --</option>
																			<option value="1">Cash</option>
																			<option value="2">Kredit</option>
																		</select>
																	</div>
																</div> -->

																		<!-- model motor -->
																		<div class="col-12 col-md-4">
																				<div class="form-group">
																						<label for="SelectKota" class="mb-0" style="font-size: 12px">Nama Motor</label>
																						<select id="model" class="js-example-basic-single form-select form-select-sm"
																								style="width: 100%" name="model">
																								<option value="0" selected>-- Pilih Model --</option>
																						</select>
																				</div>
																		</div>


																		<!-- tenor -->
																		<div class="col-12 col-md-4">
																				<div class="form-group">
																						<label for="tenor" class="mb-0" style="font-size: 12px">Tenor</label>
																						<select id="tenor" class="js-example-basic-single form-select form-select-sm"
																								style="width: 100%" name="tenor">
																								<option value="0" selected>-- Pilih Tenor --</option>
																								<option value="11">11 Bulan</option>
																								<option value="17">17 Bulan</option>
																								<option value="23">23 Bulan</option>
																								<option value="29">29 Bulan</option>
																								<option value="35">35 Bulan</option>
																						</select>
																				</div>
																		</div>

																</div>
																<!-- baris 2 -->
																{{-- <div class="row"> --}}




																{{-- gantinya range --}}
																{{-- <div class="col-6 col-md-3">
																<div class="form-group">
																		<label for="dp" class="mb-0" style="font-size: 12px">Dp Tersedia</label>
																		<select id="dp" name="dp" class="js-example-basic-single form-select form-select-sm"
																				style="width: 100%" name="dp">
																				<option value="" selected>-- Pilih DP --</option>
																		</select>
																</div>
														</div>
														<div class="col-6 col-md-3 d-flex align-items-center">
																<div class="form-check">
																		<input type="checkbox" class="form-check-input" id="dp_lainnya-check">
																		<label class="form-check-label" for="dp_lainnya-check">DP Lainnya</label>
																</div>
														</div>
														<div class="col-4 col-md-3">
																<div class="form-check" style="padding-left: 0 !important;" id="dp_lainnya">
																		<input type="text" class="form-control" id="tujuanValidation4"
																				placeholder="Masukan DP yang kamu inginkan" name="dp_lainnya">
																</div>
														</div> --}}
																{{-- </div> --}}

																<div class="row">
																		<div class="d-flex align-items-center mt-4">
																				<div class="col-8 d-flex">
																						<button class="btn bg-basic btn-submit text-white" type="submit">
																								Submit
																						</button>
																				</div>
																		</div>
																</div>
														</form>
												</div>
												{{-- img simulasi kanan --}}
												<div class="col-12 col-lg-4 d-none d-lg-block h-100 p-0">
														<div class="w-100 h-100 d-flex justify-content-end align-items-end">
																<img src="{{ asset('assets') }}/images/custom/simulasi/simulasi.png" class="w-75 h-100" style=""
																		alt="simulasi.png">
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- simulasi kredit end -->
@endsection
@push('script')
		<script>
				$(document).ready(function() {
						let lokasiUser = sessionStorage.getItem('lokasiUser');
						$(".id_lokasi").val(lokasiUser);
				});

				$("#dp_lainnya").hide();
				$("#dp_lainnya-check").click(function() {
						if ($(this).is(":checked")) {
								$("#dp_lainnya").show(100);
						} else {
								$("#dp_lainnya").hide(100);
						}
				});
		</script>
		<script src="{{ asset('/assets/js/custom/home.js') }}"></script>
@endpush


@push('css')
		<link rel="stylesheet" href="{{ asset('assets') }}/css/custom/home.css">
@endpush
