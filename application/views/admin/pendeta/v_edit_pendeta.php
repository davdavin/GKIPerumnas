<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pendeta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Pendeta' ?>">Pendeta</a></li>
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
        <h3 class="card-title">Form Edit Data Pendeta</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php foreach ($pendetaEdit as $list_pendeta_edit) { ?>
        <form class="form-submit" method="post" action="<?php echo base_url() . 'Pendeta/proses_edit_pendeta' ?>" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row edit-center">
              <div class="col-sm-4">
                <input type="hidden" class="form-control" name="id_pendeta" value="<?= $list_pendeta_edit->id_pendeta; ?>">
                <div class="form-group">
                  <label>No Pendeta</label>
                  <input type="text" class="form-control" name="no_pendeta" value="<?= $list_pendeta_edit->no_pendeta; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Nama Pendeta</label>
                  <input type="text" class="form-control" name="nama_pendeta" value="<?= $list_pendeta_edit->nama_lengkap_pendeta; ?>">
                  <div class="px-2 error_nama clear" style="display: none">
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat Pendeta</label>
                  <input type="text" class="form-control" name="alamat_pendeta" value="<?= $list_pendeta_edit->alamat_pendeta; ?>">
                  <div class="px-2 error_alamat clear" style="display: none">
                  </div>
                </div>

                <!-- phone mask -->
                <div class="form-group">
                  <label>Nomor Handphone</label>
                  <input type="text" class="form-control" data-mask name="nohp" value="<?= $list_pendeta_edit->nohp_pendeta; ?>">
                  <div class="px-2 error_nohp clear" style="display: none">
                  </div>
                </div>
                <div class="form-group">
                  <label>Email Pendeta</label>
                  <input type="email" class="form-control" name="email_pendeta" value="<?= $list_pendeta_edit->email_pendeta; ?>">
                  <div class="px-2 error_email clear" style="display: none">
                  </div>
                </div>
              </div>

              <div class="col-sm-4">
                <!-- jenis kelamin -->
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="jenis_kelamin">
                    <?php if ($list_pendeta_edit->jenis_kelamin_pendeta == "Laki-laki") { ?>
                      <option value="<?php echo $list_pendeta_edit->jenis_kelamin_pendeta ?>" <?php echo "selected"; ?>>
                        <?php echo $list_pendeta_edit->jenis_kelamin_pendeta; ?>
                      </option>
                      <option value="Perempuan">Perempuan</option>
                    <?php } ?>

                    <?php if ($list_pendeta_edit->jenis_kelamin_pendeta == "Perempuan") { ?>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="<?php echo $list_pendeta_edit->jenis_kelamin_pendeta ?>" <?php echo "selected"; ?>>
                        <?php echo $list_pendeta_edit->jenis_kelamin_pendeta; ?>
                      </option>
                    <?php } ?>
                  </select>
                  <div class="px-2 error_jenis_kelamin clear" style="display: none">
                  </div>
                </div>

                <!-- Tanggal Lahir -->
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="tm form-control" name="tanggal_lahir" id="tanggalLahir" value="<?= $list_pendeta_edit->tanggal_lahir_pendeta; ?>">
                  <div class="px-2 error_tanggal clear" style="display: none">
                  </div>
                </div>

                <!-- status -->
                <div class=" form-group">
                  <label>Status</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="status">
                    <?php if ($list_pendeta_edit->status_pendeta == "PENDETA AKTIF") { ?>
                      <option value="<?php echo $list_pendeta_edit->status_pendeta ?>" <?php echo "selected"; ?>>
                        <?php echo 'Pendeta Aktif'; ?>
                      </option>
                      <option value="PENATUA AKTIF">Penatua Aktif</option>
                      <option value="EMERITUS">Emeritus</option>
                      <option value="TIDAK AKTIF">Tidak Aktif</option>
                    <?php } ?>

                    <?php if ($list_pendeta_edit->status_pendeta == "PENATUA AKTIF") { ?>
                      <option value="PENDETA AKTIF">Pendeta Aktif</option>
                      <option value="<?php echo $list_pendeta_edit->status_pendeta ?>" <?php echo "selected"; ?>>
                        <?php echo 'Penatua Aktif' ?>
                      </option>
                      <option value="EMERITUS">Emeritus</option>
                      <option value="TIDAK AKTIF">Tidak Aktif</option>
                    <?php } ?>

                    <?php if ($list_pendeta_edit->status_pendeta == "EMERITUS") { ?>
                      <option value="PENDETA AKTIF">Pendeta Aktif</option>
                      <option value="PENATUA AKTIF">Penatua Aktif</option>
                      <option value="<?php echo $list_pendeta_edit->status_pendeta ?>" <?php echo "selected"; ?>>
                        <?php echo 'Emeritus' ?>
                      </option>
                      <option value="TIDAK AKTIF">Tidak Aktif</option>
                    <?php } ?>

                    <?php if ($list_pendeta_edit->status_pendeta == "TIDAK AKTIF") { ?>
                      <option value="PENDETA AKTIF">Pendeta Aktif</option>
                      <option value="PENATUA AKTIF">Penatua Aktif</option>
                      <option value="EMERITUS">Emeritus</option>
                      <option value="<?php echo $list_pendeta_edit->status_pendeta ?>" <?php echo "selected"; ?>>
                        <?php echo 'Tidak Aktif' ?>
                      </option>
                    <?php } ?>
                  </select>
                  <div class="px-2 error_status clear" style="display: none">
                  </div>
                </div>

                <!-- Foto -->
                <div class="form-group">
                  <label>Foto</label><br>
                  <input type="hidden" name="foto_lama" value="<?= $list_pendeta_edit->foto_pendeta ?>">
                  <img src="<?php echo base_url(); ?>resources/assets/img/pendeta/<?php echo $list_pendeta_edit->foto_pendeta; ?>" class="img-fluid" style="width: 200px; height: 200px;"><br><br>
                  <input type="file" name="foto_baru">
                  <div class="px-2 error_foto clear" style="display: none">
                  </div>
                </div>
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

<script>
  $(function() {
    $('[data-mask]').inputmask();

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
                if (respon.error_alamat) {
                  $('.error_alamat').show();
                  $('.error_alamat').html(respon.error_alamat);
                  $('.error_alamat').css("color", "red");
                } else {
                  $('.error_alamat').hide();
                }
                if (respon.error_nohp) {
                  $('#perlengkapan').addClass('is-invalid');
                  $('.error_nohp').show();
                  $('.error_nohp').html(respon.error_nohp);
                  $('.error_nohp').css("color", "red");
                } else {
                  $('.error_nohp').hide();
                }
                if (respon.error_email) {
                  $('.error_email').show();
                  $('.error_email').html(respon.error_email);
                  $('.error_email').css("color", "red");
                } else {
                  $('.error_email').hide();
                }
                if (respon.error_jenis_kelamin) {
                  $('.error_jenis_kelamin').show();
                  $('.error_jenis_kelamin').html(respon.error_jenis_kelamin);
                  $('.error_jenis_kelamin').css("color", "red");
                } else {
                  $('.error_jenis_kelamin').hide();
                }
                if (respon.error_tanggal) {
                  $('.error_tanggal').show();
                  $('.error_tanggal').html(respon.error_tanggal);
                  $('.error_tanggal').css("color", "red");
                } else {
                  $('.error_tanggal').hide();
                }
                if (respon.error_foto) {
                  $('.error_foto').show();
                  $('.error_foto').html(respon.error_foto);
                  $('.error_foto').css("color", "red");
                } else {
                  $('.error_foto').hide();
                }
                if (respon.error_status) {
                  $('.error_status').show();
                  $('.error_status').html(respon.error_status);
                  $('.error_status').css("color", "red");
                } else {
                  $('.error_status').hide();
                }

              } else {
                $('.clear').hide();
                Swal.fire({
                  title: 'Sukses',
                  text: respon.sukses,
                  icon: 'success',
                }).then((confirmed) => {
                  window.location.href = "<?php echo base_url() . 'Pendeta' ?>";
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