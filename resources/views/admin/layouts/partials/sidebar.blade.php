<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="index3.html" class="brand-link">
				<img src="/assets/images/logo/Logo-blimoto.webp" alt="Blimoto Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text font-weight-light">Admin</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel d-flex mb-3 mt-3 pb-3">
						<div class="image">
								<img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
								<a href="#" class="d-block">{{ Auth::guard('admin')->check() ? 'Administrator' : 'Sales' }}</a>
						</div>
				</div>

				<!-- SidebarSearch Form -->


				<!-- Sidebar Menu -->
				<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
								<!-- Add icons to the links using the .nav-icon class
															with font-awesome or any other icon font library -->

								<li class="nav-item">
										<a href="{{ route('admin.dashboard.index') }}"
												class="nav-link {{ \Route::is('admin.dashboard.*') ? 'active' : '' }}">
												<i class="nav-icon fas fa-tachometer-alt"></i>
												<p>
														Dashboard
														{{-- <span class="right badge badge-danger">New</span> --}}
												</p>
										</a>
								</li>

								@if (Auth::guard('admin')->check())
										<li class="nav-item">
												<a href="{{ route('admin.users.index') }}"
														class="nav-link {{ \Route::is('admin.users.*') ? 'active' : '' }}">
														<i class="nav-icon fa fa-user"></i>
														<p>
																Data User
														</p>
												</a>
										</li>
								@endif

								<li class="nav-item">
										<a href="{{ route('admin.company-profile.index') }}"
												class="nav-link {{ \Route::is('admin.company-profile.*') ? 'active' : '' }}">
												<i class="nav-icon fa fa-user-md"></i>
												<p>
														Company Profile
												</p>
										</a>
								</li>

				{{-- master motor --}}
				<li class="nav-item {{ \Route::is('admin.motor.*') || \Route::is('admin.detail-motor.*') || \Route::is('admin.best-motor.*') || \Route::is('admin.mtr-best-motor.*') || \Route::is('admin.type-motor.*') || \Route::is('admin.merk-motor.*') || \Route::is('admin.diskon-motor.*') || \Route::is('admin.brosur-motor.*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ \Route::is('admin.motor.*') || \Route::is('admin.detail-motor.*') || \Route::is('admin.best-motor.*') || \Route::is('admin.mtr-best-motor.*') || \Route::is('admin.type-motor.*') || \Route::is('admin.merk-motor.*') || \Route::is('admin.diskon-motor.*') || \Route::is('admin.brosur-motor.*') ? 'active' : '' }}">
						<i class="nav-icon fas fa-motorcycle"></i>
						<p>
							Master Motor
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.motor.index') }}" class="nav-link {{ \Route::is('admin.motor.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Tambah Motor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.detail-motor.index') }}" class="nav-link {{ \Route::is('admin.detail-motor.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Tambah Detail Motor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.best-motor.index') }}" class="nav-link {{ \Route::is('admin.best-motor.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Best Motor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.mtr-best-motor.index') }}" class="nav-link {{ \Route::is('admin.mtr-best-motor.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Kategori Best Motor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.type-motor.index') }}" class="nav-link {{ \Route::is('admin.type-motor.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Type Motor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.merk-motor.index') }}" class="nav-link {{ \Route::is('admin.merk-motor.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Merk Motor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.diskon-motor.index') }}" class="nav-link {{ \Route::is('admin.diskon-motor.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Diskon Motor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.brosur-motor.index') }}" class="nav-link {{ \Route::is('admin.brosur-motor.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Brosur Motor</p>
							</a>
						</li>
					</ul>
				</li>
				{{-- master kota --}}
				<li class="nav-item {{ \Route::is('admin.kota.*') || \Route::is('admin.kota-motor.*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ \Route::is('admin.kota.*') || \Route::is('admin.kota-motor.*') ? 'active' : '' }}">
						<i class="nav-icon fas fa-city"></i>
						<p>
							Master Kota
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.kota.index') }}" class="nav-link {{ \Route::is('admin.kota.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Tambah Kota</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.kota-motor.index') }}" class="nav-link {{ \Route::is('admin.kota-motor.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Tambah Motor Kota</p>
							</a>
						</li>
					</ul>
				</li>
				{{-- master sales --}}
				<li class="nav-item {{ \Route::is('admin.sales.*') || \Route::is('admin.penjualan.data.*') || \Route::is('admin.penjualan.hasil.*') || \Route::is('admin.penjualan.spk.*') || \Route::is('admin.pembayaran.*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ \Route::is('admin.sales.*') || \Route::is('admin.penjualan.data.*') || \Route::is('admin.penjualan.hasil.*') || \Route::is('admin.penjualan.spk.*') || \Route::is('admin.pembayaran.*')  ? 'active' : '' }}">
						<i class="nav-icon fas fa-city"></i>
						<p>
							Master Sales
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					@if (Auth::guard('admin')->check())
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.sales.index') }}" class="nav-link {{ \Route::is('admin.sales.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Tambah Akun Sales</p>
							</a>
						</li>
					</ul>
					@endif
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.penjualan.data.index') }}" class="nav-link {{ \Route::is('admin.penjualan.data.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Penjualan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.penjualan.hasil.index') }}" class="nav-link {{ \Route::is('admin.penjualan.hasil.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Master Hasil</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.pembayaran.index') }}" class="nav-link {{ \Route::is('admin.pembayaran.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>Pembayaran</p>
							</a>
						</li>
						<!-- <li class="nav-item">
							<a href="{{ route('admin.penjualan.spk.index') }}" class="nav-link {{ \Route::is('admin.penjualan.spk.*') ? 'active' : '' }}">
								<i class="far fa-circle nav-icon"></i>
								<p>SPK</p>
							</a>
						</li> -->
										</ul>
								</li>

								{{-- master price list --}}
								<li class="nav-item {{ \Route::is('admin.cicilan.*') ? 'menu-open' : '' }}">
										<a href="#" class="nav-link {{ \Route::is('admin.cicilan.*') ? 'active' : '' }}">
												<i class="nav-icon fas fa-money-bill" aria-hidden="true"></i>
												<p>
														Master Price List
														<i class="right fas fa-angle-left"></i>
												</p>
										</a>
										<ul class="nav nav-treeview">
												<li class="nav-item">
														<a href="{{ route('admin.cicilan.create') }}"
																class="nav-link {{ \Route::is('admin.cicilan.create') ? 'active' : '' }}">
																<i class="far fa-circle nav-icon"></i>
																<p>Tambah Price List</p>
														</a>
												</li>
												<li class="nav-item">
														<a href="{{ route('admin.cicilan.index') }}"
																class="nav-link {{ \Route::is('admin.cicilan.index') ? 'active' : '' }}">
																<i class="far fa-circle nav-icon"></i>
																<p>Data Price List</p>
														</a>
												</li>
										</ul>
								</li>

								{{-- master slik --}}
								<li
										class="nav-item {{ \Route::is('admin.slik-bi.*') || \Route::is('admin.type-slik-bi.*') || \Route::is('admin.status-bi.*') ? 'menu-open' : '' }}">
										<a href="#"
												class="nav-link {{ \Route::is('admin.slik-bi.*') || \Route::is('admin.type-slik-bi.*') || \Route::is('admin.status-bi.*') ? 'active' : '' }}">
												<i class="nav-icon fa fa-id-card" aria-hidden="true"></i>
												<p>
														Master Slik
														<i class="right fas fa-angle-left"></i>
												</p>
										</a>
										<ul class="nav nav-treeview">
												<li class="nav-item">
														<a href="{{ route('admin.slik-bi.index') }}"
																class="nav-link {{ \Route::is('admin.slik-bi.*') ? 'active' : '' }}">
																<i class="far fa-circle nav-icon"></i>
																<p>Data Cek Slik BI</p>
														</a>
												</li>
												<li class="nav-item">
														<a href="{{ route('admin.type-slik-bi.index') }}"
																class="nav-link {{ \Route::is('admin.type-slik-bi.*') ? 'active' : '' }}">
																<i class="far fa-circle nav-icon"></i>
																<p>Data Type Slik BI</p>
														</a>
												</li>
												<li class="nav-item">
														<a href="{{ route('admin.status-bi.index') }}"
																class="nav-link {{ \Route::is('admin.status-bi.*') ? 'active' : '' }}">
																<i class="far fa-circle nav-icon"></i>
																<p>Status BI</p>
														</a>
												</li>
										</ul>
								</li>

								<li class="nav-item">
										<a href="{{ route('admin.blog.index') }}"
												class="nav-link {{ \Route::is('admin.blog.*') ? 'active' : '' }}">
												<i class="nav-icon fas fa-newspaper"></i>
												<p>
														Data Postingan
												</p>
										</a>
								</li>

								<li class="nav-item">
										<a href="{{ route('admin.hook.index') }}"
												class="nav-link {{ \Route::is('admin.hook.*') ? 'active' : '' }}">
												<i class="nav-icon fas fa-images"></i>
												<p>
														Data Hook
												</p>
										</a>
								</li>
								<li class="nav-item">
										<a href="{{ route('admin.leasing-motor.index') }}"
												class="nav-link {{ \Route::is('admin.leasing-motor.*') ? 'active' : '' }}">
												<i class="nav-icon fas fa-building"></i>
												<p>
														Data Leasing
												</p>
										</a>
								</li>
								<li class="nav-item">
										<a href="{{ route('admin.dealer-motor.index') }}"
												class="nav-link {{ \Route::is('admin.dealer-motor.*') ? 'active' : '' }}">
												<i class="nav-icon fa fa-industry" aria-hidden="true"></i>
												<p>
														Data Dealer
												</p>
										</a>
								</li>
								<li class="nav-item">
										<a href="{{ route('admin.mitra.index') }}"
												class="nav-link {{ \Route::is('admin.mitra.*') ? 'active' : '' }}">
												<i class="nav-icon fas fa-users"></i>
												<p>
														Data Mitra
												</p>
										</a>
								</li>
								<li class="nav-item">
										<a href="{{ route('admin.event.index') }}"
												class="nav-link {{ \Route::is('admin.event.*') ? 'active' : '' }}">
												<i class="nav-icon fa fa-bullseye"></i>
												<p>
														Data Event
												</p>
										</a>
								</li>

								<li class="nav-item">
										<a href="{{ route('admin.promo.index') }}"
												class="nav-link {{ \Route::is('admin.promo.*') ? 'active' : '' }}">
												<i class="nav-icon fa fa-bell"></i>
												<p>
														Data Promo
												</p>
										</a>
								</li>
								<li class="nav-item">
										<a href="{{ route('admin.pembayaran.index') }}"
												class="nav-link {{ \Route::is('admin.pembayaran.*') ? 'active' : '' }}">
												<i class="nav-icon fa fa-bell"></i>
												<p>
														Data Pembayaran
												</p>
										</a>
								</li>

								{{-- <li class="nav-item">
					<a href="{{ route('admin.promo.index') }}" class="nav-link {{ \Route::is('admin.promo.*') ? 'active' : '' }}">
				<i class="nav-icon fa fa-bell"></i>
				<p>
					Data Promo
				</p>
				</a>
				</li> --}}
								<li class="nav-item">
										<a href="{{ route('admin.logout') }}" class="nav-link">
												<i class="nav-icon fas fa-sign-out-alt"></i>
												<p>
														Logout
												</p>
										</a>
								</li>
								<li class="nav-item">
										<a href="#" class="nav-link">
												<i class="nav-icon fas fa-th"></i>
												<p>
														Sample
														<span class="right badge badge-danger">New</span>
												</p>
										</a>
								</li>
						</ul>
				</nav>
				<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
</aside>
