@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header with-border">
												<h3 class="card-title">Input Data Warna</h3>
										</div>
										<form action="{{ route('admin.color.color.store') }}" method="post">
												@csrf
												<div class="card-body">
														<div class="form-group">
																<label for="input-kota">Nama Warna</label>
																<input name="nama" type="text" class="form-control" id="input-color"
																		placeholder="Masukan warna (silver, black, white, dll)" value="{{ old('nama') }}">
														</div>
												</div>
												<div class="card-footer">
														<button type="submit" class="btn btn-primary">Submit</button>
												</div>
										</form>
								</div>

						</div>
				</div>
		</section>

		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Data Warna</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">

												<table id="data-kota" class="table-bordered table-striped table">
														<thead>
																<tr role="row">
																		<th>NO</th>
																		<th>Nama Kota</th>
																		<th width="170px">Action</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($colors as $index => $color)
																		<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $color->nama }}</td>
																				<td>
																						<div class="btn-group">
																								<form action="{{ route('admin.color.color.destroy', $color->id) }}" method="post">
																										<!-- Button trigger modal -->
																										<button type="button" class="btn btn-primary" data-toggle="modal"
																												data-target="#modalEdit{{ $color->id }}">
																												Edit
																										</button>
																										@csrf
																										@method('DELETE')
																										<button type="submit" class="btn btn-danger show_confirm">Delete</button>
																								</form>
																						</div>
																						<!-- Modal update -->
																						<div class="modal fade" id="modalEdit{{ $color->id }}" tabindex="-1" role="dialog"
																								aria-labelledby="myModalLabel">
																								<div class="modal-dialog" role="document">
																										<div class="modal-content">
																												<div class="modal-header">
																														<h4 class="modal-title" id="myModalLabel">Edit data: {{ $color->nama }}</h4>
																												</div>
																												<form action="{{ route('admin.color.color.update', $color->id) }}" method="post">
																														@csrf
																														@method('PUT')
																														<div class="modal-body">
																																{{ csrf_field() }}
																																<input type="hidden" value="{{ $color->id }}">
																																<div class="form-group">
																																		<label for="exampleInputTypeMotor">Nama Kota</label>
																																		<input value="{{ $color->nama }}" name="nama_edit" type="text" class="form-control"
																																				id="exampleInputTypeMotor"
																																				placeholder="Masukan kota (Jakarta Selatan, Bogor, Depok, dll)">
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
				$(function() {
						$("#data-kota").DataTable({
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
