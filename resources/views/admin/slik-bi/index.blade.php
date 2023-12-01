@extends('admin.layouts.main')
@section('content')
<div class="row">
	<div class="col-12 col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Input Data Slik BI</h3>
			</div>
			<form role="form" action="{{ route('admin.slik-bi.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="input-hasil">Nama Nomor WA</label>
							<input name="no" type="tel" class="form-control @error('no') is-invalid @enderror" placeholder="Masukan nomor WA anda untuk konfirmasi" value="{{ old('no') }}">
							@error('no')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="input-hasil">Masukan Email</label>
							<input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email aktif anda (kosongkan jika tidak ada)" value="{{ old('email') }}">
							@error('email')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Status BI Ceking</label>
							<select name="status" class="form-control select2 @error('status') is-invalid @enderror" style="width: 100%;">
								<option value="" {{ old('status') == '' ? 'selected' : '' }}>-- Pilih Status Ceking --</option>
								<option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>pending</option>
								<option value="success" {{ old('status') == 'success' ? 'selected' : '' }}>success</option>
							</select>
							@error('status')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label>Jenis BI Ceking</label>
							@if($typeSlik->isEmpty())
							<p>Data tidak ada. Silahkan buat terlebih dahulu.</p>
							@else
							<select id="bi-ceking" name="tipe" class="form-control select2 @error('tipe') is-invalid @enderror" style="width: 100%;" onchange="toggleStatusPembayaran()">
								<option value="" {{ old('tipe') == '' ? 'selected' : '' }}>-- Pilih Tipe --</option>

								@foreach($typeSlik as $type)
								<option value="{{ $type->id }}" {{ old('tipe') == $type->id ? 'selected' : '' }}>{{ $type->nama }}</option>
								@endforeach
							</select>
							@error('tipe')
							<span class="text-danger">{{ $message }}</span>
							@enderror
							@endif
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6" id="status-pembayaran-div">
							<label for="status-pembayaran">Status Pembayaran</label>
							<select id="status-pembayaran" name="status_pembayaran" class="form-control select2 @error('status_pembayaran') is-invalid @enderror" style="width: 100%;">
								<option value="" {{ old('status_pembayaran') == '' ? 'selected' : '' }}>-- Pilih Status Pembayaran --</option>
								<option value="pending" {{ old('status_pembayaran') == 'pending' ? 'selected' : '' }}>Pending</option>
								<option value="success" {{ old('status_pembayaran') == 'success' ? 'selected' : '' }}>Success</option>
							</select>
							@error('status_pembayaran')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="ktp">Scan KTP</label>
							<br />
							<input type="file" id="ktp" name="ktp" class="@error('ktp') is-invalid @enderror">
							@error('ktp')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="kk">Scan KK</label>
							<br />
							<input type="file" id="kk" name="kk" class="@error('kk') is-invalid @enderror">
							@error('kk')
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
</div>

<section class="container-fluid mt-4">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Data Slik BI</h3>
				</div>
				<table class="table-hover table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nomor WA</th>
							<th>Email</th>
							<th>Status</th>
							<th>Status Pembayaran</th>
							<th>Tipe</th>
							<th>Harga</th>
							<th>KTP</th>
							<th>KK</th>
							<th style="width: 120px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($slik as $c)
						<tr>
							<td>{{ $c->id }}</td>
							<td>{{ $c->no }}</td>
							<td>{{ $c->email }}</td>
							<td>{{ $c->status }}</td>
							<td>{{ $c->status_pembayaran }}</td>
							<td>{{ $c->typeSlik->nama }}</td>
							<td>{{ Str::rupiah($c->typeSlik->harga) }}</td>
							<td>
								<a href="/assets/images/slik/ktp/{{ $c->ktp }}" data-lightbox="ktp-image" data-title="KTP Image">
									<img width="80px" height="80px" src="/assets/images/slik/ktp/{{ $c->ktp }}" alt="{{ $c->ktp }}">
								</a>
							</td>
							<td>
								@if($c->kk)
								<a href="/assets/images/slik/kk/{{ $c->kk }}" data-lightbox="kk-image" data-title="KK Image">
									<img width="80px" height="80px" src="/assets/images/slik/kk/{{ $c->kk }}" alt="{{ $c->kk }}">
								</a>
								@else
								Gambar belum diinput
								@endif
							</td>
							<td>
								<div class="d-flex justify-content-between">
									<button data-toggle="modal" data-target="#modalEdit{{$c->id}}" class="btn btn-warning">Edit</button>
									<form action="{{ route('admin.slik-bi.destroy', $c->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger show_confirm">Delete</button>
									</form>
								</div>
								<!-- modal update detail motor start -->
								<div class="modal fade" id="modalEdit{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Edit data: {{$c->no}}</h4>
											</div>
											<form role="form" action="{{ route('admin.slik-bi.update', $c->id) }}" method="post" enctype="multipart/form-data">
												@csrf
												@method('PUT')
												<div class="card-body">
													<div class="row">
														<div class="form-group col-md-6">
															<label for="input-hasil">Nama Nomor WA</label>
															<input name="no" type="tel" class="form-control" placeholder="Masukan nomor WA anda untuk konfirmasi" value="{{ $c->no }}">
														</div>
														<div class="form-group col-md-6">
															<label for="input-hasil">Masukan Email</label>
															<input name="email" type="email" class="form-control" placeholder="Masukan email aktif anda (kosongkan jika tidak ada)" value="{{ $c->email }}">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label>Status BI Ceking</label>
															<select name="status" class="form-control select2" style="width: 100%;">
																<option value="pending" {{ $c->status == 'pending' ? 'selected' : '' }}>pending</option>
																<option value="success" {{ $c->status == 'success' ? 'selected' : '' }}>success</option>
															</select>
														</div>
														<div class="form-group col-md-6">
															<label>Jenis BI Ceking</label>
															<select name="tipe" class="form-control select2" style="width: 100%;">
																<option value="1" {{ $c->typeSlik->id == 1 ? 'selected' : '' }}>premium</option>
																<option value="2" {{ $c->typeSlik->id == 2 ? 'selected' : '' }}>biasa</option>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-12">
															<label>Status Pembayaran</label>
															<select name="status_pembayaran" class="form-control select2" style="width: 100%;">
																<option value="pending" {{ $c->status_pembayaran == 'pending' ? 'selected' : '' }}>pending</option>
																<option value="success" {{ $c->status_pembayaran == 'success' ? 'selected' : '' }}>success</option>
																<option value="free" {{ $c->status_pembayaran == 'free' ? 'selected' : '' }}>free</option>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="ktp">Scan KTP</label>
															<br />
															<input type="file" id="ktp" name="ktp" class="@error('ktp') is-invalid @enderror">
															@error('ktp')
															<span class="text-danger">{{ $message }}</span>
															@enderror
														</div>
														<div class="form-group col-md-6">
															<label for="kk">Scan KK</label>
															<br />
															<input type="file" id="kk" name="kk" class="@error('kk') is-invalid @enderror">
															@error('kk')
															<span class="text-danger">{{ $message }}</span>
															@enderror
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
								<!-- modal update detail motor end -->
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection
@push('script')
<script>
	function toggleStatusPembayaran() {
		var tipe = document.getElementById('bi-ceking').value;
		var statusPembayaranDiv = document.getElementById('status-pembayaran-div');

		if (tipe == '2') {
			statusPembayaranDiv.style.display = 'none';
		} else {
			statusPembayaranDiv.style.display = 'block';
		}
	}
	toggleStatusPembayaran();

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
@endpush