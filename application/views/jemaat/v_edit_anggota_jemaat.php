<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Anggota Jemaat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">Anggota Jemaat</li>
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
        <h3 class="card-title">Form Ubah Data Anggota Jemaat</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php foreach ($jemaatEdit as $list_jemaat_edit) { ?>
        <form method="post" action="<?php echo base_url() . 'Anggota_Jemaat/proses_edit_anggota' ?>">
          <div class="card-body">
            <div class="row edit-center">
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="inputNoAnggota">No Anggota</label>
                  <input type="number" class="form-control" id="inputNoAnggota" name="no_anggota" value="<?= $list_jemaat_edit->no_anggota ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Nama Anggota</label>
                  <input type="text" class="form-control" name="nama_anggota" value="<?= $list_jemaat_edit->nama_lengkap_anggota ?>" required>
                </div>
                <div class="form-group">
                  <label>Alamat Anggota</label>
                  <input type="text" class="form-control" name="alamat_anggota" value="<?= $list_jemaat_edit->alamat_anggota ?>" required>
                </div>
                <!-- phone mask -->
                <div class="form-group">
                  <label>Nomor HP (Indonesia):</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask='"mask": "089999999999[9][9][9]"' data-mask name="nohp" value="<?= $list_jemaat_edit->nohp_anggota ?>" required>
                  </div>
                  <!-- /.input group -->
                </div>

                <!-- Wilayah -->
                <div class="form-group">
                  <label>Wilayah</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="id_wilayah" required>
                    <option selected="selected" disabled>Pilih wilayah</option>
                    <?php foreach ($wilayah as $list_wilayah) { ?>
                      <option value="<?php echo $list_wilayah->id_wilayah ?>" <?php if ($list_wilayah->id_wilayah == $list_jemaat_edit->id_wilayah) {
                                                                                echo "selected";
                                                                              } ?>>
                        <?php echo $list_wilayah->nama_lengkap_anggota . " - " . $list_wilayah->nama_wilayah; ?>
                      </option>
                    <?php
                    } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="inputEmailAnggota">Email Anggota</label>
                  <input type="email" class="form-control" id="inputEmailAnggota" name="email_anggota" value="<?= $list_jemaat_edit->email_anggota ?>" required>
                </div>
                <!-- jenis kelamin -->
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="jenis_kelamin" required>
                    <?php if ($list_jemaat_edit->jenis_kelamin_anggota == "Laki-laki") { ?>
                      <option value="<?php echo $list_jemaat_edit->jenis_kelamin_anggota ?>" <?php echo "selected"; ?>>
                        <?php echo $list_jemaat_edit->jenis_kelamin_anggota; ?>
                      </option>
                      <option value="Perempuan">Perempuan</option>
                    <?php } ?>

                    <?php if ($list_jemaat_edit->jenis_kelamin_anggota == "Perempuan") { ?>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="<?php echo $list_jemaat_edit->jenis_kelamin_anggota ?>" <?php echo "selected"; ?>>
                        <?php echo $list_jemaat_edit->jenis_kelamin_anggota; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="inputGolonganDarah">Golongan Darah</label>
                  <input type="text" class="form-control" id="inputGolonganDarah" name="golongan_darah" value="<?= $list_jemaat_edit->golongan_darah_anggota ?>" required>
                </div>
                <!-- status -->
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="status" required>
                    <?php if ($list_jemaat_edit->status_anggota == 1) { ?>
                      <option value="<?php echo $list_jemaat_edit->status_anggota ?>" <?php echo "selected"; ?>>
                        <?php echo 'Aktif'; ?>
                      </option>
                      <option value="0">Tidak Aktif</option>
                    <?php } ?>

                    <?php if ($list_jemaat_edit->status_anggota == 0) { ?>
                      <option value="1">Aktif</option>
                      <option value="<?php echo $list_jemaat_edit->status_anggota ?>" <?php echo "selected"; ?>>
                        <?php echo 'Tidak Aktif'; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputPendidikan">Pendidikan</label>
                  <input type="text" class="form-control" id="inputPendidikan" name="pendidikan" value="<?= $list_jemaat_edit->pendidikan_anggota ?>" required>
                </div>
              </div>

              <div class="col-sm-5">
                <div class="form-group">
                  <label for="inputPekerjaan">Pekerjaan</label>
                  <input type="text" class="form-control" id="inputPekerjaan" name="pekerjaan" value="<?= $list_jemaat_edit->pekerjaan_anggota ?>" required>
                </div>
                <div class="form-group">
                  <label for="inputKelompokEtnis">Kelompok Etnis</label>
                  <input type="text" class="form-control" id="inputKelompokEtnis" name="kelompok_etnis" value="<?= $list_jemaat_edit->kelompok_etnis_anggota ?>" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <div class="input-group date" id="tanggalLahir" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tanggalLahir" name="tanggal_lahir" value="<?= $list_jemaat_edit->tanggal_lahir_anggota ?>" required />
                    <div class="input-group-append" data-target="#tanggalLahir" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>

                <!-- Tanggal Baptis -->
                <div class="form-group">
                  <label>Tanggal Baptis</label>
                  <div class="input-group date" id="tanggalBaptis" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tanggalBaptis" name="tanggal_baptis" value="<?= $list_jemaat_edit->tanggal_baptis_anggota ?>" />
                    <div class="input-group-append" data-target="#tanggalBaptis" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>

                <!-- Tanggal Sidi -->
                <div class="form-group">
                  <label>Tanggal Sidi</label>
                  <div class="input-group date" id="tanggalSidi" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tanggalSidi" name="tanggal_sidi" value="<?= $list_jemaat_edit->tanggal_sidi_anggota ?>" />
                    <div class="input-group-append" data-target="#tanggalSidi" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>

                <!-- Tanggal Atestasi Masuk -->
                <div class="form-group">
                  <label>Tanggal Atestasi Masuk</label>
                  <div class="input-group date" id="tanggalAM" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tanggalAM" name="tanggal_atestasi_masuk" value="<?= $list_jemaat_edit->tanggal_atestasi_masuk ?>" />
                    <div class="input-group-append" data-target="#tanggalAM" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>

                <!-- Tanggal Atestasi Keluar -->
                <div class="form-group">
                  <label>Tanggal Atestasi Keluar</label>
                  <div class="input-group date" id="tanggalAK" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tanggalAK" name="tanggal_atestasi_keluar" value="<?= $list_jemaat_edit->tanggal_atestasi_keluar ?>" />
                    <div class="input-group-append" data-target="#tanggalAK" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>

                <!-- Tanggal Meninggal-->
                <div class="form-group">
                  <label>Tanggal Meninggal</label>
                  <div class="input-group date" id="tanggalMeninggal" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tanggalMeninggal" name="tanggal_meninggal" value="<?= $list_jemaat_edit->tanggal_meninggal ?>" />
                    <div class="input-group-append" data-target="#tanggalMeninggal" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>

                <!-- Tanggal DKH -->
                <div class="form-group">
                  <label>Tanggal DKH</label>
                  <div class="input-group date" id="tanggalDKH" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tanggalDKH" name="tanggal_dkh" value="<?= $list_jemaat_edit->tanggal_dkh ?>" />
                    <div class="input-group-append" data-target="#tanggalDKH" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>

                <!-- Tanggal Ex DKH -->
                <div class="form-group">
                  <label>Tanggal ex DKH</label>
                  <div class="input-group date" id="tanggalExDKH" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#tanggalExDKH" name="tanggal_ex_dkh" value="<?= $list_jemaat_edit->tanggal_ex_dkh ?>" />
                    <div class="input-group-append" data-target="#tanggalExDKH" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              <?php } ?>
              </div>
            </div>
          </div>
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
    $('[data-mask]').inputmask()
    //Date picker
    $('#tanggalLahir').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#tanggalBaptis').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#tanggalSidi').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#tanggalAM').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#tanggalAK').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#tanggalMeninggal').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#tanggalDKH').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#tanggalExDKH').datetimepicker({
      format: 'YYYY-MM-DD'
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