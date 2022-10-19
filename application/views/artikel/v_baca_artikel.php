<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device=width, initial-scale=1.0">
  <title>Artikel</title>

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" rel="icon">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/artikel/css/styleArtikel.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

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

  <style>
    .isi-artikel {
      line-height: 1.6;
    }
  </style>
</head>

<body>
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h4><img src="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" alt=""> <span></span> GKI Perumnas - Tangerang</h4>
        <!-- Uncomment below if you prefer to use an image logo -->
      </div>

      <nav id=" navbar" class="navbar">
        <ul>
          <li><a href="<?php echo base_url() . 'Artikel' ?>">Semua</a></li>
          <li><a href="<?php echo base_url() . 'Artikel/renungan_harian' ?>">Renungan Harian</a></li>
          <li><a href="<?php echo base_url() . 'Artikel/bacaan_doa' ?>">Bacaan Doa</a></li>
          <li><a href="<?php echo base_url() . 'Artikel/warta_jemaat' ?>">Warta Jemaat</a></li>
          <li><a href="<?php echo base_url() . 'Artikel/artikel_lainnya' ?>">Artikel Lain</a></li>
          <!-- <a href="#dokumen" class="get-started-btn scrollto">Get Started</a> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

  <section class="section-bg">
    <div class="container">
      <div class="row">
        <div class="mb-4 mt-4">
          <?php
          foreach ($artikel as $lihat_artikel) { ?>
            <article>
              <h2 style="text-align: center;"><?php echo $lihat_artikel->judul_artikel ?></h2>
              <br>
              <h5>
                <?php echo tanggal_indonesia($lihat_artikel->created_at);  ?>
              </h5>
              <br>
              <div class="isi-artikel">
                <?php echo $lihat_artikel->isi ?>
              </div>
              <br>

              <a href="<?php echo base_url() . 'Artikel/pdf/' . $lihat_artikel->id_artikel; ?>" target="_blank">Download PDF</a>
            </article>

          <?php
          } ?>
        </div>

      </div>
    </div>
  </section>

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