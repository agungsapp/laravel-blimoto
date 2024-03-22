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
																		<th>No</th>
																		<th>Nama Motor</th>
																		<th width="170px">Tanggal</th>
																</tr>
														</thead>
														<tbody>
																{{-- @dd($penjualanMotor) --}}
																@foreach ($penjualanMotor as $penjualan)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $penjualan->motor->nama }}</td>
																				{{-- <td>{{ $penjualan->motor }}</td> --}}
																				<td>
																						{{ $penjualan->tanggal_dibuat }}
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
