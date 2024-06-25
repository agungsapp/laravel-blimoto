@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12 col-md-12">
								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Export Laporan Penjualan</h3>
										</div>
										<form role="form" action="{{ route('admin.laporan.export-laporan-excel') }}" method="POST">
												@csrf
												<div class="card-body">
														<div class="row">
																<div class="callout callout-info">
																		<h5>Informasi !</h5>
																		<p>Kosongkan semua input untuk mendapatkan seluruh data wilayah dan seluruh rentang tanggal.</p>
																</div>
														</div>
														<div class="row">
																<div class="form-group col-md-6">
																		<label for="wilayah">Wilayah</label>
																		<select id="wilayah" name="wilayah" aria-describedby="wilayahHelp"
																				class="form-control select2 @error('wilayah') is-invalid @enderror" style="width: 100%;">
																				<option value="">-- Semua Wilayah --</option>
																				@foreach ($kotas as $kota)
																						<option value="{{ $kota->id }}" {{ old('wilayah') == $kota->id ? 'selected' : '' }}>
																								{{ $kota->nama }}</option>
																				@endforeach
																		</select>
																		<small id="wilayahHelp" class="form-text text-muted">
																				<h6>Kosongkan jika ingin export semua
																						wilayah</h6>
																		</small>
																		@error('wilayah')
																				<span class="text-danger">{{ $message }}</span>
																		@enderror
																</div>
																<div class="form-group col-md-3">
																		<label for="tanggal_mulai">Dari Tanggal</label>
																		<input type="date" id="tanggal_mulai" name="tanggal_mulai"
																				class="form-control @error('tanggal_mulai') is-invalid @enderror">
																		@error('tanggal_mulai')
																				<span class="text-danger">{{ $message }}</span>
																		@enderror
																</div>
																<div class="form-group col-md-3">
																		<label for="tanggal_selesai">Sampai Tanggal</label>
																		<input type="date" id="tanggal_selesai" name="tanggal_selesai"
																				class="form-control @error('tanggal_selesai') is-invalid @enderror">
																		@error('tanggal_selesai')
																				<span class="text-danger">{{ $message }}</span>
																		@enderror
																</div>
														</div>
														<button type="submit" class="btn btn-primary">Export Excel</button>
												</div>
										</form>
								</div>
						</div>
				</div>
		</section>

		{{-- <section>
				<div class="row">
						<div class="col-12">
								<div class="card">
										<div class="card-body">
												@include('admin.penjualan_wilayah.excel', $laporans)
										</div>
								</div>
						</div>
				</div>
		</section> --}}
@endsection
