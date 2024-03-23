@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12 col-md-12">
								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Filter Laporan</h3>
										</div>
										<form role="form" action="{{ route('admin.laporan.penjualan-wilayah.index') }}" method="GET"
												enctype="multipart/form-data">
												@csrf
												<div class="card-body">
														<div class="row">
																<div class="form-group col-md-6">
																		<label for="wilayah">Wilayah</label>
																		<select id="wilayah" name="wilayah"
																				class="form-control select2 @error('wilayah') is-invalid @enderror" style="width: 100%;">
																				<option value="">-- Pilih Wilayah --</option>
																				@foreach ($kotas as $kota)
																						<option value="{{ $kota->id }}" {{ old('wilayah') == $kota->id ? 'selected' : '' }}>
																								{{ $kota->nama }}</option>
																				@endforeach
																		</select>
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
														<button type="submit" class="btn btn-primary">Kirim</button>
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
												<h3 class="card-title">Laporan Penjualan Perwilayah</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">
												<div class="d-flex justify-content-end mb-3">
														<a href="" class="btn btn-warning"><i class="right fas fa-print"></i><span class="ml-2">Cetak
																		Laporan</span></a>
												</div>
												<table id="data-kota-motor" class="table-bordered table-striped table">
														<thead>
																<tr role="row">
																		<th>NO</th>
																		<th>Nama Kota</th>
																		<th>Nama Motor</th>
																		<th width="170px">Tanggal</th>
																</tr>
														</thead>
														<tbody>

																{{-- @dd($laporans) --}}

																@if ($laporans->count() > 0)
																		@foreach ($laporans as $laporan)
																				<tr>
																						<td>{{ $loop->iteration }}</td>
																						<td>{{ $laporan->kota->nama }}</td>
																						<td>{{ $laporan->motor->nama }}</td>
																						<td>{{ $laporan->tanggal_dibuat }}</td>

																				</tr>
																		@endforeach
																@else
																		<tr>
																				<td class="text-center" colspan="4"> -- Data penjualan belum ada --</td>

																		</tr>
																@endif
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</section>
@endsection
