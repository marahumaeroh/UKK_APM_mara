<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Form Register</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="/assets/text/css" href="css/roboto-font.css">
	<link rel="stylesheet" type="/assets/text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="/assets/css/style.css" />
</head>

<body class="form-v5">
	<div class="page-content">
		<div class="form-v5-content">
			<form class="form-detail" method="POST" action="/masyarakat/daftar">

				<?php if (session()->getFlashdata('msg')) : ?>
					<div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
				<?php endif; ?>

				<h2>FORM REGISTER</h2>
				<?php if (session()->getFlashdata('slh')) : ?>
					<div class="alert alert-danger text-center"><?= session()->getFlashdata('slh') ?></div>
				<?php endif; ?>
				</br>
				<div class="form-row">
					<label for="full-nik">NIK</label>
					<input type="text" maxlength="16" name="txtNik" id="full-name" class="input-text" placeholder="Your Nik">
				</div>
				<div class="form-row">
					<label for="full-name">Nama</label>
					<input type="text" name="txtNama" id="full-name" class="input-text" placeholder="Your Nama" required>
				</div>
				<div class="form-row">
					<label for="full-username">Username</label>
					<input type="text" name="txtUsername" id="username" class="input-text" <?= $validation->HasError('username'); ?> placeholder="Your Name" required>
				</div>
				<div class="form-row">
					<label for="password">Password</label>
					<input type="password" name="txtPassword" id="password" class="input-text" placeholder="Your Password" required>
					<div class="invalid-feedback">
						<?= $validation->getError('password'); ?>
					</div>
				</div>
				<div class="form-row">
					<label for="telepon">No Telp</label>
					<input type="text" name="txtTelp" id="telp" class="input-text" placeholder="Your telp" required>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register">
				</div>
				<div class="text-center">
					<p>Sudah punya Akun? <a href="/">Go to Login</a></p>

				</div>
			</form>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>