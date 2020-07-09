<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a class="d-flex" href="<?= base_url('home') ?>">
                                    <img style="width: 50px; height:60px;" src="<?= base_url('assets/home/assets/') ?>img/logo.png" alt="">
                                    <h3 class="ml-2 align-self-center">Kampar</h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="<?= base_url('home') ?>">Home</a></li>

                                        <li><a href="#">Menu <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?= base_url('/wisata') ?>">Wisata</a>
                                                </li>
                                                <li><a href="<?= base_url('/berita') ?>">Berita</a>
                                                </li>
                                                <li><a href="<?= base_url('/akomodasi') ?>">akomodasi</a>
                                                </li>
                                                <li><a href="<?= base_url('/restoran') ?>">Restoran</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li><a href="<?= base_url('/galeri') ?>">Galeri</a>
                                        </li>
                                        <li><a href="<?= base_url('/agenda') ?>">Agenda</a>
                                        </li>
                                        <li><a href="<?= base_url('/kontak') ?>">Kontak</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                            <div class="social_wrap d-flex align-items-center justify-content-end">
                                <div class="number">
                                    <p> <i class="fa fa-phone"></i> 10(256)-928 256</p>
                                </div>
                                <div class="social_links d-none d-xl-block">
                                    <ul>
                                        <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="seach_icon">
                            <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->