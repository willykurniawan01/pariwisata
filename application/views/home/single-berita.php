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
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="#">Web Design</a>
                                        </li>
                                        <li>
                                            <a href="#">HTML</a>
                                        </li>
                                        <li>
                                            <a href="#">Freebies</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="#">JavaScript</a>
                                        </li>
                                        <li>
                                            <a href="#">CSS</a>
                                        </li>
                                        <li>
                                            <a href="#">Tutorials</a>
                                        </li>
                                    </ul>
                                </div>
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