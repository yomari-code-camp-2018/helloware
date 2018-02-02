<?php 
include('connect.php');
session_start();
if(isset($_SESSION["systemadmin"])=='')
header('location: login.php');

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

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<!--Link Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png" />
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
		<section class="body">

			<!-- start: header -->
			<?php
				include('header.php');
			?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php
					include('sidebar.php')
				?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Add User</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li> <a href="control.php"><span>Control</span></a></li>
								<li><a href="user_manage.php"><span>User Manage</span></a></li>
								<li><a href="#"><span>Add User</span></a></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6">

								<?php
                                    if(isset($_POST['submit']))
                                    {
                                      $first_name = $_POST['first_name'];
                                      $last_name = $_POST['last_name'];
                                      $user_name = $_POST['user_name'];
                                      $user_password = $_POST['user_password'];
                                      $user_address = $_POST['user_address'];
                                      $user_mobile = $_POST['user_mobile'];
                                      $user_email = $_POST['user_email'];
                                      $status = $_POST['status'];

                                      	
                                        $sql3 = mysql_query("SELECT user_name FROM billing_user WHERE user_name='$user_name'");
                                            if (mysql_num_rows($sql3) != 0)
                                                {
                                                echo '<p class="error" style="color:red;">User Name is already exits. Please <a href="user_manage.php">click</a> here.</p>';
                                                }
                                            else
                                                {
                                        $sql = "INSERT INTO billing_user(first_name,last_name,user_name,user_password,user_address,user_mobile,user_email,status) VALUES('$first_name','$last_name','$user_name','$user_password','$user_address','$user_mobile','$user_email','$status')";
                                      		mysql_query($sql);

                                      			

                                      	$sql2 = "INSERT INTO billing_user_access (user_name) VALUES('$user_name')";

                                      	$result = @mysql_query($sql2); 
                                      
                                      		echo mysql_error();

                                    if($result)
                                        echo '<p class="success" style="color:#FA1919;">Your User Entry Successfully. Please <a href="user_manage.php">click</a> here. </p>';
                                      else
                                        echo '<p class="error" style="color:#FA1919;">Error in User Entry . Please try again.</p>';
                                    
                                    }}
                                ?>
							<form id="form" action="" class="form-horizontal" method="POST">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>

										<h2 class="panel-title">Add User</h2>
										<p class="panel-subtitle">
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">First Name<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="first_name" class="form-control" placeholder="eg.: First Name" required/>
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-3 control-label">Last Name<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="last_name" class="form-control" placeholder="eg.: Last Name" required/>
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-3 control-label">User Name<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="user_name" class="form-control" placeholder="eg.: User Name" required/>
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-3 control-label">User Password<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="password" name="user_password" class="form-control" placeholder="eg.: User Password" required/>
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-3 control-label">User Address<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="user_address" class="form-control" placeholder="eg.: User Address" required/>
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-3 control-label">User Mobile<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="user_mobile" class="form-control" placeholder="eg.: User Mobile" required/>
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-3 control-label">User Email<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="email" name="user_email" class="form-control" placeholder="eg.: User Email" required/>
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-3 control-label">User Status<span class="required">*</span></label>
											<div class="col-sm-9">
												<select class="form-control" name="status"> 
													<option value="Active">Active</option>
													<option value="Terminated">Terminated</option>
												</select>
											</div>
										</div><br>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-primary" name="submit">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
											
										</div>
									</footer>
								</section>
							</form>

						</div>

					</div>

					<!-- end: page -->
				</section>
			</div>
			
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/forms/examples.validation.js"></script>
	</body>
</html>