<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ruangan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'mengelola_ruangan' ?>">Ruangan</a></li>
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
      <?php foreach ($edit_ruangan as $detail) { ?>
        <form method="post" action="<?php echo base_url() . 'mengelola_ruangan/proses_edit' ?>" class="form-submit" enctype="multipart/form-data">
          <input type="hidden" name="id_ruangan" value="<?= $detail->id_ruangan; ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Nama Ruangan</label>
              <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" value="<?= $detail->nama_ruangan; ?>">
              <!-- INFO ERROR -->
              <div class="px-2 error_nama clear" style="display: none">
              </div>
            </div>
            <div class="form-group">
              <label>Kapasitas</label>
              <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="<?= $detail->kapasitas; ?>">
              <!-- INFO ERROR -->
              <div class="px-2 error_kapasitas clear" style="display: none">
              </div>
            </div>
            <div class="form-group">
              <label>Perlengkapan</label>
              <textarea id="textArea" class="form-control" name="perlengkapan"><?= $detail->perlengkapan; ?></textarea>
              <!-- INFO ERROR -->
              <div class="px-2 error_perlengkapan clear" style="display: none">
              </div>
            </div>
            <!-- Foto -->
            <!-- <input type="hidden" id="count" name="count"> -->
            <div class="form-group">
              <input type="hidden" name="foto_lama" value="<?= $detail->foto ?>">
              <img src="<?php echo base_url(); ?>resources/assets/img/ruangan/<?php echo $detail->foto; ?>" class="img-fluid" style="width: 500px; height: 400px;"><br><br>
              <label>Input Foto</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="foto" name="foto_baru">
                  <label class="custom-file-label" for="foto">Pilih foto (Maks size 5MB)</label>
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

    tinymce.init({
      selector: '#textArea',
      height: 200,
      plugins: [
        'advlist autolink lists preview',
        'fullscreen',
        'paste code wordcount'
      ],
      toolbar: 'undo redo | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent',
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
                if (respon.error_nama) {
                  $('.error_nama').show();
                  $('.error_nama').html(respon.error_nama);
                  $('.error_nama').css("color", "red");
                } else {
                  $('.error_nama').hide();
                }
                if (respon.error_kapasitas) {
                  $('.error_kapasitas').show();
                  $('.error_kapasitas').html(respon.error_kapasitas);
                  $('.error_kapasitas').css("color", "red");
                } else {
                  $('.error_kapasitas').hide();
                }
                if (respon.error_perlengkapan) {
                  $('.error_perlengkapan').show();
                  $('.error_perlengkapan').html(respon.error_perlengkapan);
                  $('.error_perlengkapan').css("color", "red");
                } else {
                  $('.error_perlengkapan').hide();
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
                  window.location.href = "<?php echo base_url() . 'mengelola_ruangan' ?>";
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