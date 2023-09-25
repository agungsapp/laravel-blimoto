@extends('admin.layouts.main')
@section('content')



<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				<div class="card-title">
					Tambah brosur motor
				</div>
			</div>
			<form action="{{ route('admin.brosur-motor.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('POST')
				<div class="card-body">
					<!-- /.row -->
					<div class="form-group">
						<label>Nama Motor</label>
						@if ($motors == null)
						<p class="text-danger">Tidak ada data motor silahkan buat terlebih dahulu !</p>
						@else
						<select name="motor" class="form-control select2" style="width: 100%;">
							<option value="">-- Pilih Nama Motor --</option>
							@foreach ($motors as $motor)
							<option value="{{ $motor->id }}">{{ $motor->nama }}</option>
							@endforeach
						</select>
						@endif
					</div>
					<div class="form-group">
						<label>Is Populer</label>
						<select name="is-popular" class="form-control">
							<option value="">-- Pilih Kategori --</option>
							<option value="0">Tidak Populer</option>
							<option value="1">Populer</option>
						</select>
					</div>
					<div class="form-group">
						<input type="file" id="exampleInputFile" name="file-pdf">
						<p class="help-block">Silahkan pilih pdf motor</p>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Data Brosur Motor</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="data-brosur" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
								<th>Nomor</th>
								<th>Nama Motor</th>
								<th>Nama File</th>
								<th>Is Populer</th>
								<th width="170px">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($brosur_motors as $index => $brosur)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $brosur->motor->nama }}</td>
								<td> {{$brosur->nama_file}} </td>
								<td> {{$brosur->is_popular ? 'Populer' : 'Tidak Populer' }}</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit{{$brosur->id}}">
											Edit
										</button>
										<button class="btn btn-success" data-toggle="modal" data-target="#modalView{{$brosur->id}}" data-placement="top" title="View PDF file">Lihat</button>
										<form action="{{ route('admin.brosur-motor.destroy', $brosur->id) }}" method="post">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger">Delete</button>
										</form>
									</div>
									<!-- Modal update -->
									<div class="modal fade" id="modalEdit{{$brosur->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel">Edit data: {{$brosur->motor->nama}}</h4>
												</div>
												<form action="{{ route('admin.brosur-motor.update', $brosur->id) }}" method="post" enctype="multipart/form-data">
													@csrf
													@method('PUT')
													<div class="modal-body">
														<div class="card card-primary">
															<div class="card-header with-border">
																<h3 class="card-title">Update Data brosur Motor</h3>
															</div>
															@csrf
															<input type="hidden" value="{{$brosur->id}}">
															<div class="card-body">
																<div class="form-group">
																	<label>Nama Motor</label>
																	<input type="text" class="form-control" value="{{$brosur->motor->nama}}" disabled="">
																</div>
																<div class="form-group">
																	<label>Is Populer</label>
																	<select name="is-popular" class="form-control">
																		<option value="0" {{ $brosur->is_popular == 0 ? 'selected' : '' }}>Tidak Populer</option>
																		<option value="1" {{ $brosur->is_popular == 1 ? 'selected' : '' }}>Populer</option>
																	</select>
																</div>
																<div class="form-group">
																	<input type="file" id="exampleInputFile" name="file-pdf">
																	<p class="help-block">Silahkan pilih pdf motor</p>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Save changes</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- end modal update -->
									<!-- modal view pdf -->
									<div class="modal fade" id="modalView{{$brosur->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel">PDF{{$brosur->motor->nama}}</h4>
												</div>
												<div class="modal-body">
													<embed src="{{ '/assets/pdfs/' . $brosur->nama_file }}" width="100%" height="500" alt="pdf" />
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<!-- end modal view pdf -->
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection


@push('script')
<script>
	$(document).ready(function() {
		//Initialize Select2 Elements
		$('.select2').select2()
	})

	$(function() {
		$("#data-brosur").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			//"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
		}).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
	});
</script>
@endpush