@extends('admin.layouts.main')
@section('content')
		<section class="content">
				<div class="row">
						{{-- <div class="col-12">
								<div class="callout callout-info">
										<h5><i class="fas fa-info"></i> Catatan:</h5>
										<p>Lakukan import/update data dengan import file CSV dengan format yang telah ditentukan. Silakan unduh format
												file CSV <a href="{{ asset('csv/template_penjualan.xlsx') }}" download>di sini</a>.
												<br>
												Data dengan nik yang sama atau tanggal lahir sama akan otomatis di skip oleh sistem.
												<br>
												Harap lakukan import dengan hati - hati dan pastikan semua data sesuai.

										</p>
								</div>
						</div> --}}
						<div class="col-12 mb-3">
								{{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalImport">
										<i class="fas fa-file-import"></i><span class="ml-2">Import data penjualan</span>
								</button> --}}


								<!-- Modal import -->
								{{-- <div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImportLabel"
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
								</div> --}}
								{{-- end modal penjualan --}}


						</div>
						<div class="col-12">
								<div class="card">
										<div class="card-header with-border">
												<h3 class="card-title">Input Data Penjualan</h3>
										</div>
										<form action="{{ route('admin.penjualan.data.store') }}" method="post">
												@csrf
												<div class="card-body">

														{{-- card data konsumen --}}
														<div class="card card-cyan">
																<div class="card-header">
																		<div class="card-title">
																				<strong>Data Konsumen</strong>
																		</div>
																</div>
																<div class="card-body">
																		{{-- end body data konsumen --}}
																		<div class="row">
																				<div class="form-group col-md-6">
																						<label for="input-hasil">Nama Konsumen</label>
																						<input id="nama_konsumen" name="konsumen" type="text" class="form-control"
																								placeholder="Masukan nama konsumen" value="{{ old('konsumen') }}">
																				</div>
																				<div class="form-group col-md-6">
																						<label for="input-hasil">NIK Konsumen (Opsional)</label>
																						<input id="nik" name="nik" type="number" class="form-control"
																								placeholder="Masukan nik konsumen" value="{{ old('nik') }}">
																				</div>
																				<div class="form-group col-md-6">
																						<label for="input-bpkb">BPKB/STNK a.n</label>
																						<input id="bpkb" name="bpkb" type="text" class="form-control"
																								placeholder="Masukan BPKB/STNK a.n (Tidak wajib)" id="input-bpkb" value="{{ old('bpkb') }}">
																				</div>
																				<div class="form-group col-md-6">
																						<label for="input-nomor-hp">Nomor HP</label>
																						<input name="no_hp" type="number" class="form-control"
																								placeholder="Masukan nomor HP (Tidak wajib)" id="input-nomor-hp" value="{{ old('no_hp') }}">
																				</div>
																		</div>


																</div>
														</div>
														{{-- card data kendaraan --}}
														<div class="card card-warning">
																<div class="card-header">
																		<div class="card-title">
																				<strong> Data Kendaraan</strong>
																		</div>
																</div>
																<div class="card-body">
																		<div class="row">
																				<div class="form-group col-md-6">
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
																				<div class="form-group col-md-6">

																						<label> Warna Motor</label>
																						@if ($colors == null)
																								<p class="text-danger">Tidak ada data warna motor silahkan buat terlebih dahulu !</p>
																						@else
																								<select id="motor-input" name="warna_motor" class="form-control select2" style="width: 100%;">
																										<option value="" selected>-- Pilih warna motor --</option>
																										@foreach ($colors as $c)
																												<option value="{{ $c->nama }}" {{ old('motor') == $c->nama ? 'selected' : '' }}>
																														{{ $c->nama }}</option>
																										@endforeach
																								</select>
																						@endif
																				</div>
																				<div class="form-group col-md-6">
																						<label for="input-hasil">Jumlah</label>
																						<input name="jumlah" type="number" class="form-control" placeholder="Masukan jumlah motor"
																								value="{{ old('jumlah', '1') }}">
																				</div>
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
																		</div>
																</div>
																{{-- end body card kendaraan --}}
														</div>
														{{-- card data sales dan pembayaran --}}
														<div class="card card-danger">
																<div class="card-header">
																		<div class="card-title">
																				Sales dan Pembayaran
																		</div>
																</div>
																<div class="card-body">
																		<div class="row">
																				{{-- metode pembelian --}}
																				<div class="form-group col-md-6">
																						<label>Metode Pembelian</label>
																						<select id="pembelian-input" name="metode_pembelian" class="form-control select2"
																								style="width: 100%;">
																								<option value="" selected>-- Pilih pembelian --</option>
																								<option value="cash" {{ old('metode_pembelian') == 'cash' ? 'selected' : '' }}>Cash</option>
																								<option value="kredit" {{ old('metode_pembelian') == 'kredit' ? 'selected' : '' }}>Kredit
																								</option>
																						</select>
																				</div>
																				{{-- sales --}}
																				<div class="form-group col-md-6">
																						<label>Sales</label>
																						@if ($sales == null)
																								<p class="text-danger">Tidak ada data sales silahkan buat terlebih dahulu !</p>
																						@else
																								<select id="sales-input-input" name="sales" class="form-control select2"
																										style="width: 100%;">
																										<option value="" selected>-- Pilih sales --</option>
																										@foreach ($sales as $s)
																												<option value="{{ $s->id }}" {{ old('sales') == $s->id ? 'selected' : '' }}>
																														{{ $s->nama }} | {{ $s->dealer->nama }}</option>
																										@endforeach
																								</select>
																						@endif
																				</div>
																				{{-- dp --}}
																				<div class="form-group col-md-6" id="dp_wrapper">
																						<label id="dp_label" for="input-dp">DP</label>
																						<input name="dp" type="number" min="0" class="form-control"
																								placeholder="Masukan DP" id="input-dp" value="{{ old('dp') ?? 0 }}"
																								aria-describedby="dpHelp">
																						<div id="dpHelp" class="d-none helper_info_minimal_dp text-info form-text">Dp minimal untuk
																								motor <span class="nama_motor_help"></span> adalah <span class="minimal_motor_help"></span>.
																						</div>
																				</div>
																				{{-- tanda jadi --}}
																				<div class="form-group col-md-6 d-none" id="tj_wrapper">
																						<label id="tj_label" for="input-dp">Tanda Jadi</label>
																						<input name="tj" type="number" min="0" class="form-control"
																								placeholder="Masukan tanda jadi " id="input-dp" value="{{ old('tj') }}"
																								aria-describedby="tjHelp">
																						<div id="tjHelp" class="d-none helper_info_minimal_dp text-info form-text">Tanda jadi minimal
																								untuk motor <span class="nama_motor_help"></span> adalah <span
																										class="minimal_motor_help"></span>
																						</div>
																				</div>
																				{{-- diskon dp --}}
																				<div class="form-group col-md-6">
																						<label for="input-diskon-dp">Diskon DP</label>
																						<input name="diskon_dp" type="number" class="form-control" placeholder="Masukan diskon DP"
																								id="input-diskon-dp" value="{{ old('diskon_dp') }}">
																				</div>
																				{{-- tenor --}}
																				<div class="form-group col-md-6" id="tenor_wrapper">
																						<label for="input-tenor">Tenor</label>
																						<input name="tenor" type="text" class="form-control" placeholder="Masukan tenor"
																								id="input-tenor" value="{{ old('tenor') }}">
																				</div>
																				{{-- leasing --}}
																				<div class="form-group col-md-6" id="leasing_wrapper">
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
																				{{-- metode pembayaran --}}
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
																				{{-- status pembayaran --}}
																				<div class="form-group col-md-4">
																						<label>Status Pembayaran DP</label>
																						<select id="status_pembayaran_input" name="status_pembayaran" class="form-control select2"
																								style="width: 100%;">
																								<option value="" selected>-- Pilih status pembayaran --</option>
																								<option selected value="pending" {{ old('status_pembayaran') == 'pending' ? 'selected' : '' }}>
																										Pending
																								</option>
																								<option value="cod" {{ old('status_pembayaran') == 'cod' ? 'selected' : '' }}>COD</option>
																						</select>
																				</div>
																				{{-- hasil --}}
																				<div class="form-group col-md-4">
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
																				{{-- catatan --}}
																				<div class="form-group col-md-6">
																						<label for="input-hasil">Catatan Penjualan</label>
																						<input name="catatan" type="text" class="form-control"
																								placeholder="Masukan catatan penjualan motor (kosongkan jika tidak ada)"
																								value="{{ old('catatan') }}">
																				</div>
																				{{-- nomor po --}}
																				<div class="form-group col-md-6">
																						<label for="input-hasil">Nomor PO</label>
																						<input name="nomor_po" type="text" class="form-control"
																								placeholder="Kosongkan jika PO belum turun" value="{{ old('nomor_po') }}">
																				</div>

																		</div>
																</div>
																{{-- end body sales dan pembayaran --}}
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
				// utils function
				const formatRupiah = (angka) => {
						const number_string = angka.toString().replace(/[^,\d]/g, '');
						const split = number_string.split(',');
						const sisa = split[0].length % 3;
						let rupiah = split[0].substr(0, sisa);
						const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

						if (ribuan) {
								const separator = sisa ? '.' : '';
								rupiah += separator + ribuan.join('.');
						}

						rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
						return 'Rp ' + rupiah;
				}
				// utils end 

				$('.select2').select2()

				// auto fill nama BPKB
				const autoFillBpkb = () => {
						$('#bpkb').val($('#nama_konsumen').val())
				}
				$('#nama_konsumen').on('keyup', function() {
						autoFillBpkb()
				})

				// limit input NIK
				$('#nik').on('input', function() {
						if ($(this).val().length > 16) {
								$(this).val($(this).val().slice(0, 16));
						}
				});
				// limit input nomor hp
				$('#input-nomor-hp').on('input', function() {
						if ($(this).val().length > 14) {
								$(this).val($(this).val().slice(0, 16));
						}
				});

				// logic onchange metode pembayaran
				const displayDPTenor = (metode) => {
						const tenor = $('#tenor_wrapper');
						const leasingWrapper = $('#leasing_wrapper');
						const tjWrapper = $('#tj_wrapper');
						const dpWrapper = $('#dp_wrapper');
						// const dp = $('#dp_wrapper');
						const dpLabel = $('#dp_label')
						if (metode == 'cash') {
								// remove
								tjWrapper.removeClass('d-none')
								// add
								dpWrapper.addClass('d-none')
								tenor.addClass('d-none');
								leasingWrapper.addClass('d-none');
						} else {
								// remove
								dpWrapper.removeClass('d-none');
								tenor.removeClass('d-none');
								leasingWrapper.removeClass('d-none');
								// add
								tjWrapper.addClass('d-none');
						}
				};
				$('#pembelian-input').on('change', function() {
						console.log($(this).val());
						displayDPTenor($(this).val());
				});



				// logic onchange pemberitahuan dp minimal motor
				$('#motor-input').on('change', function() {
						console.log($(this).val())
						const motorId = $(this).val();
						$.ajax({
								url: '/api/get-motor',
								method: 'POST',
								data: {
										id: motorId
								},
								success: function(data) {
										console.log(data);
										$('.helper_info_minimal_dp').removeClass('d-none');
										$('.nama_motor_help').text(data.nama);
										$('.minimal_motor_help').text(formatRupiah(data.minimal_dp));
								},
								error: function(error) {
										const errorData = JSON.parse(error.responseText);
										alert(errorData.message);
										console.error('Terjadi kesalahan:', error);
										// ... (tangani kesalahan)
								}
						});
				});
		</script>
@endpush
