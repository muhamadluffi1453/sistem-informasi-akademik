

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
        Dosen
      </div>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dosen1/dashboard_dosen') ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>Dashboard</a></span>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dosen1/nilai_dsn/input_nilai') ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>Input Nilai</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dosen1/info_jadwalmengajar'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Info Jadwal Mengajar</span></a>
      </li>

      <hr class="sidebar-divider">

        

      

      

      

      


      

      

      

      

      

     

      

     


     


     

      
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

    