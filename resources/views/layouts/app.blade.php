<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Administration</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="ctnair">
    <section class="side-bar animate__animated animate__fadeInLeft">
        <div class="logo">
             <h3>IES-AV</h3>
        </div>
         <ul>
             <li><a href="{{ route('admin.index') }}" class="@if (Route::currentRouteName()=='admin.index') active  @endif"><i class="fa fa-tachometer" aria-hidden="true"></i> Tableau de bord</a></li>
             <li><a href="{{ route('admin.produit.index') }}" class="@if (Route::currentRouteName()=='admin.produit.index') active  @endif"><i class="fa fa-tachometer" aria-hidden="true"></i> Gérer les articles</a></li>
             <li><a href="{{ route('admin.category.index') }}" class="@if (Route::currentRouteName()=='admin.category.index') active  @endif"><i class="fa fa-tachometer" aria-hidden="true"></i> Gérer les categories</a></li>
             <li><a href="{{ route('admin.order.index') }}" class="@if (Route::currentRouteName()=='admin.order.index') active  @endif"><i class="fa fa-tachometer" aria-hidden="true"></i> Gérer les commandes</a></li>
         </ul>
   </section>
   <div class="content w-100">
         <div class="container">
            <nav class="navbar navbar-light bg-light">
                <button class="menu btn text-dark"><i class="fa fa-bars"></i> Menu</button>

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        @yield('form-search')
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->


                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item ">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Déconnexion
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </>
                        </li>
                    @endguest

                </ul>

            </nav>

              <div class="animate__animated animate__slideInUp">
                   @yield('content')
              </div>
         </div>
    </div>
  </div>
  <!-- REQUIRED SCRIPTS -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var menu = document.querySelector('.menu');
    var sidebar = document.querySelector('.side-bar');

    menu.addEventListener('click', function() {
        if(sidebar.style.display === "block"){
            sidebar.classList.add('animate__backOutLeft');
            sidebar.style.display = "none";
        }else{
            sidebar.style.display = "block";
            sidebar.classList.remove('animate__backOutLeft');
        }
    })

</script>
@yield('extra-js')
</body>
</html>
