<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>O-Télécom</title>

        @yield('extra-script')
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/electro/bootstrap.min.css') }}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/electro/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('css/electro/slick-theme.css') }}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/electro/nouislider.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('css/css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/electro/style.css') }}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
        @php
            getIp();
            getUserSession();
        @endphp
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li style="color: #fff"><i class="fa fa-phone"></i>+261 034 73 124 42</li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> fenoherysaiyan@gmail.com</a></li>
						<li style="color: #fff"><i class="fa fa-map-marker"></i>Antsirabe 110</li>
					</ul>
					<ul class="header-links pull-right">
						{{-- <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li> --}}
                            @auth
                                <li><a href="{{ route('order.index') }}"><i class="fa fa-bars"></i>Mes commandes</a></li>
                            @endauth
                            @if (auth()->guest())
                                <li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i> Mon compte</a></li>
                            @else
                                <li><a href="{{ route('admin.index')}}"><i class="fa fa-user-o"></i> {{ Auth::user()->name }}</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                 <i class="fa fa-user-o"></i> Se deconnecter</a></li>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            @endif

                            @can('admin')
                                <li><a href="{{ route('admin.index')}}"><i class="fa fa-user-o"></i> Espace admin</a></li>
                            @endcan


					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/" class="logo">
                                    O-Telecom shop
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="get" action="{{ route('produit.search') }}">
									<select class="input-select" name="category_id">
										<option value="all">Categories</option>
                                         @foreach (getCategories() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                         @endforeach

									</select>
									<input class="input" placeholder="Votre recherche" name="title">
									<button class="search-btn">Rechercher</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								{{-- <div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div> --}}
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Votre Panier</span>
										<div class="qty">{{ Cart::count() }}</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
                                            @if (Cart::count() > 0)
                                                @foreach (Cart::content() as $produit)
                                                <div class="product-widget">
                                                    <div class="product-body">
                                                        <h3 class="product-name"><a href="#">{{ $produit->model->title }}</a></h3>
                                                        <h4 class="product-price"><span class="qty">1x</span>{{ $produit->model->price }}</h4>
                                                    </div>
                                                    <button class="delete"><i class="fa fa-close"></i></button>
                                                </div>
                                                @endforeach
                                            @else
                                            <div class="product-body">
                                                <h3 class="product-name">Votre panier est vide</h3>

                                            </div>
                                            @endif


										</div>
										<div class="cart-summary">
											<small>{{ Cart::count()  }} articles</small>
											<h5>prix total: {{ Cart::subtotal() }} $</h5>
										</div>
										<div class="cart-btns">
											<a href="{{ route('carte.index') }}">Verifier  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								@if (!auth()->guest())
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-bell"></i>
										<span>Notifications</span>
										<div class="qty">{{ getNotificationsCount(Auth::user()->id) }}</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">

                                                @foreach (getNotifications(Auth::user()->id) as $notification)

                                                <div class="product-body">
                                                    <h5 class="product-name"><a href="{{ route('notification') }}">{{ $notification->content }}</a></h5>
                                                </div>
                                                    {{-- <button class="delete"><i class="fa fa-close"></i></button> --}}

                                                @endforeach
                                                @if(getNotificationsCount(Auth::user()->id)==0)
                                                <div class="product-body">
                                                    Aucune notifcation
                                                </div>
                                                @endif


										</div>
									</div>
								</div>
								@endif
								<!-- /Notifications -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="
                        @if (Route::currentRouteName() == 'home')
                            active
                        @endif">
                        <a href="{{ route('home') }}">Nouveautés</a></li>
						<li class="
                        @if (Route::currentRouteName() == 'produit.index')
                            active
                        @endif
                        ">
                        <a href="{{ route('produit.index') }}">Boutique</a></li>

					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        @yield('hero')

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				 @yield('content')
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
        @yield('section')
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		 <footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 col-xs-6 text-center">
							<div class="footer">
								<p>" Vous serez toujours mieux chez  O-Télécom "</p>
								<ul class="footer-links">
									<li><i class="fa fa-map-marker"></i>Rue 514, Antsirabe 110</li>
									<li><i class="fa fa-phone"></i>+261 034 73 124 42</li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>fenoherysaiyan@gmail.com</a></li>
								</ul>
							</div>
						</div>
                    </div>

					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{ asset('js/electro/jquery.min.js') }}"></script>
		<script src="{{ asset('js/electro/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/electro/slick.min.js') }}"></script>
		<script src="{{ asset('js/electro/nouislider.min.js') }}"></script>
		<script src="{{ asset('js/electro/jquery.zoom.min.js') }}"></script>
		<script src="{{ asset('js/electro/main.js') }}"></script>
        @yield('extra-js')
	</body>
</html>
