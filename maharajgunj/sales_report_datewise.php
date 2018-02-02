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
						<h2>Sales Report Datewise</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Sales Report Datewise</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<p>&nbsp;</p>
						<div class="col-md-12 col-lg-12 col-xl-4">
							<h5 class="text-weight-semibold text-dark text-uppercase mb-md mt-lg"><h2 class="panel-title"><?php
													$billing_date=$_GET['billing_date']; 
													$sql = mysql_query("SELECT * FROM billing_sales WHERE billing_date='$billing_date' LIMIT 1") or die(mysql_error());
													while($row = mysql_fetch_object($sql))
													{
														print '<h2 class="panel-title">'.$row->billing_date.'</h2>';
													}
												?></h2></h5>
												&nbsp
								<div class="row">
									<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-life-ring"></i>
														</div>
													</div>
														<div class="widget-summary-col">
															<div class="summary">
																<h4 class="title">Cash Sales</h4>
																<div class="info">
																		
																	<strong class="amount">
																		<?php
                                                                       		$sql = mysql_query("SELECT sum(sales_amount) AS totalcash FROM billing_sales WHERE billing_date = '$billing_date' AND payment_type='Cash' AND sales_type=''") or die(mysql_error());
																			     while($row = mysql_fetch_object($sql))
																			    {
																			       	print '<td>'.$row->totalcash.'</td>';
																		    	}
																	 	?>
																	</strong>
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-uppercase">(view all)</a>
															</div>
														</div>
													</div>
												</div>
											</section>
										</div>
										<div class="col-md-6 col-xl-12">
											<section class="panel">
												<div class="panel-body bg-secondary">
													<div class="widget-summary">
														<div class="widget-summary-col widget-summary-col-icon">
															<div class="summary-icon">
																<i class="fa fa-life-ring"></i>
															</div>
														</div>
														<div class="widget-summary-col">
															<div class="summary">
																<h4 class="title">Card Sales</h4>
																<div class="info">
																	<strong class="amount"><?php
                                                                       		$sql = mysql_query("SELECT sum(sales_amount) AS totalcard FROM billing_sales WHERE billing_date = '$billing_date' AND payment_type='Card' AND sales_type=''") or die(mysql_error());
																			     while($row = mysql_fetch_object($sql))
																			    {
																			       	print '<td>'.$row->totalcard.'</td>';
																		    	}
																	 	?></strong>
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-uppercase">(view all)</a>
															</div>
														</div>
													</div>
												</div>
											</section>
										</div>
										<div class="col-md-6 col-xl-12">
											<section class="panel">
												<div class="panel-body bg-tertiary">
													<div class="widget-summary">
														<div class="widget-summary-col widget-summary-col-icon">
															<div class="summary-icon">
																<i class="fa fa-life-ring"></i>
															</div>
														</div>
														<div class="widget-summary-col">
															<div class="summary">
																<h4 class="title">Total Expenses</h4>
																<div class="info">
																	<strong class="amount"><?php
                                                                       		$sql = mysql_query("SELECT IFNULL(sum(expense_amount), 0) AS totalexpense FROM billing_expense WHERE expense_date='$billing_date'") or die(mysql_error());
																			     while($row = mysql_fetch_object($sql))
																			    {
																			       	print '<td>'.$row->totalexpense.'</td>';
																		    	
																	 	?></strong>
																</div>
															</div>
															<div class="summary-footer">
																<a href="expense_report.php?expense_date='.$row->expense_date.'" class="text-uppercase">(Click Here)</a>
															</div>
															<?php } ?>
														</div>
													</div>
												</div>
											</section>
										</div>
										<div class="col-md-6 col-xl-12">
											<section class="panel">
												<div class="panel-body bg-quartenary">
													<div class="widget-summary">
														<div class="widget-summary-col widget-summary-col-icon">
															<div class="summary-icon">
																<i class="fa fa-life-ring"></i>
															</div>
														</div>
														<div class="widget-summary-col">
															<div class="summary">
																<h4 class="title">Cash On Hand</h4>
																<div class="info">
																	<strong class="amount"><?php
                                                                       		$sql = mysql_query("SELECT sum((SELECT IFNULL(sum(sales_amount), 0) FROM billing_sales WHERE billing_date = '$billing_date' AND payment_type='Cash' AND sales_type='')-(SELECT IFNULL(sum(expense_amount), 0) FROM billing_expense WHERE expense_date = '$billing_date')) AS coh") or die(mysql_error());
																			     while($row = mysql_fetch_object($sql))
																			    {
																			       	print '<td>'.$row->coh.'</td>';
																		    	}
																	 	?> </strong>
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-uppercase">(view all)</a>
															</div>
														</div>
													</div>
												</div>
											</section>
										</div>
											<div class="col-md-6 col-xl-12">
											<section class="panel">
												<div class="panel-body bg-tertiary">
													<div class="widget-summary">
														<div class="widget-summary-col widget-summary-col-icon">
															<div class="summary-icon">
																<i class="fa fa-life-ring"></i>
															</div>
														</div>
														<div class="widget-summary-col">
															<div class="summary">
																<h4 class="title">Complementary Sales</h4>
																<div class="info">
																	<strong class="amount"><?php
                                                                       		$sql = mysql_query("SELECT sum(sales_amount) AS totalcomp FROM billing_sales WHERE billing_date = '$billing_date' AND sales_type='Complimentary' AND payment_type=''") or die(mysql_error());
																			     while($row = mysql_fetch_object($sql))
																			    {
																			       	print '<td>'.$row->totalcomp.'</td>';
																		    	}
																	 	?></strong>
																</div>
															</div>
															<div class="summary-footer">
																<a class="text-uppercase">(view all)</a>
															</div>
														</div>
													</div>
												</div>
											</section>
										</div>
									</div>
									<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
										<form action="export_generate_collection.php" method="post" name="export_excel">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</form>
										</div>
												&nbsp
										<h2 class="panel-title"><?php
													$billing_date=$_GET['billing_date']; 
													$sql = mysql_query("SELECT sum(sales_amount) AS day_toral FROM billing_sales WHERE billing_date='$billing_date' AND sales_type=''") or die(mysql_error());
													while($row = mysql_fetch_object($sql))
													{
														print '<h2 class="panel-title" style="font-weight: bold;">Total Sales:&nbsp Nrs.'.$row->day_toral.'</h2>';
													}
												?></h2>	
									</header>
									<div class="panel-body">
										<table class="table table-bordered table-striped mb-none" id="datatable-editable">
											<thead>
												<tr>
													<th>Invoice No.-Service By-Type</th>
													<th>Client Name</th>
													<th>Sales Type</th>
													<th>Sales Amount</th>
												</tr>
											</thead>
											<tbody>
											<?php
											    $billing_date=$_GET['billing_date'];
							                    $sql="SELECT * FROM billing_sales WHERE billing_date='$billing_date' ORDER BY sales_id";
							                  $result =mysql_query($sql);
							                  echo mysql_error();
							                  while($row=mysql_fetch_object($result))
							                  		{
									                	print '<tr class="gradeA">';
											            print '<td><a href="view_invoice_report.php?sales_id='.$row->sales_id.'">Invoice-'.$row->sales_id.'-</a></td>';
											            print '<td>'.$row->member_name.'</td>';
											            print '<td>'.$row->sales_type.'|'.$row->payment_type.'</td>';
											            print '<td>'.$row->sales_amount.'</td>';
											            print '</tr>';
										            }
								                	?>						                	
											</tbody>
										</table>
									</div>
								</section>
								</div>
								<!--  -->
							
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