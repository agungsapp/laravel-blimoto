@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="callout callout-danger">
										<h5><i class="fas fa-info"></i> Catatan Penting:</h5>
										<p>Harap memeriksa kembali dan pastikan bahwa nomor rekening konsumen sudah benar dan tidak ada kesalahan.
												<br>
												Setiap kesalahan transfer akibat kelalaian akan dikenakan sanksi sesuai dengan kebijakan perusahaan.
										</p>
								</div>

						</div>
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header with-border">
												<h3 class="card-title">Data Bank Konsumen</h3>
										</div>
										<form action="{{ route('admin.refund.manual-refund.store') }}" method="post">
												@csrf
												<div class="card-body">
														<input type="hidden" name="idp" value="{{ $penjualan->id }}">
														<div class="row">
																<div class="form-group col-md-10">
																		<label for="input-hasil">Nama Lengkap Konsumen</label>
																		<input name="konsumen" type="text" class="form-control" placeholder="Nama konsumen"
																				value="{{ old('konsumen') }}" readonly>
																</div>
														</div>
														<div class="row">
																<div class="form-group col-md-4">
																		<label>Rekening Bank</label>
																		<select id="bank-select" name="bank" class="form-control select2" style="width: 100%;">
																				<option value="" selected>-- Pilih bank --</option>
																				<option value=""></option>
																		</select>
																</div>
																<div class="form-group col-md-6">
																		<label for="norek">Nomor Rekening</label>
																		<input name="norek" type="text" class="form-control" placeholder="masukan nomor rekening"
																				id="norek" value="{{ old('norek') }}">
																</div>
														</div>


														{{-- pengajuan area --}}
														<div class="row">
																<div class="form-group col-md-10">
																		<label for="input-hasil">Nominal Refund</label>
																		<input name="nominal" type="number" class="form-control" placeholder="Nama nominal"
																				value="{{ old('nominal') ?? $penjualan->dp }}">
																</div>
																<div class="form-floating col-10">
																		<label for="catatan">Catatan :</label>
																		<textarea class="form-control" placeholder="Catatan untuk CEO" name="catatan" id="catatan"></textarea>
																</div>
														</div>

														{{-- button --}}

														<div class="row mt-5">
																<div class="col-12">
																		<div style="max-width: 50%" class="d-flex justify-content-center mx-auto">
																				<button type="submit" class="btn btn-block btn-danger">Kirim Pengajuan Refund</button>
																		</div>
																</div>
														</div>
												</div>
										</form>

								</div>

						</div>
				</div>
		</section>
@endsection


@push('script')
		<script>
				$(document).ready(function() {

						// Initialize select2
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
												alert("Gagal mengambil data bank");
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
@endpush
