<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-LEARNING SMP 3 Bungku</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Data -->
    <?php if (session()->get('level') == "Admin") : ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Data Kelas Online -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('kelasonline') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Kelas Online</span>
            </a>
        </li>
        <!-- Nav Item - Data Kelas Online -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('pesertakelasonline') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Peserta Kelas Online</span>
            </a>
        </li>
        <!-- Nav Item - Data Admin -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('admin') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Admin</span>
            </a>
        </li>
        <!-- Nav Item - Data Guru -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('guru') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Guru</span>
            </a>
        </li>
        <!-- Nav Item - Data Siswa -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('siswa') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Siswa</span>
            </a>
        </li>
        <!-- Nav Item - Data Mata Pelajaran -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('mapel') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Mata Pelajaran</span>
            </a>
        </li>
        <!-- Nav Item - Data Kelas -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('kelas') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Kelas</span>
            </a>
        </li>

    <?php elseif (session()->get('level') == "Guru") : ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('gurukelasonline/dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Data Kelas Online -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('gurukelasonline'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Kelas Online</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('guru'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Data LogIn Guru</span>
            </a>
        </li>

    <?php else : ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('siswakelasonline/dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Data Kelas Online -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('siswakelasonline'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Kelas Online</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('siswa'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Data LogIn Siswa</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->