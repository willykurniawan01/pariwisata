<main id="mains">

    <!-- ======= Gallery Section ======= -->
    <section id="portfolio" class="section-bg">
        <div class="container">

            <header class="section-header">
                <h3 class="section-title">Galeri</h3>
            </header>


            <div class="row">
                <div class="col-lg-12">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <?php
                        $kategori = $this->db->get('kategori_galeri')->result_array();
                        foreach ($kategori as $k) :
                        ?>
                            <li data-filter=".<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">
                <?php
                $gambar = $this->db->get('galeri')->result_array();
                foreach ($gambar as $g) :
                ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app 1 wow fadeInUp <?= $g['kategori'] ?>">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="<?= base_url('assets/home/assets/img/galeri/') . $g['gambar'] ?>" class="img-fluid" alt="">
                                <a href="<?= base_url('assets/home/assets/img/galeri/') . $g['gambar'] ?>" class="link-preview venobox" data-gall="portfolioGallery" title="Web 3"><i class="ion ion-eye"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><?= $g['judul'] ?></h4>
                                <p><?= $g['subjudul'] ?></p>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
        </div>
    </section><!-- End Gallery Section -->


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