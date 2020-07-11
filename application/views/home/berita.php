<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url('<?= base_url('assets/home/assets/img/parallax.jpg') ?>');">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Berita</h3>
                    <p>Berita Terbaru Pariwisata Kabupaten Kampar</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->


<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">

                    <?php foreach ($berita as $b) : ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?= base_url('assets/home/assets/img/berita/') . $b['gambar'] ?>" alt="">
                                <a href="<?= base_url('berita/detail/') . $b['id_berita'] ?>" class="blog_item_date">
                                    <h3><?= date('d', strtotime($b['datetime'])); ?></h3>
                                    <p><?= date('M', strtotime($b['datetime'])); ?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?= base_url('berita/detail/') . $b['id_berita'] ?>">
                                    <h2><?= $b['judul'] ?></h2>
                                </a>
                                <p><?= substr($b['isi'], 0, 400) . '...' ?></p>
                                <ul class="blog-info-link">
                                    <li><a href="<?= base_url('berita/detail/') . $b['id_berita'] ?>"><i class="fa fa-user"></i>Admin</a></li>
                                    <li><a href="<?= base_url('berita/detail/') . $b['id_berita'] ?>"><i class="fa fa-comments"></i> <?php
                                                                                                                                        $this->db->where('id_berita', $b['id_berita']);
                                                                                                                                        echo $this->db->get('komentar_berita')->num_rows() . ' komentar';
                                                                                                                                        ?></a></li>
                                </ul>
                            </div>
                        </article>
                    <?php endforeach; ?>


                    <nav class="blog-pagination justify-content-center d-flex">
                        <?= $this->pagination->create_links(); ?>
                    </nav>
                </div>
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

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        <?php foreach ($berita as $b) : ?>
                            <div class="media post_item">
                                <img style="width: 50px; height:50px;" src="<?= base_url('assets/home/assets/img/berita/') . $b['gambar'] ?>" alt="post">
                                <div class="media-body">
                                    <a href="<?= base_url('berita/detail/') . $b['id_berita'] ?>">
                                        <h3><?= $b['judul'] ?></h3>
                                    </a>
                                    <p><?= date('D ,d F Y', strtotime($b['datetime'])); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->