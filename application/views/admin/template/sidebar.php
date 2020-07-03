<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-school"></i>
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
        Website
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item <?= ($judul == 'Slider') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/slider') ?>">
            <i class="fab fa-fw fa-slideshare"></i>
            <span>Slider</span>
        </a>
    </li>
    <li class="nav-item <?= ($judul == 'Galeri') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/galeri') ?>">
            <i class="fas fa-fw fa-images"></i>
            <span>Galeri</span>
        </a>
    </li>
    <li class="nav-item <?= ($judul == 'Wisata') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/wisata') ?>">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Wisata</span>
        </a>
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