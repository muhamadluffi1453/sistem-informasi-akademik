

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

      

        <!-- Heading -->
      <div class="sidebar-heading">
        Mahasiswa
      </div>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('mahasiswa/dashboard_mhs/index'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

       <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('mahasiswa/krs/index'); ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>KRS</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('mahasiswa/nilai/index'); ?>">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>KHS</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('mahasiswa/jadwal_kuliah/index'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Jadwal Kuliah</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('mahasiswa/infojadwal_ujian/index'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>  Info Jadwal Ujian</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
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

    