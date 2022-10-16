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
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Anggota Jemaat</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Untuk memunculkan message berhasil tambah dan ubah data-->
    <?php $this->load->view('templates/message.php'); ?>
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Anggota Jemaat</h3>
        </div>
        <div class="card-body">
          <?php if ($this->session->userdata('level_user') == 2) { ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
              <i class="fas fa-plus"></i> Tambah anggota jemaat
            </button><br><br>
          <?php } ?>
          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-akun-jemaat">
            <i class="mr-1 fas fa-plus"></i> Akun Jemaat
          </button><br><br> -->

          <table id="list_anggota" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>No Anggota</th>
                <th>Nama Lengkap</th>
                <th>Wilayah</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>
    </div>

    <!-- modal untuk menampilkan form input jemaat -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Input Data Anggota Jemaat Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-submit" action="<?php echo base_url() . 'Anggota_Jemaat/masuk_anggota_jemaat' ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Lengkap Anggota</label>
                <input type="text" class="form-control" name="nama_anggota" placeholder="Nama Lengkap Anggota">
                <div class="px-2 error_nama clear" style="display: none">
                </div>
              </div>
              <div class="form-group">
                <label>Alamat Anggota</label>
                <input type="text" class="form-control" name="alamat_anggota" placeholder="Alamat Anggota">
                <div class="px-2 error_alamat clear" style="display: none">
                </div>
              </div>

              <!-- phone mask -->
              <div class="form-group">
                <label>Nomor Handphone</label>
                <input type="number" class="form-control" data-mask name="nohp" placeholder="No. Handphone">
                <div class="px-2 error_nohp clear" style="display: none">
                </div>
              </div>

              <!-- Wilayah -->
              <div class="form-group">
                <label>Wilayah</label>
                <select class="custom-select select2bs4" style="width: 100%;" name="id_wilayah">
                  <option selected disabled value>-- Pilih --</option>
                  <?php foreach ($wilayah as $list_wilayah) { ?>
                    <option value="<?php echo $list_wilayah->id_wilayah ?>">
                      <?php echo $list_wilayah->nama_wilayah ?>
                    </option>
                  <?php
                  } ?>
                </select>
                <div class="px-2 error_wilayah clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmailAnggota">Email Anggota</label>
                <input type="email" class="form-control" id="inputEmailAnggota" name="email_anggota" placeholder="Email Anggota">
                <div class="px-2 error_email clear" style="display: none">
                </div>
              </div>
              <!-- jenis kelamin -->
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="custom-select select2bs4" style="width: 100%;" name="jenis_kelamin">
                  <option selected disabled value>-- Pilih --</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <div class="px-2 error_jenis_kelamin clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label for="inputGolonganDarah">Golongan Darah</label>
                <input type="text" class="form-control" id="inputGolonganDarah" name="golongan_darah" placeholder="Golongan darah">
                <div class="px-2 error_golongan_darah clear" style="display: none">
                </div>
              </div>
              <!-- status -->
              <div class="form-group">
                <label>Status</label>
                <select class="custom-select select2bs4" style="width: 100%;" name="status">
                  <option selected disabled value>-- Pilih --</option>
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>
                <div class="px-2 error_status clear" style="display: none">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPendidikan">Pendidikan</label>
                <input type="text" class="form-control" id="inputPendidikan" name="pendidikan" placeholder="Pendidikan">
                <div class="px-2 error_pendidikan clear" style="display: none">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="inputPekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                <div class="px-2 error_pekerjaan clear" style="display: none">
                </div>
              </div>
              <div class="form-group">
                <label for="inputKelompokEtnis">Kelompok Etnis</label>
                <input type="text" class="form-control" id="inputKelompokEtnis" name="kelompok_etnis" placeholder="Kelompok etnis">
                <div class="px-2 error_kelompok clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="dd/mm/YYYY">
                <div class="px-2 error_tanggal_lahir clear" style="display: none">
                </div>
              </div>
              <div class="form-group">
                <label>Tanggal Baptis</label>
                <input type="date" class="form-control" id="tanggal_baptis" name="tanggal_baptis" placeholder="dd/mm/YYYY">
                <div class="px-2 error_tanggal_baptis clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label>Tanggal Sidi</label>
                <input type="date" class="form-control" id="tanggal_sidi" name="tanggal_sidi" placeholder="dd/mm/YYYY">
                <div class="px-2 error_tanggal_sidi clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label>Tanggal Atestasi Masuk</label>
                <input type="date" class="form-control" id="tanggal_atestasi_masuk" name="tanggal_atestasi_masuk" placeholder="dd/mm/YYYY">
                <div class="px-2 error_tanggal_atestasi_masuk clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label>Tanggal Atestasi Keluar</label>
                <input type="date" class="form-control" id="tanggal_atestasi_keluar" name="tanggal_atestasi_keluar" placeholder="dd/mm/YYYY">
                <div class="px-2 error_tanggal_atestasi_keluar clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label>Tanggal Meninggal</label>
                <input type="date" class="form-control" id="tanggal_meninggal" name="tanggal_meninggal" placeholder="dd/mm/YYYY">
                <div class="px-2 error_tanggal_meninggal clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label>Tanggal DKH</label>
                <input type="date" class="form-control" id="tanggal_dkh" name="tanggal_dkh" placeholder="dd/mm/YYYY">
                <div class="px-2 error_tanggal_dkh clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label>Tanggal Ex DKH</label>
                <input type="date" class="form-control" id="tanggal_ex_dkh" name="tanggal_ex_dkh" placeholder="dd/mm/YYYY">
                <div class="px-2 error_tanggal_ex_dkh clear" style="display: none">
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary simpan">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- modal tambah akun jemaat -->
    <div class="modal fade" id="modal-akun-jemaat">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Membuat Akun Jemaat</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="tambah-akun" action="<?php echo base_url() . 'Anggota_Jemaat/tambah_akun_jemaat' ?>" method="post">
              <div class="form-group">
                <label>Jemaat</label>
                <select class="pilih-jemaat form-control" name="jemaat"></select>
                <div class="px-2 error_jemaat" style="display: none"></div>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="username">
                <div class="px-2 error_username" style="display: none"></div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary tambah">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- modal -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
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

