<?php 
session_start();
include('common/connect.php');
if(isset($_SESSION["systemadmin"])=='')
header('location: index.php');

if(isset($_POST['submit']))
{
  $purchase_id=$_GET['purchase_id'];
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
						<h2>Invoice Transaction</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Invoice Report</span></li>
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
											$invoice_number=$_GET['invoice']; 
											$sql = mysql_query("SELECT * FROM sales_order WHERE invoice='$invoice_number'") or die(mysql_error());
											while($row = mysql_fetch_object($sql))
											{
												print '<h2 class="panel-title">Invoice:&nbsp'.$row->invoice.'</h2>';
										?>
									</header>
									<div class="panel-body">
										<?php } ?>
												<div class="table-responsive">
										            <table class="table table-hover mb-none">
										                <thead>
										                    <tr>
										                        <th>S.N</th>
										                        <th>Product Name</th>
										                        <th>Product Price</th>
										                        <th>Qty</th>
										                        <th>Amount</th>
										                    </tr>
										                </thead>
										                <tbody>
										                    <?php
										                     $sql = mysql_query("SELECT * FROM sales_order WHERE invoice='$invoice_number'") or die(mysql_error());
										                        $counter = 0;
										                          while($row = mysql_fetch_object($sql))
										                        {
										                            print '<tr class="gradeA">';
										                            print '<td>'.++$counter.'</td>';
										                            print '<td>'.$row->product_code.'</td>';
										                           	print '<td>'.$row->price.'</td>';
										                           	print '<td>'.$row->qty.'</td>';
										                           	print '<td>'.$row->amount.'</td>';
										                            print '</tr>';
										                        }
										                    ?>
										                    <tr class="gradeA">
										                    	<td>&nbsp;</td>
										                    	<td>&nbsp;</td>
										                    	<td>&nbsp;</td>
										                    	<td>Total</td>
										                    	<td><b><?php
										                        $sql = mysql_query("SELECT sum(amount) AS sumtotal FROM sales_order WHERE invoice='$invoice_number'") or die(mysql_error());
										                            while($row = mysql_fetch_object($sql))
										                        {
										                            print ''.$row->sumtotal.'';
										                            
										                        }
										                    ?></b></td>
										                    </tr>
										                </tbody>
					                    			</table>
				                    			</div>
									</div>
								</section>
							</form>
						</div>
					</div>
						<div class="clearfix"></div>

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