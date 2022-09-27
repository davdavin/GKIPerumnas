<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ruangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Dashboard' ?>"><i class="fas fa-tachometer-alt"></i></a></li>
                        <li class="breadcrumb-item active">Ruangan</li>
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
                    <h3 class="card-title">Ruangan</h3>
                </div>

                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-plus"></i> Ruangan
                    </button><br><br>

                    <table id="tabel_ruangan" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ruangan</th>
                                <th>Kapasitas</th>
                                <th>Perlengkapan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
        <!-- modal untuk menampilkan form input admin -->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-top: 10px solid #428bca;">
                    <div class="modal-header">
                        <h4 class="modal-title">Input Ruangan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-submit" action="<?php echo base_url() . 'mengelola_ruangan/tambah'  ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Ruangan</label>
                                <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" placeholder="Nama">
                                <!-- INFO ERROR -->
                                <div class="px-2 error_nama clear" style="display: none">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kapasitas</label>
                                <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas">
                                <!-- INFO ERROR -->
                                <div class="px-2 error_kapasitas clear" style="display: none">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Perlengkapan</label>
                                <input type="text" class="form-control" id="perlengkapan" name="perlengkapan" placeholder="Perlengkapan">
                                <!-- INFO ERROR -->
                                <div class="px-2 error_perlengkapan clear" style="display: none">
                                </div>
                            </div>
                            <!-- Foto -->
                            <div class="form-group">
                                <label>Input Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto">
                                        <label class="custom-file-label" for="foto">Pilih foto (Maks size 5MB)</label>
                                    </div>
                                </div>
                                <div class="px-2 error_foto clear" style="display: none">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary simpan" id="tombolSimpan">Submit</button>
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
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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
        $('#tabel_ruangan').DataTable({
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
                url: "<?php echo base_url() . 'mengelola_ruangan/tampil' ?>",
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
                    "data": "nama_ruangan"
                },
                {
                    "data": "kapasitas"
                },
                {
                    "data": "perlengkapan"
                },
                {
                    data: null,
                    name: null,
                    render: function(data, type, row, meta) {
                        return ``;
                    }
                }
            ]
        });

        function valid() {
            $('.clear').hide();
            $('#nama_ruangan').removeClass('is-invalid');
            $('#kapasitas').removeClass('is-invalid');
            $('#perlengkapan').removeClass('is-invalid');
            $('#foto').removeClass('is-invalid');
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
                    $('.simpan').html('Tambah');
                },
                success: function(respon) {
                    if (respon.sukses == false) {
                        if (respon.error_nama) {
                            $('#nama_ruangan').addClass('is-invalid');
                            $('.error_nama').show();
                            $('.error_nama').html(respon.error_nama);
                            $('.error_nama').css("color", "red");
                        } else {
                            $('#nama_ruangan').removeClass('is-invalid');
                            $('.error_nama').hide();
                        }
                        if (respon.error_kapasitas) {
                            $('#kapasitas').addClass('is-invalid');
                            $('.error_kapasitas').show();
                            $('.error_kapasitas').html(respon.error_kapasitas);
                            $('.error_kapasitas').css("color", "red");
                        } else {
                            $('#kapasitas').removeClass('is-invalid');
                            $('.error_kapasitas').hide();
                        }
                        if (respon.error_perlengkapan) {
                            $('#perlengkapan').addClass('is-invalid');
                            $('.error_perlengkapan').show();
                            $('.error_perlengkapan').html(respon.error_perlengkapan);
                            $('.error_perlengkapan').css("color", "red");
                        } else {
                            $('#perlengkapan').removeClass('is-invalid');
                            $('.error_perlengkapan').hide();
                        }
                        if (respon.error_foto) {
                            $('#foto').addClass('is-invalid');
                            $('.error_foto').show();
                            $('.error_foto').html(respon.error_foto);
                            $('.error_foto').css("color", "red");
                        } else {
                            $('#foto').removeClass('is-invalid');
                            $('.error_foto').hide();
                        }
                    } else {
                        valid();
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

        $('[data-mask]').inputmask();

        bsCustomFileInput.init();

        const sukses = $('.sukses').data('flashdata');
        if (sukses) {
            Swal.fire({
                title: 'Pencatatan',
                text: sukses,
                icon: 'success'
            });
        }

        const gagal = $('.gagal').data('flashdata');

        if (gagal) {
            Swal.fire({
                title: 'Pencatatan',
                text: gagal,
                icon: 'error'
            });
        }
    });
</script>

</body>

</html>