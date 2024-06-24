@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Laporan Tagihan Sudah Bayar</h3>
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
																				<td>{{ Str::rupiah($p->tanda_jadi) }}</td>
																				<td>{{ Str::rupiah($p->cicilan->dp - $p->detail_pembayaran_sum_jumlah_bayar) }}</td>
																				<td>
																						{{ Str::rupiah((int) $p->diskon_motor->diskon_dealer - (int) $p->diskon_motor->diskon) }}
																				</td>
																				<td>
																						{{ Str::rupiah((int) $p->diskon_motor->diskon_dealer - (int) $p->diskon_motor->diskon - $p->tanda_jadi) }}
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
