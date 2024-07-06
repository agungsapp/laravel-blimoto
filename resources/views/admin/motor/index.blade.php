@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12 col-md-12">

						<div class="card card-primary">
								<div class="card-header">
										<h3 class="card-title">Data Motor</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
										<div class="table-responsive">
												<table id="dataMotor" class="table-bordered table-striped table">
														<thead>
																<tr>
																		<th>ID</th>
																		<th>Nama Motor</th>
																		<th>Kategori Best Motor</th>
																		<th>Merk Motor</th>
																		<th>Tipe Motor</th>
																		<th>Stock</th>
																		<th width="120px">Action</th>
																</tr>
														</thead>
														<tfoot>
																<tr>
																		<th>ID</th>
																		<th>Nama Motor</th>
																		<th>Kategori Best Motor</th>
																		<th>Merk Motor</th>
																		<th>Tipe Motor</th>
																		<th>Stock</th>
																		<th>Action</th>
																</tr>
														</tfoot>
												</table>
										</div>
								</div>
								<!-- /.card-body -->
						</div>
						<!-- /.card -->
				</div>
		</div>
@endsection


@push('script')
		<script>
				$(document).on('click', '.show_confirm', function(e) {
						e.preventDefault();
						var form = $(this).closest('form');
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
		</script>
		<script>
				$(function() {
						$('#dataMotor').DataTable({
								serverSide: true,
								order: [
										[0, 'desc']
								],
								ajax: {
										url: '{{ route('admin.motor.index') }}',
										type: 'GET',
								},
								columns: [{
												data: 'id',
												name: 'id'
										},
										{
												data: 'nama',
												name: 'nama'
										},
										{
												data: 'best_motor',
												name: 'best_motor_name',
												render: function(data, type, row) {
														return data ? data : 'No Kategori';
												}
										},
										{
												data: 'merk_nama',
												name: 'merk_nama'
										},
										{
												data: 'type_nama',
												name: 'type_nama'
										},
										{
												data: 'stock',
												name: 'stock',
												render: function(data, type, row) {
														return data === 1 ? 'Ada' : 'Kosong';
												}
										},
										{
												data: 'action',
												name: 'action',
												orderable: false
										}
								]
						});
				});
		</script>
@endpush
