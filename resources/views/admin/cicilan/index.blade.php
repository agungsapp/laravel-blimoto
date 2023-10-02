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
							<th>No. </th>
							<th>Motor</th>
							<th>Leasing</th>
							<th>DP</th>
							<th>Tenor</th>
							<th>Potongan Tenor</th>
							<th>Cicilan</th>
							<th>Action</th> <!-- Added Action Column -->
						</tr>
					</thead>
					<tbody>
						@foreach ($cicilan as $c)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $c->motor_name }}</td>
							<td>{{ $c->leasing_name }}</td>
							<td>{{ 'Rp. ' . number_format($c->dp, 0, ',', '.') }}</td>
							<td>{{ $c->tenor }}</td>
							<td>{{ $c->potongan_tenor }}</td>
							<td>{{ 'Rp. ' . number_format($c->cicilan, 0, ',', '.') }}</td>
							<td class="text-center">
								<!-- Add your action button/link here -->
								<button type="button" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#editModal" data-id="{{ $c->id }}" data-dp="{{ $c->potongan_tenor }}">Edit</button>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>No. </th>
							<th>Motor</th>
							<th>Leasing</th>
							<th>DP</th>
							<th>Tenor</th>
							<th>Potongan Tenor</th>
							<th>Cicilan</th>
							<th>Action</th> <!-- Added Action Column -->
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h5 class="modal-title" id="editModalLabel">Edit Data PriceList Cicilan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="editForm" method="POST">
					@csrf
					@method('PUT')
					<!-- Example: Input field for editing 'dp' -->
					<div class="form-group">
						<label for="dp">Potongan Tenor</label>
						<input type="text" class="form-control" id="dp" name="potongan_tenor">
					</div>
					<!-- Add more input fields as needed -->

					<button type="submit" class="btn btn-primary">Save Changes</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@push('script')
<script>
	$("#example1").DataTable({
		"responsive": true,
		"lengthChange": false,
		"autoWidth": false,
	}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
<script>
	$(document).ready(function() {
		// Handle the click event of the "Edit" button
		$('.edit-button').click(function() {
			// Get data attributes from the clicked button
			var id = $(this).data('id');
			var dp = $(this).data('dp');

			// Set the form action to the appropriate route
			var editForm = $('#editForm');
			editForm.attr('action', "{{ route('admin.cicilan.update', '') }}" + '/' + id);

			// Populate the modal fields with data
			$('#dp').val(dp);

			// Show the modal
			$('#editModal').modal('show');
		});
	});
</script>
@endpush