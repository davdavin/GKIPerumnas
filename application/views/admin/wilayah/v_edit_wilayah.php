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
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Wilayah' ?>">Wilayah</a></li>
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
      <?php foreach ($wilayahEdit as $list_wilayah_edit) {
        $koordinator = $list_wilayah_edit->nama_lengkap_anggota; ?>
        <form method="post" action="<?php echo base_url() . 'Wilayah/proses_edit_wilayah' ?>">
          <div class="card-body">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" name="id_wilayah" value="<?= $list_wilayah_edit->id_wilayah ?>" readonly>
            </div>

            <div class="form-group">
              <label>Koordinator Wilayah</label>
              <input type="hidden" name="koordinator_wilayah_sekarang" value="<?= $list_wilayah_edit->id_anggota ?>">
              <select class="pilih-jemaat form-control" name="koordinator_wilayah_baru"></select>
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
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
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

    $('.pilih-jemaat').select2({
      placeholder: '<?php echo $koordinator; ?>',
      //  minimumInputLength: 3,
      language: {
        inputTooShort: function(args) {
          var chars = args.minimum - args.input.length;
          if (chars == args.minimum) {
            return "Masukan minimal " + chars + " atau lebih karakter";
          } else {
            return "Masukan " + chars + " huruf lagi";
          }
        },
        searching: function() {
          return "Mencari...";
        },
        noResults: function() {
          return "Tidak ada data yang sesuai";
        }
      },
      ajax: {
        url: "<?php echo base_url() . 'Wilayah/nama_jemaat_per_wilayah/' . $id_wilayah ?>",
        type: 'POST',
        dataType: 'JSON',
        delay: 250,
        data: function(params) {
          return {
            searchJemaat: params.term
          };
        },
        processResults: function(data) {
          return {
            results: data,
          };
        },
      },
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