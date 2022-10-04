<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>GKI Perumnas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">



  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/assets/css/styleHome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ruangan/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/tambahanStyle.css">
  <!-- =======================================================
  * Template Name: Mamba - v4.6.0
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h4><img src="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" alt="logoGKI"> <span></span> GKI Perumnas - Tangerang</h4>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>">Beranda</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
  <!-- End Header -->
  <main id="main"><br>
    <div class="section-title">
      <h2>Ruangan</h2>
    </div>

    <div class="content-ruangan">
      <div class="container-ruangan">
        <?php foreach ($ruangan as $list) { ?>
          <div class="card-ruangan">
            <div class="card-ruangan-header">
              <img id="gambar-ruangan" src="<?php echo base_url(); ?>resources/assets/img/ruangan/<?php echo $list->foto ?>" alt="<?php echo $list->foto ?>" />
            </div>
            <div class="card-ruangan-body">
              <h4><?php echo $list->nama_ruangan ?></h4>
              <p><?php echo 'Kapasitas: ' . $list->kapasitas ?></p>
              <p>Perlengkapan: </p>
              <p><?php echo $list->perlengkapan ?></p><br>

              <!-- <a class="btn btn-detail" data-toggle="modal" data-target="#detail<?php echo $list->id_ruangan ?>">DETAIL</a> -->
              <a class="btn btn-primary btn-detail" href="<?php echo base_url() . 'booking/' . $list->id_ruangan ?>">BOOKING</a>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
    <?php $no = 0;
    foreach ($ruangan as $list) {
      $no++; ?>
      <!-- modal untuk menampilkan form edit gambar -->
      <div class="modal fade" id="detail<?php echo $list->id_ruangan ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ruangan <?php echo $list->nama_ruangan; ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="card-ruangan">
                <img src="<?php echo base_url(); ?>resources/assets/img/ruangan/<?php echo $list->foto; ?>" class="img-fluid" alt="<?php echo $list->id_ruangan ?>" width="200" height="200">
              </div>
              <a class="btn btn-primary btn-block" href="<?php echo base_url() . 'booking/' . $list->id_ruangan ?>">BOOKING</a>

              <?php $id_ruangan = $list->id_ruangan; ?>

              <table id="info_booking<?php echo $id_ruangan ?>" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

        <div class=" footer-info">
          <h2>Media Sosial</h2>
          <div class="social-links mt-3">
            <a href="https://www.facebook.com/gkiperumnas" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/gkiperumnas/" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="https://www.youtube.com/c/GKIPerumnasTangerang" class="youtube"><i class="bx bxl-youtube"></i></a>
          </div>
        </div>

      </div>
    </div>
  </footer>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center btn-arrowUp-effect-bg btn-arrowUp"><i class="bi bi-arrow-up-short"></i></a>

  <script src="<?php echo base_url(); ?>jquery-3.4.1.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>resources/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url(); ?>resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>resources/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>resources/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>resources/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url(); ?>resources/assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo base_url(); ?>resources/assets/vendor/swiper/swiper-bundle.min.js"></script>

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

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>resources/assets/js/main.js"></script>

  <script src="<?php echo base_url(); ?>assets/ruangan/ruangan.js"></script>

  <script>
    $(document).ready(function() {
      <?php for ($i = 1; $i <= $id_ruangan; $i++) { ?>
        $('#info_booking<?php echo $i ?>').DataTable({
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
            }
          ]
        });
      <?php } ?>
    });
  </script>
</body>

</html>