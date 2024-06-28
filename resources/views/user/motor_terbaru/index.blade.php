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
																		<a class="text-white" href="{{ route('home.index') }}">home</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="{{ route('motor.index') }}">daftar-motor</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		{{-- <div class="card">
				<div class="card-body">
						<p>hanya untuk debugging : </p>
						@foreach ($data as $m)
								<h4> nama : {{ $m->nama }}</h4>
								<h4> dp : {{ $m->cicilanMotor[0] }}</h4>
						@endforeach
				</div>
		</div> --}}

		<!-- list motor terbaru start -->
		<section class="section-big-pt-space ratio_asos b-g-light">
				<div class="collection-wrapper">
						<div class="custom-container">
								<div class="row">
										<div class="col-sm-3 collection-filter category-page-side">


												<!-- Filter form start -->
												<form action="{{ url('motor') }}" method="GET" id="motorFilterForm">
														<!-- Brand filter start -->
														<div class="collection-collapse-block open">
																<h3 class="collapse-block-title mt-0">Merk Motor</h3>
																<div class="collection-collapse-block-content">
																		<div class="collection-brand-filter">
																				@foreach ($merks as $merk)
																						<div class="custom-control custom-checkbox form-check collection-filter-checkbox">
																								<input type="checkbox" name="id_merk[]" value="{{ $merk->id }}"
																										class="custom-control-input form-check-input" id="merk-{{ $merk->id }}"
																										{{ in_array($merk->id, old('id_merk', request()->id_merk ?? [])) ? 'checked' : '' }} />
																								<label class="custom-control-label form-check-label"
																										for="merk-{{ $merk->id }}">{{ $merk->nama }}</label>
																						</div>
																				@endforeach
																		</div>
																</div>
														</div>
														<!-- Brand filter end -->

														<!-- Type filter start -->
														<div class="collection-collapse-block open">
																<h3 class="collapse-block-title mt-3">Jenis Motor</h3>
																<div class="collection-collapse-block-content">
																		<div class="collection-brand-filter">
																				@foreach ($types as $type)
																						<div class="custom-control custom-checkbox form-check collection-filter-checkbox">
																								<input type="checkbox" name="id_type[]" value="{{ $type->id }}"
																										class="custom-control-input form-check-input" id="type-{{ $type->id }}"
																										{{ in_array($type->id, old('id_type', request()->id_type ?? [])) ? 'checked' : '' }} />
																								<label class="custom-control-label form-check-label"
																										for="type-{{ $type->id }}">{{ $type->nama }}</label>
																						</div>
																				@endforeach
																		</div>
																</div>
														</div>
														<!-- Type filter end -->

														<!-- Price range filter start -->
														<input type="hidden" name="min_price" id="hidden_min_price">
														<input type="hidden" name="max_price" id="hidden_max_price">
														<div class="collection-collapse-block open">
																<h3 class="collapse-block-title mt-3">Filter Harga</h3>
																<div class="collection-collapse-block-content">
																		<div class="collection-brand-filter mt-3">
																				<div class="input-group mb-3">
																						<span class="input-group-text">Min</span>
																						<input type="text" class="form-control" id="display_min_price"
																								value="{{ old('min_price', request()->min_price) }}" placeholder="Contoh: Rp20.000.000"
																								oninput="formatAndSetRupiah(this, 'hidden_min_price')">
																				</div>
																				<div class="input-group mb-3">
																						<span class="input-group-text">Max</span>
																						<input type="text" class="form-control" id="display_max_price"
																								value="{{ old('max_price', request()->max_price) }}" placeholder="Contoh: Rp25.000.000"
																								oninput="formatAndSetRupiah(this, 'hidden_max_price')">
																				</div>
																		</div>
																</div>
														</div>
														<!-- Price range filter end -->

														<!-- filter start -->
														<div class="collection-collapse-block open">
																<h3 class="collapse-block-title mt-3">Filter Lainnya</h3>
																<div class="collection-collapse-block-content">
																		<div class="filter-harga-wrapper mt-3">
																				<div class="input-group mb-3">
																						<select name="sort" class="form-select" aria-label="Sort by">
																								<option value="">Pilih Urutan</option>
																								<option value="lowest_dp" {{ old('sort', request()->sort) == 'lowest_dp' ? 'selected' : '' }}>
																										Harga: Rendah ke tinggi</option>
																								<option value="highest_dp" {{ old('sort', request()->sort) == 'highest_dp' ? 'selected' : '' }}>
																										Harga: Tinggi ke rendah</option>
																								<option value="newest" {{ old('sort', request()->sort) == 'newest' ? 'selected' : '' }}>Motor
																										Terbaru</option>
																						</select>
																				</div>
																		</div>
																</div>
														</div>
														<!-- filter end -->

														<!-- Submit buttons -->
														<div class="mt-3">
																<button type="submit" class="btn bg-basic btn-block fw-bold text-white">Terapkan</button>
																<button type="button" id="resetButton" class="btn btn-outline-dark btn-block fw-bold mt-2">Reset</button>
														</div>
												</form>
												<!-- Filter form end -->



										</div>
										<div class="collection-content col">
												<div class="page-main-content">
														<div class="row">
																<div class="col-sm-12">
																		<div class="top-banner-wrapper">
																				<a href="product-page(left-sidebar).html"><img
																								src="./assets/images/motor-terbaru-termurah/All Moto.webp" class="img-fluid" alt="" /></a>
																				<div class="top-banner-content small-section">
																						<h4>Honda One Heart</h4>
																						<p>
																								Kami mempersembahkan kombinasi teknologi pintar dan
																								fitur canggih yang memudahkan mulai dari sebelum Anda
																								berkendara hingga tiba ke tempat tujuan dengan penuh
																								senyuman. eSP teknologi mesin terbaru inovasi Honda
																								yang diterapkan secara global, melalui aplikasi
																								teknologi mutakhir dan ACG starter, dirancang sempurna
																								untuk menghasilkan performa tinggi dengan efisiensi
																								bahan bakar yang lebih baik dan ramah lingkungan.
																								Teknologi canggih yang membantu menyeimbangkan
																								pengereman roda belakang dan depan secara optimal,
																								memungkinkan kemudahan pengoperasian rem dengan
																								menarik tuas rem kiri, rem depan, rem belakang dapat
																								berfungsi dengan tepat.
																						</p>
																				</div>
																		</div>
																		<div class="collection-product-wrapper">
																				<div class="product-wrapper-grid product">
																						<div class="row">

																								@forelse ($data as $motor)
																										<div class="col-xl-3 col-md-4 col-6 col-grid-box">
																												<div class="product-box">
																														<div class="product-imgbox">
																																<div class="product-front">
																																		<img
																																				src="{{ asset('assets') }}/images/detail-motor/{{ $motor->detailMotor[0]->gambar }}"
																																				class="img-fluid" alt="{{ $motor->detailMotor[0]->gambar }}" />
																																</div>
																														</div>
																														<div class="product-detail product-detail2 pt-3 text-start">
																																<a tabindex="0">
																																		<h3 class="fw-bold text-center">{{ $motor->nama }}</h3>
																																</a>
																																<div class="d-flex justify-content-between align-items-baseline">
																																		<h3 class="mt-3">Harga Spesial</h3>
																																		<h5>{{ Str::rupiah($motor->harga) }}</h5>
																																</div>
																																<div class="d-flex justify-content-between align-items-baseline">
																																		<h3 class="">Dp Normal</h3>
																																		<h5>{{ Str::rupiah($motor->dp ?? '0') }}</h5>
																																</div>
																																<div class="d-flex justify-content-between align-items-baseline">
																																		<h3 class="">Diskon</h3>
																																		<h5>{{ Str::rupiah($motor->diskon_promo ?? '0') }}</h5>
																																</div>
																																<div class="d-flex justify-content-between align-items-baseline">
																																		<h3 class="">Dp Bayar</h3>
																																		<h5>{{ Str::rupiah($motor->dp - $motor->diskon_promo) }}</h5>
																																</div>

																																<form action="{{ route('detail-motor') }}" method="GET">
																																		@csrf
																																		<input class="id_lokasi" type="hidden" name="id_lokasi" value="">
																																		<input type="hidden" name="id_motor" value="{{ $motor->id }}">
																																		<button type="submit" class="btn btn-sm btn-danger d-block w-100 py-2">Lihat
																																				Detail</button>
																																</form>
																														</div>
																												</div>
																										</div>
																								@empty
																										<div class="d-flex flex-column justify-content-center">
																												<p class="fs-3 text-center">-- Yah, motor yang kamu cari belum ada nih ☹ --</p>
																										</div>
																								@endforelse
																								<div class="mb-5 mt-5">
																										{{ $data->links('user.layouts.partials.pagination') }}
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- list motor terbaru end -->
@endsection

