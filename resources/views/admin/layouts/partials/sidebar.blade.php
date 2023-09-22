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
										<a href="{{ route('admin.dashboard.index') }}" class="nav-link active">
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
														<a href="{{ route('admin.motor.index') }}" class="nav-link">
																<i class="far fa-circle nav-icon"></i>
																<p>Tambah Motor</p>
														</a>
												</li>
												<li class="nav-item">
														<a href="{{ route('admin.best-motor.index') }}" class="nav-link">
																<i class="far fa-circle nav-icon"></i>
																<p>Best Motor</p>
														</a>
												</li>
												<li class="nav-item">
														<a href="{{ route('admin.type-motor.index') }}" class="nav-link">
																<i class="far fa-circle nav-icon"></i>
																<p>Data Type Motor</p>
														</a>
												</li>
												<li class="nav-item">
														<a href="{{ route('admin.merk-motor.index') }}" class="nav-link">
																<i class="far fa-circle nav-icon"></i>
																<p>Data Merk Motor</p>
														</a>
												</li>
										</ul>
								</li>
								<li class="nav-item">
										<a href="{{ route('admin.kota.index') }}" class="nav-link">
												<i class="nav-icon fas fa-city"></i>
												<p>
														Data Kota
												</p>
										</a>
								</li>
								<li class="nav-item">
										<a href="{{ route('admin.hook.index') }}" class="nav-link">
												<i class="nav-icon fas fa-images"></i>
												<p>
														Data Hook
												</p>
										</a>
								</li>
								<li id="btn-logout" class="nav-item">
										<a href="#" class="nav-link">
												<i class="nav-icon fas fa-th"></i>
												<p>
														Logout
														<span class="right badge badge-danger">New</span>
												</p>
										</a>
								</li>
								<li class="nav-item">
										<button type="button" data-toggle="modal" data-target="#exampleModal" class="nav-link">
												<i class="nav-icon fas fa-th"></i>
												<p>
														Logout modal
												</p>
										</button>
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


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
								...
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
						</div>
				</div>
		</div>
</div>
