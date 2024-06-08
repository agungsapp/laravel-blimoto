{{-- @dd($user->detailUser?->path_image ?? 'default.png') --}}
@extends('admin.layouts.main')
@section('content')
		<section class="container-fluid mt-4">
				<div class="row">
						<div class="col-6 mx-auto">
								<div class="card card-primary">
										<div class="card-header">
												<div class="card-title">
														Edit Data
												</div>
										</div>
										<div class="card-body">
												<form action="{{ route('admin.users.update', $user->id) }}" method="post">
														@csrf
														@method('PUT')



														<div class="row">

																<div class="col-12 d-flex justify-content-center">
																		<img class="w-25 py-5"
																				src="{{ asset('assets/images/profile/') }}/{{ $user->path_image ?? 'default.png' }}"
																				alt="user profile" srcset="">
																		{{-- <p>{{ $user->detailUser?->path_image ?? 'default.png' }}</p> --}}
																</div>

																<div class="form-group col-6">
																		<label class="text-capitalize" for="nama">Nama</label>
																		<input id="nama" class="form-control" type="text" name="nama" value="{{ $user->nama }}"
																				placeholder="masukan nama lengkap ...">
																</div>
																<div class="form-group col-6">
																		<label class="text-capitalize" for="nomor">nomor hp</label>
																		<input id="nomor" class="form-control" type="number" name="nomor" value="{{ $user->nomor_hp }}"
																				placeholder="masukan nomor ...">
																</div>

																<div class="form-group col-8">
																		<label class="text-capitalize" for="email">email</label>
																		<input id="email" class="form-control" type="email" name="email"
																				value="{{ $user->detailUser?->email }}" placeholder="masukan email ...">
																</div>

																<div class="form-group col-4">
																		<label for="jk">Jenis Kelamin</label>
																		<select id="jk" class="form-control" name="jk">
																				<option value="">-- belum di atur --</option>
																				<option {{ $user->detailUser?->jk === 'l' ? 'selected' : '' }} value="l">Laki - laki
																				</option>
																				<option {{ $user->detailUser?->jk === 'p' ? 'selected' : '' }} value="p">Perempuan
																				</option>
																		</select>
																</div>

																<div class="form-group col-6">
																		<label class="text-capitalize" for="alamat">alamat</label>
																		<input id="alamat" class="form-control" type="text" name="alamat"
																				value="{{ $user->detailUser?->alamat }}" placeholder="masukan alamat ...">
																</div>

																<div class="form-group col-6">
																		<label for="kota">Kota</label>
																		<select id="kota" class="form-control" name="kota">
																				<option value="">-- belum di atur --</option>
																				@foreach ($kota as $k)
																						<option {{ $user->detailUser?->id_kota === $k->id ? 'selected' : '' }} value="{{ $k->id }}">
																								{{ $k->nama }}</option>
																				@endforeach
																		</select>
																</div>


														</div>

														<div class="row justify-content-center mt-3 flex px-2">
																<button type="submit" class="btn btn-warning w-50 btn-block">update data</button>
														</div>

												</form>
										</div>
								</div>
						</div>
				</div>
		</section>
@endsection
