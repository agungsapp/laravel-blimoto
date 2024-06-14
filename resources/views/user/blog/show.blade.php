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
																		<a class="text-white" href="javascript:void(0)">Home</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">detail berita</a>
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
												<img src="/assets/images/thumbnail-blog/{{ $blog->thumbnail }}" class="img-fluid w-100" alt="blog" />
												<h3>
														{{ $blog->judul }}.
												</h3>
												<ul class="post-social">
														<li>{{ date('d F Y', strtotime($blog->created_at)) }} | Admin <a href="https://blimoto.com/"
																		target="_blank">blimoto.com</a></li>
												</ul>
												<div class="body">
														{!! $blog->deskripsi !!}
												</div>

										</div>
								</div>
						</div>
				</div>
		</section>
		<!--Section ends-->

		<!-- recent blog start -->
		<section class="section-big-py-space blog-page">
				<div class="container">
						<h2 class="title8 mb-2">Berita Terbaru</h2>
						<div class="col-xl-12">

								@foreach ($recents as $recent)
										<div class="row blog-media">
												<div class="col-xl-6 col-sm-12">
														<div class="blog-left">
																<a href="{{ route('blog.show', $recent->slug) }}"><img
																				src="{{ asset('assets') }}/images/thumbnail-blog/{{ $recent->thumbnail }}" class="img-fluid w-100"
																				alt="{{ $recent->thumbnail }}" /></a>
																<div class="date-label">{{ $recent->created_at->isoFormat('D MMMM YYYY') }}</div>
														</div>
												</div>
												<div class="col-xl-6 col-sm-12">
														<div class="blog-right">
																<div>
																		<a href="{{ route('blog.show', $recent->slug) }}">
																				<h4>
																						{{ $recent->judul }}
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
				</div>
		</section>
		<!-- recent blog end -->
@endsection
