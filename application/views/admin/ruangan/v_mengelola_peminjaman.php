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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'mengelola_ruangan' ?>">Ruangan</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
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

                    <table id="tabel_ruangan" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Ruangan</th>
                                <th>Nama</th>
                                <th>Keperluan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>

        <?php $no = 0;
        foreach ($peminjaman as $list) {
            $no++; ?>
            <!-- modal untuk menampilakn form edit -->
            <div class="modal fade" id="modal-lg<?php echo $list->id_peminjaman; ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'mengelola_ruangan/update_status' ?>" method="post">
                                <input type="hidden" class="form-control" name="id" value="<?= $list->id_peminjaman; ?>">
                                <input type="hidden" class="form-control" name="nama_peminjam" value="<?= $list->nama_lengkap_anggota; ?>">
                                <input type="hidden" class="form-control" name="email_peminjam" value="<?= $list->email_anggota; ?>">

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="custom-select status" style="width: 100%;" name="status" id="status" onchange="enter()" required>
                                        <option selected disabled value>-- Pilih --</option>
                                        <?php if ($list->status_peminjaman == "SEDANG DIPROSES") { ?>
                                            <option value="DITERIMA">DITERIMA</option>
                                            <option value="DITOLAK">DITOLAK</option>
                                        <?php } ?>
                                        <?php if (strtotime('today') >= strtotime($list->tanggal_booking)) { ?>
                                            <option value="SELESAI">SELESAI</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group" id="pesan">
                                    <label>Pesan</label><br>
                                    <textarea name="pesan" style="width: 100%;" required></textarea>
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
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
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
                url: "<?php echo base_url() . 'mengelola_ruangan/tampil_peminjaman' ?>",
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
                    "data": "nama_lengkap_anggota"
                },
                {
                    "data": "keperluan"
                },
                {
                    "data": "tanggal_booking"
                },
                {
                    "data": "jam"
                },
                {
                    data: null,
                    name: null,
                    //  searchable: false,
                    render: function(data, type, row, meta) {
                        switch (row.status_peminjaman) {
                            case "SEDANG DIPROSES":
                                return `<span class="badge badge-warning text-white">Sedang Diproses</span>`;
                                break;
                            case "DITERIMA":
                                return `<span class="badge badge-success">Diterima</span>`;
                                break;
                            case "DITOLAK":
                                return `<span class="badge badge-danger">Ditolak</span>`;
                                break;
                            default:
                                return `<span class="badge badge-primary">Selesai</span>`;
                                break;
                        }
                    }
                },
                {
                    data: null,
                    name: null,
                    render: function(data, type, row, meta) {
                        switch (row.status_peminjaman) {
                            case "SEDANG DIPROSES":
                                return `<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg${row.id_peminjaman}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Konfirmasi
                                        </a>`;
                                break;
                            case "DITERIMA":
                                return `<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg${row.id_peminjaman}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Konfirmasi
                                        </a>`;
                                break;
                            case "DITOLAK":
                                return `<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg${row.id_peminjaman}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Konfirmasi
                                        </a>`;
                                break;
                            default:
                                return `<button class="btn btn-info btn-sm" disabled>
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Konfirmasi
                                        </button>`;
                                break;
                        }
                    }
                }
            ]
        });

        $('.pilih-ruangan').select2({
            placeholder: 'pilih',
            language: {
                inputTooShort: function(args) {
                    var chars = args.minimum - args.input.length;
                    if (chars == args.minimum) {
                        return "Masukan minimal " + chars + " atau lebih karakter";
                    } else {
                        return "Masukan " + chars + " huruf lagi";
                    }
                },
                searching: function() {
                    return "Mencari...";
                },
                noResults: function() {
                    return "Tidak ada data yang sesuai";
                }
            },
            ajax: {
                url: "<?php echo base_url() . 'MengelolaRuangan/pilih_ruangan' ?>",
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

        const sukses = $('.sukses').data('flashdata');
        if (sukses) {
            Swal.fire({
                title: 'Peminjaman',
                text: sukses,
                icon: 'success'
            });
        }

        const gagal = $('.gagal').data('flashdata');

        if (gagal) {
            Swal.fire({
                title: 'Peminjaman',
                text: gagal,
                icon: 'error'
            });
        }
    });
</script>

</body>

</html>