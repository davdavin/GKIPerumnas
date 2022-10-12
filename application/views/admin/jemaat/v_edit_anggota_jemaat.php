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
        <form class="form-submit" method="post" action="<?php echo base_url() . 'Anggota_Jemaat/proses_edit_anggota' ?>">
          <div class="card-body">
            <div class="row edit-center">
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="inputNoAnggota">No Anggota</label>
                  <input type="number" class="form-control" id="inputNoAnggota" name="no_anggota" value="<?= $list_jemaat_edit->no_anggota ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Nama Lengkap Anggota</label>
                  <input type="text" class="form-control" name="nama_anggota" value="<?= $list_jemaat_edit->nama_lengkap_anggota ?>">
                  <div class="px-2 error_nama clear" style="display: none">
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat Anggota</label>
                  <input type="text" class="form-control" name="alamat_anggota" value="<?= $list_jemaat_edit->alamat_anggota ?>">
                  <div class="px-2 error_alamat clear" style="display: none">
                  </div>
                </div>
                <!-- phone mask -->
                <div class="form-group">
                  <label>Nomor Handphone:</label>
                  <input type="text" class="form-control" data-mask name="nohp" value="<?= $list_jemaat_edit->nohp_anggota ?>">
                  <div class="px-2 error_nohp clear" style="display: none">
                  </div>
                </div>

                <!-- Wilayah -->
                <div class="form-group">
                  <label>Wilayah</label>
                  <select class="custom-select select2bs4" style="width: 100%;" name="id_wilayah">
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
                  <div class="px-2 error_wilayah clear" style="display: none">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmailAnggota">Email Anggota</label>
                  <input type="hidden" name="email_sekarang" value="<?= $list_jemaat_edit->email_anggota ?>">
                  <input type="email" class="form-control" id="inputEmailAnggota" name="email_anggota" value="<?= $list_jemaat_edit->email_anggota ?>">
                  <div class="px-2 error_email clear" style="display: none">
                  </div>
                </div>
                <!-- jenis kelamin -->
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="custom-select select2bs4" style="width: 100%;" name="jenis_kelamin">
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
                  <div class="px-2 error_jenis_kelamin clear" style="display: none">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputGolonganDarah">Golongan Darah</label>
                  <input type="text" class="form-control" id="inputGolonganDarah" name="golongan_darah" value="<?= $list_jemaat_edit->golongan_darah_anggota ?>">
                  <div class="px-2 error_golongan_darah clear" style="display: none">
                  </div>
                </div>
                <!-- status -->
                <div class="form-group">
                  <label>Status</label>
                  <select class="custom-select select2bs4" style="width: 100%;" name="status">
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
                  <div class="px-2 error_status clear" style="display: none">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPendidikan">Pendidikan</label>
                  <input type="text" class="form-control" id="inputPendidikan" name="pendidikan" value="<?= $list_jemaat_edit->pendidikan_anggota ?>">
                  <div class="px-2 error_pendidikan clear" style="display: none">
                  </div>
                </div>
              </div>

              <div class="col-sm-5">
                <div class="form-group">
                  <label for="inputPekerjaan">Pekerjaan</label>
                  <input type="text" class="form-control" id="inputPekerjaan" name="pekerjaan" value="<?= $list_jemaat_edit->pekerjaan_anggota ?>">
                  <div class="px-2 error_pekerjaan clear" style="display: none">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputKelompokEtnis">Kelompok Etnis</label>
                  <input type="text" class="form-control" id="inputKelompokEtnis" name="kelompok_etnis" value="<?= $list_jemaat_edit->kelompok_etnis_anggota ?>">
                  <div class="px-2 error_kelompok clear" style="display: none">
                  </div>
                </div>

                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $list_jemaat_edit->tanggal_lahir_anggota ?>">
                  <div class="px-2 error_tanggal_lahir clear" style="display: none">
                  </div>
                </div>
                <div class="form-group">
                  <label>Tanggal Baptis</label>
                  <input type="date" class="form-control" id="tanggal_baptis" name="tanggal_baptis" value="<?= $list_jemaat_edit->tanggal_baptis_anggota  ?>">
                  <div class="px-2 error_tanggal_baptis clear" style="display: none">
                  </div>
                </div>

                <div class="form-group">
                  <label>Tanggal Sidi</label>
                  <input type="date" class="form-control" id="tanggal_sidi" name="tanggal_sidi" value="<?= $list_jemaat_edit->tanggal_sidi_anggota ?>">
                  <div class="px-2 error_tanggal_sidi clear" style="display: none">
                  </div>
                </div>

                <div class="form-group">
                  <label>Tanggal Atestasi Masuk</label>
                  <input type="date" class="form-control" id="tanggal_atestasi_masuk" name="tanggal_atestasi_masuk" value="<?= $list_jemaat_edit->tanggal_atestasi_masuk ?>">
                  <div class="px-2 error_tanggal_atestasi_masuk clear" style="display: none">
                  </div>
                </div>

                <div class="form-group">
                  <label>Tanggal Atestasi Keluar</label>
                  <input type="date" class="form-control" id="tanggal_atestasi_keluar" name="tanggal_atestasi_keluar" value="<?= $list_jemaat_edit->tanggal_atestasi_keluar ?>">
                  <div class="px-2 error_tanggal_atestasi_keluar clear" style="display: none">
                  </div>
                </div>

                <div class="form-group">
                  <label>Tanggal Meninggal</label>
                  <input type="date" class="form-control" id="tanggal_meninggal" name="tanggal_meninggal" value="<?= $list_jemaat_edit->tanggal_meninggal ?>">
                  <div class="px-2 error_tanggal_meninggal clear" style="display: none">
                  </div>
                </div>

                <div class="form-group">
                  <label>Tanggal DKH</label>
                  <input type="date" class="form-control" id="tanggal_dkh" name="tanggal_dkh" value="<?= $list_jemaat_edit->tanggal_dkh ?>">
                  <div class="px-2 error_tanggal_dkh clear" style="display: none">
                  </div>
                </div>

                <div class="form-group">
                  <label>Tanggal Ex DKH</label>
                  <input type="date" class="form-control" id="tanggal_ex_dkh" name="tanggal_ex_dkh" value="<?= $list_jemaat_edit->tanggal_ex_dkh  ?>">
                  <div class="px-2 error_tanggal_ex_dkh clear" style="display: none">
                  </div>
                </div>

              <?php } ?>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary simpan">Ubah</button>
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
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
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
  $(document).ready(function() {
    $('[data-mask]').inputmask()

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
                if (respon.error_wilayah) {
                  $('.error_wilayah').show();
                  $('.error_wilayah').html(respon.error_wilayah);
                  $('.error_wilayah').css("color", "red");
                } else {
                  $('.error_wilayah').hide();
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
                if (respon.error_golongan_darah) {
                  $('.error_golongan_darah').show();
                  $('.error_golongan_darah').html(respon.error_golongan_darah);
                  $('.error_golongan_darah').css("color", "red");
                } else {
                  $('.error_golongan_darah').hide();
                }
                if (respon.error_status) {
                  $('.error_status').show();
                  $('.error_status').html(respon.error_status);
                  $('.error_status').css("color", "red");
                } else {
                  $('.error_status').hide();
                }
                if (respon.error_pendidikan) {
                  $('.error_pendidikan').show();
                  $('.error_pendidikan').html(respon.error_pendidikan);
                  $('.error_pendidikan').css("color", "red");
                } else {
                  $('.error_pendidikan').hide();
                }
                if (respon.error_pekerjaan) {
                  $('.error_pekerjaan').show();
                  $('.error_pekerjaan').html(respon.error_pekerjaan);
                  $('.error_pekerjaan').css("color", "red");
                } else {
                  $('.error_pekerjaan').hide();
                }
                if (respon.error_kelompok) {
                  $('.error_kelompok').show();
                  $('.error_kelompok').html(respon.error_kelompok);
                  $('.error_kelompok').css("color", "red");
                } else {
                  $('.error_kelompok').hide();
                }
                if (respon.error_tanggal_lahir) {
                  $('.error_tanggal_lahir').show();
                  $('.error_tanggal_lahir').html(respon.error_tanggal_lahir);
                  $('.error_tanggal_lahir').css("color", "red");
                } else {
                  $('.error_tanggal_lahir').hide();
                }
                if (respon.error_tanggal_baptis) {
                  $('.error_tanggal_baptis').show();
                  $('.error_tanggal_baptis').html(respon.error_tanggal_baptis);
                  $('.error_tanggal_baptis').css("color", "red");
                } else {
                  $('.error_tanggal_baptis').hide();
                }
                if (respon.error_tanggal_sidi) {
                  $('.error_tanggal_sidi').show();
                  $('.error_tanggal_sidi').html(respon.error_tanggal_sidi);
                  $('.error_tanggal_sidi').css("color", "red");
                } else {
                  $('.error_tanggal_sidi').hide();
                }
                if (respon.error_tanggal_atestasi_masuk) {
                  $('.error_tanggal_atestasi_masuk').show();
                  $('.error_tanggal_atestasi_masuk').html(respon.error_tanggal_atestasi_masuk);
                  $('.error_tanggal_atestasi_masuk').css("color", "red");
                } else {
                  $('.error_tanggal_atestasi_masuk').hide();
                }
                if (respon.error_tanggal_atestasi_keluar) {
                  $('.error_tanggal_atestasi_keluar').show();
                  $('.error_tanggal_atestasi_keluar').html(respon.error_tanggal_atestasi_keluar);
                  $('.error_tanggal_atestasi_keluar').css("color", "red");
                } else {
                  $('.error_tanggal_atestasi_keluar').hide();
                }
                if (respon.error_tanggal_meninggal) {
                  $('.error_tanggal_meninggal').show();
                  $('.error_tanggal_meninggal').html(respon.error_tanggal_meninggal);
                  $('.error_tanggal_meninggal').css("color", "red");
                } else {
                  $('.error_tanggal_meninggal').hide();
                }
                if (respon.error_tanggal_dkh) {
                  $('.error_tanggal_dkh').show();
                  $('.error_tanggal_dkh').html(respon.error_tanggal_dkh);
                  $('.error_tanggal_dkh').css("color", "red");
                } else {
                  $('.error_tanggal_dkh').hide();
                }
                if (respon.error_tanggal_ex_dkh) {
                  $('.error_tanggal_ex_dkh').show();
                  $('.error_tanggal_ex_dkh').html(respon.error_tanggal_ex_dkh);
                  $('.error_tanggal_ex_dkh').css("color", "red");
                } else {
                  $('.error_tanggal_ex_dkh').hide();
                }

              } else {
                $('.clear').hide();
                Swal.fire({
                  title: 'Sukses',
                  text: respon.sukses,
                  icon: 'success',
                }).then((confirmed) => {
                  window.location.href = "<?php echo base_url() . 'Anggota_Jemaat' ?>";
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