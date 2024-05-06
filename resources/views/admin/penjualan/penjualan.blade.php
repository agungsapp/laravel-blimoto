@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						<div class="col-12">
								<div class="callout callout-info">
										<h5><i class="fas fa-info"></i> Catatan:</h5>
										<p>Lakukan import/update data dengan import file CSV dengan format yang telah ditentukan. Silakan unduh format
												file CSV <a href="{{ asset('csv/template_penjualan.xlsx') }}" download>di sini</a>. <br>
												Data dengan nik yang sama atau tanggal lahir sama akan otomatis di skip oleh sistem.</p>
								</div>
						</div>
						<div class="col-12 mb-3">
								<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalImport">
										<i class="fas fa-file-import"></i><span class="ml-2">Import data penjualan</span>
								</button>


								<!-- Modal import -->
								<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImportLabel"
										aria-hidden="true">
										<div class="modal-dialog" role="document">
												<div class="modal-content">
														<div class="modal-header bg-primary">
																<h5 class="modal-title" id="modalImportLabel">Import Data Penjualan </h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																</button>
														</div>
														<div class="modal-body">
																<form action="{{ route('admin.penjualan.csv.import') }}" method="POST" enctype="multipart/form-data">
																		@csrf
																		@method('POST')
																		<div class="input-group mb-3">
																				<div class="custom-file">
																						<input type="file" name="file" class="custom-file-input" id="inputGroupFile02">
																						<label class="custom-file-label" for="inputGroupFile02"
																								aria-describedby="inputGroupFileAddon02">Choose file</label>
																				</div>
																				<div class="input-group-append">
																						<button type="submit" class="input-group-text btn-primary"
																								id="inputGroupFileAddon02">Import</button>
																				</div>
																		</div>
																</form>
														</div>
												</div>
										</div>
								</div>
								{{-- end modal penjualan --}}


						</div>
						<div class="col-12">
								<div class="card card-primary">
										<div class="card-header with-border">
												<h3 class="card-title">Input Data Penjualan</h3>
										</div>
										<form action="{{ route('admin.penjualan.data.store') }}" method="post">
												@csrf
												<div class="card-body">
														<div class="row">
																<div class="form-group col-md-4">
																		<label for="input-hasil">Nama Konsumen</label>
																		<input name="konsumen" type="text" class="form-control" placeholder="Masukan nama konsumen"
																				value="{{ old('konsumen') }}">
																</div>
																<div class="form-group col-md-4">
																		<label for="input-hasil">NIK Konsumen (Opsional)</label>
																		<input name="nik" type="text" class="form-control" placeholder="Masukan nik konsumen"
																				value="{{ old('nik') }}">
																</div>
																<div class="form-group col-md-4">
																		<label>Sales</label>
																		@if ($sales == null)
																				<p class="text-danger">Tidak ada data sales silahkan buat terlebih dahulu !</p>
																		@else
																				<select id="sales-input-input" name="sales" class="form-control select2" style="width: 100%;">
																						<option value="" selected>-- Pilih sales --</option>
																						@foreach ($sales as $s)
																								<option value="{{ $s->id }}" {{ old('sales') == $s->id ? 'selected' : '' }}>
																										{{ $s->nama }} | {{ $s->dealer->nama }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
														</div>

														<div class="row">
																<div class="form-group col-md-6">
																		<label for="input-bpkb">BPKB/STNK a.n</label>
																		<input name="bpkb" type="text" class="form-control"
																				placeholder="Masukan BPKB/STNK a.n (Tidak wajib)" id="input-bpkb" value="{{ old('bpkb') }}">
																</div>
																<div class="form-group col-md-6">
																		<label for="input-nomor-hp">Nomor HP</label>
																		<input name="no_hp" type="number" class="form-control" placeholder="Masukan nomor HP (Tidak wajib)"
																				id="input-nomor-hp" value="{{ old('no_hp') }}">
																</div>
														</div>

														<div class="row">
																<div class="form-group col-md-6">
																		<label>Metode Pembelian</label>
																		<select id="pembelian-input" name="metode_pembelian" class="form-control select2" style="width: 100%;">
																				<option value="" selected>-- Pilih pembelian --</option>
																				<option value="cash" {{ old('metode_pembelian') == 'cash' ? 'selected' : '' }}>Cash</option>
																				<option value="kredit" {{ old('metode_pembelian') == 'kredit' ? 'selected' : '' }}>Kredit</option>
																		</select>
																</div>
																<div class="form-group col-md-6">
																		<label for="input-tenor">Tenor</label>
																		<input name="tenor" type="text" class="form-control" placeholder="Masukan tenor"
																				id="input-tenor" value="{{ old('tenor') }}">
																</div>
														</div>

														<div class="row">
																<div class="form-group col-md-6">
																		<label for="input-dp">DP</label>
																		<input name="dp" type="number" class="form-control" placeholder="Masukan DP" id="input-dp"
																				value="{{ old('dp') }}">
																</div>
																<div class="form-group col-md-6">
																		<label for="input-diskon-dp">Diskon DP</label>
																		<input name="diskon_dp" type="number" class="form-control" placeholder="Masukan diskon DP"
																				id="input-diskon-dp" value="{{ old('diskon_dp') }}">
																</div>
														</div>

														<div class="row">
																<div class="form-group col-md-6">
																		<label>Kabupaten</label>
																		@if ($kota == null)
																				<p class="text-danger">Tidak ada data kabupaten silahkan buat terlebih dahulu !</p>
																		@else
																				<select id="kabupaten-input" name="kabupaten" class="form-control select2" style="width: 100%;">
																						<option value="" selected>-- Pilih kabupaten --</option>
																						@foreach ($kota as $k)
																								<option value="{{ $k->id }}" {{ old('kabupaten') == $k->id ? 'selected' : '' }}>
																										{{ $k->nama }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
																<div class="form-group col-md-6">
																		<label>Hasil</label>
																		@if ($hasil == null)
																				<p class="text-danger">Tidak ada data hasil silahkan buat terlebih dahulu !</p>
																		@else
																				<select id="hasil-input" name="hasil" class="form-control select2" style="width: 100%;">
																						<option value="" selected>-- Pilih hasil --</option>
																						@foreach ($hasil as $h)
																								<option value="{{ $h->id }}" {{ old('hasil') == $h->id ? 'selected' : '' }}>
																										{{ $h->hasil }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
														</div>

														<div class="row">
																<div class="form-group col-md-6">
																		<label>Leasing</label>
																		@if ($leasing == null)
																				<p class="text-danger">Tidak ada data leasing silahkan buat terlebih dahulu !</p>
																		@else
																				<select id="leasing-input" name="leasing" class="form-control select2" style="width: 100%;">
																						<option value="" selected>-- Pilih leasing --</option>
																						@foreach ($leasing as $l)
																								<option value="{{ $l->id }}" {{ old('leasing') == $l->id ? 'selected' : '' }}>
																										{{ $l->nama }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
																<div class="form-group col-md-6">
																		<label for="input-hasil">Catatan Penjualan</label>
																		<input name="catatan" type="text" class="form-control"
																				placeholder="Masukan catatan penjualan motor (kosongkan jika tidak ada)"
																				value="{{ old('catatan') }}">
																</div>
														</div>

														<div class="row">
																<div class="form-group col-md-4">
																		<label>Motor</label>
																		@if ($motor == null)
																				<p class="text-danger">Tidak ada data motor silahkan buat terlebih dahulu !</p>
																		@else
																				<select id="motor-input" name="motor" class="form-control select2" style="width: 100%;">
																						<option value="" selected>-- Pilih motor --</option>
																						@foreach ($motor as $m)
																								<option value="{{ $m->id }}" {{ old('motor') == $m->id ? 'selected' : '' }}>
																										{{ $m->nama }}</option>
																						@endforeach
																				</select>
																		@endif
																</div>
																<div class="form-group col-md-4">
																		<label for="warna_motor">Warna Motor</label>
																		<input name="warna_motor" type="text" class="form-control"
																				placeholder="Masukan warna motor (Tidak wajib)" value="{{ old('warna_motor') }}">
																</div>
																<div class="form-group col-md-4">
																		<label for="input-hasil">Jumlah</label>
																		<input name="jumlah" type="number" class="form-control" placeholder="Masukan jumlah motor"
																				value="{{ old('jumlah', '1') }}">
																</div>
														</div>

														<div class="row">
																<div class="form-group col-md-4">
																		<label>Metode Pembayaran</label>
																		<select id="metodePembayaranInput" name="metode_pembayaran"
																				class="form-control select2 metodePembayaran" style="width: 100%;">
																				<option value="" selected>-- Pilih metode pembayaran --</option>
																				<option value="cod" {{ old('metode_pembayaran') == 'cod' ? 'selected' : '' }}>Cod</option>
																				<option value="transfer" {{ old('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>Transfer
																				</option>
																				<option value="cek" {{ old('metode_pembayaran') == 'cek' ? 'selected' : '' }}>Cek/Bilyet Giro
																				</option>
																		</select>
																		<div class="form-check metodeHide my-4" id="metodeLainnya" style="display: none;">
																				<input type="text" class="form-control" placeholder="Masukan nama leasing"
																						name="metode_lainnya">
																		</div>
																</div>
																<div class="form-group col-md-4">
																		<label>Status Pembayaran DP</label>
																		<select id="status_pembayaran_input" name="status_pembayaran" class="form-control select2"
																				style="width: 100%;">
																				<option value="" selected>-- Pilih status pembayaran --</option>
																				<option value="pending" {{ old('status_pembayaran') == 'pending' ? 'selected' : '' }}>Pending
																				</option>
																				{{-- <option value="success" {{ old('status_pembayaran') == 'success' ? 'selected' : '' }}>Success
																				</option> --}}
																				<option value="cod" {{ old('status_pembayaran') == 'cod' ? 'selected' : '' }}>COD</option>
																		</select>
																</div>
																<div class="form-group col-md-4">
																		<label for="input-hasil">Nomor PO</label>
																		<input name="nomor_po" type="text" class="form-control"
																				placeholder="Kosongkan jika PO belum turun" value="{{ old('nomor_po') }}">
																</div>
														</div>

														<button type="submit" class="btn btn-primary">Submit</button>
												</div>
										</form>

								</div>

						</div>
				</div>
		</section>

@endsection

@push('script')
		<script>
				$('.select2').select2()
		</script>
@endpush
