@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Laporan Tagihan Belum Bayar</h3>
										</div>
										<div class="card-body table-responsive">
												<table border="0" cellspacing="5" cellpadding="5" class="mb-4">
														<tbody>
																<tr>
																		<td>Dari Tanggal:</td>
																		<td><input type="text" id="min" name="min"></td>
																</tr>
																<tr>
																		<td>Sampai Tanggal:</td>
																		<td><input type="text" id="max" name="max"></td>
																</tr>
														</tbody>
												</table>
												<table id="data-sale" class="table-bordered table-striped table">
														<thead>
																<tr role="row">
																		<th>ID</th>
																		<th>Nama Konsumen</th>
																		<th>Motor</th>
																		<th>DP</th>
																		<th>Diskon Dealer</th>
																		<th>Diskon Konsumen</th>
																		<th>Stor Dealer</th>
																		<th>Konsumen Stor</th>
																		<th>Sudah Bayar Tanda Jadi</th>
																		<th>Belum di bayar ke dealer</th>
																		<th>Profit Blimoto</th>
																		<th>Belum di bayar ke blimoto</th>
																		<th>Tanggal Bayar</th>
																		{{-- <th class="no-export" width="100px">Action</th> --}}
																</tr>
														</thead>
														<tbody>
																@forelse ($penjualan as $p)
																		@if (!empty($p->detail_pembayaran))
																				@dd($p->detail_pembayaran)
																		@endif
																		<tr>
																				<td>{{ $p->id }}</td>
																				<td>{{ $p->nama_konsumen }}</td>
																				<td>{{ $p->motor->nama }}</td>
																				<td>{{ Str::rupiah($p->cicilan->dp) }}</td>
																				<td>{{ Str::rupiah($p->diskon_motor->diskon_dealer) }}</td>
																				<td>{{ Str::rupiah($p->diskon_motor->diskon) }}</td>
																				<td>{{ Str::rupiah((int) $p->cicilan->dp - (int) $p->diskon_motor->diskon_dealer) }}</td>
																				<td>{{ Str::rupiah((int) $p->cicilan->dp - (int) $p->diskon_motor->diskon) }}</td>
																				<td>{{ Str::rupiah($p->detail_pembayaran_sum_jumlah_bayar) }}</td>
																				<td>{{ Str::rupiah($p->cicilan->dp - $p->detail_pembayaran_sum_jumlah_bayar) }}</td>
																				<td>
																						{{ Str::rupiah((int) $p->diskon_motor->diskon_dealer - (int) $p->diskon_motor->diskon) }}
																				</td>
																				<td>
																						{{ Str::rupiah((int) $p->diskon_motor->diskon_dealer - (int) $p->diskon_motor->diskon - $p->detail_pembayaran_sum_jumlah_bayar) }}
																				</td>

																				<td>{{ $p->tanggal_bayar->locale('id')->isoFormat('D MMMM YYYY') ?? 'belum di bayar' }}</td>
																		</tr>
																@empty
																@endforelse

														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</section>
@endsection


