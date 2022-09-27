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
                <h3 class="card-title">Form Komfirmasi Perubahan Data Jemaat</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php foreach ($permintaanPerubahan as $list_jemaat_edit) { ?>
                <form method="post" action="<?php echo base_url() . 'Anggota_Jemaat/proses_permintaan_perubahan' ?>">
                    <div class="card-body">
                        <div class="row edit-center">
                            <div class="col-sm-5">
                                <input type="hidden" name="id_permintaan" value="<?= $list_jemaat_edit->id_permintaan ?>">
                                <div class="form-group">
                                    <label for="inputNoAnggota">No Anggota</label>
                                    <input type="number" class="form-control" id="inputNoAnggota" name="no_anggota" value="<?= $list_jemaat_edit->no_anggota ?>" readonly>
                                </div>

                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Nomor HP (Indonesia):</label>
                                    <input type="text" class="form-control" data-inputmask='"mask": "089999999999[9][9][9]"' data-mask name="nohp" value="<?= dekripsi_notifikasi($list_jemaat_edit->nohp_baru) ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Alamat Anggota</label>
                                    <input type="text" class="form-control" name="alamat_anggota" value="<?= dekripsi_notifikasi($list_jemaat_edit->alamat_baru) ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmailAnggota">Email Anggota</label>
                                    <input type="email" class="form-control" id="inputEmailAnggota" name="email_anggota" value="<?= dekripsi_notifikasi($list_jemaat_edit->email_baru) ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="inputPekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" id="inputPekerjaan" name="pekerjaan" value="<?= dekripsi_notifikasi($list_jemaat_edit->pekerjaan_baru) ?>" readonly>
                                </div>
                            </div>
                        <?php } ?>
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

<script>
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
</script>
</body>

</html>