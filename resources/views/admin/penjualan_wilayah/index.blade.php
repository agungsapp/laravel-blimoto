@extends('admin.layouts.main')
@section('content')
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
																		<th width="170px">Action</th>
																</tr>
														</thead>
														<tbody>

																{{-- @dd($laporans) --}}

																@foreach ($laporans as $laporan)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $laporan['nama_kota'] }}</td>
																				<td>{{ $laporan['jumlah_penjualan'] }}</td>
																				<td>
																						<a href="{{ route('admin.laporan.penjualan-wilayah.show', $laporan['id_kota']) }}"
																								class="btn btn-success">Detail
																								unit</a>
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
