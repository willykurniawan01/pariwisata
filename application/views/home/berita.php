<main id="mains">

    <!-- ======= Berita Section ======= -->
    <section id="about">
        <div class="container">
            <header class="section-header">
                <h3>Berita</h3>
            </header>

            <div class="row my-3 d-md-none">
                <div class="col">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari berita...">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button">Cari!</button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="row about-cols">
                <div class="col-12 col-md-8">
                    <?php

                    foreach ($berita as $b) :
                    ?>
                        <div class="row">
                            <div class="col-md-12 wow" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                <div class="about-col">
                                    <a href="<?= base_url('berita/detail/') . $b['id_berita'] ?>">
                                        <div class="img">
                                            <img src="<?= base_url('assets/home/assets/img/berita/') . $b['gambar'] ?>" alt="<?= $b['judul'] ?>" class="img-fluid img-berita">
                                            <h4 class="date"><?= date("j F Y ", strtotime($b['datetime'])) ?></h4>
                                        </div>
                                    </a>
                                    <h2 class="title"><a href="<?= base_url('berita/detail/') . $b['id_berita'] ?>"><?= $b['judul'] ?></a></h2>
                                    <p>
                                        <?= substr($b['isi'], 0, 400) . '...' ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

                <div class="col-md-4 search-col sticky-top d-none d-sm-block">
                    <div class="card search-box">
                        <h5 class="card-header">Search</h5>
                        <div class="card-body">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cari" id="search_text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Cari berita..." value="<?= $cari ?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit">Cari!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <?= $this->pagination->create_links(); ?>
        </div>
    </section>
    <!-- End Sekolah Section -->





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
    </section><!-- End Contact Section -->


</main>
<!-- End #main -->