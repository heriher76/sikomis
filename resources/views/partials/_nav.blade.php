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
				@guest
				<li class="visible-xs" style="display: none;"><a href="{{ url('login') }}">Login / Register</a></li>
				@else
				<li class="dropdown magz-dropdown visible-xs" style="display: none;"><a href="#">{{ \Auth::user()->name }} <i class="ion-ios-arrow-right"></i></a>
					<ul class="dropdown-menu">
						@if(\Auth::user()->roles[0]->name == 'admin')
						<li><a href="{{ url('admin') }}"><i class="icon ion-key"></i> Admin Dashboard</a></li>
						@endif
						<li><a href="{{ url('profile') }}"><i class="icon ion-person"></i> Profile</a></li>
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
				@endguest
				<hr></hr>
				<li class="visible-xs" style="display: none;"><a href="#" data-toggle="modal" data-target="#myModal"><div>Donasi Ke Komisariat? Klik</div></a></li>
				<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog" style="z-index: 9999999999999999 !important;">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Info Donasi</h4>
							</div>
							<div class="modal-body">
						        <p>Assalamualaikum wr wb. Untuk menunjang perkaderan, perjuangan dan membangun komisariat sains & teknologi, silahkan rakanda/ayunda dapat memberikan bantuan materil nya kepada:
									<b>
										<br> No Rek : {{ $donation->no_rek }}
										<br> A/n : {{ $donation->atas_nama }}
										<br> Bank : {{ $donation->bank }}
									</b><br>
									Terimakasih atas bantuan rakanda/ayunda, semoga menjadi berkah dan digantikan dengan yang lebih oleh Allah SWT. Jika berkenan, mohon konfirmasi melalui form berikut:
									<br><a href="https://forms.gle/4gkYpFuuXM4MhqSN9" style="color: green;" target="_blank">Klik Disini</a>
									<br><br>atau via Whatsapp pihak komisariat Sains & Teknologi ke:
									<b><br> {{ $donation->no_wa }} ({{ $donation->nama_wa }})</b>
									<br><a target="_blank" href="https://web.whatsapp.com/send?phone={{ $donation->no_wa }}&text=Assalamualaikum, saya ingin konfirmasi bahwa saya sudah TF kepada pihak komisariat sains teknologi, mohon dipergunakan untuk hal yang bermanfaat. Yakin Usaha Sampai." style="color: green;">Atau klik disini</a>
									<br><br>
									<b><i>Yakin Usaha Sampai!</i></b>
								</p>
						      </div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
			</ul>
		</div>
	</div>
</nav>
