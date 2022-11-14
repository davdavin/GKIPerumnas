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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
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
                    <?php if ($this->session->userdata('level_user') == 2) { ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                            <i class="fas fa-plus"></i> Tambah
                        </button><br><br>
                    <?php } ?>

                    <table id="tabel_ruangan" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Ruangan</th>
                                <th>Kapasitas</th>
                                <th>Perlengkapan</th>
                                <th>Foto</th>
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
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Ruangan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-submit" action="<?php echo base_url() . 'mengelola_ruangan/tambah'  ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body" id="add">
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
                                <textarea id="textArea" class="form-control" name="perlengkapan"></textarea>
                                <!-- INFO ERROR -->
                                <div class="px-2 error_perlengkapan clear" style="display: none">
                                </div>
                            </div>
                            <!-- Foto -->
                            <!-- <input type="hidden" id="count" name="count"> -->
                            <div class="form-group">
                                <label>Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto">
                                        <label class="custom-file-label" for="foto">Pilih foto (Maksimal 5MB)</label>
                                    </div>
                                </div>
                                <div class="px-2 error_foto clear" style="display: none">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <a type="button" class="btn btn-primary" onclick="addRow()">Add row</a> -->
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
<!-- tinymce -->
<script src="<?php echo base_url(); ?>resources/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>resources/tinymce/jquery.tinymce.min.js"></script>
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
                    data: "foto",
                    name: null,
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return `<img src="<?php echo base_url(); ?>resources/assets/img/ruangan/${row.foto}" class="img-fluid" alt="` + data + `" width="200" height="200">`;
                    }
                },
                {
                    data: null,
                    name: null,
                    //  searchable: false,
                    render: function(data, type, row, meta) {
                        switch (row.status_ruangan) {
                            case "TERSEDIA":
                                return `<span class="badge badge-success">Tersedia</span>`;
                                break;
                            default:
                                return `<span class="badge badge-danger">Tidak Tersedia</span>`;
                                break;
                        }
                    }
                },
                {
                    data: null,
                    name: null,
                    render: function(data, type, row, meta) {
                        return `<a class="btn btn-info btn-sm" href="<?php echo base_url() . 'mengelola_ruangan/edit/' ?>${row.id_ruangan}">
                          <i class="fas fa-pencil-alt"></i> Edit
                        </a>`;
                    }
                }
            ]
        });

        tinymce.init({
            selector: '#textArea',
            height: 200,
            plugins: [
                'advlist autolink lists preview',
                'fullscreen',
                'paste code wordcount'
            ],
            toolbar: 'undo redo | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });


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
                        if (respon.error_kapasitas) {
                            $('.error_kapasitas').show();
                            $('.error_kapasitas').html(respon.error_kapasitas);
                            $('.error_kapasitas').css("color", "red");
                        } else {
                            $('.error_kapasitas').hide();
                        }
                        if (respon.error_perlengkapan) {
                            $('.error_perlengkapan').show();
                            $('.error_perlengkapan').html(respon.error_perlengkapan);
                            $('.error_perlengkapan').css("color", "red");
                        } else {
                            $('.error_perlengkapan').hide();
                        }
                        if (respon.error_foto) {
                            $('.error_foto').show();
                            $('.error_foto').html(respon.error_foto);
                            $('.error_foto').css("color", "red");
                        } else {
                            $('.error_foto').hide();
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

        $('[data-mask]').inputmask();

        bsCustomFileInput.init();

        const sukses = $('.sukses').data('flashdata');
        if (sukses) {
            Swal.fire({
                title: 'Sukses',
                text: sukses,
                icon: 'success'
            });
        }

        const gagal = $('.gagal').data('flashdata');

        if (gagal) {
            Swal.fire({
                title: 'Gagal',
                text: gagal,
                icon: 'error'
            });
        }
    });
</script>

</body>

</html>