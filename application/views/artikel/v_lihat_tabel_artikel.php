<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Artikel</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Artikel</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <?php $this->load->view('templates/message.php'); ?>

    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Artikel</h3>
        </div>

        <div class="card-body">
          <a href="<?php echo base_url() . 'Mengelola_Artikel/tambah_artikel' ?>"><button type="button" class="btn btn-primary">
              <i class="fas fa-plus"></i> Tambah artikel
            </button></a><br><br>

          <table id="tabel_artikel" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Tipe</th>
                <th>Deskripsi Singkat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
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
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
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
    $('#tabel_artikel').DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      ajax: {
        url: '<?php echo base_url() . 'Mengelola_Artikel/tampil_artikel'?>',
        dataSrc: ''
      },
      columns: [
        {
          "data":"id_artikel"
        },
        {
          "data":"judul_artikel"
        },
        {
          "data":"tipe_artikel"
        },
        {
          "data":"deskripsi_singkat"
        },
        {
          data: null,
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            return `<a class="btn btn-info btn-sm" href="<?php echo base_url() . 'Mengelola_Artikel/edit_artikel/' ?>${row.id_artikel}">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                    </a>
                    <a class="btn btn-danger btn-sm tombol-hapus" href="<?php echo base_url() . 'Mengelola_Artikel/hapus_artikel/' ?>${row.id_artikel}">
                      <i class="fas fa-trash">
                      </i>
                      Hapus
                    </a>`;
          }
        },
      ]
    });

    $(document).on('click', '.tombol-hapus', function(e) {
      e.preventDefault(); //untuk stop link href yang awal
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Artikel akan dihapus secara permanen',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      });
    });

    const sukses = $('.sukses').data('flashdata');

    if (sukses) {
      Swal.fire({
        title: 'Artikel',
        text: sukses,
        icon: 'success'
      });
    }

  });
</script>

</body>

</html>