<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url('<?= base_url('assets/home/assets/img/parallax.jpg') ?>');">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Detail situsbudaya</h3>
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
                        <img style="width: 100%; height:500px;" src="<?= base_url('assets/home/assets/img/situsbudaya/') . $situsbudaya['gambar'] ?>" alt="">
                    </div>
                    <div class="blog_details">
                        <h2><?= $situsbudaya['nama_situs'] ?>
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="fa fa-user"></i>Admin</a></li>

                        </ul>


                    </div>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="rute-tab" data-toggle="tab" href="#rute" role="tab" aria-controls="rute" aria-selected="true">Rute</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="deskripsi-tab" data-toggle="tab" href="#deskripsi" role="tab" aria-controls="deskripsi" aria-selected="true">Deskripsi</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="rute" role="tabpanel" aria-labelledby="rute-tab">
                        <div class="row my-5 justify-content-center">
                            <h2>Map ke Lokasi</h2>
                            <div id="mymap" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
                        <div class="row my-5  justify-content-center">
                            <h2>Deskripsi</h2>
                        </div>
                        <p class="excert">
                            <?= $situsbudaya['deskripsi'] ?>
                        </p>
                    </div>


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
    var map = L.map('mymap').setView([0.5554599, 101.5060433], 9);
    navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
        L.marker([location.coords.latitude, location.coords.longitude]).addTo(map);

        L.Routing.control({
            waypoints: [
                L.latLng(location.coords.latitude, location.coords.longitude),
                L.latLng(<?= $situsbudaya['garis_lintang'] ?>, <?= $situsbudaya['garis_bujur'] ?>)
            ],
            routeWhileDragging: true
        }).addTo(map);

        var popup = L.popup()
            .setLatLng([<?= $situsbudaya['garis_lintang'] ?>, <?= $situsbudaya['garis_bujur'] ?>])
            .setContent('<a class="btn btn-outline-primary" href="https://www.google.com/maps/dir/?api=1&origin=' + location.coords.latitude + ',' + location.coords.longitude + '&destination=<?= $situsbudaya['garis_lintang'] ?>, <?= $situsbudaya['garis_bujur'] ?>">Navigasi</a>')
            .openOn(map);

    });
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);
    var tujuan = L.marker([<?= $situsbudaya['garis_lintang'] ?>, <?= $situsbudaya['garis_bujur'] ?>]).addTo(map);
</script>