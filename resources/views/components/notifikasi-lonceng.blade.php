<li class="nav-item dropdown">
		<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-bell"></i>
				<span class="badge badge-danger navbar-badge">{{ $total }}</span>
		</a>
		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">{{ $total }} Notifikasi</span>
				<div class="dropdown-divider"></div>
				@if ($akses->count() > 0)
						<a href="#" class="dropdown-item mb-3 py-3">
								<i class="fa fa-key" aria-hidden="true"></i> {{ $akses->count() }} meminta akses edit data DO
								<span class="text-muted float-right text-sm">{{ $akses[0]->created_at->diffForHumans() }}</span>
						</a>
				@endif
				@if ($refund->count() > 0)
						<div class="dropdown-divider mt-3"></div>
						<a href="#" class="dropdown-item py-3">
								<i class="fa fa-key" aria-hidden="true"></i> {{ $refund->count() }} meminta persetujuan refund
								<span class="text-muted float-right text-sm">{{ $refund[0]->created_at->diffForHumans() }}</span>
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
