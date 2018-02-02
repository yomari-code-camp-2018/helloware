<?php 
include('connect.php');
session_start();
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
						<h2>Sales Transaction</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Sales Summary</span></li>
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
											$sales_id=$_GET['sales_id']; 
											$sql = mysql_query("SELECT * FROM billing_sales WHERE sales_id='$sales_id'") or die(mysql_error());
											while($row = mysql_fetch_object($sql))
											{
												print '<h2 class="panel-title">Sales ID:&nbsp'.$row->sales_id.'</h2>';
										?>
									</header>
									<div class="panel-body">

										<div class="form-group">
										<label class="col-sm-3"><b>Sales Date</b></label>
											<div class="col-sm-9">
												<?php print '<p>'.$row->sales_date.'</p>';?>
											</div>
										</div>
										<div class="form-group">
										<label class="col-sm-3"><b>Costumer Name</b></label>
											<div class="col-sm-9">
												<?php print '<p>'.$row->client_name.'</p>';?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3"><b>Sold By</b></label>
											<div class="col-sm-9">
												<?php print '<p>'.$row->user_name.'</p>';?>
											</div>
										</div>
										<?php } ?>

												<div class="table-responsive">
										            <table class="table table-hover mb-none">
										                <thead>
										                    <tr>
										                        <th>Transaction ID</th>
										                        <th>Item Name</th>
										                        <th>Item Price</th>
										                        <th>Item Quantity</th>
										                        <th>Total</th>
										                    </tr>
										                </thead>
										                <tbody>
										                    <?php
										                        $sql = mysql_query("SELECT *, item_price * item_quantity AS totalpurchase FROM billing_sales_transaction WHERE sales_id='$sales_id'") or die(mysql_error());
										                            while($row = mysql_fetch_object($sql))
										                        {
										                            print '<tr class="gradeA">';
										                            print '<td>'.$row->st_id.'</td>';
										                            print '<td>'.$row->product_name.'</td>';
										                            print '<td>'.$row->item_price.'</td>';
										                            print '<td>'.$row->item_quantity.'</td>';
										                            print '<td>'.$row->totalpurchase.'</td>';
										                            print '</tr>';
										                        }
										                    ?>
										                    <tr class="gradeA">
										                    	<td>&nbsp;</td>
										                    	<td>&nbsp;</td>
										                    	<td>&nbsp;</td>
										                  		<td><b>Total</b></td>
										                    	<td><b><?php
										                        $sql = mysql_query("SELECT sum(item_price * item_quantity) sumtotal FROM billing_sales_transaction WHERE sales_id='$sales_id'") or die(mysql_error());
										                            while($row = mysql_fetch_object($sql))
										                        {
										                            print 'Nrs.&nbsp'.$row->sumtotal.'';
										                            
										                        }
										                    ?></b></td>
										                    </tr>
										                </tbody>

					                    			</table>
				                    			</div>
				                    			<a href="pages-invoice-print.html" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
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