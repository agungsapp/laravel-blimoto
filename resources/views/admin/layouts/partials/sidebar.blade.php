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
								<a href="#" class="d-block">Administrator</a>
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

								<li class="nav-item menu-open">
										<a href="" class="nav-link">
												<i class="nav-icon fas fa-motorcycle"></i>
												<p>
														Master Motor
														<i class="right fas fa-angle-left"></i>
												</p>
										</a>
										<ul class="nav nav-treeview">
												<li class="nav-item">
														<a href="{{ route('admin.motor.index') }}"
																class="nav-link {{ \Route::is('admin.motor.*') ? 'active' : '' }}">
																<i class="far fa-circle nav-icon"></i>
																<p>Tambah Motor</p>
														</a>
												</li>
												<li class="nav-item">
														<a href="{{ route('admin.detail-motor.index') }}"
																class="nav-link {{ \Route::is('admin.detail-motor.*') ? 'active' : '' }}">
																<i class="far fa-circle nav-icon"></i>
																<p>Tambah Detail Motor</p>
														</a>
												</li>
												<li class="nav-item">
														<a href="{{ route('admin.best-motor.index') }}"
																class="nav-link {{ \Route::is('admin.best-motor.*') ? 'active' : '' }}">
																<i class="far fa-circle nav-icon"></i>
																<p>Best Motor</p>
														</a>
												</li>
												<li class="nav-item">
														<a href="{{ route('admin.type-motor.index') }}"
																class="nav-link {{ \Route::is('admin.type-motor.*') ? 'active' : '' }}">
																<i class="far fa-circle nav-icon"></i>
																<p>Data Type Motor</p>
														</a>
												</li>
												<li class="nav-item">
														<a href="{{ route('admin.merk-motor.index') }}"
																class="nav-link {{ \Route::is('admin.merk-motor.*') ? 'active' : '' }}">
																<i class="far fa-circle nav-icon"></i>
																<p>Data Merk Motor</p>
														</a>
												</li>
												<li class="nav-item">
														<a href="{{ route('admin.brosur-motor.index') }}"
																class="nav-link {{ \Route::is('admin.brosur-motor.*') ? 'active' : '' }}">
																<i class="far fa-circle nav-icon"></i>
																<p>Data Brosur Motor</p>
														</a>
												</li>
										</ul>
								</li>
								<li class="nav-item">
										<a href="{{ route('admin.kota.index') }}" class="nav-link {{ \Route::is('admin.kota.*') ? 'active' : '' }}">
												<i class="nav-icon fas fa-city"></i>
												<p>
														Data Kota
												</p>
										</a>
								</li>
								<li class="nav-item">
										<a href="{{ route('admin.hook.index') }}" class="nav-link {{ \Route::is('admin.hook.*') ? 'active' : '' }}">
												<i class="nav-icon fas fa-images"></i>
												<p>
														Data Hook
												</p>
										</a>
								</li>
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
