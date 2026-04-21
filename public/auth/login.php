<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/AccessControl.php';
session_start();

AccessControl::isSessionActive();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Login - Workshop Sistem Informasi</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="../backend/assets/img/favicon.png" rel="icon">
	<link href="../backend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="../backend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../backend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="../backend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="../backend/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="../backend/assets/vendor/simple-datatables/style.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="../backend/assets/css/style.css" rel="stylesheet">

	<style>
		body {
			background: url('../backend/assets/img/bg-pattern.png');
			background-size: 35%;
			background-color: rgba(255, 255, 255, 0.9);
			background-blend-mode: lighten;
		}
	</style>

	<!-- =======================================================
	* Template Name: NiceAdmin
	* Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
	* Updated: Apr 20 2024 with Bootstrap v5.3.3
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
</head>

<body>
	<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php';

	$db = new Database();
	$conn = $db->getConnection();
	$auth = new Auth($conn);

	// Proses login ketika form disubmit
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$email = $_POST['email'] ?? '';
		$password = $_POST['password'] ?? '';

		// Panggil method login
		if ($auth->login($email, $password)) {
			// Redirect jika berhasil
			header("Location: ../backend/dashboard.php");
			exit;
		} else {
			$error = "Email atau Password salah!";
		}
	}
	?>

	<main>
		<div class="container">

			<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

							<div class="d-flex justify-content-center py-4">
								<a href="index.html" class="logo d-flex align-items-center w-auto">
									<img src="../backend/assets/img/logo.png" alt="">
									<span class="d-none d-lg-block">Ws. Sistem Informasi</span>
								</a>
							</div><!-- End Logo -->

							<div class="card mb-3">

								<div class="card-body">

									<div class="pt-4 pb-2">
										<h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
										<p class="text-center small">Enter your email & password to login</p>
									</div>

									<?php if (isset($_SESSION['success'])) : ?>
										<div class="alert alert-success alert-dismissible fade show" role="alert">
											<?php
											echo $_SESSION['success'];
											unset($_SESSION['success']);
											?>
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										</div>
									<?php endif; ?>
									
									<?php if (isset($error)) : ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<?php echo $error; ?>
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										</div>
									<?php endif; ?>

									<form class="row g-3 needs-validation" novalidate method="POST">

										<div class="col-12">
											<label for="yourEmail" class="form-label">Email</label>
											<div class="input-group has-validation">
												<input type="email" name="email" class="form-control" id="yourEmail" required>
												<span class="input-group-text" id="inputGroupPrepend"><i class="bx bx-envelope"></i></span>
												<div class="invalid-feedback">Please enter your email.</div>
											</div>
										</div>
										
										<div class="col-12">
											<label for="yourPassword" class="form-label">Password</label>
											<div class="input-group has-validation">
												<input type="password" name="password" class="form-control" id="yourPassword" required>
												<span class="input-group-text" id="inputGroupPrepend"><i class="bx bx-lock"></i></span>
												<div class="invalid-feedback">Please enter your password!</div>
											</div>
										</div>

										<!-- <div class="col-12">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
												<label class="form-check-label" for="rememberMe">Remember me</label>
											</div>
										</div> -->
										<div class="col-12">
											<button class="btn btn-primary w-100" type="submit">Login</button>
										</div>
										<div class="col-12">
											<p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
										</div>
									</form>

								</div>
							</div>

							<div class="credits">
								<!-- All the links in the footer should remain intact. -->
								<!-- You can delete the links only if you purchased the pro version. -->
								<!-- Licensing information: https://bootstrapmade.com/license/ -->
								<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
								<span class="small">Created with <i class="bx bxs-heart text-danger"></i> by <a href="https://github.com/djuliar" target="_blank">Djuliar</a></span>
							</div>

						</div>
					</div>
				</div>

			</section>

		</div>
	</main><!-- End #main -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="../backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../backend/assets/vendor/simple-datatables/simple-datatables.js"></script>
	<script src="../backend/assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="../backend/assets/js/main.js"></script>

</body>

</html>