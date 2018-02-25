<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>BLMC | Login</title>
		<!-- Bootstrap core CSS-->
		<link href="<?php echo base_url('Assets/'); ?>vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
		<!-- Custom fonts for this template-->
		<link href="<?php echo base_url('Assets/'); ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom styles for this template-->
		<link href="<?php echo base_url('Assets/'); ?>css/sb-admin.css" rel="stylesheet">
	</head>

	<body class="bg-dark">
		<div class="container">
			<div class="card card-login mx-auto mt-5">
				<div class="card-header"><i class="fa fa-lock"> Login</i></div>
				<div class="card-body">
					<?php echo $this->session->flashdata('error'); ?>
					<form method="post" action="<?php echo base_url(); ?>">
						<div class="form-group">
							<label for="Username">Username</label>
							<input class="form-control" id="username" type="text" name="username" placeholder="Enter Username" value="<?php echo set_value('username'); ?>">
							<span class="text-danger"><?php echo form_error('username'); ?></span>
						</div>
						<div class="form-group">
							<label for="Password">Password</label>
							<input class="form-control" id="password" name="password" type="password" placeholder="Password">
							<span class="text-danger"><?php echo form_error('password'); ?></span>
						</div>
						<button class="btn btn-primary btn-block">Login</button>
					</form>
					<div class="text-center">
						<a class="d-block small" href="#">Forgot Password?</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootstrap core JavaScript-->
		<script src="<?php echo base_url('Assets/'); ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url('Assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="<?php echo base_url('Assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
	</body>
</html>
