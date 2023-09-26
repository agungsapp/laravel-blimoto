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
																		<a class="text-white" href="javascript:void(0)">Berita Blog</a>
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
						<h2 class="title8 mb-2">Recent Blog</h2>
						<div class="col-xl-12">
								<div class="row blog-media">
										<div class="col-xl-6 col-sm-12">
												<div class="blog-left">
														<a href="javascript:void(0)"><img
																		src="https://imgcdnblog.carbay.com/wp-content/uploads/2023/09/13085559/CHERY-Omoda-5-500x281.jpg"
																		class="img-fluid w-100" alt="" /></a>
														<div class="date-label">26 nov 2019</div>
												</div>
										</div>
										<div class="col-xl-6 col-sm-12">
												<div class="blog-right">
														<div>
																<a href="javascript:void(0)">
																		<h4>
																				you how all this mistaken idea of denouncing pleasure and
																				praising pain was born.
																		</h4>
																</a>
																<p>
																		Consequences that are extremely painful. Nor again is there
																		anyone who loves or pursues or desires to obtain pain of
																		itself, because it is pain, but because occasionally
																		circumstances occur in which toil and pain can procure him
																		some great pleasure.
																</p>
														</div>
												</div>
										</div>
								</div>
								<div class="row blog-media">
										<div class="col-xl-6 col-sm-12">
												<div class="blog-left">
														<a href="javascript:void(0)"><img
																		src="https://imgcdnblog.carbay.com/wp-content/uploads/2023/09/13085559/CHERY-Omoda-5-500x281.jpg"
																		class="img-fluid w-100" alt="" /></a>
														<div class="date-label">26 nov 2019</div>
												</div>
										</div>
										<div class="col-xl-6 col-sm-12">
												<div class="blog-right">
														<div>
																<a href="javascript:void(0)">
																		<h4>
																				you how all this mistaken idea of denouncing pleasure and
																				praising pain was born.
																		</h4>
																</a>
																<p>
																		Consequences that are extremely painful. Nor again is there
																		anyone who loves or pursues or desires to obtain pain of
																		itself, because it is pain, but because occasionally
																		circumstances occur in which toil and pain can procure him
																		some great pleasure.
																</p>
														</div>
												</div>
										</div>
								</div>
								<div class="row blog-media">
										<div class="col-xl-6 col-sm-12">
												<div class="blog-left">
														<a href="javascript:void(0)"><img
																		src="https://imgcdnblog.carbay.com/wp-content/uploads/2023/09/13085559/CHERY-Omoda-5-500x281.jpg"
																		class="img-fluid w-100" alt="" /></a>
														<div class="date-label">26 nov 2019</div>
												</div>
										</div>
										<div class="col-xl-6 col-sm-12">
												<div class="blog-right">
														<div>
																<a href="javascript:void(0)">
																		<h4>
																				you how all this mistaken idea of denouncing pleasure and
																				praising pain was born.
																		</h4>
																</a>
																<p>
																		Consequences that are extremely painful. Nor again is there
																		anyone who loves or pursues or desires to obtain pain of
																		itself, because it is pain, but because occasionally
																		circumstances occur in which toil and pain can procure him
																		some great pleasure.
																</p>
														</div>
												</div>
										</div>
								</div>
								<div class="row blog-media">
										<div class="col-xl-6 col-sm-12">
												<div class="blog-left">
														<a href="javascript:void(0)"><img
																		src="https://imgcdnblog.carbay.com/wp-content/uploads/2023/09/13085559/CHERY-Omoda-5-500x281.jpg"
																		class="img-fluid w-100" alt="" /></a>
														<div class="date-label">26 nov 2019</div>
												</div>
										</div>
										<div class="col-xl-6 col-sm-12">
												<div class="blog-right">
														<div>
																<a href="javascript:void(0)">
																		<h4>
																				you how all this mistaken idea of denouncing pleasure and
																				praising pain was born.
																		</h4>
																</a>
																<p>
																		Consequences that are extremely painful. Nor again is there
																		anyone who loves or pursues or desires to obtain pain of
																		itself, because it is pain, but because occasionally
																		circumstances occur in which toil and pain can procure him
																		some great pleasure.
																</p>
														</div>
												</div>
										</div>
								</div>
								<div class="row blog-media">
										<div class="col-xl-6 col-sm-12">
												<div class="blog-left">
														<a href="javascript:void(0)"><img
																		src="https://imgcdnblog.carbay.com/wp-content/uploads/2023/09/13085559/CHERY-Omoda-5-500x281.jpg"
																		class="img-fluid w-100" alt="" /></a>
														<div class="date-label">26 nov 2019</div>
												</div>
										</div>
										<div class="col-xl-6 col-sm-12">
												<div class="blog-right">
														<div>
																<a href="javascript:void(0)">
																		<h4>
																				you how all this mistaken idea of denouncing pleasure and
																				praising pain was born.
																		</h4>
																</a>
																<p>
																		Consequences that are extremely painful. Nor again is there
																		anyone who loves or pursues or desires to obtain pain of
																		itself, because it is pain, but because occasionally
																		circumstances occur in which toil and pain can procure him
																		some great pleasure.
																</p>
														</div>
												</div>
										</div>
								</div>
								<div class="row blog-media">
										<div class="col-xl-6 col-sm-12">
												<div class="blog-left">
														<a href="javascript:void(0)"><img
																		src="https://imgcdnblog.carbay.com/wp-content/uploads/2023/09/13085559/CHERY-Omoda-5-500x281.jpg"
																		class="img-fluid w-100" alt="" /></a>
														<div class="date-label">26 nov 2019</div>
												</div>
										</div>
										<div class="col-xl-6 col-sm-12">
												<div class="blog-right">
														<div>
																<a href="javascript:void(0)">
																		<h4>
																				you how all this mistaken idea of denouncing pleasure and
																				praising pain was born.
																		</h4>
																</a>
																<p>
																		Consequences that are extremely painful. Nor again is there
																		anyone who loves or pursues or desires to obtain pain of
																		itself, because it is pain, but because occasionally
																		circumstances occur in which toil and pain can procure him
																		some great pleasure.
																</p>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- recent blog end -->
@endsection
