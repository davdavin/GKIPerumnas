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
          <a href="<?php echo base_url() . 'Pendeta' ?>" class="nav-link">
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
        <!--     <li class="nav-item">
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
                <p>Tabel Artikel</p>
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
          <a href="<?php echo base_url() . 'Konten' ?>" class="nav-link active">
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
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Konten</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Konten</li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Mengubah Tulisan</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php foreach ($kontenSlide as $list_edit) { ?>
        <form action="<?php echo base_url() . 'Konten/proses_edit_slide' ?>" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" name="id_slide" value="<?= $list_edit->id_slide; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Judul</label>
              <input type="text" class="form-control" name="judul_slide" value="<?= $list_edit->judul_slide; ?>" required>
            </div>
            <div class="form-group">
              <label>Deskripsi Singkat</label>
              <textarea id="textArea" class="form-control" name="deskripsi_slide"><?= $list_edit->deskripsi_slide; ?></textarea>
            </div>
            <div class="form-group">
                  <label>Foto</label><br>
                  <input type="hidden" name="gambar_lama" value="<?= $list_edit->gambar_slide ?>">
                  <img src="<?php echo base_url(); ?>resources/assets/img/slide/<?php echo $list_edit->gambar_slide; ?>" class="img-fluid" style="width: 50%;"><br><br>
                  <input type="file" name="gambar_baru">
                </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary tombol-ubah">Ubah</button>
          </div>
        </form>
      <?php } ?>
    </div>
    <!-- /.container-fluid -->
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
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- tinymce -->
<script src="<?php echo base_url(); ?>resources/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>resources/tinymce/jquery.tinymce.min.js"></script>

<script>
  $(function() {
    $('#tanggalPembuatan').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    tinymce.init({
      selector: 'textarea#textArea',
      height: 200,
      plugins: ['code'],
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

    $('.tombol-ubah').click(function(e) {
      e.preventDefault();
      const form = $(this).parents('form');

      Swal.fire({
        title: 'Apakah anda yakin?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ubah Data'
      }).then((result) => {
        if (result.value) {
          form.submit();
        }
      });
    });

  });
</script>
</body>

</html>