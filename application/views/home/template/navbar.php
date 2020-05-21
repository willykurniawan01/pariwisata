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
                    <li class="<?= ($navbar == "Home") ? 'menu-active' : '' ?>"><a href="<?= base_url('home') ?>">Home</a></li>
                    <li class="menu-has-children <?= ($navbar == "Profil") ? 'menu-active' : '' ?>"><a href="">Profil</a>
                        <ul>
                            <li><a href="<?= base_url('home/sekolah') ?>">Sekolah</a></li>
                            <li><a href="<?= base_url('home/visimisi') ?>">Visi dan Misi</a></li>
                            <li><a href="<?= base_url('home/kepalasekolah') ?>">Kepala Sekolah</a></li>

                        </ul>
                    </li>
                    <li class="menu-has-children <?= ($navbar == "Info") ? 'menu-active' : '' ?>"><a href="">Info</a>
                        <ul>
                            <li><a href="<?= base_url('home/pendaftaran') ?>">Pendaftaran</a></li>
                            <li><a href="<?= base_url('home/fasilitas') ?>">Fasilitas</a></li>
                        </ul>
                    </li>
                    <li class="<?= ($navbar == "Berita") ? 'menu-active' : '' ?>"><a href="<?= base_url('berita') ?>">Berita</a></li>
                    <li class="<?= ($navbar == "Galeri") ? 'menu-active' : '' ?>"><a href="<?= base_url('home/galeri') ?>">Galeri</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </header>
    <!-- End Header -->