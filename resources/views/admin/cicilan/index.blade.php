@extends('admin.layouts.main')
@section('content')
		<div class="row">
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

						<!-- cari cicilan -->
						<form action="{{ route('serverSideCicilanMotor') }}" method="GET" id="searchForm" class="mt-4">
								<div class="row">
										<div class="col-md-3">
												<div class="form-group">
														<label for="motor">Motor</label>
														<select name="motor" class="form-control select2">
																<option value="" selected>-- All Motors --</option>
																@foreach ($motor as $motorItem)
																		<option value="{{ $motorItem->id }}">{{ $motorItem->nama }}</option>
																@endforeach
														</select>
												</div>
										</div>
										<div class="col-md-3">
												<div class="form-group">
														<label for="leasing">Leasing</label>
														<select name="leasing" class="form-control select2">
																<option value="" selected>-- All Leasing --</option>
																@foreach ($leasing as $leasingItem)
																		<option value="{{ $leasingItem->id }}">{{ $leasingItem->nama }}</option>
																@endforeach
														</select>
												</div>
										</div>
										<div class="col-md-3">
												<div class="form-group">
														<label for="lokasi">Location</label>
														<select name="lokasi" class="form-control select2">
																<option value="" selected>-- All Locations --</option>
																@foreach ($lokasi as $lokasiItem)
																		<option value="{{ $lokasiItem->id }}">{{ $lokasiItem->nama }}</option>
																@endforeach
														</select>
												</div>
										</div>
										<div class="col-md-3">
												<div class="form-group">
														<label for="tenor">Tenor</label>
														<select name="tenor" class="form-control select2">
																<option value="" selected>-- All Tenors --</option>
																@foreach ($tenor as $tenorItem)
																		<option value="{{ $tenorItem->tenor }}">{{ $tenorItem->tenor }}</option>
																@endforeach
														</select>
												</div>
										</div>
										<div class="col-md-3">
												<button type="submit" class="btn btn-primary">Search</button>
										</div>
								</div>
						</form>

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
										<div class="modal-header bg-warning">
												<h5 class="modal-title" id="modalUpdateLabel">Hapus data cicilan</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<form action="{{ route('admin.cicilan.delete') }}" method="POST" enctype="multipart/form-data">
												@csrf
												@method('DELETE')
												<div class="modal-body">
														<div class="form-group">
																<label>Pilih Motor</label>
																@if ($motor == null)
																		<p>Tidak ada data best kategori motor silahkan buat terlebih dahulu !</p>
																@else
																		<select name="motor" class="form-control select2">
																				<option value="" selected>-- Pilih motor --</option>
																				@foreach ($motor as $motor)
																						<option value="{{ $motor->id }}">{{ $motor->nama }}</option>
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
																				@foreach ($leasing as $leasing)
																						<option value="{{ $leasing->id }}">{{ $leasing->nama }}</option>
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
																				@foreach ($lokasi as $lokasi)
																						<option value="{{ $lokasi->id }}">{{ $lokasi->nama }}</option>
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
								<div class="table-responsive">
										<table id="example1" class="table-bordered table-striped table">
												<thead>
														<tr>
																<th>ID</th>
																<th>Motor Name</th>
																<th>Leasing Name</th>
																<th>Kota Name</th>
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
												d.motor = $('select[name=motor]').val();
												d.leasing = $('select[name=leasing]').val();
												d.lokasi = $('select[name=lokasi]').val();
												d.tenor = $('select[name=tenor]').val();
										},
								},
								columns: [{
												data: 'id',
												name: 'id'
										},
										{
												data: 'motor_name',
												name: 'motor_name'
										},
										{
												data: 'leasing_name',
												name: 'leasing_name'
										},
										{
												data: 'lokasi_name',
												name: 'lokasi_name'
										},
										{
												data: 'dp',
												name: 'dp',
												render: function(data, type, row) {
														return 'Rp. ' + parseInt(data).toLocaleString();
												},
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
												},
										},
										{
												data: 'action',
												name: 'action',
												orderable: false
										}
								],
						});

						// Submit the form on button click
						$('#searchForm').on('submit', function(e) {
								e.preventDefault();
								table.ajax.reload();
						});
				});
		</script>
@endpush
