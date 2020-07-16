<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url('<?= base_url('assets/home/assets/img/parallax.jpg') ?>');">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Detail Wisata</h3>
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
                        <img style="width: 700px; height:500px;" src="<?= base_url('assets/home/assets/img/wisata/') . $wisata['gambar'] ?>" alt="">
                    </div>
                    <div class="blog_details">
                        <h2><?= $wisata['nama_wisata'] ?>
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="fa fa-user"></i>Admin</a></li>
                            <li>
                                <a href="#"><i class="fa fa-comments"></i>
                                    <?php
                                    $this->db->where('id_wisata', $wisata['id_wisata']);
                                    echo $this->db->get('komentar_wisata')->num_rows() . ' komentar';
                                    ?>
                                </a>
                            </li>
                        </ul>
                        <p class="excert">
                            <?= $wisata['deskripsi'] ?>
                        </p>

                    </div>
                </div>
                <div class="row my-5  justify-content-center">
                    <h2>View</h2>
                </div>
                <div class="row justify-content-between">
                    <?php foreach ($view as $v) : ?>

                        <div class="col-lg-6  portfolio-item filter-app 1 ">
                            <div class="portfolio-wrap">
                                <figure>
                                    <a href="<?= base_url('assets/home/assets/img/view/') . $v['gambar'] ?>" class="link-preview venobox" data-gall="portfolioGallery" title="Web 3">
                                        <img src="<?= base_url('assets/home/assets/img/view/') . $v['gambar'] ?>" class="img-fluid" alt="">
                                    </a>
                                </figure>

                                <div class="portfolio-info">
                                    <p><?= $v['caption'] ?></p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <div class="row my-5 justify-content-center">
                    <h2>Map ke Lokasi</h2>
                </div>

                <div id="mymap" style="width: 100%; height: 400px;"></div>


                <div class="comments-area" id="result">

                </div>
                <div class="comment-form">
                    <h4>Tinggalkan Komentar</h4>
                    <form class="form-contact comment_form" method="POST" id="commentForm">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="komentar" id="komentar" cols="30" rows="9" placeholder="Silahkan Isi Komentar"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="nama" id="nama" type="text" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <button id="tambahkomentar" type="button" class="button button-contactForm btn_1 boxed-btn">Kirim</button>
                        </div>
                    </form>
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
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Kategori</h4>
                        <ul class="list cat-list">
                            <?php foreach ($kategori as $k) : ?>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p><?= $k['nama_kategori'] ?></p>
                                        <p>
                                            (<?php $this->db->where('id_kategori', $k['id_kategori']);
                                                $jumlah = $this->db->get('rel_kategori_wisata')->num_rows();
                                                echo $jumlah;
                                                ?>)
                                        </p>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->

<!-- modal -->
<div id="success-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>Terima Kasih Sudah Berkomentar!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(function() {
        tampilkomentar()
        //function
        function tampilkomentar() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url('wisata/tampilkomentar/') . $wisata['id_wisata'] ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html +=
                            '<div class="comment-list">' +
                            '<div class="single-comment justify-content-between d-flex">' +
                            '<div class="user justify-content-between d-flex">' +
                            '<div class="thumb">' +
                            '<img class="img-fluid" src="<?= base_url('assets/home/assets/img/user.png') ?>" alt="">' +
                            '</div>' +
                            '<div class="desc">' +
                            '<p class="comment">' +
                            data[i].komentar +
                            '</p>' +
                            '<div class="d-flex justify-content-between">' +
                            '<div class="d-flex align-items-center">' +
                            '<h5>' +
                            '<a class="text-capitalize">' +
                            data[i].nama +
                            '</a>' +
                            '</h5>' +
                            '<p class="date">' +
                            data[i].waktu +
                            '</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    }
                    $('#result').html(html);
                },
                error: function() {
                    alert('Tidak Dapat Menampilkan Data!');
                }
            });
        }

        $('#tambahkomentar').click(function() {
            var data = $('#commentForm').serialize();
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url('wisata/tambahkomentar/') . $wisata['id_wisata'] ?>',
                dataType: 'json',
                async: 'false',
                data: data,
                success: function(response) {
                    if (response.success) {
                        $('#commentForm')[0].reset();
                        tampilkomentar();
                        $('#success-modal').modal('show');
                    }
                }
            });
        });

    });
</script>

<script>
    navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
        L.marker([location.coords.latitude, location.coords.longitude]).addTo(map);

        L.Routing.control({
            waypoints: [
                L.latLng(location.coords.latitude, location.coords.longitude),
                L.latLng(<?= $wisata['garis_lintang'] ?>, <?= $wisata['garis_bujur'] ?>)
            ],
            routeWhileDragging: true
        }).addTo(map);

        var popup = L.popup()
            .setLatLng([<?= $wisata['garis_lintang'] ?>, <?= $wisata['garis_bujur'] ?>])
            .setContent('<a class="btn btn-outline-primary" href="https://www.google.com/maps/dir/?api=1&origin=' + location.coords.latitude + ',' + location.coords.longitude + '&destination=<?= $wisata['garis_lintang'] ?>, <?= $wisata['garis_bujur'] ?>">Navigasi</a>')
            .openOn(map);

    });
    var map = L.map('mymap').setView([0.5554599, 101.5060433], 9);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);
    var tujuan = L.marker([<?= $wisata['garis_lintang'] ?>, <?= $wisata['garis_bujur'] ?>]).addTo(map);
</script>