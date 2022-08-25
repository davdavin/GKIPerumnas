<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dokumen</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dokumen</li>
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
          <h3 class="card-title">Tabel Data Dokumen</h3>
        </div>

        <div class="card-body">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-plus"></i> Tambah dokumen
          </button><br><br>

          <table id="list_dokumen" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Kode Dokumen</th>
                <th>Jenis Dokumen</th>
                <th>File</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($dokumen as $list_dokumen) { ?>
                <tr>
                  <td><?php echo $list_dokumen->id_dokumen ?></td>
                  <td><?php echo $list_dokumen->kode_dokumen ?></td>
                  <td><?php echo $list_dokumen->jenis_dokumen ?></td>
                  <td><a href="<?php echo base_url() . 'Dokumen/view_file/' . $list_dokumen->dokumen ?>" target="_blank"><?php echo $list_dokumen->dokumen ?></a></td>
                  <td><?php echo $list_dokumen->keterangan ?></td>
                  <td>
                    <a class=" btn btn-primary btn-sm" href="<?php echo base_url() . 'uploadDokumen/' . $list_dokumen->dokumen ?>" download>
                      <i class="fas fa-download">
                      </i>
                      Unduh
                    </a>
                    <a class="btn btn-info btn-sm" href="<?php echo base_url() . 'Dokumen/edit_dokumen/' . $list_dokumen->id_dokumen ?>">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                    </a>
                    <a class="btn btn-danger btn-sm tombol-hapus" href="<?php echo base_url() . 'Dokumen/hapus_dokumen/' . $list_dokumen->id_dokumen ?>">
                      <i class="fas fa-trash">
                      </i>
                      Hapus
                    </a>
                  </td>
                </tr>
              <?php
              } ?>

            </tbody>
          </table>

        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Pengumpulan Dokumen</h3>
        </div>

        <div class="card-body">
          <table id="pengumpulan" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Pengumpul</th>
                <th>Email Pengumpul</th>
                <th>Jenis Dokumen</th>
                <th>File</th>
                <th>Tanggal Kumpul</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($pengumpulanDokumen as $list_pengumpulan_dokumen) { ?>
                <tr>
                  <td><?php echo $list_pengumpulan_dokumen->id_pengumpulan ?></td>
                  <td><?php echo $list_pengumpulan_dokumen->nama_lengkap_pengumpul ?></td>
                  <td><?php echo $list_pengumpulan_dokumen->email_pengumpul ?></td>
                  <td><?php echo $list_pengumpulan_dokumen->jenis_dokumen ?></td>
                  <td><?php echo $list_pengumpulan_dokumen->kumpul_dokumen ?></td>
                  <td><?php echo date_format(date_create($list_pengumpulan_dokumen->tanggal_kumpul), "d F Y"); ?></td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'pengumpulanDokumen/' . $list_pengumpulan_dokumen->kumpul_dokumen ?>" download>
                      <i class="fas fa-download">
                      </i>
                      Unduh
                    </a>
                  </td>
                </tr>
              <?php
              } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- modal untuk menampilkan form input dokumen -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Input Dokumen Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open_multipart('Dokumen/tambah_dokumen'); ?>
            <div class="form-group">
              <label for="jenisDokumen">Jenis dokumen</label>
              <input type="text" class="form-control" id="jenisDokumen" name="jenis" required>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="dokumen" required>
                  <label class="custom-file-label" for="exampleInputFile">Pilih file (Maks size file 5 MB & format PDF)</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" class="form-control" id="keterangan" name="keterangan" required>
            </div>
            <button type="submit" class="btn btn-block btn-primary btn-sm">Submit</button>
            </form>
          </div>
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
</footer>

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

<!-- Page specific script -->
<script>
  $(function() {
    $("#list_dokumen").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#pengumpulan").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false
    });

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()
    //Date picker
    $('#reservationdate').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    bsCustomFileInput.init();

    const sukses = $('.sukses').data('flashdata');

    if (sukses) {
      Swal.fire({
        title: 'Dokumen',
        text: sukses,
        icon: 'success'
      });
    }

    const gagal = $('.gagal').data('flashdata');

    if (gagal) {
      Swal.fire({
        title: 'Tidak Berhasil',
        text: gagal,
        icon: 'error'
      });
    }

    $('.tombol-hapus').click(function(e) {
      e.preventDefault();
      const href = $(this).attr('href')

      Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Dokumen akan dihapus secara permanen',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) { //ini sama aja kayak == TRUE
          document.location.href = href;
        }
      });

    });
  });
</script>
</body>

</html>