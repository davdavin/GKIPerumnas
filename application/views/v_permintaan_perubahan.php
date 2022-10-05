<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Perubahan Informasi Jemaat</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" rel="icon">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/formRequest/vendor/bootstrap/css/bootstrap.min.css" />
    <!--===============================================================================================-->
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/formRequest/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="f<?php echo base_url(); ?>assets/formRequest/onts/Linearicons-Free-v1.0.0/icon-font.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/formRequest/vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/formRequest/vendor/css-hamburgers/hamburgers.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/formRequest/css/util.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/formRequest/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

</head>

<body>
    <div class="container-request" style="background-image: url('<?php echo base_url(); ?>assets/formRequest/images/bg-01.jpg')">
        <div class="wrap-request">
            <form id="submit-form" class="request-form validate-form" action="<?php echo base_url() . 'Permintaan/kirim' ?>" method="post">
                <span class="request-form-title"> Form Permintaan Perubahan Informasi Jemaat </span>

                <div class="wrap-input-request">
                    <span class="label-input-request">No. Anggota</span>
                    <input class="input-request inputNoHP" type="number" name="noAnggota" placeholder="Masukkan nomor anggota" />
                    <div class="px-1 error_no_anggota" style="display: none;"></div>
                </div>
                <div class="checkbox-request">
                    <input type="checkbox" id="nohp"> <label for="nohp">No. Handphone</label>
                    <input type="hidden" id="pilihNoHP" name="pilihNoHP">
                </div>
                <div id="gantiNoHP" class="wrap-input-request rs1-wrap-input-request" style="display: none;">
                    <span class="label-input-request">Nomor Handphone</span>
                    <input class="input-request inputNoHP" type="number" name="nohp" placeholder="Nomor Handphone baru" />
                    <div class="px-1 error_nohp" style="display: none;"></div>
                </div>

                <!-- <div class="wrap-input-request rs1-wrap-input-request validate-input">
            <span class="label-input-request">Enter your email *</span>
            <input class="input-request" type="text" name="email" placeholder="Enter your email"/>
          </div> -->

                <div class="checkbox-request">
                    <input type="checkbox" id="email"> <label for="email">Email</label>
                    <input type="hidden" id="pilihEmail" name="pilihEmail">
                </div>
                <div id="gantiEmail" class="wrap-input-request" style="display: none;">
                    <span class="label-input-request">Email Baru</span>
                    <input class="input-request" type="enail" name="email" placeholder="Email baru" />
                    <div class="px-1 error_email" style="display: none;"></div>
                </div>

                <div class="checkbox-request">
                    <input type="checkbox" id="alamat"> <label for="alamat">Alamat</label>
                    <input type="hidden" id="pilihAlamat" name="pilihAlamat">
                </div>
                <div id="gantiAlamat" class="wrap-input-request" style="display: none;">
                    <span class="label-input-request">Alamat Baru</span>
                    <input class="input-request" type="text" name="alamat" placeholder="Alamat baru anda" />
                    <div class="px-1 error_alamat" style="display: none;"></div>
                </div>

                <div class="checkbox-request">
                    <input type="checkbox" id="pekerjaan"> <label for="pekerjaan">Pekerjaan</label>
                    <input type="hidden" id="pilihPekerjaan" name="pilihPekerjaan">
                </div>
                <div id="gantiPekerjaan" class="wrap-input-request" style="display: none;">
                    <span class="label-input-request">Pekerjaan Baru</span>
                    <input class="input-request" type="text" name="pekerjaan" placeholder="Pekerjan baru anda" />
                    <div class="px-1 error_pekerjaan" style="display: none;"></div>
                </div>

                <div class="checkbox-request">
                    <input type="checkbox" id="pendidikan"> <label for="pendidikan">Pendidikan</label>
                    <input type="hidden" id="pilihPendidikan" name="pilihPendidikan">
                </div>
                <div id="gantiPendidikan" class="wrap-input-request" style="display: none;">
                    <span class="label-input-request">Pekerjaan Baru</span>
                    <input class="input-request" type="text" name="pendidikan" placeholder="Pendidikan baru anda" />
                    <div class="px-1 error_pendidikan" style="display: none;"></div>
                </div>

                <!-- <div class="wrap-input-request validate-input" data-validate="Message is required">
                    <span class="label-input-request">Message</span>
                    <textarea class="input-request" name="message" placeholder="Your message here..."></textarea>
                </div> -->

                <div class="container-request-form-btn">
                    <div class="wrap-request-form-btn">
                        <div class="request-form-bgbtn"></div>
                        <button class="request-form-btn kirim">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
    <script src="<?php echo base_url(); ?>jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/formRequest/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/formRequest/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/formRequest/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> -->
    <script>
        //   window.dataLayer = window.dataLayer || [];
        //   function gtag(){dataLayer.push(arguments);}
        //   gtag('js', new Date());

        //   gtag('config', 'UA-23581568-13');
        $(document).ready(function() {
            $("#nohp").click(function() {
                var noHP = document.getElementById("nohp");
                if (noHP.checked == true) {
                    $("#pilihNoHP").val("pilih");
                    $("#gantiNoHP").show();
                } else {
                    $("#pilihNoHP").val("");
                    $("#gantiNoHP").hide();
                }
            });
            $("#email").click(function() {
                var email = document.getElementById("email");
                if (email.checked == true) {
                    $("#pilihEmail").val("pilih");
                    $("#gantiEmail").show();
                } else {
                    $("#pilihEmail").val("");
                    $("#gantiEmail").hide();
                }
            });
            $("#alamat").click(function() {
                var email = document.getElementById("alamat");
                if (email.checked == true) {
                    $("#pilihAlamat").val("pilih");
                    $("#gantiAlamat").show();
                } else {
                    $("#pilihAlamat").val("");
                    $("#gantiAlamat").hide();
                }
            });
            $("#pekerjaan").click(function() {
                var pekerjaan = document.getElementById("pekerjaan");
                if (pekerjaan.checked == true) {
                    $("#pilihPekerjaan").val("pilih");
                    $("#gantiPekerjaan").show();
                } else {
                    $("#pilihPekerjaan").val("");
                    $("#gantiPekerjaan").hide();
                }
            });
            $("#pendidikan").click(function() {
                var pendidikan = document.getElementById("pendidikan");
                if (pendidikan.checked == true) {
                    $("#pilihPendidikan").val("pilih");
                    $("#gantiPendidikan").show();
                } else {
                    $("#pilihPendidikan").val("");
                    $("#gantiPendidikan").hide();
                }
            });

            $('#submit-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    dataType: 'JSON',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('.kirim').attr('disable', 'disabled');
                        $('.kirim').html('<i class="fa fa-spin fa-spinner"></i>');
                    },
                    complete: function() {
                        $('.kirim').removeAttr('disable');
                        $('.kirim').html('Submit');
                    },
                    success: function(respon) {
                        if (respon.sukses == false) {
                            if (respon.error_no_anggota) {
                                $('.error_no_anggota').show();
                                $('.error_no_anggota').html(respon.error_no_anggota);
                            } else {
                                $('.error_no_anggota').hide();
                            }
                            if (respon.error_nohp) {
                                $('.error_nohp').show();
                                $('.error_nohp').html(respon.error_nohp);
                                $('.error_nohp').css('color', 'red');
                            } else {
                                $('.error_nohp').hide();
                            }
                            if (respon.error_email) {
                                $('.error_email').show();
                                $('.error_email').html(respon.error_email);
                                $('.error_email').css("color", "red");
                            } else {
                                $('.error_email').hide();
                            }
                            if (respon.error_alamat) {
                                $('.error_alamat').show();
                                $('.error_alamat').html(respon.error_alamat);
                                $('.error_alamat').css('color', 'red');
                            } else {
                                $('.error_alamat').hide();
                            }
                            if (respon.error_pekerjaan) {
                                $('.error_pekerjaan').show();
                                $('.error_pekerjaan').html(respon.error_pekerjaan);
                                $('.error_pekerjaan').css('color', 'red');
                            } else {
                                $('.error_pekerjaan').hide();
                            }
                            if (respon.error_pendidikan) {
                                $('.error_pendidikan').show();
                                $('.error_pendidikan').html(respon.error_pendidikan);
                                $('.error_pendidikan').css('color', 'red');
                            } else {
                                $('.error_pendidikan').hide();
                            }
                        } else {
                            Swal.fire({
                                title: 'Sukses',
                                text: respon.sukses,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000,
                            }).then((confirmed) => {
                                window.location.reload();
                            });
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>