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
						<h2>Purchase Transaction</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Client</span></li>
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
											$purchase_id=$_GET['purchase_id']; 
											$sql = mysql_query("SELECT * FROM billing_purchase WHERE purchase_id='$purchase_id'") or die(mysql_error());
											while($row = mysql_fetch_object($sql))
											{
												print '<h2 class="panel-title">Purchase ID:&nbsp'.$row->purchase_id.'</h2>';
										?>
									</header>
									<div class="panel-body">

										<div class="form-group">
										<label class="col-sm-3"><b>Purchase Date</b></label>
											<div class="col-sm-9">
												<?php print '<p>'.$row->purchase_date.'</p>';?>
											</div>
										</div>
										<div class="form-group">
										<label class="col-sm-3"><b>Vendor Name</b></label>
											<div class="col-sm-9">
												<?php print '<p>'.$row->vendor_name.'</p>';?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3"><b>Purchased By</b></label>
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
										                        $sql = mysql_query("SELECT *, sum(item_price * item_quantity) AS totalpurchase, sum(purchase_paid * item_quantity) AS totalpurchase2 FROM billing_purchase_transaction WHERE purchase_id='$purchase_id' GROUP BY product_name") or die(mysql_error());
										                            while($row = mysql_fetch_object($sql))
										                        {
										                            print '<tr class="gradeA">';
										                            print '<td>'.$row->pt_id.'</td>';
										                            print '<td>'.$row->product_name.'</td>';
										                            print '<td>'.$row->item_price.' '.$row->purchase_paid.'</td>';
										                           	print '<td>'.$row->item_quantity.'</td>';
										                            print '<td>'.$row->totalpurchase.'|'.$row->totalpurchase2.'</td>';
										                            print '</tr>';
										                        }
										                    ?>
										                    <tr class="gradeA">
										                    	<td>&nbsp;</td>
										                    	<td>&nbsp;</td>
										                    	<td>&nbsp;</td>
										                    	<td><b>Total</b></td>
										                    	<td><b><?php
										                        $sql = mysql_query("SELECT sum(item_price * item_quantity) sumtotal,  sum(purchase_paid*item_quantity) AS sumtotal1 FROM billing_purchase_transaction WHERE purchase_id='$purchase_id'") or die(mysql_error());
										                            while($row = mysql_fetch_object($sql))
										                        {
										                            print 'Nrs.&nbsp'.$row->sumtotal.'|'.$row->sumtotal1.'';
										                            
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