<li class="nav-item dropdown">
		<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-bell"></i>
				<span class="badge badge-info navbar-badge">{{ $total }}</span>
		</a>
		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">{{ $total }} Notifikasi</span>
				@if ($pengajuans->count() > 0)
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
								<i class="fa fa-key" aria-hidden="true"></i> {{ $pengajuans->count() }} permintaan akses edit data DO
								<span class="text-muted float-right text-sm">{{ $pengajuans[0]->created_at->diffForHumans() }}</span>
						</a>
				@endif




				{{-- <div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
						<i class="fas fa-envelope mr-2"></i> 4 new messages
						<span class="text-muted float-right text-sm">3 mins</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
						<i class="fas fa-file mr-2"></i> 3 new reports
						<span class="text-muted float-right text-sm">2 days</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
		</div>
</li>
