<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('page-title')</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('storage/img-web/ts.png') }}" type="image/x-icon">
    {{-- <link href="{{ asset('tema-landing-page/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('tema-landing-page/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> --}}

    <!-- Vendor CSS Files -->
    <link href="{{ asset('tema-landing-page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tema-landing-page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('tema-landing-page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('tema-landing-page/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tema-landing-page/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('tema-landing-page/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('tema-landing-page/assets/css/costum.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center border-bottom border-5 border-warning">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('storage/img-web/ts-gowa.png') }}" alt="">
                <span style="color: white; font-weight: bold; font-size: ">TAPAK SUCI 177 GOWA</span>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#videos">Videos</a></li>
                    <li><a href="#team">Team</a></li>
                    {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->
    <!-- End Header -->

    {{-- menu yang muncul di smart phone --}}
    <nav class=" text-bg-light d-flex justify-content-center bg-warning">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/news') }}">News</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li> --}}
        </ul>
    </nav>
    {{-- /menu yang muncul di smart phone --}}

    <!-- ======= Hero Section ======= -->
    {{-- <section id="hero" class="hero"> --}}
    <div>
        {{-- <div class="container position-relative" data-aos="fade-in"> --}}
        <div data-aos="fade-in" class="border-bottom border-5 border-warning">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="{{ asset('storage/img-web/kejurda.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ asset('storage/img-web/penataran-wasit.png') }}" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ asset('storage/img-web/ukts-bissoloro.png') }}" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ asset('storage/img-web/ukt-limbung.png') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        </section>
        <!-- End Hero Section -->
        {{-- <img src="{{ asset('storage/img-web/kejurda.png')}}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100" width="100%"> --}}

        {{-- main --}}
        <main id="main">

            @yield('page')

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">

            <div class="container">
                <div class="row">
                    <div class="col-12 footer-info">
                        <h3>Tapak Suci Putera Muhammadiyah</h3>
                        <h4>Pimda 177 Kabupaten Gowa</h4>
                        <div class="social-links d-flex mt-4">
                            <a href="https://www.instagram.com/pimda177gowa?igsh=cjg4OTAweDQ2dHpt" class="instagram"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://www.youtube.com/@pimdatspm177gowa7" class="youtube"><i
                                    class="bi bi-youtube"></i></a>
                            <a href="#" class="tiktok"><i class="bi bi-tiktok"></i></a>
                        </div>
                    </div>

                </div>

            </div>
    </div>

    <div class="container mt-4">
        <div class="copyright">
            &copy; Copyright <strong><span>RGC 177 Gowa 2024</span></strong>
        </div>
    </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('tema-landing-page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('tema-landing-page/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('tema-landing-page/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('tema-landing-page/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('tema-landing-page/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('tema-landing-page/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('tema-landing-page/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('tema-landing-page/assets/js/main.js') }}"></script>

</body>

</html>
