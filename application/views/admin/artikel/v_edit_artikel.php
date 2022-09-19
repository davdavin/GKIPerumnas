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
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">Artikel</li>
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
        <h3 class="card-title">Form Edit Artikel</h3>
      </div>
      <?php foreach ($artikel_edit as $detail) { ?>
        <form method="post" action="<?php echo base_url() . 'mengelola_artikel/proses_edit' ?>" class="submit-artikel" enctype="multipart/form-data">
          <input type="hidden" name="id_artikel" value="<?= $detail->id_artikel; ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Judul Artikel</label>
              <input type="text" class="form-control" name="judul_artikel" value="<?= $detail->judul_artikel; ?>" required>
              <div class="p-2 is-invalid error_judul clear" style="display: none">
              </div>
            </div>

            <!-- Tipe artikel -->
            <div class="form-group">
              <label>Tipe Artikel</label>
              <input type="hidden" name="id_tipe_artikel" value="<?= $detail->id_tipe_artikel ?>">
              <select class="form-control select2bs4" style="width: 100%;" disabled>
                <option selected disabled value>-- Pilih --</option>
                <?php foreach ($tipe_artikel as $list_tipe_artikel) { ?>
                  <option value="<?php echo $list_tipe_artikel->id_tipe_artikel ?>" <?php if ($list_tipe_artikel->id_tipe_artikel == $detail->id_tipe_artikel) {
                                                                                      echo "selected";
                                                                                    } ?>>
                    <?php echo $list_tipe_artikel->tipe_artikel ?>
                  </option>
                <?php } ?>
              </select>
              <div class="p-2 is-invalid error_tipe clear" style="display: none">
              </div>
            </div>

            <div class="form-group">
              <label>Tanggal Pembuatan</label>
              <input type="date" class="form-control" name="tanggal_pembuatan" value="<?= $detail->tanggal_pembuatan; ?>" required>
              <div class="p-2 is-invalid error_tanggal clear" style="display: none">
              </div>
            </div>

            <div class="form-group">
              <label>Deskripsi Singkat</label>
              <textarea class="form-control" name="deskripsi_singkat"><?= $detail->deskripsi_singkat; ?></textarea>
              <div class="p-2 is-invalid error_deskripsi clear" style="display: none">
              </div>
            </div>

            <?php if ($detail->isi != NULL) { ?>
              <div class="form-group">
                <label>Isi</label>
                <textarea id="textArea" class="form-control" name="isi"><?= $detail->isi; ?></textarea>
              </div>

            <?php } ?>

            <?php if ($detail->file != NULL) { ?>
              <div class="form-group" id="file">
                <label for="exampleInputFile">File input</label><br>
                <label>File sekarang <a href="<?php echo base_url() . 'Artikel/baca_artikel/' . $detail->id_artikel ?>" target="_blank">
                    <?php echo $detail->file ?>
                  </a></label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="pdf">
                    <label class="custom-file-label" for="exampleInputFile">Pilih file (Maks size file 5 MB & format PDF)</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                <div class="p-2 is-invalid error_file clear" style="display: none">
                </div>
              </div>
            <?php } ?>
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
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- tinymce -->
<script src="<?php echo base_url(); ?>resources/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>resources/tinymce/jquery.tinymce.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
  $(function() {
    bsCustomFileInput.init();

    $('#tanggalPembuatan').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    tinymce.init({
      selector: '#textArea',
      height: 500,
      // plugins: ['code'],
      plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
      menubar: 'file edit view insert format tools table help',
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile anchor codesample | ltr rtl',
      toolbar_sticky: true,
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });


    $('.submit-artikel').submit(function(e) {
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
                if (respon.error_tipe) {
                  $('.error_tipe').show();
                  $('.error_tipe').html(respon.error_tipe);
                  $('.error_tipe').css("color", "red");
                } else {
                  $('.error_tipe').hide();
                }
                if (respon.error_tanggal) {
                  $('.error_tanggal').show();
                  $('.error_tanggal').html(respon.error_tanggal);
                  $('.error_tanggal').css("color", "red");
                } else {
                  $('.error_tanggal').hide();
                }
                if (respon.error_deskripsi) {
                  $('.error_deskripsi').show();
                  $('.error_deskripsi').html(respon.error_deskripsi);
                  $('.error_deskripsi').css("color", "red");
                } else {
                  $('.error_deskripsi').hide();
                }
                if (respon.error_file) {
                  $('.error_file').show();
                  $('.error_file').html(respon.error_file);
                  $('.error_file').css("color", "red");
                } else {
                  $('.error_file').hide();
                }

              } else {
                $('.clear').hide();
                Swal.fire({
                  title: 'Sukses',
                  text: respon.sukses,
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 1000,
                }).then((confirmed) => {
                  window.location.href = "<?php echo base_url() . 'mengelola_artikel' ?>";
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