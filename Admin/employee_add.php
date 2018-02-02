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
		<!--Link Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png" />
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
						<h2>Add Employee</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Add Employee</span></li>
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
										$employee_first_name = $_POST['employee_first_name'];
										$employee_last_name = $_POST['employee_last_name'];
										$employee_address = ($_POST['employee_address']);
										$employee_contact = ($_POST['employee_contact']);
										$employee_designation = ($_POST['employee_designation']);
										$employee_joined = ($_POST['employee_joined']);

										$query = mysql_query("SELECT employee_first_name FROM billing_employee WHERE employee_first_name='$employee_first_name'");
											if (mysql_num_rows($query) != 0)
									            {
									        	echo '<center><p class="error" style="color:red;">Employee Name is already exits. Please <a href="employee.php">click</a> here.</p></center>';
									            }
									        else
									        	{

									            $result = mysql_query("INSERT INTO billing_employee (employee_first_name,employee_last_name,employee_address,employee_contact,employee_designation,employee_joined)
									            VALUES('$employee_first_name','$employee_last_name','$employee_address','$employee_contact','$employee_designation','$employee_joined')") or die(mysql_error());

									            if($result)
							                    echo '<p class="success" style="color:#FA1919;">Your Employee Successfully Entered. Please <a href="employee.php">click</a> here. </p>';
							                  else
							                    echo '<p class="error" style="color:#FA1919;">Error in Employee Enter.</p>';
									        	}
									     	exit;
									     	}
									?>
							<form id="form" action="" class="form-horizontal" method="POST">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>

										<h2 class="panel-title">Add Employee</h2>
										<p class="panel-subtitle">
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-5 control-label">First Name <span></span></label>
											<div class="col-sm-7">
												<input type="text" name="employee_first_name" class="form-control" placeholder="eg.: Employee First Name" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-5 control-label">Last Name <span></span></label>
											<div class="col-sm-7">
												<input type="text" name="employee_last_name" class="form-control" placeholder="eg.: Employee Last Name" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-5 control-label">Address<span></span></label>
											<div class="col-sm-7">
												<input type="text" name="employee_address" class="form-control" placeholder="eg.: Employee Address" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-5 control-label">Mobile Number<span></span></label>
											<div class="col-sm-7">
												<input type="text" name="employee_contact" class="form-control" placeholder="eg.: Employee Mobile Number" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-5 control-label">Designation<span></span></label>
											<div class="col-sm-7">
												<input type="text" name="employee_designation" class="form-control" placeholder="eg.: Employee Designation" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-5 control-label">Joined Date</label>
											<div class="col-md-7">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</span>
													<input type="text" name="employee_joined" data-plugin-datepicker data-plugin-options='{"format": "yyyy-mm-dd"}' class="form-control">
												</div>
											</div>
										</div>
										<!-- <div class="form-group">
											<label class="col-sm-3 control-label">Joined<span></span></label>
											<div class="col-sm-9">
												<input type="text" name="employee_joined" class="form-control" placeholder="Employee Joined Date" required/>
											</div>
										</div> -->
									</div>
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
			<?php
				include('calendar_task.php');
			?>
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