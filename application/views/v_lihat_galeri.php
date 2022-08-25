<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>GKI Perumnas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>resources/assets/img/logo.jpg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>resources/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/assets/css/styleHome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/tambahanStyle.css">
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
        <h4><img src="<?php echo base_url(); ?>resources/assets/img/logo.jpg" alt=""> <span></span> GKI Perumnas - Tangerang</h4>
        <!-- Uncomment below if you prefer to use an image logo -->
      </div>

    <!--  <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#galeri">Galeri</a></li>
          <li><a class="nav-link scrollto" href="#team">Pendeta</a></li>
          <li><a class="nav-link scrollto" href="#artikel">Artikel</a></li>
          <li><a class="nav-link scrollto" href="#warta">Warta</a></li>
          <li><a class="nav-link scrollto" href="#dokumen">Dokumen</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <!-- <a href="#dokumen" class="get-started-btn scrollto">Get Started</a> 
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav> --><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Artikel Section ======= -->
    <section id="galeri" class="galeri section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Warta Jemaat</h2>
        </div>

        <div class="row  d-flex align-items-stretch">
          <?php foreach ($galeri as $list_galeri) { ?>
            <div class="col-lg-6 artikel-item" data-aos="fade-up">
              <div class="card-deck">
                  <div class="card">
                    <img class="card-img-top" src="<?php echo base_url(); ?>resources/assets/img/gallery/<?php echo $list_galeri->foto_ibadah; ?> " alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text"><a href="<?php echo base_url(); ?>resources/assets/img/gallery/<?php echo $list_galeri->foto_ibadah; ?>" download>Download</a></p>
                    </div>
                  </div>
                  
                  
                </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- End Artikel Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

        <div class=" footer-info">
          <h2>Sosial Media</h2>
          <div class="social-links mt-3">
            <a href="https://www.facebook.com/gkiperumnas" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/gkiperumnas/" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="https://www.youtube.com/c/GKIPerumnasTangerang" class="youtube"><i class="bx bxl-youtube"></i></a>
          </div>
        </div>

      </div>
    </div>
  </footer>
  <!--  <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Mamba</span></strong>. All Rights Reserved
      </div> ->
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
  <!-- You can delete the links only if you purchased the pro version. -->
  <!-- Licensing information: https://bootstrapmade.com/license/ -->
  <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
  <!--    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div> -->
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center btn-arrowUp-effect-bg btn-arrowUp"><i class="bi bi-arrow-up-short"></i></a>

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
</body>

</html>