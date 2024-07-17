@extends('admin.layouts.main')
@section('content')

		<section class="content">

				<div class="row">
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header">
												<div class="card-title">
														Tambah data motor kota
												</div>
										</div>
										<form action="{{ route('admin.kota-motor.store') }}" method="post">
												@csrf
												@method('POST')
												<div class="card-body">
														<div class="row">
																<div class="form-group col-md-6">
																		<label>Kota</label>
																		@if ($kota === null)
																				<p class="text-danger">Tidak ada data kota, silahkan buat terlebih dahulu!</p>
																		@else
																				<select id="kota" name="kota" class="form-control select2" style="width: 100%;" required>
																						<option value="" selected>-- Pilih kota --</option>
																						@foreach ($kota as $k)
																								<!-- Check if the old value matches and set it as selected -->
																								<option value="{{ $k->id }}" {{ old('kota') == $k->id ? 'selected' : '' }}>
																										{{ $k->nama }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
																<div class="form-group col-md-6">
																		<label>Motor</label>
																		@if ($motor === null)
																				<p class="text-danger">Tidak ada data motor, silahkan buat terlebih dahulu!</p>
																		@else
																				<select id="motor" name="motor" class="form-control select2" style="width: 100%;" required>
																						<option value="" selected>-- Pilih motor --</option>
																						@foreach ($motor as $m)
																								<!-- Check if the old value matches and set it as selected -->
																								<option value="{{ $m->id }}" {{ old('motor') == $m->id ? 'selected' : '' }}>
																										{{ $m->nama }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
																<div class="form-group col-md-6">
																		<label for="harga">Harga</label>
																		<input type="number" class="form-control" name="harga" id="harga"
																				placeholder="masukan harga OTR..." required>
																</div>
																<div class="form-group col-md-6">
																		<label for="diskon_cash">Diskon Cash</label>
																		<input type="number" class="form-control" name="diskon_cash" id="diskon_cash"
																				placeholder="masukan diskon cash dari harga OTR..." required>
																</div>
														</div>
														<div class="card-footer">
																<button type="submit" class="btn btn-primary">Simpan</button>
														</div>
										</form>
								</div>
						</div>
				</div>

		</section>


		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Data Motor Kota</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">

												<table id="data-kota-motor" class="table-bordered table-striped table">
														<thead>
																<tr role="row">
																		<th>NO</th>
																		<th>Nama Kota</th>
																		<th>Nama Motor</th>
																		<th>Harga OTR</th>
																		<th>Diskon Cash</th>
																		<th width="170px">Action</th>
																</tr>
														</thead>

												</table>
										</div>
								</div>
						</div>
				</div>
		</section>



		{{-- modal edit --}}
		<section>
				<div class="modal" id="modalEdit" tabindex="-1">
						<div class="modal-dialog">
								<div class="modal-content">
										<div class="modal-header">
												<h5 class="modal-title">Edit data diskon motor</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<form action="" method="post">
												@csrf
												@method('PUT')
												<div class="modal-body">

														<div class="row">
																<div class="form-group col-md-12">
																		<label>Kota</label>
																		@if ($kota === null)
																				<p class="text-danger">Tidak ada data kota, silahkan buat terlebih dahulu!</p>
																		@else
																				<select id="kota" name="kota" class="form-control select2" style="width: 100%;" required>
																						<option value="" selected>-- Pilih kota --</option>
																						@foreach ($kota as $k)
																								<!-- Check if the old value matches and set it as selected -->
																								<option value="{{ $k->id }}" {{ old('kota') == $k->id ? 'selected' : '' }}>
																										{{ $k->nama }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
																<div class="form-group col-md-12">
																		<label>Motor</label>
																		@if ($motor === null)
																				<p class="text-danger">Tidak ada data motor, silahkan buat terlebih dahulu!</p>
																		@else
																				<select id="motor" name="motor" class="form-control select2" style="width: 100%;" required>
																						<option value="" selected>-- Pilih motor --</option>
																						@foreach ($motor as $m)
																								<!-- Check if the old value matches and set it as selected -->
																								<option value="{{ $m->id }}" {{ old('motor') == $m->id ? 'selected' : '' }}>
																										{{ $m->nama }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
																<div class="form-group col-md-12">
																		<label for="harga">Harga</label>
																		<input type="number" class="form-control" name="harga" id="harga"
																				placeholder="masukan harga OTR..." required>
																</div>
																<div class="form-group col-md-12">
																		<label for="diskon_cash">Diskon Cash</label>
																		<input type="number" class="form-control" name="diskon_cash" id="diskon_cash"
																				placeholder="masukan diskon cash dari harga OTR..." required>
																</div>
														</div>


												</div>
												<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-warning">Update</button>
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
						// Initialize DataTable
						var table = $("#data-kota-motor").DataTable({
								processing: true,
								serverSide: true,
								ajax: {
										url: "{{ route('serverSideMotorKota') }}",
										data: function(d) {
												d.kota = $('#filterKota').val();
												d.tenor = $('#filterTenor').val();
										},
								},
								columns: [{
												data: 'DT_RowIndex',
												name: 'DT_RowIndex',
												orderable: false,
												searchable: false
										},
										{
												data: 'kota.nama',
												name: 'Kota',
												title: 'Kota'
										},
										{
												data: 'motor.nama',
												name: 'Motor',
												title: 'Nama Motor'
										},
										{
												data: 'harga_otr',
												name: 'Otr',
												title: 'Harga Otr'
										},
										{
												data: 'diskon_cash',
												name: 'diskon',
												title: 'Diskon Cash'
										},

										{
												data: 'aksi',
												name: 'Action',
												title: 'Action'
										},
								],
								columnDefs: [{
												targets: 0,
												searchable: false,
												orderable: false,
												className: 'dt-body-center'
										},
										{
												targets: -1,
												searchable: false,
												orderable: false,
												className: 'dt-body-center'
										}
								],
						});

						// Event handler for filters
						$('#filterKota, #filterTenor').on('change', function() {
								table.draw();
						});

						// Reset filter button
						$('#resetFilters').on('click', function() {
								$('#filterKota, #filterTenor').val(null).trigger('change');
								table.draw();
						});


						$('.select2').select2()
				})

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




						$('body').on('click', '.btn_edit', function(e) {
								e.preventDefault();
								let getUrl = $(this).data('get');
								let actionUrl = $(this).data('action');
								// load data
								$.ajax({
										url: getUrl,
										type: 'GET',
										success: function(data) {
												console.log(data);
												// Mengisi data ke dalam field dalam modalEdit
												$('#modalEdit form').attr('action', actionUrl);
												$('#modalEdit #kota').val(data.id_kota).trigger('change');
												$('#modalEdit #motor').val(data.id_motor).trigger('change');
												$('#modalEdit #harga').val(data.harga_otr);
												$('#modalEdit #diskon_cash').val(data.diskon_cash);

												// Menampilkan modal
												$('#modalEdit').modal('show');
										}
								});
						});



				})
		</script>
@endpush
