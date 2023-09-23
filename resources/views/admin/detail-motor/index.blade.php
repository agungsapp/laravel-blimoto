@extends('admin.layouts.main')
@section('content')



		<div class="row">
				<div class="col-12">
						<div class="card card-primary">
								<div class="card-header">
										<div class="card-title">
												Tambah data detail motor
										</div>
								</div>

								<!-- /.card-header -->
								<form action="{{ route('admin.detail-motor.store') }}" method="post" enctype="multipart/form-data">
										@csrf
										@method('POST')
										<div class="card-body">
												<!-- /.row -->

												<div class="row">
														<div class="form-group col-md-4">
																<label>Merk Motor</label>
																@if ($merk_motor == null)
																		<p class="text-danger">Tidak ada data merk motor silahkan buat terlebih dahulu !</p>
																@else
																		<select id="merk-motor" name="merk-motor"
																				class="form-control select2 @error('merk-motor') is-invalid @enderror" style="width: 100%;">
																				<option value="" selected>-- Pilih merk motor --</option>
																				@foreach ($merk_motor as $merk)
																						<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>
														<div class="form-group col-md-4">
																<label>Tipe Motors</label>
																@if ($tipe_motor == null)
																		<p class="text-danger">Tidak ada data tipe motor silahkan buat terlebih dahulu !</p>
																@else
																		<select id="tipe-motor" name="tipe-motor"
																				class="form-control @error('tipe-motor') is-invalid @enderror select2" style="width: 100%;">
																				<option value="" selected>-- Pilih tipe motor --</option>
																				@foreach ($tipe_motor as $merk)
																						<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>
														<div class="form-group col-md-4">
																<label for="model">Model Motor</label>
																<select id="model" class="form-control select2 @error('model') is-invalid @enderror" name="model">
																		<option value="0" selected>-- Pilih Model --</option>
																</select>
														</div>
												</div>

												<div class="row">
														<div class="form-group col-md-6">
																<label for="warna-motor">Warna</label>
																<input name="warna-motor" type="text" class="form-control @error('warna-motor') is-invalid @enderror"
																		id="warna-motor" placeholder="Masukan warna motor">
														</div>
														<div class="form-group offset-1 col-md-5">
																<label for="exampleInputFile">Pilih Gambar</label>
																<input type="file" id="exampleInputFile" class="" name="gambar-motor">
																<p class="help-block">Silahkan pilih gambar motor</p>
																@error('gambar-motor')
																		<div class="alert alert-danger">{{ $message }}</div>
																@enderror
														</div>
												</div>


										</div>
										<!-- /.card-body -->
										<div class="card-footer">
												<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
								</form>
						</div>
						<!-- /.card -->

				</div>
		</div>
		</div>

@endsection


@push('script')
		<script>
				$(document).ready(function() {
						//Initialize Select2 Elements
						$('.select2').select2()

						$('#tipe-motor').change(function() {
								console.log("area select logic running...");
								var merkId = $('#merk-motor').val();
								var tipeId = $(this).val();
								var modelSelect = $('#model');
								// console.log(merkId + tipeId);
								modelSelect.empty();
								modelSelect.append('<option value="0" selected>-- Pilih Model --</option>');
								// console.log("sebelum if");
								if (merkId !== '0' && tipeId !== '0') {
										// console.log("get jalan!");
										$.get('/get-model-options', {
												merk_id: merkId,
												tipe_id: tipeId
										}, function(data) {
												// console.log(data);
												console.log("done bang!")
												$.each(data, function(key, value) {
														// console.log(`id nya : ${value.id} nama nya : ${value.nama}`);
														modelSelect.append('<option value="' + value.id + '">' + value.nama + '</option>');
												});

										});
								}
						});
				})
		</script>
@endpush
