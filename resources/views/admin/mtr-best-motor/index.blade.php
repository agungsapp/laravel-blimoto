@extends('admin.layouts.main')
@section('content')
<div class="row">
	<div class="col-12">
		<!-- general form elements -->
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Tambah data best untuk motor</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form action="{{ route('admin.mtr-best-motor.store') }}" method="post">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label>Pilih Motor</label>
							@if ($motor == null)
							<p>Tidak ada data motor silahkan buat terlebih dahulu !</p>
							@else
							<select name="motor" class="form-control select2">
								<option value="">-- pilih motor --</option>
								@foreach ($motor as $mtr)
								<option value="{{ $mtr->id }}">{{ $mtr->nama }}</option>
								@endforeach
							</select>
							@endif
						</div>
						<div class="form-group col-md-6">
							<label>Pilih Kategori Best Motor</label>
							@if ($mtrKategori == null)
							<p>Tidak ada data kategori best motor silahkan buat terlebih dahulu !</p>
							@else
							<select name="kategori" class="form-control select2">
								<option value="">-- pilih kategori best motor --</option>
								@foreach ($mtrKategori as $k)
								<option value=" {{ $k->id }}">{{ $k->nama }}</option>
								@endforeach
							</select>
							@endif
						</div>
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
				<h3 class="card-title">Data Kategori Best Motor</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="dataBest" class="table-bordered table-striped table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Motor</th>
							<th>Nama Kategori</th>
							<th width="170px">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($mtrKategoriMotor as $index => $ktgMtr)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $ktgMtr->motor->nama ?? 'N/A' }}</td>
							<td>{{ $ktgMtr->bestMotor->nama ?? 'N/A' }}</td>
							<td>
								<div class="d-flex justify-content-between">
									<div class="btn-group">
										<form action="{{ route('admin.mtr-best-motor.destroy', $ktgMtr->id) }}" method="post">
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{ $ktgMtr->id }}">
												Edit
											</button>
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger show_confirm">Delete</button>
										</form>
									</div>
									<!-- Modal update -->
									<div class="modal fade" id="modalEdit{{ $ktgMtr->id }}" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel">Edit data: {{ $ktgMtr->motor->nama }}</h4>
												</div>
												<form action="{{ route('admin.mtr-best-motor.update', $ktgMtr->id) }}" method="post">
													@csrf
													@method('PUT')
													<div class="modal-body">
														<div class="row">
															<div class="form-group col-md-6">
																<label>Pilih Motor</label>
																<select name="motor" class="form-control select2">
																	@foreach ($motor as $mtr)
																	<option value="{{ $mtr->id }}" @if($ktgMtr->motor->id === $mtr->id) selected @endif>{{ $mtr->nama }}</option>
																	@endforeach
																</select>
															</div>
															<div class="form-group col-md-6">
																<label>Pilih Kategori Best Motor</label>
																<select name="kategori" class="form-control select2">
																	@foreach ($mtrKategori as $k)
																	<option value=" {{ $k->id }}" @if($ktgMtr->Bestmotor->id === $k->id) selected @endif>{{ $k->nama }}</option>
																	@endforeach
																</select>
															</div>
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
	$('.select2').select2()
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