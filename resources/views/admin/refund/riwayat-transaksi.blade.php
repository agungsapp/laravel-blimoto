@extends('admin.layouts.main')
@section('content')
		{{-- data table --}}
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Riwayat Transaksi Pembayaran</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body table-responsive">

												<table id="data-kota" class="table-bordered table-striped table">
														<thead>
																<tr role="row">
																		<th>NO</th>
																		<th>Kode Bayar</th>
																		<th>Jumlah Pembayaran</th>
																		<th>Sisa Tagihan</th>
																		<th>Periode</th>
																		<th>Tujuan</th>
																		<th>Tanggal Pembayaran</th>
																		<th width=100px">Action</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($pembayarans as $index => $p)
																		<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $p->kode_bayar }}</td>
																				<td>{{ Str::rupiah($p->jumlah_bayar) }}</td>
																				<td>{{ Str::rupiah($p->sisa_bayar) }}</td>
																				<td>{{ $p->periode }}</td>
																				<td class="text-capitalize">{{ $p->status == 'tanda' ? 'tanda jadi' : $p->status }}</td>
																				<td>{{ $p->created_at->isoFormat('D MMMM YYYY, HH.mm') }}</td>
																				<td>


																						@if (optional($p->pembayaran)->id != null)
																								@php
																										$refundStatus = optional($p->refund)->status_pengajuan;
																								@endphp
																								@if ($refundStatus === 'menunggu' || is_null($refundStatus))
																										<a href="{{ route('admin.refund.manual-refund.show', $p->id) }}"
																												class="btn btn-danger w-100 load-refund-modal mb-1"
																												{{ $refundStatus === 'menunggu' ? 'disabled' : '' }}>
																												{{ $refundStatus ?? 'Refund' }}
																										</a>
																								@else
																										<a class="btn btn-success" href="{{ route('admin.refund.status.index') }}">Refund
																												status</a>
																								@endif
																						@endif



																						<!-- Button trigger modal -->
																						<button type="button" class="btn btn-warning" data-toggle="modal" {{-- data-url="{{ route('admin.penjualan.getPenjualan', ['id' => $p->id]) }}" --}}
																								data-target="#modalRefund">
																								Refund
																						</button>

																						<!-- Modal -->
																						<div class="modal fade" id="modalRefund" tabindex="-1" aria-labelledby="modalRefundLabel"
																								aria-hidden="true">
																								<div class="modal-dialog">
																										<div class="modal-content">
																												<div class="modal-header">
																														<h5 class="modal-title" id="modalRefundLabel">Ajukan refund</h5>
																														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																																<span aria-hidden="true">&times;</span>
																														</button>
																												</div>
																												<form action="" method="POST">
																														@csrf
																														<div class="modal-body">
																																<div class="form-group">
																																		<label for="jumlah">Jumlah Pembayaran</label>
																																		<input type="text" class="form-control" id="jumlah">
																																</div>
																																<div class="form-group">
																																		<label for="catatan">Alasa Refund</label>
																																		<textarea type="text" class="form-control" id="catatan"></textarea>
																																</div>
																														</div>
																														<div class="modal-footer d-flex justify-content-between">
																																<a href="{{ route('admin.refund.manual-refund.show', $p->id_penjualan) }}"
																																		class="btn btn-danger">Manual Transfer</a>
																																<div>
																																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																																		<button type="submit" class="btn btn-warning">Ajukan refund</button>
																																</div>
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