@push('script')
		<script>
				document.getElementById('resetButton').addEventListener('click', function() {
						// Clear checkboxes
						document.querySelectorAll('input[type=checkbox]').forEach(function(checkbox) {
								checkbox.checked = false;
						});

						// Clear text inputs
						document.getElementById('display_min_price').value = '';
						document.getElementById('display_max_price').value = '';

						// Clear the hidden fields for price
						document.getElementById('hidden_min_price').value = '';
						document.getElementById('hidden_max_price').value = '';

						// Reset the sort dropdown
						document.querySelector('select[name="sort"]').value = '';

						// If you have other fields to reset, add similar lines here
				});

				document.getElementById('motorFilterForm').onsubmit = function(event) {
						var minPrice = document.getElementsByName('min_price')[0].value;
						var maxPrice = document.getElementsByName('max_price')[0].value;

						// Check if only one field is filled
						if ((minPrice && !maxPrice) || (!minPrice && maxPrice)) {
								event.preventDefault();
								Swal.fire({
										title: 'Error!',
										text: 'Min dan Max harus diisi semua.',
										icon: 'error',
										confirmButtonText: 'Ok'
								});
								return false;
						}

						return true;
				};

				function formatAndSetRupiah(displayInput, hiddenInputId) {
						let value = displayInput.value.replace(/[^,\d]/g, '').toString();
						let cleanValue = value.replace(/,/g, '');
						document.getElementById(hiddenInputId).value = cleanValue; // Set the hidden input value

						let split = value.split(',');
						let sisa = split[0].length % 3;
						let rupiah = split[0].substr(0, sisa);
						let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

						if (ribuan) {
								let separator = sisa ? '.' : '';
								rupiah += separator + ribuan.join('.');
						}

						displayInput.value = 'Rp ' + rupiah;
				}

				function initializeFormattedInputs() {
						const minPriceInput = document.getElementById('display_min_price');
						const maxPriceInput = document.getElementById('display_max_price');

						if (minPriceInput && minPriceInput.value) {
								formatAndSetRupiah(minPriceInput, 'hidden_min_price');
						}

						if (maxPriceInput && maxPriceInput.value) {
								formatAndSetRupiah(maxPriceInput, 'hidden_max_price');
						}
				}

				window.onload = initializeFormattedInputs;
		</script>
@endpush
