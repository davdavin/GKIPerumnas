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
        <h3 class="card-title">Form Ubah Data Dokumen</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php foreach ($dokumenEdit as $list_dokumen_edit) { ?>
        <form class="form-submit" action="<?php echo base_url() . 'Dokumen/proses_edit_dokumen' ?>" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" name="id_dokumen" value="<?= $list_dokumen_edit->id_dokumen; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="jenisDokumen">Jenis dokumen</label>
              <input type="hidden" name="jenis_lama" value="<?= $list_dokumen_edit->jenis_dokumen ?>">
              <input type="text" class="form-control" id="jenisDokumen" name="jenis" value="<?= $list_dokumen_edit->jenis_dokumen; ?>">
              <div class="px-2 error_jenis clear" style="display: none">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File</label>
              <p>Dokumen saat ini: <a href="<?php echo base_url() . 'Dokumen/view_file/' . $list_dokumen_edit->nama_dokumen ?>"><?= $list_dokumen_edit->nama_dokumen ?></a></p>
              <div class="input-group">
                <div class="custom-file">
                  <input type="hidden" name="dokumen_lama" value="<?= $list_dokumen_edit->nama_dokumen ?>">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="dokumen_baru">
                  <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
                <div class="px-2 error_dokumen clear" style="display: none">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $list_dokumen_edit->keterangan; ?>">
              <div class="px-2 error_keterangan clear" style="display: none">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary simpan">Ubah</button>
          </div>
        </form>
      <?php } ?>
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

<script>
  $(function() {
    bsCustomFileInput.init();

    $('.form-submit').submit(function(e) {
      e.preventDefault();
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
          $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'JSON',
            data: new FormData(this),
            contentType: false,
            //  cache: false,
            processData: false,
            beforeSend: function() {
              $('.simpan').html('<i class="fa fa-spin fa-spinner"></i>');
              $('.simpan').attr('disabled', 'disabled');
            },
            complete: function() {
              $('.simpan').removeAttr('disabled');
              $('.simpan').html('Ubah');
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
                  window.location.href = "<?php echo base_url() . 'Dokumen' ?>";
                });
              }

            }
          });
        }
      });
    });

  });
</script>
</body>

</html>