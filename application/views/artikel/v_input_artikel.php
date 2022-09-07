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
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Artikel</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" action="<?php echo base_url() . 'Mengelola_Artikel/proses_tambah_artikel' ?>" id="submit" class="submit-artikel" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
            <label>Judul Artikel</label>
            <input type="text" class="form-control" id="judul" name="judul_artikel">
            <div class="px-2 error_judul clear" style="display: none">
            </div>
          </div>

          <!-- Tipe artikel -->
          <div class="form-group">
            <label>Tipe Artikel</label>
            <select class="custom-select select2bs4" style="width: 100%;" name="id_tipe_artikel" id="tipe">
              <option selected disabled value>-- Pilih --</option>

              <?php foreach ($tipe_artikel as $list_tipe_artikel) { ?>
                <option value="<?php echo $list_tipe_artikel->id_tipe_artikel ?>"><?php echo $list_tipe_artikel->tipe_artikel ?></option>
              <?php } ?>
            </select>
            <div class="px-2 error_tipe clear" style="display: none">
            </div>
          </div>

          <div class="form-group">
            <label>Tanggal Pembuatan</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal_pembuatan">
            <div class="px-2 error_tanggal clear" style="display: none">
            </div>
          </div>

          <div class="form-group">
            <label>Deskripsi Singkat</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi_singkat"></textarea>
            <div class="px-2 error_deskripsi clear" style="display: none">
            </div>
          </div>

          <div class="form-group" id="isi" style="display: none">
            <label>Isi</label>
            <textarea id="textArea" class="form-control" name="isi"></textarea>
          </div>

          <div class="form-group" id="file" style="display: none">
            <label for="inputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputFile" name="pdf">
                <label class="custom-file-label" for="inputFile">Pilih file (Maks size file 5 MB & format PDF)</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
            <div class="px-2 error_file clear" style="display: none">
            </div>
          </div>


        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary simpan">Tambah</button>
        </div>
      </form>
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
<script src="<?php echo base_url(); ?>jquery-3.4.1.min.js"></script>
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
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- tinymce -->
<script src="<?php echo base_url(); ?>resources/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>resources/tinymce/jquery.tinymce.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
  $(function() {
    bsCustomFileInput.init();

    $('#tipe').change(function() {
      var target = $('#tipe option:selected').text();
      //  alert(target);
      if (target == "Warta Jemaat") {
        $("#isi").hide();
        tinymce.activeEditor.setContent('');
        $('#file').show();
        $('#inputFile').prop('disabled', false).show();

      } else {
        $('#isi').show();
        $('#file').hide();
        $('#inputFile').prop('disabled', true).hide();
      }
    });

 
    tinymce.init({
      selector: '#textArea',
      height: 500,
     // plugins: ['code'],
      plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media mediaembed codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
      menubar: 'file edit view insert format tools table help',
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile anchor codesample | ltr rtl',
      toolbar_sticky: true,
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

    function valid() {
      $('.clear').hide();
      $('#judul').removeClass('is-invalid');
      $('#tipe').removeClass('is-invalid');
      $('#tanggal').removeClass('is-invalid');
      $('#deskripsi').removeClass('is-invalid');
      $('#inputFile').removeClass('is-invalid');
    }

    $('.submit-artikel').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        dataType: 'JSON',
        data: new FormData(this),
        contentType: false,
        //cache: false,
        processData: false,
        beforeSend: function() {
          $('.simpan').attr('disable', 'disabled');
          $('.simpan').html('<i class="fa fa-spin fa-spinner"></i>');
        },
        complete: function() {
          $('.simpan').removeAttr('disable');
          $('.simpan').html('Tambah');
        },
        success: function(respon) {
          if (respon.sukses == false) {
            if (respon.error_judul) {
              $('#judul').addClass('is-invalid');
              $('.error_judul').show();
              $('.error_judul').html(respon.error_judul);
              $('.error_judul').css("color", "red");
            } else {
              $('#judul').removeClass('is-invalid');
              $('.error_judul').hide();
            }
            if (respon.error_tipe) {
              $('#tipe').addClass('is-invalid');
              $('.error_tipe').show();
              $('.error_tipe').html(respon.error_tipe);
              $('.error_tipe').css("color", "red");
            } else {
              $('#tipe').removeClass('is-invalid');
              $('.error_tipe').hide();
            }
            if (respon.error_tanggal) {
              $('#tanggal').addClass('is-invalid');
              $('.error_tanggal').show();
              $('.error_tanggal').html(respon.error_tanggal);
              $('.error_tanggal').css("color", "red");
            } else {
              $('#tanggal').removeClass('is-invalid');
              $('.error_tanggal').hide();
            }
            if (respon.error_deskripsi) {
              $('#deskripsi').addClass('is-invalid');
              $('.error_deskripsi').show();
              $('.error_deskripsi').html(respon.error_deskripsi);
              $('.error_deskripsi').css("color", "red");
            } else {
              $('#deskripsi').removeClass('is-invalid');
              $('.error_deskripsi').hide();
            }
            if (respon.error_file) {
              $('#inputFile').addClass('is-invalid');
              $('.error_file').show();
              $('.error_file').html(respon.error_file);
              $('.error_file').css("color", "red");
            } else {
              $('#inputFile').removeClass('is-invalid');
              $('.error_file').hide();
            }

          } else {
            //   $('.clear').hide();
            valid();
            Swal.fire({
              title: 'Sukses',
              text: respon.sukses,
              icon: 'success',
              showConfirmButton: false,
              timer: 1000,
            }).then((confirmed) => {
              window.location.reload();
            });
          }
        }
      });
    });

  });
</script>
</body>

</html>