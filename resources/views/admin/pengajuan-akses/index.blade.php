@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="callout callout-info">
								<h5>Informasi !</h5>
								<p>Dengan mengklik setuju anda akan memberikan akses pada sales untuk melakukan edit data penjualan yang di
										ajukan. <br>anda dapat melakukan peninjauan hasil edit data dari sales pada menu <a
												href="{{ route('admin.pengajuan.hak-akses.done') }}" class="link_selesai">Selesai
												Edit</a> Setelah sales selesai melakukan perubahan data
										<datagrid>
										</datagrid>.
								</p>
						</div>

				</div>


				<div class="row">
						<div class="col-12">
								<div class="card">
										<div class="card-body">
												<table class="table">
														<thead>
																<tr>
																		<th scope="col">#</th>
																		<th scope="col">Nama Sales</th>
																		<th scope="col">Nama Konsumen</th>
																		<th scope="col">Status</th>
																		<th scope="col">Tujuan</th>
																		<th scope="col">Catatan</th>
																		<th scope="col">Tanggal pengajuan</th>
																		@if (\Route::is('admin.pengajuan.hak-akses.index'))
																				<th scope="col">Aksi</th>
																		@else
																				<th scope="col">Tanggal Keputusan</th>
																		@endif
																		@if (\Route::is('admin.pengajuan.hak-akses.done'))
																				<th scope="col">Aksi</th>
																		@endif
																</tr>
														</thead>
														<tbody>
																@if ($pengajuans->count() == 0)
																		<tr>
																				<td colspan="8" class="text-center">-- belum ada data --</td>
																		</tr>
																@endif
																@foreach ($pengajuans as $pengajuan)
																		<tr>
																				<th scope="row">{{ $loop->iteration }}</th>
																				<td class="text-capitalize">{{ $pengajuan->penjualan->sales->nama }}</td>
																				<td class="text-capitalize">{{ $pengajuan->penjualan->nama_konsumen }}</td>
																				<td><span
																								class="badge {{ $pengajuan->status == 'tolak' ? 'badge-danger' : 'badge-info' }}">{{ $pengajuan->status }}</span>
																				</td>
																				<td>
																						@foreach (json_decode($pengajuan->tujuan, true) as $tujuan)
																								{{-- {{ $tujuan }}<br> --}}
																								<span class="badge badge-warning">{{ $tujuan }}</span><br>
																						@endforeach
																				</td>

																				<td>{{ $pengajuan->catatan }}</td>
																				<td>{{ $pengajuan->created_at->isoFormat('D MMMM YYYY') }}</td>
																				<td>
																						{{-- hanya muncul di index --}}
																						@if (\Route::is('admin.pengajuan.hak-akses.index'))
																								<!-- modal setuju -->
																								<button type="button" class="btn btn-success" data-toggle="modal"
																										data-target="#modalSetuju{{ $pengajuan->id }}" data-id="{{ $pengajuan->id }}">
																										setujui
																								</button>

																								<div class="modal fade" id="modalSetuju{{ $pengajuan->id }}" tabindex="-1"
																										aria-labelledby="modalSetuju{{ $pengajuan->id }}Label" aria-hidden="true">
																										<div class="modal-dialog">
																												<div class="modal-content">
																														<div class="modal-header">
																																<h5 class="modal-title" id="modalSetuju{{ $pengajuan->id }}Label">Berikan akses edit</h5>
																																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																																		<span aria-hidden="true">&times;</span>
																																</button>
																														</div>
																														<form action="{{ route('admin.pengajuan.setuju', $pengajuan->id) }}" method="post">
																																@csrf
																																<div class="modal-body">
																																		Anda akan menyetujui sales untuk melakukan perubahan data pada data penjualan.
																																</div>
																																<div class="modal-footer">
																																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																																		<button type="submit" class="btn btn-success">Ya</button>
																																</div>
																														</form>
																												</div>
																										</div>
																								</div>
																								{{-- modal setuju end --}}

																								<!-- modal deny start -->
																								<button type="button" class="btn btn-danger" data-toggle="modal"
																										data-target="#modalTolak{{ $pengajuan->id }}">
																										Tolak
																								</button>

																								<!-- Modal -->
																								<div class="modal fade" id="modalTolak{{ $pengajuan->id }}" tabindex="-1"
																										aria-labelledby="modalTolak{{ $pengajuan->id }}Label" aria-hidden="true">
																										<div class="modal-dialog">
																												<div class="modal-content">
																														<div class="modal-header">
																																<h5 class="modal-title" id="modalTolak{{ $pengajuan->id }}Label">Tolak Pengajuan Edit
																																</h5>
																																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																																		<span aria-hidden="true">&times;</span>
																																</button>
																														</div>
																														<form action="{{ route('admin.pengajuan.tolak', $pengajuan->id) }}" method="post">
																																@csrf
																																<div class="modal-body">
																																		Anda yakin akan menolak pengajuan edit data dari sales untuk data ini ?
																																</div>
																																<div class="modal-footer">
																																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																																		<button type="submit" class="btn btn-danger">Yakin</button>
																																</div>
																														</form>
																												</div>
																										</div>
																								</div>
																								{{-- modal deny end --}}
																						@else
																								{{ $pengajuan->updated_at->isoFormat('D MMMM YYYY') }}
																						@endif
																				</td>
																				@if (\Route::is('admin.pengajuan.hak-akses.done'))
																						<td>


																								<!-- modal publish start -->
																								<button type="button" class="btn btn-info btn-blkkomiisi lancar aplikasi kkkkk mb-2" data-toggle="modal"
																										data-target="#modalTolak{{ $pengajuan->id }}">
																										Publish
																								</button>

																								<!-- Modal -->
																								<div class="modal fade" id="modalTolak{{ $pengajuan->id }}" tabindex="-1"
																										aria-labelledby="modalTolak{{ $pengajuan->id }}Label" aria-hidden="true">
																										<div class="modal-dialog">
																												<div class="modal-content">
																														<div class="modal-header">
																																<h5 class="modal-title" id="modalTolak{{ $pengajuan->id }}Label">Tolak Pengajuan Edit
																																</h5>
																																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																																		<span aria-hidden="true">&times;</span>
																																</button>
																														</div>
																														<form action="{{ route('admin.pengajuan.publish', $pengajuan->id) }}" method="post">
																																@csrf
																																<div class="modal-body">
																																		Anda yakin akan menolak pengajuan edit data dari sales untuk data ini ?
																																</div>
																																<div class="modal-footer">
																																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																																		<button type="submit" class="btn btn-danger">Yakin</button>
																																</div>
																														</form>
																												</div>
																										</div>
																								</div>
																								{{-- modal publish end --}}



																								<!-- modal edit kembali -->
																								<button type="button" class="btn btn-warning" data-toggle="modal"
																										data-target="#modalSetuju{{ $pengajuan->id }}" data-id="{{ $pengajuan->id }}">
																										Edit kembali
																								</button>

																								<div class="modal fade" id="modalSetuju{{ $pengajuan->id }}" tabindex="-1"
																										aria-labelledby="modalSetuju{{ $pengajuan->id }}Label" aria-hidden="true">
																										<div class="modal-dialog">
																												<div class="modal-content">
																														<div class="modal-header">
																																<h5 class="modal-title" id="modalSetuju{{ $pengajuan->id }}Label">Berikan akses edit
																																		kembali</h5>
																																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																																		<span aria-hidden="true">&times;</span>
																																</button>
																														</div>
																														<form action="{{ route('admin.pengajuan.setuju', $pengajuan->id) }}" method="post">
																																@csrf
																																<div class="modal-body">
																																		Anda akan menyetujui sales untuk melakukan perubahan data kembali karna tidak sesuainya
																																		perubahan sebelumnya pada data penjualan.
																																</div>
																																<div class="modal-footer">
																																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																																		<button type="submit" class="btn btn-success">Ya</button>
																																</div>
																														</form>
																												</div>
																										</div>
																								</div>
																								{{-- modal edit kembali end --}}
																						</td>
																				@endif


																		</tr>
																@endforeach
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</section>


		<!-- modal acc -->
		<section>

		</section>
@endsection


@push('css')
		<style>
				.link_selesai {
						font-weight: bold;

				}

				.link_selesai:hover {
						color: rgb(6, 129, 47) !important;

				}
		</style>
@endpush
