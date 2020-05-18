    <!-- ======= Intro Section ======= -->
    <section id="intro">
        <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <?php
                    $slider = $this->db->get('slider')->result_array();
                    $i = 1;
                    foreach ($slider as $s) :
                    ?>
                        <div class="carousel-item <?= ($i == 1) ? 'active' : '' ?>">
                            <div class="carousel-background"><img src="<?= base_url('assets/admin/img/sliders/') . $s['gambar'] ?>" alt="Slider"></div>
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2><?= $s['judul'] ?>.&nbsp;</h2>
                                    <h4><?= $s['subjudul'] ?>.&nbsp;</h4>
                                </div>
                            </div>
                        </div>
                    <?php $i++; endforeach; ?>

                </div>

                <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </section>
    <!-- End Intro Section -->

    <main id="main">
        <!-- ======= Portal Berita Section ======= -->
        <section id="about">
            <div class="container">

                <header class="section-header">
                    <h3>Portal Berita</h3>
                </header>

                <div class="row about-cols">
                    <?php foreach ($berita as $b) : ?>
                        <div class="col-md-6 wow" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <div class="about-col">
                                <a href="<?= base_url('berita/detail/') . $b['id_berita'] ?>">
                                    <div class="img">
                                        <img src="<?= base_url('assets/home/assets/img/berita/') . $b['gambar'] ?>" alt="<?= $b['judul'] ?>" class="img-fluid">
                                        <h4 class="date"><?= date("j F Y ", strtotime($b['datetime'])) ?></h4>
                                    </div>
                                </a>
                                <h2 class="title"><a href="<?= base_url('berita/detail/') . $b['id_berita'] ?>"><?= $b['judul'] ?></a></h2>
                                <p>
                                    <?= substr($b['isi'], 0, 400) . '...' ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </section><!-- End About Us Section -->



        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action" class="wow fadeIn">
            <div class="container text-center">
                <h3>Call To Action</h3>
                <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </section><!-- End Call To Action Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="section-bg wow fadeInUp">
            <div class="container">

                <div class="section-header">
                    <h3>Kontak</h3>

                </div>

                <div class="row contact-info">

                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="ion-ios-location-outline"></i>
                            <h3>Alamat</h3>
                            <address>JL.KH Ahmad Dahlan / KUAU No.96 Sukajadi,Pekanbaru</address>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="contact-phone">
                            <i class="ion-ios-telephone-outline"></i>
                            <h3>Nomor Telepon
                            </h3>
                            <p> 0813-7839-5533<br>
                                0812-7565-5644 <br>
                                0813-6572-3496</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-email">
                            <i class="ion-ios-email-outline"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:info@example.com">info@example.com</a></p>
                        </div>
                    </div>

                </div>


            </div>

            </div>
        </section><!-- End Contact Section -->



    </main><!-- End #main -->