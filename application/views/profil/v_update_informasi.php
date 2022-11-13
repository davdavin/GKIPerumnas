<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Jemaat | Update</title>

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
                            <a href="<?php echo base_url() . 'Profil/update_profil' ?>" class="nav-link active">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p> Update </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Profil/update_password' ?>" class="nav-link">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p> Ubah Password </p>
                            </a>
                        </li>
                        <?php if($this->session->userdata('jabatan_anggota') != "Jemaat") { ?> 
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
                                        <p>Ruangan</p>
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
                            <h1>Update</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Profil' ?>">Informasi</a></li>
                                <li class="breadcrumb-item active">Update</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-primary">
                    <!-- form start -->
                    <?php foreach ($detail as $list_jemaat_edit) { ?>
                        <form class="form-submit" method="post" action="<?php echo base_url() . 'Profil/proses_update' ?>">
                            <div class="card-body">
                                <div class="row edit-center">
                                    <div class="col-sm-5">
                                        <input type="hidden" class="form-control" id="inputNoAnggota" name="no_anggota" value="<?= $list_jemaat_edit->no_anggota ?>" readonly>
                                        <div class="form-group">
                                            <label>Alamat Anggota</label>
                                            <input type="text" class="form-control" name="alamat_anggota" value="<?= $list_jemaat_edit->alamat_anggota ?>">
                                            <div class="px-2 error_alamat clear" style="display: none">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Nomor Handphone:</label>
                                            <input type="text" class="form-control" name="nohp" value="<?= $list_jemaat_edit->nohp_anggota ?>">
                                            <div class="px-2 error_nohp clear" style="display: none">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmailAnggota">Email Anggota</label>
                                            <input type="hidden" name="email_sekarang" value="<?= $list_jemaat_edit->email_anggota ?>">
                                            <input type="email" class="form-control" id="inputEmailAnggota" name="email_anggota" value="<?= $list_jemaat_edit->email_anggota ?>">
                                            <div class="px-2 error_email clear" style="display: none">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="inputPendidikan">Pendidikan</label>
                                            <input type="text" class="form-control" id="inputPendidikan" name="pendidikan" value="<?= $list_jemaat_edit->pendidikan_anggota ?>">
                                            <div class="px-2 error_pendidikan clear" style="display: none">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control" id="inputPekerjaan" name="pekerjaan" value="<?= $list_jemaat_edit->pekerjaan_anggota ?>">
                                            <div class="px-2 error_pekerjaan clear" style="display: none">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ubah</button>
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
            $('[data-mask]').inputmask();

            $('.form-submit').submit(function(e) {
                e.preventDefault();
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
                        $.ajax({
                            url: $(this).attr('action'),
                            type: 'POST',
                            dataType: 'JSON',
                            data: new FormData(this),
                            contentType: false,
                            //  cache: false,
                            processData: false,
                            beforeSend: function() {
                                $('.simpan').html('<i class="fa fa-spin fa-spinner"></i>');
                                $('.simpan').attr('disabled', 'disabled');
                            },
                            complete: function() {
                                $('.simpan').removeAttr('disabled');
                                $('.simpan').html('Ubah');
                            },
                            success: function(respon) {
                                if (respon.sukses == false) {
                                    if (respon.error_username) {
                                        $('.error_username').show();
                                        $('.error_username').html(respon.error_username);
                                        $('.error_username').css("color", "red");
                                    } else {
                                        $('.error_username').hide();
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
                                    if (respon.error_pendidikan) {
                                        $('.error_pendidikan').show();
                                        $('.error_pendidikan').html(respon.error_pendidikan);
                                        $('.error_pendidikan').css("color", "red");
                                    } else {
                                        $('.error_pendidikan').hide();
                                    }
                                    if (respon.error_pekerjaan) {
                                        $('.error_pekerjaan').show();
                                        $('.error_pekerjaan').html(respon.error_pekerjaan);
                                        $('.error_pekerjaan').css("color", "red");
                                    } else {
                                        $('.error_pekerjaan').hide();
                                    }
                                } else {
                                    $('.clear').hide();
                                    Swal.fire({
                                        title: 'Sukses',
                                        text: respon.sukses,
                                        icon: 'success',
                                    }).then((confirmed) => {
                                        window.location.href = "<?php echo base_url() . 'Profil' ?>";
                                    });
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>