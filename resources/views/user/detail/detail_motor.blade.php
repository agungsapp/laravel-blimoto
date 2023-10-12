@extends('user.layouts.main')
@section('content')
		<!-- breadcrumb start -->
		<div class="breadcrumb-main bg-dark">
				<div class="container">
						<div class="row">
								<div class="col">
										<div class="breadcrumb-contain">
												<div>
														<h2 class="text-white">Detail</h2>
														<ul>
																<li>
																		<a class="text-white" href="javascript:void(0)">home</a>
																</li>
																<li><i class="fa fa-angle-double-right text-white"></i></li>
																<li>
																		<a class="text-white" href="javascript:void(0)">detail motor </a>
																</li>
														</ul>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- breadcrumb End -->


		<!-- section start -->
		<section class="section-big-pt-space b-g-light">
				<div class="collection-wrapper">
						<div class="custom-container">
								<div class="row">
										{{-- <div class="col-sm-3 collection-filter">
												<div class="collection-filter-block creative-card creative-inner">
														<div class="collection-mobile-back">
																<span class="filter-back">
																		<i class="fa fa-angle-left" aria-hidden="true"></i>
																		back
																</span>
														</div>
														<div class="collection-collapse-block open border-0">
																<h3 class="collapse-block-title">brand</h3>
																<div class="collection-collapse-block-content">
																		<div class="collection-brand-filter">
																				<ul class="category-list">
																						<li><a href="javascript:void(0)">clothing</a></li>
																						<li><a href="javascript:void(0)">bags</a></li>
																						<li><a href="javascript:void(0)">footwear</a></li>
																						<li><a href="javascript:void(0)">watches</a></li>
																						<li><a href="javascript:void(0)">accessories</a></li>
																				</ul>
																		</div>
																</div>
														</div>
												</div>
												<!-- side-bar single product slider start -->
												<div class="theme-card creative-card creative-inner">
														<h5 class="title-border">new product</h5>
														<div class="slide-1">
																<div>
																		<div class="media-banner plrb-0 b-g-white1 border-0">
																				<div class="media-banner-box">
																						<div class="media">
																								<a href="product-page(left-sidebar).html" tabindex="0">
																										<img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid" alt="banner">
																								</a>
																								<div class="media-body">
																										<div class="media-contant">
																												<div>
																														<div class="product-detail">
																																<ul class="rating">
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star-o"></i></li>
																																</ul>
																																<a href="product-page(left-sidebar).html" tabindex="0">
																																		<p>sumsung galaxy</p>
																																</a>
																																<h6>$47.05 <span>$55.21</span></h6>
																														</div>
																														<div class="cart-info">
																																<button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg
																																				xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
																																				fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
																																				stroke-linejoin="round" class="feather feather-shopping-cart">
																																				<circle cx="9" cy="21" r="1"></circle>
																																				<circle cx="20" cy="21" r="1"></circle>
																																				<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
																																		</svg> </button>
																																<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																																		data-tippy-content="Add to Wishlist"><i data-feather="heart"
																																				class="add-to-wish"></i></a>
																																<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																																		class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																																<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																				data-feather="refresh-cw"></i></a>
																														</div>
																												</div>
																										</div>
																								</div>
																						</div>
																				</div>
																				<div class="media-banner-box">
																						<div class="media">
																								<a href="product-page(left-sidebar).html" tabindex="0">
																										<img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid" alt="banner">
																								</a>
																								<div class="media-body">
																										<div class="media-contant">
																												<div>
																														<div class="product-detail">
																																<ul class="rating">
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star-o"></i></li>
																																</ul>
																																<a href="product-page(left-sidebar).html" tabindex="0">
																																		<p>bajaj rex mixer</p>
																																</a>
																																<h6>$40.05 <span>$60.21</span></h6>
																														</div>
																														<div class="cart-info">
																																<button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg
																																				xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
																																				fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
																																				stroke-linejoin="round" class="feather feather-shopping-cart">
																																				<circle cx="9" cy="21" r="1"></circle>
																																				<circle cx="20" cy="21" r="1"></circle>
																																				<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
																																		</svg> </button>
																																<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																																		data-tippy-content="Add to Wishlist"><i data-feather="heart"
																																				class="add-to-wish"></i></a>
																																<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																																		class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																																<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																				data-feather="refresh-cw"></i></a>
																														</div>
																												</div>
																										</div>
																								</div>
																						</div>
																				</div>
																				<div class="media-banner-box">
																						<div class="media">
																								<a href="product-page(left-sidebar).html" tabindex="0">
																										<img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid" alt="banner">
																								</a>
																								<div class="media-body">
																										<div class="media-contant">
																												<div>
																														<div class="product-detail">
																																<ul class="rating">
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star-o"></i></li>
																																</ul>
																																<a href="product-page(left-sidebar).html" tabindex="0">
																																		<p>usha table fan</p>
																																</a>
																																<h6>$52.05 <span>$60.21</span></h6>
																														</div>
																														<div class="cart-info">
																																<button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg
																																				xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																				viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
																																				stroke-linecap="round" stroke-linejoin="round"
																																				class="feather feather-shopping-cart">
																																				<circle cx="9" cy="21" r="1"></circle>
																																				<circle cx="20" cy="21" r="1"></circle>
																																				<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
																																		</svg> </button>
																																<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																																		data-tippy-content="Add to Wishlist"><i data-feather="heart"
																																				class="add-to-wish"></i></a>
																																<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																																		class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																																<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																				data-feather="refresh-cw"></i></a>
																														</div>
																												</div>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div>
																		<div class="media-banner plrb-0 b-g-white1 border-0">
																				<div class="media-banner-box">
																						<div class="media">
																								<a href="product-page(left-sidebar).html" tabindex="0">
																										<img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid" alt="banner">
																								</a>
																								<div class="media-body">
																										<div class="media-contant">
																												<div>
																														<div class="product-detail">
																																<ul class="rating">
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star-o"></i></li>
																																</ul>
																																<a href="product-page(left-sidebar).html" tabindex="0">
																																		<p>usha table fan</p>
																																</a>
																																<h6>$52.05 <span>$60.21</span></h6>
																														</div>
																														<div class="cart-info">
																																<button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg
																																				xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																				viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
																																				stroke-linecap="round" stroke-linejoin="round"
																																				class="feather feather-shopping-cart">
																																				<circle cx="9" cy="21" r="1"></circle>
																																				<circle cx="20" cy="21" r="1"></circle>
																																				<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
																																		</svg> </button>
																																<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																																		data-tippy-content="Add to Wishlist"><i data-feather="heart"
																																				class="add-to-wish"></i></a>
																																<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																																		class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																																<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																				data-feather="refresh-cw"></i></a>
																														</div>
																												</div>
																										</div>
																								</div>
																						</div>
																				</div>
																				<div class="media-banner-box">
																						<div class="media">
																								<a href="product-page(left-sidebar).html" tabindex="0">
																										<img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid" alt="banner">
																								</a>
																								<div class="media-body">
																										<div class="media-contant">
																												<div>
																														<div class="product-detail">
																																<ul class="rating">
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star-o"></i></li>
																																</ul>
																																<a href="product-page(left-sidebar).html" tabindex="0">
																																		<p>sumsung galaxy</p>
																																</a>
																																<h6>$47.05 <span>$55.21</span></h6>
																														</div>
																														<div class="cart-info">
																																<button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg
																																				xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																				viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
																																				stroke-linecap="round" stroke-linejoin="round"
																																				class="feather feather-shopping-cart">
																																				<circle cx="9" cy="21" r="1"></circle>
																																				<circle cx="20" cy="21" r="1"></circle>
																																				<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
																																		</svg> </button>
																																<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																																		data-tippy-content="Add to Wishlist"><i data-feather="heart"
																																				class="add-to-wish"></i></a>
																																<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																																		class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																																<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																				data-feather="refresh-cw"></i></a>
																														</div>
																												</div>
																										</div>
																								</div>
																						</div>
																				</div>
																				<div class="media-banner-box">
																						<div class="media">
																								<a href="product-page(left-sidebar).html" tabindex="0">
																										<img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid" alt="banner">
																								</a>
																								<div class="media-body">
																										<div class="media-contant">
																												<div>
																														<div class="product-detail">
																																<ul class="rating">
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star-o"></i></li>
																																</ul>
																																<a href="product-page(left-sidebar).html" tabindex="0">
																																		<p>bajaj rex mixer</p>
																																</a>
																																<h6>$40.05 <span>$60.21</span></h6>
																														</div>
																														<div class="cart-info">
																																<button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg
																																				xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																				viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
																																				stroke-linecap="round" stroke-linejoin="round"
																																				class="feather feather-shopping-cart">
																																				<circle cx="9" cy="21" r="1"></circle>
																																				<circle cx="20" cy="21" r="1"></circle>
																																				<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
																																		</svg> </button>
																																<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																																		data-tippy-content="Add to Wishlist"><i data-feather="heart"
																																				class="add-to-wish"></i></a>
																																<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																																		class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																																<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																				data-feather="refresh-cw"></i></a>
																														</div>
																												</div>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div>
																		<div class="media-banner plrb-0 b-g-white1 border-0">
																				<div class="media-banner-box">
																						<div class="media">
																								<a href="product-page(left-sidebar).html" tabindex="0">
																										<img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid" alt="banner">
																								</a>
																								<div class="media-body">
																										<div class="media-contant">
																												<div>
																														<div class="product-detail">
																																<ul class="rating">
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star-o"></i></li>
																																</ul>
																																<a href="product-page(left-sidebar).html" tabindex="0">
																																		<p>bajaj rex mixer</p>
																																</a>
																																<h6>$40.05 <span>$60.21</span></h6>
																														</div>
																														<div class="cart-info">
																																<button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg
																																				xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																				viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
																																				stroke-linecap="round" stroke-linejoin="round"
																																				class="feather feather-shopping-cart">
																																				<circle cx="9" cy="21" r="1"></circle>
																																				<circle cx="20" cy="21" r="1"></circle>
																																				<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
																																		</svg> </button>
																																<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																																		data-tippy-content="Add to Wishlist"><i data-feather="heart"
																																				class="add-to-wish"></i></a>
																																<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																																		class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																																<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																				data-feather="refresh-cw"></i></a>
																														</div>
																												</div>
																										</div>
																								</div>
																						</div>
																				</div>
																				<div class="media-banner-box">
																						<div class="media">
																								<a href="product-page(left-sidebar).html" tabindex="0">
																										<img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid" alt="banner">
																								</a>
																								<div class="media-body">
																										<div class="media-contant">
																												<div>
																														<div class="product-detail">
																																<ul class="rating">
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star-o"></i></li>
																																</ul>
																																<a href="product-page(left-sidebar).html" tabindex="0">
																																		<p>usha table fan</p>
																																</a>
																																<h6>$52.05 <span>$60.21</span></h6>
																														</div>
																														<div class="cart-info">
																																<button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg
																																				xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																				viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
																																				stroke-linecap="round" stroke-linejoin="round"
																																				class="feather feather-shopping-cart">
																																				<circle cx="9" cy="21" r="1"></circle>
																																				<circle cx="20" cy="21" r="1"></circle>
																																				<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
																																		</svg> </button>
																																<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																																		data-tippy-content="Add to Wishlist"><i data-feather="heart"
																																				class="add-to-wish"></i></a>
																																<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																																		class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																																<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																				data-feather="refresh-cw"></i></a>
																														</div>
																												</div>
																										</div>
																								</div>
																						</div>
																				</div>
																				<div class="media-banner-box">
																						<div class="media">
																								<a href="product-page(left-sidebar).html" tabindex="0">
																										<img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid" alt="banner">
																								</a>
																								<div class="media-body">
																										<div class="media-contant">
																												<div>
																														<div class="product-detail">
																																<ul class="rating">
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star"></i></li>
																																		<li><i class="fa fa-star-o"></i></li>
																																</ul>
																																<a href="product-page(left-sidebar).html" tabindex="0">
																																		<p>sumsung galaxy</p>
																																</a>
																																<h6>$47.05 <span>$55.21</span></h6>
																														</div>
																														<div class="cart-info">
																																<button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg
																																				xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																																				viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
																																				stroke-linecap="round" stroke-linejoin="round"
																																				class="feather feather-shopping-cart">
																																				<circle cx="9" cy="21" r="1"></circle>
																																				<circle cx="20" cy="21" r="1"></circle>
																																				<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
																																		</svg> </button>
																																<a href="javascript:void(0)" class="add-to-wish tooltip-top"
																																		data-tippy-content="Add to Wishlist"><i data-feather="heart"
																																				class="add-to-wish"></i></a>
																																<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
																																		class="tooltip-top" data-tippy-content="Quick View"><i data-feather="eye"></i></a>
																																<a href="compare.html" class="tooltip-top" data-tippy-content="Compare"><i
																																				data-feather="refresh-cw"></i></a>
																														</div>
																												</div>
																										</div>
																								</div>
																						</div>
																				</div>

																		</div>
																</div>
														</div>
												</div>
												<!-- side-bar single product slider end -->
										</div> --}}
										<div class="col-lg-12 col-sm-12 col-xs-12">
												<div class="container-fluid">
														<div class="row">
																<div class="col-xl-12">
																		<div class="filter-main-btn mb-2"><span class="filter-btn"><i class="fa fa-filter"
																								aria-hidden="true"></i>
																						filter</span></div>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-6">
																		<div class="product-slick">
																				<div>
																						<img src="/assets/images/detail-color/1.webp" alt="1.webp" class="img-fluid image_zoom_cls-0">
																				</div>
																				<div>
																						<img src="/assets/images/detail-color/2.webp" alt="1.webp" class="img-fluid image_zoom_cls-1">
																				</div>
																				<div>
																						<img src="/assets/images/detail-color/3.webp" alt="1.webp" class="img-fluid image_zoom_cls-2">
																				</div>
																				<div>
																						<img src="/assets/images/detail-color/4.webp" alt="1.webp" class="img-fluid image_zoom_cls-3">
																				</div>
																		</div>
																		<div class="row">
																				<div class="col-12 p-0">
																						<div class="p-3">
																								<h4 class="fw-bold bg-basic p-3 text-center text-white">Pilih warna favorit kamu disini</h4>
																						</div>
																						<div class="slider-nav">
																								<div><img src="/assets/images/detail-color/1.webp" alt="1.webp" class="img-fluid">
																								</div>
																								<div><img src="/assets/images/detail-color/2.webp" alt="1.webp" class="img-fluid">
																								</div>
																								<div><img src="/assets/images/detail-color/3.webp" alt="1.webp" class="img-fluid">
																								</div>
																								<div><img src="/assets/images/detail-color/4.webp" alt="1.webp" class="img-fluid">
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="col-lg-6 rtl-text mt-lg-0 mt-5">
																		<div class="product-right">
																				<div class="pro-group d-flex justify-content-between align-items-baseline">
																						<div>
																								<h2>{{ $motor['nama'] }}</h2>
																								<ul class="pro-price">
																										<li>{{ Str::rupiah($motor['harga']) }}</li>
																								</ul>
																						</div>
																						<div class="d-flex align-items-baseline stok">
																								<p class="me-3">Stok: </p>
																								<h3 class="badge badge-pill bg-success badge-success">Tersedia</h3>
																						</div>
																				</div>
																				{{-- <div class="pro-group">
																						<h5 class="text-doff mb-2">Potongan diskon terbaik</h5>
																						<ul class="pro-price">
																								<li>Rp. 1.500.000</li>
																								<li><span>Rp. 1.000.000</span></li>
																						</ul>
																				</div> --}}

																				{{-- <div id="selectSize" class="pro-group addeffect-section product-description border-product">
																						<div class="product-buttons">
																								<a href="javascript:void(0)" id="cartEffect" class="btn cart-btn btn-normal tooltip-top"
																										data-tippy-content="Add to cart">
																										<i class="fa fa-shopping-cart"></i>
																										Gas Beli
																								</a>
																						</div>
																				</div> --}}
																				<div class="pro-group">
																						<div class="product-offer">
																								<h6 class="product-title"><i class="fa fa-tags"></i>Diskon 5 Leasing Terbaik </h6>
																								<div class="offer-contain">
																										<ul>

																												@foreach ($diskon_leasing as $les)
																														<li class="d-flex justify-content-between align-items-center flex-row p-2"
																																style="border: 1px solid #c0c0c0; border-radius: 8px;">
																																<div class="d-flex justify-content-between">
																																		<div class="d-flex flex-column justify-content-between">
																																				<p class="fw-bold">Diskon Promo</p>
																																				<span class="code-lable d-flex align-items-center"
																																						style="width: 110px">{{ Str::rupiah($les->diskon) }}</span>
																																		</div>
																																		<div class="ms-3">
																																				<h5>{{ $les->nama }}</h5>
																																				<p class="fw-bold">Diskon normal : </p><del
																																						class="text-danger">{{ Str::rupiah($les->diskon_normal) }}</del>
																																		</div>
																																</div>
																																<div>
																																		<img width="80"
																																				src="{{ asset('assets') }}/images/custom/leasing/{{ $les->gambar }}"
																																				alt="{{ $les->gambar }}" srcset="">
																																</div>
																																<a href="{{ route('detail-leasing') }}" class="btn btn-sm bg-basic ms-3 text-white">Lihat
																																		detail</a>
																														</li>
																												@endforeach



																												{{-- <li class="d-flex justify-content-between">
																														<div class="d-flex justify-content-between align-items-baseline">
																																<span class="code-lable">Rp. 950.000</span>
																																<h5>MCF</h5>
																														</div>
																														<button class="btn btn-sm btn-success">Lihat detail</button>
																												</li> --}}
																										</ul>
																								</div>
																						</div>
																				</div>
																				<div class="pro-group">
																						<div class="d-flex justify-content-between">
																								<h6 class="product-title">Promo berlaku sampai dengan :</h6>
																								<p style="border-radius: 10px;" class="btn btn-sm bg-doff text-white">15 Oktober 2023</p>
																						</div>
																						<div class="simply-countdown" id="timer">
																						</div>
																				</div>
																		</div>
																</div>
														</div>
												</div>


												<section class="tab-product tab-exes creative-card creative-inner">
														<div class="row">
																<div class="col-sm-12 col-lg-12">
																		<ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
																				<li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
																								href="#top-deskripsi" role="tab" aria-selected="true"><i
																										class="icofont icofont-ui-home"></i>Description</a>
																						<div class="material-border"></div>
																				</li>
																				<li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
																								href="#top-feature" role="tab" aria-selected="false"><i
																										class="icofont icofont-man-in-glasses"></i>Feature</a>
																						<div class="material-border"></div>
																				</li>
																		</ul>
																		<div class="tab-content nav-material" id="top-tabContent">
																				<div class="tab-pane fade show active" id="top-deskripsi" role="tabpanel"
																						aria-labelledby="top-home-tab">
																						<p>{{ $motor['deskripsi'] }}</p>
																				</div>
																				<div class="tab-pane fade" id="top-feature" role="tabpanel" aria-labelledby="profile-top-tab">
																						<p class="ps-0">{{ $motor['fitur'] }}</p>
																						<div class="single-product-tables">
																								{{-- <table>
																										<tbody>
																												<tr>
																														<td>Berat</td>
																														<td>Power</td>
																												</tr>
																												<tr>
																														<td>12kg</td>
																														<td>150cc</td>
																												</tr>
																										</tbody>
																								</table> --}}
																						</div>
																				</div>
																				<div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
																						<div class="mt-3 text-center">
																								<iframe width="560" height="315" src="https://www.youtube.com/embed/BUWzX78Ye_8"
																										allow="autoplay; encrypted-media" allowfullscreen></iframe>
																						</div>
																				</div>
																				<div class="tab-pane fade mb-5" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
																						<form class="theme-form">
																								<div class="row">
																										<div class="col-md-12">
																												<div class="media">
																														<label>Rating</label>
																														<div class="media-body ms-3">
																																<div class="rating three-star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
																																				class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
																														</div>
																												</div>
																										</div>
																										<div class="col-md-6">
																												<label for="name">Name</label>
																												<input type="text" class="form-control" id="name" placeholder="Enter Your name"
																														required>
																										</div>
																										<div class="col-md-6">
																												<label>Email</label>
																												<input type="text" class="form-control" placeholder="Email" required>
																										</div>
																										<div class="col-md-12">
																												<label>Review Title</label>
																												<input type="text" class="form-control" placeholder="Enter your Review Subjects"
																														required>
																										</div>
																										<div class="col-md-12">
																												<label>Review Title</label>
																												<textarea class="form-control" placeholder="Wrire Your Testimonial Here" id="exampleFormControlTextarea1"
																												  rows="6"></textarea>
																										</div>
																										<div class="col-md-12">
																												<button class="btn btn-normal" type="submit">Submit YOur Review</button>
																										</div>
																								</div>
																						</form>
																				</div>
																		</div>
																</div>
														</div>
												</section>
										</div>
								</div>
						</div>
				</div>
		</section>
		<!-- Section ends -->
@endsection


@push('script')
		<script>
				// count down :
				simplyCountdown('#timer', {
						year: 2023, // required
						month: 10, // required
						day: 15, // required
						hours: 24, // Default is 0 [0-23] integer
						minutes: 0, // Default is 0 [0-59] integer
						seconds: 0, // Default is 0 [0-59] integer
						words: { //words displayed into the countdown
								days: {
										singular: 'Hari',
										plural: 'Hari'
								},
								hours: {
										singular: 'Jam',
										plural: 'Jam'
								},
								minutes: {
										singular: 'Menit',
										plural: 'Menit'
								},
								seconds: {
										singular: 'Detik',
										plural: 'Detik'
								}
						},
				})
		</script>
@endpush
