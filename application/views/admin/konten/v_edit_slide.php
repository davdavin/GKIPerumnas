<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Konten</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Konten' ?>">Konten</a></li>
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
        <h3 class="card-title">Form Edit Konten Slide</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php foreach ($kontenSlide as $list_edit) { ?>
        <form class="form-submit" action="<?php echo base_url() . 'Konten/proses_edit_slide' ?>" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <input type="hidden" class="form-control" name="id_slide" value="<?= $list_edit->id_slide; ?>">
            <div class="form-group">
              <label>Judul</label>
              <input type="text" class="form-control" name="judul_slide" value="<?= $list_edit->judul_slide; ?>">
              <div class="px-2 error_judul clear" style="display: none">
              </div>
            </div>
            <div class="form-group">
              <label>Deskripsi Singkat</label>
              <textarea id="textArea" class="form-control" name="deskripsi_slide"><?= $list_edit->deskripsi_slide; ?></textarea>
              <div class="px-2 error_deskripsi clear" style="display: none">
              </div>
            </div>
            <div class="form-group">
              <label>Foto</label><br>
              <input type="hidden" name="gambar_lama" value="<?= $list_edit->gambar_slide ?>">
              <img src="<?php echo base_url(); ?>resources/assets/img/slide/<?php echo $list_edit->gambar_slide; ?>" class="img-fluid" style="width: 50%;"><br><br>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="gambar_baru">
                  <label class="custom-file-label" for="foto">Pilih foto (Maksimal 5MB)</label>
                </div>
              </div>
              <div class="px-2 error_foto clear" style="display: none">
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
<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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
<!-- tinymce -->
<script src="<?php echo base_url(); ?>resources/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>resources/tinymce/jquery.tinymce.min.js"></script>

<script>
  $(document).ready(function() {
    bsCustomFileInput.init();
    tinymce.init({
      selector: 'textarea#textArea',
      height: 200,
      plugins: ['code'],
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

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
                if (respon.error_judul) {
                  $('.error_judul').show();
                  $('.error_judul').html(respon.error_judul);
                  $('.error_judul').css("color", "red");
                } else {
                  $('.error_judul').hide();
                }
                if (respon.error_deskripsi) {
                  $('.error_deskripsi').show();
                  $('.error_deskripsi').html(respon.error_deskripsi);
                  $('.error_deskripsi').css("color", "red");
                } else {
                  $('.error_deskripsi').hide();
                }
                if (respon.error_foto) {
                  $('.error_foto').show();
                  $('.error_foto').html(respon.error_foto);
                  $('.error_foto').css("color", "red");
                } else {
                  $('.error_foto').hide();
                }
              } else {
                $('.clear').hide();
                Swal.fire({
                  title: 'Sukses',
                  text: respon.sukses,
                  icon: 'success',
                }).then((confirmed) => {
                  window.location.href = "<?php echo base_url() . 'Konten' ?>";
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