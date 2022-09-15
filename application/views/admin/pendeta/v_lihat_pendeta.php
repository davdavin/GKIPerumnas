<div class="content-wrapper">
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
          <h3 class="card-title">Tabel Data Pendeta</h3>
        </div>

        <div class="card-body">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-plus"></i> Tambah pendeta
          </button><br><br>

          <table id="tabel_pendeta" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>No Pendeta</th>
                <th>Nama Lengkap</th>
                <th>No Hp</th>
                <th>Tanggal Lahir</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>

      </div>
    </div>
    <!-- modal untuk menampilkan form input pendeta -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Input Pendeta Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo base_url() . 'Pendeta/tambah_pendeta' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Lengkap Pendeta</label>
                <input type="text" class="form-control" name="nama_pendeta" placeholder="Nama Pendeta" required>
              </div>
              <div class="form-group">
                <label>Alamat Pendeta</label>
                <input type="text" class="form-control" name="alamat_pendeta" placeholder="Alamat Pendeta" required>
              </div>

              <!-- phone mask -->
              <div class="form-group">
                <label>Nomor HP (Indonesia):</label>

                <div class="input-group">
                  <input type="text" class="form-control" data-inputmask='"mask": "089999999999[9][9][9]"' data-mask name="nohp" required>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Email Pendeta</label>
                <input type="email" class="form-control" name="email_pendeta" placeholder="Email Pendeta" required>
              </div>

              <!-- jenis kelamin -->
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control select2bs4" style="width: 100%;" name="jenis_kelamin" required>
                  <option selected disabled value>-- Pilih --</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="tm form-control" name="tanggal_lahir" id="tanggalLahir" required>
              </div>

              <!-- Foto -->
              <div class="form-group">
                <label>File Input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="foto" required>
                    <label class="custom-file-label" for="exampleInputFile">Pilih file (Maks size file 100 MB)</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>

              <!-- status -->
              <div class="form-group">
                <label>Status</label>
                <select class="form-control select2bs4" style="width: 100%;" name="status" required>
                  <option selected disabled value>Status</option>
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>
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
<!-- flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
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

<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
  /* $(document).ready(function() {
   

  }); */

  $(function() {
    $('#tabel_pendeta').DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      ajax: {
        url: "<?php echo base_url() . 'Pendeta/tampil_pendeta' ?>",
        dataSrc: ""
      },
      columns: [{
          "data": "id_pendeta"
        },
        {
          "data": "no_pendeta"
        },
        {
          "data": "nama_lengkap_pendeta"
        },
        {
          "data": "nohp_pendeta"
        },
        {
          "data": "tanggal_lahir_pendeta"
        },
        {
          data: null,
          name: null,
          sortable: true, //sort
          render: function(data, type, row, meta) {
            switch (row.status_pendeta) { //row.status_pendeta itu maksudnya status_pendeta di row ini 
              case "1":
                return `<span class="badge badge-success">Aktif</span>`;
                break;
              default:
                return `<span class="badge badge-danger">Tidak Aktif</span>`;
                break;
            }
          }
        },
        {
          data: null,
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            switch (row.status_pendeta) {
              case "1":
                return `<a class="btn btn-primary btn-sm" href="<?php echo base_url('Pendeta/detail_pendeta') ?>/${row.id_pendeta}"><i class="fas fa-eye"></i> Detail</a>
                          <a class="btn btn-info btn-sm" href="<?php echo base_url('Pendeta/edit_pendeta') ?>/${row.id_pendeta}"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a id="tombol" class="btn btn-danger btn-sm" href="<?php echo base_url('Pendeta/hapus_pendeta') ?>/${row.id_pendeta}" ><i class="fas fa-trash"></i> Hapus </a>`;
                break;
              default:
                return `<a class="btn btn-primary btn-sm" href="<?php echo base_url('Pendeta/detail_pendeta') ?>/${row.id_pendeta}"><i class="fas fa-eye"></i> Detail</a>
                          <a class="btn btn-info btn-sm" href="<?php echo base_url('Pendeta/edit_pendeta') ?>/${row.id_pendeta}"><i class="fas fa-pencil-alt"></i> Edit</a>`;
                break;
            }
          }
        },
      ]
    });

    $(document).on('click', '#tombol', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Status data akan diubah menjadi tidak aktif',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ubah status'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      });
    });

    $('[data-mask]').inputmask();

    bsCustomFileInput.init();

    $('#tanggalLahir').flatpickr({
      //   minDate: "today",
      altInput: true,
      //allowInput: true,
      altFormat: "d/m/Y", //j F Y
      dateFormat: "Y-m-d",
      locale: "id"
    });

    const sukses = $('.sukses').data('flashdata');

    if (sukses) {
      Swal.fire({
        title: 'Data Pendeta ',
        text: sukses,
        icon: 'success'
      });
    }

  });

  /* $('.tm').on("change", function() {
     this.setAttribute(
       "data-date",
       moment(this.value, "YYYY-MM-DD")
       .format(this.getAttribute("data-date-format"))
     )
   }).trigger("change"); */
</script>

</body>

</html>