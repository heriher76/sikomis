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
						<div style="position: absolute;">
							<ul class="nav-icons">
								<li><a href="#"><i class="ion-person-add"></i><div>Donasi Ke Komisariat? Klik</div></a></li>
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
								<a href="page.html" class="btn btn-magz white">Profil Kabinet <i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Menu </h1>
							<div class="block-body">
								<ul>
									<li><a href="#">Kabinet</a></li>
									<li><a href="#">Berita & Agenda</a></li>
									<li><a href="#">Artikel</a></li>
									<li><a href="#">Aktifitas</a></li>
									<li><a href="#">KomiShop</a></li>
									<li><a href="#">Karir</a></li>
								</ul>
							</div>
						</div>
						<div class="line"></div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Berita & Agenda Terbaru</h1>
							<div class="block-body">
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="{{ url('front/images/news/img12.jpg') }}" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Donec consequat lorem quis augue pharetra</a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="{{ url('front/images/news/img14.jpg') }}" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">eu dapibus risus aliquam etiam ut venenatis</a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="{{ url('front/images/news/img15.jpg') }}" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Nulla facilisis odio quis gravida vestibulum </a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="{{ url('front/images/news/img16.jpg') }}" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Proin venenatis pellentesque arcu vitae </a></h1>
										</div>
									</div>
								</article>
								<a href="#" class="btn btn-magz white btn-block">Lihat Semua <i class="ion-ios-arrow-thin-right"></i></a>
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
										<a href="#" class="facebook">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#" class="twitter">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-twitter-outline"></i>
										</a>
									</li>
									<li>
										<a href="#" class="youtube">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-youtube-outline"></i>
										</a>
									</li>
									<li>
										<a href="#" class="googleplus">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-googleplus"></i>
										</a>
									</li>
									<li>
										<a href="#" class="instagram">
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
								Made with <i class="ion-heart"></i> by <a href="http://heriher76.github.io">HeriHerPlay</a>
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