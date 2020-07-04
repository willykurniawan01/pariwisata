<!-- ======= Portfolio Section ======= -->
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
</section><!-- End Portfolio Section -->