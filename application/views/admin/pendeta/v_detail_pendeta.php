<div class=" content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pendeta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'Pendeta' ?>">Pendeta</a></li>
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

          <?php foreach ($detailPendeta as $list_detail_pendeta) { ?>
            <div class="card p-3 mb-3">
              <div class="row">
                <div class="col-12">
                  <h4> Informasi Lengkap <?php echo $list_detail_pendeta->nama_lengkap_pendeta; ?></h4>
                </div><br><br><br>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <h5> <strong> ID </strong> </h5>
                  <p><?php echo $list_detail_pendeta->id_pendeta; ?></p>
                  <h5> <strong> No. Pendeta </strong> </h5>
                  <p><?php echo $list_detail_pendeta->no_pendeta; ?></p>
                  <h5> <strong> Nama Lengkap </strong> </h5>
                  <p><?php echo $list_detail_pendeta->nama_lengkap_pendeta; ?></p>
                  <h5> <strong> Alamat Pendeta </strong> </h5>
                  <p><?php echo $list_detail_pendeta->alamat_pendeta; ?></p>
                </div>
                <div class="col-sm-4">
                  <h5> <strong> Nomor Handphone </strong> </h5>
                  <p><?php echo $list_detail_pendeta->nohp_pendeta; ?></p>
                  <h5> <strong> Email </strong> </h5>
                  <p><?php echo $list_detail_pendeta->email_pendeta; ?></p>
                  <h5> <strong> Jenis Kelamin </strong> </h5>
                  <p><?php echo $list_detail_pendeta->jenis_kelamin_pendeta; ?></p>
                </div>
                <div class="col-sm-4">
                  <h5> <strong> Umur </strong> </h5>
                  <p><?php echo date('Y') - date_format(date_create($list_detail_pendeta->tanggal_lahir_pendeta), "Y"); ?></p>
                  <h5> <strong> Tanggal Lahir </strong> </h5>
                  <p>
                    <?php echo tanggal_indonesia($list_detail_pendeta->tanggal_lahir_pendeta); ?>
                  </p>
                  <h5> <strong> Status </strong> </h5>
                  <p>
                    <?php echo $list_detail_pendeta->status_pendeta; ?>
                  </p>
                </div>
              </div>
              <div class="row col-sm-4">
                <h5> <strong> Foto</strong> </h5>
                <img src="<?php echo base_url(); ?>resources/assets/img/pendeta/<?php echo $list_detail_pendeta->foto_pendeta; ?>" class="img-fluid" alt="">
              </div>
            </div>
          <?php } ?>

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
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