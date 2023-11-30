@extends('admin.layouts.main')
@section('content')


<div class="row">
	<div class="col-12 col-md-12">
		<div class="card card-warning">
			<div class="card-header">
				<h3 class="card-title">Edit Data {{ $motor[0]->nama }}</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form action="{{ route('admin.motor.update', $motor[0]->id) }}" method="post">
				@csrf
				@method('PUT')
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama-motor">Nama Motor</label>
								<input name="nama" type="text" class="form-control" id="nama-motor" placeholder="Masukan nama motor" value="{{ $motor[0]->nama }}">
							</div>
							<div class="form-group">
								<label for="harga-motor">Harga Motor</label>
								<input name="harga" type="number" class="form-control" id="harga-motor" placeholder="Masukan harga motor" value="{{ $motor[0]->harga }}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Deskripsi Motor</label>
						<textarea id="deskripsi_motor" name="deskripsi_motor" class="form-control" rows="3" placeholder="Deskripsi Motor">{{ $motor[0]->deskripsi }}</textarea>
					</div>
					<div class="form-group">
						<label>Fitur Motor</label>
						<textarea id="fitur_motor" name="fitur_motor" class="form-control" rows="3" placeholder="Fitur Motor">{{ $motor[0]->fitur_utama }}</textarea>
					</div>
					<div class="form-group">
						<label>Bonus Motor</label>
						<textarea id="bonus_motor" name="bonus_motor" class="form-control" rows="3" placeholder="Bonus Motor">{{ $motor[0]->bonus }}</textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Merk Motor</label>
								@if ($merk_motor == null)
								<p>Tidak ada data merk motor silahkan buat terlebih dahulu !</p>
								@else
								<select name="merk_motor" class="form-control">
									@foreach ($merk_motor as $merk)
									<option value="{{ $merk->id }}" {{ $motor[0]->id_merk === $merk->id ? 'selected' : '' }}>
										{{ $merk->nama }}
									</option>
									@endforeach
								</select>
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Tipe Motors</label>
								@if ($tipe_motor == null)
								<p>Tidak ada data tipe motor silahkan buat terlebih dahulu !</p>
								@else
								<select name="tipe_motor" class="form-control">
									@foreach ($tipe_motor as $tipe)
									<option value="{{ $tipe->id }}" {{ $motor[0]->id_type === $tipe->id ? 'selected' : '' }}>
										{{ $tipe->nama }}
									</option>
									@endforeach
								</select>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Stock Motor</label>
							<p>*Optional tidak wajib dipilih default stock ada</p>
							<select name="stock-motor" class="form-control">
								<option value="" selected>-- Pilih stock motor --</option>
								<option value="1" <?php echo $motor[0]->stock == 1 ? 'selected' : ''; ?>>Ada</option>
								<option value="0" <?php echo $motor[0]->stock == 0 ? 'selected' : ''; ?>>Kosong</option>
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
								<option value="{{ $merk->id }}" {{ $motor[0]->mtrBestMotor->id_best_motor === $merk->id ? 'selected' : '' }}>
									{{ $merk->nama }}
								</option>
								@endforeach
							</select>
							@endif
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Simpan perubahan</button>
					<a href="{{ route('admin.motor.index') }}" class="btn btn-warning">Cancel</a>
				</div>
			</form>



		</div>
		<!-- /.card -->
	</div>
</div>


@endsection
@push('script')
<script>
	$(document).ready(function() {
		// Summernote
		$('#deskripsi_motor').summernote({
			placeholder: 'buat isi deskripsi motor ...',
			tabsize: 2,
			height: 300
		})
	})

	$(document).ready(function() {
		// Summernote
		$('#fitur_motor').summernote({
			placeholder: 'buat isi fitur motor ...',
			tabsize: 2,
			height: 300
		})
	})

	$(document).ready(function() {
		// Summernote
		$('#bonus_motor').summernote({
			placeholder: 'buat isi bonus motor ...',
			tabsize: 2,
			height: 300
		})
	})
</script>
@endpush