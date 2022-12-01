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
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
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
          <h3 class="card-title"> Konten Slide</h3>
        </div>

        <div class="card-body">
          <table id="konten_slide" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Judul Slide</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <?php if ($this->session->userdata('level_user') == 1) { ?>
                  <th>Aksi</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Konten Foto Ibadah</h3>
        </div>

        <div class="card-body">
          <table id="foto_ibadah" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Momen</th>
                <th>Foto</th>
                <?php if ($this->session->userdata('level_user') == 1) { ?>
                  <th>Aksi</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Kontak </h3>
        </div>

        <div class="card-body">
          <table id="kontak" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>
      <!-- modal untuk menampilakn form edit -->
      <div class="modal fade" id="edit-kontak<?php echo $kontak['id_kontak']; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Edit Kontak</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="<?php echo base_url() . 'Konten/proses_edit_kontak' ?>" method="post">
              <div class="modal-body">
                <input type="hidden" class="form-control" name="id_kontak" value="<?= $kontak['id_kontak'] ?>">
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $kontak['alamat'] ?>" required>
                </div>

                <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $kontak['nohp'] ?>" required>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?= $kontak['email'] ?>" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
              <h4 class="modal-title">Form Edit Foto Ibadah</h4>
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
                      <input type="file" class="custom-file-input" id="foto" name="fotoIbadah" required>
                      <label class="custom-file-label" for="foto">Pilih foto (Maksimal 5MB)</label>
                    </div>
                  </div>
                  <div class="p-2 error_upload clear" style="display:none"></div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary simpan">Ubah</button>
                </div>
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
      "language": {
        "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
        "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "lengthMenu": "Tampilkan _MENU_ data",
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
        url: "<?php echo base_url() . 'Konten/tampil_slide' ?>",
        dataSrc: ""
      },
      columns: [{
          data: null,
          name: null,
          render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
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
      "language": {
        "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
        "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "lengthMenu": "Tampilkan _MENU_ data",
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
        url: "<?php echo base_url() . 'Konten/tampil_foto_ibadah' ?>",
        dataSrc: ""
      },
      columns: [{
          data: null,
          name: null,
          render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
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


    $("#kontak").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": false,
      "language": {
        "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
        "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "lengthMenu": "Tampilkan _MENU_ data",
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
        url: "<?php echo base_url() . 'Konten/tampil_kontak' ?>",
        dataSrc: ""
      },
      columns: [{
          data: null,
          name: null,
          render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {
          "data": "alamat"
        },
        {
          "data": "nohp"
        },
        {
          "data": "email"
        },
        {
          data: null,
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            return `<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-kontak${row.id_kontak}">
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
        title: 'Sukses',
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
              icon: 'success'
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