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
          <a href="<?php echo base_url() . 'Wilayah' ?>" class="nav-link active">
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
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Wilayah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Wilayah</li>
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
        <h3 class="card-title">Form Ubah Data Wilayah</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php foreach ($wilayahEdit as $list_wilayah_edit) { ?>
        <form method="post" action="<?php echo base_url() . 'Wilayah/proses_edit_wilayah' ?>">
          <div class="card-body">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" name="id_wilayah" value="<?= $list_wilayah_edit->id_wilayah ?>" readonly>
            </div>
            <div class="form-group">
              <label>Kode Wilayah</label>
              <input type="text" class="form-control" name="kode_wilayah" value="<?= $list_wilayah_edit->kode_wilayah ?>" readonly>
            </div>

            <input type="hidden" name="id_jemaat" id="id_jemaat">
            <div class="form-group">
              <label>Koordinator Wilayah</label>
              <div class="input-group">
                <input type="text" class="form-control" name="koordinator_wilayah" id="korwil" value="<?= $list_wilayah_edit->nama_lengkap_anggota ?>" readonly />
                <div class="input-group-append" data-target="#modal-jemaat" data-toggle="modal">
                  <div class="input-group-text"><i class="fa fa-search"></i></div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Nama Wilayah</label>
              <input type="text" class="form-control" name="nama_wilayah" value="<?= $list_wilayah_edit->nama_wilayah ?>">
            </div>
          </div>
        <?php } ?>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary tombol-ubah">Ubah</button>
        </div>
        </form>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <div class="modal fade" id="modal-jemaat">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pilih Calon Koordinator Wilayah</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <table id="tabel_jemaat" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No Anggota</th>
                  <th>Nama Jemaat</th>
                  <th>Wilayah</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($jemaat as $list_jemaat) { ?>
                  <tr>
                    <td><?php echo $list_jemaat->no_anggota ?></td>
                    <td><?php echo $list_jemaat->nama_lengkap_anggota ?></td>
                    <td><?php echo $list_jemaat->nama_wilayah ?></td>
                    <td>
                      <!--  <a class="btn btn-primary btn-sm" href="#">
                                  <i class="fas fa-eye">
                                  </i>
                                  Detail
                              </a> -->
                      <button class="btn btn-sm bg-blue" id="select" data-id="<?= $list_jemaat->id_anggota ?>" data-nama="<?= $list_jemaat->nama_lengkap_anggota ?>">
                        <i class="fas fa-check"></i> Select
                      </button>
                    </td>
                  </tr>
                <?php
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
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

<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function() {
    $("#tabel_jemaat").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false
    });

    $(document).on('click', '#select', function() {
      var id_jemaat = $(this).data('id');
      var nama_jemaat = $(this).data('nama');
      $("#id_jemaat").val(id_jemaat);
      $("#korwil").val(nama_jemaat);
      $("#modal-jemaat").modal('hide');
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