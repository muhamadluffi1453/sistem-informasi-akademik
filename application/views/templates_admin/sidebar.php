

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-university "></i>
        </div>
        <div class="sidebar-brand-text mx-3">SISTEM INFORMASI AKADEMIK</div>
      </a>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard/index'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('krs/index'); ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>KRS</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('nilai/index'); ?>">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>KHS</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('transkrip_nilai/index'); ?>">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Transkrip Nilai</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('nilai/input_nilai') ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>Input Nilai</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('tahun_akademik/index'); ?>">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Tahun Akademik</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('datamahasiswa/index'); ?>">
          <i class="fas fa-fw fa-user-graduate"></i>
          <span>Mahasiswa</span></a>
      </li>

      

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('prodi/index'); ?>">
          <i class="fas fa-fw fa-university"></i>
          <span>Prodi</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('user_akademik/index'); ?>">
          <i class="fas fa-fw fa-university"></i>
          <span>User Akademik</span></a>
      </li>

      <!-- <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('barang/index'); ?>">
          <i class="fas fa-fw fa-university"></i>
          <span>Barang</span></a>
      </li> -->

      <!-- Nav Item - Utilities Collapse Menu -->
      
      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-bullhorn"></i>
          <span>Info Kampus</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sub-Menu Info Kampus:</h6>
            <a class="collapse-item" href="<?= base_url('identitas/index'); ?>">Identitas</a>
            <a class="collapse-item" href="<?= base_url('hubungi_kami/index') ?>">Pesan User</a>
            <a class="collapse-item" href="<?= base_url('informasi/index'); ?>">Informasi Kampus</a>
            <a class="collapse-item" href="<?= base_url('tentang_kampus/index') ?>">Tentang Kampus</a>
            <a class="collapse-item" href="blank.html">Materi Perkuliahan</a>
            <a class="collapse-item" href="blank.html">Kontak</a>
          </div>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    