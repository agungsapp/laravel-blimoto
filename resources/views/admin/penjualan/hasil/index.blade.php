@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">

								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Data Penjualan Hasil {{ ucfirst($penjualan[0]->hasil->hasil) }}</h3>

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
																		<th>Nama Sales</th>
																		<th class="no-visible">No HP</th>
																		<th class="no-visible">STNK</th>
																		<th>Metode Pembelian</th>
																		<th>Status Pembayaran DP</th>
																		<th class="no-visible">DP</th>
																		<th class="no-visible">Diskon DP</th>
																		<th class="no-visible">DP Bayar</th>
																		<th>Leasing</th>
																		<th>Motor</th>
																		<th>Warna</th>
																		<th>Hasil</th>
																		<th class="no-visible">Metode Pembayaran</th>
																		<th class="no-visible">Nomor PO</th>
																		<th class="no-visible">Tenor</th>
																		<th class="no-visible">Jumlah</th>
																		<th class="no-visible">Kota</th>
																		<th class="no-visible">Hasil</th>
																		<th class="no-visible">Catatan</th>
																		<th>Tanggal Dibuat</th>
																		<th class="no-visible">Tanggal Hasil</th>
																		<th class="no-export" width="100px">Action</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($penjualan as $index => $p)
																		<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
																				<td>{{ $p->id }}</td>
																				<td>{{ $p->nama_konsumen }}</td>
																				<td>{{ $p->sales->nama }}</td>
																				<td>{{ $p->no_hp }}</td>
																				<td>{{ $p->bpkb }}</td>
																				<td>{{ $p->metode_pembelian }}</td>
																				<td>{{ $p->status_pembayaran_dp }}</td>
																				<td>{{ $p->dp }}</td>
																				<td>{{ $p->diskon_dp }}</td>
																				<td>{{ $p->dp - $p->diskon_dp }}</td>
																				<td>{{ $p->leasing->nama ?? 'cash' }}</td>
																				<td>{{ $p->motor->nama }}</td>
																				<td>{{ $p->warna_motor }}</td>
																				<td>{{ $p->hasil->hasil }}</td>
																				<td>{{ $p->metode_pembayaran }}</td>
																				<td>{{ $p->no_po }}</td>
																				<td>{{ $p->tenor }}</td>
																				<td>{{ $p->jumlah }}</td>
																				<td>{{ $p->kota->nama }}</td>
																				<td>{{ $p->hasil->hasil }}</td>
																				<td>{{ $p->catatan }}</td>
																				<td>{{ $p->tanggal_dibuat }}</td>
																				<td>{{ $p->tanggal_hasil }}</td>
																				<td class="no-export">
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

		<!-- Modal detail -->
		<section>
				<div class="modal fade" id="modalDetail" role="dialog">
						<div class="modal-dialog" role="document">
								<div class="modal-content">
										<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Detail data</h4>
										</div>
										<div class="modal-body">
												<div class="card card-primary">
														<div class="card-body">
																<div class="form-group">
																		<div class="row">
																				<div class="form-group col-md-12">
																						<label for="konsumen">Nama Konsumen</label>
																						<input name="konsumen" type="text" class="form-control" readonly>
																				</div>
																		</div>
																		<div class="row">
																				<div class="form-group col-md-12">
																						<label for="sales">Nama Sales</label>
																						<input name="sales" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-12">
																						<label for="bpkb">BPKB/STNK a.n</label>
																						<input name="bpkb" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="no_hp">NO HP</label>
																						<input name="no_hp" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="metode_pembelian">Metode Pembelian</label>
																						<input name="metode_pembelian" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="dp">DP</label>
																						<input name="dp" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="diskon_dp">Diskon DP</label>
																						<input name="diskon_dp" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="metode_pembayaran">Metode Pembayaran</label>
																						<input name="metode_pembayaran" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="status_dp">Status Pembayaran DP</label>
																						<input name="status_dp" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="nomor_po">Nomor PO</label>
																						<input name="nomor_po" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="leasing">Leasing</label>
																						<input name="leasing" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="tenor">Tenor</label>
																						<input name="tenor" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="motor">Nama Motor</label>
																						<input name="motor" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="jumlah">Jumlah</label>
																						<input name="jumlah" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="kota">Kota</label>
																						<input name="kota" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="hasil">Hasil</label>
																						<input name="hasil" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="catatan">Catatan</label>
																						<input name="catatan" type="text" class="form-control" readonly>
																				</div>
																		</div>
																		<div class="row">
																				<div class="form-group col-md-6">
																						<label>Tanggal Dibuat: </label>
																						<div class="input-group date tanggal_dibuat" id="reservationdate">
																								<input type="text" class="form-control" name="tanggal_dibuat" readonly
																										placeholder="dd/mm/yyyy" />
																						</div>
																				</div>
																				<div class="form-group col-md-6">
																						<label>Tanggal Hasil:</label>
																						<div class="input-group date tanggal_hasil" id="reservationdate2">
																								<input type="text" class="form-control" name="tanggal_hasil" readonly
																										placeholder="dd/mm/yyyy" />
																						</div>
																				</div>
																		</div>

																		{{-- <div class="row">
																				<div class="form-group col-md-6">
																						<label>Tanggal Dibuat: </label>
																						<div class="input-group date tanggal_dibuat" id="reservationdate" data-target-input="nearest">
																								<input type="text" class="form-control datetimepicker-input tanggal_dibuat"
																										data-target="#reservationdate" name="tanggal_dibuat" readonly />
																								<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
																										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																								</div>
																						</div>
																				</div>
																				<div class="form-group col-md-6">
																						<label>Tanggal Hasil:</label>
																						<div class="input-group date tanggal_hasil" id="reservationdate2" data-target-input="nearest">
																								<input type="text" class="form-control datetimepicker-input tanggal_hasil"
																										data-target="#reservationdate2" name="tanggal_hasil" readonly />
																								<div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
																										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																								</div>
																						</div>
																				</div>
																		</div> --}}
																</div>
														</div>

												</div>
										</div>
										<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

		{{-- sc modal detail --}}
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
										var tanggalDibuat = formatDate(data.tanggal_dibuat);
										var tanggalHasil = formatDate(data.tanggal_hasil);

										console.log(`debug tanggal : ${tanggalDibuat} dan tanggal hasil : ${tanggalHasil}`);

										modal.find('[name="tanggal_dibuat"]').attr("placeholder", 'dd/mm/yyyy').val(tanggalDibuat);
										modal.find('[name="tanggal_hasil"]').attr("placeholder", 'dd/mm/yyyy').val(tanggalHasil);

										function formatDate(dateString) {
												if (dateString) {
														var dateObj = new Date(dateString);
														if (!isNaN(dateObj.getTime())) {
																var options = {
																		year: 'numeric',
																		month: '2-digit',
																		day: '2-digit'
																};
																return dateObj.toLocaleDateString('en-US', options);
														}
												}
												return ''; // Mengembalikan string kosong untuk input text
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
