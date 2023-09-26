@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<!-- general form elements -->
						<div class="card card-warning">
								<div class="card-header">
										<h3 class="card-title"> Edit Data Postingan Blog</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
										@csrf
										@method('PUT')
										<div class="card-body">
												{{-- judul post --}}
												<div class="form-group">
														<label for="judul">Judul Postingan</label>
														<input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
																name="judul" placeholder="masukan judul postingan ..." value="{{ $blog->judul }}">
												</div>

												{{-- cuplikan --}}
												<div class="form-group">
														<label for="cuplikan">Cuplikan Postingan</label>
														<textarea class="form-control @error('cuplikan') is-invalid @enderror" id="cuplikan" name="cuplikan" maxlength="250">{{ $blog->cuplikan }}</textarea>
												</div>

												{{-- deksripsi use summernote --}}
												<div class="form-group">
														<label for="deskripsi">Deskripsi Postingan</label>
														<textarea id="deskripsi" name="deskripsi">{{ $blog->deskripsi }}</textarea>
												</div>

												{{-- alert error --}}
												@if (session()->has('deskripsi'))
														<div class="px-5 py-2">
																<div class="alert alert-danger">
																		{{ session()->get('deskripsi') }}
																</div>
														</div>
												@endif

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

												<div class="form-group">
														<p>Thumbnai :</p>
														<img width="50%" class="img-responsive shadow-lg"
																src="/assets/images/thumbnail-blog/{{ $blog->thumbnail }}" alt="">
												</div>
										</div>
										<!-- /.card-body -->

										<div class="card-footer">
												<button type="submit" class="btn btn-success">Simpan Postingan</button>
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
						$('#deskripsi').summernote({
								placeholder: 'buat isi postingan ...',
								tabsize: 2,
								height: 300
						})
				})
		</script>
@endpush
