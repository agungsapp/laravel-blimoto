@extends('admin.layouts.main')
@section('content')
<div class="row">
	<div class="col-12">
		<!-- general form elements -->
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Tambah data best motor</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form action="{{ route('admin.best-motor.store') }}" method="post">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<label for="exampleInputTypeMotor">Nama Kategori Best Motor</label>
						<input name="nama" type="text" class="form-control" id="exampleInputTypeMotor" placeholder="Masukan kategori best motor (Diskon Terbaik, DP Termurah, Harga Terbawah, dll)" value="{{ old('nama') }}">
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
		<!-- /.card -->
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Data Motor</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="dataBest" class="table-bordered table-striped table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nama Kategori</th>
							<th width="170px">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($best_motors as $index => $best_motor)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $best_motor->nama }}</td>
							<td>
								<div class="d-flex justify-content-between">
									<div class="btn-group">
										<form action="{{ route('admin.best-motor.destroy', $best_motor->id) }}" method="post">
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{ $best_motor->id }}">
												Edit
											</button>
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger show_confirm">Delete</button>
										</form>
									</div>
									<!-- Modal update -->
									<div class="modal fade" id="modalEdit{{ $best_motor->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel">Edit data: {{ $best_motor->nama }}</h4>
												</div>
												<form action="{{ route('admin.best-motor.update', $best_motor->id) }}" method="post">
													@csrf
													@method('PUT')
													<div class="modal-body">
														<div class="form-group">
															<label for="exampleInputTypeMotor">Nama Kategori Best Motor</label>
															<input name="nama_edit" type="text" class="form-control" id="exampleInputTypeMotor" placeholder="Masukan kategori best motor (Diskon Terbaik, DP Terumurah, Harga Terbawah, dll)" value="{{ $best_motor->nama }}">
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
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>
@endsection



@push('script')
<script>
	$(function() {
		$("#dataBest").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			//"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
		}).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
	});
	$(document).ready(function() {
		$('.show_confirm').click(function(event) {
			var form = $(this).closest("form");
			var name = $(this).data("name");
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
	})
</script>
@endpush