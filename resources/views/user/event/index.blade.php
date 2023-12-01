@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Event</h2>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<section class="section-py-space my-3">
				<div class="title8 mt-5">
						<h4>Event BliMoto</h4>
				</div>

				<div class="container">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

								@foreach ($events as $event)
										<div class="col">
												<div class="card">
														<img src="{{ asset('assets') }}/images/event/{{ $event->thumbnail }}" alt="..." />
														<div class="card-body">
																<div class="row">
																		<div class="col">
																				<h5 class="card-title">{{ $event->judul }}</h5>
																		</div>
																		<div class="col-2">
																				<a href="https://bit.ly/WahanaHondaVirtualExpo">
																						<i class="fa fa-location-arrow fs-5" aria-hidden="true"></i>
																				</a>
																		</div>
																</div>
																{{-- <p class="card-text">
																		{!! $event->deskripsi !!}
																</p> --}}

																<p class="card-text text-success fw-bold mt-2">
																		{{ $event->tanggal_event }}
																</p>
																<a href="{{ route('event.show', $event->id) }}" class="btn btn-basic mt-2 rounded-lg px-4 py-1">Lihat
																		Detail</a>
														</div>
												</div>
										</div>
								@endforeach



						</div>
				</div>
		</section>
@endsection
