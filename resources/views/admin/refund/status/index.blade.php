@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="callout callout-info">
										<h5><i class="fas fa-info"></i> Catatan Pengembalian Dana:</h5>
										<p>Pengembalian dana secara otomatis didukung untuk metode pembayaran <strong>Kartu Kredit, GoPay, ShopeePay,
														QRIS, Kredivo, dan Akulaku</strong>.</p>
										<ul>
												<li><strong>Otomatis:</strong> Manfaatkan tombol pengembalian dana untuk memproses secara otomatis oleh
														sistem.</li>
												<li><strong>Manual:</strong> Pengembalian dana untuk metode pembayaran seperti transfer bank dan Virtual
														Account (VA) dilakukan secara manual.</li>
												<li><strong>QRIS:</strong> Untuk pembayaran melalui QRIS yang menggunakan AirPay (Shopee) dan ShopeePay, batas
														waktu pengembalian dana adalah 24 jam. AirPay Shopee hanya menerima pengembalian dana dari pukul 06:00
														sampai 23:30 GMT+7.</li>
										</ul>
										<p>Apabila waktu pengembalian dana melebihi batas waktu yang ditentukan di atas, maka proses pengembalian
												dana—termasuk untuk metode pembayaran yang seharusnya didukung pengembalian dana otomatis harus dilakukan
												secara manual. Hal ini mungkin memerlukan koordinasi langsung dengan konsumen.</p>
								</div>
						</div>

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
																						<td>{{ $refund->penjualan->nama_konsumen }}</td>
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
																										class="badge rounded-pill {{ in_array($refund->pembayaran->metode_pembayaran, ['qris', 'credit_card', 'gopay', 'shopeepay', 'kredivo', 'akulaku']) ? 'bg-success' : 'bg-danger' }}">
																										{{ in_array($refund->pembayaran->metode_pembayaran, ['qris', 'credit_card', 'gopay', 'shopeepay', 'kredivo', 'akulaku']) ? 'Auto Midtrans' : 'Manual Transfer' }}
																								</span>
																						</td>

																						<td>
																								@php
																										$metodeDidukung = ['qris', 'credit_card', 'gopay', 'shopeepay', 'kredivo', 'akulaku'];
																								@endphp

																								@if (in_array($refund->pembayaran->metode_pembayaran, $metodeDidukung) && is_null($refund->manual))
																										<button type="button"
																												class="btn btn-block {{ in_array($refund->status_pengajuan, ['menunggu', 'ditolak', 'completed']) ? 'btn-secondary' : 'btn-success' }} mb-2"
																												data-toggle="modal" data-target="#modalAutoRefund{{ $refund->id }}"
																												{{ in_array($refund->status_pengajuan, ['menunggu', 'ditolak', 'completed']) ? 'disabled' : '' }}>
																												Auto Refund
																										</button>
																								@else
																										<button type="button"
																												class="btn btn-block {{ $refund->status_pengajuan === 'menunggu' ? 'btn-secondary' : 'btn-danger' }} mb-2"
																												data-toggle="modal" data-target="#modalTransfer{{ $refund->id }}"
																												{{ $refund->status_pengajuan === 'menunggu' ? 'disabled' : '' }}>
																												Proses Manual
																										</button>
																								@endif
																								<!-- Modal setuju -->
																								<div class="modal fade" id="modalAutoRefund{{ $refund->id }}" tabindex="-1" role="dialog"
																										aria-labelledby="myModalLabel">
																										<div class="modal-dialog" role="document">
																												<div class="modal-content">
																														<div class="modal-header">
																																<h4 class="modal-title" id="myModalLabel">Auto Refund By Midtrans
																																</h4>
																														</div>
																														<form id="formRefundRequest" action="{{ route('api.pengajuan.proses') }}" method="post">
																																@csrf
																																@method('POST')
																																<div class="modal-body">
																																		<input type="hidden" name="idp" value="{{ $refund->id_penjualan }}">
																																		<p>Anda hendak memproses permintaan pengembalian dana kepada konsumen
																																				<strong>{{ $refund->penjualan->nama_konsumen }}</strong> dengan nominal
																																				<strong class="text-success">{{ Str::rupiah($refund->nominal) }}</strong>. Tindakan
																																				ini bersifat final dan tidak dapat dibatalkan.
																																		</p>
																																		<p><span class="text-danger">*</span>Harap pastikan Anda telah memeriksa dan memastikan
																																				semua ketentuan terpenuhi sebelum melanjutkan.</p>
																																</div>
																																<div class="modal-footer">
																																		<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
																																		<button type="submit" class="btn btn-success">Ya, Proses
																																		</button>
																																</div>
																														</form>
																												</div>
																										</div>
																								</div>
																								<!-- Modal transfer -->
																								@if (!is_null($refund->manual))
																										<div class="modal fade" id="modalTransfer{{ $refund->id }}" tabindex="-1" role="dialog"
																												aria-labelledby="myModalLabel">
																												<div class="modal-dialog" role="document">
																														<div class="modal-content">
																																<div class="modal-header">
																																		<h4 class="modal-title" id="myModalLabel">Transfer pengembalian dana</h4>
																																</div>
																																<form action="{{ route('admin.refund.pengajuan-refund.update', $refund->id) }}"
																																		method="post" enctype="multipart/form-data">
																																		@csrf
																																		@method('PUT')
																																		<div class="modal-body">
																																				<input type="hidden" name="idr" value="{{ $refund->id }}">
																																				<p>Silahkan lakukan transfer dana ke konsumen
																																						<strong>{{ $refund->penjualan->nama_konsumen }}</strong> sejumlah
																																						<strong class="text-danger">{{ Str::rupiah($refund->nominal) }}</strong> kemudian
																																						upload bukti transfernya pada form di bawah ini.
																																				</p>

																																				{{-- form area --}}

																																				<div class="mb-3">
																																						<label for="konsumen" class="form-label">Nama Rekening</label>
																																						<input type="text" name="konsumen" class="form-control" id="konsumen"
																																								value="{{ $refund->manual->nama_rekening }}" readonly>
																																				</div>
																																				<div class="mb-3">
																																						<label for="norek" class="form-label">Nomor Rekening</label>
																																						<input type="number" name="norek" class="form-control" id="norek"
																																								value="{{ $refund->manual->norek }}" readonly>
																																				</div>
																																				<div class="mb-3">
																																						<label for="formFile" class="form-label">Upload bukti transfer</label>
																																						<input class="form-control" name="bukti" type="file" id="formFile">
																																				</div>

																																		</div>
																																		<div class="modal-footer">
																																				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
																																				<button type="submit" class="btn btn-danger">Konfirmasi transfer
																																				</button>
																																		</div>
																																</form>
																														</div>
																												</div>
																										</div>
																								@endif

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
				$(document).ready(function() {
						$("#formRefundRequest").submit(function(event) {
								event.preventDefault(); // Prevent the form from submitting through the browser.

								var actionUrl = $(this).attr('action');
								var formData = new FormData(this); // Create a FormData object, passing the form as a parameter

								$.ajax({
										url: actionUrl,
										type: 'POST',
										data: formData,
										contentType: false, // This is required for FormData to work correctly
										processData: false, // This is required for FormData to work correctly
										success: function(response) {
												console.log('Success:', response);
												Swal.fire({
														title: "Berhasil",
														text: response.message,
														icon: "success"
												});

												// window.location.reload();

										},
										error: function(xhr, status, error) {
												console.error('Failure:', xhr.responseText);
												// Actions to be performed when the request fails
										}
								});
						});
				});
		</script>
@endpush
