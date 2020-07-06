<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Akomodasi</h3>
                    <p>Temukan Akomodasi Terbaik</p>
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
                    <?php foreach ($akomodasi as $w) : ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="single_place">
                                <div class="thumb">
                                    <img style="width: 100%; height:300px;" src="<?= base_url('assets/home/assets/img/akomodasi/') . $w['gambar'] ?>" alt="">
                                </div>
                                <div class="place_info">
                                    <a href="<?= base_url('akomodasi/detail/') . $w['id_akomodasi'] ?>">
                                        <h3><?= $w['nama_akomodasi'] ?></h3>
                                    </a>
                                    <p><?= $w['alamat'] ?></p>
                                    <div class="rating_days d-flex justify-content-between">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <a href="#">(20 Review)</a>
                                        </span>
                                    </div>
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