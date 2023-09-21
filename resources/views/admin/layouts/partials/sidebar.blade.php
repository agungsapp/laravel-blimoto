<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar user panel (optional) -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Administrator</p>
				<!-- Status -->
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- /.search form -->

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">HEADER</li>
			<!-- Optionally, you can add icons to the links -->
			<li class="active">
				<a href="{{ route('admin.dashboard.index') }}">
					<i class="fa fa-tachometer"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-link"></i>
					<span>Motor</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="treeview">
						<a href="#">
							<i class="fa fa-link"></i>
							<span>Data Motor</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="{{ route('admin.motor.index') }}">
									<i class="fa fa-motorcycle"></i>
									<span>Tambah Motor</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{ route('admin.best-motor.index') }}">
							<i class="fa fa-motorcycle"></i>
							<span>Best Motor</span>
						</a>
					</li>
					<li>
						<a href="{{ route('admin.type-motor.index') }}">
							<i class="fa fa-motorcycle"></i>
							<span>Data Type Motor</span>
						</a>
					</li>
					<li>
						<a href="{{ route('admin.merk-motor.index') }}">
							<i class="fa fa-motorcycle"></i>
							<span>Data Merk Motor</span>
						</a>
					</li>
					<li>
						<a href="">
							<i class="fa fa-motorcycle"></i>
							<span>Data Hook</span>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="{{ route('admin.kota.index') }}">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<span>Data Kota</span>
				</a>
			</li>
		</ul>
		<!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>