@extends('admin.layouts.main')
@section('content')

<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				<div class="card-title">
					Tambah data mitra
				</div>
			</div>
			<form action="{{ route('admin.mitra.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('POST')
				<div class="card-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="nama">Nama Mitra</label>
							<input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan nama mitra">
							@error('nama')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="exampleInputFile">Pilih Gambar</label>
							<input type="file" id="exampleInputFile" class="" name="gambar-mitra">
							<p class="help-block">Silahkan pilih gambar mitra</p>
							@error('gambar-mitra')
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
					Data mitra
				</div>
			</div>
			<div class="card-body">
				<table id="dataDetail" class="table-bordered table-striped table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama mitra</th>
							<th width="120px">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($mitra as $d)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $d->nama }}</td>
							<td>
								<div class="d-flex justify-content-between">
									<button data-toggle="modal" data-target="#modalEdit{{$d->id}}" class="btn btn-warning">Edit</button>
									<button class="btn btn-success" data-toggle="modal" data-target="#modal-view-gambar-{{$d->id}}" data-placement="top" title="Lihat Gambar">Lihat</button>
									<form action="{{ route('admin.mitra.destroy', $d->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger show_confirm">Delete</button>
									</form>
								</div>
								<!-- modal update mitra start -->
								<div class="modal fade" id="modalEdit{{$d->id}}" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Edit data: {{$d->nama}}</h4>
											</div>
											<form action="{{ route('admin.mitra.update', $d->id) }}" method="post" enctype="multipart/form-data">
												@csrf
												@method('PUT')
												<div class="card-body">
													<div class="form-group">
														<label for="nama">Nama Mitra</label>
														<input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan nama mitra" value="{{$d->nama}}">
														@error('nama')
														<div class="alert alert-danger">{{ $message }}</div>
														@enderror
													</div>
													<div class="form-group">
														<label for="exampleInputFile">Pilih Gambar</label>
														<input type="file" id="exampleInputFile" class="" name="gambar-mitra" >
														<p class="help-block">Silahkan pilih gambar mitra</p>
														@error('gambar-mitra')
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
								<!-- modal update mitra end -->
								<!-- modal lihat gambar start -->
								<div class="modal fade" id="modal-view-gambar-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Gambar: {{$d->nama}}</h4>
											</div>
											<div class="modal-body">
												<img src="{{ '/assets/images/custom/mitra/' . $d->gambar	 }}" width="100%" height="50%" />
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
							<th>No</th>
							<th>Nama mitra</th>
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
</script>
@endpush