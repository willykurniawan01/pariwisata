<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url(<?= base_url('assets/home/assets/img/agenda.jpg') ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Agenda</h3>
                    <p>Agenda Terbaru.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->


<!--================Agenda Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php foreach ($agenda as $a) : ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <a href="#" class="blog_item_date">
                                    <h3>15</h3>
                                    <p>Jan</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2><?= $a['nama_agenda'] ?></h2>
                                </a>
                                <p><?= $a['isi_agenda'] ?></p>
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

                </div>
            </div>
        </div>
    </div>
</section>
<!--================Agenda Area =================-->