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
										<div class="d-flex justify-content-center flex-column align-items-center gap-3">
												<img src="{{ asset('assets/images/profile/default.png') }}" alt="default.png"
														class="img-fluid rounded-circle w-50" srcset="">
												<div>
														<h2 class="text-dark fw-bold">{{ auth()->user()->nama }}</h2>
														<div class="d-flex justify-content-start align-items-baseline mt-2 gap-2">
																<i class="fa fa-map-marker text-basic fs-3" aria-hidden="true"></i>
																<p class="fs-4 text-dark">Belum di atur</p>
														</div>
												</div>
										</div>
										<div class="row">
												<div class="col-11">
														<p class="text-dark">Jl. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit, doloremque.</p>
												</div>
												<div class="col-1"><i class="fa fa-location-arrow fs-3 text-primary" aria-hidden="true"></i></div>
										</div>
								</div>
						</div>
				</div>
				<div class="row mt-5">
						<div class="col-12 d-flex justify-content-center">
								<div class="col-11 col-md-8 col-lg-6 card-profile d-flex justify-content-center gap-3 p-3">

										<!-- Button trigger modal edit -->
										<button type="button" class="btn btn-warning d-none" data-bs-toggle="modal" data-bs-target="#modalEdit">
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
								<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
										...
								</div>
								<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save changes</button>
								</div>
						</div>
				</div>
		</div>
@endsection
