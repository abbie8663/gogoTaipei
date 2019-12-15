<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="Free-Template.co" />

  <link rel="shortcut icon" href="ftco-32x32.png">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{ asset('css/aos.css')}}">
  <link rel="stylesheet" href="{{ asset('css/rangeslider.css')}}">

  <link rel="stylesheet" href="{{ asset('css/style.css')}}">

</head>

<body>

  <!-- header -->
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <!-- navbar -->
    <header class="site-navbar" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-11 col-xl-4">
            <!-- <h1 class="mb-0 site-logo"><a href="index.html" class="text-white h2 mb-0">Gogo Taipei</a></h1> -->
          </div>
          <div class="col-12 col-md-8 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="@yield('nav_home')"><a href="{{ route('home') }}"><span>Home</span></a></li>
                <li class="@yield('nav_views')"><a href="{{ route('viewlist') }}"><span>Views</span></a></li>
                <li class="@yield('nav_message')"><a href="{{ route('message') }}"><span>Message</span></a></li>

                <!-- <li class="@yield('nav_Dropdown') has-children">
                  <a href="about.html"><span>Dropdown</span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                    <li class="has-children">
                      <a href="#">Dropdown</a>
                      <ul class="dropdown">
                        <li><a href="#">Menu One</a></li>
                        <li><a href="#">Menu Two</a></li>
                        <li><a href="#">Menu Three</a></li>
                        <li><a href="#">Menu Four</a></li>
                      </ul>
                    </li>
                  </ul>
                </li> -->
                @guest
                <li><a href="{{ route('login') }}"><span>{{ __('Login') }}</span></a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}"><span>{{ __('Register') }}</span></a></li>
                @endif

                @else
                <li class=" has-children">
                  <a href="#"><span>{{ Auth::user()->name }}</span></a>
                  <ul class="dropdown arrow-top">
                    
                    <li><a href="#">會員資料</a></li>
                    <li><a href="#">我的珍藏</a></li>
                    <li><a href="#">我的行程</a></li>
                    <li>
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </li>
                  </ul>
                </li>
                @endguest



              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

        </div>

      </div>
  </div>

  </header>

  @yield('content')

  <!-- footer -->
  <footer>
    <div class="container">
      <div class="row mt-5">
        <div class="col-12 text-md-center text-left">
          <p>
            <!-- Link back to Free-Template.co can't be removed. Template is licensed under CC BY 3.0. -->
            &copy; 2019 <strong class="text-black">Browse</strong> Free Template. All Rights Reserved. <br> Design by <a href="https://free-template.co/" target="_blank" class="text-black">Free-Template.co</a>
          </p>
        </div>
      </div>
    </div>
  </footer>


  <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('js/jquery-ui.js')}}"></script>
  <script src="{{ asset('js/popper.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('js/jquery.countdown.min.js')}}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('js/aos.js')}}"></script>
  <script src="{{ asset('js/rangeslider.min.js')}}"></script>

  <script src="{{ asset('js/main.js')}}"></script>



  <script src="{{ asset('js/typed.js')}}"></script>
  <script>
    var typed = new Typed('.typed-words', {
      strings: ["New Taipei"],
      typeSpeed: 80,
      backSpeed: 80,
      backDelay: 4000,
      startDelay: 1000,
      loop: true,
      showCursor: true
    });
  </script>

  <script src="{{ asset('js/main.js')}}"></script>

</body>

</html>