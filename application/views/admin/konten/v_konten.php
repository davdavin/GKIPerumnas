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
        </li> -->
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
          <h1>Konten Website</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">Konten</li>
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
          <h3 class="card-title"> Daftar Konten Slide</h3>
        </div>

        <div class="card-body">
          <table id="konten_slide" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Judul Slide</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Daftar Konten Foto Ibadah</h3>
        </div>

        <div class="card-body">
          <p>Foto ibadah yang ditampilkan pada momen tertentu seperti palma, paskah, natal </p>
          <table id="foto_ibadah" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Momen</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!--        <?php
                          /* foreach ($kontenFotoIbadah as $list_foto_ibadah) { ?>
                <tr>
                  <td><?php echo $list_foto_ibadah->id_foto_ibadah ?></td>
                  <td><?php echo $list_foto_ibadah->momen ?></td>
                  <td>
                    <img src="<?php echo base_url(); ?>resources/assets/img/gallery/<?php echo $list_foto_ibadah->foto_ibadah; ?>" class="img-fluid" alt="fotoIbadah" width="200" height="200">
                  </td>
                  <td>
                    <a class="btn bg-green btn-sm" data-toggle="modal" data-target="#edit_foto<?php echo $list_foto_ibadah->id_foto_ibadah; ?>">
                      <i class="fas fa-image">
                      </i>
                      Lihat gambar
                    </a>
                  </td>
                </tr>
              <?php
              }  */ ?> -->
            </tbody>
          </table>
        </div>

      </div>

      <?php $no = 0;
      foreach ($kontenFotoIbadah as $list_foto_ibadah) {
        $no++; ?>
        <!-- modal untuk menampilkan form edit gambar -->
        <div class="modal fade" id="edit_foto<?php echo $list_foto_ibadah->id_foto_ibadah; ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Mengubah Gambar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img src="<?php echo base_url(); ?>resources/assets/img/gallery/<?php echo $list_foto_ibadah->foto_ibadah; ?>" class="img-fluid" alt="">
                <br><br>
                <form class="update-foto-ibadah" action="<?php echo base_url() . 'Konten/proses_edit_foto_ibadah' ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id_foto_ibadah" value="<?= $list_foto_ibadah->id_foto_ibadah ?>">
                    <input type="hidden" class="form-control" name="foto_lama" value="<?= $list_foto_ibadah->foto_ibadah  ?>">
                    <label>Update Slide</label><br>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="fotoIbadah">
                        <label class="custom-file-label" for="exampleInputFile">Pilih file (Maks size file 100 MB)</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    <div class="p-2 error_upload clear" style="display:none"></div>
                  </div>
                  <button type="submit" class="btn btn-block btn-primary btn-sm simpan">Update</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      <?php } ?>
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
<script src="<?php echo base_url(); ?>jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
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
  $(document).ready(function() {
    $("#konten_slide").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": false,
      ajax: {
        url: `<?php echo base_url() . 'Konten/tampil_slide' ?>`,
        dataSrc: ''
      },
      columns: [{
          "data": "id_slide"
        },
        {
          "data": "judul_slide"
        },
        {
          sortable: false,
          "data": "deskripsi_slide"
        },
        {
          data: "gambar_slide",
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            return `<img src="<?php echo base_url(); ?>resources/assets/img/slide/${row.gambar_slide}" class="img-fluid" alt="` + data + `" width="200" height="200">`;
          }
        },
        {
          data: null,
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            return `<a class="btn btn-info btn-sm" href="<?php echo base_url() . 'Konten/edit_tulisan/' ?>${row.id_slide}">
                    <i class="fas fa-pencil-alt"></i> Edit
                  </a>`;
          }
        }
      ]
    });

    $("#foto_ibadah").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": false,
      ajax: {
        url: `<?php echo base_url() . 'Konten/tampil_foto_ibadah' ?>`,
        dataSrc: ''
      },
      columns: [{
          "data": "id_foto_ibadah"
        },
        {
          "data": "momen"
        },
        {
          data: "foto_ibadah",
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            return `<img src="<?php echo base_url(); ?>resources/assets/img/gallery/${row.foto_ibadah}" class="img-fluid" alt="` + data + `" width="25%" height="25%">`;
          }
        },
        {
          data: null,
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            return `<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_foto${row.id_foto_ibadah}">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                    </a>`;
          }
        }
      ]
    });

    bsCustomFileInput.init();

    const sukses = $('.sukses').data('flashdata');

    if (sukses) {
      Swal.fire({
        title: 'Konten',
        text: sukses,
        icon: 'success'
      });
    }

    const gagal = $('.gagal').data('flashdata');

    if (gagal) {
      Swal.fire({
        title: 'Tidak Berhasil ',
        text: gagal,
        icon: 'error'
      });
    }

    $('.update-foto-ibadah').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        //cache: false,
        processData: false,
        beforeSend: function() {
          $('.simpan').html('<i class="fa fa-spin fa-spinner"></i>');
          $('.simpan').attr('disabled', 'disabled');
        },
        complete: function() {
          $('.simpan').removeAttr('disabled');
          $('.simpan').html('Update');
        },
        success: function(respon) {
          if (respon.sukses == false) {
            if (respon.error_foto) {
              $('.error_upload').show();
              $('.error_upload').html(respon.error_foto);
              $('.error_upload').css("color", "red");
            } else {
              $('.error_foto').hide();
            }
          } else {
            $('.clear').hide();
            Swal.fire({
              title: 'Sukses',
              text: respon.sukses,
              icon: 'success',
              showConfirmButton: false,
              timer: 1000,
            }).then((confirmed) => {
              window.location.reload();
            });
          }
        }
      });
    });

  });
</script>

</body>

</html>