<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengumpulan Dokumen</title>

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" rel="icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <style>
    body {
      padding: 50px;
      background-color: #587187;
    }
  </style>
</head>

<body class="hold-transition">
  <div class="wrapper">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Pengumpulan Dokumen</h3>
        </div>

        <!-- form start -->
        <form class="form-submit" action="<?php echo base_url() . 'pengumpulan_dokumen/kumpul_dokumen' ?>" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" name="nama_pengumpul">
              <div class="px-2 error_nama clear" style="display: none">
              </div>
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email_pengumpul">
              <div class="px-2 error_email clear" style="display: none">
              </div>
            </div>

            <!-- Jenis Dokumen -->
            <div class="form-group">
              <label>Jenis Dokumen</label>
              <select class="form-control select2bs4" style="width: 100%;" name="id_dokumen">
                <option selected disabled value>Pilih Jenis Dokumen</option>
                <?php foreach ($jenisDokumen as $list_jenis_dokumen) { ?>
                  <option value="<?php echo $list_jenis_dokumen->id_dokumen ?>">
                    <?php echo $list_jenis_dokumen->jenis_dokumen ?>
                  </option>
                <?php } ?>
              </select>
              <div class="px-2 error_jenis clear" style="display: none">
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputFile">Input Dokumen</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="dokumen">
                  <label class="custom-file-label" for="exampleInputFile">Maks file 5MB. Format zip.</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
              <p class="text-red">*Formulir yang telah diisi digabung dengan lampiran yang diperlukan menjadi satu folder dan dibuat menjadi zip</p>
              <div class="px-2 error_dokumen clear" style="display: none">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary simpan">Submit</button>
          </div>
        </form>
      </div>
    </div><!-- /.container-fluid -->
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
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>

  <!-- bs-custom-file-input -->
  <script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

  <script>
    $(function() {
      bsCustomFileInput.init();

      $('.form-submit').submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: $(this).attr('action'),
          type: "POST",
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
            $('.simpan').html('Submit');
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
              if (respon.error_email) {
                $('.error_email').show();
                $('.error_email').html(respon.error_email);
                $('.error_email').css("color", "red");
              } else {
                $('.error_email').hide();
              }
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

            } else {
              $('.clear').hide();
              Swal.fire({
                title: 'Sukses',
                text: respon.sukses,
                icon: 'success',
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