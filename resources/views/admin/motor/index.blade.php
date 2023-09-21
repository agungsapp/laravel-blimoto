@extends('admin.layouts.main')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-6 col-lg-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Input Data Motor</h3>
				</div>
				<form action="{{ route('admin.merk-motor.store') }}" method="post">
					@csrf
					<div class="box-body">
						<div class="form-group">
							<label for="nama-motor">Nama Motor</label>
							<input name="nama" type="text" class="form-control" id="nama-motor" placeholder="Masukan nama motor">
						</div>
						<div class="form-group">
							<label for="berat-motor">Berat Motor</label>
							<input name="berat" type="text" class="form-control" id="berat-motor" placeholder="Masukan berat motor">
						</div>
						<div class="form-group">
							<label for="power-motor">Power Motor</label>
							<input name="power" type="text" class="form-control" id="power-motor" placeholder="Masukan power motor">
						</div>
						<div class="form-group">
							<label for="harga-motor">Harga Motor</label>
							<input name="harga" type="number" class="form-control" id="harga-motor" placeholder="Masukan harga motor">
						</div>
						<div class="form-group">
							<label>Deskripsi Motor</label>
							<textarea name="deskripsi-motor" class="form-control" rows="3" placeholder="Deskripsi Motor"></textarea>
						</div>
						<div class="form-group">
							<label>Fitur Motor</label>
							<textarea name="fitur-motor" class="form-control" rows="3" placeholder="Fitur Motor"></textarea>
						</div>
						<div class="form-group">
							<label>Pilih Merk</label>
							<select name="merk-motor" class="form-control">
								<option>option 1</option>
								<option>option 2</option>
								<option>option 3</option>
								<option>option 4</option>
								<option>option 5</option>
							</select>
						</div>
						<div class="form-group">
							<label>Tipe Merk</label>
							<select name="tipe-motor" class="form-control">
								<option>option 1</option>
								<option>option 2</option>
								<option>option 3</option>
								<option>option 4</option>
								<option>option 5</option>
							</select>
						</div>
						<div class="form-group">
							<label>Kategori Best Motor</label>
							<p>*Optional tidak wajib dipilih</p>
							<select name="kategori-best-motor" class="form-control">
								<option>option 1</option>
								<option>option 2</option>
								<option>option 3</option>
								<option>option 4</option>
								<option>option 5</option>
							</select>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</section>
@endsection