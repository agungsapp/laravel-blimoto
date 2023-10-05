@extends('admin.layouts.main')
@section('content')

<div class="row">
	<div class="col-12 col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Input Data Motor Baru</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form action="{{ route('admin.motor.store') }}" method="post">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="nama-motor">Nama Motor</label>
							<input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama-motor" placeholder="Masukan nama motor">
						</div>
						<div class="form-group col-md-6">
							<label for="berat-motor">Berat Motor</label>
							<input name="berat" type="text" class="form-control @error('berat') is-invalid @enderror" id="berat-motor" placeholder="Masukan berat motor">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="power-motor">Power Motor</label>
							<input name="power" type="text" class="form-control @error('power') is-invalid @enderror" id="power-motor" placeholder="Masukan power motor">
						</div>
						<div class="form-group col-md-6">
							<label for="harga-motor">Harga Motor</label>
							<input name="harga" type="number" class="form-control @error('harga') is-invalid @enderror" id="harga-motor" placeholder="Masukan harga motor">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Deskripsi Motor</label>
							<textarea name="deskripsi-motor" class="form-control @error('deskripsi-motor') is-invalid @enderror" rows="3" placeholder="Deskripsi Motor"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Fitur Motor</label>
							<textarea name="fitur-motor" class="form-control @error('fitur-motor') is-invalid @enderror" rows="3" placeholder="Fitur Motor"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Merk Motor</label>
							@if ($merk_motor == null)
							<p>Tidak ada data merk motor silahkan buat terlebih dahulu !</p>
							@else
							<select name="merk-motor" class="form-control @error('merk-motor') is-invalid @enderror">
								<option value="">-- pilih merk motor --</option>
								@foreach ($merk_motor as $merk)
								<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
								@endforeach
							</select>
							@endif
						</div>
						<div class="form-group col-md-6">
							<label>Tipe Motor</label>
							@if ($tipe_motor == null)
							<p>Tidak ada data tipe motor silahkan buat terlebih dahulu !</p>
							@else
							<select name="tipe-motor" class="form-control @error('tipe-motor') is-invalid @enderror">
								<option value="">-- pilih tipe motor --</option>
								@foreach ($tipe_motor as $merk)
								<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
								@endforeach
							</select>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Stock Motor</label>
							<p>*Optional tidak wajib dipilih default stock ada</p>
							<select name="stock-motor" class="form-control">
								<option value="" selected>-- Pilih stock motor --</option>
								<option value="1">Ada</option>
								<option value="0">Kosong</option>
							</select>
						</div>

						<div class="form-group col-md-6">
							<label>Kategori Best Motor</label>
							<p>*Optional tidak wajib dipilih silahkan pilih no best</p>
							@if ($kategori_best_motor == null)
							<p>Tidak ada data best kategori motor silahkan buat terlebih dahulu !</p>
							@else
							<select name="kategori-best-motor" class="form-control">
								<option value="" selected>-- Pilih kategori best motor --</option>
								@foreach ($kategori_best_motor as $merk)
								<option value="{{ $merk->id }}">{{ $merk->nama }}</option>
								@endforeach
							</select>
							@endif
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>

		</div>
		<!-- /.card -->
	</div>
</div>

<div class="row">
	<div class="col-12 col-md-12">

		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Data Motor</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="dataMotor" class="table-bordered table-striped table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nama Motor</th>
							<th>Kategori Best Motor</th>
							<th>Merk Motor</th>
							<th>Tipe Motor</th>
							<th>Harga Motor</th>
							<th>Stock</th>
							<th width="120px">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($motors as $index => $motor)
						<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
							<td>{{ $loop->iteration }}</td>
							<td>{{ $motor->nama }}</td>
							<td>{{ $motor->best_motor_name }}</td>
							<td>{{ $motor->merk_nama }}</td>
							<td>{{ $motor->type_nama }}</td>
							<td>{{ 'Rp. ' . number_format($motor->harga, 0, ',', '.') }}</td>
							<td>{{ $motor->stock === 1 ? 'Ada' : 'Kosong' }}</td>
							<td>
								<div class="d-flex justify-content-between">
									<a href="{{ route('admin.motor.edit', $motor->id) }}" class="btn btn-warning">Edit</a>
									<form action="{{ route('admin.motor.destroy', $motor->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger show_confirm">Delete</button>
									</form>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Nama Motor</th>
							<th>Kategori Best Motor</th>
							<th>Merk Motor</th>
							<th>Tipe Motor</th>
							<th>Harga Motor</th>
							<th>Stock</th>
							<th>Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>
@endsection


@push('script')
<script>
	$(function() {
		$("#dataMotor").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			//"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
		}).buttons().container().appendTo('#dataMotor_wrapper .col-md-6:eq(0)');
	});

	$(document).ready(function() {
		$('.show_confirm').click(function(event) {
			var form = $(this).closest("form");
			var name = $(this).data("name");
			event.preventDefault();
			swal({
					title: `Delete Data Motor ?`,
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