<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Mengelola User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">User</li>
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
          <h3 class="card-title">Tabel User</h3>
        </div>

        <div class="card-body">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-plus"></i> Tambah user
          </button><br><br>

          <table id="tabel_admin" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Level</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>

          <?php $no = 0;
          foreach ($user as $list_user) {
            $no++; ?>
            <!-- modal untuk menampilakn form edit -->
            <div class="modal fade" id="modal-lg<?php echo $list_user->id_user; ?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo base_url() . 'Admin/proses_edit_status' ?>" method="post">
                      <input type="hidden" class="form-control" name="id" value="<?= $list_user->id_user; ?>">
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2bs4" style="width: 100%;" id="status" name="status" required>
                          <option selected disabled value>Status</option>
                          <option value="1">Aktif</option>
                          <option value="0">Tidak Aktif</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-block btn-primary btn-sm">Submit</button>
                    </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          <?php } ?>
        </div>

      </div>
    </div>
    <!-- modal untuk menampilkan form input admin -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Input User Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-submit" action="<?php echo base_url() . 'Admin/tambah_user'  ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama_lengkap" placeholder="Nama Lengkap">
                <!-- INFO ERROR -->
                <div class="px-2 error_nama clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <!-- INFO ERROR -->
                <div class="px-2 error_username clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <!-- INFO ERROR -->
                <div class="px-2 error_password clear" style="display: none">
                </div>
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                <!-- INFO ERROR -->
                <div class="px-2 error_email clear" style="display: none">
                </div>
              </div>

              <!-- Posisi -->
              <div class="form-group">
                <label>Level</label>
                <select class="custom-select select2bs4" style="width: 100%;" id="level" name="level">
                  <option selected disabled value>-- Pilih --</option>
                  <?php foreach ($levelUser as $list_level) { ?>
                    <option value="<?php echo $list_level->id_level_user ?>"><?php echo $list_level->level_user ?></option>
                  <?php } ?>
                </select>
                <!-- INFO ERROR -->
                <div class="px-2 error_level clear" style="display: none">
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
<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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

<script>
  $(document).ready(function() {
    $('#tabel_admin').DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "language": {
        "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "lengthMenu": "Tampilkan _MENU_ entri",
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
        url: "<?php echo base_url() . 'Admin/tampil_user' ?>",
        dataSrc: ""
      },
      columns: [{
          "data": "id_user"
        },
        {
          "data": "nama_lengkap"
        },
        {
          "data": "username"
        },
        {
          "data": "email_user"
        },
        {
          "data": "level_user"
        },
        {
          data: null,
          name: null,
          render: function(data, type, row, meta) {
            switch (row.status_user) {
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
            switch (row.status_user) {
              case "1":
                return `<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg${row.id_user}">
                          <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                        <a class="btn btn-danger btn-sm tombol-hapus" href="<?php echo base_url() . 'Admin/hapus_user/' ?>${row.id_user}" data-toggle="tooltip" data-placement="bottom" title="Hapus Data Admin">
                          <i class="fas fa-trash"></i> Hapus
                        </a>`;
                break;
              default:
                return `<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg${row.id_user}">
                          <i class="fas fa-pencil-alt"></i> Edit
                        </a>`;
                break;
            }
          }
        }
      ]
    });

    $('[data-mask]').inputmask();

    $(document).on('click', '.tombol-hapus', function(e) {
      e.preventDefault();
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

    const sukses = $('.sukses').data('flashdata');
    if (sukses) {
      Swal.fire({
        title: 'Data Admin',
        text: sukses,
        icon: 'success'
      });
    }

    function valid() {
      $('.clear').hide();
      $('#nama').removeClass('is-invalid');
      $('#username').removeClass('is-invalid');
      $('#password').removeClass('is-invalid');
      $('#email').removeClass('is-invalid');
      $('#level').removeClass('is-invalid');
    }

    $('.form-submit').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: $(this).serialize(),
        beforeSend: function() {
          $('.simpan').attr('disable', 'disabled');
          $('.simpan').html('<i class="fa fa-spin fa-spinner"></i>');
        },
        complete: function() {
          $('.simpan').removeAttr('disable');
          $('.simpan').html('Tambah');
        },
        success: function(respon) {
          var obj = $.parseJSON(respon);
          if (obj.sukses == false) {
            if (obj.error_nama) {
              $('#nama').addClass('is-invalid');
              $('.error_nama').show();
              $('.error_nama').html(obj.error_nama);
              $('.error_nama').css("color", "red");
            } else {
              $('#nama').removeClass('is-invalid');
              $('.error_nama').hide();
            }
            if (obj.error_username) {
              $('#username').addClass('is-invalid');
              $('.error_username').show();
              $('.error_username').html(obj.error_username);
              $('.error_username').css("color", "red");
            } else {
              $('#username').removeClass('is-invalid');
              $('.error_username').hide();
            }
            if (obj.error_password) {
              $('#password').addClass('is-invalid');
              $('.error_password').show();
              $('.error_password').html(obj.error_password);
              $('.error_password').css("color", "red");
            } else {
              $('#password').removeClass('is-invalid');
              $('.error_password').hide();
            }
            if (obj.error_email) {
              $('#email').addClass('is-invalid');
              $('.error_email').show();
              $('.error_email').html(obj.error_email);
              $('.error_email').css("color", "red");
            } else {
              $('#email').removeClass('is-invalid');
              $('.error_email').hide();
            }
            if (obj.error_level) {
              $('#level').addClass('is-invalid');
              $('.error_level').show();
              $('.error_level').html(obj.error_level);
              $('.error_level').css("color", "red");
            } else {
              $('#level').removeClass('is-invalid');
              $('.error_level').hide();
            }

          } else {
            valid();
            Swal.fire({
              title: 'Sukses',
              text: obj.sukses,
              icon: 'success',
            }).then((confirmed) => {
              window.location.reload();
            });
          }

        }
      });
    });

    const gagal = $('.gagal').data('flashdata');

    if (gagal) {
      Swal.fire({
        title: 'Data Admin',
        text: gagal,
        icon: 'error'
      });
    }
  });
</script>

</body>

</html>