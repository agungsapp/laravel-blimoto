<nav class="navbar navbar-static-top" role="navigation">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a>
	<!-- Navbar Right Menu -->
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">

			<!-- User Account Menu -->
			<li class="dropdown user user-menu">
				<!-- Menu Toggle Button -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<!-- The user image in the navbar-->
					<img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
					<!-- hidden-xs hides the username on small devices so only the image appears. -->
					<span class="hidden-xs">Administrator</span>
				</a>
				<ul class="dropdown-menu">
					<!-- The user image in the menu -->
					<li class="user-header">
						<img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

						<p>
							Admin | BliMoto.com
							{{-- <small>Member since Nov. 2012</small> --}}
						</p>
					</li>
					<!-- Menu Footer-->
					<li class="user-footer">
						{{-- <div class="pull-left">
														<a href="#" class="btn btn-default btn-flat">Profile</a>
												</div> --}}
						<form action="{{route('admin.logout')}}" method="post">
							@method('POST') @csrf
							<div class="pull-right">
								<button type="submit">
									<a class="btn btn-danger btn-flat">Sign out</a>
								</button>
							</div>
						</form>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>