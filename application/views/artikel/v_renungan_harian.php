<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!--  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/artikel/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/artikel/css/styleArtikel.css">
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
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/assets/css/styleHome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/tambahanStyle.css">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" rel="icon">

</head>

<body>

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h4><img src="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" alt=""> <span></span> GKI Perumnas - Tangerang</h4>
                <!-- Uncomment below if you prefer to use an image logo -->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="<?php echo base_url() . 'Artikel' ?>">Semua</a></li>
                    <li><a href="<?php echo base_url() . 'Artikel/renungan_harian' ?>" class="active">Renungan Harian</a></li>
                    <li><a href="<?php echo base_url() . 'Artikel/bacaan_doa' ?>">Bacaan Doa</a></li>
                    <li><a href="<?php echo base_url() . 'Artikel/warta_jemaat' ?>">Warta Jemaat</a></li>
                    <li><a href="<?php echo base_url() . 'Artikel/artikel_lainnya' ?>">Artikel Lain</a></li>
                    <!-- <a href="#dokumen" class="get-started-btn scrollto">Get Started</a> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>

    <main id="main">
        <section id="artikel" class="artikel section-bg">
            <div class="container">
                <div class="col-sm-6">
                    <form action="<?php echo base_url() . 'Artikel/hasil_pencarian' ?>" method="post">
                        <div class="input-group">
                            <select class="pilih-artikel form-control" name="artikel"></select>
                            <div class="input-group-append">
                                <!--	<span class="input-group-text"><i class="fas fa-phone"></i></span>-->
                                <button type="submit" class="btn btn-sm"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div><br>
                <div class="row  d-flex align-items-stretch">
                    <?php if (count($renungan) > 0) {
                        foreach ($renungan as $list_renungan) { ?>
                            <div class="col-lg-6 artikel-item" data-aos="fade-up">
                                <h4><a href="<?php echo base_url() . 'artikel/' . $list_renungan->id_artikel; ?>"><?php echo $list_renungan->judul_artikel ?> </a></h4>
                                <p><?php echo $list_renungan->deskripsi_singkat ?></p>
                            </div>
                        <?php }
                    } else { ?>
                        <p class="tulisan-tengah"> <?php echo "Belum Ada Renungan Harian"; ?></p>
                    <?php   } ?>
                </div>
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </section>
    </main>

    <script src="<?php echo base_url(); ?>jquery-3.4.1.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
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
    <script>
        $('.pilih-artikel').select2({
            placeholder: 'cari',
            language: {
                inputTooShort: function(args) {
                    var chars = args.minimum - args.input.length;
                    return "Masukan minimal " + chars + " atau lebih huruf";
                },
                searching: function() {
                    return "Mencari";
                },
                noResults: function() {
                    return "Tidak ditemukan";
                }
            },
            minimumInputLength: 3,
            ajax: {
                url: '<?php echo base_url() . 'Artikel/cari_renungan_harian' ?>',
                type: 'POST',
                dataType: 'JSON',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data,
                    };
                },
                //cache: true
            },
        });

        $('b[role="presentation"]').hide();
    </script>

</body>

</html>