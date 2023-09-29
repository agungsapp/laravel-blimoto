@extends('admin.layouts.main')
@section('content')

<div class="row">
	<div class="col-12 col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Input Data Hook Baru</h3>
			</div>
			<form role="form" action="{{ route('admin.hook.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama hook ...">
					</div>
					<div class="form-group">
						<label for="link">Link</label>
						<input type="text" class="form-control" id="link" name="link" placeholder="masukan link tombol ...">
					</div>
					<div class="form-group">
						<label for="caption">Teks Tombol</label>
						<input type="text" class="form-control" id="caption" name="caption" placeholder="masukan text tombol ...">
					</div>
					<div class="form-group col-md-6">
						<label for="warna">Warna Background</label>
						<input type="color" class="form-control" id="warna" name="warna">
					</div>
					<div class="form-group col-md-6">
						<label for="warna_teks">Warna Teks</label>
						<input type="color" class="form-control" id="warna_teks" name="warna_teks">
					</div>
					<div class="form-group">
						<label for="gambar">File input</label>
						<input type="file" id="gambar" name="gambar">
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
</div>

<section class="container mt-4">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Data Hook</h3>
				</div>
				<table class="table-hover table">
					<thead>
						<tr>
							<th style="width: 15px">No.</th>
							<th style="width: 90px">Nama</th>
							<th style="width: 160px">Gambar</th>
							<th style="width: 200px">Link</th>
							<th style="width: 15px">Warna</th>
							<th style="width: 100px">Warna Teks</th>
							<th style="width: 20px">Teks Tombol</th>
							<th style="width: 30px !important;">Preview Tombol</th>
							<th style="width: 50px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($hooks as $hook)
						<tr>
							<td>{{ $hook->id }}</td>
							<td>{{ $hook->nama }}</td>
							<td>
								<img width="150px" src="/assets/images/custom/hook/{{ $hook->gambar }}" alt="{{ $hook->gambar }}" srcset="">
							</td>
							<td><a href="{{ $hook->link }}">{{ $hook->link }}</a>
							</td>
							<td style="background-color: #eaeaea;"><i class="fa fa-square" style="color: {{ $hook->warna }};"></i>
								{{ $hook->warna }}
							</td>
							<td style="background-color: #eaeaea;"><i class="fa fa-square" style="color: {{ $hook->warna_teks }};"></i>
								{{ $hook->warna_teks }}
							</td>
							<td>{{ $hook->caption }}</td>
							<td style="background-color: #eaeaea;">
								<button class="btn" style="background-color: {{ $hook->warna }} ; color: {{ $hook->warna_teks }} ;">{{ $hook->caption }}</button>
							</td>
							<td>
								<div class="d-flex justify-content-between">
									<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit{{ $hook->id }}">
										Edit
									</button>
									<form action="{{ route('admin.hook.destroy', $hook->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger">Delete</button>
									</form>
								</div>
								<div class="modal fade" id="modalEdit{{ $hook->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="modalEditLabel">Edit data <strong>{{ $hook->nama }}</strong>
												</h4>
											</div>
											{{-- form start --}}
											<form role="form" action="{{ route('admin.hook.update', $hook->id) }}" method="POST" enctype="multipart/form-data">
												@csrf
												@method('PUT')
												<div class="modal-body">
													<div class="card-body">
														<div class="form-group">
															<label for="nama">Nama</label>
															<input type="text" class="form-control" id="nama" name="nama" value="{{ $hook->nama }}" readonly>
														</div>
														<div class="form-group">
															<label for="link">Link</label>
															<input type="text" class="form-control" id="link" name="link" placeholder="masukan link tombol ..." value="{{ $hook->link }}">
														</div>
														<div class="form-group">
															<label for="caption">Teks Tombol</label>
															<input type="text" class="form-control" id="caption" name="caption" placeholder="masukan text tombol ..." value="{{ $hook->caption }}">
														</div>
														<div class="form-group col-md-6">
															<label for="warna">Warna Background</label>
															<input type="color" class="form-control" id="warna" name="warna" value="{{ $hook->warna }}">
														</div>
														<div class="form-group col-md-6">
															<label for="warna_teks">Warna Teks</label>
															<input type="color" class="form-control" id="warna_teks" name="warna_teks" value="{{ $hook->warna_teks }}">
														</div>

														<div class="form-group">
															<label for="gambar">File input</label>
															<input type="file" id="gambar" name="gambar">
															<img width="100%" style="margin-top: 30px;" src="/assets/images/custom/hook/{{ $hook->gambar }}" alt="{{ $hook->gambar }}" srcset="">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Simpan</button>
												</div>
											</form>
											{{-- form end --}}
										</div>
									</div>
								</div>
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