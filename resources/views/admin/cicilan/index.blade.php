@extends('admin.layouts.main')
@section('content')
		<div class="row">

				{{-- tambahkan alert jumlah baris yang duplikat  di sini yang bisa di close  bootstrap 4 --}}
				@if (session('duplicateRows'))
						<div class="col-12">
								<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
										<div style="max-height: 200px; overflow-y: scroll;">

												<strong>Duplikasi Data!</strong> Duplikasi data ditemukan pada baris:
												{{ implode(', ', session('duplicateRows')) }}. Harap hapus data yang sudah ada terlebih dahulu.
										</div>
								</div>
						</div>
				@endif



				<div class="col-12">
						<div class="callout callout-info">
								<h5><i class="fas fa-info"></i> Note:</h5>
								<p>Lakukan import/update data dengan import file CSV dengan format yang telah ditentukan. Silakan unduh format
										file CSV <a href="{{ asset('csv/template.csv') }}" download>di sini</a>.</p>
						</div>
				</div>

				<div class="col-12 mb-3">
						<!-- Button trigger modal import -->
						<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalImport">
								<i class="fas fa-file-import"></i><span class="ml-2">Import data cicilan</span>
						</button>
						<button type="button" class="btn btn-warning btn-lg ml-3" data-toggle="modal" data-target="#modalUpdate">
								<i class="fas fa-sync-alt"></i><span class="ml-2">Update data cicilan</span>
						</button>
						<button type="button" class="btn btn-danger btn-lg ml-3" data-toggle="modal" data-target="#modalEditPotongan">
								<span class="ml-2">Hapus data cicilan</span>
						</button>



						<!-- Modal import -->
						<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImportLabel"
								aria-hidden="true">
								<div class="modal-dialog" role="document">
										<div class="modal-content">
												<div class="modal-header bg-primary">
														<h5 class="modal-title" id="modalImportLabel">Import Data PriceList Cicilan</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
														</button>
												</div>
												<div class="modal-body">
														<form action="{{ route('admin.cicilan.csv.import') }}" method="POST" enctype="multipart/form-data">
																@csrf
																@method('POST')
																<div class="input-group mb-3">
																		<div class="custom-file">
																				<input type="file" name="file" class="custom-file-input" id="inputGroupFile02">
																				<label class="custom-file-label" for="inputGroupFile02"
																						aria-describedby="inputGroupFileAddon02">Choose file</label>
																		</div>
																		<div class="input-group-append">
																				<button type="submit" class="input-group-text btn-primary" id="inputGroupFileAddon02">Import</button>
																		</div>
																</div>
														</form>
												</div>
										</div>
								</div>
						</div>


						<!-- Modal update -->
						<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel"
								aria-hidden="true">
								<div class="modal-dialog" role="document">
										<div class="modal-content">
												<div class="modal-header bg-warning">
														<h5 class="modal-title" id="modalUpdateLabel">Update Data PriceList Cicilan</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
														</button>
												</div>
												<div class="modal-body">

														<div class="row mb-3">
																<div class="col-12">
																		<div class="callout callout-warning">
																				<h5><i class="fas fa-info"></i> Penting:</h5>
																				<p>Fitur update masih dalam versi beta , kesalahan mungkin terjadi. <br>
																						cara kerja : <br>
																						menghapus semua data cicilan yang ada dan menggantinya dengan import yang baru
																				</p>
																		</div>
																</div>
														</div>

														<form action="{{ route('admin.cicilan.csv.update') }}" method="POST" enctype="multipart/form-data">
																@csrf
																@method('POST')
																<div class="input-group mb-3">
																		<div class="custom-file">
																				<input type="file" class="custom-file-input" name="file" id="inputGroupFile02">
																				<label class="custom-file-label" for="inputGroupFile02"
																						aria-describedby="inputGroupFileAddon02">Choose file</label>
																		</div>
																		<div class="input-group-append">
																				<button type="submit" class="input-group-text btn-primary" id="inputGroupFileAddon02">Update
																						Data</button>
																		</div>
																</div>
														</form>
												</div>
										</div>
								</div>
						</div>
				</div>



				<!-- Modal edit potongan -->
				<div class="modal fade" id="modalEditPotongan" role="dialog" aria-labelledby="modalUpdateLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
								<div class="modal-content">
										<div class="modal-header bg-danger">
												<h5 class="modal-title" id="modalUpdateLabel">Hapus data cicilan</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<form action="{{ route('admin.cicilan.delete') }}" method="POST" enctype="multipart/form-data">
												@csrf
												@method('DELETE')
												<div class="modal-body">

														<div class="row mb-3">
																<div class="col-12">
																		<div class="callout callout-danger">
																				<h5><i class="fas fa-info"></i> Penting:</h5>
																				<p>Hapus data dengan hati hati karna ini bersifat permanen.</p>
																		</div>
																</div>
														</div>


														<div class="form-group">
																<label>Pilih Motor</label>
																@if ($motor == null)
																		<p>Tidak ada data best kategori motor silahkan buat terlebih dahulu !</p>
																@else
																		<select name="motor" class="form-control select2">
																				<option value="" selected>-- Pilih motor --</option>
																				@foreach ($motor as $m)
																						<option value="{{ $m->id }}">{{ $m->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>

														<div class="form-group">
																<label>Pilih Lokasi</label>
																@if ($lokasi == null)
																		<p>Tidak ada data silahkan buat terlebih dahulu !</p>
																@else
																		<select name="lokasi" class="form-control select2">
																				<option value="" selected>-- Pilih lokasi --</option>
																				@foreach ($lokasi as $l)
																						<option value="{{ $l->id }}">{{ $l->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>
														<div class="form-group">
																<label>Pilih leasing</label>
																@if ($leasing == null)
																		<p>Tidak ada data silahkan buat terlebih dahulu !</p>
																@else
																		<select name="leasing" class="form-control select2">
																				<option value="" selected>-- Pilih leasing --</option>
																				@foreach ($leasing as $l)
																						<option value="{{ $l->id }}">{{ $l->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>

														<div class="form-group">
																<label for="tenor">Masukan Tenor</label>
																<input name="tenor" type="number" class="form-control" id="tenor" placeholder="Masukan tenor">
														</div>
												</div>
												<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Hapus</button>
												</div>
										</form>
								</div>
						</div>
				</div>
		</div>

		<div class="col-12">
				<div class="card card-primary">
						<div class="card-header">
								<h3 class="card-title">Data price list cicilan kendaraan</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">



								<!-- Filters -->
								<div class="row mb-3">
										<div class="col-md-3">
												<select id="filterLeasing" class="form-control select2" style="width: 100%;">
														<option value="">-- Pilih Leasing --</option>

														@foreach ($leasing as $les)
																{{-- <option value="oke">{{ $les }}</option> --}}
																<option value="{{ $les->id }}">{{ $les->nama }}</option>
														@endforeach
												</select>
										</div>
										<div class="col-md-3">
												<select id="filterKota" class="form-control select2" style="width: 100%;">
														<option value="">-- Pilih Kota --</option>
														@foreach ($lokasi as $kot)
																{{-- <option value="oke">oke</option> --}}

																<option value="{{ $kot->id }}">{{ $kot->nama }}</option>
														@endforeach
												</select>
										</div>
										<div class="col-md-3">
												<select id="filterTenor" class="form-control select2" style="width: 100%;">
														<option value="">-- Pilih Tenor --</option>
														@foreach ($tenor as $t)
																<option value="{{ $t->tenor }}">{{ $t->tenor }}</option>
														@endforeach
												</select>
										</div>
										<div class="col-md-3">
												<button id="resetFilters" class="btn btn-secondary">Reset Filters</button>
										</div>
								</div>



								<div class="table-responsive">
										<table id="example1" class="table-bordered table-striped table">
												<thead>
														<tr>
																<th>ID</th>
																<th>Nama Motor</th>
																<th>Nama Leasing</th>
																<th>Nama Kota</th>
																<th>DP</th>
																<th>Tenor</th>
																<th>Cicilan</th>
																<th width="120px">Action</th>
														</tr>
												</thead>
												<tbody>
														<!-- Data rows will be dynamically added here -->
												</tbody>
										</table>
								</div>
						</div>
				</div>
		</div>
		</div>

@endsection

@push('script')
		<script>
				$(document).on('click', '.show_confirm', function(e) {
						e.preventDefault();
						var form = $(this).closest('form');
						event.preventDefault();
						swal({
										title: `Delete Data ?`,
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
				});



				$(document).ready(function() {
						// Initialize Select2 Elements
						$('.select2').select2();

						// Initialize DataTable
						var table = $('#example1').DataTable({
								processing: true,
								serverSide: true,
								order: [
										[0, 'desc']
								],
								ajax: {
										url: "{{ route('serverSideCicilanMotor') }}",
										data: function(d) {
												d.leasing = $('#filterLeasing').val();
												d.kota = $('#filterKota').val();
												d.tenor = $('#filterTenor').val();
										},
								},
								columns: [{
												data: 'id',
												name: 'id'
										},
										{
												data: 'motor.nama',
												name: 'motor.nama'
										},
										{
												data: 'leasing_motor.nama',
												name: 'leasing_motor.nama'
										},
										{
												data: 'kota.nama',
												name: 'kota.nama'
										},
										{
												data: 'dp',
												name: 'dp',
												render: function(data, type, row) {
														return 'Rp. ' + parseInt(data).toLocaleString();
												}
										},
										{
												data: 'tenor',
												name: 'tenor'
										},
										{
												data: 'cicilan',
												name: 'cicilan',
												render: function(data, type, row) {
														return 'Rp. ' + parseInt(data).toLocaleString();
												}
										},
										{
												data: 'action',
												name: 'action',
												orderable: false
										}
								],
						});

						// Event handler for filters
						$('#filterLeasing, #filterKota, #filterTenor').change(function() {
								table.draw();
						});

						// Reset filter
						$('#resetFilters').click(function() {
								$('#filterLeasing, #filterKota, #filterTenor').val(null).trigger('change');
								table.draw();
						});

						// Deletion confirmation
						$(document).on('click', '.show_confirm', function(e) {
								e.preventDefault();
								var form = $(this).closest("form");
								swal({
										title: 'Delete Data?',
										text: "Data yang dihapus tidak dapat dipulihkan!",
										icon: "warning",
										buttons: true,
										dangerMode: true,
								}).then((willDelete) => {
										if (willDelete) {
												form.submit();
										}
								});
						});
				});
		</script>
@endpush
