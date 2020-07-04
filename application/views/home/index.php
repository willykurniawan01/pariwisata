<!-- slider_area_start -->
<div class="slider_area">

    <div class="slider_active owl-carousel">
        <?php
        $slider = $this->db->get('slider')->result_array();
        $i = 1;
        foreach ($slider as $s) :
        ?>
            <div style="background-image: url(<?= base_url('assets/admin/img/sliders/') . $s['gambar'] ?>);" class="single_slider  d-flex align-items-center overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3><?= $s['judul'] ?></h3>
                                <p><?= $s['subjudul'] ?></p>
                                <a href="<?= base_url('/wisata') ?>" class="boxed-btn3">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php $i++;
        endforeach; ?>
    </div>


</div>
<!-- slider_area_end -->


<!-- popular_destination_area_start  -->
<div class="popular_destination_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Wisata Populer</h3>
                    <p>Berikut ini beberapa destinasi wisata populer.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($wisata as $w) : ?>
                <div class="col-lg-4">
                    <div class="single_destination">
                        <div class="thumb">
                            <img style="height: 300px; width:100%;" src="<?= base_url('assets/home/assets/img/wisata/') . $w['gambar'] ?>" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center"><?= $w['nama_wisata'] ?> <a href="<?= base_url('wisata/detail/') . $w['id_wisata'] ?>"> Popular</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- popular_destination_area_end  -->