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
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link href="<?php echo base_url(); ?>resources/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resources/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resources/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resources/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resources/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resources/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resources/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->


    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>resources/assets/css/styleHome.css"> -->
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
    <!--   <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">

             <div class="logo me-auto">
                <h4><img src="<?php echo base_url(); ?>resources/assets/img/logo.jpg" alt=""> <span></span> GKI Perumnas - Tangerang</h4>
            </div> 

         <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#hero">Beranda</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav> 

        </div>
    </header> -->
    <!-- End Header -->
    <div class="content-ruangan">
        <div class="container">
            <?php
            for ($i = 0; $i < count($ruangan); $i++) {
                //  foreach ($ruangan as $list) { 
            ?>
                <div class="card">
                    <div class="card-header">

                        <div class="slideshow-container">

                            <?php for ($j = 0; $j < count($detail); $j++) {
                                // foreach ($detail as $d) {
                                if ($ruangan[$i]['id_coba_ruangan'] == $detail[$j]['id_coba_ruangan']) { ?>
                                    <div id="gambar<?php echo $j; ?>" class="mySlides fade">
                                        <img src="<?php echo $detail[$j]['gambar'] ?>" alt="rover" />
                                    </div>

                                    <a class="prev" onclick="plusSlides(-1,<?php echo $j; ?>)">❮</a>
                                    <a class="next" onclick="plusSlides(1,<?php echo $j; ?>)">❯</a>

                            <?php }
                            } ?>
                        </div>

                    </div>
                    <div class="card-body">
                        <h4><?php echo $ruangan[$i]['nama_ruangan'] ?> </h4>
                        <p>
                            An exploration into the truck's polarising design
                        </p>
                    </div>
                </div>
            <?php  } ?>
        </div>
    </div>
    <!-- ======= Footer ======= -->

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