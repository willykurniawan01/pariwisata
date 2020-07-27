<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url(<?= base_url('assets/home/assets/img/candi.jpg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3> seni budaya</h3>
                    <p>Temukan Destinasi senibudaya Terbaik</p>
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
                    <h3>Cari senibudaya</h3>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="search_wrap">
                    <form class="search_form" method="get" action="<?= base_url('senibudaya/carisenibudaya') ?>">
                        <div class="input_field">
                            <input type="text" name="nama_seni" placeholder="Nama senibudaya?">
                        </div>
                        <button class="boxed-btn4 " type="submit">Search</button>
                        <a class="boxed-btn4" href="<?= base_url('senibudaya') ?>">Segarkan</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- where_togo_area_end  -->




<!-- popular_destination_area_start  -->
<div class="popular_destination_area">
    <div class="container">
        <div class="row">
            <?php foreach ($senibudaya as $w) : ?>
                <div class="col-lg-6">
                    <a href="<?= base_url('senibudaya/detail/') . $w['id'] ?>">
                        <div class="single_destination">
                            <div class="thumb">
                                <img style="height: 400px; width:100%;" src="<?= base_url('assets/home/assets/img/senibudaya/') . $w['gambar'] ?>" alt="">
                            </div>
                            <div class="content">
                                <p class="d-flex align-items-center"><?= $w['nama_seni'] ?>
                                </p>
                            </div>
                        </div>
                    </a>
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
<!-- popular_destination_area_end  -->