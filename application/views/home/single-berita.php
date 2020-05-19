<main id="mains">

    <!-- section single-berita -->
    <section id="single-berita">
        <!-- Page Content -->
        <div class="container py-5">

            <div class="row">

                <!-- Post Content Column -->
                <div class="col-lg-8">

                    <!-- Title -->
                    <h1 class="mt-4"><?= $berita['judul'] ?></h1>

                    <!-- Date/Time -->
                    <p>Posted on <?= date("j F Y ", strtotime($berita['datetime'])) ?></p>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-fluid rounded" src="<?= base_url('assets/home/assets/img/berita/') . $berita['gambar'] ?>" alt="">

                    <hr>
                    <?php
                    $data = str_replace('&', '&amp;', $berita['isi']);
                    ?>
                    <!-- Post Content -->
                    <div class="lead text-justify">
                        <?= $berita['isi'] ?>
                    </div>

                </div>

                <!-- Sidebar Widgets Column -->
                <div class="col-md-4 side-widget">

                    <!-- Search Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Search</h5>
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari berita...">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button">Cari!</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $i = 1;
                                foreach ($kategori as $k) :
                                ?>
                                    <div class="col-lg-6">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <a href="#"><?= $k['nama_kategori'] ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>
</main>