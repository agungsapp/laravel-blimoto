@extends('admin.layouts.main')
@section('content')

<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				<div class="card-title">
					Tambah data detail motor
				</div>
			</div>
			<form action="{{ route('admin.detail-motor.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('POST')
				<div class="card-body">
					<div class="row">
						<div class="form-group col-md-4">
							<label>Merk Motor</label>
							@if ($merk_motor == null)
							<p class="text-danger">Tidak ada data merk motor silahkan buat terlebih dahulu !</p>
							@else
							<select id="merk-motor" name="merk-motor" class="form-control select2 @error('merk-motor') is-invalid @enderror" style="width: 100%;">
								<option value="" selected>-- Pilih merk motor --</option>
								@foreach ($merk_motor as $merk)
								<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
								@endforeach
							</select>
							@endif
						</div>
						<div class="form-group col-md-4">
							<label>Tipe Motors</label>
							@if ($tipe_motor == null)
							<p class="text-danger">Tidak ada data tipe motor silahkan buat terlebih dahulu !</p>
							@else
							<select id="tipe-motor" name="tipe-motor" class="form-control @error('tipe-motor') is-invalid @enderror select2" style="width: 100%;">
								<option value="" selected>-- Pilih tipe motor --</option>
								@foreach ($tipe_motor as $merk)
								<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
								@endforeach
							</select>
							@endif
						</div>
						<div class="form-group col-md-4">
							<label for="model">Model Motor</label>
							<select id="model" class="form-control select2 @error('model') is-invalid @enderror" name="model">
								<option value="0" selected>-- Pilih Model --</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="warna-motor">Warna</label>
							<input name="warna-motor" type="text" class="form-control @error('warna-motor') is-invalid @enderror" id="warna-motor" placeholder="Masukan warna motor">
							@error('gambar-motor')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group offset-1 col-md-5">
							<label for="exampleInputFile">Pilih Gambar</label>
							<input type="file" id="exampleInputFile" class="" name="gambar-motor">
							<p class="help-block">Silahkan pilih gambar motor</p>
							@error('gambar-motor')
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
					Data Detail Motor
				</div>
			</div>
			<div class="card-body">
				<table id="dataDetail" class="table-bordered table-striped table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nama Motor</th>
							<th>Warna Motor</th>
							<th>Gambar</th>
							<th width="120px">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($motors as $motor)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $motor->motor->nama }}</td>
							<td>{{ $motor->warna }}</td>
							<td>{{ $motor->gambar }}</td>
							<td>
								<div class="d-flex justify-content-between">
									<button data-toggle="modal" data-target="#modalEdit{{$motor->id}}" class="btn btn-warning">Edit</button>
									<button class="btn btn-success" data-toggle="modal" data-target="#modal-view-gambar-{{$motor->id}}" data-placement="top" title="Lihat Gambar">Lihat</button>
									<form action="{{ route('admin.detail-motor.destroy', $motor->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger show_confirm">Delete</button>
									</form>
								</div>
								<!-- modal update detail motor start -->
								<div class="modal fade" id="modalEdit{{$motor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Edit data: {{$motor->motor->nama}}</h4>
											</div>
											<form action="{{ route('admin.detail-motor.update', $motor->id) }}" method="post" enctype="multipart/form-data">
												@csrf
												@method('PUT')
												<div class="card-body">
													<div class="form-group">
														<label for="warna-motor">Warna</label>
														<input name="warna-motor" value="{{$motor->warna}}" type="text" class="form-control @error('warna-motor') is-invalid @enderror" id="warna-motor" placeholder="Masukan warna motor">
													</div>
													<div class="form-group">
														<label for="exampleInputFile">Pilih Gambar</label>
														<input type="file" id="exampleInputFile" class="" name="gambar-motor">
														<p class="help-block">Silahkan pilih gambar motor</p>
														@error('gambar-motor')
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
								<!-- modal update detail motor end -->
								<!-- modal lihat gambar start -->
								<div class="modal fade" id="modal-view-gambar-{{$motor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">Gambar: {{$motor->motor->nama}}</h4>
											</div>
											<div class="modal-body">
												<img src="{{ '/assets/images/detail-motor/' . $motor->gambar	 }}" width="100%" height="50%" />
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
							<th>Nama Motor</th>
							<th>Warna Motor</th>
							<th>Gambar</th>
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

		$('#tipe-motor').change(function() {
			console.log("area select logic running...");
			var merkId = $('#merk-motor').val();
			var tipeId = $(this).val();
			var modelSelect = $('#model');
			// console.log(merkId + tipeId);
			modelSelect.empty();
			modelSelect.append('<option value="0" selected>-- Pilih Model --</option>');
			// console.log("sebelum if");
			if (merkId !== '0' && tipeId !== '0') {
				// console.log("get jalan!");
				$.get('/get-model-options', {
					merk_id: merkId,
					tipe_id: tipeId
				}, function(data) {
					// console.log(data);
					console.log("done bang!")
					$.each(data, function(key, value) {
						// console.log(`id nya : ${value.id} nama nya : ${value.nama}`);
						modelSelect.append('<option value="' + value.id + '">' + value.nama + '</option>');
					});

				});
			}
		});

		$('.show_confirm').click(function(event) {
			var form = $(this).closest("form");
			var name = $(this).data("name");
			event.preventDefault();
			swal({
					title: `Delete Data Detail Motor ?`,
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
		})
	})
</script>
@endpush