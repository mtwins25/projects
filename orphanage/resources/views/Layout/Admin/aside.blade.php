<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >

				<div class="">
					<div class="main-menu-header">
						<div class="user-details">
							<span>{{ Auth::user()->Aaccount->A_name }}</span>
                            @auth
							<div id="more-details">{{ Auth::user()->email }}<i class="fa fa-chevron-down m-l-5"></i></div>
                            @endauth
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="{{ route('logout') }}"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>

				<ul class="nav pcoded-inner-navbar ">

					<li class="nav-item">
					    <a href="{{route('admin')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>



					<li class="nav-item pcoded-menu-caption">
					    <label>Orphanage Data </label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">supervisors</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{route('supervisors.index')}}" target="_self">All supervisors</a></li>
							<li><a href="{{route('supervisors.create')}}" target="_self">Add supervisor</a></li>
                            <li><a href="{{route('supervises.index')}}" target="_self">supervisions</a></li>
						</ul>
					</li>

					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Children</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{route('children.index')}}" target="_self">All Children</a></li>
							<li><a href="{{route('children.create')}}" target="_self">Add Child</a></li>
						</ul>
					</li>
                    <li class="nav-item pcoded-hasmenu">
						<a href="{{route('Aparents.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Parents</span></a>

					</li>
                    <li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">visits</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('visits.index')}}" target="_self">requested visits</a></li>
                            <li><a href="{{route('ACVisitors')}}" target="_self">confirmed visits</a></li>
                        </ul>
					</li>
						<!-- <ul class="pcoded-submenu">
							<li><a href="#" target="_self">All Visitors Requests</a></li>
							<li><a href="#" target="_self">Add Visitors Requests</a></li>
						</ul> -->



					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Adoption</span></a>
						 <ul class="pcoded-submenu">
							<li><a href="{{route('adoptions.index')}}" target="_self"> Adopted</a></li>
							<li><a href="{{route('adoptions.create')}}" target="_self">make Adoption</a></li>
						</ul>
					</li>



				</ul>


			</div>
		</div>
	</nav>
