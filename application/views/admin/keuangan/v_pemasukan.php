<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Keuangan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">Keuangan</li>
            <li class="breadcrumb-item active">Pemasukan</li>
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
          <h3 class="card-title">Pemasukan</h3>
        </div>

        <div class="card-body">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-plus"></i> Pencatatan
          </button><br><br>

          <table id="tabel_keuangan" class="table table-bordered table-striped" style="width: 100%;">
            <thead>
              <tr>
                <th>#</th>
                <th>Kegiatan</th>
                <th style="text-align: left;">Nominal</th>
                <th>Tanggal Masuk</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
    </div>
    <!-- modal untuk menampilkan form input admin -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-top: 10px solid #428bca;">
          <div class="modal-header">
            <h4 class="modal-title">Input Pencatatan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-submit" action="<?php echo base_url() . 'keuangan/input_pencatatan'  ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>Kegiatan</label>
                <input type="text" class="form-control" id="kegiatan" name="kegiatan" placeholder="Kegiatan" required>
                <!-- INFO ERROR -->
                <div class="px-2 error_kegiatan clear" style="display: none">
                </div>
              </div>
              <div class="form-group">
                <label>Nominal</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                  </div>
                  <input type="number" class="form-control" id="nominal" name="nominal" required>
                </div>
              </div>
              <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal_masuk" required>
                <div class="px-2 error_tanggal" style="display: none">
                </div>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                <!-- INFO ERROR -->
                <div class="px-2 error_keterangan clear" style="display: none">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="tombolSimpan">Submit</button>
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
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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

<script>
  $(document).ready(function() {
    $('#tabel_keuangan').DataTable({
      /*   "responsive": true,
         "lengthChange": true,
         "autoWidth": false, */
      "scrollX": true,
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
        url: "<?php echo base_url() . 'keuangan/tampil_keuangan' ?>",
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
          "data": "kegiatan",
        },
        {
          "data": "nominal",
          "className": "dt-body-right"
        },
        {
          "data": "tanggal_masuk"
        },
        {
          "data": "keterangan",
          sortable: false
        }, {
          data: null,
          name: null,
          sortable: false,
        }
      ]
    });

    $('[data-mask]').inputmask();

    const sukses = $('.sukses').data('flashdata');
    if (sukses) {
      Swal.fire({
        title: 'Pencatatan',
        text: sukses,
        icon: 'success'
      });
    }

    const gagal = $('.gagal').data('flashdata');

    if (gagal) {
      Swal.fire({
        title: 'Pencatatan',
        text: gagal,
        icon: 'error'
      });
    }
  });
</script>

</body>

</html>