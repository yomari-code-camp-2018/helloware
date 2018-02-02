<?php 
include('connect.php');
session_start();
if(isset($_SESSION["systemadmin"])=='')
header('location: index.php');

if(isset($_POST['submit']))
{
  $employee_id=$_GET['employee_id'];
  $employee_contact = $_POST['employee_contact'];
  $employee_designation = $_POST['employee_designation'];
  $status = $_POST['status'];
  
  $sql = "UPDATE billing_employee SET employee_contact='$employee_contact', employee_designation='$employee_designation', status='$status' WHERE employee_id=$employee_id ";
  mysql_query($sql);
  echo mysql_error();
  
  header("Location: employee.php"); exit;

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
			  include 'header.php';
			?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php 
				  include 'sidebar.php';
				?>	
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Employee</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Employee</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">

						<div class="col-md-6">
							<form id="form" action="" class="form-horizontal" method="post">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										</div>

										<?php
											$employee_id=$_GET['employee_id']; 
											$sql = mysql_query("SELECT * FROM billing_employee WHERE employee_id='$employee_id'") or die(mysql_error());
											while($row = mysql_fetch_object($sql))
											{
												print '<h2 class="panel-title">View '.$row->employee_first_name.'&nbsp'.$row->employee_last_name.' Profile</h2>';
										?>
									</header>
									<div class="panel-body">
										<div class="form-group">
										<label class="col-sm-5"><b>Employee Name</b></label>
											<div class="col-sm-7">
												<?php print '<p>'.$row->employee_first_name.'&nbsp'.$row->employee_last_name.'</p>';?>
											</div>
										</div>
										<div class="form-group">
										<label class="col-sm-5"><b>Employee Phone</b></label>
											<div class="col-sm-7">
												<?php print '<p>'.$row->employee_contact.'</p>';?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-5"><b>Designation</b></label>
											<div class="col-sm-7">
												<?php print '<p>'.$row->employee_designation.'</p>';?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-5"><b>Employee Joined</b></label>
											<div class="col-sm-7">
												<?php print '<p>'.$row->employee_joined.'</p>';?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-5"><b>Status</b></label>
											<div class="col-sm-7">
												<?php print '<p>'.$row->status.'</p>';?>
											</div>
										</div>
									</div>
									<?php } ?>
								</section>
							</form>
						</div>
						<div class="col-md-6">
							<form id="form" action="" class="form-horizontal" method="post">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										</div>
										<?php
											$employee_id=$_GET['employee_id']; 
											$sql = mysql_query("SELECT * FROM billing_employee WHERE employee_id='$employee_id'") or die(mysql_error());
											while($row = mysql_fetch_object($sql))
											{
												print '<h2 class="panel-title">Edit '.$row->employee_first_name.'&nbsp'.$row->employee_first_name.' Profile</h2>';
											?>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-5 control-label">Employee Contact <span class="required">*</span></label>
											<div class="col-sm-7">
												<input type="text" name="employee_contact" class="form-control" value="<?php print ''.$row->employee_contact.''; ?>" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-5 control-label">Employee Designation<span class="required">*</span></label>
											<div class="col-sm-7">
												<input type="text" name="employee_designation" class="form-control" value="<?php print ''.$row->employee_designation.''; ?>"/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-5 control-label">Status<span class="required">*</span></label>
											<div class="col-sm-7">
												<select class="col-md-4 form-control" name="status">
													<option style="background-color: #CCC;" value="<?php print ''.$row->status.''; ?>"><?php print ''.$row->status.''; ?></option>
													<option value="Terminated">Terminated</option>
													<option value="Working">Working</option>
												</select>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-md-6 col-sm-offset-3">
												<button name="submit" class="btn btn-primary">Submit</button>
											</div>
										</div>
									</footer>
									<?php } ?>
								</section>
							</form>
						</div>
					</div>
					<!-- end: page -->
				</section>
			</div>

			<?php 
			  include 'calendar_task.php';
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