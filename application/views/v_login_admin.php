<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin</title>

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" rel="icon">
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/assets/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <style>
    body {
      background-image: url("http://localhost/GKIPerumnas/resources/assets/img/slide/gedungbaruu.png");
      background-attachment: fixed;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Admin</b> GKI Perumnas
    </div>

    <!-- Alert jika username atau password salah-->
    <?php if ($this->session->has_userdata('gagal')) { ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i>Alert!</h5>
        <?php echo $this->session->flashdata('gagal'); ?>
      </div>
    <?php unset($_SESSION['gagal']);
    } ?>

    <?php if ($this->session->has_userdata('sukses')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>Alert!</h5>
        <?php echo $this->session->flashdata('sukses'); ?>
      </div>
    <?php unset($_SESSION['sukses']);
    } ?>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in</p>

        <form action="<?php echo base_url() . 'login/verifikasi' ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div><br>

          <a class="text-blue" type="button" data-toggle="modal" data-target="#modalForgot">
            Forgot Password
          </a>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>

    <div class="modal fade" id="modalForgot">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Masukan Email</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url() . 'forgot_password' ?>" method="post" class="form-forget">
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="email anda" required>
                <p class="p-2 error_email"></p>
              </div>
              <button type="submit" class="btn btn-block btn-primary btn-sm simpan">Submit</button>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets//plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function() {
      const sukses = $('.sukses').data('flashdata');
      if (sukses) {
        Swal.fire({
          title: 'Data User',
          text: sukses,
          icon: 'success'
        });
      }

      const gagal = $('.gagal').data('flashdata');

      if (gagal) {
        Swal.fire({
          title: 'Data User',
          text: gagal,
          icon: 'error'
        });
      }
    });
  </script>
</body>

</html>