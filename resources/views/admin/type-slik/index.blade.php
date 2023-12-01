@extends('admin.layouts.main')
@section('content')
<div class="row">
	<div class="col-12 col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Input Data Type Slik BI</h3>
			</div>
			<form role="form" action="{{ route('admin.type-slik-bi.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="input-hasil">Nama Type Slik</label>
							<input name="type" type="tel" class="form-control @error('type') is-invalid @enderror" placeholder="Masukan nama dari type slik" value="{{ old('type') }}">
							@error('type')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="input-hasil">Harga Type Slik</label>
							<input name="harga" type="number" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukan harga slik (kosongkan jika gratis)" value="{{ old('harga') }}">
							@error('harga')
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
					<h3 class="card-title">Data Type Slik BI</h3>
				</div>
				<table class="table-hover table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nama Type Slik</th>
							<th>Harga</th>
							<th style="width: 120px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($slik as $c)
						<tr>
							<td>{{ $c->id }}</td>
							<td>{{ $c->nama }}</td>
							<td>{{ Str::rupiah($c->harga) }}</td>
							<td>
								<div class="d-flex justify-content-between">
									<button data-toggle="modal" data-target="#modalEdit{{$c->id}}" class="btn btn-warning">Edit</button>
									<form action="{{ route('admin.type-slik-bi.destroy', $c->id) }}" method="post">
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
											<form role="form" action="{{ route('admin.type-slik-bi.update', $c->id) }}" method="post" enctype="multipart/form-data">
												@csrf
												@method('PUT')
												<div class="card-body">
													<div class="row">
														<div class="form-group col-md-6">
															<label for="input-hasil">Nama Type Slik</label>
															<input name="type" type="tel" class="form-control" placeholder="Masukan nama dari type slik" value="{{ $c->nama }}">
														</div>
														<div class="form-group col-md-6">
															<label for="input-hasil">Harga Type Slik</label>
															<input name="harga" type="number" class="form-control" placeholder="Masukan harga slik (kosongkan jika gratis)" value="{{ $c->harga }}">
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