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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Anggota_Jemaat' ?>">Anggota Jemaat</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <?php
                    foreach ($detailJemaat as $list_detail_jemaat) { ?>
                        <!-- Main content -->
                        <div class="card p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4> Informasi Detail <?php echo $list_detail_jemaat->nama_lengkap_anggota ?></h4>
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
                                    <h5> <strong> Koordinator - Nama Wilayah </strong> </h5>
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
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <h5> <strong> Golongan Darah </strong> </h5>
                                    <p><?php echo $list_detail_jemaat->golongan_darah_anggota; ?></p>
                                    <h5> <strong> Status </strong> </h5>
                                    <p>
                                        <?php if ($list_detail_jemaat->status_anggota == 1) {
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
                                    <p><?php if ($list_detail_jemaat->tanggal_lahir_anggota == "0000-00-00" || $list_detail_jemaat->tanggal_lahir_anggota == NULL) {
                                            echo "-" . "<br>";
                                        } else {
                                            echo tanggal_indonesia($list_detail_jemaat->tanggal_lahir_anggota);
                                        }
                                        ?>
                                    </p>
                                    <h5> <strong> Tanggal Baptis </strong> </h5>
                                    <p><?php if ($list_detail_jemaat->tanggal_baptis_anggota == "0000-00-00" || $list_detail_jemaat->tanggal_baptis_anggota == NULL) {
                                            echo "-" . "<br>";
                                        } else {
                                            echo tanggal_indonesia($list_detail_jemaat->tanggal_baptis_anggota);
                                        }
                                        ?>
                                    </p>
                                    <h5> <strong> Tanggal Sidi </strong> </h5>
                                    <p><?php if ($list_detail_jemaat->tanggal_sidi_anggota == "0000-00-00" || $list_detail_jemaat->tanggal_sidi_anggota == NULL) {
                                            echo "-" . "<br>";
                                        } else {
                                            echo tanggal_indonesia($list_detail_jemaat->tanggal_sidi_anggota);
                                        }
                                        ?>
                                    </p>
                                    <h5> <strong> Tanggal Atestasi Masuk </strong> </h5>
                                    <p><?php if ($list_detail_jemaat->tanggal_atestasi_masuk == "0000-00-00" || $list_detail_jemaat->tanggal_atestasi_masuk == NULL) {
                                            echo "-" . "<br>";
                                        } else {
                                            echo tanggal_indonesia($list_detail_jemaat->tanggal_atestasi_masuk);
                                        }
                                        ?>
                                    </p>
                                    <h5> <strong> Tanggal Atestasi Keluar </strong> </h5>
                                    <p><?php if ($list_detail_jemaat->tanggal_atestasi_keluar == "0000-00-00" || $list_detail_jemaat->tanggal_atestasi_keluar == NULL) {
                                            echo "-" . "<br>";
                                        } else {
                                            echo tanggal_indonesia($list_detail_jemaat->tanggal_atestasi_keluar);
                                        }
                                        ?>
                                    </p>
                                    <h5> <strong> Tanggal Meninggal </strong> </h5>
                                    <p><?php if ($list_detail_jemaat->tanggal_meninggal == "0000-00-00" || $list_detail_jemaat->tanggal_meninggal == NULL) {
                                            echo "-" . "<br>";
                                        } else {
                                            echo tanggal_indonesia($list_detail_jemaat->tanggal_meninggal);
                                        }
                                        ?>
                                    </p>
                                    <h5> <strong> Tanggal DKH </strong> </h5>
                                    <p><?php if ($list_detail_jemaat->tanggal_dkh == "0000-00-00" || $list_detail_jemaat->tanggal_dkh == NULL) {
                                            echo "-" . "<br>";
                                        } else {
                                            echo tanggal_indonesia($list_detail_jemaat->tanggal_dkh);
                                        }
                                        ?>
                                    </p>
                                    <h5> <strong> Tanggal Ex DKH </strong> </h5>
                                    <p><?php if ($list_detail_jemaat->tanggal_ex_dkh == "0000-00-00" || $list_detail_jemaat->tanggal_ex_dkh == NULL) {
                                            echo "-" . "<br>";
                                        } else {
                                            echo tanggal_indonesia($list_detail_jemaat->tanggal_ex_dkh);
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- /.col -->

                                <!--  <a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'Laporan_dompdf/tampil_anggota/' . $list_detail_jemaat->id_anggota; ?>" target="_blank">
                      <i class="fas fa-download"></i> PDF
                    </a> -->
                            </div>
                            <!-- /.row -->
                        </div>
                    <?php } ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
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
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
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
</body>

</html>