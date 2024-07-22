<!-- loader start -->
<div class="loader-wrapper">
		<div>
				<img src="/assets/images/custom/loader.gif" alt="loader" />
		</div>
</div>
<!-- loader end -->

<!--header start-->
<header id="stickyheader" class="header-style2">
		<div class="header7">
				<div class="custom-container">
						<div class="row">
								<div class="col-12">
										<div class="header-contain">
												<div class="logo-block">
														<div class="mobilecat-toggle mobile-search icon-md-block d-sm-none">
																<i class="fa fa-search"></i>
														</div>

														<div class="brand-logo logo-sm-center">
																<a href="{{ route('home.index') }}">
																		<img src="/assets/images/logo/Logo-blimoto.webp" class="img-fluid" alt="logo" />
																</a>
														</div>
												</div>
												@php
														$kategori = isset($kategori) ? $kategori : null;
														$keyword = isset($keyword) ? $keyword : '';
												@endphp
												{{-- @dd($kategori) --}}
												<form action="{{ route('search-motor') }}" method="GET">
														@csrf
														<div class="header-search ajax-search the-basics">
																<div class="input-group">
																		<div class="input-group-text bg-basic">
																				<input id="lokasi-user-pencarian" type="hidden" name="id_lokasi" value="">
																				<select name="kategori" id="kategoriPencarian" class="" required>
																						<option value="" selected class="bg-basic">Kategori</option>
																						<option value="1" {{ $kategori == 1 ? 'selected' : '' }} class="bg-basic">Matic</option>
																						<option value="2" {{ $kategori == 2 ? 'selected' : '' }} class="bg-basic">Bebek/Cub</option>
																						<option value="3" {{ $kategori == 3 ? 'selected' : '' }} class="bg-basic">Sport</option>
																						<option value="4" {{ $kategori == 4 ? 'selected' : '' }} class="bg-basic">Big Bike</option>
																				</select>

																		</div>
																		<input type="search" class="form-control typeahead" name="motor"
																				placeholder="Cari motor impian anda !" value="{{ $keyword }}" required />
																		<button type="submit" class="input-group-text">
																				<i class="fa fa-search"></i>
																		</button>
																</div>
														</div>
												</form>
												<div class="categroy-contain">
														<ul id="main-menu-header"
																class="sm pixelstrap sm-horizontal align-items-center justify-content-center d-flex">

																<li>
																		<a class="dark-menu-item trigerModalLokasi">
																				<i class="fa fa-map-marker"></i>
																				<span id="lokasiTextShow" class="lokasiTextShow ms-2">Lokasi</span>
																		</a>
																		<ul id="select-lokasi-user" class="select-lokasi-user">
																				{{-- old --}}

																				{{-- 
																				@php
																						$lokasis = Str::getLokasiData();
																				@endphp

																				@foreach ($lokasis as $lkr)
																						<li><a href="#" data-id="{{ $lkr->id }}">{{ $lkr->nama }}</a></li>
																				@endforeach --}}

																				{{-- <li><a href="#" data-id="1">Jakarta Selatan</a></li>
																				<li><a href="#" data-id="2">Bogor</a></li>
																				<li><a href="#" data-id="3">Depok</a></li>
																				<li><a href="#" data-id="4">Tangerang</a></li>
																				<li><a href="#" data-id="5">Bekasi</a></li> --}}
																				{{-- update fetch get-kota untuk mendapatkan lokasi hanya yang ada saja. --}}
																		</ul>
																</li>

																@if (auth()->check())
																		<li>
																				<a class="dark-menu-item">
																						<div class="icon-user-wrapper"><i class="fa fa-user"></i></div>
																				</a>
																				<ul class="user-option-wrapper mr-4 p-2">
																						<li><a href="{{ route('profil.index') }}">{{ auth()->user()->nama }}</a></li>
																						<li><a href="{{ route('profil.index') }}">Edit Profil</a></li>
																						<li class="px-2">

																								<form action="{{ route('login.destroy') }}" method="POST">
																										@csrf
																										@method('DELETE')

																										<button type="submit" class="btn btn-basic"
																												style="border-radius: 19px !important; color: white !important; font-weight: bold;">Logout</button>
																								</form>

																								{{-- <a href="{{ route('login.destroy') }}">Logout</a> --}}
																						</li>
																				</ul>
																		</li>
																@else
																		<li>
																				<a href="{{ route('login') }}"><button type="button" class="btn bg-basic text-white"
																								style="padding-left: 2.5rem; padding-right: 2.5rem">
																								Masuk
																						</button></a>
																		</li>
																		<li>
																				<a href="{{ route('register') }}"><button type="button" class="btn btn-outline-dark"
																								style="padding-left: 2.5rem; padding-right: 2.5rem">
																								Daftar
																						</button></a>
																		</li>
																@endif


														</ul>
														<div class="toggle-nav">
																<i class="fa fa-bars sidebar-bar"></i>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
				<div class="searchbar-input">
						<div class="input-group">
								<div class="input-group-append">
										<span class="input-group-text">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
														y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932"
														style="enable-background: new 0 0 28.931 28.932" xml:space="preserve">
														<g>
																<path
																		d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z" />
														</g>
												</svg>
										</span>
								</div>
								<input type="text" class="form-control" placeholder="Cari Motor" />
								<div class="input-group-append">
										<span class="input-group-text close-searchbar">
												<svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg">
														<path
																d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
												</svg>
										</span>
								</div>
						</div>
				</div>
		</div>

		<div id="navbar-wrapper" class="category-header7 bg-white">
				<div class="custom-container navbar2-child">
						<div class="row">
								<div class="col-12">
										<div class="category-contain">
												<div class="category-left">
														<div class="header-category3">
																<div class="category-heandle open">
																		<div class="heandle-right">
																				<div class="point"></div>
																		</div>
																</div>
														</div>
														<div class="logo-block">
																<div class="mobilecat-toggle mobile-search icon-md-block">
																		<i class="fa fa-search"></i>
																</div>
																<div class="brand-logo logo-sm-center">
																		<a href="{{ route('home.index') }}">
																				<img src="/assets/images/logo/Logo-blimoto.webp" class="img-fluid" alt="logo" />
																		</a>
																</div>
														</div>
												</div>
												<div class="category-right mx-auto">
														<div class="menu-block">
																<nav id="main-nav">
																		<div class="toggle-nav">
																				<i class="fa fa-bars sidebar-bar"></i>
																		</div>
																		<ul id="main-menu" class="sm pixelstrap sm-horizontal">
																				<li>
																						<div class="mobile-back text-right">
																								Back<i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
																						</div>
																				</li>
																				<li>
																						<a class="dark-menu-item text-dark" href="javascript:void(0)">Motor</a>
																						<ul>
																								<li>
																										<a href="{{ route('motor.index') }}">Motor Terbaru</a>
																								</li>
																								{{-- <li>
																										<a href="{{ route('bandingkan.index') }}">Bandingkan Motor</a>
																								</li> --}}
																								{{-- <li>
																										<a href="motor-termurah.html">Tukar Motor</a>
																								</li>
																								--}}
																								<li>
																										<a href="{{ route('brosur.index') }}">Brosur Motor</a>
																								</li>
																								<li>
																										<a href="{{ route('dealer.index') }}">Dealer</a>
																								</li>
																						</ul>
																				</li>
																				<li>
																						<a class="dark-menu-item text-dark" href="javascript:void(0)">Kredit</a>
																						<ul>
																								<li>
																										<a href="{{ route('simulasi_kredit.index') }}">Simulasi</a>
																								</li>

																								<li><a href="{{ route('syarat_kredit.index') }}">Syarat Kredit</a></li>
																								<li>
																										<a href="{{ route('info_leasing.index') }}">Info Leasing</a>
																								</li>
																						</ul>
																				</li>

																				<li>
																						<a class="dark-menu-item text-dark" href="{{ route('promosi.index') }}">Promosi</a>
																				</li>

																				<li>
																						<a class="dark-menu-item text-dark" href="{{ route('cek-slik.index') }}">Cek Slik
																						</a>
																				</li>

																				<li>
																						<a class="dark-menu-item text-dark" href="{{ route('blog.index') }}">Berita</a>
																				</li>
																				<li>
																						<a class="dark-menu-item text-dark" href="{{ route('event.index') }}">Event</a>
																				</li>
																				{{-- lokasi navbar kedua  --}}
																				<li id="lokasi-ambang">
																						<a class="dark-menu-item">
																								<i class="fa fa-map-marker"></i>
																								<span id="lokasiTextShow2" class="lokasiTextShow ms-2">Lokasi</span>
																						</a>
																						<ul id="select-lokasi-user2" class="select-lokasi-user">
																								<li><a href="#" data-id="1">Jakarta Selatan</a></li>
																								<li><a href="#" data-id="2">Depok</a></li>
																								<li><a href="#" data-id="3">Bogor</a></li>
																								<li><a href="#" data-id="4">Tanggerang</a></li>
																								<li><a href="#" data-id="5">Bekasi</a></li>
																						</ul>
																				</li>

																				{{-- login placement --}}
																				@if (auth()->check())
																						<li class="login-btn-nav">
																								<a class="dark-menu-item">
																										<div class="icon-user-wrapper"><i class="fa fa-user"></i></div>
																								</a>
																								<ul class="user-option-wrapper mr-4 p-2">
																										<li><a href="{{ route('profil.index') }}">{{ auth()->user()->nama }}</a></li>
																										<li><a href="{{ route('profil.index') }}">Edit Profil</a></li>
																										<li class="px-2">

																												<form action="{{ route('login.destroy') }}" method="POST">
																														@csrf
																														@method('DELETE')

																														<button type="submit" class="btn btn-block btn-basic"
																																style="border-radius: 19px !important; color: white !important; font-weight: bold;">Logout</button>
																												</form>
																										</li>
																								</ul>
																						</li>
																				@else
																						<li class="login-btn-nav">
																								<a href="{{ route('login') }}"><button type="button"
																												class="btn btn-block bg-basic text-white"
																												style="padding-left: 2.5rem; padding-right: 2.5rem">
																												Masuk
																										</button></a>
																						</li>
																						<li class="login-btn-nav">
																								<a href="{{ route('register') }}">
																										<button type="button" class="btn btn-block btn-outline-dark"
																												style="padding-left: 2.5rem; padding-right: 2.5rem">
																												Daftar
																										</button>
																								</a>
																						</li>
																				@endif
																		</ul>
																</nav>
														</div>
												</div>
												<div class="icon-block">
														<div class="toggle-nav">
																<i class="fa fa-bars sidebar-bar"></i>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
				<div class="searchbar-input ajax-search the-basics">
						<div class="input-group bg-basic">
								<span class="input-group-text">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
												y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932"
												style="enable-background: new 0 0 28.931 28.932" xml:space="preserve">
												<g>
														<path
																d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z" />
												</g>
										</svg>
								</span>
								<input type="search" class="form-control typeahead" placeholder="Search a Product" />
								<span class="input-group-text close-searchbar">
										<svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg">
												<path
														d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
										</svg>
								</span>
						</div>
				</div>
		</div>
</header>
<!--header end-->
