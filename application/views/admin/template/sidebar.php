<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon">
            <img style="height: 50px; width:40px;" src="<?= base_url('assets/home/assets/img/logo.png') ?>" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard Pariwisata</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($judul == 'Dashboard') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>
    <li class="nav-item <?= ($judul == 'Pengaturan Akun') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/pengaturanakun') ?>">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Pengaturan Akun</span>
        </a>
    </li>
    <!-- <li class="nav-item <?= ($judul == 'Tambah User') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/tambahuser') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Tambah User Admin</span>
        </a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pengelolaan
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-file-alt"></i>
            <span>Website</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Website :</h6>
                <a class="collapse-item" href="<?= base_url('admin/slider') ?>">
                    <i class="fab fa-fw fa-slideshare"></i>
                    <span>Slider</span>
                </a>
                <a class="collapse-item" href="<?= base_url('admin/galeri') ?>">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Galeri</span>
                </a>
            </div>
        </div>
    </li>



    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-file-alt"></i>
            <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data :</h6>
                <a class="collapse-item" href="<?= base_url('admin/wisata') ?>">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Wisata</span>
                </a>
                <a class="collapse-item" href="<?= base_url('admin/agenda') ?>">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Agenda</span>
                </a>
                <a class="collapse-item" href="<?= base_url('admin/restoran') ?>">
                    <i class="fas fa-fw fa-utensils"></i>
                    <span>Restoran</span>
                </a>
                <a class="collapse-item" href="<?= base_url('admin/akomodasi') ?>">
                    <i class="fas fa-hotel"></i>
                    <span>Akomodasi</span>
                </a>
                <a class="collapse-item" href="<?= base_url('admin/berita') ?>">
                    <i class="fas fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->