{{-- @dd($refunds) --}}
@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Data Refund</h3>
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
																				<th>Metode Pembayaran</th>
																				<th>Refunable</th>
																				<th width="170px">Action</th>
																		</tr>
																</thead>
																<tbody>
																		@foreach ($refunds as $index => $refund)
																				<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
																						<td>{{ $loop->iteration }}</td>
																						<td>{{ $refund->detailPembayaran->penjualan->nama_konsumen }}</td>
																						<td>{{ Str::rupiah($refund->nominal) }}</td>

																						<td>
																								<span
																										class="badge {{ ['menunggu' => 'bg-info', 'proses' => 'bg-success', 'ditolak' => 'bg-danger'][$refund->status_pengajuan] ?? 'bg-secondary' }}">
																										{{ $refund->status_pengajuan }}
																								</span>
																						</td>
																						<td>{{ $refund->catatan ?? 'kosong' }}</td>
																						<td>{{ $refund->pembayaran->metode_pembayaran }}</td>
																						<td>
																								<span
																										class="badge rounded-pill {{ in_array($refund->pembayaran->metode_pembayaran, ['qris']) ? 'bg-success' : 'bg-danger' }}">
																										{{ in_array($refund->pembayaran->metode_pembayaran, ['qris', 'credit_card', 'gopay', 'shopeepay', 'kredivo', 'akulaku']) ? 'Auto Midtrans' : 'Manual Transfer' }}
																								</span>
																						</td>

																						<td>
																								<button type="button"
																										class="btn {{ $refund->status_pengajuan != 'menunggu' ? 'btn-secondary' : 'btn-success' }}"
																										data-toggle="modal" data-target="#modalSetuju{{ $refund->id }}"
																										{{ $refund->status_pengajuan != 'menunggu' ? 'disabled' : '' }}>
																										Acc
																								</button>
																								<button type="button"
																										class="btn {{ $refund->status_pengajuan != 'menunggu' ? 'btn-secondary' : 'btn-warning' }}"
																										data-toggle="modal" data-target="#modalTolak{{ $refund->id }}"
																										{{ $refund->status_pengajuan != 'menunggu' ? 'disabled' : '' }}>
																										Tolak
																								</button>

																								<!-- Modal setuju -->
																								<div class="modal fade" id="modalSetuju{{ $refund->id }}" tabindex="-1" role="dialog"
																										aria-labelledby="myModalLabel">
																										<div class="modal-dialog" role="document">
																												<div class="modal-content">
																														<div class="modal-header">
																																<h4 class="modal-title" id="myModalLabel">Persetujuan pengembalian dana
																																</h4>
																														</div>
																														<form action="{{ route('admin.refund.pengajuan-refund.update', $refund->id) }}"
																																method="post">
																																@csrf
																																@method('PUT')
																																<div class="modal-body">
																																		<input type="hidden" name="status_pengajuan" value="proses">
																																		<p>Anda akan menyetujui proses pengembalian dana konsumen
																																				<strong>{{ $refund->detailPembayaran->penjualan->nama_konsumen }}</strong> sejumlah
																																				<strong class="text-success">{{ Str::rupiah($refund->nominal) }}</strong> tindakan
																																				ini tidak dapat dibatalkan.
																																		</p>
																																</div>
																																<div class="modal-footer">
																																		<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
																																		<button type="submit" class="btn btn-success">Ya, Setuju
																																		</button>
																																</div>
																														</form>
																												</div>
																										</div>
																								</div>
																								<!-- Modal tolak -->
																								<div class="modal fade" id="modalTolak{{ $refund->id }}" tabindex="-1" role="dialog"
																										aria-labelledby="myModalLabel">
																										<div class="modal-dialog" role="document">
																												<div class="modal-content">
																														<div class="modal-header">
																																<h4 class="modal-title" id="myModalLabel">Tolak pengembalian dana</h4>
																														</div>
																														<form action="{{ route('admin.refund.pengajuan-refund.update', $refund->id) }}"
																																method="post">
																																@csrf
																																@method('PUT')
																																<div class="modal-body">
																																		<input type="hidden" name="status_pengajuan" value="ditolak">
																																		<p>Anda akan menolak proses pengembalian dana konsumen
																																				<strong>{{ $refund->detailPembayaran->penjualan->nama_konsumen }}</strong> sejumlah
																																				<strong class="text-danger">{{ Str::rupiah($refund->nominal) }}</strong> tindakan
																																				ini tidak dapat dibatalkan.
																																		</p>
																																</div>
																																<div class="modal-footer">
																																		<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
																																		<button type="submit" class="btn btn-danger">Ya, Tolak
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
