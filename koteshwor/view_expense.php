<?php 
session_start();
include('common/connect.php');
if(isset($_SESSION["systemadmin"])=='')
header('location: index.php');
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
						<h2>View Expense</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Expense</span></li>
								<li><span>View Expense</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6">
							<form id="form" action="expense.php" class="form-horizontal" method="post">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										</div>

										<?php
											$expense_id=$_GET['expense_id']; 
											$sql = mysql_query("SELECT * FROM billing_expense WHERE expense_id='$expense_id'") or die(mysql_error());
											while($row = mysql_fetch_object($sql))
											{
												
										?>
									</header>
									<div class="panel-body">

										<div class="form-group">
											<label class="col-md-4 control-label">Expense Category</label>
											<div class="col-md-8">
												<div class="input-group">
													<input type="text" name="expense_category" class="form-control" readonly="" value="<?php print ''.$row->expense_category.'';?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Transaction Name</label>
											<div class="col-sm-8">
												<input type="text" name="expense_transaction" class="form-control" readonly="" value="<?php print ''.$row->expense_transaction.'';?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Transaction By</label>
											<div class="col-sm-8">
												<input type="text" name="user_name" class="form-control" readonly="" value="<?php print ''.$row->user_name.'';?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Amount</label>
											<div class="col-sm-8">
												<input type="text" name="expense_amount" class="form-control" readonly="" value="<?php print ''.$row->expense_amount.'';?>">
											</div>
										</div>
									</div>
									
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button name="submit" class="btn btn-primary">Back</button>
												<button type="reset" class="btn btn-default">Reset</button>
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