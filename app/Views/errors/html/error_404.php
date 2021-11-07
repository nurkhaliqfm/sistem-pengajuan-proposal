<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CodeBreak | Error 404</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fontawesome/all.min.css') ?>">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/icheck-bootstrap.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition login-page">
	<!-- Main content -->
	<section class="content">
		<div class="error-page">
			<h2 class="headline text-warning"> 404</h2>

			<?php $status = session()->get('user_level'); ?>

			<div class="error-content">
				<h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

				<p>
					We could not find the page you were looking for.
					Meanwhile, you may <a href="<?= $status == 'admin' ? base_url('admin') : base_url('home'); ?>">return to dashboard</a> or try using the search form.
				</p>
			</div>

			<!-- /.error-content -->
		</div>
		<!-- /.error-page -->
	</section>
	<!-- /.content -->

	<!-- jQuery -->
	<script src="../../plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>