@extends('admin.layouts.main')
@section('content')
		<div class="container-fluid">
				<div class="row">
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header">
												<div class="card-title">Tambah warna motor</div>
										</div>

										<form action="{{ route('admin.warna-motor.store') }}" method="post">
												@csrf
												<div class="card-body">
														<div class="row">
																<div class="col-3">
																		<div class="form-group">
																				<label for="motor">Motor</label>
																				<select id="motor" class="form-control" name="motor" required>
																						<option value="">-- pilih motor --</option>

																						@forelse ($motors as $motor)
																								<option value="{{ $motor->id }}">{{ $motor->nama }}</option>
																						@empty
																								<option value="" class="text-center">data masih kosong!</option>
																						@endforelse
																				</select>
																		</div>
																</div>
																<div class="col-9">
																		<div class="row p-4">
																				@forelse ($colors as $color)
																						<div class="col-2 mb-2">
																								<div class="form-check d-flex align-items-center">
																										<input id="color-{{ $loop->index }}" class="form-check-input" type="checkbox" name="color[]"
																												value="{{ $color->id }}" style="margin-top: 0.3rem;">
																										<label for="color-{{ $loop->index }}"
																												class="form-check-label text-capitalize ms-2">{{ $color->nama }}</label>
																								</div>
																						</div>
																				@empty
																						<p>-- mohon maaf, data warna masih kosong silahkan buat dulu --</p>
																				@endforelse
																		</div>
																</div>
														</div>
												</div>
												<div class="card-footer">
														<div class="row">
																<div class="col-12">
																		<button type="submit" class="btn btn-primary">Simpan</button>
																</div>
														</div>
												</div>
										</form>
								</div>
						</div>
				</div>

				{{-- data --}}
				<div class="row">
						<div class="col-12">
								<div class="card">
										<div class="card-body">
												<h5>Data Warna Motor</h5>

												<table id="table_warna" class="table-striped table">
														<thead>
																<tr>
																		<th>#</th>
																		<th>Motor</th>
																		<th>Warna</th>
																</tr>
														</thead>
														<tbody>
																@forelse ($warnaMotors as $wm)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $wm->motor->nama }}</td>
																				<td>{{ $wm->color->nama }}</td>
																		</tr>
																@empty
																		<tr>
																				<td colspan="3" class="text-center">-- data warna motor masih kosong ! --</td>
																		</tr>
																@endforelse
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection

@push('script')
		<script>
				$('#table_warna').dataTable();

				$('#motor').select2().on('change', function() {
						var motorId = $(this).val();
						if (motorId) {
								$.ajax({
										url: '/app/warna-motor/' + motorId,
										method: 'GET',
										success: function(data) {
												$('input[name="color[]"]').each(function() {
														var colorId = $(this).val();
														if (data.includes(parseInt(colorId))) {
																$(this).prop('checked', true);
														} else {
																$(this).prop('checked', false);
														}
												});
										}
								});
						} else {
								$('input[name="color[]"]').prop('checked', false);
						}
				});
		</script>
@endpush
