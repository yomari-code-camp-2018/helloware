<?php 
include('../connect.php');
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
		<section class="body">

			<!-- start: header -->
			<?php
				include('../header.php');
			?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php
					include('../admin.php');
				?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Branch Control</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><a href="index.php"><span>Branch Control</span></a></li>
								<li class="active"><span>Branch</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="panel-action fa fa-refresh" ic-trigger-on="click" ic-prepend-from="/example-load-more" ic-target="#ExampleLoadMorePrependTarget"></a>
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
									</div>

									<h2 class="panel-title">Maharajgunj Branch</h2>
								</header>
								<div id="ExampleLoadMorePrependTarget" class="panel-body" style="min-height: 150px;">
									
                                	<div class="col-md-3">
                                    	<a href="usermanage_maharajgunj.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-lg btn-primary">User Control</button></a>
                                	</div>
                                	<div class="col-md-3">
                                    	<a href="todays_report.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-lg btn-primary">Sales Report</button></a>
                                	</div>
                                	<div class="col-md-3">
                                    	<a href="check_stock.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-lg btn-primary">Check Stock</button></a>
                                	</div>
                                	
								</div>
							</section>
						</div>
					</div>
					<!-- end: page -->
				</section>
			</div>
			<?php 
			  include '../calendar_task.php';
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
		<script src="assets/vendor/intercooler/intercooler-0.4.8.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-mockjax/jquery.mockjax.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

		<!--
			Examples - Actually there's just ajax mockups in the file below
			All mockups are for demo purposes only. You don't need to include this in your application.
		-->
		<script src="assets/javascripts/extra/examples.ajax.made.easy.js"></script>
	</body>
</html>