<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url('');">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Single blog</h3>
                    <p>Pixel perfect design with awesome contents</p>
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
                        <img style="width: 700px; height:500px;" src="<?= base_url('assets/home/assets/img/restoran/') . $restoran['gambar'] ?>" alt="">
                    </div>
                    <div class="blog_details">
                        <h2><?= $restoran['nama_restoran'] ?>
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="fa fa-user"></i>Admin</a></li>
                            <li>
                                <a href="#"><i class="fa fa-comments"></i>
                                    <?php
                                    $this->db->where('id_restoran', $restoran['id_restoran']);
                                    echo $this->db->get('komentar_restoran')->num_rows() . ' komentar';
                                    ?>
                                </a>
                            </li>
                        </ul>
                        <p class="excert">
                            <?= $restoran['deskripsi'] ?>
                        </p>

                    </div>
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
                url: '<?= base_url('restoran/tampilkomentar/') . $restoran['id_restoran'] ?>',
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
                url: '<?= base_url('restoran/tambahkomentar/') . $restoran['id_restoran'] ?>',
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
                L.latLng(<?= $restoran['garis_lintang'] ?>, <?= $restoran['garis_bujur'] ?>)
            ],
            routeWhileDragging: true
        }).addTo(map);

        var popup = L.popup()
            .setLatLng([<?= $restoran['garis_lintang'] ?>, <?= $restoran['garis_bujur'] ?>])
            .setContent('<a class="btn btn-outline-primary" href="https://www.google.com/maps/dir/?api=1&origin=' + location.coords.latitude + ',' + location.coords.longitude + '&destination=<?= $restoran['garis_lintang'] ?>, <?= $restoran['garis_bujur'] ?>">Navigasi</a>')
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
    var tujuan = L.marker([<?= $restoran['garis_lintang'] ?>, <?= $restoran['garis_bujur'] ?>]).addTo(map);
</script>