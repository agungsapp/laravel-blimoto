@extends('admin.layouts.main')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-6 col-lg-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Input Data Detail Motor</h3>
				</div>
				<form action="{{ route('admin.motor.store') }}" method="post">
					@csrf
					<div class="box-body">
						<div class="form-group">
							<label for="warna-motor">Warna</label>
							<input name="warna_motor" type="text" class="form-control" id="warna-motor" placeholder="Masukan warna motor">
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Pilih Gambar</label>
							<input type="file" id="exampleInputFile" name="gambar_motor">
							<p class="help-block">Silahkan pilih gambar motor</p>
						</div>
						<select class="js-example-basic-single form-control" name="state">
							<option value="AL">Alabama</option>
							...
							<option value="WY">Wyoming</option>
						</select>
						<div class="form-group">
							<label>Merk Motor</label>
							@if ($merk_motor == null)
							<p>Tidak ada data merk motor silahkan buat terlebih dahulu !</p>
							@else
							<select name="merk-motor" class="form-control">
								@foreach ($merk_motor as $merk)
								<option value="{{$merk->id}}">{{ $merk->nama }}</option>
								@endforeach
							</select>
							@endif
						</div>
						<div class="form-group">
							<label>Tipe Motors</label>
							@if ($tipe_motor == null)
							<p>Tidak ada data tipe motor silahkan buat terlebih dahulu !</p>
							@else
							<select name="tipe-motor" class="form-control">
								@foreach ($tipe_motor as $merk)
								<option value="{{$merk->id}}">{{ $merk->nama }}</option>
								@endforeach
							</select>
							@endif
						</div>
						<div class="form-group">
							<label>Kategori Best Motor</label>
							<p>*Optional tidak wajib dipilih silahkan pilih no best</p>
							@if ($kategori_best_motor == null)
							<p>Tidak ada data best kategori motor silahkan buat terlebih dahulu !</p>
							@else
							<select name="kategori-best-motor" class="form-control">
								@foreach ($kategori_best_motor as $merk)
								<option value="{{$merk->id}}">{{ $merk->nama }}</option>
								@endforeach
							</select>
							@endif
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

<section class="content">
	<div class="row">
		<div class="col-md-6 col-lg-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data List Motor</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
						<form action="{{ url()->current() }}" method="GET">
							<div class="row">
								<div class="col-sm-12">
									<label>Search: <input type="text" name="search" value="{{request()->get('search')}}" class="form-control input-sm" placeholder="Masukan nama motor motor" aria-controls="example1"></label>
								</div>
							</div>
						</form>
						<!-- <div class="row">
							<div class="col-sm-12">
								<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 286.469px;">ID</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 348.875px;">Nama Motor</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 348.875px;">Merk Motor</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 348.875px;">Tipe Motor</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 348.875px;">Harga Motor</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="2" aria-label="Platform(s): activate to sort column ascending" style="width: 310.453px;">Action</th>
										</tr>
									</thead>
									<tbody>
										@if (!$motors)
										<p>Tidak ada data!</p>
										@else
										@foreach ($motors as $index => $motor)
										<tr role="row" class="{{ $index % 2 == 0 ? 'even' : 'odd' }}">
											<td>{{$motor->id}}</td>
											<td>{{$motor->nama}}</td>
											<td>{{$motor->merk_nama}}</td>
											<td>{{$motor->type_nama}}</td>
											<td>{{ 'Rp. ' . number_format($motor->harga, 0,',','.')}}</td>
											<td>
												<a href="{{ route('admin.motor.edit', $motor->id) }}" class="btn btn-primary">Detail</a>
											</td>
											<td>
												<form action="{{ route('admin.motor.destroy', $motor->id) }}" method="post">
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-danger">Delete</button>
												</form>
											</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
							</div>
						</div> -->
						<!-- pagination -->
						<div class="row">
							{{ $motors->links('admin.layouts.partials.pagination') }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@push('script')
<script>
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
		console.log('Maklo');
		$('.js-example-basic-single').select2();
	});
</script>
@endpush