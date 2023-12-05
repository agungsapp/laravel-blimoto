@extends('admin.layouts.main')
@section('content')

<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				<div class="card-title">
					Tambah data dealer
				</div>
			</div>
			<form action="{{ route('admin.dealer-motor.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('POST')
				<div class="card-body">
					<div class="row">
						<div class="form-group col-md-4">
							<label for="nama">Nama Dealer</label>
							<input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan nama dealer">
							@error('nama')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-4">
							<label for="alamat">Alamat Dealer</label>
							<input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukan alamat dealer">
							@error('lokasi')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-4">
							<label for="telpon">Nomor Telpon</label>
							<input name="telpon" type="text" class="form-control @error('telpon') is-invalid @enderror" id="telpon" placeholder="Masukan nomor telpon dealer">
							@error('telpon')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<label>Kota Dealer</label>
							@if ($kota == null)
							<p class="text-danger">Tidak ada data dealer silahkan buat terlebih dahulu !</p>
							@else
							<select id="kota-insert" name="kota" class="form-control select2 @error('kota') is-invalid @enderror" style="width: 100%;">
								<option value="" selected>-- Pilih kota dealer --</option>
								@foreach ($kota as $k)
								<option value="{{ $k->id }}">{{ $k->nama }}</option>
								@endforeach
							</select>
							@endif
							@error('kota')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-4">
							<label for="link-map">Link Lokasi Google Map</label>
							<input name="link-map" type="text" class="form-control @error('link-map') is-invalid @enderror" id="link-map" placeholder="Masukan link googel map dealer">
							@error('link-map')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-4">
							<label for="exampleInputFile">Pilih Gambar</label>
							<input type="file" id="exampleInputFile" class="" name="gambar-dealer">
							<p class="help-block">Silahkan pilih gambar dealer</p>
							@error('gambar-dealer')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				<div class="card-title">
					Data Dealer
				</div>
			</div>
			<div class="card-body">
				<table id="dataDetail" class="table-bordered table-striped table">
					<thead>
						<tr>
							<th>NO</th>
							<th>Nama Dealer</th>
							<th>Telpon</th>
							<th>Alamat</th>
							<th>Kota</th>
							<th>Link Map</th>
							<th width="120px">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($dealer as $d)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $d->nama }}</td>
							<td>{{ $d->telpon }}</td>
							<td>{{ $d->alamat }}</td>
							<td>{{ $d->kota->nama }}</td>
							<td>{{ $d->link_map }}</td>
							<td>
								<div class="d-flex justify-content-between">
									<button data-toggle="modal" data-target="#modalEdit{{$d->id}}" class="btn btn-warning">Edit</button>
									<button class="btn btn-success" data-toggle="modal" data-target="#modal-view-gambar-{{$d->id}}" data-placement="top" title="Lihat Gambar">Lihat</button>
									<form action="{{ route('admin.dealer-motor.destroy', $d->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger show_confirm">Delete</button>
									</form>
								</div>
								<!-- modal update dealer start -->
								<div class="modal fade" id="modalEdit{{$d->id}}" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Edit data: {{$d->nama}}</h4>
											</div>
											<form action="{{ route('admin.dealer-motor.update', $d->id) }}" method="post" enctype="multipart/form-data">
												@csrf
												@method('PUT')
												<div class="card-body">
													<div class="form-group">
														<label for="nama">Nama Dealer</label>
														<input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan nama dealer" value="{{$d->nama}}">
														@error('nama')
														<div class="alert alert-danger">{{ $message }}</div>
														@enderror
													</div>
													<div class="form-group">
														<label for="alamat">Alamat Dealer</label>
														<input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukan alamat dealer" value="{{$d->alamat}}">
														@error('lokasi')
														<div class="alert alert-danger">{{ $message }}</div>
														@enderror
													</div>
													<div class="form-group">
														<label for="telpon">Nomor Telpon</label>
														<input name="telpon" type="text" class="form-control @error('telpon') is-invalid @enderror" id="telpon" placeholder="Masukan nomor telpon dealer" value="{{$d->telpon}}">
														@error('telpon')
														<div class="alert alert-danger">{{ $message }}</div>
														@enderror
													</div>
													<div class="form-group">
														<label>Kota Dealer</label>
														<select id="{{'dealer-update-'.$d->id}}" name="kota" class="form-control select2 @error('kota') is-invalid @enderror" style="width: 100%;">
															@foreach ($kota as $k)
															<option value="{{ $k->id }}" {{$k->id === $d->id_kota ? 'selected' : '' }}>{{ $k->nama }}</option>
															@endforeach
														</select>
														@error('kota')
														<div class="alert alert-danger">{{ $message }}</div>
														@enderror
													</div>
													<div class="form-group">
														<label for="link-map">Link Lokasi Google Map</label>
														<input name="link-map" type="text" class="form-control @error('link-map') is-invalid @enderror" id="link-map" placeholder="Masukan link googel map dealer" value="{{$d->link_map}}">
														@error('link-map')
														<div class="alert alert-danger">{{ $message }}</div>
														@enderror
													</div>
													<div class="form-group">
														<label for="exampleInputFile">Pilih Gambar</label>
														<input type="file" id="exampleInputFile" class="" name="gambar-dealer">
														<p class="help-block">Silahkan pilih gambar dealer</p>
														@error('gambar-dealer')
														<div class="alert alert-danger">{{ $message }}</div>
														@enderror
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
								<!-- modal update dealer end -->
								<!-- modal lihat gambar start -->
								<div class="modal fade" id="modal-view-gambar-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Gambar: {{$d->nama}}</h4>
											</div>
											<div class="modal-body">
												<img src="{{ '/assets/images/dealers/' . $d->gambar	 }}" width="100%" height="50%" />
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- modal lihat gambar end -->
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Nama Dealer</th>
							<th>Telpon</th>
							<th>Alamat</th>
							<th>Kota</th>
							<th>Link Map</th>
							<th width="120px">Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
</div>

@endsection


@push('script')
<script>
	$(document).ready(function() {

		$("#dataDetail").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			//"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
		}).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');


		//Initialize Select2 Elements
		$('.select2').select2()
	})
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