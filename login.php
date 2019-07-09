<?php session_start();?>
<?php 
	if (isset($_SESSION['user_login_success'])) {
		header("location:user_profile.php");
	}
 ?>
<?php require_once 'dbcon.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Login panel </title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
		<!-- <link rel="stylesheet" href="style.css"> -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">

	</head>
	<body style="background: #ccc">
		<div class="container">
			<div class="login_head text-center">
				<h4 style="margin-right: 100px;"></h4>
			</div>
			<div class="row">
				<div class="col-md-4 offset-md-4 col-sm-8 offset-sm-2">
					<div class="login_box mt-5">
						<div class="login_box_heading text-center p-3">
							<h6>User login panel</h6>
						</div>
						<div class="login_box_heading_body">
							<p class="text-center text-info font-weight-bold">Please login to access</p>
							<?php 
								if (isset($_POST['user_login'])) {
									$email = mysqli_real_escape_string($link,$_POST['email']);
									$pass = mysqli_real_escape_string($link ,$_POST['password']);

									if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
										$sql = "SELECT * FROM `user_info` WHERE `email` = '$email'";
										$res = mysqli_query($link,$sql);
										$row = mysqli_fetch_assoc($res);
										if (mysqli_num_rows($res) > 0) {
											if ($row['status'] ==1) {
												$password = md5($pass);
											if ($row['password'] == $password) {
												$_SESSION['user_login_success'] = $row['user_id'];
												header("location:user_profile.php");
											}else{
												echo "<div class='alert alert-danger text-center'>"."Password not match"."</div>";
											}
											}else{
												echo "<div class='alert alert-danger text-center'>"."check your email for active your account"."</div>";
											}
											
										}else{
											echo "<div class='alert alert-danger text-center'>"."No account found"."</div>";
										}

									}else{
										echo "<div class='alert alert-danger text-center'>"."This email is not valid"."</div>";
									}
								}
							 ?>
							<form id="login" action="login.php" method="post">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
									</div>
									<input type="email" class="form-control" placeholder="email" aria-label="email" name="email" aria-describedby="basic-addon1">
								</div>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
									</div>
									<input type="password" class="form-control" placeholder="Password" name="password" aria-label="Username" aria-describedby="basic-addon1">
								</div>
								<button class="btn btn-primary btn-block" name="user_login">Sign In</button>
							</form>
						</div>
						<div class="login_box_heading_footer text-center p-2" style="background: #004;">
							<p style="color: #fff;">new ? please <a style="text-decoration: none;" href="registration.php">Sign Up</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>
