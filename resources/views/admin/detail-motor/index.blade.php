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
								<form action="{{ route('admin.motor.store') }}" method="post">
										@csrf
										@method('POST')
										<div class="card-body">
												<!-- /.row -->

												<div class="row">
														<div class="form-group col-md-6">
																<label>Merk Motor</label>
																@if ($merk_motor == null)
																		<p class="text-danger">Tidak ada data merk motor silahkan buat terlebih dahulu !</p>
																@else
																		<select name="merk-motor" class="form-control select2" style="width: 100%;">
																				<option value="" selected>-- Pilih merk motor --</option>
																				@foreach ($merk_motor as $merk)
																						<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>
														<div class="form-group col-md-6">
																<label>Tipe Motors</label>
																@if ($tipe_motor == null)
																		<p class="text-danger">Tidak ada data tipe motor silahkan buat terlebih dahulu !</p>
																@else
																		<select name="tipe-motor" class="form-control select2" style="width: 100%;">
																				<option value="" selected>-- Pilih tipe motor --</option>
																				@foreach ($tipe_motor as $merk)
																						<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>
												</div>

												<div class="row">
														<div class="form-group col-md-6">
																<label for="warna-motor">Warna</label>
																<input name="warna_motor" type="text" class="form-control" id="warna-motor"
																		placeholder="Masukan warna motor">
														</div>
														<div class="form-group col-md-6">
																<label>Kategori Best Motor</label>
																@if ($kategori_best_motor == null)
																		<p class="text-danger">Tidak ada data best kategori motor silahkan buat terlebih dahulu !</p>
																@else
																		<select name="kategori-best-motor" class="form-control">
																				<option value="" selected>-- Pilih kategori best motor --</option>
																				@foreach ($kategori_best_motor as $merk)
																						<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
																				@endforeach
																		</select>
																@endif
																<p class="text-info">*Optional tidak wajib dipilih silahkan pilih no best</p>

														</div>
												</div>

												<div class="form-group">
														<label for="exampleInputFile">Pilih Gambar</label>
														<input type="file" id="exampleInputFile" name="gambar_motor">
														<p class="help-block">Silahkan pilih gambar motor</p>
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
				})
		</script>
@endpush
