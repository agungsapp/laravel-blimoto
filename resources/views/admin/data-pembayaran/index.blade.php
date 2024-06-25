@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="card card-danger">
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
																		<th>Konsumen stor</th>
																		{{-- <th>DP</th>
																		<th>Diskon DP</th> --}}
																		<th>TDP</th>
																		<th>Status Pembayaran Terakhir</th>
																		@if (!Route::is('admin.sudah-bayar'))
																				<th>Sisa Tagihan</th>
																		@endif
																		<th>Leasing</th>
																		<th>Tanggal Dibuat</th>
																		{{-- <th>Tanggal Hasil</th> --}}
																		<th width=100px">Action</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($penjualan as $index => $p)
																		{{-- @dd($p->detailPembayaran) --}}
																		<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $p->nama_konsumen }}</td>
																				<td>{{ $p->sales->nama }}</td>
																				<td>{{ $p->motor->nama }}</td>
																				<td>{{ Str::rupiah($p->total_lunas) }}</td>
																				{{-- <td>{{ Str::rupiah($p->dp) }}</td>
																				<td>{{ $p->diskon_dp }}</td> --}}
																				<td>{{ Str::rupiah($p->dp) }}</td>
																				<td>{{ $p->status_pembayaran_dp }}</td>
																				@if (!Route::is('admin.sudah-bayar'))
																						<td>{{ Str::rupiah($p->sisa_bayar) }}</td>
																				@endif
																				<td>{{ $p->leasing->nama ?? 'CASH' }}</td>
																				<td>{{ $p->tanggal_dibuat }}</td>
																				{{-- <td>{{ $p->tanggal_hasil }}</td> --}}
																				<td>
																						<div>
																								<button type="button" class="btn btn-secondary w-100 load-detail-modal mb-1"
																										data-id="{{ $p->id }}"
																										data-url="{{ route('admin.penjualan.getDetail', ['id' => $p->id]) }}" data-toggle="modal"
																										data-target="#modalDetail">
																										Detail
																								</button>
																						</div>
																						@if (\Route::is('admin.sudah-bayartj'))
																								<div>
																										<button type="button" class="btn btn-success btn-block load-payment-modal mb-1"
																												data-id="{{ $p->id }}"
																												data-url="{{ route('admin.penjualan.payment-data', ['id' => $p->id]) }}"
																												data-action-url="{{ route('admin.penjualan.pelunasanOffline', ['id' => $p->id]) }}"
																												data-toggle="modal" data-target="#modalBayar">
																												Pelunasan
																										</button>
																								</div>
																						@endif

																						{{-- note : fitur refund dimatikan di pindah ke detail karna berkaitan has many transaksi --}}
																						{{-- @if (optional($p->detailPembayaran[0]->pembayaran)->id != null)
																								@php
																										$refundStatus = optional($p->refund)->status_pengajuan;
																								@endphp
																								@if ($refundStatus === 'menunggu' || is_null($refundStatus))
																										<button type="button" class="btn btn-warning w-100 load-refund-modal mb-1"
																												data-id="{{ $p->id }}"
																												data-url="{{ route('admin.penjualan.getPenjualan', ['id' => $p->id]) }}" data-toggle="modal"
																												data-target="#modalRefund" {{ $refundStatus === 'menunggu' ? 'disabled' : '' }}>
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
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</section>

		{{-- modal bayar --}}
		<div class="modal fade" id="modalBayar" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Pelunasan sisa tagihan</h4>
								</div>
								<form action="" method="post">
										@csrf
										<input type="hidden" name="sales" id="id-sales">
										<input type="hidden" name="motor" id="motor">
										<input type="hidden" name="kode_bayar" id="kode_bayar">
										<input type="hidden" name="id_detail_pembayaran" id="id_detail_pembayaran">
										<div class="modal-body">

												<div class="form-group col-md-12">
														<label for="nama-sales">Nama Sales</label>
														<input type="text" class="form-control" id="nama-sales" readonly>
												</div>
												<div class="form-group col-md-12">
														<label for="nama-konsumen">Nama Konsumen</label>
														<input type="text" class="form-control" id="nama-konsumen" readonly name="konsumen">
												</div>
												<div class="form-group col-md-12">

														<label for="dp">DP</label>
														<input type="number" class="form-control" id="dp" name="dp" aria-describedby="dpHelp">
														<div id="dpHelp" class="form-text">Anda ingin melakukan konfirmasi pembayaran bahwa konsumen atas nama
																<strong id="nakon"></strong>
																telah melakukan pembayaran sebesar <strong id="takon" class="text-danger"></strong> ?. <br> Dengan
																menekan
																tombol <strong>Ya</strong> maka status pembayaran konsumen ini akan dinyatakan lunas.
														</div>
												</div>



												{{-- <label for="tujuan">Apa tujuan transaksi ini ?</label> <br>
												<div id="tujuan" class="btn-group" data-toggle="buttons">
														<label class="btn btn-outline-primary active">
																<input type="radio" name="tujuan" value="t" id="option1" autocomplete="off" checked> Tanda
																Jadi
														</label>
														<label class="btn btn-outline-primary">
																<input type="radio" name="tujuan" value="p" id="option2" autocomplete="off"> Pelunasan
														</label>
												</div> --}}

										</div>
										<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary" id="ipay-button">Ya</button>
										</div>
								</form>
						</div>
				</div>
		</div>

		<!-- Modal detail -->
		<section>
				<div class="modal fade" id="modalDetail" role="dialog">
						<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
								<div class="modal-content">
										<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Riwayat Transaksi</h4>
										</div>
										<div class="modal-body">
												{{-- LAST DI SINI TAMBAHAIN PAGI NANTI --}}
												<ul class="list-group list-group-flush" id="payment-list">
														<!-- Generated list items will be inserted here -->
												</ul>
										</div>
										<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
								</div>
						</div>
				</div>
		</section>

		<!-- Modal REFUND -->
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
																<div class="mr-auto">
																		<a href="{{ route('admin.refund.manual-refund.index') }}" class="btn btn-outline-danger">Ajukan
																				refund manual</a>
																</div>
																<div>
																		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																		<button type="submit" class="btn btn-success">Ajukan Refund</button>
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
				$(function() {
						$("#data-kota").DataTable({
								"responsive": true,
								"lengthChange": false,
								"autoWidth": false,
						}).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
				});
		</script>





		{{-- pembayaran --}}
		<script>
				$(document).on('click', '.load-payment-modal', function() {
						var url = $(this).data('url');
						var actionUrl = $(this).data('action-url');

						$.ajax({
								url: url,
								type: 'GET',
								dataType: 'json',
								success: function(data) {
										console.log(data)
										var formattedDp = parseFloat(data.detail_pembayaran[0].sisa_bayar).toLocaleString('id-ID', {
												style: 'currency',
												currency: 'IDR'
										});
										$('#modalBayar form').attr('action', actionUrl);
										$('#id-sales').val(data.sales.id);
										$('#nama-sales').val(data.sales.nama);
										$('#kode_bayar').val(data.detail_pembayaran[0].kode_bayar);
										$('#id_detail_pembayaran').val(data.detail_pembayaran[0].id);
										$('#nama-konsumen').val(data.nama_konsumen);
										$('#motor').val(data.motor.nama);
										$('#dp').val(Number(data.detail_pembayaran[0].sisa_bayar));


										$('#dp').attr('max', data.detail_pembayaran[0].sisa_bayar);
										$('#nakon').text(data.nama_konsumen);
										$('#takon').text(formattedDp);
								},
								error: function(xhr, status, error) {
										swal({
												title: `Error`,
												text: error,
												icon: "error",
												buttons: true,
												dangerMode: true,
										})
								}
						});
				});
		</script>
		<script>
				$(document).on('click', '#pay-button', function(e) {
						e.preventDefault();

						var form = $(this).closest('form');
						var formData = new FormData(form.get(0));

						fetch(form.attr('action'), {
										method: 'POST',
										headers: {
												'X-CSRF-TOKEN': '{{ csrf_token() }}',
												'Accept': 'application/json',
										},
										body: formData
								})
								.then(response => response.json())
								.then(data => {
										if (data.redirect_url) {
												// Open the Midtrans payment page in a new tab
												window.open(data.redirect_url, '_blank');
										} else {
												swal({
														title: `Error`,
														text: data.pesan,
														icon: "error",
														buttons: true,
														dangerMode: true,
												})
										}
								})
								.catch(error => {
										console.error('Error:', error);
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
										var dpValue = Number(data.dp);
										// Populate the modal's form fields with the fetched data
										modal.find('[name="konsumen"]').val(data.nama_konsumen);
										modal.find('[name="dp"]').val(data.dp);
										modal.find('[name="metode_pembayaran"]').val(data.metode_pembayaran);
										modal.find('[name="motor"]').val(data.motor.nama);
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


		{{-- modal detail new --}}

		<script>
				$(document).on('click', '.load-detail-modal', function() {
						var dataUrl = $(this).data('url');
						var modalId = '#modalDetail';
						var modal = $(modalId);

						$.ajax({
								url: dataUrl,
								type: 'GET',
								dataType: 'json',
								success: function(response) {
										var payments = response.data; // Assuming this is an array of payment objects
										var paymentList = modal.find('#payment-list');

										// Clear previous list items
										paymentList.empty();

										// Loop through payments and append to the list
										payments.forEach(function(payment) {
												var tandaIcon = payment.status === 'tanda' ? 'fa-plus-circle' : '';
												var lunasIcon = payment.status === 'pelunasan' ? 'fa-money' : '';
												var paymentType = payment.status === 'tanda' ? 'Pembayaran Tanda jadi ke-' :
														'Pelunasan pada periode ke-';

												let isLunas = payment.status === 'pelunasan' ?
														`<li class="list-group-item"><div class="w-100 bg-success rounded-3 py-2"><h2 class="text-center text-white">LUNAS</h2></div></li>` :
														'';

												var listItem = `
                        <li class="list-group-item">
                            <div class="w-100 row">
                                <div class="fs-6 col-1 d-flex align-items-center">
                                    ${tandaIcon ? `<i class="fa-3x fa text-success ${tandaIcon}" aria-hidden="true"></i>` : ''}
                                    ${lunasIcon ? `<i class="fa fa-3x text-success fa-check-circle" aria-hidden="true"></i>` : ''}
                                </div>
                                <div class="col-11">
                                    <div class="d-flex justify-content-between">
                                        <h3>${paymentType}<span>${payment.periode}</span></h3>
                                        <h4>RP.${payment.jumlah_bayar.toLocaleString()}</h4>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p><span>${formatDate(payment.created_at)}</span> . <span>${formatTime(payment.created_at)}</span></p>
                                        <span class="btn btn-success">${payment.pembayaran.metode_pembayaran}</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    `;
												paymentList.append(listItem);

												if (payment.status == 'pelunasan') {
														paymentList.append(isLunas)
												}
										});

										function formatTime(created_at) {

												const createdDate = new Date(created_at);
												const formattedTime = createdDate.toLocaleTimeString([], {
														hour: '2-digit',
														minute: '2-digit'
												});
												return formattedTime;


										}

										function formatDate(dateString) {
												var options = {
														year: 'numeric',
														month: '2-digit',
														day: '2-digit'
												};
												return new Date(dateString).toLocaleDateString('en-US', options);
										}

										// Show the modal
										modal.modal('show');
								},
								error: function(xhr, status, error) {
										alert('An error occurred: ' + error);
								}
						});
				});
		</script>

		{{-- modal detail --}}
		{{-- <script>
				$(document).on('click', '.load-detail-modal', function() {
						var dataUrl = $(this).data('url');
						var modalId = '#modalDetail';
						var modal = $(modalId);
						var baseActionUrl = modal.data('base-action-url');

						$.ajax({
								url: dataUrl,
								type: 'GET',
								dataType: 'json',
								success: function(response) {
										var data = response.data; // Ensure you are referencing the data object correctly
										console.log(data);
										var dpValue = Number(data.dp);
										var diskonDpValue = Number(data.diskon_dp);

										// Populate the modal's form fields with the fetched data
										modal.find('[name="konsumen"]').val(data.nama_konsumen);
										modal.find('[name="sales"]').val(data.sales.nama);
										modal.find('[name="bpkb"]').val(data.bpkb);
										modal.find('[name="no_hp"]').val(data.no_hp);
										modal.find('[name="metode_pembayaran"]').val(data.metode_pembayaran);
										modal.find('[name="metode_pembelian"]').val(data.metode_pembelian);
										modal.find('[name="status_dp"]').val(data.status_pembayaran_dp);
										modal.find('[name="dp"]').val(data.dp);
										modal.find('[name="diskon_dp"]').val(data.diskon_dp);
										modal.find('[name="nomor_po"]').val(data.no_po ? data.no_po : 'Belum ada');
										modal.find('[name="tenor"]').val(data.tenor);
										modal.find('[name="kota"]').val(data.kota.nama);
										modal.find('[name="hasil"]').val(data.hasil.hasil);
										modal.find('[name="motor"]').val(data.motor.nama);
										modal.find('[name="jumlah"]').val(data.jumlah);
										modal.find('[name="leasing"]').val(data.leasing ? data.leasing.nama :
												'Cash'); // Make sure the field is 'leasing' and not 'lising'
										modal.find('[name="catatan"]').val(data.catatan);
										modal.find('[name="status_pembayaran_dp"]').val(data.status_pembayaran_dp);
										modal.find('[name="dp"]').val(dpValue);
										modal.find('[name="diskon_dp"]').val(diskonDpValue);

										// Correctly format the dates before setting the values
										var tanggalDibuat = data.tanggal_dibuat ? formatDate(data.tanggal_dibuat) : '';
										var tanggalHasil = data.tanggal_hasil ? formatDate(data.tanggal_hasil) : '';

										modal.find('[name="tanggal_dibuat"]').val(tanggalDibuat);
										modal.find('[name="tanggal_hasil"]').val(tanggalHasil);

										function formatDate(dateString) {
												var options = {
														year: 'numeric',
														month: '2-digit',
														day: '2-digit'
												};
												var formattedDate = new Date(dateString).toLocaleDateString('en-US', options);
												return formattedDate;
										}

										// Show the modal
										modal.modal('show');
								},
								error: function(xhr, status, error) {
										alert('An error occurred: ' + error);
								}
						});
				});
		</script> --}}
@endpush
