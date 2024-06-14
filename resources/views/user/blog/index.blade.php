@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Berita</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">berita</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">semua berita</a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->

		<!-- blog section start -->
		<section class="section-big-py-space blog-page ratio2_3">
				<div class="custom-container">
						<div class="row">
								<div class="col-xl-9 col-lg-8 col-md-7">

										@foreach ($blogs as $blog)
												<div class="row blog-media">
														<div class="col-xl-6">
																<div class="blog-left">
																		<a href="{{ route('blog.show', $blog->slug) }}"><img
																						src="{{ asset('assets') }}/images/thumbnail-blog/{{ $blog->thumbnail }}" class="img-fluid w-100"
																						alt="{{ $blog->thumbnail }}" /></a>
																		<div class="date-label">26 nov 2019</div>
																</div>
														</div>
														<div class="col-xl-6">
																<div class="blog-right">
																		<div>
																				<a href="{{ route('blog.show', $blog->slug) }}">
																						<h4>
																								{{ $blog->judul }}
																						</h4>
																				</a>
																				<p>
																						{{ strlen($blog->cuplikan) > 50 ? substr($blog->cuplikan, 0, 50) . '...' : $blog->cuplikan }}
																				</p>
																		</div>
																</div>
														</div>
												</div>
										@endforeach

								</div>





								<div class="col-xl-3 col-lg-4 col-md-5">
										<div class="blog-sidebar">
												<div class="theme-card">
														<h4>Berita Terbaru</h4>
														<ul class="recent-blog">

																@foreach ($recents as $recent)
																		<li>
																				<div class="media">
																						<a href="{{ route('blog.show', $recent->slug) }}">
																								<img class="img-fluid" src="{{ asset('assets') }}/images/thumbnail-blog/{{ $recent->thumbnail }}"
																										alt="{{ $recent->thumbnail }}" />
																						</a>
																						<div class="media-body align-self-center">
																								<h6>{{ $recent->judul }}</h6>
																								<h6 class="" style="color: #6b6b6b">{{ $recent->created_at->diffForHumans() }}</h6>
																						</div>
																				</div>
																		</li>
																@endforeach

														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- blog section ends -->

		<!-- pagination start -->
		{{-- <section class="section-big-py-space">
				<div class="custom-container">
						<nav aria-label="Page navigation example">
								<ul class="pagination justify-content-center">
										<li class="page-item">
												<a class="page-link" href="#">Previous</a>
										</li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">4</a></li>
										<li class="page-item"><a class="page-link" href="#">5</a></li>
										<li class="page-item"><a class="page-link" href="#">6</a></li>
										<li class="page-item"><a class="page-link" href="#">7</a></li>
										<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
						</nav>
				</div>
		</section> --}}
		<!-- pagination end -->
@endsection
