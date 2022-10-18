<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login | Jemaat</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicons -->
	<link href="<?php echo base_url(); ?>resources/assets/img/logo-GKI-tr.png" rel=" icon">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/formlogin/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/formlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/formlogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/formlogin/vendor/animate/animate.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/formlogin/vendor/animsition/css/animsition.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/formlogin/css/util.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/formlogin/css/main.css">
</head>

<body>

	<div class="limiter">
		<?php $this->load->view('templates/message.php'); ?>
		<div class="container-login100" style="background-image: url('<?php echo base_url(); ?>resources/assets/img/slide/gedungbaruu.png');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="<?php echo base_url() . 'login/jemaat/validasi' ?>">

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<a class="container m-t-32" type="button" data-toggle="modal" data-target="#modalForgot" style="color: blue; cursor: pointer;">
						Forgot Password
					</a>
				</form>
			</div>
		</div>

		<div class="modal fade" id="modalForgot">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Masukan Email</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo base_url() . 'jemaat/forgot_password' ?>" method="post" class="form-forget">
							<div class="form-group">
								<input type="text" class="form-control" name="email" placeholder="email anda" required>
								<p class="p-2 error_email"></p>
							</div>
							<button type="submit" class="btn btn-block btn-primary btn-sm simpan">Submit</button>
						</form>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	</div>

	<script src="<?php echo base_url(); ?>assets/formlogin/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/formlogin/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/formlogin/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/formlogin/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/formlogin/vendor/countdowntime/countdowntime.js"></script>
	<script src="<?php echo base_url(); ?>assets/formlogin/js/main.js"></script>
	<!-- SweetAlert2 -->
	<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

	<script>
		$(document).ready(function() {
			const sukses = $('.sukses').data('flashdata');

			if (sukses) {
				Swal.fire({
					title: 'Sukses',
					text: sukses,
					icon: 'success'
				});
			}

			const gagal = $('.gagal').data('flashdata');

			if (gagal) {
				Swal.fire({
					title: 'Tidak berhasil',
					text: gagal,
					icon: 'error'
				});
			}
		});
	</script>

</body>

</html>