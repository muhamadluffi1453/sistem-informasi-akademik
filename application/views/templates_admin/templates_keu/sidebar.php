

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
      Keuangan
      </div>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('keuangan/approval/index'); ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>Approval KRS</span></a>
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

    