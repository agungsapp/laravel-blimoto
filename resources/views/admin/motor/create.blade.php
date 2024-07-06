@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12 col-md-12">
						<div class="card card-primary">
								<div class="card-header">
										<h3 class="card-title">Input Data Motor Baru</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form action="{{ route('admin.motor.store') }}" method="post">
										@csrf
										<div class="card-body">
												<div class="row">
														<div class="form-group col-md-6">
																<label for="nama-motor">Nama Motor</label>
																<input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
																		id="nama-motor" placeholder="Masukan nama motor">
														</div>
														{{-- hapus harga sementara --}}
														{{-- <div class="form-group col-md-6">
																<label for="harga-motor">Harga Motor</label>
																<input name="harga" type="number" class="form-control @error('harga') is-invalid @enderror"
																		id="harga-motor" placeholder="Masukan harga motor">
														</div> --}}
												</div>

												<div class="row">
														<div class="form-group col-md-6">
																<label>Merk Motor</label>
																@if ($merk_motor == null)
																		<p>Tidak ada data merk motor silahkan buat terlebih dahulu !</p>
																@else
																		<select name="merk-motor" class="form-control @error('merk-motor') is-invalid @enderror">
																				<option value="">-- pilih merk motor --</option>
																				@foreach ($merk_motor as $merk)
																						<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>
														<div class="form-group col-md-6">
																<label>Tipe Motor</label>
																@if ($tipe_motor == null)
																		<p>Tidak ada data tipe motor silahkan buat terlebih dahulu !</p>
																@else
																		<select name="tipe-motor" class="form-control @error('tipe-motor') is-invalid @enderror">
																				<option value="">-- pilih tipe motor --</option>
																				@foreach ($tipe_motor as $merk)
																						<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>
												</div>
												<div class="row">
														<div class="form-group col-md-6">
																<label>Stock Motor</label>
																<p>*Optional tidak wajib dipilih default stock ada</p>
																<select name="stock-motor" class="form-control">
																		<option value="" selected>-- Pilih stock motor --</option>
																		<option value="1">Ada</option>
																		<option value="0">Kosong</option>
																</select>
														</div>

														<div class="form-group col-md-6">
																<label>Kategori Best Motor</label>
																<p>*Optional tidak wajib dipilih silahkan pilih no best</p>
																@if ($kategori_best_motor == null)
																		<p>Tidak ada data best kategori motor silahkan buat terlebih dahulu !</p>
																@else
																		<select name="kategori-best-motor" class="form-control">
																				<option value="" selected>-- Pilih kategori best motor --</option>
																				@foreach ($kategori_best_motor as $merk)
																						<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
																				@endforeach
																		</select>
																@endif
														</div>
												</div>

												<div class="row">
														<div class="form-group col-md-12">
																<label>Deskripsi Motor</label>
																<textarea id="deskripsi-motor" name="deskripsi-motor"
																  class="form-control @error('deskripsi-motor') is-invalid @enderror" rows="3" placeholder="Deskripsi Motor"></textarea>
														</div>
												</div>
												<div class="row">
														<div class="form-group col-md-12">
																<label>Fitur Motor</label>
																<textarea id="fitur-motor" name="fitur-motor" class="form-control @error('fitur-motor') is-invalid @enderror"
																  rows="3" placeholder="Fitur Motor"></textarea>
														</div>
												</div>
												<div class="row">
														<div class="form-group col-md-12">
																<label>Bonus Motor</label>
																<textarea id="bonus-motor" name="bonus-motor" class="form-control @error('bonus-motor') is-invalid @enderror"
																  rows="3" placeholder="bonus Motor"></textarea>
														</div>
												</div>

										</div>
										<div class="card-footer">
												<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
								</form>

						</div>
						<!-- /.card -->
				</div>
		</div>
@endsection


@push('script')
		<script>
				$(document).ready(function() {
						// Summernote
						$('#deskripsi-motor').summernote({
								placeholder: 'buat isi deskripsi motor ...',
								tabsize: 2,
								height: 300
						})

						// Summernote
						$('#fitur-motor').summernote({
								placeholder: 'buat isi fitur motor ...',
								tabsize: 2,
								height: 300
						})

						// Summernote
						$('#bonus-motor').summernote({
								placeholder: 'buat isi bonus motor ...',
								tabsize: 2,
								height: 300
						})
				})
		</script>
@endpush
