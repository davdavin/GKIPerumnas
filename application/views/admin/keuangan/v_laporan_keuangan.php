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
            <?php if ($this->session->userdata('level_user') == 4) { ?>
              <li class="breadcrumb-item"><a href="<?php echo base_url() . 'keuangan' ?>">Keuangan</a></li>
              <li class="breadcrumb-item active">Laporan</li>
            <?php } else { ?>
              <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url() . 'keuangan' ?>">Keuangan</a></li>
              <li class="breadcrumb-item active">Laporan</li>
            <?php } ?>
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
                <th>No.</th>
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
  <?php $no = 0;
  foreach ($laporan as $detail) {
    $no++ ?>
    <div class="modal fade" id="pemasukan<?php echo $detail->id_keuangan; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Detail Pemasukan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <table class="table table-bordered table-striped">
              <tr>
                <th>Kegiatan</th>
                <td><?php echo $detail->kegiatan ?></td>
              </tr>
              <tr>
                <th>Tanggal Terima</th>
                <td><?php echo tanggal_indonesia($detail->tanggal_terima); ?></td>
              </tr>
              <tr>
                <th>Total</th>
                <td><?php echo mata_uang_indo($detail->uang_masuk); ?> </td>
              </tr>
              <tr>
                <th>Keterangan</th>
                <td><?php echo $detail->keterangan; ?></td>
              </tr>

            </table>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  <?php } ?>

  <?php $no = 0;
  foreach ($laporan as $detail) {
    $no++ ?>
    <div class="modal fade" id="pengeluaran<?php echo $detail->id_keuangan; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Detail Pengeluaran</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <table class="table table-bordered table-striped">
              <tr>
                <th>Kegiatan</th>
                <td><?php echo $detail->kegiatan ?></td>
              </tr>
              <tr>
                <th>Tanggal Keluar</th>
                <td><?php echo tanggal_indonesia($detail->tanggal_keluar); ?></td>
              </tr>
              <tr>
                <th>Total</th>
                <td><?php echo mata_uang_indo($detail->uang_keluar); ?> </td>
              </tr>
              <tr>
                <th>Keterangan</th>
                <td><?php echo $detail->keterangan; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  <?php } ?>
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
      dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
        "<'row'<'col-md-12'tr>>" + "<'row'<'col-md-5'i><'col-md-7'p>>",
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
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
      "buttons": [{
          extend: 'pdfHtml5',
          //   className: 'btn-primary',
          orientation: 'potrait',
          pageSize: 'A4',
          title: 'Laporan Keuangan',
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5]
          }
          //   download: 'open'
        },
        {
          extend: 'copyHtml5',
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5]
          }
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5]
          }
        },
        {
          extend: 'print',
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5]
          }
        },
        'colvis'
      ],

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
        },
        {
          data: "id_keuangan",
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            if (row.is_debit == "1") {
              return `<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pemasukan` + data + `">
                <i class="fas fa-eye"></i> Detail </a>`;
            }
            if (row.is_kredit == "1") {
              return `<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pengeluaran` + data + `">
                         <i class="fas fa-eye"></i> Detail
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