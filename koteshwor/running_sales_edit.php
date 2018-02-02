<?php 
session_start();
include('common/connect.php');
if(isset($_SESSION["systemadmin"])=='')
header('location: index.php');


if(isset($_POST['submit1']))
{
  $sales_id=$_GET['sales_id'];
  $terminate = $_POST['terminate'];
  $terminate_reason = $_POST['terminate_reason'];

  $sql = "UPDATE billing_sales SET terminate='$terminate', terminate_reason='$terminate_reason' WHERE sales_id='$sales_id'";
  	 	mysql_query($sql);
  		echo mysql_error();

  header("Location: sales_report.php"); exit;
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
								<li><span>Invoice Transaction</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
					<section class="panel">
							<header class="panel-heading">
								<h2 class="panel-title">Content</h2>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										
										
										<?php
		                                    $sales_id = $_GET['sales_id'];  
		                                    $sql = mysql_query("SELECT * FROM billing_sales WHERE sales_id='$sales_id'") or die(mysql_error());
		                                    while($row = mysql_fetch_object($sql))
		                                    {
		                                ?>
									<form method="POST" action="">
										<div class="form-group">
											<div class="col-sm-5">
												<label class="col-sm-4 control-label">Terminate</label>
												<select class="form-control" name="terminate" required="">
													<?php 
														if ($row->terminate) { ?>

														<option style="background-color: #CCC;" disabled value="<?php print ''.$row->terminate.''; ?>"><?php print ''.$row->terminate.''; ?></option>

													<?php	}
													else{ ?>

														<option style="background-color: #CCC;" value="No">No</option>


													<?php }
													?>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
		                                    </select>
											</div>
										</div><br>
										<div class="form-group">
											<div class="col-sm-8">
												<input type="text" name="terminate_reason" class="form-control" placeholder="eg.: Please enter reason" required/>
											</div>
										</div><br>
										
												<button class="btn btn-primary" name="submit1">Submit</button>
											
									</form>
										<?php } ?>
									</div>
								</div><br>
								<table class="table table-bordered table-striped table-condensed mb-none">
									<thead>
										<tr>
											<th>S.N</th>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
												<?php
									                $sql = mysql_query("SELECT *, sum(product_price*billing_qty) AS ttotal, sum(billing_qty) AS billing_qty from billing_sales_order where sales_id='$sales_id' group by product_name") or die(mysql_error());
									                $counter=0;
									                while($row = mysql_fetch_object($sql))
									                {
									                	print '<tr>';
									                	print '<td>'.++$counter.'</td>';
									                	print '<td>'.$row->product_name.'</td>';
									                	print '<td>'.$row->product_price.'</td>';
									                	print '<td>'.$row->billing_qty.'</td>';
									                	print '<td>'.$row->ttotal.'</td>';
									                	print '<td class="actions"><a href="admin_delete_sales_order.php?sales_order_id='.$row->sales_order_id.'&sales_id='.$row->sales_id.'" class="on-default" title="Delete"><i class="fa fa-trash-o" style="font-size: 20px;" aria-hidden="true"></i></a>
								                			</td>';
									                	print '</tr>';
									                }
									                
									            ?>
	                                </tbody>
								</table>
							</div>
						</section>
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