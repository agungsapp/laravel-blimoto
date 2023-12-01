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
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">Event</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">Detail Event</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<!--section start-->
		<section class="blog-detail-page section-big-py-space ratio2_3">
				<div class="container">
						<div class="row section-big-pb-space">
								<div class="col-sm-12 blog-detail">
										<div class="creative-card">
												<img src="{{ asset('assets') }}/images/event/{{ $event->thumbnail }}" class="img-fluid w-100"
														alt="{{ $event->thumbnail }}" />
												<h3>
														{{ $event->judul }}.
												</h3>
												<ul class="post-social">
														<li>{{ date('d F Y', strtotime($event->created_at)) }} | Admin <a href="https://blimoto.com/"
																		target="_blank">blimoto.com</a></li>
												</ul>
												<div class="body">
														{!! $event->deskripsi !!}
												</div>

										</div>
								</div>
						</div>
				</div>
		</section>
		<!--Section ends-->
@endsection
