<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sistem Penyajian Informasi Gerejawi</h1>
          <h5 class="m-0">GKI Perumnas Tangerang</h5>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php foreach ($jumlahPendeta as $total_pendeta) { ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3><?php echo $total_pendeta->jumlahPendeta ?></h3>
                <p>Pendeta</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-friends"></i>
              </div>
            </div>
          </div>
        <?Php } ?>
        <!-- ./col -->
        <?php foreach ($jumlahJemaat as $total_jemaat) { ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_jemaat->jumlahJemaat ?></h3>
                <p>Anggota Jemaat</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-friends"></i>
              </div>
            </div>
          </div>
        <?php } ?>
        <!-- ./col -->
        <?php foreach ($jumlahWilayah as $total_wilayah) { ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3><?Php echo $total_wilayah->jumlahWilayah ?></h3>
                <p>Wilayah</p>
              </div>
              <div class="icon">
                <i class="fas fa-map"></i>
              </div>
            </div>
          </div>
        <?php } ?>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <?php foreach ($totalKeuangan as $saldo) { ?>
                <h3><?php echo mata_uang_indo($saldo->total); ?></h3>
              <?php } ?>
              <p>Total Keuangan Gereja</p>
            </div>
            <div class="icon">
              <i class="fas fa-wallet"></i>
            </div>
          </div>
        </div>
        <?php
        foreach ($permintaanBaru as $jumlah) { ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3><?Php echo $jumlah->jumlahPermintaanBaru ?></h3>
                <p>Permintaan Perubahan Data</p>
              </div>
              <div class="icon">
                <i class="fas fa-map"></i>
              </div>
              <a href="<?php echo base_url() . 'Notifikasi' ?>" class="small-box-footer">Lihat lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php } ?>
        <?php
        foreach ($peminjamanBaru as $jumlah) { ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3><?Php echo $jumlah->jumlahPeminjamanBaru ?></h3>
                <p>Peminjaman Ruangan</p>
              </div>
              <div class="icon">
                <i class="fas fa-map"></i>
              </div>
              <a href="<?php echo base_url() . 'mengelola_ruangan/peminjaman' ?>" class="small-box-footer">Lihat lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php  } ?>
      </div>
    </div><!-- /.container-fluid -->

    <div class="row">
      <section class="col-lg-8 connectedSortable">
        <div class="card card-outline">
          <div class="card-header bg-cyan">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Jumlah Jemaat Aktif Setiap Wilayah
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus text-white"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times text-white"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="container">
              <canvas id="chart-jemaatperwilayah"></canvas>
            </div>
          </div>
          <!-- /.card-body-->
        </div>
      </section>

      <section class="col-lg-4 connectedSortable">
        <div class="card card-outline">
          <div class="card-header bg-cyan">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Total Jemaat Aktif & Tidak Aktif
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus text-white"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times text-white"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="container">
              <canvas id="chart-status-jemaat"></canvas>
            </div>
          </div>
          <!-- /.card-body-->
        </div>
      </section>

      <section class="col-lg-8 connectedSortable">
        <div class="card card-outline">
          <div class="card-header bg-cyan">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Urutan Wilayah Dengan Jemaat Terbanyak
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus text-white"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times text-white"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped text-center">
              <tr>
                <th>Nama Wilayah</th>
                <th>Total Jemaat</th>
              </tr>
              <?php foreach ($urutanWilayah as $urutan) { ?>
                <tr>
                  <td><?php echo $urutan->nama_wilayah ?></td>
                  <td><?php echo $urutan->total ?></td>
                </tr>
              <?php } ?>
            </table>
          </div>
          <!-- /.card-body-->
        </div>
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
<!-- FLOT CHARTS -->
<script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url(); ?>assets/plugins/flot/plugins/jquery.flot.resize.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>

<script>
  var c = document.getElementById('chart-jemaatperwilayah').getContext('2d');
  var chart = new Chart(c, {
    type: 'bar',
    data: {
      labels: ['Wilayah 1', 'Wilayah 2', 'Wilayah 3', 'Wilayah 4', 'Wilayah 5', 'Wilayah 6', 'Wilayah 7', 'Bajem Kutabumi'],
      datasets: [{
        label: 'Total',
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1,
        data: [<?php foreach ($jumlahJemaatWilayah as $total_jemaat) {
                  if ($total_jemaat->nama_wilayah == "Wilayah 1") {
                    echo $total_jemaat->total;
                  }
                } ?>,
          <?php foreach ($jumlahJemaatWilayah as $total_jemaat) {
            if ($total_jemaat->nama_wilayah == "Wilayah 2") {
              echo $total_jemaat->total;
            };
          } ?>,
          <?php foreach ($jumlahJemaatWilayah as $total_jemaat) {
            if ($total_jemaat->nama_wilayah == "Wilayah 3") {
              echo $total_jemaat->total;
            }
          }
          ?>,
          <?php foreach ($jumlahJemaatWilayah as $total_jemaat) {
            if ($total_jemaat->nama_wilayah == "Wilayah 4") {
              echo $total_jemaat->total;
            }
          }
          ?>,
          <?php foreach ($jumlahJemaatWilayah as $total_jemaat) {
            if ($total_jemaat->nama_wilayah == "Wilayah 5") {
              echo $total_jemaat->total;
            }
          }
          ?>,
          <?php foreach ($jumlahJemaatWilayah as $total_jemaat) {
            if ($total_jemaat->nama_wilayah == "Wilayah 6") {
              echo $total_jemaat->total;
            }
          }
          ?>,
          <?php foreach ($jumlahJemaatWilayah as $total_jemaat) {
            if ($total_jemaat->nama_wilayah == "Wilayah 7") {
              echo $total_jemaat->total;
            }
          }
          ?>,
          <?php foreach ($jumlahJemaatWilayah as $total_jemaat) {
            if ($total_jemaat->nama_wilayah == "Bajem Kutabumi") {
              echo $total_jemaat->total;
            }
          }
          ?>
        ],
      }]
    },
  });

  var c = document.getElementById('chart-status-jemaat').getContext('2d');
  var chart = new Chart(c, {
    type: 'pie',
    data: {
      labels: ['Aktif', 'Tidak Aktif'],
      datasets: [{
        label: 'Total',
        backgroundColor: [
          'rgba(75, 192, 192, 0.2)',
          'rgba(255, 26, 104, 0.2)'
        ],
        borderColor: [
          'rgba(75, 192, 192, 1)',
          'rgba(255, 26, 104, 1)'
        ],
        borderWidth: 1,
        data: [<?php if (count($totalStatusJemaat) > 0) {
                  foreach ($totalStatusJemaat as $status) {
                    echo "'" . $status->total . "', ";
                  }
                } ?>],
      }]
    },
  });
</script>

</body>

</html>