<!-- Page specific script -->
<script>
  $(document).ready(function() {
    $('#list_anggota').DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "language": {
        "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
        "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "lengthMenu": "Tampilkan _MENU_ data",
        "loadingRecords": "Sedang memuat...",
        "processing": "Sedang memproses...",
        "search": "Cari:",
        "zeroRecords": "Tidak ditemukan data yang sesuai",
        "thousands": "'",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Selanjutnya",
          "previous": "Sebelumnya"
        }
      },
      ajax: {
        url: "<?php echo base_url() . 'Anggota_Jemaat/tampil_jemaat' ?>",
        dataSrc: ""
      },
      columns: [{
          data: null,
          name: null,
          render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {
          "data": "no_anggota"
        },
        {
          "data": "nama_lengkap_anggota"
        },
        {
          "data": "nama_wilayah"
        },
        {
          "data": "email_anggota"
        },
        {
          "data": "jenis_kelamin_anggota"
        },
        {
          data: null,
          name: null,
          sortable: true,
          //  searchable: false,
          render: function(data, type, row, meta) {
            switch (row.status_anggota) {
              case "1":
                return `<span class="badge badge-success">Aktif</span>`;
                break;
              default:
                return `<span class="badge badge-danger">Tidak Aktif</span>`;
                break;
            }
          }
        },
        {
          data: null,
          name: null,
          sortable: false,
          render: function(data, type, row, meta) {
            return `<a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'Anggota_Jemaat/lihat_detail_anggota/' ?>${row.id_anggota}">
                         <i class="fas fa-eye"></i> Detail
                        </a>
                        <?php if ($this->session->userdata('level_user') == 2) { ?><a class="btn btn-info btn-sm" href="<?php echo base_url() . 'Anggota_Jemaat/edit_anggota/' ?>${row.id_anggota}">
                         <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                        <?php } ?>`;


          }
        },
      ]
    });


    $('[data-mask]').inputmask();

    $('.pilih-jemaat').select2({
      placeholder: 'pilih',
      //  minimumInputLength: 3,
      ajax: {
        url: "<?php echo base_url() . 'Anggota_Jemaat/nama_jemaat' ?>",
        type: 'POST',
        dataType: 'JSON',
        delay: 250,
        data: function(params) {
          return {
            searchJemaat: params.term
          };
        },
        processResults: function(data) {
          return {
            results: data,
          };
        },
      },
    });

    $('.form-submit').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        dataType: "JSON",
        data: $(this).serialize(),
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
              window.location.reload();
            });
          }

        }
      });
    });

    $('.tambah-akun').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        dataType: 'JSON',
        data: $(this).serialize(),
        beforeSend: function() {
          $('.tambah').html('<i class="fa fa-spin fa-spinner"></i>');
          $('.tambah').attr('disabled', 'disabled');
        },
        complete: function() {
          $('.tambah').removeAttr('disabled');
          $('.tambah').html('Tambah');
        },
        success: function(respon) {
          if (respon.sukses == false) {
            if (respon.error_jemaat) {
              $('.error_jemaat').show();
              $('.error_jemaat').html(respon.error_jemaat);
              $('.error_jemaat').css("color", "red");
            } else {
              $('.error_jemaat').hide();
            }
            if (respon.error_username) {
              $('.error_username').show();
              $('.error_username').html(respon.error_username);
              $('.error_username').css("color", "red");
            } else {
              $('.error_username').hide();
            }
          } else {
            // $('.clear').hide();
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

    const sukses = $('.sukses').data('flashdata');

    if (sukses) {
      Swal.fire({
        title: 'Data Jemaat',
        text: sukses,
        icon: 'success'
      });
    }

  });
</script>
</body>

</html>