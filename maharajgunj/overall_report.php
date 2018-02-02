<?php 
session_start();
include('common/connect.php');
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

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
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
						<div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">

								<div class="col-md-12 col-lg-12 col-xl-6">

								<?php  

	                                    	$user_name=$_SESSION["systemadmin"]; 
		                                    $sql = mysql_query("SELECT * FROM billing_user_access WHERE user_name='$user_name'") or die(mysql_error());
		                                              
		                                    while($row = mysql_fetch_object($sql))
		                                    {
                                		?>
                                	
								 </div><p>&nbsp;</p>
                                <?php
                                    if($row->dashboard_total_invoice)
                                        {?>

                                	<div class="col-md-12 col-lg-6 col-xl-6">
											<section class="panel panel-featured-left panel-featured-primary">
												<div class="panel-body">
													<div class="widget-summary">
														<div class="widget-summary-col widget-summary-col-icon">
															<div class="summary-icon bg-primary">
																<i class="fa fa-line-chart"></i>
															</div>
														</div>
														<div class="widget-summary-col">
															<div class="summary">
																<h4 class="title">&nbsp;</h4>
																<div class="info">
																	<strong class="amount">Total Invoices</strong>
																	<span class="text-primary">
																	( <?php
		                        									include 'common/countsql.php';
																	$result = mysql_query("SELECT * FROM billing_sales", $link);
																	$num_rows = mysql_num_rows($result);
																	echo "$num_rows \n";
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
                                    if($row->dashboard_total_sales)
                                        {?>
										<div class="col-md-12 col-lg-6 col-xl-6">
											<section class="panel panel-featured-left panel-featured-primary">
												<div class="panel-body">
													<div class="widget-summary">
														<div class="widget-summary-col widget-summary-col-icon">
															<div class="summary-icon bg-primary">
																<i class="fa fa-money" aria-hidden="true"></i>
															</div>
														</div>
														<div class="widget-summary-col">
															<div class="summary">
																<h4 class="title">&nbsp;</h4>
																<div class="info">
																	<strong class="amount">Total Sales</strong>
																	<span class="text-primary">
																	( <?php $sql = mysql_query("SELECT sum(product_price*billing_qty) as gtotal
		                                                     			FROM billing_sales_order") or die(mysql_error());
														                while($row = mysql_fetch_object($sql))
														                {
														                	print '<td>'.$row->gtotal.'</td>';
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
					<div class="row">
								
							<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>
						
										<h2 class="panel-title">Service Vs. Product</h2>
										<p class="panel-subtitle">Report</p>
									</header>
									<div class="panel-body">
						
										<div class="chart chart-md" id="flotPie"></div>
										<script type="text/javascript">
						
											var flotPieData = [{
												label: "Product Sales",
												data: [
													[1,
													<?php 
														$sql = mysql_query("SELECT sum(product_price*billing_qty) AS PRO FROM billing_sales_order WHERE category_name='Product'") or die(mysql_error());
										                while($row = mysql_fetch_object($sql))
			                                                    { 
			                                                        print ''.$row->PRO.'';
			                                                    }
			                                        ?> 

													]
												],
												color: '#0088cc'
											}, {
												label: "Service Sales",
												data: [
													[1, <?php 
														$sql = mysql_query("SELECT sum(product_price*billing_qty) AS SER FROM billing_sales_order WHERE category_name='Service'") or die(mysql_error());
										                while($row = mysql_fetch_object($sql))
			                                                    { 
			                                                        print ''.$row->SER.'';
			                                                    }
			                                        ?> ]
												],
												color: '#2baab1'
											}, {
												label: "Series 3",
												data: [
													[1, 0]
												],
												color: '#734ba9'
											}, {
												label: "Series 4",
												data: [
													[1, 0]
												],
												color: '#E36159'
											}];
						
										</script>
						
									</div>
								</section>
							</div>
							<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>
						
										<h2 class="panel-title">Card Vs. Cash</h2>
										<p class="panel-subtitle">Cash</p>
									</header>
									<div class="panel-body">
						
										<div class="chart chart-md" id="flotPie1"></div>
										<script type="text/javascript">
						
											var flotPieData1 = [{
												label: "Cash Sales",
												data: [
													[1, <?php 
														$sql = mysql_query("SELECT sum(sales_amount) AS CS FROM billing_sales WHERE payment_type='Cash'") or die(mysql_error());
										                while($row = mysql_fetch_object($sql))
			                                                    { 
			                                                        print ''.$row->CS.'';
			                                                    }
			                                        ?> ]
												],
												color: '#0088cc'
											}, {
												label: "Card Sales",
												data: [
													[1,<?php 
														$sql = mysql_query("SELECT sum(sales_amount) AS CR FROM billing_sales WHERE payment_type='Card'") or die(mysql_error());
										                while($row = mysql_fetch_object($sql))
			                                                    { 
			                                                        print ''.$row->CR.'';
			                                                    }
			                                        ?>]
												],
												color: '#2baab1'
											}, {
												label: "Series 3",
												data: [
													[1, 0]
												],
												color: '#734ba9'
											}, {
												label: "Series 4",
												data: [
													[1, 0]
												],
												color: '#E36159'
											}];
						
										</script>
						
									</div>
								</section>
							</div>
						</div>
					</div>
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
		<script src="assets/vendor/chartist/chartist.js"></script>
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

		<!-- Examples -->
		<style>
			#ChartistCSSAnimation .ct-series.ct-series-a .ct-line {
				fill: none;
				stroke-width: 4px;
				stroke-dasharray: 5px;
				-webkit-animation: dashoffset 1s linear infinite;
				-moz-animation: dashoffset 1s linear infinite;
				animation: dashoffset 1s linear infinite;
			}

			#ChartistCSSAnimation .ct-series.ct-series-b .ct-point {
				-webkit-animation: bouncing-stroke 0.5s ease infinite;
				-moz-animation: bouncing-stroke 0.5s ease infinite;
				animation: bouncing-stroke 0.5s ease infinite;
			}

			#ChartistCSSAnimation .ct-series.ct-series-b .ct-line {
				fill: none;
				stroke-width: 3px;
			}

			#ChartistCSSAnimation .ct-series.ct-series-c .ct-point {
				-webkit-animation: exploding-stroke 1s ease-out infinite;
				-moz-animation: exploding-stroke 1s ease-out infinite;
				animation: exploding-stroke 1s ease-out infinite;
			}

			#ChartistCSSAnimation .ct-series.ct-series-c .ct-line {
				fill: none;
				stroke-width: 2px;
				stroke-dasharray: 40px 3px;
			}

			@-webkit-keyframes dashoffset {
				0% {
					stroke-dashoffset: 0px;
				}

				100% {
					stroke-dashoffset: -20px;
				};
			}

			@-moz-keyframes dashoffset {
				0% {
					stroke-dashoffset: 0px;
				}

				100% {
					stroke-dashoffset: -20px;
				};
			}

			@keyframes dashoffset {
				0% {
					stroke-dashoffset: 0px;
				}

				100% {
					stroke-dashoffset: -20px;
				};
			}

			@-webkit-keyframes bouncing-stroke {
				0% {
					stroke-width: 5px;
				}

				50% {
					stroke-width: 10px;
				}

				100% {
					stroke-width: 5px;
				};
			}

			@-moz-keyframes bouncing-stroke {
				0% {
					stroke-width: 5px;
				}

				50% {
					stroke-width: 10px;
				}

				100% {
					stroke-width: 5px;
				};
			}

			@keyframes bouncing-stroke {
				0% {
					stroke-width: 5px;
				}

				50% {
					stroke-width: 10px;
				}

				100% {
					stroke-width: 5px;
				};
			}

			@-webkit-keyframes exploding-stroke {
				0% {
					stroke-width: 2px;
					opacity: 1;
				}

				100% {
					stroke-width: 20px;
					opacity: 0;
				};
			}

			@-moz-keyframes exploding-stroke {
				0% {
					stroke-width: 2px;
					opacity: 1;
				}

				100% {
					stroke-width: 20px;
					opacity: 0;
				};
			}

			@keyframes exploding-stroke {
				0% {
					stroke-width: 2px;
					opacity: 1;
				}

				100% {
					stroke-width: 20px;
					opacity: 0;
				};
			}
		</style>
		<script src="assets/javascripts/ui-elements/examples.charts.js"></script>
	</body>
</html>