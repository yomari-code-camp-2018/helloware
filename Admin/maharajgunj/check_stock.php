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

		</script>
		<section class="body">

			<!-- start: header -->
			<?php
				include('../header.php');
			?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php
					include('../admin.php')
				?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Maharajgunj Stock</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li> <a href="#"><span>Stock Management</span></a></li>
								<li><a href="active"><span>Maharajgunj Stock</span></a></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

						<div class="row">
							<div class="">
								<div class="panel-body">
									<div class="col-md-12"> 
										<form id="form" action="" class="form-horizontal" method="post">
							               	<table class="table table-bordered table-striped mb-none" id="datatable-editable">
							               		<thead>
							               			<tr>
							               				<th rowspan="2">S.N</th>
							               				<th rowspan="2">Product Name</th>
							               				<th rowspan="2">Product Stock</th>
							               			</tr>
							               		</thead>
							               		<tbody>
							               			<?php
							               				$sql = mysql_query("SELECT product_name, sum(stock_in-stock_out)AS stock_avai from helloworld_maharajgunj.billing_stock GROUP BY product_name") or die(mysql_error());
							               				$counter=0;
							               				while($row = mysql_fetch_object($sql))
							                                {
							                                	print '<tr class="gradeA">';
							                                    print '<td>'.++$counter.'</td>';
							                                    print '<td>'.$row->product_name.'</td>';
							                                    print '<td>'.$row->stock_avai.'</td>';
							                                    print '</tr>';
							                                }
							                           ?>
							                    </tbody>
							                </table>
							            </form>
						        	</div>
						        </div>
						</div>
					</div>
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