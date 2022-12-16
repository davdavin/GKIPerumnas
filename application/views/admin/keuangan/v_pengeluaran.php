<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Keuangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php if ($this->session->userdata('level_user') == 4) { ?>
                            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'keuangan' ?>">Keuangan</a></li>
                            <li class="breadcrumb-item active">Pengeluaran</li>
                        <?php } else { ?>
                            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'keuangan' ?>">Keuangan</a></li>
                            <li class="breadcrumb-item active">Pengeluaran</li>
                        <?php } ?>
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
                    <h3 class="card-title">Pengeluaran</h3>
                </div>

                <div class="card-body">
                    <?php if ($this->session->userdata('level_user') == 4) { ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                            <i class="fas fa-plus"></i> Pencatatan
                        </button><br><br>
                    <?php } ?>

                    <table id="tabel_keuangan" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kegiatan</th>
                                <th style="text-align: left;">Total</th>
                                <th>Tanggal Transaksi</th>
                                <th>Tanggal Pencatatan</th>
                                <th>Keterangan</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
        <!-- modal untuk menampilkan form input admin -->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pencatatan Pengeluaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-submit" action="<?php echo base_url() . 'keuangan/pencatatan_pengeluaran'  ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kegiatan</label>
                                <input type="text" class="form-control" id="kegiatan" name="kegiatan" placeholder="Kegiatan">
                                <!-- INFO ERROR -->
                                <div class="px-2 error_kegiatan clear" style="display: none">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Total</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control" id="uang_masuk" name="uang_keluar">
                                </div>
                                <div class="px-2 error_uang_keluar clear" style="display: none">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Keluar</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_keluar">
                                <div class="px-2 error_tanggal clear" style="display: none">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                                <div class="px-2 error_keterangan clear" style="display: none">
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
        $('#tabel_keuangan').DataTable({
            dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" + "<'row'<'col-md-5'i><'col-md-7'p>>",
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
            "buttons": [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ],
            ajax: {
                url: "<?php echo base_url() . 'keuangan/lihat_pengeluaran' ?>",
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
                    "data": "kegiatan",
                },
                {
                    "data": "uang_keluar",
                    "className": "dt-body-right"
                },
                {
                    "data": "tanggal_keluar"
                },
                {
                    "data":"tanggal_pencatatan"
                },
                {
                    "data": "keterangan",
                    sortable: false
                },
            ]
        });

        $('[data-mask]').inputmask();

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
                    if (respon.error_kegiatan) {
                    $('.error_kegiatan').show();
                    $('.error_kegiatan').html(respon.error_kegiatan);
                    $('.error_kegiatan').css("color", "red");
                    } else {
                    $('.error_kegiatan').hide();
                    }
                    if (respon.error_uang_keluar) {
                    $('.error_uang_keluar').show();
                    $('.error_uang_keluar').html(respon.error_uang_keluar);
                    $('.error_uang_keluar').css("color", "red");
                    } else {
                    $('.error_uang_keluar').hide();
                    }
                    if (respon.error_tanggal) {
                    $('.error_tanggal').show();
                    $('.error_tanggal').html(respon.error_tanggal);
                    $('.error_tanggal').css("color", "red");
                    } else {
                    $('.error_tanggal').hide();
                    }
                    if (respon.error_keterangan) {
                    $('.error_keterangan').show();
                    $('.error_keterangan').html(respon.error_keterangan);
                    $('.error_keterangan').css("color", "red");
                    } else {
                    $('.error_keterangan').hide();
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