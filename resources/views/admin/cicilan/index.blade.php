@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<div class="callout callout-info">
								<h5><i class="fas fa-info"></i> Note:</h5>
								Lakukan update data dengan import file CSV dengan format yang telah di tentukan.
						</div>
				</div>

				<div class="col-12 mb-3">
						<!-- Button trigger modal import -->
						<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
								<i class="fas fa-file-import"></i><span class="ml-2">Import data cicilan</span>
						</button>

						<!-- Modal import -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
								aria-hidden="true">
								<div class="modal-dialog" role="document">
										<div class="modal-content">
												<div class="modal-header bg-primary">
														<h5 class="modal-title" id="exampleModalLabel">Import Data PriceList Cicilan</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
														</button>
												</div>
												<div class="modal-body">
														<form action="/">
																<div class="input-group mb-3">
																		<div class="custom-file">
																				<input type="file" class="custom-file-input" id="inputGroupFile02">
																				<label class="custom-file-label" for="inputGroupFile02"
																						aria-describedby="inputGroupFileAddon02">Choose file</label>
																		</div>
																		<div class="input-group-append">
																				<button type="submit" class="input-group-text btn-primary" id="inputGroupFileAddon02">Import</button>
																		</div>
																</div>
														</form>
												</div>
												{{-- <div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary">Save changes</button>
												</div> --}}
										</div>
								</div>
						</div>
				</div>

				<div class="col-12">
						<div class="card card-primary">
								<div class="card-header">
										<h3 class="card-title">Data price list cicilan kendaraan</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
										<table id="example1" class="table-bordered table-striped table">
												<thead>
														<tr>
																<th>Rendering engine</th>
																<th>Browser</th>
																<th>Platform(s)</th>
																<th>Engine version</th>
																<th>CSS grade</th>
														</tr>
												</thead>
												<tbody>
														<tr>
																<td>Trident</td>
																<td>Internet
																		Explorer 4.0
																</td>
																<td>Win 95+</td>
																<td> 4</td>
																<td>X</td>
														</tr>
												</tbody>
												<tfoot>
														<tr>
																<th>Rendering engine</th>
																<th>Browser</th>
																<th>Platform(s)</th>
																<th>Engine version</th>
																<th>CSS grade</th>
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
				$("#example1").DataTable({
						"responsive": true,
						"lengthChange": false,
						"autoWidth": false,
						// "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
				}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		</script>
@endpush
