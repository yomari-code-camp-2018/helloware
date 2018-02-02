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
						<h2>View Employee</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>View Employee</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6">
										<?php
											$employee_id=$_GET['employee_id'];
											$sql = mysql_query("SELECT * FROM billing_employee WHERE employee_id='$employee_id' Limit 1") or die(mysql_error());
											while($row = mysql_fetch_object($sql))
											{
												
										?>
							<form id="form" action="employee.php" class="form-horizontal" method="POST">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>

										<h2 class="panel-title">View Employee</h2>
										<p class="panel-subtitle">
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-md-3 control-label">First Name <span></span></label>
											<div class="col-md-7">
												<label class="col-md-5 control-label" style="text-align: left;"><?php print ''.$row->employee_first_name.''; ?><span></span></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Last Name <span></span></label>
											<div class="col-md-7">
												<label class="col-md-5 control-label" style="text-align: left;"><?php print ''.$row->employee_last_name.''; ?><span></span></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Address<span></span></label>
											<div class="col-md-7">
												<label class="col-md-5 control-label" style="text-align: left;"><?php print ''.$row->employee_address.''; ?><span></span></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Contact<span></span></label>
											<div class="col-md-7">
												<label class="col-md-5 control-label" style="text-align: left;"><?php print ''.$row->employee_contact.''; ?><span></span></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Designation<span></span></label>
											<div class="col-md-7">
												<label class="col-md-5 control-label" style="text-align: left;"><?php print ''.$row->employee_designation.''; ?><span></span></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Joined Date</label>
											<div class="col-md-7">
												<label class="col-md-9 control-label" style="text-align: left;"><?php print ''.$row->employee_add_date.''; ?><span></span></label>
											</div>
										</div>

									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-primary" name="submit">Go Back</button>
											</div>
										</div>
									</footer>
								</section>
							</form>
							<?php } ?>
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