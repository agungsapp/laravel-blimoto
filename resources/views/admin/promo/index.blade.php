@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<div class="card card-primary">
								<div class="card-header">
										<div class="card-title">
												Tambah Promo
										</div>
								</div>
								<form action="{{ route('admin.promo.store') }}" method="post" enctype="multipart/form-data">
										@csrf
										@method('POST')
										<div class="card-body">
												<div class="row">
														<div class="form-group col-md-6">
																<label for="judul">Judul Promo</label>
																<input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror"
																		id="judul" placeholder="Masukan judul promo" value="{{ old('judul') }}">
																@error('judul')
																		<span class="invalid-feedback" role="alert">{{ $message }}</span>
																@enderror
														</div>
														<div class="form-group col-md-6">
																<label for="nomor">Nomor Sales</label>
																<input name="nomor" type="text" class="form-control @error('nomor') is-invalid @enderror"
																		id="nomor" placeholder="Masukan nomor sales" value="{{ old('nomor') ?? '628' }}">
																@error('nomor')
																		<span class="invalid-feedback" role="alert">{{ $message }}</span>
																@enderror
														</div>



												</div>
												<div class="row">
														<div class="form-group col-md-4">
																<label>Tanggal Promo </label>
																<div class="input-group date" id="tanggalPromo" data-target-input="nearest">
																		<input type="text"
																				class="form-control datetimepicker-input @error('tanggal_promo') is-invalid @enderror"
																				data-target="#tanggalPromo" name="tanggal_promo" value="{{ old('tanggal_promo') }}">
																		<div class="input-group-append" data-target="#tanggalPromo" data-toggle="datetimepicker">
																				<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																		</div>
																		@error('tanggal_promo')
																				<span class="invalid-feedback" role="alert">{{ $message }}</span>
																		@enderror
																</div>
														</div>

														<div class="form-group col-md-4">
																<label>Tanggal Berakhir: </label>
																<div class="input-group date" id="tanggalBerakhir" data-target-input="nearest">
																		<input type="text"
																				class="form-control datetimepicker-input @error('tanggal_berakhir') is-invalid @enderror"
																				data-target="#tanggalBerakhir" name="tanggal_berakhir" value="{{ old('tanggal_berakhir') }}">
																		<div class="input-group-append" data-target="#tanggalBerakhir" data-toggle="datetimepicker">
																				<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																		</div>
																		@error('tanggal_berakhir')
																				<span class="invalid-feedback" role="alert">{{ $message }}</span>
																		@enderror
																</div>
														</div>
														<div class="form-group col-md-4">
																<label for="exampleInputFile">Pilih Gambar</label>
																<input type="file" id="exampleInputFile" class="@error('gambar_promo') is-invalid @enderror"
																		name="gambar_promo">
																<p class="help-block">Silahkan pilih gambar promo</p>
																@error('gambar_promo')
																		<span class="invalid-feedback" role="alert">{{ $message }}</span>
																@enderror
														</div>

												</div>
												<div class="row">
														<div class="form-group col-md-12">
																<label>Deskripsi Promo</label>
																<textarea id="deskripsi-promo" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
																  rows="3" placeholder="Deskripsi promo">{{ old('deskripsi') }}</textarea>
																@error('deskripsi')
																		<span class="invalid-feedback" role="alert">{{ $message }}</span>
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
																<th>Judul promo</th>
																<th>Nomor</th>
																<th>Tanggal promo</th>
																<th>Tanggal berakhir</th>
																<th>Deskripsi promo</th>
																<th>Gambar</th>
																<th width="120px">Action</th>
														</tr>
												</thead>
												<tbody>
														@foreach ($promo as $e)
																<tr>
																		<td>{{ $loop->iteration }}</td>
																		<td>{{ $e->judul }}</td>
																		<td>{{ $e->nomor }}</td>
																		<td>{{ $e->tanggal_promo }}</td>
																		<td>{{ $e->tanggal_berakhir }}</td>
																		<td>{!! $e->deskripsi !!}</td>
																		<td>
																				<img width="150px" src="/assets/images/custom/promo/{{ $e->thumbnail }}" alt="{{ $e->thumbnail }}"
																						srcset="">
																		</td>
																		<td>
																				<div class="d-flex justify-content-between">
																						<button data-toggle="modal" data-target="#modalEdit{{ $e->id }}"
																								class="btn btn-warning">Edit</button>
																						<button class="btn btn-success" data-toggle="modal"
																								data-target="#modal-view-gambar-{{ $e->id }}" data-placement="top"
																								title="Lihat Gambar">Lihat</button>
																						<form action="{{ route('admin.promo.destroy', $e->id) }}" method="post">
																								@csrf
																								@method('DELETE')
																								<button type="submit" class="btn btn-danger show_confirm">Delete</button>
																						</form>
																				</div>
																				<!-- modal update detail motor start -->
																				<div class="modal fade" id="modalEdit{{ $e->id }}" role="dialog"
																						aria-labelledby="myModalLabel">
																						<div class="modal-dialog" role="document">
																								<div class="modal-content">
																										<div class="modal-header">
																												<h4 class="modal-title" id="myModalLabel">Edit data: {{ $e->judul }}</h4>
																										</div>
																										<form action="{{ route('admin.promo.update', $e->id) }}" method="post"
																												enctype="multipart/form-data">
																												@csrf
																												@method('PUT')
																												<div class="card-body">
																														<div class="row">
																																<div class="form-group col-12">
																																		<label for="judul">Judul promo</label>
																																		<input name="judul" type="text" class="form-control" id="judul"
																																				placeholder="Masukan judul promo" value="{{ $e->judul }}">
																																</div>
																																<div class="form-group col-12">
																																		<label for="nomor">Nomor Sales</label>
																																		<input name="nomor" type="text"
																																				class="form-control @error('nomor') is-invalid @enderror" id="nomor"
																																				placeholder="Masukan nomor sales" value="{{ $e->nomor }}">
																																		@error('nomor')
																																				<span class="invalid-feedback" role="alert">{{ $message }}</span>
																																		@enderror
																																</div>
																														</div>
																														<div class="row">
																																<div class="form-group col">
																																		<label>Tanggal Promo </label>
																																		<div class="input-group date" id="tanggalPromoUpdate{{ $e->id }}"
																																				data-target-input="nearest">
																																				<input type="text" class="form-control datetimepicker-input"
																																						data-target="#tanggalPromoUpdate{{ $e->id }}" name="tanggal_promo"
																																						value="{{ date('m/d/Y', strtotime($e->tanggal_promo)) }}" />
																																				<div class="input-group-append"
																																						data-target="#tanggalPromoUpdate{{ $e->id }}"
																																						data-toggle="datetimepicker">
																																						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																																				</div>
																																		</div>
																																</div>
																																<div class="form-group col">
																																		<label>Tanggal Berakhir </label>
																																		<div class="input-group date" id="tanggalBerakhirUpdate{{ $e->id }}"
																																				data-target-input="nearest">
																																				<input type="text" class="form-control datetimepicker-input"
																																						data-target="#tanggalBerakhirUpdate{{ $e->id }}" name="tanggal_berakhir"
																																						value="{{ $e->tanggal_berakhir ? date('m/d/Y', strtotime($e->tanggal_berakhir)) : '' }}" />
																																				<div class="input-group-append"
																																						data-target="#tanggalBerakhirUpdate{{ $e->id }}"
																																						data-toggle="datetimepicker">
																																						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																																				</div>
																																		</div>
																																</div>
																														</div>
																														<div class="row">
																																<div class="form-group col-md-12">
																																		<label>Deskripsi promo</label>
																																		<textarea id="deskripsi-promo-edit-{{ $loop->iteration }}" name="deskripsi" class="form-control" rows="3"
																																		  placeholder="Deskripsi promo">{{ $e->deskripsi }}</textarea>
																																</div>
																														</div>
																														<div class="row">
																																<div class="form-group col">
																																		<label for="exampleInputFile">Pilih Gambar</label>
																																		<input type="file" id="exampleInputFile" class="" name="gambar_promo">
																																		<p class="help-block">Silahkan pilih gambar promo</p>
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
																				<!-- modal lihat gambar start -->
																				<div class="modal fade" id="modal-view-gambar-{{ $e->id }}" tabindex="-1" role="dialog"
																						aria-labelledby="myModalLabel">
																						<div class="modal-dialog" role="document">
																								<div class="modal-content">
																										<div class="modal-header">
																												<h4 class="modal-title" id="myModalLabel">Gambar: {{ $e->judul }}</h4>
																										</div>
																										<div class="modal-body">
																												<img src="{{ '/assets/images/custom/promo/' . $e->thumbnail }}" width="100%"
																														height="50%" />
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
																<th>Judul promo</th>
																<th>Tanggal promo</th>
																<th>Tanggal berakhir</th>
																<th>Deskripsi promo</th>
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
						$('.show_confirm').click(function(promo) {
								var form = $(this).closest("form");
								var name = $(this).data("name");
								promo.preventDefault();
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
						})

						$('[id^=tanggalPromoUpdate]').datetimepicker({
								format: 'L'
						});
						$('[id^=tanggalBerakhirUpdate]').datetimepicker({
								format: 'L'
						});

						$('#tanggalPromo').datetimepicker({
								format: 'L'
						});
						$('#tanggalBerakhir').datetimepicker({
								format: 'L'
						});

						function limitCharacterCount(editor, limit) {
								editor.on('summernote.keyup', function(we, e) {
										var content = $(this).summernote('code');
										var text = $('<div>').html(content).text();

										if (text.length > limit) {
												var modifiedText = text.substring(0, limit);
												$(this).summernote('code', modifiedText);
										}
								});
						}

						$('#deskripsi-promo').summernote({
								placeholder: 'buat isi deskripsi promo maksimal 400 karakter ...',
								tabsize: 2,
								height: 100,
								callbacks: {
										onInit: function() {
												limitCharacterCount($(this), 400); // Batasi hingga 400 karakter
										}
								}
						})

						$('[id^=deskripsi-promo-edit]').each(function() {
								$(this).summernote({
										placeholder: 'buat isi deskripsi promo maksimal 400 karakter ...',
										tabsize: 2,
										height: 300,
										callbacks: {
												onInit: function() {
														limitCharacterCount($(this), 400); // Batasi hingga 400 karakter
												}
										}
								});
						});

						$("#dataDetail").DataTable({
								"responsive": true,
								"lengthChange": false,
								"autoWidth": false,
								//"buttons": ["copy", "csv", "excel", "pdf", "print"] //, "colvis"
						}).buttons().container().appendTo('#dataDetail .col-md-6:eq(0)');

						$('.select2').select2()
				})
		</script>
@endpush
