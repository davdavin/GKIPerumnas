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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-plus"></i> Tambah anggota jemaat
          </button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-akun-jemaat">
            <!-- coba -->
            <i class="mr-1 fas fa-plus"></i> Akun Jemaat
          </button><br><br>

          <table id="list_anggota" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
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
          <div class="modal-body">
            <form action="<?php echo base_url() . 'Anggota_Jemaat/masuk_anggota_jemaat' ?>" method="post">
              <div class="form-group">
                <label for="inputNoAnggota">No Anggota</label>
                <input type="number" class="form-control" id="inputNoAnggota" name="no_anggota" placeholder="No Anggota" required>
              </div>
              <div class="form-group">
                <label>Nama Anggota</label>
                <input type="text" class="form-control" name="nama_anggota" placeholder="Nama Lengkap Anggota" required>
              </div>
              <div class="form-group">
                <label>Alamat Anggota</label>
                <input type="text" class="form-control" name="alamat_anggota" placeholder="Alamat Anggota" required>
              </div>

              <!-- phone mask -->
              <div class="form-group">
                <label>Nomor HP (Indonesia):</label>
                <div class="input-group">
                  <input type="text" class="form-control" data-inputmask='"mask": "089999999999[9][9][9]"' data-mask name="nohp" required>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                </div>
              </div>

              <!-- Wilayah -->
              <div class="form-group">
                <label>Wilayah</label>
                <select class="form-control select2bs4" style="width: 100%;" name="id_wilayah" required>
                  <option selected disabled value>Pilih wilayah</option>
                  <?php foreach ($wilayah as $list_wilayah) { ?>
                    <option value="<?php echo $list_wilayah->id_wilayah ?>">
                      <?php echo $list_wilayah->nama_lengkap_anggota . ' - ' . $list_wilayah->nama_wilayah ?>
                    </option>
                  <?php
                  } ?>
                </select>
              </div>

              <div class="form-group">
                <label for="inputEmailAnggota">Email Anggota</label>
                <input type="email" class="form-control" id="inputEmailAnggota" name="email_anggota" placeholder="Email Anggota" required>
              </div>
              <!-- jenis kelamin -->
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control select2bs4" style="width: 100%;" name="jenis_kelamin" required>
                  <option selected disabled value>Pilih jenis kelamin</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div class="form-group">
                <label for="inputGolonganDarah">Golongan Darah</label>
                <input type="text" class="form-control" id="inputGolonganDarah" name="golongan_darah" placeholder="Golongan darah" required>
              </div>
              <!-- status -->
              <div class="form-group">
                <label>Status</label>
                <select class="form-control select2bs4" style="width: 100%;" name="status" required>
                  <option selected disabled value>Status</option>
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputPendidikan">Pendidikan</label>
                <input type="text" class="form-control" id="inputPendidikan" name="pendidikan" placeholder="Pendidikan" required>
              </div>
              <div class="form-group">
                <label for="inputPekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="inputPekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
              </div>
              <div class="form-group">
                <label for="inputKelompokEtnis">Kelompok Etnis</label>
                <input type="text" class="form-control" id="inputKelompokEtnis" name="kelompok_etnis" placeholder="Kelompok etnis" required>
              </div>

              <!-- Tanggal Lahir -->
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group date" id="tanggalLahir" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#tanggalLahir" name="tanggal_lahir" placeholder="yyyy-mm-dd" required />
                  <div class="input-group-append" data-target="#tanggalLahir" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>


              <!-- Tanggal Lahir -->
              <div class="form-group">
                <label>Tanggal Baptis</label>
                <div class="input-group date" id="tanggalBaptis" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#tanggalBaptis" name="tanggal_baptis" placeholder="yyyy-mm-dd" />
                  <div class="input-group-append" data-target="#tanggalBaptis" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>

              <!-- Tanggal Sidi -->
              <div class="form-group">
                <label>Tanggal Sidi</label>
                <div class="input-group date" id="tanggalSidi" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#tanggalSidi" name="tanggal_sidi" placeholder="yyyy-mm-dd" />
                  <div class="input-group-append" data-target="#tanggalSidi" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>

              <!-- Tanggal Atestasi Masuk -->
              <div class="form-group">
                <label>Tanggal Atestasi Masuk</label>
                <div class="input-group date" id="tanggalAM" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#tanggalAM" name="tanggal_atestasi_masuk" placeholder="yyyy-mm-dd" />
                  <div class="input-group-append" data-target="#tanggalAM" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>

              <!-- Tanggal Atestasi Keluar -->
              <div class="form-group">
                <label>Tanggal Atestasi Keluar</label>
                <div class="input-group date" id="tanggalAK" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#tanggalAK" name="tanggal_atestasi_keluar" placeholder="yyyy-mm-dd" />
                  <div class="input-group-append" data-target="#tanggalAK" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>

              <!-- Tanggal Meninggal-->
              <div class="form-group">
                <label>Tanggal Meninggal</label>
                <div class="input-group date" id="tanggalMeninggal" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#tanggalMeninggal" name="tanggal_meninggal" placeholder="yyyy-mm-dd" />
                  <div class="input-group-append" data-target="#tanggalMeninggal" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>

              <!-- Tanggal DKH -->
              <div class="form-group">
                <label>Tanggal DKH</label>
                <div class="input-group date" id="tanggalDKH" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#tanggalDKH" name="tanggal_dkh" placeholder="yyyy-mm-dd" />
                  <div class="input-group-append" data-target="#tanggalDKH" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>

              <!-- Tanggal Ex DKH -->
              <div class="form-group">
                <label>Tanggal ex DKH</label>
                <div class="input-group date" id="tanggalExDKH" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#tanggalExDKH" name="tanggal_ex_dkh" placeholder="yyyy-mm-dd" />
                  <div class="input-group-append" data-target="#tanggalExDKH" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-block btn-primary btn-sm">Submit</button>
            </form>
          </div>
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
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
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
      //  "processing": true,
      //"severSide": true,
      ajax: {
        url: '<?php echo base_url() . '/Anggota_Jemaat/tampil_jemaat' ?>',
        dataSrc: ''
      },
      columns: [{
          "data": "id_anggota"
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
            switch (row.status_anggota) {
              case "1":
                return `<a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'Anggota_Jemaat/lihat_detail_anggota/' ?>${row.id_anggota}">
                         <i class="fas fa-eye"></i> Detail
                        </a>
                        <a class="btn btn-info btn-sm" href="<?php echo base_url() . 'Anggota_Jemaat/edit_anggota/' ?>${row.id_anggota}">
                         <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                        <a class="btn btn-danger btn-sm tombol-hapus" href="<?php echo base_url() . 'Anggota_Jemaat/hapus_anggota/' ?>${row.id_anggota}">
                          <i class="fas fa-trash"></i> Hapus
                        </a>`;
                break;
              default:
                return `<a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'Anggota_Jemaat/lihat_detail_anggota/' ?>${row.id_anggota}">
                         <i class="fas fa-eye"></i> Detail
                        </a>
                        <a class="btn btn-info btn-sm" href="<?php echo base_url() . 'Anggota_Jemaat/edit_anggota/' ?>${row.id_anggota}">
                         <i class="fas fa-pencil-alt"></i> Edit
                        </a>`;
                break;
            }
          }
        },
      ]
    });

    $(document).on('click', '.tombol-hapus', function(e) {
      e.preventDefault(); //untuk stop link href yang awal
      const href = $(this).attr('href')

      Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Status data akan diubah menjadi tidak aktif',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ubah status'
      }).then((result) => {
        if (result.value) { //ini sama aja kayak == TRUE
          document.location.href = href;
        }
      });
    });

    $('[data-mask]').inputmask();
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

    $('.pilih-jemaat').select2({
      placeholder: 'pilih',
      //  minimumInputLength: 3,
      ajax: {
        url: '<?php echo base_url() . 'Anggota_Jemaat/nama_jemaat' ?>',
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

    /* $('.tombol-hapus').click(function(e) {
       e.preventDefault(); //untuk stop link href yang awal
       const href = $(this).attr('href')

       Swal.fire({
         title: 'Apakah anda yakin?',
         text: 'Status data akan diubah menjadi tidak aktif',
         icon: 'warning',
         showCancelButton: true,
         cancelButtonText: 'batal',
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Ubah status'
       }).then((result) => {
         if (result.value) { //ini sama aja kayak == TRUE
           document.location.href = href;
         }
       });

     }); */

  });
</script>
</body>

</html>