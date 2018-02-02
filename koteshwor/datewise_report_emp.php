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
		<!--Link Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

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
						<h2>Sales Report</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Report</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<p>&nbsp;</p>
							<div class="col-md-12 col-lg-12">
								<div class="tabs">
									<ul class="nav nav-tabs tabs-primary">
										<li class="active">
											<a href="#cash" data-toggle="tab">Select Date For Report</a>
										</li>
									</ul>
									<div class="tab-content col-md-6">
										<div id="cash" class="tab-pane active">
										
											<form class="form-horizontal" action="datewise_report_emp.php?billing_date=<?php
										                    	$sql = mysql_query("SELECT billing_date FROM billing_sales_order LIMIT 1");
										                      	while ($opt = mysql_fetch_object($sql))
										                        { 
										                         print''.$opt->billing_date.'';
										                        } 
										                    ?>" method="get">

												<p>
												<select class="form-control" name="billing_date" required>
														<option value="" selected disabled>Select Date</option>
														<?php 
										                    	$option = mysql_query("SELECT * FROM billing_sales_order GROUP BY billing_date");
										                      	while ($opt = mysql_fetch_object($option))
										                        { 
										                         echo '<option value="'.$opt->billing_date.'">'.$opt->billing_date.'</option>';
										                        } 
										                    ?>
												</select>
												</p>
						                      	<div class="submit-text">
						                          <input type="submit" name="search" class="btn btn-primary btn-mini" value="Search Collection">
						                        </div>
											</form>

											<div class="clearfix"> </div>
										</div>
									</div>
								</div>
							</div>
							<p>&nbsp;</p>
							<div class="col-md-12 col-lg-12">
								<div class="tabs">

									<div class="panel-body col-md-12">
										<table class="table table-bordered table-striped mb-none" id="datatable-editable">
											<thead>
												<tr>
													<th>S.N</th>
													<th>Employee Name</th>
													<th>Total Service</th>
													<th>Percentage Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php
												    $billing_date=$_GET['billing_date'];
									                $sql = mysql_query("SELECT service_by, sum(product_price*billing_qty)AS total_service, sum(product_price*billing_qty)*0.015 AS percentage FROM billing_sales_order WHERE billing_date='$billing_date' GROUP BY service_by;") or die(mysql_error());
									                $counter=0;
												    while($row = mysql_fetch_object($sql))
												    {
														print '<tr class="gradeA">';
														print '<td>'.++$counter.'</td>';
													   	print '<td>'.$row->service_by.'</td>';
													   	print '<td>'.$row->total_service.'</td>';
													   	print '<td>'.$row->percentage.'</td>';
													   	print '</tr>';
												    }
												?>
											</tbody>
										</table>
									</div>		
								</div>
								</div>
							
											<!-- end: page -->
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
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.editable.js"></script>
	</body>
</html>