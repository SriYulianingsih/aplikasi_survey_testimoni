<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    /* Sidebar tetap sticky/full height */
    .main-sidebar {
        position: fixed; /* tetap di tempat */
        top: 0;
        left: 0;
        height: 100vh; /* tinggi 100% viewport */
        overflow-y: auto; /* scroll di dalam sidebar jika terlalu panjang */
        z-index: 1000;
    }

    /* Konten utama agar tidak tertutup sidebar */
    .content-wrapper {
        margin-left: 250px; /* sesuaikan dengan lebar sidebar AdminLTE default */
        min-height: 100vh;
        padding: 20px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Header -->
  <?= $this->include('admin/layout/header') ?>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
    <?= $this->include('admin/layout/sidebar') ?>
  </aside>

  <!-- Konten Dinamis -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid" id="ajax-content">
        <?= $this->renderSection('content') ?>
      </div>
    </section>
  </div>

  <!-- Footer -->
  <?= $this->include('admin/layout/footer') ?>

</div>

<script>
  // Klik menu sidebar → load konten via AJAX
  $(document).on("click", ".menu-link", function(e) {
    e.preventDefault();
    let url = $(this).data("url");

    $("#ajax-content").html("<p>Loading...</p>");
    $.get(url, function(data) {
      $("#ajax-content").html(data);
    }).fail(function() {
      $("#ajax-content").html("<p class='text-danger'>Gagal memuat konten.</p>");
    });
  });
</script>

</body>
</html>
