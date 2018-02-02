<?php 
session_start();
include('connect.php');
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
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />
		<link rel="stylesheet" href="assets/vendor/chartist/chartist.css" />

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
					include('sidebar.php');
				?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								<div class="col-md-12 col-lg-12 col-xl-6">
									<div id="ExampleLoadMorePrependTarget" class="panel-body" style="min-height: 50px;">
										<div style="font-size: 30px; text-align: center;"> Today's Branch Sales </div>
	                                </div>
                                </div><p>&nbsp;</p>
                                	<?php  

                                    	$user_name=$_SESSION["systemadmin"]; 
	                                    $sql = mysql_query("SELECT * FROM billing_user_access WHERE user_name='$user_name'") or die(mysql_error());
	                                              
	                                    while($row = mysql_fetch_object($sql))
	                                    {
                                	?>
                                	<?php
	                                    if($row->dashboard_koteshwor)
	                                        {?>
		                                <div class="col-md-6 col-lg-4 col-xl-4">
											<section class="panel panel-featured-left panel-featured-tertiary">
												<div class="panel-body">
													<div class="widget-summary">
														<div class="widget-summary-col widget-summary-col-icon">
															<div class="summary-icon bg-tertiary">
																<i class="fa fa-money" aria-hidden="true"></i>
															</div>
														</div>
														<div class="widget-summary-col">
															<div class="summary">
																<h4 class="title">&nbsp;</h4>
																<div class="info">
																	<strong class="amount">KTR</strong>
																	<span class="text-primary">
																	(<?php
		                                                                       		$sql1 = mysql_query("SELECT sum(sales_amount) AS totalcash FROM helloworld_koteshwor.billing_sales WHERE billing_date = CURDATE() AND sales_type=''") or die(mysql_error());
																					     while($row1 = mysql_fetch_object($sql1))
																					    {
																					       	print '<td>Nrs.'.$row1->totalcash.'</td>';
																				    	}
																			 	?>)
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</section>
										</div>
									<?php }
		                                    else
		                                        {
		                                        }
		                                ?>
	                            	<?php
	                                    if($row->dashboard_maharajgunj)
	                                        {?>
										<div class="col-md-4 col-lg-4 col-xl-4">
											<section class="panel panel-featured-left panel-featured-tertiary">
												<div class="panel-body">
													<div class="widget-summary">
														<div class="widget-summary-col widget-summary-col-icon">
															<div class="summary-icon bg-tertiary">
																<i class="fa fa-money" aria-hidden="true"></i>
															</div>
														</div>
														<div class="widget-summary-col">
															<div class="summary">
																<h4 class="title">&nbsp;</h4>
																<div class="info">
																	<strong class="amount">MHJ</strong>
																	<span class="text-primary">
																	( <?php
		                                                                       		$sql2 = mysql_query("SELECT sum(sales_amount) AS totalcash FROM helloworld_maharajgunj.billing_sales WHERE billing_date = CURDATE() AND sales_type=''") or die(mysql_error());
																					     while($row2 = mysql_fetch_object($sql2))
																					    {
																					       	print '<td>Nrs.'.$row2->totalcash.'</td>';
																				    	}
																			 	?>)
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</section>
										</div>
									<?php }
		                                    else
		                                        {
		                                        }
		                                ?>
		                            <?php } ?>
							</div>
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
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="assets/vendor/flot/jquery.flot.js"></script>
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="assets/vendor/raphael/raphael.js"></script>
		<script src="assets/vendor/morris/morris.js"></script>
		<script src="assets/vendor/gauge/gauge.js"></script>
		<script src="assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
		<script src="assets/javascripts/ui-elements/examples.charts.js"></script>
	</body>
</html>