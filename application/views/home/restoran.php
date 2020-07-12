<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url(<?= base_url('assets/home/assets/img/makanan.jpg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Restoran</h3>
                    <p>Temukan Restoran Terbaik</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->




<div class="popular_places_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($restoran as $w) : ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="single_place">
                                <div class="thumb">
                                    <img style="width: 100%; height:300px;" src="<?= base_url('assets/home/assets/img/restoran/') . $w['gambar'] ?>" alt="">
                                </div>
                                <div class="place_info">
                                    <a href="<?= base_url('restoran/detail/') . $w['id_restoran'] ?>">
                                        <h3><?= $w['nama_restoran'] ?></h3>
                                    </a>
                                    <p><?= $w['alamat'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-12  d-flex justify-content-center">
                        <div class="more_place_btn text-center">
                            <!-- <a class="boxed-btn4" href="#">More Places</a> -->
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>