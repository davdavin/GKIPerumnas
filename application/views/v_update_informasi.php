<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil - Jemaat</title>

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
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <span class="mr-2 float-left text-muted"><?php echo $this->session->userdata('username'); ?></span>
                        <i class="far fa-user-circle fa-2x"></i>
                        <span class="ml-1 float-right"><i class="fas fa-caret-down fa-sm"></i></span> <!-- far fa-angle-down -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profil
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url() . 'Login/logout' ?>" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
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
                            <a href="<?php echo base_url() . 'Profil/update_profil/' . $this->session->userdata('username') ?>" class="nav-link active">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p> Update </p>
                            </a>
                        </li>
                        <!--   <li class="nav-item">
                            <a href="<?php // echo base_url() . 'Login/logout' 
                                        ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-primary">
                    <!-- form start -->
                    <?php foreach ($detail as $list_jemaat_edit) { ?>
                        <form method="post" action="<?php echo base_url() . 'Profil/proses_update' ?>">
                            <div class="card-body">
                                <div class="row edit-center">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="inputNoAnggota">No Anggota</label>
                                            <input type="number" class="form-control" id="inputNoAnggota" name="no_anggota" value="<?= $list_jemaat_edit->no_anggota ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <input type="text" class="form-control" name="nama_anggota" value="<?= $list_jemaat_edit->nama_lengkap_anggota ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Anggota</label>
                                            <input type="text" class="form-control" name="alamat_anggota" value="<?= $list_jemaat_edit->alamat_anggota ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Nomor HP (Indonesia):</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-inputmask='"mask": "089999999999[9][9][9]"' data-mask name="nohp" value="<?= $list_jemaat_edit->nohp_anggota ?>" required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Wilayah</label>
                                            <select class="form-control select2bs4" style="width: 100%;" name="id_wilayah" required>
                                                <option selected="selected" disabled>Pilih wilayah</option>
                                                <?php foreach ($wilayah as $list_wilayah) { ?>
                                                    <option value="<?php echo $list_wilayah->id_wilayah ?>" <?php if ($list_wilayah->id_wilayah == $list_jemaat_edit->id_wilayah) {
                                                                                                                echo "selected";
                                                                                                            } ?>>
                                                        <?php echo $list_wilayah->nama_lengkap_anggota . " - " . $list_wilayah->nama_wilayah; ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmailAnggota">Email Anggota</label>
                                            <input type="email" class="form-control" id="inputEmailAnggota" name="email_anggota" value="<?= $list_jemaat_edit->email_anggota ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="inputGolonganDarah">Golongan Darah</label>
                                            <input type="text" class="form-control" id="inputGolonganDarah" name="golongan_darah" value="<?= $list_jemaat_edit->golongan_darah_anggota ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputPendidikan">Pendidikan</label>
                                            <input type="text" class="form-control" id="inputPendidikan" name="pendidikan" value="<?= $list_jemaat_edit->pendidikan_anggota ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control" id="inputPekerjaan" name="pekerjaan" value="<?= $list_jemaat_edit->pekerjaan_anggota ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputKelompokEtnis">Kelompok Etnis</label>
                                            <input type="text" class="form-control" id="inputKelompokEtnis" name="kelompok_etnis" value="<?= $list_jemaat_edit->kelompok_etnis_anggota ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <div class="input-group date" id="tanggalLahir" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#tanggalLahir" name="tanggal_lahir" value="<?= $list_jemaat_edit->tanggal_lahir_anggota ?>" required />
                                                <div class="input-group-append" data-target="#tanggalLahir" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary tombol-ubah">Ubah</button>
                            </div>

                        </form>
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

    <script>
        $(function() {
            $('[data-mask]').inputmask()
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
        });
    </script>

</body>

</html>