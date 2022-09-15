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
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">Pendeta</li>
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
        <h3 class="card-title">Form Ubah Data Pendeta</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php foreach ($pendetaEdit as $list_pendeta_edit) { ?>
        <form method="post" action="<?php echo base_url() . 'Pendeta/proses_edit_pendeta' ?>" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row edit-center">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>ID</label>
                  <input type="text" class="form-control" name="id_pendeta" value="<?= $list_pendeta_edit->id_pendeta; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>No Pendeta</label>
                  <input type="text" class="form-control" name="no_pendeta" value="<?= $list_pendeta_edit->no_pendeta; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Nama Pendeta</label>
                  <input type="text" class="form-control" name="nama_pendeta" value="<?= $list_pendeta_edit->nama_lengkap_pendeta; ?>" required>
                </div>
                <div class="form-group">
                  <label>Alamat Pendeta</label>
                  <input type="text" class="form-control" name="alamat_pendeta" value="<?= $list_pendeta_edit->alamat_pendeta; ?>" required>
                </div>

                <!-- phone mask -->
                <div class="form-group">
                  <label>Nomor HP (Indonesia):</label>
                  <div class="input-group">
                    <input type="text" class="form-control" data-inputmask='"mask": "089999999999[9][9][9]"' data-mask name="nohp" value="<?= $list_pendeta_edit->nohp_pendeta; ?>" required>
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Email Pendeta</label>
                  <input type="email" class="form-control" name="email_pendeta" value="<?= $list_pendeta_edit->email_pendeta; ?>" required>
                </div>
              </div>

              <div class="col-sm-4">
                <!-- jenis kelamin -->
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="jenis_kelamin" required>
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
                </div>

                <!-- Tanggal Lahir -->
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="tm form-control" name="tanggal_lahir" id="tanggalLahir" value="<?= $list_pendeta_edit->tanggal_lahir_pendeta; ?>" required>
                </div>

                <!-- status -->
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="status" required>
                    <?php if ($list_pendeta_edit->status_pendeta == 1) { ?>
                      <option value="<?php echo $list_pendeta_edit->status_pendeta ?>" <?php echo "selected"; ?>>
                        <?php echo 'Aktif'; ?>
                      </option>
                      <option value="0">Tidak Aktif</option>
                    <?php } ?>

                    <?php if ($list_pendeta_edit->status_pendeta == 0) { ?>
                      <option value="1">Aktif</option>
                      <option value="<?php echo $list_pendeta_edit->status_pendeta ?>" <?php echo "selected"; ?>>
                        <?php echo 'Tidak Aktif' ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <!-- Foto -->
                <div class="form-group">
                  <label>Foto</label><br>
                  <input type="hidden" name="foto_lama" value="<?= $list_pendeta_edit->foto_pendeta ?>">
                  <img src="<?php echo base_url(); ?>resources/assets/img/pendeta/<?php echo $list_pendeta_edit->foto_pendeta; ?>" class="img-fluid" style="width: 200px; height: 200px;"><br><br>
                  <input type="file" name="foto_baru">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary tombol-ubah">Ubah</button>
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
<!-- flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
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

    $('#tanggalLahir').flatpickr({
      //   minDate: "today",
      altInput: true,
      //allowInput: true,
      altFormat: "j F Y",
      dateFormat: "Y-m-d",
      locale: "id"
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