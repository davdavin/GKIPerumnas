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
            <li class="breadcrumb-item active">Pendeta</li>
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
          <h3 class="card-title">Tabel Data Pendeta</h3>
        </div>

        <div class="card-body">
          <?php if ($this->session->userdata('level_user') == 2) { ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
              <i class="fas fa-plus"></i> Tambah pendeta
            </button><br><br>
          <?php } ?>

          <table id="tabel_pendeta" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>No Pendeta</th>
                <th>Nama Lengkap</th>
                <th>No Hp</th>
                <th>Tanggal Lahir</th>
                <th>Status</th>
                <?php if ($this->session->userdata('level_user') == 2) { ?>
                  <th>Aksi</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>

      </div>
    </div>
    <!-- modal untuk menampilkan form input pendeta -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Input Pendeta Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-submit" action="<?php echo base_url() . 'Pendeta/tambah_pendeta' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Lengkap Pendeta</label>
                <input type="text" class="form-control" name="nama_pendeta" placeholder="Nama Pendeta">
                <div class="px-2 error_nama clear" style="display: none">
                </div>
              </div>
              <div class="form-group">
                <label>Alamat Pendeta</label>
                <input type="text" class="form-control" name="alamat_pendeta" placeholder="Alamat Pendeta">
                <div class="px-2 error_alamat clear" style="display: none">
                </div>
              </div>

              <!-- phone mask -->
              <div class="form-group">
                <label>Nomor Handphone</label>
                <input type="text" class="form-control" data-mask name="nohp" placeholder="No. Handphone">
                <div class="px-2 error_nohp clear" style="display: none">
                </div>
              </div>
              <div class="form-group">
                <label>Email Pendeta</label>
                <input type="email" class="form-control" name="email_pendeta" placeholder="Email Pendeta">
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
                <label>Tanggal Lahir</label>
                <input type="date" class="tm form-control" name="tanggal_lahir" id="tanggalLahir">
                <div class="px-2 error_tanggal clear" style="display: none">
                </div>
              </div>

              <!-- Foto -->
              <div class="form-group">
                <label>File Input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                    <label class="custom-file-label" for="exampleInputFile">Pilih file (Maksimal 5MB)</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                <div class="px-2 error_foto clear" style="display: none">
                </div>
              </div>

              <!-- status -->
              <div class="form-group">
                <label>Status</label>
                <select class="form-control select2bs4" style="width: 100%;" name="status">
                  <option selected disabled value>Status</option>
                  <option value="PENDETA AKTIF">Pendeta Aktif</option>
                  <option value="PENATUA AKTIF">Penatua Aktif</option>
                  <option value="EMERITUS">Emeritus</option>
                  <option value="TIDAK AKTIF">Tidak Aktif</option>
                </select>
                <div class="px-2 error_status clear" style="display: none">
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

<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
  $(document).ready(function() {
    $('#tabel_pendeta').DataTable({
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
        url: "<?php echo base_url() . 'Pendeta/tampil_pendeta' ?>",
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
          "data": "no_pendeta"
        },
        {
          "data": "nama_lengkap_pendeta"
        },
        {
          "data": "nohp_pendeta"
        },
        {
          "data": "tanggal_lahir_pendeta"
        },
        {
          data: null,
          name: null,
          sortable: true,
          //  searchable: false,
          render: function(data, type, row, meta) {
            switch (row.status_pendeta) {
              case "PENDETA AKTIF":
                return `<span class="badge badge-success">Pendeta Aktif</span>`;
                break;
              case "PENATUA AKTIF":
                return `<span class="badge badge-success">Penatua Aktif</span>`;
                break;
              case "EMERITUS":
                return `<span class="badge badge-danger">Emeritus</span>`;
                break;
              default:
                return `<span class="badge badge-danger">Tidak Aktif</span>`;
                break;
            }
          }
        },
        <?php if ($this->session->userdata('level_user') == 2) { ?> {
            data: null,
            name: null,
            sortable: false,
            render: function(data, type, row, meta) {
              return `<a class="btn btn-primary btn-sm" href="<?php echo base_url('Pendeta/detail_pendeta') ?>/${row.id_pendeta}"><i class="fas fa-eye"></i> Detail</a>
                          <a class="btn btn-info btn-sm" href="<?php echo base_url('Pendeta/edit_pendeta') ?>/${row.id_pendeta}"><i class="fas fa-pencil-alt"></i> Edit</a>`;

            }
          },
        <?php } ?>
      ]
    });

    $('[data-mask]').inputmask();

    bsCustomFileInput.init();

    const sukses = $('.sukses').data('flashdata');

    if (sukses) {
      Swal.fire({
        title: 'Data Pendeta ',
        text: sukses,
        icon: 'success'
      });
    }

    const gagal = $('.gagal').data('flashdata');

    if (gagal) {
      Swal.fire({
        title: 'Data Pendeta',
        text: gagal,
        icon: 'error'
      });
    }

    $('.form-submit').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        dataType: "JSON",
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