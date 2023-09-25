@extends('admin.layouts.main')
@section('content')

<section class="content">

	<div class="row">
		<div class="col-12">
			<div class="card card-primary">
				<div class="card-header">
					<div class="card-title">
						Tambah data motor kota
					</div>
				</div>
				<form action="{{ route('admin.kota-motor.store') }}" method="post">
					@csrf
					@method('POST')
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6">
								<label>Kota</label>
								@if($kota === null)
								<p class="text-danger">Tidak ada data kota silahkan buat terlebih dahulu !</p>
								@else
								<select id="kota" name="kota" class="form-control select2" style="width: 100%;">
									<option value="" selected>-- Pilih kota --</option>
									@foreach ($kota as $k)
									<option value="{{ $k->id }}">{{ $k->nama }}</option>
									@endforeach
								</select>
								@endif
							</div>
							<div class="form-group col-md-6">
								<label>Motor</label>
								@if ($motor === null)
								<p class="text-danger">Tidak ada data motor silahkan buat terlebih dahulu !</p>
								@else
								<select id="motor" name="motor" class="form-control select2" style="width: 100%;">
									<option value="" selected>-- Pilih motor --</option>
									@foreach ($motor as $m)
									<option value="{{ $m->id }}">{{ $m->nama }}</option>
									@endforeach
								</select>
								@endif
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
				</form>
			</div>
		</div>
	</div>

</section>


<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Data Motor Kota</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">

					<table id="data-kota-motor" class="table table-bordered table-striped">
						<thead>
							<tr role="row">
								<th>NO</th>
								<th>Nama Kota</th>
								<th>Nama Motor</th>
								<th width="170px">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($motor_kotas as $motor_kota)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{$motor_kota->kota_nama}}</td>
								<td>{{$motor_kota->motor_nama}}</td>
								<td>
									<div class="btn-group">
										<form action="{{ route('admin.kota-motor.destroy', $motor_kota->id) }}" method="post">
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$motor_kota->id}}">
												Edit
											</button>
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger">Delete</button>
										</form>
									</div>
									<!-- Modal update -->
									<div class="modal fade" id="modalEdit{{$motor_kota->id}}" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<form action="{{ route('admin.kota-motor.update', $motor_kota->id) }}" method="post">
													@csrf
													@method('PUT')
													<div class="modal-body">
														<div class="card card-primary">
															<div class="card-header with-border">
																<h3 class="card-title">Update Data Motor Kota</h3>
															</div>
															<input type="hidden" value="{{$motor_kota->id}}">
															<div class="card-body">
																<div class="form-group">
																	<label>Kota</label>
																	<select id="{{'kota-update-'.$motor_kota->id}}" name="kota" class="form-control select2" style="width: 100%;">
																		@foreach ($kota as $k)
																		<option value="{{ $k->id }}" {{$motor_kota->id_kota === $k->id ? 'selected' : ''}}>{{ $k->nama }}</option>
																		@endforeach
																	</select>
																</div>
																<div class="form-group">
																	<label>Motor</label>
																	<select id="{{'motor-update-'.$motor_kota->id}}" name="motor" class="form-control select2" style="width: 100%;">
																		@foreach ($motor as $m)
																		<option value="{{ $m->id }}" {{$motor_kota->id_motor === $m->id ? 'selected' : ''}}>{{ $m->nama }}</option>
																		@endforeach
																	</select>
																</div>
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
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection


@push('script')
<script>
	$(document).ready(function() {

		$("#data-kota-motor").DataTable({
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