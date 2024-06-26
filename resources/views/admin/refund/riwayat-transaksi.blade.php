@extends('admin.layouts.main')
@section('content')
		{{-- data table --}}
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="card card-info">
										<div class="card-header">
												<div class="card-title">
														Ajukan Pengembalian Penuh
												</div>
										</div>
										<div class="card-body">
												<form action="{{ route('admin.refund.manual-refund.store') }}" method="POST">
														@csrf
														{{-- input hidden --}}
														<input type="hidden" name="status_refund" value="refund_penuh">
														<input type="hidden" name="idp" value="{{ $penuh->id }}">
														{{-- input hidden end --}}

														<div class="row">
																<div class="form-group col-md-6">
																		<label for="namaKonsumen">Nama Konsumen</label>
																		<input name="namaKonsumen" value="{{ $penuh->nama_konsumen }}" type="text" class="form-control"
																				readonly>
																</div>
																<div class="form-group col-md-6">
																		<label for="metode_pembayaran">Metode Pembayaran</label>
																		<input name="metode_pembayaran" value="{{ $penuh->metode_pembayaran }}" type="text"
																				class="form-control" readonly>
																</div>
														</div>

														<div class="row">
																<div class="form-group col-md-6">
																		<label for="dp">DP</label>
																		<input id="dp" name="dp" type="text" class="form-control"
																				value="{{ $penuh->detail_pembayaran_sum_jumlah_bayar }}" readonly>
																</div>

																<div class="form-group col-md-6">
																		<label for="motor">Nama Motor</label>
																		<input name="motor" value="{{ $penuh->motor->nama }}" type="text" class="form-control" readonly>
																</div>
														</div>
														<div class="row mb-3">
																<div class="form-group col-12" style="margin: 0 25px 0 25px;">
																		<input type="checkbox" class="form-check-input" id="opsiDp">
																		<label class="form-check-label" for="opsiDp">Opsi dp berbeda</label>
																</div>
														</div>



														<div class="row">
																<div class="form-group col-md-4">
																		<label for="input-hasil">Nama Rekening Bank</label>
																		<input name="konsumen" type="text" class="form-control" placeholder="Nama konsumen"
																				value="{{ old('konsumen') }}" readonly>
																</div>
																<div class="form-group col-md-4">
																		<label>Rekening Bank</label>
																		<select id="bank-select" name="bank" class="form-control select2" style="width: 100%;">
																				<option value="" selected>-- Pilih bank --</option>
																				<option value=""></option>
																		</select>
																</div>
																<div class="form-group col-md-4">
																		<label for="norek">Nomor Rekening</label>
																		<input name="norek" type="text" class="form-control" placeholder="masukan nomor rekening"
																				id="norek" value="{{ old('norek') }}">
																</div>
														</div>
														{{-- pengajuan area --}}
														<div class="row">
																{{-- <div class="form-group col-md-10">
																		<label for="input-hasil">Nominal Refund</label>
																		<input name="nominal" type="number" class="form-control" placeholder="Nama nominal"
																				value="{{ old('nominal') ?? $pembayaran->jumlah_bayar }}">
																</div> --}}
																<div class="form-floating col-12">
																		<label for="catatan">Catatan :</label>
																		<textarea class="form-control" placeholder="Catatan untuk CEO" name="catatan" id="catatan"></textarea>
																</div>
														</div>



														<button class="btn btn-success btn-block mt-3" disabled type="button"
																onclick="alert('fitur ini belum tersedia 🙏')">Ajukan</button>
												</form>
										</div>
								</div>
						</div>
				</div>
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
																		<th width="150px">Action</th>
																</tr>
														</thead>
														<tbody>
																@php
																		$totalBayar = 0;
																		$lastTagihan = 0;
																@endphp
																@foreach ($pembayarans as $index => $p)
																		@php
																				$totalBayar += (int) $p->jumlah_bayar;
																				$lastTagihan = $p->sisa_bayar;
																		@endphp
																		<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $p->kode_bayar }}</td>
																				<td>{{ Str::rupiah($p->jumlah_bayar) }}</td>
																				<td>{{ Str::rupiah($p->sisa_bayar) }}</td>
																				<td>{{ $p->periode }}</td>
																				<td class="text-capitalize">{{ $p->status == 'tanda' ? 'tanda jadi' : $p->status }}</td>
																				<td>{{ $p->created_at->isoFormat('D MMMM YYYY, HH.mm') }}</td>
																				<td>

																						@if ($p->refund?->count() == 1)
																								<span class="btn btn-success">{{ $p->refund->status_pengajuan }}</span>
																						@else
																								<a href="{{ route('admin.refund.manual-refund.show', $p->id) }}"
																										class="btn btn-block btn-warning mb-2">
																										refund </a>
																						@endif

																						{{-- @if (optional($p->pembayaran)->id != null)
																								@php
																										$refundStatus = optional($p->refund)->status_pengajuan;
																								@endphp
																								@if ($refundStatus === 'menunggu' || is_null($refundStatus))
																										<button type="button" class="btn btn-warning w-100 load-refund-modal mb-1"
																												data-id="{{ $p->id }}"
																												data-url="{{ route('admin.penjualan.getDataRefund', ['id' => $p->id]) }}"
																												data-toggle="modal" data-target="#modalRefund"
																												{{ $refundStatus === 'menunggu' ? 'disabled' : '' }}>
																												{{ $refundStatus ?? 'Refund' }}
																										</button>
																								@else
																										<a class="btn btn-success btn-block mb-1"
																												href="{{ route('admin.refund.status.index') }}">Refund
																												status</a>
																								@endif
																						@endif --}}

																				</td>
																		</tr>
																@endforeach

																<tr>
																		<td colspan="2"> <strong>
																						Total dibayarkan :
																				</strong>
																		</td>
																		<td colspan="2"> <strong>
																						{{ Str::rupiah($totalBayar) }}
																				</strong>
																		</td>
																		<td colspan="2"> <strong>
																						Sisa Tagihan :
																				</strong>
																		</td>
																		<td colspan="2"> <strong>
																						{{ Str::rupiah($lastTagihan) }}
																				</strong>
																		</td>
																</tr>

														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</section>

		{{-- modal refund --}}
		<section>
				<div class="modal fade" id="modalRefund" role="dialog" {{-- data-base-refund-url="{{ route('api.pengajuan.refund', '__idr__') }}" --}}>
						<div class="modal-dialog" role="document">
								<div class="modal-content">
										<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Ajukan pengembalian dana </h4>
										</div>
										<form id="modalRefundForm" action="{{ route('api.pengajuan.refund', '__idr__') }}" method="post">
												@csrf
												@method('POST')

												<div class="modal-body">
														<input type="hidden" name="idr">
														<div class="form-group">
																<div class="row">
																		<div class="form-group col-md-6">
																				<label for="konsumen">Nama Konsumen</label>
																				<input name="konsumen" type="text" class="form-control" readonly>
																		</div>
																		<div class="form-group col-md-6">
																				<label for="metode_pembayaran">Metode Pembayaran</label>
																				<input name="metode_pembayaran" type="text" class="form-control" readonly>
																		</div>
																</div>

																<div class="row">
																		<div class="form-group col-md-6">
																				<label for="dp">DP</label>
																				<input id="dp" name="dp" type="text" class="form-control" readonly>
																		</div>

																		<div class="form-group col-md-6">
																				<label for="motor">Nama Motor</label>
																				<input name="motor" type="text" class="form-control" readonly>
																		</div>
																</div>
																<div class="row mb-3">
																		<div class="form-group col-12" style="margin: 0 25px 0 25px;">
																				<input type="checkbox" class="form-check-input" id="opsiDp">
																				<label class="form-check-label" for="opsiDp">Opsi dp berbeda</label>
																		</div>
																</div>
																<div class="row">
																		<div class="form-floating col-12">
																				<label for="catatan">Catatan :</label>
																				<textarea class="form-control" placeholder="Catatan untuk CEO" name="catatan" id="catatan"></textarea>
																		</div>
																</div>
														</div>
												</div>
												<div class="modal-footer">
														<div class="d-flex justify-content-between col-12">
																{{-- <div class="mr-auto">
																		<a href="{{ route('admin.refund.manual-refund.index') }}" class="btn btn-outline-danger">Ajukan
																				refund manual</a>
																</div>
																<div>
																</div> --}}
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-success">Ajukan Refund</button>
														</div>
												</div>

										</form>

								</div>
						</div>
				</div>
		</section>
