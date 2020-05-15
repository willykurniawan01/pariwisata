<body>

    <!-- ======= Header ======= -->
    <header <?= ($judul == "Homepage") ?  "id='header'" : "id='headers' class='header-scrolled'" ?>>
        <div class="container-fluid">

            <div id="logo" class="pull-left">
                <img src="<?= base_url('assets/home/') ?>assets/img/logo/logo-small.png" alt="">
                <h1><a href="#intro" class="scrollto d-inline">SMP Masmur Pekanbaru</a></h1>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="<?= base_url('home') ?>">Home</a></li>
                    <li class="menu-has-children"><a href="">Profil</a>
                        <ul>
                            <li><a href="sekolah.html">Sekolah</a></li>
                            <li><a href="<?= base_url('home/visimisi') ?>">Visi dan Misi</a></li>
                            <li><a href="<?= base_url('home/kepalasekolah') ?>">Kepala Sekolah</a></li>

                        </ul>
                    </li>
                    <li class="menu-has-children"><a href="">Info</a>
                        <ul>
                            <li><a href="pendaftaran.html">Pendaftaran</a></li>
                            <li><a href="fasilitas.html">Fasilitas</a></li>
                            <li><a href="berita.html">Berita</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('home/galeri') ?>">Galeri</a></li>
                    <li><a href="prestasi.html">Prestasi</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </header>
    <!-- End Header -->