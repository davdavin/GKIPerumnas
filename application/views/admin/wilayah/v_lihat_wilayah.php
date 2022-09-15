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
        <!--   <li class="nav-item">
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
          <a href="<?php echo base_url() . 'logout' ?>" class="nav-link">
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
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">Wilayah</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Untuk memunculkan message berhasil tambah dan ubah data-->
    <?php $this->load->view('templates/message.php'); ?>
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Wilayah</h3>
        </div>

        <div class="card-body">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-plus"></i> Tambah wilayah
          </button><br><br>

          <table id="tabel_wilayah" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Kode Wilayah</th>
                <th>Koordinator Wilayah</th>
                <th>Nama Wilayah</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>
    </div>
    <!-- modal untuk menampilkan form input wilayah -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Input Wilayah Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="<?php echo base_url() . 'Wilayah/tambah_wilayah' ?>" method="post">
            <div class="modal-body">
              <input type="hidden" name="id_jemaat" id="id_jemaat">
              <div class="form-group">
                <label>Koordinator Wilayah</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="koordinator_wilayah" id="korwil" required readonly />
                  <div class="input-group-append" data-target="#modal-jemaat" data-toggle="modal">
                    <div class="input-group-text"><i class="fa fa-search"></i></div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Nama Wilayah</label>
                <input type="text" class="form-control" name="nama_wilayah" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

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

    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
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
    $("#tabel_wilayah").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "language": {
        "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "lengthMenu": "Tampilkan _MENU_ entri",
        "loadingRecords": "Sedang memuat...",
        "processing": "Sedang memproses...",
        "search": "Cari:",
        "zeroRecords": "Tidak ditemukan data yang sesuai",
        "thousands": "'",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Selanjutnya",
          "previous": "Sebelumnya"
        }
      },
      ajax: {
        url: "<?php echo base_url() . 'Wilayah/tampil_wilayah' ?>",
        dataSrc: ""
      },
      columns: [{
          "data": "id_wilayah"
        },
        {
          "data": "kode_wilayah"
        },
        {
          "data": "nama_lengkap_anggota"
        },
        {
          "data": "nama_wilayah"
        },
        {
          "data": null,
          name: null,
          render: function(data, type, row, meta) {
            return `<a class="btn btn-info btn-sm" href="<?php echo base_url() . 'Wilayah/edit_wilayah/'?>${row.id_wilayah}">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                    </a>
                    <a id="tombol-hapus" class="btn btn-danger btn-sm" href="<?php echo base_url() . 'Wilayah/hapus_wilayah/'?>${row.id_wilayah}">
                      <i class="fas fa-trash">
                      </i>
                      Hapus
                    </a>`;
          }
        }
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $(document).on('click', '#tombol-hapus', function(e) {
      e.preventDefault(); //untuk stop link href yang awal
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Data wilayah akan dihapus secara permanen',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) { //ini sama aja kayak == TRUE
          document.location.href = href;
        }
      });
    });

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

    const sukses = $('.sukses').data('flashdata');

    if (sukses) {
      Swal.fire({
        title: 'Data Wilayah',
        text: sukses,
        icon: 'success'
      });
    }


  });
</script>

</body>

</html>