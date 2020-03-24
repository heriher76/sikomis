<nav class="menu">
	<div class="container">
		<div class="brand">
			<a href="#">
				<img src="{{ url('images/logo_komisariat.png') }}" alt="Komisariat Logo">
			</a>
		</div>
		<div class="mobile-toggle">
			<a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
		</div>
		<div class="mobile-toggle">
			<a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
		</div>
		<div id="menu-list">
			<ul class="nav-list">
				<li><a href="{{ url('/') }}">Beranda</a></li>
				<li><a href="{{ url('organizations') }}">Kabinet</a></li>
				<li><a href="{{ url('news-schedule') }}">Berita & Agenda</a></li>
				<li><a href="{{ url('articles') }}">Artikel</a></li>
				<li><a href="{{ url('activities') }}">Aktifitas</a></li>
				<li><a href="javascript:void(0);" onclick="return alert('Coming Soon');">KomiShop</a></li>
				<li><a href="javascript:void(0);" onclick="return alert('Coming Soon');">Karir</a></li>
				<li class="dropdown magz-dropdown" ><a href="#">{{ \Auth::user()->name }} <i class="ion-ios-arrow-right"></i></a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon ion-person"></i> Profile</a></li>
						<li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="icon ion-log-out"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
					</ul>
				</li>
				<hr></hr>
				<li class="visible-xs visible-sm" style="display: none;"><a href="register.html"><div>Donasi Ke Komisariat? Klik</div></a></li>
			</ul>
		</div>
	</div>
</nav>