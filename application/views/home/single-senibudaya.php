<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url('<?= base_url('assets/home/assets/img/parallax.jpg') ?>');">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Detail senibudaya</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img style="width: 100%; height:500px;" src="<?= base_url('assets/home/assets/img/senibudaya/') . $senibudaya['gambar'] ?>" alt="">
                    </div>
                    <div class="blog_details">
                        <h2><?= $senibudaya['nama_seni'] ?>
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="fa fa-user"></i>Admin</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row my-5  justify-content-center">
                    <h2>Deskripsi</h2>
                </div>
                <p class="excert">
                    <?= $senibudaya['deskripsi'] ?>
                </p>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                        </form>
                    </aside>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->