@push('script')
		<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>

		<script>
				document.addEventListener("DOMContentLoaded", function() {
						toggleLeasingInputUpdate();
				});

				function toggleLeasingInputUpdate() {
						if ($('#pembelian-update').val() === 'cash') {
								$('#leasingUpdate').closest('.form-group').hide();
								$('#tenorUpdate').closest('.form-group').hide();
						} else {
								$('#leasingUpdate').closest('.form-group').show();
								$('#tenorUpdate').closest('.form-group').show();
						}
				}
				toggleLeasingInputUpdate();
				$('#pembelian-update').change(function() {
						toggleLeasingInputUpdate();
				});
		</script>

		<script>
				$(document).on('click', '.load-payment-modal', function() {
						var url = $(this).data('url');
						var actionUrl = $(this).data('action-url');

						$.ajax({
								url: url,
								type: 'GET',
								dataType: 'json',
								success: function(data) {
										$('#modalBayar form').attr('action', actionUrl);
										$('#id-sales').val(data.sales.id);
										$('#nama-sales').val(data.sales.nama);
										$('#nama-konsumen').val(data.nama_konsumen);
										$('#dp').val(Number(data.dp) - Number(data.diskon_dp));
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
				// This function toggles additional input fields based on the selected payment method.
				function toggleMetodeLainnya(selectElement) {
						var metodeLainnyaInput = document.getElementById('metodeLainnya');
						var jangkaWaktuInput = document.getElementById('jangkaWaktuInput');

						if (selectElement.value === 'tunai' || selectElement.value === 'cek') {
								metodeLainnyaInput.style.display = 'none';
								jangkaWaktuInput.style.display = 'none';
						} else {
								metodeLainnyaInput.style.display = 'block';
								jangkaWaktuInput.style.display = 'block';
						}
				}

				// When the 'Cetak' button is clicked, this event handler will fetch the data
				// and populate the print modal fields.
				$(document).on('click', '.load-print-modal', function() {
						var id = $(this).data('id');
						var dataUrl = $(this).data('url');
						var modalId = '#modalCetak'; // Make sure this matches the ID of your modal

						// Fetch the data and populate the modal
						$.ajax({
								url: dataUrl,
								type: 'GET',
								dataType: 'json',
								success: function(data) {
										// Assuming 'data' contains all the necessary fields for the print modal
										$(modalId + ' #tanggal_dibuat').val(data.tanggal_dibuat);
										$(modalId + ' [name="nama_pemohon"]').val(data.nama_konsumen);
										$(modalId + ' [name="kabupaten"]').val(data.kota.nama);
										$(modalId + ' [name="motor"]').val(data.id_motor);
										$(modalId + ' [name="id_penjualan"]').val(data.id);
										$(modalId + ' [name="dp"]').val(Number(data.dp));
										$(modalId + ' [name="total_diskon"]').val(Number(data.diskon_dp));
										$(modalId + ' [name="metode_pembelian"]').val(data.metode_pembelian).trigger('change');
										$(modalId + ' [name="warna"]').val(data.warna_motor);
										$(modalId + ' [name="nomor_hp"]').val(data.no_hp);
										$(modalId + ' [name="bpkb_stnk"]').val(data.bpkb);
										$(modalId + ' [name="jangka_waktu"]').val(data.tenor);
										$(modalId + ' [name="no_po"]').val(data.no_po);

										// Update the form action URL dynamically
										$(modalId + ' form').attr('action', '{{ route('admin.cetakPDF') }}');

										// Show the modal
										$(modalId).modal('show');
								},
								error: function(xhr, status, error) {
										alert('An error occurred while loading print data: ' + error);
								}
						});

						// Call the toggle function for the existing method selection
						var metodePembayaranSelect = document.getElementById('metodePembayaran');
						toggleMetodeLainnya(metodePembayaranSelect);
				});
		</script>

		<script>
				// get data modal edit
				$(document).on('click', '.load-update-modal', function() {
						var dataUrl = $(this).data('url');
						var modalId = '#modalEdit';
						var modal = $(modalId);
						var baseActionUrl = modal.data('base-action-url');

						$.ajax({
								url: dataUrl,
								type: 'GET',
								dataType: 'json',
								success: function(response) {
										var data = response.data;
										var dpValue = Number(data.dp);
										var diskonDpValue = Number(data.diskon_dp);

										// Populate the modal's form fields with the fetched data
										modal.find('[name="konsumen"]').val(data.nama_konsumen);
										modal.find('[name="sales"]').val(data.id_sales).trigger('change');
										modal.find('[name="metode_pembayaran"]').val(data.metode_pembayaran).trigger('change');
										modal.find('[name="tenor"]').val(data.tenor);
										modal.find('[name="nomor_po"]').val(data.no_po);
										modal.find('[name="kabupaten"]').val(data.id_kota).trigger('change');
										modal.find('[name="hasil"]').val(data.id_hasil).trigger('change');
										modal.find('[name="motor"]').val(data.id_motor).trigger('change');
										modal.find('[name="jumlah"]').val(data.jumlah);
										modal.find('[name="leasing"]').val(data.id_lising).trigger(
												'change'); // Make sure the field is 'leasing' and not 'lising'
										modal.find('[name="catatan"]').val(data.catatan);
										modal.find('[name="status_pembayaran_dp"]').val(data.status_pembayaran_dp).trigger('change');
										modal.find('[name="dp"]').val(dpValue);
										modal.find('[name="diskon_dp"]').val(diskonDpValue);
										modal.find('[name="warna_motor"]').val(data.warna_motor);
										modal.find('[name="bpkb"]').val(data.bpkb);
										modal.find('[name="no_hp"]').val(data.no_hp);
										modal.find('[name="metode_pembelian"]').val(data.metode_pembelian).trigger('change');

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


										// Update the form action URL dynamically
										var actionUrl = baseActionUrl.replace('__id__', data.id);
										modal.find('form').attr('action', actionUrl);

										// Show the modal
										modal.modal('show');
								},
								error: function(xhr, status, error) {
										alert('An error occurred: ' + error);
								}
						});
				});
		</script>

		{{-- SC MODAL DETAIL --}}
		<script>
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

		<script>
				$('.select2').select2()

				function toggleLeasingInput() {
						if ($('#pembelian-input').val() === 'cash') {
								$('#leasing-input').closest('.form-group').hide();
								$('#input-tenor').closest('.form-group').hide();
						} else {
								$('#leasing-input').closest('.form-group').show();
								$('#input-tenor').closest('.form-group').show();
						}
				}
				toggleLeasingInput();
				$('#pembelian-input').change(function() {
						toggleLeasingInput();
				});

				let minDate, maxDate;
				var table = $('#data-sale').DataTable({
						dom: 'Bfrtip', // 'B' for buttons
						buttons: [{
								extend: 'excelHtml5',
								title: 'Penjualan BliMoto', // Excel export button
								exportOptions: {
										columns: ':not(.no-export)' // Exclude columns with the class 'no-export'
								}
						}],
						order: [
								[0, 'desc']
						],
						columnDefs: [{
								targets: 'no-visible',
								visible: false, // Set the visibility to false for 'no-visible' class
						}]
				});

				// Apply the filter on input change
				$('#min, #max').on('change', function() {
						table.draw();
				});

				// Create date inputs
				minDate = new DateTime('#min', {});
				maxDate = new DateTime('#max', {});
				// Custom filtering function which will search data in column four between two values
				$.fn.dataTable.ext.search.push(
						function(settings, data, dataIndex) {
								var minDate = $('#min').val();
								var maxDate = $('#max').val();
								var date = moment(data[21]);
								if (
										(minDate === '' || date.isSameOrAfter(minDate)) &&
										(maxDate === '' || date.isSameOrBefore(maxDate))
								) {
										return true;
								}

								return false;
						}
				);
		</script>

		<script>
				function initDatePickers() {
						$('.tanggal_dibuat').datetimepicker({
								format: 'L'
						});

						$('.tanggal_hasil').datetimepicker({
								format: 'L'
						});
				}

				$(document).ready(function() {
						$('#data-sale').on('shown.bs.modal', '.modal', function() {
								initDatePickers();
								$('.select2').select2()
						});

						$('button[data-toggle="modal"]').on('click', function() {
								initDatePickers();
								$('.select2').select2()
						});
				});

				function formatTanggal(tanggal) {
						return moment(tanggal, 'MM/DD/YYYY').format('DD MMMM YYYY');
				}

				$('.jangka_waktu').datetimepicker({
						format: 'L',
						locale: 'id',
				});

				$('.jangka_waktu').on('change.datetimepicker', function(e) {
						var tanggalDiformat = formatTanggal(e.date);
						$('.jangka_send').val(tanggalDiformat);
				});

				var tanggalInput = $('#tanggal_dibuat');
				var tanggalLama = tanggalInput.val();
				var tanggalBaru = formatTanggal(tanggalLama);
				tanggalInput.val(tanggalBaru);

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
@endpush
