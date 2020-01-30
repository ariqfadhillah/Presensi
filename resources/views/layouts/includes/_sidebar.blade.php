<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/dashboard" class="{{ (request()->is('dashboard*')) ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

						<li><a href="/presensi" class="{{ (request()->is('presensi*')) ? 'active' : '' }}"><i class="fa fa-download"></i> <span>Master Mesin</span></a></li>
						
						@if(auth()->user()->role == 'admin')
						<li><a href="/users" class="{{ (request()->is('users*')) ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Master User</span></a></li>
						@endif

						<li><a href="/rekap" class="{{ (request()->is('rekap*','detail*')) ? 'active' : '' }}"><i class="fa fa-shopping-cart"></i> <span> Presensi</span></a></li>
					</ul>
				</nav>
			</div>
		</div>