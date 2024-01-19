@extends('admin.layouts.main')
@section('content')

		<div class="row">
				<div class="col-12">
						<div class="card card-primary">
								<div class="card-header">
										<div class="card-title">
												Tambah data detail motor
										</div>
								</div>
								<form action="{{ route('admin.detail-motor.store') }}" method="post" enctype="multipart/form-data">
										@csrf
										@method('POST')
										<div class="card-body">
												<div class="row">
														<div class="form-group col-md-6">
																<label>Nama Motor</label>
																@if ($dataMotor == null)
																		<p class="text-danger">Tidak ada data motor silahkan buat terlebih dahulu !</p>
																@else
																		<select id="model" name="model" class="form-control select2 @error('model') is-invalid @enderror"
																				style="width: 100%;">
																				<option value="" selected>-- Pilih motor --</option>
																				@foreach ($dataMotor as $m)
																						<option value="{{ $m->id }}" {{ old('model') == $m->id ? 'selected' : '' }}>
																								{{ $m->nama }}</option>
																				@endforeach
																		</select>
																@endif
																@error('model')
																		<div class="alert alert-danger">{{ $message }}</div>
																@enderror
														</div>
														<div class="form-group col-md-6">
																<label for="warna-motor">Warna</label>
																<input name="warna-motor" type="text" class="form-control @error('warna-motor') is-invalid @enderror"
																		id="warna-motor" placeholder="Masukan warna motor" value="{{ old('warna-motor') }}">
																@error('warna-motor')
																		<div class="alert alert-danger">{{ $message }}</div>
																@enderror
														</div>
												</div>
												<div class="row">
														<div class="form-group col-md-5">
																<label for="exampleInputFile">Pilih Gambar</label>
																<input type="file" id="exampleInputFile" class="" name="gambar-motor">
																<p class="help-block">Silahkan pilih gambar motor</p>
																@error('gambar-motor')
																		<div class="alert alert-danger">{{ $message }}</div>
																@enderror
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
												Data Detail Motor
										</div>
								</div>
								<div class="card-body">
										<div class="table-responsive">
												<table id="dataDetail" class="table-bordered table-striped table">
														<thead>
																<tr>
																		<th>ID</th>
																		<th>Nama Motor</th>
																		<th>Warna Motor</th>
																		<th>Gambar</th>
																		<th width="120px">Action</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($motors as $motor)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $motor->motor->nama }}</td>
																				<td>{{ $motor->warna }}</td>
																				<td>{{ $motor->gambar }}</td>
																				<td>
																						<div class="d-flex justify-content-between">
																								<button data-toggle="modal" data-target="#modalEdit{{ $motor->id }}"
																										class="btn btn-warning">Edit</button>
																								<button class="btn btn-success" data-toggle="modal"
																										data-target="#modal-view-gambar-{{ $motor->id }}" data-placement="top"
																										title="Lihat Gambar">Lihat</button>
																								<form action="{{ route('admin.detail-motor.destroy', $motor->id) }}" method="post">
																										@csrf
																										@method('DELETE')
																										<button type="submit" class="btn btn-danger show_confirm">Delete</button>
																								</form>
																						</div>
																						<!-- modal update detail motor start -->
																						<div class="modal fade" id="modalEdit{{ $motor->id }}" tabindex="-1" role="dialog"
																								aria-labelledby="myModalLabel">
																								<div class="modal-dialog" role="document">
																										<div class="modal-content">
																												<div class="modal-header">
																														<h4 class="modal-title" id="myModalLabel">Edit data: {{ $motor->motor->nama }}</h4>
																												</div>
																												<form action="{{ route('admin.detail-motor.update', $motor->id) }}" method="post"
																														enctype="multipart/form-data">
																														@csrf
																														@method('PUT')
																														<div class="card-body">
																																<div class="form-group">
																																		<label for="warna-motor">Warna</label>
																																		<input name="warna-motor" value="{{ $motor->warna }}" type="text"
																																				class="form-control @error('warna-motor') is-invalid @enderror" id="warna-motor"
																																				placeholder="Masukan warna motor">
																																</div>
																																<div class="form-group">
																																		<label for="exampleInputFile">Pilih Gambar</label>
																																		<input type="file" id="exampleInputFile" class="" name="gambar-motor">
																																		<p class="help-block">Silahkan pilih gambar motor</p>
																																		@error('gambar-motor')
																																				<div class="alert alert-danger">{{ $message }}</div>
																																		@enderror
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
																						<!-- modal update detail motor end -->
																						<!-- modal lihat gambar start -->
																						<div class="modal fade" id="modal-view-gambar-{{ $motor->id }}" tabindex="-1"
																								role="dialog" aria-labelledby="myModalLabel">
																								<div class="modal-dialog" role="document">
																										<div class="modal-content">
																												<div class="modal-header">
																														<h4 class="modal-title" id="myModalLabel">Gambar: {{ $motor->motor->nama }}</h4>
																												</div>
																												<div class="modal-body">
																														<img src="{{ '/assets/images/detail-motor/' . $motor->gambar }}" width="100%"
																																height="50%" />
																												</div>
																												<div class="modal-footer">
																														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																												</div>
																										</div>
																								</div>
																						</div>
																						<!-- modal lihat gambar end -->
																				</td>
																		</tr>
																@endforeach
														</tbody>
														<tfoot>
																<tr>
																		<th>ID</th>
																		<th>Nama Motor</th>
																		<th>Warna Motor</th>
																		<th>Gambar</th>
																		<th width="120px">Action</th>
																</tr>
														</tfoot>
												</table>
										</div>
								</div>
								<!-- /.card-body -->
						</div>
				</div>
		</div>

@endsection


@push('script')
		<script>
				$(document).ready(function() {

						$("#dataDetail").DataTable({
								"responsive": true,
								"lengthChange": false,
								"autoWidth": false,
								//"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
						}).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');



						//Initialize Select2 Elements
						$('.select2').select2()

						$('.show_confirm').click(function(event) {
								var form = $(this).closest("form");
								var name = $(this).data("name");
								event.preventDefault();
								swal({
												title: `Delete Data Detail Motor ?`,
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
				})
		</script>
@endpush
