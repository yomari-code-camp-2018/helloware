<?php
	session_start();
	$message="";
	$info="";
	include('common/connect.php');
	if(isset($_POST["submit"])){
		$user_name=$_POST["user_name"];
		$user_password=($_POST['user_password']);
		$sql="SELECT * from billing_user WHERE  user_name='$user_name' AND user_password='$user_password' AND status='Active'";
		$result=mysql_query($sql);
		$row=mysql_fetch_assoc($result);
		if(mysql_num_rows($result)>0){
			if($user_password==$row['user_password'])
				{
				$_SESSION["systemadmin"]=$row['user_name'];
				$_SESSION['loggedin_time'] = time();
			}
		}
		else{
			$info = "<p><b>Warning: Wrong Information !!</b></p>";
		}
	}
	if(isset($_SESSION["systemadmin"])) {
		if(!isLoginSessionExpired()) {
			header("Location:index.php");
		} else {
			header("Location:logout.php?session_expired=1");
		}
	}
	if(isset($_GET["session_expired"])) {
		$message = "<b>Login Session is Expired. Please Login Again</b>";
	}
?>
<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title>Hello Ware | Team Hello World</title>
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<!--Link Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png" />
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />
		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="assets/images/logo.png" height="65" alt="Laxmee Hair"/>
				</a>
				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<center>
						<h5 style="color: red;">
						<?php if($info!="") { ?>
						<?php echo $info; ?>
						<?php } ?>
						<?php if($message!="") { ?>
						<?php echo $message; ?>
						<?php } ?>
						
						</h5>
						</center>
						<form action="" method="post">
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="user_name" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
								</div>
								<div class="input-group input-group-icon">
									<input name="user_password" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2 text-left">
									<a href="../"><button type="button" class="btn btn-primary hidden-xs">Back</button></a>
									<button type="submit" name="submit" class="btn btn-primary btn-block visible-xs mt-lg">Log In</button>
								</div>
								<div class="col-sm-10 text-right">
									<button type="submit" name="submit" class="btn btn-primary hidden-xs">Log In</button>
									<a href="../"><button type="button" class="btn btn-primary btn-block visible-xs mt-lg">Back</button></a>
								</div>
							</div>
						</form>
					</div>
				</div>
				<p class="text-center text-muted mt-md mb-md">&copy; Copyright <?php echo date(" Y "); ?>. <b>Team Hello World</b></p>
				
			</div>
		</section>
		<!-- end: page -->
		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
	</body>
</html>