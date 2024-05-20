@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">

								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Data Penjualan</h3>
										</div>

										<div class="card-body">
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
																		<th>Kode Bayar</th>
																		<th>Jumlah Bayar</th>
																		<th>Sisa Bayar</th>
																		<th>Total Tagihan</th>
																		<th>Periode</th>
																		<th>Status Pembayaran</th>
																		<th>Tanggal Transaksi</th>
																		<th class="no-export">Action</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($dpembayarans as $index => $p)
																		<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
																				<td>{{ $p->id }}</td>
																				<td>{{ $p->kode_bayar }}</td>
																				<td>{{ Str::rupiah($p->jumlah_bayar) }}</td>
																				<td>{{ Str::rupiah($p->sisa_bayar) }}</td>
																				<td>{{ Str::rupiah($p->total_lunas) }}</td>
																				<td>{{ $p->periode }}</td>
																				<td class="text-capitalize">{{ $p->status == 'tanda' ? 'tanda jadi' : $p->status }}</td>
																				<td>{{ $p->created_at }}</td>
																				<td class="no-export">
																						<div class="btn-group">
																								<form action="{{ route('admin.pembayaran.destroy', $p->id) }}" method="post">
																										@csrf
																										@method('DELETE')
																										<button type="button" class="btn btn-primary w-100 mb-1" data-toggle="modal"
																												data-target="#modalEdit{{ $p->id }}" data-placement="top" title="edit">
																												Edit
																										</button>
																										<button type="submit" class="btn btn-danger show_confirm w-100">Delete</button>
																								</form>
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
		<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
		<script>
				$('.select2').select2()

				function toggleLeasingInput() {
						if ($('#pembayaran-input').val() === 'cash') {
								$('#leasing-input').closest('.form-group').hide();
								$('#input-tenor').closest('.form-group').hide();
						} else {
								$('#leasing-input').closest('.form-group').show();
								$('#input-tenor').closest('.form-group').show();
						}
				}
				toggleLeasingInput();
				$('#pembayaran-input').change(function() {
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
						]
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
								var date = moment(data[11]);
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
				var metodePembayaranElements = document.querySelectorAll('[id^="metodePembayaran_"]');
				metodePembayaranElements.forEach(function(selectElement) {
						toggleMetodeLainnya(selectElement);
				});

				function toggleMetodeLainnya(selectElement) {
						var index = selectElement.id.split('_')[1];
						var metodeLainnyaInput = document.getElementById('metodeLainnya_' + index);
						var jangkaWaktuInput = document.getElementById('jangkaWaktuInput_' + index);

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
				document.addEventListener("DOMContentLoaded", function() {
						// Initial check when the page loads
						var metodePembayaranElements = document.querySelectorAll('[id^="pembayaranUpdate_"]');
						metodePembayaranElements.forEach(function(selectElement) {
								toggleFieldsUpdate(selectElement);
						});
				});

				function toggleFieldsUpdate(selectElement) {
						var index = selectElement.id.split('_')[1];
						var tenorField = document.getElementById('tenorUpdate_' + index);
						var leasingField = document.getElementById('leasingUpdate_' + index);
						console.log(leasingField);

						if (selectElement.value === 'cash') {
								tenorField.style.display = 'none';
								leasingField.style.display = 'none';
						} else {
								tenorField.style.display = 'block';
								leasingField.style.display = 'block';
						}
				}
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
@endpush
