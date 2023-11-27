@extends('admin.layouts.main')
@section('content')
<div class="row">
	<div class="col-12 col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Input Data Company Profile</h3>
			</div>
			<form role="form" action="{{ route('admin.company-profile.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<label for="nama">Nama Perusahaan</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama perusahaan ...">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="masukan alamat">
					</div>
					<div class="form-group">
						<label for="no">No WA</label>
						<input type="text" class="form-control" id="no" name="no" placeholder="masukan no WA ...">
					</div>
					<div class="form-group">
						<label for="logo">Logo Company</label>
						<br />
						<input type="file" id="logo" name="logo">
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
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
					<h3 class="card-title">Data Hook</h3>
				</div>
				<table class="table-hover table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nama Peruahaan</th>
							<th>Alamat</th>
							<th>No WA</th>
							<th>Logo</th>
							<th style="width: 120px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($com as $c)
						<tr>
							<td>{{ $c->id }}</td>
							<td>{{ $c->nama_perusahaan }}</td>
							<td>{{ $c->alamat }}</td>
							<td>{{ $c->no_wa }}</td>
							<td>
								<img width="150px" src="/assets/images/logo/{{ $c->logo }}" alt="{{ $c->logo }}">
							</td>
							<td>
								<div class="d-flex justify-content-between">
									<button data-toggle="modal" data-target="#modalEdit{{$c->id}}" class="btn btn-warning">Edit</button>
									<button class="btn btn-success" data-toggle="modal" data-target="#modal-view-gambar-{{$c->id}}" data-placement="top" title="Lihat Gambar">Lihat</button>
									<form action="{{ route('admin.company-profile.destroy', $c->id) }}" method="post">
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
												<h4 class="modal-title" id="myModalLabel">Edit data: {{$c->nama_perusahaan}}</h4>
											</div>
											<form action="{{ route('admin.company-profile.update', $c->id) }}" method="post" enctype="multipart/form-data">
												@csrf
												@method('PUT')
												<div class="card-body">
													<div class="form-group">
														<label for="nama">Nama Perusahaan</label>
														<input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama perusahaan ..." value="{{$c->nama_perusahaan}}">
													</div>
													<div class="form-group">
														<label for="alamat">Alamat</label>
														<input type="text" class="form-control" id="alamat" name="alamat" placeholder="masukan alamat" value="{{$c->alamat}}">
													</div>
													<div class="form-group">
														<label for="no">No WA</label>
														<input type="text" class="form-control" id="no" name="no" placeholder="masukan no WA ..." value="{{$c->no_wa}}">
													</div>
													<div class="form-group">
														<label for="logo">Logo Company</label>
														<br />
														<input type="file" id="logo" name="logo">
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
								<!-- modal lihat gambar start -->
								<div class="modal fade" id="modal-view-gambar-{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Gambar: {{$c->nama_perusahaan}}</h4>
											</div>
											<div class="modal-body">
												<img src="{{ '/assets/images/logo/' . $c->logo }}" width="100%" height="50%" />
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
				</table>
			</div>
		</div>
	</div>
</section>
@endsection