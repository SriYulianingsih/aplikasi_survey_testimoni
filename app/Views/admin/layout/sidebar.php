<!-- Main Sidebar Container -->

  <!-- Brand Logo -->
  <a href="#" class="brand-link d-flex align-items-center">
    <img src="<?= base_url('uploads/logo_klinik.png') ?>" 
         alt="Logo Klinik" 
         style="height:45px; width:auto; margin-right:10px;">

    <div class="brand-text">
        <span class="font-weight-bold d-block" style="font-size:1.1rem;">HealthSurvey</span>
        <span class="font-weight-light d-block" style="font-size:0.85rem;">Admin Dashboard</span>
    </div>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

        <!-- Menu Utama -->
        <li class="nav-header">MENU UTAMA</li>

        <!-- Statistik Survey -->
        <li class="nav-item">
          <a href="<?= base_url('admin/statistik') ?>" class="nav-link" 
             class="nav-link menu-link active" 
             data-url="<?= base_url('admin/content') ?>">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Statistik Survey</p>
          </a>
        </li>

        <!-- Daftar Hasil Survey -->
        <li class="nav-item">
          <a href="<?= base_url('admin/hasil') ?>" 
             class="nav-link menu-link" 
             data-url="<?= base_url('admin/hasil') ?>">
            <i class="nav-icon fas fa-poll"></i>
            <p>Daftar Hasil Survey</p>
          </a>
        </li>

        <!-- Daftar Testimoni -->
        <li class="nav-item">
          <a href="<?= base_url('admin/testimoni') ?>" 
             class="nav-link menu-link" 
             data-url="<?= base_url('admin/testimoni') ?>">
            <i class="nav-icon fas fa-comments"></i>
            <p>Daftar Testimoni</p>
          </a>
        </li>

        <!-- Kelola Admin -->
        <li class="nav-item">
          <a href="<?= base_url('admin/kelola-admin') ?>" 
             class="nav-link menu-link" 
             data-url="<?= base_url('admin/kelola-admin') ?>">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>Kelola Admin</p>
          </a>
        </li>

        <!-- Tombol Logout -->
        <li class="nav-item mt-3">
          <a href="<?= base_url('/admin/logout') ?>" 
             class="nav-link text-danger border border-danger rounded">
            <i class="fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
  <!-- /.sidebar -->
