@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="callout callout-info">
										<h5><i class="fas fa-info"></i> Informasi :</h5>
										<p>Silahkan lakukan pengajuan pengembalian secara manual dengan mengisi form ini, permohonan akan segera di
												review oleh CEO, jangan lupa berikan alasan refund pada kolom yang disediakan</p>
								</div>
						</div>
				</div>
		</section>

		{{-- data table --}}
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Data Sudah Bayar</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body table-responsive">

												<table id="data-kota" class="table-bordered table-striped table">
														<thead>
																<tr role="row">
																		<th>NO</th>
																		<th>Nama Konsumen</th>
																		<th>Nama Sales</th>
																		<th>Motor</th>
																		<th>Jumlah</th>
																		<th>DP</th>
																		<th>Diskon DP</th>
																		<th>Status Pembayaran</th>
																		<th>Kota</th>
																		<th>Leasing</th>
																		<th>Tanggal Dibuat</th>
																		<th>Tanggal Hasil</th>
																		<th width=100px">Action</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($penjualan as $index => $p)
																		<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $p->nama_konsumen }}</td>
																				<td>{{ $p->sales->nama }}</td>
																				<td>{{ $p->motor->nama }}</td>
																				<td>{{ $p->jumlah }}</td>
																				<td>{{ $p->dp }}</td>
																				<td>{{ $p->diskon_dp }}</td>
																				<td>{{ $p->status_pembayaran_dp }}</td>
																				<td>{{ $p->kota->nama }}</td>
																				{{-- @dd($p->leasing->nama) --}}
																				<td>{{ $p->leasing->nama ?? 'cash' }}</td>
																				<td>{{ $p->tanggal_dibuat }}</td>
																				<td>{{ $p->tanggal_hasil }}</td>
																				<td>
																						<a href="{{ route('admin.refund.riwayat.transaksi', $p->id) }}" class="btn btn-success">Riwayat
																								Transaksi</a>
																						{{-- @if (optional($p->detailPembayaran)->id != null)
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
																						@endif --}}

																						<div>
																								<button type="button" class="btn btn-secondary w-100 load-detail-modal mb-1"
																										data-id="{{ $p->id }}"
																										data-url="{{ route('admin.penjualan.getPenjualan', ['id' => $p->id]) }}" data-toggle="modal"
																										data-target="#modalDetail">
																										Detail
																								</button>
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
						}).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
				});
		</script>
@endpush
