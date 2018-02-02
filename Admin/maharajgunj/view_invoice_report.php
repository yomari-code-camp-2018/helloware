<?php 
include('../connect.php');
session_start();
if(isset($_SESSION["systemadmin"])=='')
header('location: index.php');

if(isset($_POST['submit']))
{
  $billing_date=$_GET['billing_date'];
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
			  include '../header.php';
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
						<h2>Invoice Report</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Sales Report</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<?php
						$sales_id=$_GET['sales_id']; 
						$sql = mysql_query("SELECT * FROM helloworld_maharajgunj.billing_sales_order WHERE sales_id='$sales_id' LIMIT 1") or die(mysql_error());
							while($row = mysql_fetch_object($sql))
						{
													
					?>
					<?php } ?>
					<div class="col-md-6">
							<section class="panel">
							<header class="panel-heading">
								<h2 class="panel-title">INVOICE NO: <?php
								                $sql = mysql_query("SELECT sales_id FROM helloworld_maharajgunj.billing_sales WHERE sales_id='$sales_id' ") or die(mysql_error());
								                while($row = mysql_fetch_object($sql))
								                {
								               
								               		print ''.$row->sales_id.'';
												}
											?></h2>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-12">
										<h6></h6>
									</div>
								 <table class="table table-bordered table-striped table-condensed mb-none">
									<thead>
										<tr>
											<th>S.N</th>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php  
										$user_name=$_SESSION["systemadmin"]; 
	                                    $sql = mysql_query("SELECT * FROM helloworld_maharajgunj.billing_user_access WHERE user_name='$user_name'") or die(mysql_error());
	                                              
	                                    while($row = mysql_fetch_object($sql))
	                                    {
                                	?>

	                                	<?php
											$sql = mysql_query("SELECT *, sum(billing_qty) as qty_total, sum(billing_qty*product_price) as per_total FROM helloworld_maharajgunj.billing_sales_order WHERE sales_id='$sales_id' GROUP BY product_name") or die(mysql_error());
							                $counter=0;
							                while($row = mysql_fetch_object($sql))
							                {
							                	print '<tr>';
							                	print '<td>'.++$counter.'</td>';
							                	print '<td>'.$row->product_name.'</td>';
							                	print '<td>'.$row->per_total.'</td>';
							                	print '<td>'.$row->qty_total.'</td>';
									            print '<td class="actions">Action not found</td>';
							                	print '</tr>';
							                }
						            	?>
	                               		<?php } ?>
										<?php 
			                                $sql = mysql_query("SELECT sales_id, sum(product_price) AS gtotal FROM helloworld_maharajgunj.billing_sales_order WHERE sales_id='$sales_id'") or die(mysql_error());
												while($row = mysql_fetch_object($sql))
			                                {
					                            print'<tr>';
												print'<th></th>';
												print'<td><strong>Total</strong></td>';
												print'<th>'.$row->gtotal.'</th>';
												print'<th></th>';
												print'<td></td>';
												print'</tr>';
											}
										?>
	                               	<?php 
			                            $sql = mysql_query("SELECT discount_rate FROM helloworld_maharajgunj.billing_sales WHERE sales_id='$sales_id'") or die(mysql_error());
												while($row = mysql_fetch_object($sql))
			                                {
					                            print'<tr>';
												print'<th></th>';
												print'<td><strong>Discount</strong></td>';
												print'<th>'.$row->discount_rate.'</th>';
												print'<th></th>';
												print'<td></td>';
												print'</tr>';
											}
									?>
										</form>

									</tbody>
								</table><br>
										<?php
											$sql = mysql_query("SELECT *,cast(sum(product_price)-(SELECT discount_rate FROM helloworld_maharajgunj.billing_sales WHERE sales_id='$sales_id') AS decimal(18,2)) AS discountprice FROM helloworld_maharajgunj.billing_sales_order WHERE sales_id='$sales_id'") or die(mysql_error());
								                while($row = mysql_fetch_object($sql))
								                {
								               
								               print '<a href="sales_checkout.php?sales_id='.$row->sales_id.'" target="_blank" ><button class="btn btn-success" style="float: right;">Total. '.$row->discountprice.'</button></a>'; 

								               }
										?>

										</div>
							</div>
						</section>
					</div>
						<div class="clearfix"></div>

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