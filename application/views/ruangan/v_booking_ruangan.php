<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Jemaat | Ruangan</title>

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" rel="icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/tambahanStyle.css">

    <style>
        [class*="sidebar-light-"] .nav-sidebar>.nav-item>.nav-link.active {
            color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            background: #428bca;
        }

        .dropdown-item:hover {
            color: black;
            background-color: rgba(216, 216, 216, 0.904);
        }

        .img-center {
            display: flex;
            justify-content: center;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link">
                        <span class="mr-2 float-left text-muted"><?php echo $this->session->userdata('username'); ?></span>
                        <i class="far fa-user-circle fa-2x"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <a class="brand-link">
                <img src="<?php echo base_url(); ?>assets/dist/img/logo.jpg" alt="Logo GKI Perumnas" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">GKI Perumnas</span>
            </a>

            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Profil' ?>" class="nav-link">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p> Informasi </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Profil/update_profil/' . $this->session->userdata('username') ?>" class="nav-link">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p> Update </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Profil/update_password/' . $this->session->userdata('username') ?>" class="nav-link">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p> Ubah Password </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="<?php echo base_url() . 'Ruangan/list_ruangan' ?>" class="nav-link active">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>
                                    Ruangan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() . 'Ruangan/list_ruangan' ?>" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Informasi Ruangan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() . 'Ruangan/list_peminjaman' ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Peminjaman</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'login/jemaat/logout' ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Booking</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Profil' ?>">Informasi</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Ruangan/list_ruangan' ?>">Informasi Ruangan</a></li>
                                <li class="breadcrumb-item active">Booking</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Untuk memunculkan message berhasil tambah dan ubah data-->
                <?php $this->load->view('templates/message.php'); ?>
                <div class="container-fluid">
                    <div class="card">
                        <form method="post" action="<?php echo base_url() . 'Ruangan/proses_booking_ruangan' ?>" class="form-submit">
                            <div class="card-body">
                                <div class="img-center">
                                    <img src="<?php echo base_url(); ?>resources/assets/img/ruangan/<?php echo $ruangan['foto']; ?>" class="img-fluid" style="width: 500px; height: 400px;"><br><br>
                                </div>

                                <input type="hidden" name="id_anggota" value="<?= $this->session->userdata('id'); ?>">
                                <div class="form-group">
                                    <label>Ruangan</label>
                                    <input type="hidden" name="id_ruangan" value="<?php echo $ruangan['id_ruangan']; ?>">
                                    <input type="text" class="form-control" value="<?php echo $ruangan['nama_ruangan']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Keperluan</label>
                                    <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan">
                                    <div class="px-2 error_keperluan clear" style="display: none">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking" placeholder="dd/mm/YYYY">
                                    <div class="px-2 error_tanggal clear" style="display: none">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jam Mulai</label>
                                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai">
                                    <div class="px-2 error_jam_mulai clear" style="display: none">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jam Selesai</label>
                                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai">
                                    <div class="px-2 error_jam_selesai clear" style="display: none">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary simpan">Book</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Jadwal Pemakaian Ruang Terjadwal</h3>
                        </div>

                        <div class="card-body">
                            <table id="info_booking" class="table table-bordered table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
        </div>
    </div>

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
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
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
            const date = new Date();

let day = date.getDate() + 1;
let month = date.getMonth() + 1;
let year = date.getFullYear();

// This arrangement can be altered based on how we want the date's format to appear.
let currentDate = year+'-'+month+'-'+day;
//console.log(currentDate); // "17-6-2022"

            document.getElementById("tanggal_booking").min = currentDate;

            $('#info_booking').DataTable({
                "responsive": true,
                "autoWidth": false,
                "paging": false,
                "searching": false,
                "language": {
                    "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "info": "",
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
                    url: "<?php echo base_url() . 'ruangan/informasi_tanggal_booking/' . $id_ruangan ?>",
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
                        "data": "tanggal_booking"
                    },
                    {
                        "data":"jam"
                    }
                ]
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
                        $('.simpan').html('Book');
                    },
                    success: function(respon) {
                        if (respon.sukses == false) {
                            if (respon.error_keperluan) {
                                $('.error_keperluan').show();
                                $('.error_keperluan').html(respon.error_keperluan);
                                $('.error_keperluan').css("color", "red");
                            } else {
                                $('.error_keperluan').hide();
                            }
                            if (respon.error_tanggal) {
                                $('.error_tanggal').show();
                                $('.error_tanggal').html(respon.error_tanggal);
                                $('.error_tanggal').css("color", "red");
                            } else {
                                $('.error_tanggal').hide();
                            }
                            if (respon.error_jam_mulai) {
                                $('.error_jam_mulai').show();
                                $('.error_jam_mulai').html(respon.error_jam_mulai);
                                $('.error_jam_mulai').css("color", "red");
                            } else {
                                $('.error_jam_mulai').hide();
                            }
                            if (respon.error_jam_selesai) {
                                $('.error_jam_selesai').show();
                                $('.error_jam_selesai').html(respon.error_jam_selesai);
                                $('.error_jam_selesai').css("color", "red");
                            } else {
                                $('.error_jam_selesai').hide();
                            }
                            if (respon.error_booking) {
                                Swal.fire({
                                    text: respon.error_booking,
                                    icon: 'error'
                                });
                            }
                        } else {
                            $('.clear').hide();
                            Swal.fire({
                                title: 'Sukses',
                                text: respon.sukses,
                                icon: 'success',
                            }).then((confirmed) => {
                                window.location.href = "<?php echo base_url() . 'Ruangan/list_ruangan' ?>";
                            });
                        }

                    }
                });
            });
        });
    </script>

</body>

</html>