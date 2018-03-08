<?php
ob_start();
session_start();
include 'includes/config.inc.php';
include 'includes/functions.php';
include 'includes/model.php';
include 'includes/fixed_data.php';
$msg = '';

if(isset($_POST['login'])){
	extract($_POST);
	$sql = mysqli_query($_con,"SELECT * from admin where username='$username' and password='".base64_encode($password)."'");
	$rs = mysqli_fetch_assoc($sql);

	if(mysqli_num_rows($sql)>0){
		header('Location: main.php');
		$_SESSION['user'] = $rs['id'];
	}
	else{
		$msg = 'Username or Password error '.mysqli_error($_con);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?=COMPANY?></title>

	<? include 'css.php';?>
</head>

<body class="login">
	<div>
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form method="post">
						<h1>Login Form</h1>
						<div>
							<input type="text" class="form-control" placeholder="Username" required="" name="username" />
						</div>
						<div>
							<input type="password" class="form-control" placeholder="Password" required="" name="password" />
						</div>
						<br>
						<div>
							<input class="btn btn-default submit" type="submit" name="login" value="Log in" style="margin-left: 40%" />
							<!-- <a class="reset_pass" href="#">Lost your password?</a> -->

						</div>
						<br>

						<div class="clearfix"></div>

						<div class="separator">
             <!--  <p class="change_link">New to site?
                <a href="#signup" class="to_register"> Create Account </a>
              </p>
          -->
          <p style="color: red"><?=$msg?></p>
          <div class="clearfix"></div>
          <br />

          <div>
          	<h1><i class="fa fa-paw"></i> <?=COMPANY?></h1>
          	<p>©<?=date('Y')?> All Rights Reserved. <?=COMPANY?> . Privacy and Terms</p>
          </div>
      </div>
  </form>
</section>
</div>

<div id="register" class="animate form registration_form">
	<section class="login_content">
		<form>
			<h1>Create Account</h1>
			<div>
				<input type="text" class="form-control" placeholder="Username" required="" />
			</div>
			<div>
				<input type="email" class="form-control" placeholder="Email" required="" />
			</div>
			<div>
				<input type="password" class="form-control" placeholder="Password" required="" />
			</div>
			<div>
				<a class="btn btn-default submit" href="index.html">Submit</a>
			</div>

			<div class="clearfix"></div>

			<div class="separator">
				<p class="change_link">Already a member ?
					<a href="#signin" class="to_register"> Log in </a>
				</p>

				<div class="clearfix"></div>
				<br />

				<div>
					<h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
					<p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
				</div>
			</div>
		</form>
	</section>
</div>
</div>
</div>
</body>
</html>
