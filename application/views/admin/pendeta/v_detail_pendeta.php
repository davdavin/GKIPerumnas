<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link bg-navy">
    <img src="<?php echo base_url(); ?>assets/dist/img/logo.jpg" alt="Logo GKI Perumnas" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">GKI Perumnas</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar bg-navy">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $this->session->userdata('username'); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url() . 'Dashboard' ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> Dashboard </p>
          </a>
        </li>
        <li class="nav-item">
          <!-- <li class="nav-item menu-open"> -->
          <a href="<?php echo base_url() . 'Admin' ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p> Admin </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url() . 'Anggota_Jemaat' ?>" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
            <p> Anggota Jemaat </p>
          </a>
        </li>
        <!--     <li class="nav-item">
          <a href="<?php echo base_url() . 'BaptisAnak' ?>" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
            <p> Baptis Anak </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url() . 'Sidi' ?>" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
            <p> Sidi </p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="<?php echo base_url() . 'Pendeta' ?>" class="nav-link active">
            <i class="nav-icon fas fa-solid fa-user-friends"></i>
            <p> Pendeta </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url() . 'Wilayah' ?>" class="nav-link">
            <i class="nav-icon fas fa-map"></i>
            <p> Wilayah </p>
          </a>
        </li>
        <!--      <li class="nav-item">
          <a href="<?php echo base_url() . 'Ruangan' ?>" class="nav-link">
            <i class="nav-icon fas fa-door-open"></i>
            <p> Ruangan </p>
          </a>
        </li>-->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Artikel
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url() . 'Mengelola_Artikel' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelola Artikel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() . 'Mengelola_Artikel/tipe_artikel' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tipe Artikel</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url() . 'Dokumen' ?>" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p> Dokumen </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url() . 'Konten' ?>" class="nav-link">
            <i class="nav-icon fas fa-marker"></i>
            <p> Konten </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url() . 'Login_Admin/logout' ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p> Logout </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<div class=" content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pendeta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">Pendeta</li>
            <li class="breadcrumb-item active">Detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <?php foreach ($detailPendeta as $list_detail_pendeta) { ?>
            <div class="card p-3 mb-3">
              <div class="row">
                <div class="col-12">
                  <h4> Informasi Lengkap <?php echo $list_detail_pendeta->nama_lengkap_pendeta; ?></h4>
                </div><br><br><br>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <h5> <strong> ID </strong> </h5>
                  <p><?php echo $list_detail_pendeta->id_pendeta; ?></p>
                  <h5> <strong> No. Pendeta </strong> </h5>
                  <p><?php echo $list_detail_pendeta->no_pendeta; ?></p>
                  <h5> <strong> Nama Lengkap </strong> </h5>
                  <p><?php echo $list_detail_pendeta->nama_lengkap_pendeta; ?></p>
                  <h5> <strong> Alamat Pendeta </strong> </h5>
                  <p><?php echo $list_detail_pendeta->alamat_pendeta; ?></p>
                </div>
                <div class="col-sm-4">
                  <h5> <strong> Nomor Handphone </strong> </h5>
                  <p><?php echo $list_detail_pendeta->nohp_pendeta; ?></p>
                  <h5> <strong> Email </strong> </h5>
                  <p><?php echo $list_detail_pendeta->email_pendeta; ?></p>
                  <h5> <strong> Jenis Kelamin </strong> </h5>
                  <p><?php echo $list_detail_pendeta->jenis_kelamin_pendeta; ?></p>
                </div>
                <div class="col-sm-4">
                  <h5> <strong> Umur </strong> </h5>
                  <p><?php echo date('Y') - date_format(date_create($list_detail_pendeta->tanggal_lahir_pendeta), "Y"); ?></p>
                  <h5> <strong> Tanggal Lahir </strong> </h5>
                  <p>
                    <?php echo tanggal_indonesia($list_detail_pendeta->tanggal_lahir_pendeta); ?>
                  </p>
                  <h5> <strong> Status </strong> </h5>
                  <p>
                    <?php if ($list_detail_pendeta->status_pendeta == 1) {
                      echo 'Aktif';
                    } else {
                      echo 'Tidak Aktif';
                    }
                    ?>
                  </p>
                </div>
              </div>
              <div class="row col-sm-4">
                <h5> <strong> Foto</strong> </h5>
                <img src="<?php echo base_url(); ?>resources/assets/img/pendeta/<?php echo $list_detail_pendeta->foto_pendeta; ?>" class="img-fluid" alt="">
              </div>
            </div>
          <?php } ?>

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
</body>

</html>