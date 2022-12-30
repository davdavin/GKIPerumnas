<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jemaat | Informasi</title>

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
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

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
                            <a href="<?php echo base_url() . 'Profil' ?>" class="nav-link active">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p> Informasi </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Profil/update_profil' ?>" class="nav-link">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p> Update </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Profil/update_password ' ?>" class="nav-link">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p> Ubah Password </p>
                            </a>
                        </li>
                        <?php if ($this->session->userdata('jabatan_anggota') != "Jemaat") { ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url() . 'Ruangan/list_ruangan' ?>" class="nav-link">
                                    <i class="nav-icon fas fa-door-open"></i>
                                    <p>
                                        Ruangan
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url() . 'Ruangan/list_ruangan' ?>" class="nav-link">
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
                        <?php } ?>
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
                            <h1>Informasi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Informasi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <?php $this->load->view('templates/message.php'); ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?php
                            foreach ($jemaat as $list_detail_jemaat) { ?>
                                <!-- Main content -->
                                <div class="card p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h4> Informasi Lengkap</h4>
                                        </div><br><br><br>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h5> <strong> No. Anggota </strong> </h5>
                                            <p><?php echo $list_detail_jemaat->no_anggota; ?></p>
                                            <h5> <strong> Nama Lengkap</strong> </h5>
                                            <p><?php echo $list_detail_jemaat->nama_lengkap_anggota; ?></p>
                                            <h5> <strong> Alamat </strong> </h5>
                                            <p><?php echo $list_detail_jemaat->alamat_anggota; ?></p>
                                            <h5> <strong> No Hp </strong> </h5>
                                            <p><?php echo $list_detail_jemaat->nohp_anggota; ?></p>
                                            <h5> <strong> Wilayah </strong> </h5>
                                            <p><?php foreach ($wilayah as $list_wilayah) {
                                                    if ($list_wilayah->id_wilayah == $list_detail_jemaat->id_wilayah) {
                                                        echo $list_wilayah->nama_wilayah;
                                                    }
                                                }
                                                ?></p>
                                            <h5> <strong> Email </strong> </h5>
                                            <p><?php echo $list_detail_jemaat->email_anggota; ?></p>
                                            <h5> <strong> Jenis Kelamin </strong> </h5>
                                            <p><?php echo $list_detail_jemaat->jenis_kelamin_anggota; ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5> <strong> Golongan Darah </strong> </h5>
                                            <p><?php echo $list_detail_jemaat->golongan_darah_anggota; ?></p>
                                            <h5> <strong> Status </strong> </h5>
                                            <p>
                                                <?php if ($list_detail_jemaat->status_anggota == "AKTIF") {
                                                    echo 'Aktif';
                                                } else {
                                                    echo 'Tidak Aktif';
                                                }
                                                ?>
                                            </p>
                                            <h5> <strong> Pendidikan </strong> </h5>
                                            <p><?php echo $list_detail_jemaat->pendidikan_anggota; ?></p>
                                            <h5> <strong> Pekerjaan </strong> </h5>
                                            <p><?php echo $list_detail_jemaat->pekerjaan_anggota; ?></p>
                                            <h5> <strong> Kelompok Etnis </strong> </h5>
                                            <p><?php echo $list_detail_jemaat->kelompok_etnis_anggota; ?></p>
                                            <h5> <strong> Umur </strong> </h5>
                                            <p><?php echo date('Y') - date_format(date_create($list_detail_jemaat->tanggal_lahir_anggota), "Y"); ?></p>
                                            <h5> <strong> Jabatan </strong> </h5>
                                            <p><?php echo $list_detail_jemaat->jabatan_anggota; ?></p>
                                        </div>

                                        <div class="col-sm-4">
                                            <h5> <strong> Tanggal Lahir </strong> </h5>
                                            <p><?php if ($list_detail_jemaat->tanggal_lahir_anggota == "0000-00-00") {
                                                    echo "-" . "<br>";
                                                } else {
                                                    echo tanggal_indonesia($list_detail_jemaat->tanggal_lahir_anggota);
                                                }
                                                ?>
                                            </p>
                                            <h5> <strong> Tanggal Baptis </strong> </h5>
                                            <p><?php if ($list_detail_jemaat->tanggal_baptis_anggota == "0000-00-00") {
                                                    echo "-" . "<br>";
                                                } else {
                                                    echo tanggal_indonesia($list_detail_jemaat->tanggal_baptis_anggota);
                                                }
                                                ?>
                                            </p>
                                            <h5> <strong> Tanggal Sidi </strong> </h5>
                                            <p><?php if ($list_detail_jemaat->tanggal_sidi_anggota == "0000-00-00") {
                                                    echo "-" . "<br>";
                                                } else {
                                                    echo tanggal_indonesia($list_detail_jemaat->tanggal_sidi_anggota);
                                                }
                                                ?>
                                            </p>
                                            <h5> <strong> Tanggal Atestasi Masuk </strong> </h5>
                                            <p><?php if ($list_detail_jemaat->tanggal_atestasi_masuk == "0000-00-00") {
                                                    echo "-" . "<br>";
                                                } else {
                                                    echo tanggal_indonesia($list_detail_jemaat->tanggal_atestasi_masuk);
                                                }
                                                ?>
                                            </p>
                                            <h5> <strong> Tanggal Atestasi Keluar </strong> </h5>
                                            <p><?php if ($list_detail_jemaat->tanggal_atestasi_keluar == "0000-00-00") {
                                                    echo "-" . "<br>";
                                                } else {
                                                    echo tanggal_indonesia($list_detail_jemaat->tanggal_atestasi_keluar);
                                                }
                                                ?>
                                            </p>
                                            <h5> <strong> Tanggal Meninggal </strong> </h5>
                                            <p><?php if ($list_detail_jemaat->tanggal_meninggal == "0000-00-00") {
                                                    echo "-" . "<br>";
                                                } else {
                                                    echo tanggal_indonesia($list_detail_jemaat->tanggal_meninggal);
                                                }
                                                ?>
                                            </p>
                                            <h5> <strong> Tanggal DKH </strong> </h5>
                                            <p><?php if ($list_detail_jemaat->tanggal_dkh == "0000-00-00") {
                                                    echo "-" . "<br>";
                                                } else {
                                                    echo tanggal_indonesia($list_detail_jemaat->tanggal_dkh);
                                                }
                                                ?>
                                            </p>
                                            <h5> <strong> Tanggal Ex DKH </strong> </h5>
                                            <p><?php if ($list_detail_jemaat->tanggal_ex_dkh == "0000-00-00") {
                                                    echo "-" . "<br>";
                                                } else {
                                                    echo tanggal_indonesia($list_detail_jemaat->tanggal_ex_dkh);
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
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
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

    <script>
        $(function() {
            const sukses = $('.sukses').data('flashdata');

            if (sukses) {
                Swal.fire({
                    title: 'Data Jemaat',
                    text: sukses,
                    icon: 'success'
                });
            }
        });
    </script>

</body>

</html>