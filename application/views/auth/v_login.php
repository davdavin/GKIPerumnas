<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicons -->
	<link href="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" rel=" icon">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">

	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>resources/login/css/style.css">

	<style>
		.btn.btn-primary {
			background: rgb(135, 206, 250) !important;
			border: 1px solid rgb(135, 206, 250) !important;
			color: #000 !important;
		}
		.container {
			width: 100%;
			padding-right: 15px;
			padding-left: 15px;
			background: rgba(255, 255, 255, 0.2);
			margin: 0 auto;
			box-shadow: 0px 15px 16.83px 0.17px rgba(37, 36, 36, 0.5);
			-moz-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
			-webkit-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
			-o-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
			-ms-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
			border-radius: 20px;
			-moz-border-radius: 20px;
			-webkit-border-radius: 20px;
			-o-border-radius: 20px;
		}
		.form-control {
			background: transparent;
			border: none;
			height: 50px;
			color: white !important;
			border: 1px solid transparent;
			background: rgba(255, 255, 255, 0.08);
			border-radius: 40px;
			padding-left: 20px;
			padding-right: 20px;
			-webkit-transition: 0.3s;
			-o-transition: 0.3s;
			transition: 0.3s;
		}
	</style>

</head>

<body class="img js-fullheight" style="background-image: url(<?php echo base_url(); ?>resources/assets/img/slide/gedungbaruu.png); background-attachment: fixed;">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">

						<form method="post" action="<?php echo base_url() . 'Login/validasi' ?>" class="signin-form form-login">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Username" name="username">
								<p class="px-4 error_username clear" style="display: none"></p>
								<!--	<p class="p-2"><?php // echo form_error('username'); 
														?></p> -->
							</div>
							<div class="form-group">
								<input id="password-field" type="password" class="form-control" placeholder="Password" name="password">
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								<p class="px-4 error_pass clear" style="display: none"></p>
								<?php // echo form_error('password'); 
								?>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3" name="sigin">Sign In</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<!--	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox">
									  <span class="checkmark"></span>
									</label> -->
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url(); ?>resources/login/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>resources/login/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>resources/login/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>resources/login/js/main.js"></script>
	<!-- SweetAlert2 -->
	<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

	<script>
		$(function() {
			$('.form-login').submit(function(e) {
				e.preventDefault();
				$.ajax({
					url: $(this).attr('action'),
					type: "POST",
					dataType: "JSON",
					data: $(this).serialize(),
					success: function(respon) {
						if (respon.sukses == false) {
							if (respon.error_username) {
								$('.error_username').show();
								$('.error_username').html(respon.error_username);
								$('.error_username').css("color", "red");
							} else {
								$('.error_username').hide();
							}
							if (respon.error_pass) {
								$('.error_pass').show();
								$('.error_pass').html(respon.error_pass);
								$('.error_pass').css("color", "red");
							} else {
								$('.error_pass').hide();
							}
							if (respon.status) {
								Swal.fire({
									title: respon.status,
									icon: 'error',
									timer: 2000
								});
							}
						} else {
							$('.clear').hide();
							Swal.fire({
								title: 'Sukses',
								text: respon.sukses,
								icon: 'success',
								showConfirmButton: false,
								timer: 1000,
							}).then((confirmed) => {
								window.location.href = "<?php echo base_url() . 'Profil' ?>";
							});
						}
					}

				});
			})
		});
	</script>

</body>

</html>