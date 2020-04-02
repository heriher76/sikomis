<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- Shareable -->
		<title>@yield('title')</title>
		<link rel="icon" href="{{ url('images/logo_hmi.png') }}" type="image/png">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{ url('front/scripts/bootstrap/bootstrap.min.css') }}">
		<!-- IonIcons -->
		<link rel="stylesheet" href="{{ url('front/scripts/ionicons/css/ionicons.min.css') }}">
		<!-- Toast -->
		<link rel="stylesheet" href="{{ url('front/scripts/toast/jquery.toast.min.css') }}">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="{{ url('front/scripts/owlcarousel/dist/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ url('front/scripts/owlcarousel/dist/assets/owl.theme.default.min.css') }}">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="{{ url('front/scripts/magnific-popup/dist/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ url('front/scripts/sweetalert/dist/sweetalert.css') }}">
		<!-- Custom style -->
		<link rel="stylesheet" href="{{ url('front/css/style.css') }}">
		<link rel="stylesheet" href="{{ url('front/css/skins/all.css') }}">
		<!-- <link rel="stylesheet" href="css/demo.css"> -->
		@yield('styles')
	</head>

	<body class="skin-orange">
		@yield('sweet-alert')
		<header class="primary">
			<div class="firstbar">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="brand">
								<a href="{{ url('/') }}">
										<img src="{{ url('images/logo_komisariat.png') }}" alt="Komisariat Logo" style=" display: none; margin-left: 37vw; margin-bottom: -40px !important; margin-top: -40px !important;" class="visible-md visible-lg">
										<img src="{{ url('images/logo_komisariat.png') }}" alt="Komisariat Logo" style="display: none; margin-left: 21vw; margin-bottom: -40px !important; margin-top: -40px !important;" class="visible-sm visible-xs">
								</a>
							</div>
						</div>
						<div style="position: absolute; top: 0;">
							<ul class="nav-icons">
								<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="ion-person-add"></i><div>Donasi Ke Komisariat? Klik</div></a></li>
							</ul>
							<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
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
						</div>

						<div style="position: absolute; float: right; top: 0; right: 100px;">
							<ul class="nav-icons">
								@guest
								<li><a href="{{ url('login') }}"><i class="ion-log-in"></i><div>Login / Register</div></a></li>
								@else
								<li class="dropdown">
										@if(Auth::user()->photoprofile == null)
										<img src="{{ url('photo-profile/default.jpg') }}" alt="default photo" style="width: 50px; height: 50px; border-radius: 50%;">
										@else
										<img src="{{ url('photo-profile/'.Auth::user()->photoprofile) }}" alt="default photo" style="width: 50px; height: 50px; border-radius: 50%;">
										@endif
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        <div>{{ Auth::user()->name }}</div> <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
												@if(\Auth::user()->roles[0]->name == 'admin')
												<li><a href="{{ url('admin') }}"> Admin Dashboard</a></li>
												@endif
												<li><a href="{{ url('profile') }}"> Profil Saya</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
								@endguest
							</ul>
						</div>

					</div>
				</div>
			</div>

			<!-- Start nav -->
			@include('partials._nav')
			<!-- End nav -->
		</header>

		<section class="home">
			<div class="container">
				<div class="row">

					@yield('contents')

				</div>
			</div>
		</section>

		@yield('top-footer')

		<!-- Start footer -->
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Tentang</h1>
							<div class="block-body">
								<figure class="foot-logo">
									<img src="{{ url('images/logo_hmi.png') }}" class="img-responsive" alt="Logo HMI">
								</figure>
								<p class="brand-description">
									<b>HMI Komisariat Sains dan Teknologi</b><br>
									Jl. Permai V, Cipadung, Kec. Cibiru, Kota Bandung, Jawa Barat 40614 <br>
								</p>
								<br>
								<a href="{{ url('organizations') }}" class="btn btn-magz white">Profil Kabinet <i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Menu </h1>
							<div class="block-body">
								<ul>
									<li><a href="{{ url('organizations') }}">Kabinet</a></li>
									<li><a href="{{ url('news-schedule') }}">Berita & Agenda</a></li>
									<li><a href="{{ url('articles') }}">Artikel</a></li>
									<li><a href="{{ url('activities') }}">Aktifitas</a></li>
									<li><a href="javascript:void(0);" onclick="return alert('Coming Soon');">KomiShop</a></li>
									<li><a href="javascript:void(0);" onclick="return alert('Coming Soon');">Karir</a></li>
								</ul>
							</div>
						</div>
						<div class="line"></div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Berita & Agenda Lainnya</h1>
							<div class="block-body">
								@foreach($newsSchedules as $news)
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="{{ url('news-schedule/'.$news->slug) }}">
												<img src="{{ url('news-thumbnail/'.$news->thumbnail) }}" alt="Thumbnail">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="{{ url('news-schedule/'.$news->slug) }}">{{ $news->title }}</a></h1>
										</div>
									</div>
								</article>
								@endforeach
								<a href="{{ url('news-schedule') }}" class="btn btn-magz white btn-block">Lihat Semua <i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-12 col-sm-6">
						<div class="block">
							<h1 class="block-title">Ikuti Kami</h1>
							<div class="block-body">
								<p>Ikuti kami dan terus update informasi terbaru.</p>
								<ul class="social trp">
									<li>
										<a href="{{ $infoweb->facebook }}" class="facebook">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-facebook"></i>
										</a>
									</li>
									<li>
										<a href="{{ $infoweb->twitter }}" class="twitter">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-twitter-outline"></i>
										</a>
									</li>
									<li>
										<a href="{{ $infoweb->youtube }}" class="youtube">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-youtube-outline"></i>
										</a>
									</li>
									<li>
										<a href="{{ $infoweb->google }}" class="googleplus">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-googleplus"></i>
										</a>
									</li>
									<li>
										<a href="{{ $infoweb->instagram }}" class="instagram">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-instagram-outline"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="line"></div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="copyright">
							COPYRIGHT &copy; HMI KOMISARIAT SAINS & TEKNOLOGI CAKABA 2020
							<div>
								Made with <i class="ion-heart"></i> by <a href="http://heriher76.github.io" target="_blank">HeriHerPlay</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->

		<!-- JS -->
		<script src="{{ url('front/js/jquery.js') }}"></script>
		<script src="{{ url('front/js/jquery.migrate.js') }}"></script>
		<script src="{{ url('front/scripts/bootstrap/bootstrap.min.js') }}"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="{{ url('front/scripts/jquery-number/jquery.number.min.js') }}"></script>
		<script src="{{ url('front/scripts/owlcarousel/dist/owl.carousel.min.js') }}"></script>
		<script src="{{ url('front/scripts/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ url('front/scripts/easescroll/jquery.easeScroll.js') }}"></script>
		<script src="{{ url('front/scripts/sweetalert/dist/sweetalert.min.js') }}"></script>
		<script src="{{ url('front/scripts/toast/jquery.toast.min.js') }}"></script>
		<!-- <script src="{{ url('front/js/demo.js') }}"></script> -->
		<script src="{{ url('front/js/e-magz.js') }}"></script>

		@yield('scripts')

	</body>
</html>
