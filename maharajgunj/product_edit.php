<?php 
session_start();
include('common/connect.php');
if(isset($_SESSION["systemadmin"])=='')
header('location: login.php');

if(isset($_POST['submit1']))
{
  $product_id=$_GET['product_id'];
  $product_price=$_POST['product_price'];
  $product_editable=$_POST['product_editable'];
  $sql1 = "UPDATE helloworld.billing_product SET product_price='$product_price', product_editable='$product_editable' WHERE product_id='$product_id' ";
  mysql_query($sql1);
  header("Location: product.php"); exit;

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
					include('sidebar.php')
				?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">

					<?php
						$product_id=$_GET['product_id']; 
						$sql = mysql_query("SELECT * FROM helloworld.billing_product WHERE product_id='$product_id'") or die(mysql_error());
							while($row = mysql_fetch_object($sql))
							{
								
					?>
					<header class="page-header">
						<h2><?php print ''.$row->product_name.''; ?></h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><?php print ''.$row->product_name.''; ?></span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<?php } ?>

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
											$product_id=$_GET['product_id']; 
											$sql = mysql_query("SELECT * FROM helloworld.billing_product WHERE product_id='$product_id'") or die(mysql_error());
											while($row = mysql_fetch_object($sql))
											{
												print '<h2 class="panel-title">'.$row->product_name.'</h2>';
										?>
									</header>
									<div class="panel-body">
										
										<div class="form-group">
											<label class="col-sm-4 control-label">Product name <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="product_name" readonly class="form-control" value="<?php print ''.$row->product_name.''; ?>"  />
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-4 control-label">Product Price <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="product_price" class="form-control" value="<?php print ''.$row->product_price.''; ?>"  />
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-4 control-label">Editable</label>
											<div class="col-sm-8">
												<select class="form-control" name="product_editable">
													<option value="<?php print ''.$row->product_editable.''; ?>"><?php print ''.$row->product_editable.''; ?></option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
										</div><br>
									</div>
									<?php } ?>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button type="submit" name="submit1" class="btn btn-primary">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</footer>
								</section>
							</form>
							
						</div>
					</div>
					<!-- end: page -->
				</section>
			</div>
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