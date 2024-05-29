@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">
								{{-- @dd($penjualan) --}}
								<div class="card card-primary">
										<div class="card-header">
												<h3 class="card-title">Data Penjualan Hasil {{ ucfirst($penjualan[0]->hasil->hasil ?? '') }}</h3>

										</div>

										<div class="card-body table-responsive">
												<table border="0" cellspacing="5" cellpadding="5" class="mb-4">
														<tbody>
																<tr>
																		<td>Dari Tanggal:</td>
																		<td><input type="text" id="min" name="min"></td>
																</tr>
																<tr>
																		<td>Sampai Tanggal:</td>
																		<td><input type="text" id="max" name="max"></td>
																</tr>
														</tbody>
												</table>
												<table id="data-sale" class="table-bordered table-striped table">
														<thead>
																<tr role="row">
																		<th>ID</th>
																		<th>Kode Transaksi</th>
																		<th>Nama Konsumen</th>
																		<th>Nama Sales</th>
																		<th class="no-visible">No HP</th>
																		<th class="no-visible">STNK</th>
																		<th>Metode Pembelian</th>
																		<th>Status Pembayaran DP</th>
																		<th class="no-visible">DP</th>
																		<th class="no-visible">Diskon DP</th>
																		<th class="no-visible">DP Bayar</th>
																		<th>Leasing</th>
																		<th>Motor</th>
																		<th>Warna</th>
																		<th>Hasil</th>
																		<th class="no-visible">Metode Pembayaran</th>
																		<th class="no-visible">Nomor PO</th>
																		<th class="no-visible">Tenor</th>
																		<th class="no-visible">Jumlah</th>
																		<th class="no-visible">Kota</th>
																		<th class="no-visible">Hasil</th>
																		<th class="no-visible">Catatan</th>
																		<th>Tanggal Dibuat</th>
																		<th class="no-visible">Tanggal Hasil</th>
																		<th class="no-export" width="100px">Action</th>
																</tr>
														</thead>
														<tbody>
																@if (!empty($penjualan))
																		@foreach ($penjualan as $index => $p)
																				<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
																						<td>{{ $p->id }}</td>
																						<td>{{ $p->kode_transaksi }}</td>
																						<td>{{ $p->nama_konsumen }}</td>
																						<td>{{ $p->sales->nama }}</td>
																						<td>{{ $p->no_hp }}</td>
																						<td>{{ $p->bpkb }}</td>
																						<td>{{ $p->metode_pembelian }}</td>
																						<td>{{ $p->status_pembayaran_dp }}</td>
																						<td>{{ $p->dp }}</td>
																						<td>{{ $p->diskon_dp }}</td>
																						<td>{{ $p->dp - $p->diskon_dp }}</td>
																						<td>{{ $p->leasing->nama ?? 'cash' }}</td>
																						<td>{{ $p->motor->nama }}</td>
																						<td>{{ $p->warna_motor }}</td>
																						<td>{{ $p->hasil->hasil }}</td>
																						<td>{{ $p->metode_pembayaran }}</td>
																						<td>{{ $p->no_po }}</td>
																						<td>{{ $p->tenor }}</td>
																						<td>{{ $p->jumlah }}</td>
																						<td>{{ $p->kota->nama }}</td>
																						<td>{{ $p->hasil->hasil }}</td>
																						<td>{{ $p->catatan }}</td>
																						<td>{{ $p->tanggal_dibuat }}</td>
																						<td>{{ $p->tanggal_hasil }}</td>
																						<td class="no-export">
																								<div>

																										<button type="button" class="btn btn-secondary w-100 load-detail-modal mb-1"
																												data-id="{{ $p->id }}"
																												data-url="{{ route('admin.penjualan.getPenjualan', ['id' => $p->id]) }}" data-toggle="modal"
																												data-target="#modalDetail">
																												Detail
																										</button>
																										{{-- <span class="btn btn-success">
																												@if ($p->pengajuanAksesBy('pengajuan')->exists())
																														<span
																																class="btn btn-success">{{ $p->pengajuanAksesBy('pengajuan')->first()->status }}</span>
																												@endif
																										</span> --}}

																										{{-- for debug --}}
																										{{-- <button class="btn btn-secondary">{{ $p->is_edit }}</button> --}}

																										@php
																												$isAdmin = Auth::guard('admin')->check();
																										@endphp

																										@if (Route::is('admin.penjualan.do.index'))
																												@if (!$isAdmin && $p->is_edit == false)
																														@if ($p->pengajuanAkses?->status == 'done')
																														@else
																																<!-- Button trigger modal pengajuan -->
																																<button type="button" class="btn btn-block btn-primary load_pengajuan_modal mb-1"
																																		data-toggle="modal" data-id="{{ $p->id }}"
																																		data-url="{{ route('admin.penjualan.pengajuan-akses.store') }}"
																																		data-target="#pengajuanEdit"
																																		{{ !$isAdmin && $p->pengajuanAkses?->status == 'pengajuan' ? 'disabled' : '' }}
																																		@if ($p->pengajuanAkses?->status == 'pengajuan') title="sedang menunggu persetujuan ceo" @endif>
																																		Ajukan Edit
																																</button>
																														@endif
																												@endif
																										@endif

																										@if (Auth::guard('admin')->check() || $p->is_cetak == 0)
																												@if (!Route::is('admin.penjualan.do.index') || (Auth::guard('admin')->check() || $p->is_edit == true))
																														<button type="button" class="btn btn-warning w-100 load-update-modal mb-1"
																																data-id="{{ $p->id }}"
																																data-url="{{ route('admin.penjualan.getPenjualan', ['id' => $p->id]) }}"
																																data-toggle="modal" data-target="#modalEdit"
																																{{ Route::is('admin.penjualan.do.index') &&
																																(!$isAdmin && ($p->status_pembayaran_dp == 'refunded' || $p->is_edit == false))
																																    ? 'disabled'
																																    : '' }}>
																																Edit
																														</button>
																												@endif
																												<form action="{{ route('admin.penjualan.data.destroy', $p->id) }}" method="post">
																														@csrf
																														@method('DELETE')
																														<button type="submit" class="btn btn-danger show_confirm w-100"
																																{{ $p->status_pembayaran_dp == 'refunded' ? 'disabled' : '' }}>Delete</button>
																												</form>
																										@endif

																								</div>
																						</td>
																				</tr>
																		@endforeach
																@endif

														</tbody>
												</table>
										</div>

								</div>
						</div>
				</div>
		</section>


		<!-- Modal pengajuan -->
		<section>
				<div class="modal fade" id="pengajuanEdit" tabindex="-1" aria-labelledby="pengajuanEditLabel" aria-hidden="true">
						<div class="modal-dialog">
								<div class="modal-content">
										<div class="modal-header">
												<h5 class="modal-title" id="pengajuanEditLabel">Pengjuan edit data</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<form action="">
												@csrf
												<div class="modal-body">
														{{-- hidden id penjualan --}}
														<input type="hidden" name="id_penjualan" id="id_penjualan">
														<div class="form-group">
																<label for="tujuan">Data apa yang ingin di edit</label>
																<select class="form-control form-select" id="tujuan" name="tujuan[]" multiple="multiple">
																		<option value="">-- pilih tujuan --</option>
																		<option value="nik">NIK</option>
																		<option value="nomor po">Nomor PO</option>
																		<option value="nama konsumen">Nama Konsumen</option>
																		<option value="nama bpkb">Nama BPKB</option>
																		<option value="warna motor">Warna Motor</option>
																		<option value="nomor handphone">Nomor Handphone</option>
																		<option value="data hasil">Data Hasil</option>
																</select>
														</div>

														<div class="form-group">
																<label for="catatan">Alasan : </label>
																<textarea class="form-control" name="catatan" id="catatan" rows="3"></textarea>
														</div>
												</div>
												<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="button" id="btn_ajukan" class="btn btn-primary">Ajukan</button>
												</div>
										</form>
								</div>
						</div>
				</div>
		</section>

		<!-- Modal update -->
		<section>
				<div class="modal fade" id="modalEdit" role="dialog"
						data-base-action-url="{{ route('admin.penjualan.data.update', ['data' => '__id__']) }}"
						aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
								<div class="modal-content">
										<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Edit data</h4>
										</div>
										<form action="" method="post">
												@csrf
												@method('PUT')
												<div class="modal-body">
														<div class="card card-primary">
																<div class="card-header with-border">
																		<h3 class="card-title">Update Data sales</h3>
																</div>
																<div class="card-body">
																		<div class="form-group">
																				<div class="row">
																						<div class="form-group col-md-6">
																								<label for="input-hasil">Nama Konsumen</label>
																								<input name="konsumen" type="text" class="form-control"
																										placeholder="Masukan nama konsumen">
																						</div>
																						<div class="form-group col-md-6">
																								<label>Sales</label>
																								@if ($sales == null)
																										<p class="text-danger">Tidak ada data sales silahkan buat terlebih dahulu !</p>
																								@else
																										<select id="sales" name="sales" class="form-control select2" style="width: 100%;">
																												@foreach ($sales as $s)
																														<option value="{{ $s->id }}">{{ $s->nama }}</option>
																												@endforeach
																										</select>
																								@endif
																						</div>
																				</div>

																				<div class="row">
																						<div class="form-group col-md-6">
																								<label for="input-bpkb">BPKB/STNK a.n</label>
																								<input name="bpkb" type="text" class="form-control"
																										placeholder="Masukan BPKB/STNK a.n (Tidak wajib)" id="input-bpkb"
																										value="{{ old('bpkb') }}">
																						</div>
																						<div class="form-group col-md-6">
																								<label for="input-nomor-hp">Nomor HP</label>
																								<input name="no_hp" type="number" class="form-control"
																										placeholder="Masukan nomor HP (Tidak wajib)" id="input-nomor-hp"
																										value="{{ old('no_hp') }}">
																						</div>
																				</div>

																				<div class="row">
																						<div class="form-group col-md-6">
																								<label>Metode Pembelian</label>
																								<select id="pembelian-update" name="metode_pembelian" class="form-control select2"
																										style="width: 100%;">
																										<option value="">-- Pilih pembelian --</option>
																										<option value="cash">Cash</option>
																										<option value="kredit">Kredit</option>
																								</select>
																						</div>
																						<div class="form-group col-md-6" id="tenorUpdate">
																								<label for="input-tenor">Tenor</label>
																								<input name="tenor" type="text" class="form-control" placeholder="Masukan tenor">
																						</div>
																				</div>

																				<div class="row">
																						<div class="form-group col-md-6">
																								<label>Kabupaten</label>
																								@if ($kota == null)
																										<p class="text-danger">Tidak ada data kabupaten silahkan buat terlebih dahulu !</p>
																								@else
																										<select id="kabupaten" name="kabupaten" class="form-control select2" style="width: 100%;">
																												@foreach ($kota as $k)
																														<option value="{{ $k->id }}">{{ $k->nama }}</option>
																												@endforeach
																										</select>
																								@endif
																						</div>
																						<div class="form-group col-md-6">
																								<label>Hasil</label>
																								@if ($hasil == null)
																										<p class="text-danger">Tidak ada data hasil silahkan buat terlebih dahulu !</p>
																								@else
																										<select id="hasil" name="hasil" class="form-control select2" style="width: 100%;">
																												@foreach ($hasil as $h)
																														<option value="{{ $h->id }}">{{ $h->hasil }}</option>
																												@endforeach
																										</select>
																								@endif
																						</div>
																				</div>

																				<div class="row">
																						<div class="form-group col-md-6">
																								<label>Motor</label>
																								@if ($motor == null)
																										<p class="text-danger">Tidak ada data motor silahkan buat terlebih dahulu !</p>
																								@else
																										<select id="motor" name="motor" class="form-control select2" style="width: 100%;">
																												<option value="" selected>-- Pilih motor --</option>
																												@foreach ($motor as $m)
																														<option value="{{ $m->id }}">{{ $m->nama }}</option>
																												@endforeach
																										</select>
																								@endif
																						</div>
																						<div class="form-group col-md-6">
																								<label for="input-hasil">Jumlah</label>
																								<input name="jumlah" type="number" class="form-control" placeholder="Masukan jumlah motor"
																										value="{{ $p->jumlah ?? 1 }}">
																						</div>
																				</div>

																				<div class="row">
																						<div class="form-group col-md-6" id="leasingUpdate">
																								<label>Leasing</label>
																								<select name="leasing" class="form-control select2" style="width: 100%;">
																										<option value="" selected>-- Pilih leasing --</option>
																										@foreach ($leasing as $l)
																												<option value="{{ $l->id }}">{{ $l->nama }}</option>
																										@endforeach
																								</select>
																						</div>
																						<div class="form-group col-md-6">
																								<label for="input-hasil">Catatan Penjualan</label>
																								<input name="catatan" type="text" class="form-control"
																										placeholder="Masukan catatan penjualan motor (kosongkan jika tida ada)">
																						</div>
																				</div>

																				<div class="row">
																						<div class="form-group col-md-6">
																								<label>Metode Pembayaran</label>
																								<select id="metodePembayaranInput" name="metode_pembayaran"
																										class="form-control select2 metodePembayaran" style="width: 100%;">
																										<option value="" selected>-- Pilih metode pembayaran --</option>
																										<option value="cod">Cod</option>
																										<option value="transfer">Transfer</option>
																										<option value="cek">Cek/Bilyet Giro</option>
																								</select>
																						</div>
																						<div class="form-group col-md-6">
																								<label for="status_pembayaran_dp">Status Pembayaran DP</label>
																								<select id="status_pembayaran_dp" name="status_pembayaran_dp" class="form-control select2"
																										style="width: 100%;">
																										<option value="pending">Pending</option>
																										<option value="success">Success</option>
																										<option value="cod">COD</option>
																								</select>
																						</div>
																				</div>

																				<div class="row">
																						<div class="form-group col-md-6">
																								<label for="input-dp">DP</label>
																								<input name="dp" type="number" class="form-control"
																										placeholder="Masukan DP yang sudah dipotong diskon" id="input-dp">
																						</div>
																						<div class="form-group col-md-6">
																								<label for="input-diskon-dp">Diskon DP</label>
																								<input name="diskon_dp" type="number" class="form-control" placeholder="Masukan diskon DP"
																										id="input-diskon-dp">
																						</div>
																				</div>

																				<div class="row">
																						<div class="form-group col-md-6">
																								<label>Warna Motor</label>
																								<input name="warna_motor" type="text" class="form-control"
																										placeholder="Warna motor (Tidak wajib)">
																						</div>
																						<div class="form-group col-md-6">
																								<label for="input-hasil">Nomor PO</label>
																								<input name="nomor_po" type="text" class="form-control"
																										placeholder="Kosongkan jika PO belum turun">
																						</div>
																				</div>

																				<div class="row">
																						<div class="form-group col-md-6">
																								<label>Tanggal Dibuat: </label>
																								<div class="input-group date tanggal_dibuat" id="reservationdate" data-target-input="nearest">
																										<input type="text" class="form-control datetimepicker-input tanggal_dibuat"
																												data-target="#reservationdate" name="tanggal_dibuat" />
																										<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
																												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																										</div>
																								</div>
																						</div>
																						<div class="form-group col-md-6">
																								<label>Tanggal Hasil:</label>
																								<div class="input-group date tanggal_hasil" id="reservationdate2" data-target-input="nearest">
																										<input type="text" class="form-control datetimepicker-input tanggal_hasil"
																												data-target="#reservationdate2" name="tanggal_hasil" />
																										<div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
																												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="modal-footer">
																		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																		<button type="submit" class="btn btn-primary">Save changes</button>
																</div>
										</form>
								</div>
						</div>
				</div>
		</section>


		<!-- Modal detail -->
		<section>
				<div class="modal fade" id="modalDetail" role="dialog">
						<div class="modal-dialog" role="document">
								<div class="modal-content">
										<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Detail data</h4>
										</div>
										<div class="modal-body">
												<div class="card card-primary">
														<div class="card-body">
																<div class="form-group">
																		<div class="row">
																				<div class="form-group col-md-12">
																						<label for="konsumen">Nama Konsumen</label>
																						<input name="konsumen" type="text" class="form-control" readonly>
																				</div>
																		</div>
																		<div class="row">
																				<div class="form-group col-md-12">
																						<label for="sales">Nama Sales</label>
																						<input name="sales" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-12">
																						<label for="bpkb">BPKB/STNK a.n</label>
																						<input name="bpkb" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="no_hp">NO HP</label>
																						<input name="no_hp" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="metode_pembelian">Metode Pembelian</label>
																						<input name="metode_pembelian" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="dp">DP</label>
																						<input name="dp" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="diskon_dp">Diskon DP</label>
																						<input name="diskon_dp" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="metode_pembayaran">Metode Pembayaran</label>
																						<input name="metode_pembayaran" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="status_dp">Status Pembayaran DP</label>
																						<input name="status_dp" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="nomor_po">Nomor PO</label>
																						<input name="nomor_po" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="leasing">Leasing</label>
																						<input name="leasing" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="tenor">Tenor</label>
																						<input name="tenor" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="motor">Nama Motor</label>
																						<input name="motor" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="jumlah">Jumlah</label>
																						<input name="jumlah" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="kota">Kota</label>
																						<input name="kota" type="text" class="form-control" readonly>
																				</div>
																		</div>

																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="hasil">Hasil</label>
																						<input name="hasil" type="text" class="form-control" readonly>
																				</div>
																				<div class="form-group col-md-6">
																						<label for="catatan">Catatan</label>
																						<input name="catatan" type="text" class="form-control" readonly>
																				</div>
																		</div>
																		<div class="row">
																				<div class="form-group col-md-6">
																						<label>Tanggal Dibuat: </label>
																						<div class="input-group date tanggal_dibuat" id="reservationdate">
																								<input type="text" class="form-control" name="tanggal_dibuat" readonly
																										placeholder="dd/mm/yyyy" />
																						</div>
																				</div>
																				<div class="form-group col-md-6">
																						<label>Tanggal Hasil:</label>
																						<div class="input-group date tanggal_hasil" id="reservationdate2">
																								<input type="text" class="form-control" name="tanggal_hasil" readonly
																										placeholder="dd/mm/yyyy" />
																						</div>
																				</div>
																		</div>

																		{{-- <div class="row">
																				<div class="form-group col-md-6">
																						<label>Tanggal Dibuat: </label>
																						<div class="input-group date tanggal_dibuat" id="reservationdate" data-target-input="nearest">
																								<input type="text" class="form-control datetimepicker-input tanggal_dibuat"
																										data-target="#reservationdate" name="tanggal_dibuat" readonly />
																								<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
																										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																								</div>
																						</div>
																				</div>
																				<div class="form-group col-md-6">
																						<label>Tanggal Hasil:</label>
																						<div class="input-group date tanggal_hasil" id="reservationdate2" data-target-input="nearest">
																								<input type="text" class="form-control datetimepicker-input tanggal_hasil"
																										data-target="#reservationdate2" name="tanggal_hasil" readonly />
																								<div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
																										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																								</div>
																						</div>
																				</div>
																		</div> --}}
																</div>
														</div>

												</div>
										</div>
										<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
								</div>
						</div>
				</div>
		</section>
