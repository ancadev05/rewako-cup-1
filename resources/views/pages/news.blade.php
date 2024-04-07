<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tapak Suci 177 Gowa</title>
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

    <!-- =======================================================
  * Template Name: Impact
  * Updated: Jan 30 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
                    <li><a href="#hero">Home</a></li>
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
    <nav class=" text-bg-light ">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/news') }}">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
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
            {{-- container --}}
            <div class="container">
                <h3 class="border-bottom border-2 mb-3">Berita Terbaru</h3>

                <div class="p-1 mb-2 border rounded bg-white shadow">
                    <div class="row g-2 d-flex align-items-center " style="font-size: 10px">
                        <div class="col-4">
                            <img src="https://celebesnews.co.id/wp-content/uploads/2024/02/IMG-20240210-WA0043.jpeg"
                                class="img-fluid" alt="...">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h6 class="card-title">Keren, Tapak Suci Gowa, Rebut Piala Kemenpora</h6>
                                <span class="card-text">Apalagi setelah menyabet Piala Kemenpora pada <a
                                        href="https://celebesnews.co.id/2024/02/11/keren-tapak-suci-gowa-rebut-piala-kemenpora/">redmore...</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-1 mb-2 border rounded bg-white shadow">
                    <div class="row g-2 d-flex align-items-center " style="font-size: 10px">
                        <div class="col-4">
                            <img src="https://img.inews.co.id/media/600/files/networks/2024/02/11/4a14a_tapak-suci-gowa.jpg"
                                class="img-fluid" alt="...">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h6 class="card-title">PDM Puji Tapak Suci Gowa, Mampu Telorkan Prestasi Nasional</h6>
                                <span class="card-text">SUNGGUMINASA, iNews.id - Pujian dilontarkan Ketua Pimpinan
                                    Daerah
                                    Muhammadiyah (PDM) Gowa, H Ardan Ilyas saat <a
                                        href="https://gowa.inews.id/read/406561/pdm-puji-tapak-suci-gowa-mampu-telorkan-prestasi-nasional?utm_medium=sosmed&utm_source=whatsapp">redmore...</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-1 mb-2 border rounded bg-white shadow">
                    <div class="row g-2 d-flex align-items-center " style="font-size: 10px">
                        <div class="col-4">
                            <img src="https://www.ujungjari.com/wp-content/uploads/2024/02/IMG_20240210_233846-300x203.jpg"
                                class="img-fluid" alt="...">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h6 class="card-title">301 Pesilat Ujian Kenaikan Tingkat, PDM Puji Prestasi Nasional
                                    Tapak
                                    Suci Gowa</h6>
                                <span class="card-text">Ratusan pesilat Tapak Suci Muhammadiyah 177 Gowa mengikuti
                                    ujian <a
                                        href="https://www.ujungjari.com/2024/02/11/301-pesilat-ujian-kenaikan-tingkat-pdm-puji-prestasi-nasional-tapak-suci-gowa/">redmore...</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-1 mb-2 border rounded bg-white shadow">
                    <div class="row g-2 d-flex align-items-center " style="font-size: 10px">
                        <div class="col-4">
                            <img src="https://img.inews.co.id/media/600/files/networks/2024/01/02/6a9cc_tapak-suci-gowa.jpg"
                                class="img-fluid" alt="..." >
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h6 class="card-title">Tapak Suci Gowa Raih Juara Umum, Bawa Pulang Piala Kemenpora RI</h6>
                                <span class="card-text"> Setelah sukses menjadi juara umum III di Kejurnas Pencak Silat di Payakumbuh, Sumatra Barat di awal tahun 2023 <a
                                        href="https://gowa.inews.id/read/389574/tapak-suci-gowa-raih-juara-umum-bawa-pulang-piala-kemenpora-ri?utm_medium=sosmed&utm_source=whatsapp">redmore...</a></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>{{-- /end container --}}
        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">

            <div class="container">
                <div class="row">
                    <div class="col-12 footer-info">
                        <h3>Tapak Suci Putera Muhammadiyah</h3>
                        <h4>Pimda 177 Kabupaten Gowa</h4>
                        <div class="social-links d-flex mt-4">
                            <a href="https://www.instagram.com/pimda177gowa?igsh=cjg4OTAweDQ2dHpt"
                                class="instagram"><i class="bi bi-instagram"></i></a>
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