@endsection


@push('script')
		{{-- sc get api rekening --}}
		<script>
				$(document).ready(function() {

						$('.select2').select2()
						// Fetch bank data
						$.ajax({
								url: "/api/get-bank",
								type: "GET",
								success: function(response) {
										if (response.status) {
												response.data.forEach(function(bank) {
														$('#bank-select').append($('<option>', {
																value: bank.kodeBank,
																text: bank.namaBank
														}));
												});
										} else {
												$('#bank-select').append($('<option>', {
														value: "",
														text: "data bank tidak ditemukan"
												}));
												alert("Gagal mengambil data bank, periksa koneksi internet anda !");
										}
								},
								error: function(e) {
										alert("Error saat menghubungi API: " + e.message);
								}
						});

						// Disable submit button initially
						$('button[type="submit"]').prop('disabled', true);

						// Function to check account
						function checkAccount() {
								var bank = $('#bank-select').val();
								var norek = $('#norek').val();

								if (bank && norek) {
										$.ajax({
												url: "/api/get-acc",
												type: "POST",
												data: {
														bank: bank,
														norek: norek
												},
												headers: {
														'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
												},
												success: function(response) {
														if (response.status && response.data) {
																// Fill the consumer name with account name from response
																$('input[name="konsumen"]').val(response.data.accountname);
																// Enable submit button if there's a consumer name
																$('button[type="submit"]').prop('disabled', false);
														}
												},
												error: function(xhr, status, error) {
														console.error("Error: " + status + " " + error);
												}
										});
								}
						}

						// Event handler for bank selection change
						$('#bank-select').change(function() {
								checkAccount();
						});

						// Typing delay for norek input
						var typingTimer;
						var doneTypingInterval = 1000; // 1 second

						// Event handlers for norek input
						$('#norek').on('keyup', function() {
								clearTimeout(typingTimer);
								typingTimer = setTimeout(checkAccount, doneTypingInterval);
						}).on('keydown', function() {
								clearTimeout(typingTimer);
						});
				});
		</script>


		{{--  SC MODAL REFUND --}}
		<script>
				$(document).ready(function() {

						const dp = $('#dp');
						const opsiDp = $('#opsiDp');
						// Menangkap event 'change' pada checkbox
						opsiDp.change(function() {
								// Mengecek apakah checkbox ter-check atau tidak
								if ($(this).is(':checked')) {
										// Jika ter-check, hapus atribut 'readonly' pada dp
										dp.removeAttr('readonly');
								} else {
										// Jika tidak ter-check, tambahkan atribut 'readonly' pada dp
										dp.attr('readonly', 'readonly');
								}
						});

						$.ajaxSetup({
								headers: {
										'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								}
						});
				});

				$(document).on('click', '.load-refund-modal', function() {
						var dataUrl = $(this).data('url');
						var modalId = '#modalRefund';
						var modal = $(modalId);
						var baseActionUrl = modal.data('base-refund-url');

						$.ajax({
								url: dataUrl,
								type: 'GET',
								dataType: 'json',
								success: function(response) {
										var data = response.data; // Ensure you are referencing the data object correctly
										var dpValue = Number(data.jumlah_bayar);
										// Populate the modal's form fields with the fetched data
										modal.find('[name="konsumen"]').val(data.penjualan.nama_konsumen);
										modal.find('[name="dp"]').val(data.jumlah_bayar);
										modal.find('[name="metode_pembayaran"]').val(data.penjualan.metode_pembayaran);
										modal.find('[name="motor"]').val(data.penjualan.motor.nama);
										modal.find('[name="idr"]').val(data.id);
										modal.find('[name="dp"]').val(dpValue);
										// Show the modal
										var actionUrl = baseActionUrl.replace('__idr__', data.id);
										console.log(data.id, actionUrl)
										modal.modal('show');
								},
								error: function(xhr, status, error) {
										alert('An error occurred: ' + error);
								}
						});
				});


				$(document).ready(function() {
						$('#modalRefundForm').on('submit', function(e) {
								console.log("form submit di trigger")
								e.preventDefault(); // Menghentikan form dari submit secara default
								var form = $(this);
								var actionUrl =
										'{{ route('api.pengajuan.refund', '__idr__') }}'; // Pastikan ini mendapatkan URL yang benar
								// Log untuk debugging
								console.log('Submitting form to: ', actionUrl);
								var formData = new FormData(this);
								$.ajax({
										url: actionUrl,
										type: 'POST',
										data: formData,
										contentType: false,
										processData: false,
										success: function(response) {
												// Tutup modal setelah request sukses
												console.log('response ke BE simpan pengajuan refund sukses lurr')
												// console.log(response.data)
												console.log(response);
												// alert(response.message)
												$('#modalRefund').modal('hide');

												Swal.fire({
														title: "Berhasil",
														text: response.message,
														icon: "success"
												});

												window.location.reload();
										},
										error: function(xhr, status, errorThrown) {
												console.log(errorThrown, "gagal lur")
												let errorMessage = xhr.responseJSON.error || "Terjadi kesalahan, silakan coba lagi.";
												// Jika ada errors dari validasi
												if (xhr.responseJSON.errors) {
														const errors = xhr.responseJSON.errors;
														const firstError = Object.keys(errors)[0];
														errorMessage = errors[firstError][0]; // Ambil pesan error pertama
												}

												Swal.fire({
														title: "Error",
														text: errorMessage,
														icon: "error"
												});
										}
								});
						});
				})
		</script>
@endpush
