@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<!-- general form elements -->
						<div class="card card-primary">
								<div class="card-header">
										<h3 class="card-title">Data Postingan Blog</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
										@csrf
										@method('POST')
										<div class="card-body">
												{{-- judul post --}}
												<div class="form-group">
														<label for="judul">Judul Postingan</label>
														<input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
																name="judul" placeholder="masukan judul postingan ...">
												</div>

												{{-- deksripsi use summernote --}}
												<div class="form-group">
														<label for="deskripsi">Deskripsi Postingan</label>
														<textarea id="deskripsi" name="deskripsi"></textarea>
												</div>

												{{-- thumbnail --}}
												<div class="form-group">
														<label for="thumbnail">Gambar Thumbnail Postingan</label>
														<div class="input-group">
																<div class="custom-file">
																		<input type="file" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="thumbnail"
																				name="thumbnail">
																		<label class="custom-file-label" for="thumbnail">Choose file</label>
																</div>
														</div>
												</div>
										</div>
										<!-- /.card-body -->

										<div class="card-footer">
												<button type="submit" class="btn btn-primary">Simpan Postingan</button>
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
										<h3 class="card-title">Data Postingan</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
										<table id="dataBlog" class="table-bordered table-striped table">
												<thead>
														<tr>
																<th>No.</th>
																<th>Judul Postingan</th>
																<th>Thumbnail Postingan</th>
																<th width="120px">Action</th>
														</tr>
												</thead>
												<tbody>
														@foreach ($blogs as $blog)
																<tr>
																		<td>{{ $loop->iteration }}</td>
																		<td>{{ $blog->judul }}</td>
																		<td> <a href="/assets/images/thumbnail-blog/{{ $blog->thumbnail }}" data-fancybox="gallery">
																						<img width="150px" src="/assets/images/thumbnail-blog/{{ $blog->thumbnail }}" alt="">
																				</a></td>
																		<td>
																				<div class="d-flex justify-content-between">
																						<a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
																						<a href="{{ route('admin.blog.show', $blog->id) }}" class="btn btn-success">Lihat</a>
																						<form action="{{ route('admin.blog.destroy', $blog->id) }}" method="post">
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
																<th>No.</th>
																<th>Judul Postingan</th>
																<th>Thumbnail Postingan</th>
																<th width="120px">Action</th>
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
				$(document).ready(function() {
						// Summernote
						$('#deskripsi').summernote({
								placeholder: 'buat isi postingan ...',
								tabsize: 2,
								height: 300
						})
				})

				// Inisialisasi FancyBox
				$('[data-fancybox="gallery"]').fancybox({
						// Opsi konfigurasi FancyBox di sini
						// Contoh: tambahkan opsi untuk tampilan slide show
						slideShow: {
								autoStart: false,
								speed: 3000
						}
				});

				$(function() {
						$("#dataBlog").DataTable({
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
												title: `Hapus Data Postingan ?`,
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
