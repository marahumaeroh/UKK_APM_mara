<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="/assets4/css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<h2>Pengaduan Masyarakat Desa Windusengkahan</h2>
				<div class="col-md-12 col-lg-7">
					<div class="login-wrap">
						<form class=" signin-form d-md-flex" method="POST" action="/login">

							<div class="half p-4 py-md-5">
								<div class="w-100">
									<h3 class="mb-4">Sign In</h3>
									<?php if (session()->getFlashdata('msg')) : ?>
										<div class="alert alert-danger" role="alert"><?= session()->getFlashdata('msg') ?></div>
									<?php endif; ?>
								</div>
								<div class="form-group mt-3">
									<label class="label" for="name">Username</label>
									<input type="text" name="txtUsername" class="form-control" placeholder="Username" required>
								</div>
								<div class="form-group">
									<label class="label" for="password">Password</label>
									<input id="password-field" name="txtPassword" type="password" class="form-control" placeholder="Password" required>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
							</div>
							<div class="half p-4 py-md-5 bg-primary">
								<div class="form-group">
									<button type="submit" class="form-control btn btn-secondary rounded submit px-3">Sign me in now</button>
								</div>
								<!-- <div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
								</div> -->
								<p class="w-100 text-center" style="color:white;">&mdash; Tidak Punya Akun? &mdash;</p>
								<div class="w-100">
									<p class="social-media d-flex justify-content-center">
										<a class="text-center" style="color:white;" href="/register"><u>Register</u></a>
									</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>