@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Profil Saya</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">Profil</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">Profil saya</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->


		{{-- profile info section start --}}
		<section class="container mt-5">
				<div class="row">
						<div class="col-12 d-flex justify-content-center">
								<div
										class="col-11 col-md-8 col-lg-6 card-profile justify-content-center d-flex flex-column align-items-center gap-5 bg-white p-4">
										<div class="d-flex justify-content-center flex-column align-items-center profile-img gap-3">
												<img src="{{ asset('assets/images/profile/' . auth()->user()->path_image) }}" alt="default.png"
														class="img-fluid rounded-circle w-50" srcset="">
												<div>
														<h2 class="text-dark fw-bold">{{ auth()->user()->nama }}</h2>
														<div class="d-flex justify-content-start align-items-baseline mt-2 gap-2">
																<i class="fa fa-map-marker text-basic fs-3" aria-hidden="true"></i>
																<p class="fs-4 text-dark">
																		@php
																				$kotaDetail = auth()->user()->detailUser->kota->nama ?? null;
																		@endphp
																		{{ $kotaDetail == null ? 'lokasi anda belum di atur' : auth()->user()->detailUser->kota->nama }}
																</p>
														</div>
												</div>
										</div>
										<div class="row d-flex justify-content-between w-100 flex-row">
												<div class="">
														<p class="text-dark">
																@php
																		$alamat = auth()->user()->detailUser->alamat ?? null;
																@endphp
																{{ $alamat == null ? 'alamat anda belum di atur' : auth()->user()->detailUser->alamat }}
														</p>
												</div>
												{{-- <div class=""><i class="fa fa-location-arrow fs-3 text-primary" aria-hidden="true"></i></div> --}}
										</div>
								</div>
						</div>
				</div>
				<div class="row my-5">
						<div class="col-12 d-flex justify-content-center">
								<div class="col-11 col-md-8 col-lg-6 card-profile d-flex justify-content-center gap-3 bg-white p-3">

										<!-- Button trigger modal edit -->
										<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit">
												Edit Profile
										</button>

										{{-- logout  --}}
										<form action="{{ route('login.destroy') }}" method="POST">
												@csrf
												@method('DELETE')

												<button type="submit" class="btn btn-basic">Logout</button>
										</form>

										{{-- <a href="#" class="btn btn-basic">Logout</a> --}}
								</div>
						</div>
				</div>
		</section>
		{{-- profile info section end --}}





		{{-- modal edit area hidden  --}}
		<!-- Modal -->
		<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
								<div class="modal-header bg-basic">
										<h5 class="modal-title text-white" id="exampleModalLabel">Edit Profil</h5>
										<button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								{{-- form edit profil start --}}
								<form action="{{ route('profil.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
										@csrf
										@method('PUT')
										<div class="modal-body">

												{{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}

												<div class="mb-3">
														<label for="name" class="form-label">Nama</label>
														<input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->nama }}"
																placeholder="{{ auth()->user()->nama }}" required>
												</div>
												<div class="mb-3">
														<label for="email" class="form-label">Email</label>
														<input type="email" class="form-control" id="email" name="email"
																value="{{ auth()->user()->detailUser->email ?? '' }}" placeholder="blimoto@gmail.com" required>
												</div>

												<div class="mb-3">
														<select class="form-select" name="jk" aria-label="jk" required>
																<option selected>-- Jenis Kelamin --</option>
																<option {{ (auth()->user()->detailUser->jk ?? '') == 'l' ? 'selected' : '' }} value="l">Laki - laki
																</option>
																<option {{ (auth()->user()->detailUser->jk ?? '') == 'p' ? 'selected' : '' }} value="p">Perempuan
																</option>
														</select>
												</div>

												<div class="mb-3">
														<select class="form-select" name="kota" aria-label="jk" required>
																<option selected value="">-- kota ---</option>
																@foreach ($kota as $k)
																		<option {{ $k->id == (auth()->user()->detailUser->id_kota ?? '') ? 'selected' : '' }}
																				value="{{ $k->id }}">
																				{{ $k->nama }}</option>
																@endforeach

														</select>
												</div>

												<div class="mb-3">
														<label for="alamat" class="form-label">Alamat</label>
														<textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="jl. kelapa dua" required>{{ auth()->user()->detailUser->alamat ?? '' }}</textarea>
												</div>

												<div class="mb-3">
														<label for="formFile" class="form-label">Foto profil</label>
														<input class="form-control" name="photo" type="file" id="formFile">
												</div>
												{{-- form edit profil end --}}
										</div>
										<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
												<button type="submit" class="btn btn-basic">Simpan</button>
										</div>
								</form>

						</div>
				</div>
		</div>
@endsection
