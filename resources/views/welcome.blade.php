<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Philippine Society for Quality</title>
    

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      
        <!-- Vendor CSS Files -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/aos/aos.css" rel="stylesheet') }}">
        <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
      
        <link href="{{ asset('css/Welcome.css') }}" rel="stylesheet">

    </head>
    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">
          <div class="container d-flex align-items-center justify-content-between">
      
            <a href="{{ url()->previous() }}" class="logo d-flex align-items-center me-auto me-lg-0">
              <!-- Uncomment the line below if you also wish to use an image logo -->
              <!-- <img src="assets/img/logo.png" alt=""> -->
              <h1>Philippine Society for Quality<span>.</span></h1>
            </a>
      
            <nav id="navbar" class="navbar">
              <ul>
                
                <li><a href="{{ url()->previous() }}">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="#chefs">Chefs</a></li>
                <li><a href="#gallery">Gallery</a></li>
               
      
            <a class="btn-book-a-table" href="{{ route('login') }}">Login</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            @if (Route::has('register'))        
            <a class="btn-book-a-table" href="{{ route('register') }}">Register</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            @endif
            
          </div>
        
              </ul>
            </nav>
          </div>
        </header><!-- End Header -->
   
    {{-- <ul>
      
      <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"> 
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                  <li><a href="{{ url()->previous() }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>

                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                    @endif
                @endauth
            </div>
        @endif
    </ul>
        </div>
      </nav> --}}
      {{-- <img src="/img/Psq.png" alt=""> --}}
       <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Welcome PSQ Nations<br>Grow in Exelence with Us</h2>
          <p data-aos="fade-up" data-aos-delay="100">Philippine Society for Quality * Since 1969</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          {{-- <img src="/img/Psq.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300"> --}}
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->


                </div>
            </div>
        </div>
    </body>
</html>
