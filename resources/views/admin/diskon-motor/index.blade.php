@extends('admin.layouts.main')
@section('content')

		<div class="row">
				<div class="col-12">
						<div class="card card-primary">
								<div class="card-header">
										<div class="card-title">
												Tambah data diskon motor
										</div>
								</div>
								<form action="{{ route('admin.diskon-motor.store') }}" method="post" enctype="multipart/form-data">
										@csrf
										@method('POST')
										<div class="card-body">
												<div class="row">
														<div class="form-group col-md-4">
																<label>Nama Motor</label>
																@if ($motor == null)
																		<p class="text-danger">Tidak ada data motor, silakan buat terlebih dahulu!</p>
																@else
																		<select id="tambah-nama-motor" name="nama_motor"
																				class="form-control select2 @error('nama_motor') is-invalid @enderror" style="width: 100%;">
																				<option value="">-- Pilih nama motor --</option>
																				@foreach ($motor as $m)
																						<option value="{{ $m->id }}" {{ old('nama_motor') == $m->id ? 'selected' : '' }}>
																								{{ $m->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>
														<div class="form-group col-md-4">
																<label>Leasing</label>
																@if ($leasing == null)
																		<p class="text-danger">Tidak ada data leasing, silakan buat terlebih dahulu!</p>
																@else
																		<select id="tambah-leasing-motor" name="leasing_motor"
																				class="form-control @error('leasing_motor') is-invalid @enderror select2" style="width: 100%;">
																				<option value="">-- Pilih leasing --</option>
																				@foreach ($leasing as $l)
																						<option value="{{ $l->id }}" {{ old('leasing_motor') == $l->id ? 'selected' : '' }}>
																								{{ $l->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>
														<div class="form-group col-md-4">
																<label>Lokasi</label>
																@if ($lokasi == null)
																		<p class="text-danger">Tidak ada data lokasi, silakan buat terlebih dahulu!</p>
																@else
																		<select id="tambah-lokasi-motor" name="lokasi_motor"
																				class="form-control @error('lokasi_motor') is-invalid @enderror select2" style="width: 100%;">
																				<option value="">-- Pilih lokasi --</option>
																				@foreach ($lokasi as $l)
																						<option value="{{ $l->id }}" {{ old('lokasi_motor') == $l->id ? 'selected' : '' }}>
																								{{ $l->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>
												</div>

												<div class="row">
														<div class="form-group col-md-4">
																<label for="diskon">Diskon Coret</label>
																<input name="diskon" type="text" class="form-control @error('diskon') is-invalid @enderror"
																		id="diskon" placeholder="Masukan diskon" value="{{ old('diskon') }}">
														</div>
														<div class="form-group col-md-4">
																<label for="diskon_dealer">Diskon Dealer</label>
																<input name="diskon_dealer" type="text"
																		class="form-control @error('diskon_dealer') is-invalid @enderror" id="diskon_dealer"
																		placeholder="Masukan diskon dealer" value="{{ old('diskon_dealer') }}">
														</div>
														<div class="form-group col-md-4">
																<label for="diskon_promo">Diskon Promo</label>
																<input name="diskon_promo" type="text" class="form-control @error('diskon_promo') is-invalid @enderror"
																		id="diskon_promo" placeholder="Masukan diskon Promo" value="{{ old('diskon_promo') }}">
														</div>
												</div>

												<div class="row">
														<div class="form-group col-md-6">
																<label>Tenor</label>
																<select id="tambah-tenor-motor" name="tenor"
																		class="form-control @error('tenor') is-invalid @enderror select2" style="width: 100%;">
																		<option value="">-- Pilih tenor --</option>
																		@foreach (['11', '17', '23', '29', '35'] as $tenor)
																				<option value="{{ $tenor }}" {{ old('tenor') == $tenor ? 'selected' : '' }}>
																						{{ $tenor }}</option>
																		@endforeach
																</select>
														</div>
														<div class="form-group col-md-6">
																<label for="potongan_tenor">Potongan Tenor</label>
																<input name="potongan_tenor" type="text"
																		class="form-control @error('potongan_tenor') is-invalid @enderror" id="potongan_tenor"
																		placeholder="Masukan potongan tenor (Kosongkan jika tidak ada)" value="{{ old('potongan_tenor') }}">
														</div>
												</div>
										</div>
										<div class="card-footer">
												<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
								</form>
						</div>
				</div>
		</div>

		<div class="row">
				<div class="col-12">
						<div class="card card-primary">
								<div class="card-header">
										<div class="card-title">
												Data Diskon Motor
										</div>
								</div>
								<div class="card-body">

										{{-- Filters --}}
										<div class="row mb-3">
												<div class="col-md-4">
														<select id="filterKota" class="form-control select2" style="width: 100%;">
																<option value="">-- Pilih Kota --</option>
																@foreach ($lokasi as $l)
																		<option value="{{ $l->nama }}">{{ $l->nama }}</option>
																@endforeach
														</select>
												</div>
												<div class="col-md-4">
														<select id="filterTenor" class="form-control select2" style="width: 100%;">
																<option value="">-- Pilih Tenor --</option>
																@foreach (['11', '17', '23', '29', '35'] as $tenor)
																		<option value="{{ $tenor }}">{{ $tenor }}</option>
																@endforeach
														</select>
												</div>
												<div class="col-md-4">
														<button id="resetFilters" class="btn btn-secondary">Reset Filters</button>
												</div>
										</div>
										<div class="table-responsive">
												<table id="dataDiskon" class="table-bordered table-striped table">
														<thead>
																<tr>
																		<th>Nomor</th>
																		<th>Nama Motor</th>
																		<th>Leasing</th>
																		<th>Lokasi</th>
																		<th>Diskon Konsumen</th>
																		<th>Diskon Dealer</th>
																		<th>Diskon Promo</th>
																		<th>Tenor</th>
																		<th>Potongan Tenor</th>
																		<th width="120px">Action</th>
																</tr>
														</thead>
														{{-- @include('admin.diskon-motor.tbody') --}}

												</table>
										</div>
								</div>
								<!-- /.card-body -->
						</div>
				</div>
		</div>

		{{-- modal edit --}}
		<section>
				<div class="modal" id="modalEdit" tabindex="-1">
						<div class="modal-dialog">
								<div class="modal-content">
										<div class="modal-header">
												<h5 class="modal-title">Edit data diskon motor</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<form action="" method="post">
												@csrf
												@method('PUT')
												<div class="modal-body">
														<div class="row">
																<div class="form-group col-md-12">
																		<label>Nama Motor</label>
																		@if ($motor == null)
																				<p class="text-danger">Tidak ada data motor, silakan buat terlebih dahulu!</p>
																		@else
																				<select id="edit-nama-motor" name="nama_motor"
																						class="form-control select2 @error('nama_motor') is-invalid @enderror" style="width: 100%;">
																						<option value="">-- Pilih nama motor --</option>
																						@foreach ($motor as $m)
																								<option value="{{ $m->id }}" {{ old('nama_motor') == $m->id ? 'selected' : '' }}>
																										{{ $m->nama }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
																<div class="form-group col-md-12">
																		<label>Leasing</label>
																		@if ($leasing == null)
																				<p class="text-danger">Tidak ada data leasing, silakan buat terlebih dahulu!</p>
																		@else
																				<select id="edit-leasing-motor" name="leasing_motor"
																						class="form-control @error('leasing_motor') is-invalid @enderror select2" style="width: 100%;">
																						<option value="">-- Pilih leasing --</option>
																						@foreach ($leasing as $l)
																								<option value="{{ $l->id }}" {{ old('leasing_motor') == $l->id ? 'selected' : '' }}>
																										{{ $l->nama }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
																<div class="form-group col-md-12">
																		<label>Lokasi</label>
																		@if ($lokasi == null)
																				<p class="text-danger">Tidak ada data lokasi, silakan buat terlebih dahulu!</p>
																		@else
																				<select id="edit-lokasi-motor" name="lokasi_motor"
																						class="form-control @error('lokasi_motor') is-invalid @enderror select2" style="width: 100%;">
																						<option value="">-- Pilih lokasi --</option>
																						@foreach ($lokasi as $l)
																								<option value="{{ $l->id }}" {{ old('lokasi_motor') == $l->id ? 'selected' : '' }}>
																										{{ $l->nama }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
														</div>

														<div class="row">
																<div class="form-group col-md-12">
																		<label for="diskon">Diskon Coret</label>
																		<input name="diskon" type="text" class="form-control @error('diskon') is-invalid @enderror"
																				id="diskon" placeholder="Masukan diskon" value="{{ old('diskon') }}">
																</div>
																<div class="form-group col-md-12">
																		<label for="diskon_dealer">Diskon Dealer</label>
																		<input name="diskon_dealer" type="text"
																				class="form-control @error('diskon_dealer') is-invalid @enderror" id="diskon_dealer"
																				placeholder="Masukan diskon dealer" value="{{ old('diskon_dealer') }}">
																</div>
																<div class="form-group col-md-12">
																		<label for="diskon_promo">Diskon Promo</label>
																		<input name="diskon_promo" type="text"
																				class="form-control @error('diskon_promo') is-invalid @enderror" id="diskon_promo"
																				placeholder="Masukan diskon Promo" value="{{ old('diskon_promo') }}">
																</div>
														</div>

														<div class="row">
																<div class="form-group col-md-12">
																		<label>Tenor</label>
																		<select id="edit-tenor-motor" name="tenor"
																				class="form-control @error('tenor') is-invalid @enderror select2" style="width: 100%;">
																				<option value="">-- Pilih tenor --</option>
																				@foreach (['11', '17', '23', '29', '35'] as $tenor)
																						<option value="{{ $tenor }}" {{ old('tenor') == $tenor ? 'selected' : '' }}>
																								{{ $tenor }}</option>
																				@endforeach
																		</select>
																</div>
																<div class="form-group col-md-12">
																		<label for="potongan_tenor">Potongan Tenor</label>
																		<input name="potongan_tenor" type="text"
																				class="form-control @error('potongan_tenor') is-invalid @enderror" id="potongan_tenor"
																				placeholder="Masukan potongan tenor (Kosongkan jika tidak ada)"
																				value="{{ old('potongan_tenor') }}">
																</div>
														</div>
												</div>
												<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-warning">Update</button>
												</div>
										</form>

								</div>
						</div>
				</div>
		</section>


@endsection


@push('script')
		<script>
				//Initialize Select2 Elements
				$(document).ready(function() {
						// Initialize DataTable
						var table = $("#dataDiskon").DataTable({
								processing: true,
								serverSide: true,
								ajax: {
										url: "{{ route('serverSideDiskonMotor') }}",
										data: function(d) {
												d.kota = $('#filterKota').val();
												d.tenor = $('#filterTenor').val();
										},
								},
								columns: [{
												data: 'DT_RowIndex',
												name: 'DT_RowIndex',
												orderable: false,
												searchable: false
										},
										{
												data: 'motor.nama',
												name: 'Motor',
												title: 'Nama Motor'
										},
										{
												data: 'leasing.nama',
												name: 'Leasing',
												title: 'Leasing'
										},
										{
												data: 'lokasi.nama',
												name: 'Lokasi',
												title: 'Lokasi'
										},
										{
												data: 'diskon',
												name: 'Diskon Konsumen',
												title: 'Diskon Coret'
										},
										{
												data: 'diskon_dealer',
												name: 'Diskon Dealer',
												title: 'Diskon Dealer'
										},
										{
												data: 'diskon_promo',
												name: 'Diskon Promo',
												title: 'Diskon Promo'
										},
										{
												data: 'tenor',
												name: 'Tenor',
												title: 'Tenor'
										},
										{
												data: 'potongan_tenor',
												name: 'Potongan Tenor',
												title: 'Potongan Tenor'
										},
										{
												data: 'aksi',
												name: 'Action',
												title: 'Action'
										},
								],
								columnDefs: [{
												targets: 0,
												searchable: false,
												orderable: false,
												className: 'dt-body-center'
										},
										{
												targets: -1,
												searchable: false,
												orderable: false,
												className: 'dt-body-center'
										}
								],
						});

						// Event handler for filters
						$('#filterKota, #filterTenor').on('change', function() {
								table.draw();
						});

						// Reset filter button
						$('#resetFilters').on('click', function() {
								$('#filterKota, #filterTenor').val(null).trigger('change');
								table.draw();
						});

						$('.select2').select2()
						// console.log("datatables ekesusi")

						// .buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');

						$('.show_confirm').click(function(event) {
								var form = $(this).closest("form");
								var name = $(this).data("name");
								event.preventDefault();
								swal({
												title: `Delete Data diskon Motor ?`,
												text: "data yang di hapus tidak dapat dipulihkan!",
												icon: "warning",
												buttons: true,
												dangerMode: true,
										})
										.then((willDelete) => {
												if (willDelete) {
														form.submit();
												}
										});
						})


						$('body').on('click', '.btn_edit', function(e) {
								e.preventDefault();
								let getUrl = $(this).data('get');
								let actionUrl = $(this).data('action');
								// load data
								$.ajax({
										url: getUrl,
										type: 'GET',
										success: function(data) {
												console.log(data);
												// Mengisi data ke dalam field dalam modalEdit
												$('#modalEdit form').attr('action', actionUrl)
												$('#modalEdit #edit-nama-motor').val(data.id_motor).trigger('change');
												$('#modalEdit #edit-leasing-motor').val(data.id_leasing).trigger('change');
												$('#modalEdit #edit-lokasi-motor').val(data.id_lokasi).trigger('change');
												$('#modalEdit #diskon').val(data.diskon);
												$('#modalEdit #diskon_dealer').val(data.diskon_dealer);
												$('#modalEdit #diskon_promo').val(data.diskon_promo);
												$('#modalEdit #edit-tenor-motor').val(data.tenor).trigger('change');
												$('#modalEdit #potongan_tenor').val(data.potongan_tenor);

												// Menampilkan modal
												$('#modalEdit').modal('show');
										}
								});
						});

						// delete
						// delete
						$('body').on('click', '.btn_delete', function(e) {
								e.preventDefault();
								const url = $(this).data('url');

								// Konfirmasi menggunakan SweetAlert
								Swal.fire({
										title: 'Hapus ?',
										text: "Anda yakin akan menghapus data diskon!",
										icon: 'warning',
										showCancelButton: true,
										confirmButtonColor: '#3085d6',
										cancelButtonColor: '#d33',
										confirmButtonText: 'Yakin!'
								}).then((result) => {
										if (result.isConfirmed) {
												$.ajax({
														url: url,
														type: 'DELETE',
														success: function(data) {
																Swal.fire(
																		'Deleted!',
																		'Data berhasil di hapus.',
																		'success'
																);
																// You can add code here to remove the deleted item from the DOM if needed
														},
														error: function(xhr, status, error) {
																Swal.fire(
																		'Error!',
																		'Terjadi kesalahan pada server saat mencoba hapus data.',
																		'error'
																);
														}
												});
										}
								});
						});

						// end document ready
				})
		</script>
@endpush
