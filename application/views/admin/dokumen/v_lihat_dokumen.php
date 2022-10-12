<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dokumen</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">Dokumen</li>
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
          <h3 class="card-title">Tabel Data Dokumen</h3>
        </div>

        <div class="card-body">
          <?php if ($this->session->userdata('level_user') == 1) { ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
              <i class="fas fa-plus"></i> Tambah dokumen
            </button><br><br>
          <?php } ?>

          <table id="list_dokumen" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Jenis Dokumen</th>
                <th>File</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>

        </div>
      </div>

      <?php if ($this->session->userdata('level_user') == 1) { ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Pengumpulan Dokumen</h3>
          </div>

          <div class="card-body">
            <table id="pengumpulan" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Pengumpul</th>
                  <th>Email Pengumpul</th>
                  <th>Jenis Dokumen</th>
                  <th>File</th>
                  <th>Tanggal Kumpul</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      <?php } ?>
    </div>
    <!-- modal untuk menampilkan form input dokumen -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Input Dokumen Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form class="form-submit" action="<?php echo base_url() . 'Dokumen/tambah_dokumen' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label for="jenisDokumen">Jenis dokumen</label>
                <input type="text" class="form-control" id="jenisDokumen" name="jenis" placeholder="Jenis dokumen">
                <div class="px-2 error_jenis clear" style="display: none">
                </div>
              </div>
              <div class="form-group">
                <label>File Input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="dokumen">
                    <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                <div class="px-2 error_dokumen clear" style="display: none">
                </div>
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                <div class="px-2 error_keterangan clear" style="display: none">
                </div>
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


    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</footer>

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
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
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

<!-- Page specific script -->
<script>
  $(document).ready(function() {
    $("#list_dokumen").DataTable({
      responsive: true,
      lengthChange: true,
      autoWidth: false,
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
        url: "<?php echo base_url() . 'Dokumen/tampil_dokumen' ?>",
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
          data: "jenis_dokumen"
        },
        {
          data: "dokumen",
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            return `<a href="<?php echo base_url() . 'Dokumen/view_file/' ?>${row.dokumen}" target="_blank">` + data + `</a>`;
          }
        },
        {
          data: "keterangan",
          sortable: false
        },
        {
          data: null,
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            return `<?php if ($this->session->userdata('level_user') == 1) { ?> <a class=" btn btn-primary btn-sm" href="<?php echo base_url() . 'uploadDokumen/' ?>${row.id_dokumen}" download>
                      <i class="fas fa-download">
                      </i>
                      Unduh
                    </a>
                    <a class="btn btn-info btn-sm" href="<?php echo base_url() . 'Dokumen/edit_dokumen/' ?>${row.id_dokumen}">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                    </a>
                    <a class="btn btn-danger btn-sm tombol-hapus" href="<?php echo base_url() . 'Dokumen/hapus_dokumen/' ?>${row.id_dokumen}">
                      <i class="fas fa-trash">
                      </i>
                      Hapus
                    </a>
                    <?php } ?>`
          }
        }
      ]
    });

    $("#pengumpulan").DataTable({
      responsive: true,
      lengthChange: true,
      autoWidth: false,
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
        url: "<?php echo base_url() . 'Dokumen/tampil_pengumpulan' ?>",
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
          data: "nama_lengkap_pengumpul"
        },
        {
          data: "email_pengumpul"
        },
        {
          data: "jenis_dokumen"
        },
        {
          data: "kumpul_dokumen"
        },
        {
          data: "tanggal_kumpul"
        },
        {
          data: null,
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            return `<a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'pengumpulanDokumen/' ?>${row.kumpul_dokumen}" download>
                        <i class="fas fa-download">
                        </i>
                        Download
                      </a>`
          }
        }
      ]
    });

    bsCustomFileInput.init();

    const sukses = $('.sukses').data('flashdata');

    if (sukses) {
      Swal.fire({
        title: 'Dokumen',
        text: sukses,
        icon: 'success'
      });
    }

    const gagal = $('.gagal').data('flashdata');

    if (gagal) {
      Swal.fire({
        title: 'Tidak Berhasil',
        text: gagal,
        icon: 'error'
      });
    }

    $(document).on('click', '.tombol-hapus', function(e) {
      e.preventDefault();
      const href = $(this).attr('href')

      Swal.fire({
        title: 'Apakah anda yakin dokumen ini akan dihapus?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ubah status'
      }).then((result) => {
        if (result.value) { //ini sama aja kayak == TRUE
          document.location.href = href;
        }
      });
    });

    $('.form-submit').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        dataType: "JSON",
        data: new FormData(this),
        contentType: false,
        //cache: false,
        processData: false,
        beforeSend: function() {
          $('.simpan').attr('disable', 'disabled');
          $('.simpan').html('<i class="fa fa-spin fa-spinner"></i>');
        },
        complete: function() {
          $('.simpan').removeAttr('disable');
          $('.simpan').html('Submit');
        },
        success: function(respon) {
          if (respon.sukses == false) {
            if (respon.error_jenis) {
              $('.error_jenis').show();
              $('.error_jenis').html(respon.error_jenis);
              $('.error_jenis').css("color", "red");
            } else {
              $('.error_jenis').hide();
            }
            if (respon.error_dokumen) {
              $('.error_dokumen').show();
              $('.error_dokumen').html(respon.error_dokumen);
              $('.error_dokumen').css("color", "red");
            } else {
              $('.error_dokumen').hide();
            }
            if (respon.error_keterangan) {
              $('.error_keterangan').show();
              $('.error_keterangan').html(respon.error_keterangan);
              $('.error_keterangan').css("color", "red");
            } else {
              $('.error_keterangan').hide();
            }
          } else {
            $('.clear').hide();
            Swal.fire({
              title: 'Sukses',
              text: respon.sukses,
              icon: 'success',
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