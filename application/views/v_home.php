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
    @media (max-width: 1366px) {
      #header .logo h4 {
        font-size: 18px;
        color: blue;
      }

      #header .logo img {
        max-height: 35px;
      }
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h4><img src="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" alt=""> <span></span> GKI Perumnas - Tangerang</h4>
        <!-- Uncomment below if you prefer to use an image logo -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#galeri">Galeri</a></li>
          <li><a class="nav-link scrollto" href="#team">Pendeta</a></li>
          <li><a class="nav-link scrollto" href="#artikel">Artikel</a></li>
          <!--   <li><a class="nav-link scrollto" href="#warta">Warta</a></li> -->
          <li><a class="nav-link scrollto" href="#dokumen">Dokumen</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <a href="" class="get-started-btn scrollto">Login</a>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
          <?php foreach ($kontenSlide1 as $list_slide1) { ?>
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url('<?php echo base_url(); ?>resources/assets/img/slide/<?php echo $list_slide1->gambar_slide; ?>');">
              <div class="carousel-container">
                <div class="carousel-content container">
                  <h2 class="animate__animated animate__fadeInDown"><?php echo $list_slide1->judul_slide; ?><span> </span></h2>
                  <p class="animate__animated animate__fadeInUp"><?php echo $list_slide1->deskripsi_slide; ?></p>
                </div>
              </div>
            </div>
          <?php } ?>

          <?php foreach ($kontenSlide2 as $list_slide2) { ?>
            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url('<?php echo base_url(); ?>resources/assets/img/slide/<?php echo $list_slide2->gambar_slide; ?>');">
              <div class="carousel-container">
                <div class="carousel-content container">
                  <h2 class="animate__animated animate__fadeInDown"><?php echo $list_slide2->judul_slide; ?><span> </span></h2>
                  <p class="animate__animated animate__fadeInUp"><?php echo $list_slide2->deskripsi_slide; ?></p>
                </div>
              </div>
            </div>
          <?php } ?>


          <?php foreach ($kontenSlide3 as $list_slide3) { ?>
            <div class="carousel-item" style="background-image: url('<?php echo base_url(); ?>resources/assets/img/slide/<?php echo $list_slide3->gambar_slide; ?>');">
              <div class="carousel-container">
                <div class="carousel-content container">
                  <h2 class="animate__animated animate__fadeInDown"><?php echo $list_slide3->judul_slide; ?><span> </span></h2>
                  <p class="animate__animated animate__fadeInUp"><?php echo $list_slide3->deskripsi_slide; ?></p>
                </div>
              </div>
            </div>
          <?php } ?>

          <?php foreach ($kontenSlide4 as $list_slide4) { ?>
            <div class="carousel-item" style="background-image: url('<?php echo base_url(); ?>resources/assets/img/slide/<?php echo $list_slide4->gambar_slide; ?>');">
              <div class="carousel-container">
                <div class="carousel-content container">
                  <h2 class="animate__animated animate__fadeInDown"><?php echo $list_slide4->judul_slide; ?><span> </span></h2>
                  <p class="animate__animated animate__fadeInUp"><?php echo $list_slide4->deskripsi_slide; ?></p>
                </div>
              </div>
            </div>
          <?php } ?>

          <?php foreach ($kontenSlide5 as $list_slide5) { ?>
            <div class="carousel-item" style="background-image: url('<?php echo base_url(); ?>resources/assets/img/slide/<?php echo $list_slide5->gambar_slide; ?>');">
              <div class="carousel-container">
                <div class="carousel-content container">
                  <h2 class="animate__animated animate__fadeInDown"><?php echo $list_slide5->judul_slide; ?><span> </span></h2>
                  <p class="animate__animated animate__fadeInUp"><?php echo $list_slide5->deskripsi_slide; ?></p>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Counts Section ======= -->
    <section class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-simple-smile" style="color: #20b38e;"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php foreach ($jemaatLaki as $jumlahLakilaki) {
                                                                        echo $jumlahLakilaki->jumlahLakilaki;
                                                                      }; ?>" data-purecounter-duration="1" class="purecounter">
              </span>

              <p>Jemaat Laki-laki</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="bi bi-dokumen-folder" style="color: #c042ff;"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php foreach ($jemaatPerempuan as $jumlahPerempuan) {
                                                                        echo $jumlahPerempuan->jumlahPerempuan;
                                                                      }; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jemaat Perempuan</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box">
              <i class="bi bi-live-support" style="color: #46d1ff;"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php // foreach ($ulangTahunJemaat as $jumlah_ulang_tahun) {
                                                                      //    echo $jumlah_ulang_tahun->jumlahBerulangTahun;
                                                                      echo count($jemaatUlangTahun);
                                                                      //  }; 
                                                                      ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p type="button" data-bs-toggle="modal" data-bs-target="#ulangtahun" data-toggle="tooltip" title="Lihat lebih lengkap"> Jemaat yang berulang tahun </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box">
              <i class="bi bi-users-alt-5" style="color: #ffb459;"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php foreach ($jumlahWilayah as $total_wilayah) {
                                                                        echo $total_wilayah->jumlahWilayah;
                                                                      }; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Wilayah</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- Modal ulang tahun-->
    <div class="modal fade" id="ulangtahun" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Jemaat yang berulang tahun</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h5>Jemaat yang ulang tahun dari tanggal <?php echo date('d F', strtotime("Monday This Week")); ?> hingga <?php echo date('d F', strtotime("Sunday This Week")); ?> </h5>
            <br>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Wilayah</th>
                  <th>Tanggal Ulang Tahun</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                if (count($jemaatUlangTahun) > 0) {
                  foreach ($jemaatUlangTahun as $detail_jemaat_ulang_tahun) { ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $detail_jemaat_ulang_tahun['nama_lengkap_anggota'] ?></td>
                      <td><?php echo $detail_jemaat_ulang_tahun['nama_wilayah'] ?></td>
                      <td><?php echo tanggal_indonesia($detail_jemaat_ulang_tahun['tanggal_lahir_anggota']); ?></td>
                    </tr>
                  <?php }
                } else { ?>
                  <tr>
                    <td colspan="4" style="text-align: center;">Tidak ada yang berulang tahun</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal ulang tahun -->

    <!-- ======= Gallery Section ======= -->
    <section id="galeri" class="galeri section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>Galeri</h2>
          <p>Foto merupakan ukiran kisah dan bukti nyata dari terbentuknya sebuah gereja</p>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="galeri-flters">
              <li data-filter="*" class="filter-active">Semua</li>
              <?php foreach ($momen as $list) { ?>
                <li data-filter=".filter-<?php echo $list->momen; ?>"><?php echo $list->momen; ?></li>
              <?php } ?>
              <!--     <li data-filter=".filter-paskah">Paskah</li>
              <li data-filter=".filter-palmarum">Minggu Palmarum</li> -->
            </ul>
          </div>
        </div>

        <div class="row galeri-container">
          <?php foreach ($fotoIbadah as $list_foto_ibadah) { ?>
            <div class="col-lg-4 col-md-6 galeri-item filter-<?php echo $list_foto_ibadah->momen; ?>">
              <div class="galeri-wrap">
                <img src="<?php echo base_url(); ?>resources/assets/img/gallery/<?php echo $list_foto_ibadah->foto_ibadah; ?>" class="img-fluid" alt="<?php echo $list_foto_ibadah->momen ?>">
              </div>
            </div>
          <?php } ?>
        </div>
        <!--  <div class="seeMore">
          <a href="Galeri" target="_blank"><button class="btn-effect-bg btn-seeMore">Download <i class="fas fa-download"></i></button></a>
        </div> -->
      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pendeta</h2>
          <p>Lalu Ia berkata kepada mereka: "Pergilah ke seluruh dunia, beritakanlah Injil kepada segala makhluk - Mrk 16:15</p>
        </div>

        <div class="row content-pendeta-center">
          <?php foreach ($pendeta as $list_pendeta) { ?>
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img src="<?php echo base_url(); ?>resources/assets/img/pendeta/<?php echo $list_pendeta->foto_pendeta ?>" class="img-fluid" alt="foto" style="weight: auto; height: auto"></div>
                <div class="member-info">
                  <h4><?php echo $list_pendeta->nama_lengkap_pendeta ?></h4>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>

      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Artikel Section ======= -->
    <section id="artikel" class="artikel section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Artikel</h2>
        </div>

        <div class="row  d-flex align-items-stretch">
          <?php foreach ($artikel as $list_artikel) {
            if ($list_artikel->tipe_artikel != "Warta Jemaat") { ?>
              <div class="col-lg-6 artikel-item" data-aos="fade-up">
                <h4><a href="<?php echo base_url() . 'Artikel/baca_artikel/' . $list_artikel->id_artikel; ?>"><?php echo $list_artikel->judul_artikel ?> </a></h4>
                <p><?php echo $list_artikel->deskripsi_singkat ?></p>
              </div>
          <?php }
          } ?>
        </div>

        <div class="seeMore">
          <a href="<?php echo base_url() . 'Artikel' ?>" target="_blank"><button class="btn-effect-bg btn-seeMore">Lihat Semua</button></a>
        </div>
      </div>
    </section><!-- End Artikel Section -->

    <!-- ======= Artikel Section ======= -->
    <!--  <section id="warta" class="artikel section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Warta Jemaat</h2>
        </div>

        <div class="row  d-flex align-items-stretch">
          <?php foreach ($warta as $list_warta) { ?>
            <div class="col-lg-6 artikel-item" data-aos="fade-up">
              <h4><a href="<?php echo base_url() . 'Artikel/baca_artikel/' . $list_warta->id_artikel; ?>"><?php echo $list_warta->judul_artikel ?> </a></h4>
              <p><?php echo $list_warta->deskripsi_singkat ?></p>
            </div>
          <?php } ?>
        </div>

        <div class="seeMore">
          <a href="<?php echo base_url() . 'Artikel/warta_jemaat' ?>" target="_blank"><button class="btn-effect-bg btn-seeMore">Lihat Semua</button></a>
        </div>
      </div>
    </section> -->
    <!-- End Artikel Section -->

    <!-- ======= Dokumen Section ======= -->
    <section id="dokumen" class="dokumen">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters justify-content-center dokumen-content">
          <div class="section-title">
            <h2>Dokumen</h2>
            <p></p>
          </div>
          <?php foreach ($formPendaftaran as $listFormPendaftaran) { ?>
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><?php echo $listFormPendaftaran->jenis_dokumen ?></h4>
              <p class="description">Anda bisa download
                <a href="<?php echo base_url() . 'dokumenFormulir/' . $listFormPendaftaran->dokumen ?>" download>disini</a>
              </p>

            </div>
          <?php }  ?>
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bx bx-upload"></i></div>
            <h4 class="title">Pengumpulan Formulir</h4>
            <p class="description">Anda bisa kumpul form yang telah di isi <a href="<?php // echo base_url() . 'Pengumpulan_Dokumen' 
                                                                                    ?>">disini</a></p>
          </div>
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bx bx-edit-alt"></i></div>
            <h4 class="title">Permintaan Perubahan Data</h4>
            <p class="description">Klik link <a href="<?php echo base_url() . 'Permintaan' 
                                                                                    ?>">disini</a></p>
          </div>
        </div>

      </div>
    </section>
    <!-- End dokumen Us Section -->

    <div>
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.616917947622!2d106.6140754!3d-6.2102965!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2ed8adec343dd2d3!2sGKI%20Perumnas%20Tangerang!5e0!3m2!1sen!2sid!4v1636125399868!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
    </div>

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Kontak Kami</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:gkiperumnas@gmail.com">gkiperumnas@gmail.com</a></p>
            </div>
          </div>
          <div class="col-lg-6 d-flex" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Alamat</h3>
              <p>Jl. Karet Raya Blok 22 No. 10 A, Perumnas I, Kel. Cibodasari, Kec. Cibodas, Tangerang, Banten-15138</p>
            </div>
          </div>
          <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box ">
              <i class="bx bx-phone-call"></i>
              <h3>Telepon</h3>
              <p>(021) 5520209</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

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