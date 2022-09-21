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
            <li class="breadcrumb-item active">Laporan</li>
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
          <h3 class="card-title">Laporan</h3>
        </div>

        <div class="card-body">

          <table id="tabel_laporan" class="table table-bordered table-striped" style="width: 100%;">
            <thead>
              <tr>
                <th>#</th>
                <th>Tanggal Pencatatan</th>
                <th style="text-align: left;">Saldo Awal</th>
                <th style="text-align: left;">Uang Masuk</th>
                <th style="text-align: left;">Uang Keluar</th>
                <th style="text-align: left;">Saldo Akhir</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
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
    $('#tabel_laporan').DataTable({
      /*   "responsive": true,
         "lengthChange": true,
         "autoWidth": false, */
      "scrollX": true,
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
        url: "<?php echo base_url() . 'keuangan/lihat_laporan' ?>",
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
          "data": "tanggal_pencatatan"
        },
        {
          "data": "saldo_awal",
          "className": "dt-body-right"
        },
        {
          "data": "uang_masuk",
          "className": "dt-body-right"
        },
        {
          "data": "uang_keluar",
          "className": "dt-body-right"
        },
        {
          "data": "saldo_akhir",
          "className": "dt-body-right"
        }, {
          data: null,
          name: null,
          sortable: false,
          render: function(type, data, row, meta) {
            if (row.is_debit == "1") {
              return `<a class="btn btn-primary btn-sm" href="<?php echo base_url() . '' ?>${row.id_keuangan}">
                         <i class="fas fa-eye"></i> Detail
                        </a>`;
            }
            if (row.is_kredit == "1") {
              return `<a class="btn btn-primary btn-sm" href="<?php echo base_url() . '' ?>${row.id_keuangan}">
                         <i class="fas fa-eye"></i> Details
                        </a>`;
            }

          }
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