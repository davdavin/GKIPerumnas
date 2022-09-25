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


  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/assets/css/styleHome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ruangan/style.css">
  <!-- =======================================================
  * Template Name: Mamba - v4.6.0
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .content-pendeta-center {
      display: flex;
      justify-content: space-evenly;
    }
  </style>
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
          <li><a class="nav-link scrollto" href="#hero">Beranda</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
  <!-- End Header -->
  <main id="main">
    <div class="content-ruangan">
      <div class="container-ruangan">
        <?php foreach ($ruangan as $list) { ?>
          <div class="card-ruangan">
            <div class="card-ruangan-header">
              <img id="gambar-ruangan" src="https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg" alt="rover" />
            </div>
            <div class="card-ruangan-body">
              <h4><?php echo $list->nama_ruangan ?></h4>
              <p><?php echo 'Kapasitas: ' . $list->kapasitas ?></p>
              <p>Perlengkapan: </p>
              <p><?php echo $list->perlengkapan ?></p><br>

              <a href="" class="btn btn-primary btn-block">DETAIL</a>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
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

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>resources/assets/js/main.js"></script>

  <script src="<?php echo base_url(); ?>assets/ruangan/ruangan.js"></script>
</body>

</html>