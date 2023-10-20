@extends('admin.layouts.main')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="callout callout-info">
			<h5><i class="fas fa-info"></i> Note:</h5>
			Lakukan import/update data dengan import file CSV dengan format yang telah di tentukan.
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
		<button type="button" class="btn btn-warning btn-lg ml-3" data-toggle="modal" data-target="#modalEditPotongan">
			<i class="fas fa-sync-alt"></i><span class="ml-2">Update potongan tenor</span>
		</button>

		<!-- Modal import -->
		<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImportLabel" aria-hidden="true">
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
									<label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
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
		<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel" aria-hidden="true">
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
									<label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
								</div>
								<div class="input-group-append">
									<button type="submit" class="input-group-text btn-primary" id="inputGroupFileAddon02">Update Data</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal edit potongan -->
	<div class="modal fade" id="modalEditPotongan" role="dialog" aria-labelledby="modalUpdateLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<h5 class="modal-title" id="modalUpdateLabel">Update Data Potongan Tenor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ route('admin.cicilan.potongan-tenor.update') }}" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						@csrf
						@method('PUT')
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
							<label>Pilih Tenor</label>
							@if ($tenor == null)
							<p>Tidak ada data buat terlebih dahulu !</p>
							@else
							<select name="tenor" class="form-control select2">
								<option value="" selected>-- Pilih tenor --</option>
								@foreach ($tenor as $tenor)
								<option value="{{ $tenor->tenor }}">{{ $tenor->tenor }}</option>
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
							<label for="potongan-tenor">Potongan Tenor</label>
							<input name="potongan_tenor" type="text" class="form-control @error('nama') is-invalid @enderror" id="potongan-tenor" placeholder="Masukan data update potongan">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
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
			<table id="example1" class="table-bordered table-striped table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Motor Name</th>
						<th>Leasing Name</th>
						<th>Kota Name</th>
						<th>DP</th>
						<th>Tenor</th>
						<th>Potongan Tenor</th>
						<th>Cicilan</th>
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

@endsection

@push('script')
<script>
	$('#example1').DataTable({
		processing: true,
		serverSide: true,
		ajax: "{{ route('serverSideCicilanMotor') }}",
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
				}
			},
			{
				data: 'tenor',
				name: 'tenor'
			},
			{
				data: 'potongan_tenor',
				name: 'potongan_tenor'
			},
			{
				data: 'cicilan',
				name: 'cicilan',
				render: function(data, type, row) {
					return 'Rp. ' + parseInt(data).toLocaleString();
				}
			}
		]
	});
</script>
<script>
	$(document).ready(function() {
		//Initialize Select2 Elements
		$('.select2').select2()
	});
</script>
@endpush