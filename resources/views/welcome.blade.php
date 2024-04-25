@extends('pages.template')

@section('page-title')
    TS 177 Gowa
@endsection

@section('page')

    {{-- downlad proposal --}}
    <section class="services sections-bg">
        <div class="container">
            <h5 class="text-center">Download Proposal</h5>
            <a href="{{ asset('storage/download-file/proposal.pdf') }}" target="_blank"
                class="btn btn-warning d-block "><i class="bi bi-file-earmark-pdf"></i> Proposal PDF</a>
        </div>
    </section>

    {{-- registrasi --}}
    <div style="background-color: #ff6a00;" data-aos="fade-up" class="mt-5">
        <div class="container">
            <a href="https://wa.wizard.id/08f913" target="_blank" class="d-block bg-primary ">
                <img src="{{ asset('storage/img-web/regis.png') }}" class="" alt="..." width="100%">
            </a>
        </div>
    </div>

    {{-- halaman login bagi yang sudah punya akun --}}
    <section class="services sections-bg">
        <div class="container">
            <h5 class="text-center">Jika sudah memiliki akun, silahkan login ke aplikasi</h5>
            <a href="http://rewako.tapaksuci177gowa.or.id/login" class="btn btn-danger d-block ">Login</a>
        </div>
    </section>

    {{-- halaman yg masi disembunyikan --}}
    <div class=" d-none ">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>About Us</h2>
                    <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores
                        placeat
                        sunt id nobis omnis tiledo stran delop</p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-6">
                        <h3>Voluptatem dignissimos provident quasi corporis</h3>
                        <img src="assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="">
                        <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et.
                            Placeat
                            debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur
                            consectetur
                            fugiat voluptas ea.</p>
                        <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil
                            vitae
                            quo
                            officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam
                            qui.
                            Ut
                            ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium
                            sed
                            ut
                            omnis beatae neque deleniti repellendus.</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="content ps-0 ps-lg-5">
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore
                                magna aliqua.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex
                                    ea
                                    commodo consequat.</li>
                                <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in
                                    reprehenderit
                                    in
                                    voluptate velit.</li>
                                <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex
                                    ea
                                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                    trideta
                                    storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in
                                reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat
                                non
                                proident
                            </p>

                            <div class="position-relative mt-4">
                                <img src="assets/img/about-2.jpg" class="img-fluid rounded-4" alt="">
                                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Video ======= -->
        <section id="videos" class="services sections-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Videos</h2>
                    <p>Voluptatem quibusdam ut ullam perferendis repellat non ut consequuntur est eveniet
                        deleniti
                        fignissimos eos quam</p>
                </div>

                <div class="album py-5 bg-light">
                    <div class="container">

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <div class="col">
                                <div class="card shadow-sm">
                                    <iframe class="bd-placeholder-img card-img-top" width="100%" height="225"
                                        src="https://www.youtube.com/embed/gbk4mgzS2x0"
                                        title="Merawat Tradisi, Kalau Bukan kita, siapa lagi?" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <iframe class="bd-placeholder-img card-img-top" width="100%" height="225"
                                        src="https://www.youtube.com/embed/_jXA-cUARns"
                                        title="PIMDA 177 GOWA Konsisten  Mengukur dan Mengevaluasi Hasil Latihan Siswa dalam Kegiatan UKTS &amp; LKPTS"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <iframe class="bd-placeholder-img card-img-top" width="100%" height="225"
                                        src="https://www.youtube.com/embed/Z2_3ZH8fuDI"
                                        title="Keseruan Ujian Kenaikan Tingkat Siwa TSPM PIMDA 177 GOWA" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Our Services Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Testimonials</h2>
                    <p>Voluptatem quibusdam ut ullam perferendis repellat non ut consequuntur est eveniet
                        deleniti
                        fignissimos eos quam</p>
                </div>

                <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/testimonials/testimonials-1.jpg"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Saul Goodman</h3>
                                            <h4>Ceo &amp; Founder</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                        suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh
                                        et.
                                        Maecen aliquam, risus at semper.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/testimonials/testimonials-2.jpg"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Sara Wilsson</h3>
                                            <h4>Designer</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Export tempor illum tamen malis malis eram quae irure esse labore quem
                                        cillum
                                        quid cillum eram malis quorum velit fore eram velit sunt aliqua noster
                                        fugiat
                                        irure amet legam anim culpa.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/testimonials/testimonials-3.jpg"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Jena Karlis</h3>
                                            <h4>Store Owner</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Enim nisi quem export duis labore cillum quae magna enim sint quorum
                                        nulla
                                        quem
                                        veniam duis minim tempor labore quem eram duis noster aute amet eram
                                        fore
                                        quis
                                        sint minim.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/testimonials/testimonials-4.jpg"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Matt Brandon</h3>
                                            <h4>Freelancer</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export
                                        minim
                                        fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt
                                        elit
                                        fore
                                        quem dolore.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/testimonials/testimonials-5.jpg"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>John Larson</h3>
                                            <h4>Entrepreneur</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam
                                        tempor
                                        noster veniam enim culpa labore duis sunt culpa nulla illum cillum
                                        fugiat
                                        legam
                                        esse veniam culpa fore.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Our Team</h2>
                    <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea
                        sunt
                        quis dolorem dolore earum</p>
                </div>

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            <h4>Walter White</h4>
                            <span>Web Development</span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                            <h4>Sarah Jhinson</h4>
                            <span>Marketing</span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                            <h4>William Anderson</h4>
                            <span>Content</span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                </div>
            </div>
        </section><!-- End Our Team Section -->
    </div>
    {{-- /halaman yg masi disembunyikan --}}
@endsection
