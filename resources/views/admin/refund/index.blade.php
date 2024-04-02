@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header with-border">
												<h3 class="card-title">Input Data Sales</h3>
										</div>
										<form action="{{ route('admin.sales.store') }}" method="post">
												@csrf
												<div class="card-body">
														<div class="row">
																<div class="form-group col-md-6">
																		<label for="input-nama">Nama Sales</label>
																		<input name="nama" type="text" class="form-control" placeholder="Masukan nama sales"
																				value="{{ old('nama') }}">
																</div>
																<div class="form-group col-md-6">
																		<label for="input-kode">NIP Sales</label>
																		<input name="kode" type="text" class="form-control" placeholder="Masukan NIP sales"
																				value="{{ old('kode') }}">
																</div>
														</div>
														<div class="row">
																<div class="form-group col-md-6">
																		<label for="input-username">Username</label>
																		<input name="username" type="text" class="form-control" id="input-username"
																				placeholder="Masukan username sales" value="{{ old('username') }}">
																</div>
																<div class="form-group col-md-6">
																		<label for="input-password">Password</label>
																		<input name="password" type="password" class="form-control" placeholder="Masukan password">
																</div>
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
												<h3 class="card-title">Data Akun Sales</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">

												<div class="table-responsive">
														<table id="data-sale" class="table-bordered table-striped table">
																<thead>
																		<tr role="row">
																				<th>NO</th>
																				<th>Nama Konsumen</th>
																				<th>Nominal</th>
																				<th>Status</th>
																				<th>Catatan</th>
																				<th>Refunable</th>
																				<th width="170px">Action</th>
																		</tr>
																</thead>
																<tbody>
																		@foreach ($refunds as $index => $refund)
																				<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
																						<td>{{ $loop->iteration }}</td>
																						<td>{{ $refund->penjualan->nama_konsumen }}</td>
																						<td>{{ Str::rupiah($refund->nominal) }}</td>
																						<td>{{ $refund->status_pengajuan }}</td>
																						<td>{{ $refund->catatan ?? 'kosong' }}</td>
																						<td>
																								@php
																										$metode = ['transfer', 'va'];
																								@endphp

																								@if (in_array($refund->metode_pembayaran, $metode))
																										<span class="badge rounded-pill bg-danger">Manual Transfer</span>
																								@else
																										<span class="badge rounded-pill bg-success">Auto Midtrans</span>
																								@endif
																						</td>

																						<td>
																								<div class="btn-group">
																										<form action="{{ route('admin.sales.destroy', $refund->id) }}" method="post">
																												<!-- Button trigger modal -->
																												<button type="button" class="btn btn-warning" data-toggle="modal"
																														data-target="#modalEdit{{ $refund->id }}">
																														Update
																												</button>
																												@csrf
																												@method('DELETE')
																												<button type="submit" class="btn btn-danger show_confirm">Delete</button>
																										</form>
																								</div>
																								<!-- Modal update -->
																								<div class="modal fade" id="modalEdit{{ $refund->id }}" tabindex="-1" role="dialog"
																										aria-labelledby="myModalLabel">
																										<div class="modal-dialog" role="document">
																												<div class="modal-content">
																														<div class="modal-header">
																																<h4 class="modal-title" id="myModalLabel">Update status pengembalian
																																		{{ $refund->penjualan->nama_konsumen }}</h4>
																														</div>
																														<form action="{{ route('admin.refund.pengajuan-refund.update', $refund->id) }}"
																																method="post">
																																@csrf
																																@method('PUT')
																																<div class="modal-body">
																																		<input type="hidden" name="idr">
																																		<div class="form-group">
																																				<div class="row">
																																						<div class="form-group col-12">
																																								<select class="form-select form-control" aria-label="Default select example"
																																										name="status_pengajuan">
																																										<option value="">-- Status Pengajuan --</option>
																																										<option value="menunggu"
																																												{{ $refund->status_pengajuan == 'menunggu' ? 'selected' : '' }}>menunggu
																																										</option>
																																										<option value="proses"
																																												{{ $refund->status_pengajuan == 'proses' ? 'selected' : '' }}>proses</option>
																																										<option value="disetujui"
																																												{{ $refund->status_pengajuan == 'disetujui' ? 'selected' : '' }}>di setujui
																																										</option>
																																								</select>
																																						</div>
																																				</div>
																																		</div>
																																</div>
																																<div class="modal-footer">
																																		<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
																																		<button type="submit" class="btn btn-success">Update Status
																																		</button>
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
				</div>
		</section>
@endsection
@push('script')
		<script>
				$(function() {
						$("#data-sale").DataTable({
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
