<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url(<?= base_url('assets/home/assets/img/candi.jpg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Destinasi situsbudaya</h3>
                    <p>Temukan Situs Budaya Kampar</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- where_togo_area_start  -->
<div class="where_togo_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="form_area">
                    <h3>Cari situsbudaya</h3>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="search_wrap">
                    <form class="search_form" method="get" action="<?= base_url('situsbudaya/carisitusbudaya') ?>">
                        <div class="input_field">
                            <input type="text" name="nama_situsbudaya" placeholder="Nama situsbudaya?">
                        </div>
                        <button class="boxed-btn4 " type="submit">Search</button>
                        <a class="boxed-btn4" href="<?= base_url('situsbudaya') ?>">Segarkan</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- where_togo_area_end  -->


<div class="popular_places_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($situsbudaya as $w) : ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="single_place">
                                <div class="thumb">
                                    <img style="width: 100%; height:300px;" src="<?= base_url('assets/home/assets/img/situsbudaya/') . $w['gambar'] ?>" alt="">
                                </div>
                                <div class="place_info" style="height: 150px;">
                                    <a href="<?= base_url('situsbudaya/detail/') . $w['id'] ?>">
                                        <h3><?= $w['nama_situs'] ?></h3>
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