@endsection
@push('script')
		<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>

		<script>
				document.addEventListener("DOMContentLoaded", function() {
						toggleLeasingInputUpdate();
				});

				function toggleLeasingInputUpdate() {
						if ($('#pembelian-update').val() === 'cash') {
								$('#leasingUpdate').closest('.form-group').hide();
								$('#tenorUpdate').closest('.form-group').hide();
						} else {
								$('#leasingUpdate').closest('.form-group').show();
								$('#tenorUpdate').closest('.form-group').show();
						}
				}
				toggleLeasingInputUpdate();
				$('#pembelian-update').change(function() {
						toggleLeasingInputUpdate();
				});
		</script>

		<script>
				$(document).on('click', '.load-payment-modal', function() {
						var url = $(this).data('url');
						var actionUrl = $(this).data('action-url');

						$.ajax({
								url: url,
								type: 'GET',
								dataType: 'json',
								success: function(data) {
										$('#modalBayar form').attr('action', actionUrl);
										$('#id-sales').val(data.sales.id);
										$('#nama-sales').val(data.sales.nama);
										$('#nama-konsumen').val(data.nama_konsumen);
										$('#dp').val(Number(data.dp) - Number(data.diskon_dp));
								},
								error: function(xhr, status, error) {
										swal({
												title: `Error`,
												text: error,
												icon: "error",
												buttons: true,
												dangerMode: true,
										})
								}
						});
				});
		</script>

		<script>
				// This function toggles additional input fields based on the selected payment method.
				function toggleMetodeLainnya(selectElement) {
						var metodeLainnyaInput = document.getElementById('metodeLainnya');
						var jangkaWaktuInput = document.getElementById('jangkaWaktuInput');

						if (selectElement.value === 'tunai' || selectElement.value === 'cek') {
								metodeLainnyaInput.style.display = 'none';
								jangkaWaktuInput.style.display = 'none';
						} else {
								metodeLainnyaInput.style.display = 'block';
								jangkaWaktuInput.style.display = 'block';
						}
				}


				$(document).on('click', '.load_pengajuan_modal', function() {
						const id = $(this).data('id');
						const dataUrl = $(this).data('url');
						const modalId = '#pengajuanEdit';

						$('#tujuan').select2();
						$('#id_penjualan').val(id);
						$('#pengajuanEdit form').attr('action', dataUrl);
				});

				$(document).on('click', '#btn_ajukan', function(e) {
						e.preventDefault();

						const form = $('#pengajuanEdit form');
						const formData = new FormData(form[0]);
						$.ajax({
								url: form.attr('action'),
								type: 'POST',
								data: formData,
								processData: false,
								contentType: false,
								success: function(response) {
										console.log(response);
										Swal.fire({
												title: "Berhasil",
												text: "pengajuanmu sedang di tinjau.",
												icon: "success",
										});
										$('#pengajuanEdit').modal('hide');
								},
								error: function(xhr, status, error) {
										// console.error(xhr.responseText);
										// console.log(xhr.responseJSON.message);
										Swal.fire({
												title: "Error",
												text: xhr.responseJSON.message,
												icon: "error",
										});
								}
						});


				})


				// When the 'Cetak' button is clicked, this event handler will fetch the data
				// and populate the print modal fields.
				$(document).on('click', '.load-print-modal', function() {
						var id = $(this).data('id');
						var dataUrl = $(this).data('url');
						var modalId = '#modalCetak'; // Make sure this matches the ID of your modal

						// Fetch the data and populate the modal
						$.ajax({
								url: dataUrl,
								type: 'GET',
								dataType: 'json',
								success: function(data) {
										// Assuming 'data' contains all the necessary fields for the print modal
										$(modalId + ' #tanggal_dibuat').val(data.tanggal_dibuat);
										$(modalId + ' [name="nama_pemohon"]').val(data.nama_konsumen);
										$(modalId + ' [name="kabupaten"]').val(data.kota.nama);
										$(modalId + ' [name="motor"]').val(data.id_motor);
										$(modalId + ' [name="id_penjualan"]').val(data.id);
										$(modalId + ' [name="dp"]').val(Number(data.dp));
										$(modalId + ' [name="total_diskon"]').val(Number(data.diskon_dp));
										$(modalId + ' [name="metode_pembelian"]').val(data.metode_pembelian).trigger('change');
										$(modalId + ' [name="warna"]').val(data.warna_motor);
										$(modalId + ' [name="nomor_hp"]').val(data.no_hp);
										$(modalId + ' [name="bpkb_stnk"]').val(data.bpkb);
										$(modalId + ' [name="jangka_waktu"]').val(data.tenor);
										$(modalId + ' [name="no_po"]').val(data.no_po);

										// Update the form action URL dynamically
										$(modalId + ' form').attr('action', '{{ route('admin.cetakPDF') }}');

										// Show the modal
										$(modalId).modal('show');
								},
								error: function(xhr, status, error) {
										alert('An error occurred while loading print data: ' + error);
								}
						});

						// Call the toggle function for the existing method selection
						var metodePembayaranSelect = document.getElementById('metodePembayaran');
						toggleMetodeLainnya(metodePembayaranSelect);
				});
		</script>

		<script>
				$(document).on('click', '.load-update-modal', function() {
						var dataUrl = $(this).data('url');
						var modalId = '#modalEdit';
						var modal = $(modalId);
						var baseActionUrl = modal.data('base-action-url');

						$.ajax({
								url: dataUrl,
								type: 'GET',
								dataType: 'json',
								success: function(response) {
										var data = response.data;
										var dpValue = Number(data.dp);
										var diskonDpValue = Number(data.diskon_dp);

										// Populate the modal's form fields with the fetched data
										modal.find('[name="konsumen"]').val(data.nama_konsumen);
										modal.find('[name="sales"]').val(data.id_sales).trigger('change');
										modal.find('[name="metode_pembayaran"]').val(data.metode_pembayaran).trigger('change');
										modal.find('[name="tenor"]').val(data.tenor);
										modal.find('[name="nomor_po"]').val(data.no_po);
										modal.find('[name="kabupaten"]').val(data.id_kota).trigger('change');
										modal.find('[name="hasil"]').val(data.id_hasil).trigger('change');
										modal.find('[name="motor"]').val(data.id_motor).trigger('change');
										modal.find('[name="jumlah"]').val(data.jumlah);
										modal.find('[name="leasing"]').val(data.id_lising).trigger(
												'change'); // Make sure the field is 'leasing' and not 'lising'
										modal.find('[name="catatan"]').val(data.catatan);
										modal.find('[name="status_pembayaran_dp"]').val(data.status_pembayaran_dp).trigger('change');
										modal.find('[name="dp"]').val(dpValue);
										modal.find('[name="diskon_dp"]').val(diskonDpValue);
										modal.find('[name="warna_motor"]').val(data.warna_motor);
										modal.find('[name="bpkb"]').val(data.bpkb);
										modal.find('[name="no_hp"]').val(data.no_hp);
										modal.find('[name="metode_pembelian"]').val(data.metode_pembelian).trigger('change');

										// Correctly format the dates before setting the values
										var tanggalDibuat = data.tanggal_dibuat ? formatDate(data.tanggal_dibuat) : '';
										var tanggalHasil = data.tanggal_hasil ? formatDate(data.tanggal_hasil) : '';

										modal.find('[name="tanggal_dibuat"]').val(tanggalDibuat);
										modal.find('[name="tanggal_hasil"]').val(tanggalHasil);

										function formatDate(dateString) {
												var options = {
														year: 'numeric',
														month: '2-digit',
														day: '2-digit'
												};
												var formattedDate = new Date(dateString).toLocaleDateString('en-US', options);
												return formattedDate;
										}


										// Update the form action URL dynamically
										var actionUrl = baseActionUrl.replace('__id__', data.id);
										modal.find('form').attr('action', actionUrl);

										// Show the modal
										modal.modal('show');
								},
								error: function(xhr, status, error) {
										alert('An error occurred: ' + error);
								}
						});
				});
		</script>


		{{-- sc modal detail --}}
		<script>
				$(document).on('click', '.load-detail-modal', function() {
						var dataUrl = $(this).data('url');
						var modalId = '#modalDetail';
						var modal = $(modalId);
						var baseActionUrl = modal.data('base-action-url');

						$.ajax({
								url: dataUrl,
								type: 'GET',
								dataType: 'json',
								success: function(response) {
										var data = response.data; // Ensure you are referencing the data object correctly
										var dpValue = Number(data.dp);
										var diskonDpValue = Number(data.diskon_dp);

										// Populate the modal's form fields with the fetched data
										modal.find('[name="konsumen"]').val(data.nama_konsumen);
										modal.find('[name="sales"]').val(data.sales.nama);
										modal.find('[name="bpkb"]').val(data.bpkb);
										modal.find('[name="no_hp"]').val(data.no_hp);
										modal.find('[name="metode_pembayaran"]').val(data.metode_pembayaran);
										modal.find('[name="metode_pembelian"]').val(data.metode_pembelian);
										modal.find('[name="status_dp"]').val(data.status_pembayaran_dp);
										modal.find('[name="dp"]').val(data.dp);
										modal.find('[name="diskon_dp"]').val(data.diskon_dp);
										modal.find('[name="nomor_po"]').val(data.no_po ? data.no_po : 'Belum ada');
										modal.find('[name="tenor"]').val(data.tenor);
										modal.find('[name="kota"]').val(data.kota.nama);
										modal.find('[name="hasil"]').val(data.hasil.hasil);
										modal.find('[name="motor"]').val(data.motor.nama);
										modal.find('[name="jumlah"]').val(data.jumlah);
										modal.find('[name="leasing"]').val(data.leasing ? data.leasing.nama :
												'Cash'); // Make sure the field is 'leasing' and not 'lising'
										modal.find('[name="catatan"]').val(data.catatan);
										modal.find('[name="status_pembayaran_dp"]').val(data.status_pembayaran_dp);
										modal.find('[name="dp"]').val(dpValue);
										modal.find('[name="diskon_dp"]').val(diskonDpValue);

										// Correctly format the dates before setting the values
										var tanggalDibuat = formatDate(data.tanggal_dibuat);
										var tanggalHasil = formatDate(data.tanggal_hasil);

										console.log(`debug tanggal : ${tanggalDibuat} dan tanggal hasil : ${tanggalHasil}`);

										modal.find('[name="tanggal_dibuat"]').attr("placeholder", 'dd/mm/yyyy').val(tanggalDibuat);
										modal.find('[name="tanggal_hasil"]').attr("placeholder", 'dd/mm/yyyy').val(tanggalHasil);

										function formatDate(dateString) {
												if (dateString) {
														var dateObj = new Date(dateString);
														if (!isNaN(dateObj.getTime())) {
																var options = {
																		year: 'numeric',
																		month: '2-digit',
																		day: '2-digit'
																};
																return dateObj.toLocaleDateString('en-US', options);
														}
												}
												return ''; // Mengembalikan string kosong untuk input text
										}

										// Show the modal
										modal.modal('show');
								},
								error: function(xhr, status, error) {
										alert('An error occurred: ' + error);
								}
						});
				});
		</script>

		<script>
				$('.select2').select2()

				function toggleLeasingInput() {
						if ($('#pembelian-input').val() === 'cash') {
								$('#leasing-input').closest('.form-group').hide();
								$('#input-tenor').closest('.form-group').hide();
						} else {
								$('#leasing-input').closest('.form-group').show();
								$('#input-tenor').closest('.form-group').show();
						}
				}
				toggleLeasingInput();
				$('#pembelian-input').change(function() {
						toggleLeasingInput();
				});

				let minDate, maxDate;
				var table = $('#data-sale').DataTable({
						dom: 'Bfrtip', // 'B' for buttons
						buttons: [{
								extend: 'excelHtml5',
								title: 'Penjualan BliMoto', // Excel export button
								exportOptions: {
										columns: ':not(.no-export)' // Exclude columns with the class 'no-export'
								}
						}],
						order: [
								[0, 'desc']
						],
						columnDefs: [{
								targets: 'no-visible',
								visible: false, // Set the visibility to false for 'no-visible' class
						}]
				});

				// Apply the filter on input change
				$('#min, #max').on('change', function() {
						table.draw();
				});

				// Create date inputs
				minDate = new DateTime('#min', {});
				maxDate = new DateTime('#max', {});
				// Custom filtering function which will search data in column four between two values
				$.fn.dataTable.ext.search.push(
						function(settings, data, dataIndex) {
								var minDate = $('#min').val();
								var maxDate = $('#max').val();
								var date = moment(data[21]);
								if (
										(minDate === '' || date.isSameOrAfter(minDate)) &&
										(maxDate === '' || date.isSameOrBefore(maxDate))
								) {
										return true;
								}

								return false;
						}
				);
		</script>

		<script>
				function initDatePickers() {
						$('.tanggal_dibuat').datetimepicker({
								format: 'L'
						});

						$('.tanggal_hasil').datetimepicker({
								format: 'L'
						});
				}

				$(document).ready(function() {
						$('#data-sale').on('shown.bs.modal', '.modal', function() {
								initDatePickers();
								$('.select2').select2()
						});

						$('button[data-toggle="modal"]').on('click', function() {
								initDatePickers();
								$('.select2').select2()
						});
				});

				function formatTanggal(tanggal) {
						return moment(tanggal, 'MM/DD/YYYY').format('DD MMMM YYYY');
				}

				$('.jangka_waktu').datetimepicker({
						format: 'L',
						locale: 'id',
				});

				$('.jangka_waktu').on('change.datetimepicker', function(e) {
						var tanggalDiformat = formatTanggal(e.date);
						$('.jangka_send').val(tanggalDiformat);
				});

				var tanggalInput = $('#tanggal_dibuat');
				var tanggalLama = tanggalInput.val();
				var tanggalBaru = formatTanggal(tanggalLama);
				tanggalInput.val(tanggalBaru);

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
				})
		</script>

		<script>
				$(document).on('click', '#pay-button', function(e) {
						e.preventDefault();

						var form = $(this).closest('form');
						var formData = new FormData(form.get(0));

						fetch(form.attr('action'), {
										method: 'POST',
										headers: {
												'X-CSRF-TOKEN': '{{ csrf_token() }}',
												'Accept': 'application/json',
										},
										body: formData
								})
								.then(response => response.json())
								.then(data => {
										if (data.redirect_url) {
												// Open the Midtrans payment page in a new tab
												window.open(data.redirect_url, '_blank');
										} else {
												swal({
														title: `Error`,
														text: data.pesan,
														icon: "error",
														buttons: true,
														dangerMode: true,
												})
										}
								})
								.catch(error => {
										console.error('Error:', error);
								});
				});
		</script>
@endpush
