<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="index3.html" class="brand-link">
				<img src="/assets/images/logo/Logo Blimoto White_.png" alt="Blimoto Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text font-weight-light">Admin</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
				<div class="user-panel d-flex mb-3 mt-3 pb-3">
						<div class="image">
								<img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
								@php
										$role = '';
										$guards = [
										    'admin' => 'Administrator',
										    'ceo' => 'CEO',
										    'sales' => 'Sales',
										    'manager' => 'Manager',
										    'area_manager' => 'Area Manager',
										];
										foreach ($guards as $guard => $roleName) {
										    if (Auth::guard($guard)->check()) {
										        $role = $roleName;
										        break;
										    }
										}
								@endphp
								<a href="#" class="d-block">{{ $role }}</a>
						</div>
				</div>

				@php
						$role = null;
						$guards = ['admin', 'manager', 'area_manager'];
						foreach ($guards as $guard) {
						    if (Auth::guard($guard)->check()) {
						        $role = $guard;
						        break;
						    }
						}
						$isCeo = Auth::guard('ceo')->check();
						$isSales = Auth::guard('sales')->check();
				@endphp
				<!-- Sidebar Menu -->
				<nav class="mt-2">
						@if ($role)
								<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

										<li class="nav-item">
												<a href="{{ route('admin.dashboard.index') }}"
														class="nav-link {{ \Route::is('admin.dashboard.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-tachometer-alt"></i>
														<p>
																Dashboard
														</p>
												</a>
										</li>

										<li class="nav-item">
												<a href="{{ route('admin.users.index') }}"
														class="nav-link {{ \Route::is('admin.users.*') ? 'active' : '' }}">
														<i class="nav-icon fa fa-user"></i>
														<p>
																Data User
														</p>
												</a>
										</li>

										<li class="nav-item">
												<a href="{{ route('admin.ceo.index') }}" class="nav-link {{ \Route::is('admin.ceo.*') ? 'active' : '' }}">
														<i class="nav-icon fa fa-user"></i>
														<p>
																Data Ceo
														</p>
												</a>
										</li>

										<li class="nav-item">
												<a href="{{ route('admin.manager.index') }}"
														class="nav-link {{ \Route::is('admin.manager.*') ? 'active' : '' }}">
														<i class="nav-icon fa fa-user"></i>
														<p>
																Data Manager
														</p>
												</a>
										</li>

										<li class="nav-item">
												<a href="{{ route('admin.area-manager.index') }}"
														class="nav-link {{ \Route::is('admin.area-manager.*') ? 'active' : '' }}">
														<i class="nav-icon fa fa-user"></i>
														<p>
																Data Area Manager
														</p>
												</a>
										</li>

										{{-- master sales --}}
										<li class="nav-item {{ \Route::is('admin.sales.*') ? 'menu-open' : '' }}">
												<a href="#" class="nav-link {{ \Route::is('admin.sales.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-users"></i>
														<p>
																Master Sales
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.sales.index') }}"
																		class="nav-link {{ \Route::is('admin.sales.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Akun Sales</p>
																</a>
														</li>
												</ul>

										</li>

										<li class="nav-item">
												<a href="{{ route('admin.company-profile.index') }}"
														class="nav-link {{ \Route::is('app.peserta.*') ? 'active' : '' }}">
														<i class="nav-icon fa fa-user-md"></i>
														<p>
																Company Profile
														</p>
												</a>
										</li>


										{{-- master color --}}
										{{-- <li class="nav-item {{ \Route::is('admin.color.color.*') ? 'menu-open' : '' }}">
												<a href="#" class="nav-link {{ \Route::is('admin.color.color.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-podcast"></i>
														<p>
																Master Warna
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.color.color.index') }}"
																		class="nav-link {{ \Route::is('admin.color.color.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Tambah Data Warna</p>
																</a>
														</li>
																</ul>
										</li> --}}



										{{-- master motor --}}
										<li
												class="nav-item {{ \Route::is('admin.motor.*') || \Route::is('admin.detail-motor.*') || \Route::is('admin.warna-motor.*') || \Route::is('admin.best-motor.*') || \Route::is('admin.mtr-best-motor.*') || \Route::is('admin.type-motor.*') || \Route::is('admin.merk-motor.*') || \Route::is('admin.diskon-motor.*') || \Route::is('admin.brosur-motor.*') || \Route::is('admin.color.color.*') ? 'menu-open' : '' }}">
												<a href="#"
														class="nav-link {{ \Route::is('admin.motor.*') || \Route::is('admin.detail-motor.*') || \Route::is('admin.warna-motor.*') || \Route::is('admin.best-motor.*') || \Route::is('admin.mtr-best-motor.*') || \Route::is('admin.type-motor.*') || \Route::is('admin.merk-motor.*') || \Route::is('admin.diskon-motor.*') || \Route::is('admin.brosur-motor.*') || \Route::is('admin.color.color.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-motorcycle"></i>
														<p>
																Master Motor
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														{{-- tambah data motor --}}
														<li class="nav-item">
																<a href="{{ route('admin.motor.create') }}"
																		class="nav-link {{ \Route::is('admin.motor.create') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Tambah Motor</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.motor.index') }}"
																		class="nav-link {{ \Route::is('admin.motor.*') && !\Route::is('admin.motor.create') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Motor</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.detail-motor.index') }}"
																		class="nav-link {{ \Route::is('admin.detail-motor.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Tambah Detail Motor</p>
																</a>
														</li>

														{{-- colapse data warana --}}
														<li
																class="nav-item {{ \Route::is('admin.sales.*') || \Route::is('admin.warna-motor.*') || \Route::is('admin.color.color.*') ? 'menu-open' : '' }}">
																<a href="#"
																		class="nav-link {{ \Route::is('admin.sales.*') || \Route::is('admin.warna-motor.*') || \Route::is('admin.color.color.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>
																				Data Warna
																				<i class="right fas fa-angle-left"></i>
																		</p>
																</a>
																<ul class="nav nav-treeview">
																		{{-- tambah data warna --}}
																		<li class="nav-item">
																				<a href="{{ route('admin.color.color.index') }}"
																						class="nav-link {{ \Route::is('admin.color.color.*') ? 'active' : '' }}">
																						<i class="far fa-circle nav-icon"></i>
																						<p>Tambah Data Warna</p>
																				</a>
																		</li>
																		{{-- tambah warna motor --}}
																		<li class="nav-item">
																				<a href="{{ route('admin.warna-motor.index') }}"
																						class="nav-link {{ \Route::is('admin.warna-motor.*') ? 'active' : '' }}">
																						<i class="far fa-circle nav-icon"></i>
																						<p>Tambah Warna Motor</p>
																				</a>
																		</li>


																</ul>
														</li>
														{{-- end collapse data warna --}}


														<li class="nav-item">
																<a href="{{ route('admin.best-motor.index') }}"
																		class="nav-link {{ \Route::is('admin.best-motor.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Best Motor</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.mtr-best-motor.index') }}"
																		class="nav-link {{ \Route::is('admin.mtr-best-motor.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Kategori Best Motor</p>
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
																<a href="{{ route('admin.diskon-motor.index') }}"
																		class="nav-link {{ \Route::is('admin.diskon-motor.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Diskon Motor</p>
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

										{{-- master kota --}}
										<li
												class="nav-item {{ \Route::is('admin.kota.*') || \Route::is('admin.kota-motor.*') ? 'menu-open' : '' }}">
												<a href="#"
														class="nav-link {{ \Route::is('admin.kota.*') || \Route::is('admin.kota-motor.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-city"></i>
														<p>
																Master Kota
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.kota.index') }}"
																		class="nav-link {{ \Route::is('admin.kota.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Tambah Kota</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.kota-motor.index') }}"
																		class="nav-link {{ \Route::is('admin.kota-motor.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Tambah Motor Kota</p>
																</a>
														</li>
												</ul>
										</li>

										{{-- master penjualan --}}
										<li
												class="nav-item {{ \Route::is('admin.penjualan.data.*') ||
												\Route::is('admin.penjualan.hasil.*') ||
												\Route::is('admin.penjualan.proses.*') ||
												\Route::is('admin.penjualan.acc.*') ||
												\Route::is('admin.penjualan.riject.*') ||
												\Route::is('admin.penjualan.do.*') ||
												\Route::is('admin.penjualan.cancel.*')
												    ? 'menu-open'
												    : '' }}">
												<a href="#"
														class="nav-link {{ \Route::is('admin.penjualan.data.*') ||
														\Route::is('admin.penjualan.hasil.*') ||
														\Route::is('admin.penjualan.proses.*') ||
														\Route::is('admin.penjualan.acc.*') ||
														\Route::is('admin.penjualan.riject.*') ||
														\Route::is('admin.penjualan.do.*') ||
														\Route::is('admin.penjualan.cancel.*')
														    ? 'active'
														    : '' }}">
														<i class="nav-icon fas fa-users"></i>
														<p>
																Master Penjualan
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.hasil.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.hasil.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Master Hasil</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.data.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.data.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Input Data Penjualan</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.proses.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.proses.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Proses</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.acc.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.acc.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Acc</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.riject.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.riject.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Riject</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.do.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.do.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Do</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.cancel.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.cancel.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Cancel</p>
																</a>
														</li>
												</ul>
										</li>

										{{-- master pembayaran --}}
										<li
												class="nav-item {{ \Route::is('admin.sudah-bayar') || \Route::is('admin.belum-bayar') || \Route::is('admin.sudah-bayartj') ? 'menu-open' : '' }}">
												<a href="#"
														class="nav-link {{ \Route::is('admin.sudah-bayar') || \Route::is('admin.belum-bayar') || \Route::is('admin.sudah-bayartj') ? 'active' : '' }}">
														<i class="nav-icon fas fa-archive"></i>
														<p>
																Data Pembayaran
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.belum-bayar') }}"
																		class="nav-link {{ \Route::is('admin.belum-bayar') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Belum Bayar</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.sudah-bayartj') }}"
																		class="nav-link {{ \Route::is('admin.sudah-bayartj') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Sudah Bayar Tanda Jadi</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.sudah-bayar') }}"
																		class="nav-link {{ \Route::is('admin.sudah-bayar') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Sudah Lunas</p>
																</a>
														</li>
												</ul>
										</li>

										{{-- data refund --}}
										<li class="nav-item {{ \Route::is('admin.refund.*') ? 'menu-open' : '' }}">
												<a href="#" class="nav-link {{ \Route::is('admin.refund.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-money-bill"></i>
														<p>
																Data Refund
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.refund.manual-refund.index') }}"
																		class="nav-link {{ \Route::is('admin.refund.manual-refund.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Pengajuan Refund</p>
																</a>
														</li>
												</ul>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.refund.status.index') }}"
																		class="nav-link {{ \Route::is('admin.refund.status.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Status Refund</p>
																</a>
														</li>
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

										{{-- master laporan --}}
										<li class="nav-item {{ \Route::is('admin.laporan.*') ? 'menu-open' : '' }}">
												<a href="#" class="nav-link {{ \Route::is('admin.laporan.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-print"></i>
														<p>
																Master Laporan
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												{{-- <ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.laporan.penjualan-semua.index') }}"
																		class="nav-link {{ \Route::is('admin.laporan.penjualan-semua.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Semua Penjualan</p>
																</a>
														</li>
												</ul> --}}
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.laporan.penjualan-wilayah.index') }}"
																		class="nav-link {{ \Route::is('admin.laporan.penjualan-wilayah.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Semua Penjualan</p>
																</a>
														</li>
												</ul>
										</li>
										{{-- master laporan end --}}

										{{-- master tagihan --}}
										<li class="nav-item {{ \Route::is('admin.laporan-tagihan.*') ? 'menu-open' : '' }}">
												<a href="#" class="nav-link {{ \Route::is('admin.laporan-tagihan.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-print"></i>
														<p>
																Master Tagihan
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.laporan-tagihan.belum-bayar.index') }}"
																		class="nav-link {{ \Route::is('admin.laporan-tagihan.belum-bayar.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Tagihan belum di bayar</p>
																</a>
														</li>
												</ul>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.laporan-tagihan.sudah-bayar.index') }}"
																		class="nav-link {{ \Route::is('admin.laporan-tagihan.sudah-bayar.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Tagihan sudah di bayar</p>
																</a>
														</li>
												</ul>
										</li>
										{{-- master tagihan end --}}


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


										@if (Auth::guard('admin')->check())
												<li class="nav-item">
														<a href="{{ route('admin.artisan.index') }}"
																class="nav-link {{ \Route::is('admin.artisan.*') ? 'active' : '' }}">
																<i class="fa fa-cogs nav-icon" aria-hidden="true"></i>
																<p>
																		Artisan Command
																</p>
														</a>
												</li>
										@endif

										<li class="nav-item">
												<a href="{{ route('admin.logout') }}" class="nav-link">
														<i class="nav-icon fas fa-sign-out-alt"></i>
														<p>
																Logout
														</p>
												</a>
										</li>

								</ul>
						@elseif($isCeo)
								{{-- ceo akses --}}
								<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
										data-accordion="false">


										<li class="nav-item">
												<a href="{{ route('admin.dashboard.index') }}"
														class="nav-link {{ \Route::is('admin.dashboard.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-tachometer-alt"></i>
														<p>
																Dashboard
														</p>
												</a>
										</li>

										{{-- master sales ceo --}}

										{{-- <li class="nav-item {{ \Route::is('admin.sales.*') ? 'menu-open' : '' }}">
												<a href="#" class="nav-link {{ \Route::is('admin.sales.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-users"></i>
														<p>
																Master Sales
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.sales.index') }}"
																		class="nav-link {{ \Route::is('admin.sales.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Akun Sales</p>
																</a>
														</li>
												</ul>
										</li> --}}

										{{-- refund dana ceo --}}
										<li class="nav-item {{ \Route::is('admin.refund.*') ? 'menu-open' : '' }}">
												<a href="#" class="nav-link {{ \Route::is('admin.refund.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-users"></i>
														<p>
																Refund Dana
																<i class="right fas fa-angle-left"></i>
																{{-- <span class="right badge badge-danger"></span> --}}

														</p>
												</a>

												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.refund.pengajuan-refund.index') }}"
																		class="nav-link {{ \Route::is('admin.refund.pengajuan-refund.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Pengajuan Refund</p>
																</a>
														</li>
												</ul>
										</li>
										<li
												class="nav-item {{ \Route::is('admin.pengajuan.*') || \Route::is('admin.pengajuan.hak-akses.disetujui') || \Route::is('admin.pengajuan.hak-akses.ditolak') || \Route::is('admin.pengajuan.hak-akses.done') ? 'menu-open' : '' }}">
												<a href="#"
														class="nav-link {{ \Route::is('admin.pengajuan.*') || \Route::is('admin.pengajuan.hak-akses.disetujui') || \Route::is('admin.pengajuan.hak-akses.ditolak') || \Route::is('admin.pengajuan.hak-akses.done') ? 'active' : '' }}">
														<i class="nav-icon fas fa-users"></i>
														<p>
																Hak Akses
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>

												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.pengajuan.hak-akses.index') }}"
																		class="nav-link {{ \Route::is('admin.pengajuan.hak-akses.index') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Pengajuan</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.pengajuan.hak-akses.done') }}"
																		class="nav-link {{ \Route::is('admin.pengajuan.hak-akses.done') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Selesai Edit</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.pengajuan.hak-akses.disetujui') }}"
																		class="nav-link {{ \Route::is('admin.pengajuan.hak-akses.disetujui') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Di Setujui</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.pengajuan.hak-akses.ditolak') }}"
																		class="nav-link {{ \Route::is('admin.pengajuan.hak-akses.ditolak') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Di Tolak</p>
																</a>
														</li>

												</ul>
										</li>

										{{-- master laporan ceo --}}
										<li class="nav-item {{ \Route::is('admin.laporan.*') ? 'menu-open' : '' }}">
												<a href="#" class="nav-link {{ \Route::is('admin.laporan.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-print"></i>
														<p>
																Master Laporan
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.laporan.penjualan-wilayah.index') }}"
																		class="nav-link {{ \Route::is('admin.laporan.penjualan-wilayah.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Penjualan Wilayah</p>
																</a>
														</li>
												</ul>
										</li>



										{{-- master tagihan --}}
										<li class="nav-item {{ \Route::is('admin.laporan-tagihan.*') ? 'menu-open' : '' }}">
												<a href="#" class="nav-link {{ \Route::is('admin.laporan-tagihan.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-print"></i>
														<p>
																Master Tagihan
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.laporan-tagihan.belum-bayar.index') }}"
																		class="nav-link {{ \Route::is('admin.laporan-tagihan.belum-bayar.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Tagihan belum di bayar</p>
																</a>
														</li>
												</ul>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.laporan-tagihan.sudah-bayar.index') }}"
																		class="nav-link {{ \Route::is('admin.laporan-tagihan.sudah-bayar.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Tagihan sudah di bayar</p>
																</a>
														</li>
												</ul>
										</li>
										{{-- master tagihan end --}}


										<li class="nav-item">
												<a href="{{ route('admin.logout') }}" class="nav-link">
														<i class="nav-icon fas fa-sign-out-alt"></i>
														<p>
																Logout
														</p>
												</a>
										</li>

								</ul>
						@elseif ($isSales)
								{{-- master sales --}}
								<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
										data-accordion="false">
										{{-- master penjualan --}}
										<li
												class="nav-item {{ \Route::is('admin.penjualan.data.*') ||
												\Route::is('admin.penjualan.hasil.*') ||
												\Route::is('admin.penjualan.proses.*') ||
												\Route::is('admin.penjualan.acc.*') ||
												\Route::is('admin.penjualan.riject.*') ||
												\Route::is('admin.penjualan.do.*') ||
												\Route::is('admin.penjualan.cancel.*')
												    ? 'menu-open'
												    : '' }}">
												<a href="#"
														class="nav-link {{ \Route::is('admin.penjualan.data.*') ||
														\Route::is('admin.penjualan.hasil.*') ||
														\Route::is('admin.penjualan.proses.*') ||
														\Route::is('admin.penjualan.acc.*') ||
														\Route::is('admin.penjualan.riject.*') ||
														\Route::is('admin.penjualan.do.*') ||
														\Route::is('admin.penjualan.cancel.*')
														    ? 'active'
														    : '' }}">
														<i class="nav-icon fas fa-users"></i>
														<p>
																Master Penjualan
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">

														<li class="nav-item">
																<a href="{{ route('admin.penjualan.data.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.data.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Input Data Penjualan</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.proses.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.proses.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Proses</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.acc.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.acc.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Acc</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.riject.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.riject.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Riject</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.do.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.do.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Do</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.penjualan.cancel.index') }}"
																		class="nav-link {{ \Route::is('admin.penjualan.cancel.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Data Cancel</p>
																</a>
														</li>
												</ul>
										</li>

										{{-- master pembayaran sales --}}
										<li
												class="nav-item {{ \Route::is('admin.sudah-bayar') || \Route::is('admin.belum-bayar') || \Route::is('admin.sudah-bayartj') ? 'menu-open' : '' }}">
												<a href="#"
														class="nav-link {{ \Route::is('admin.sudah-bayar') || \Route::is('admin.belum-bayar') || \Route::is('admin.sudah-bayartj') ? 'active' : '' }}">
														<i class="nav-icon fas fa-archive"></i>
														<p>
																Data Pembayaran
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.belum-bayar') }}"
																		class="nav-link {{ \Route::is('admin.belum-bayar') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Belum Bayar</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.sudah-bayartj') }}"
																		class="nav-link {{ \Route::is('admin.sudah-bayartj') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Sudah Bayar Tanda Jadi</p>
																</a>
														</li>
														<li class="nav-item">
																<a href="{{ route('admin.sudah-bayar') }}"
																		class="nav-link {{ \Route::is('admin.sudah-bayar') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Sudah Bayar</p>
																</a>
														</li>
												</ul>
										</li>

										{{-- data refund sales --}}
										<li class="nav-item {{ \Route::is('admin.refund.*') ? 'menu-open' : '' }}">
												<a href="#" class="nav-link {{ \Route::is('admin.refund.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-money-bill"></i>
														<p>
																Data Refund
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.refund.manual-refund.index') }}"
																		class="nav-link {{ \Route::is('admin.refund.manual-refund.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Pengajuan Refund</p>
																</a>
														</li>
												</ul>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.refund.status.index') }}"
																		class="nav-link {{ \Route::is('admin.refund.status.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Status Refund</p>
																</a>
														</li>
												</ul>
										</li>

										{{-- master laporan sales --}}
										<li class="nav-item {{ \Route::is('admin.laporan.*') ? 'menu-open' : '' }}">
												<a href="#" class="nav-link {{ \Route::is('admin.laporan.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-print"></i>
														<p>
																Master Laporan
																<i class="right fas fa-angle-left"></i>
														</p>
												</a>
												<ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.laporan.penjualan-semua.index') }}"
																		class="nav-link {{ \Route::is('admin.laporan.penjualan-semua.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Semua Penjualan</p>
																</a>
														</li>
												</ul>
												{{-- <ul class="nav nav-treeview">
														<li class="nav-item">
																<a href="{{ route('admin.laporan.penjualan-wilayah.index') }}"
																		class="nav-link {{ \Route::is('admin.laporan.penjualan-wilayah.*') ? 'active' : '' }}">
																		<i class="far fa-circle nav-icon"></i>
																		<p>Penjualan Wilayah</p>
																</a>
														</li>
												</ul> --}}
										</li>
										{{-- master laporan end --}}

										<li class="nav-item">
												<a href="{{ route('admin.sales-settings.index') }}"
														class="nav-link {{ \Route::is('admin.sales-settings.*') ? 'active' : '' }}">
														<i class="nav-icon fas fa-users"></i>
														<p>
																Setting Akun
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
								</ul>
						@endif
				</nav>
		</div>
</aside>
