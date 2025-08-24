<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link rel="stylesheet" href="<?= base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
  <style>
    body.login-page {
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-box {
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      border-radius: 16px;
      background: rgba(255,255,255,0.95);
      padding: 2rem 1rem;
    }
    .login-logo img {
      width: 64px;
      margin-bottom: 10px;
    }
    .btn-primary {
      background: linear-gradient(90deg, #2575fc 0%, #6a11cb 100%);
      border: none;
      transition: background 0.3s;
    }
    .btn-primary:hover {
      background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
    }
    @media (max-width: 576px) {
      .login-box {
        padding: 1rem 0.5rem;
      }
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo text-center">
    <img src="<?= base_url('adminlte/dist/img/AdminLTELogo.png') ?>" alt="Logo">
    <h2 style="font-weight:700; color:#2575fc; margin-bottom:0;">Admin Login</h2>
  </div>
  <div class="card border-0">
    <div class="card-body login-card-body">
      <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>
      <form action="<?= base_url('admin/login') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
    </div>
  </div>
</div>
<script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
