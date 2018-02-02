<?php 
include('common/connect.php');
session_start();
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
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		
	</head>

	<body>

		</script>
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
					<header class="page-header">
						<h2>Stock Transfer</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li> <a href="#"><span>Stock Management</span></a></li>
								<li><a href="#"><span>Check Out To Branch</span></a></li>
								<li><a href="Active"><span>Koteshwor</span></a></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6">
								<?php
									if(isset($_POST['submit']))
									            {
									      	
										$product_name  = $_POST['product_name'];
										$stock_out = $_POST['stock_out'];
										$user_name = $_POST['user_name'];
										$branch_name = $_POST['branch_name'];
										

										$result = mysql_query("INSERT INTO billing_stock (product_name, stock_out, user_name, branch_name)
									            VALUES('$product_name', '$stock_out', '$user_name', '$branch_name')") or die(mysql_error());

									            if($result)

									    $result1 = mysql_query("INSERT INTO helloworld_maharajgunj.billing_stock (product_name, stock_in, user_name, branch_name)
									            VALUES('$product_name', '$stock_out', '$user_name', 'Pulchowk')") or die(mysql_error());

									            if($result1)        	
							                    echo '<p class="success" style="color:#FA1919;">Your Stock Successfully Entered. Please <a href="check_stock.php">click</a> here. </p>';
							                  else
							                    echo '<p class="error" style="color:#FA1919;">Error in Stock Enter.</p>';
									        	
									     	exit;
									     	
									     	}
								?>
							<form id="form" action="" class="form-horizontal" method="POST">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>

										<h2 class="panel-title">Add Dispatch</h2>
										<p class="panel-subtitle">
										</p>
									</header>
									<div class="panel-body">
										<?php 
					                        $user_name=$_SESSION["systemadmin"]; 
					                        $sql="SELECT * from billing_user where user_name='$user_name'";
					                        $result=mysql_query($sql);
					                        while(@$row = mysql_fetch_assoc($result))
					                        {
					                    ?>
					                    <div class="form-group">
						                  	<label class="col-md-4 control-label" for="user_name">User Name</label>
						                  <div class="col-md-8">
						                    <input type="text" class="form-control" name="user_name" id="user_name" value="<?php echo $row["user_name"]; ?>" readonly="readonly">
						                  </div>
					                	</div> <br>
					                	<div class="form-group">
						                  	<label class="col-md-4 control-label" for="branch_name">Branch Name</label>
						                  <div class="col-md-8">
						                    <input type="text" class="form-control" name="branch_name" id="branch_name" value="Koteshwor" readonly="readonly">
						                  </div>
					                	</div> <br>
									
										<div class="form-group">
											<label class="col-sm-4 control-label">Select Product<span class="required">*</span></label>
											<div class="col-sm-8">
												<select data-plugin-selectTwo class="form-control populate" name="product_name" required="">
	                                            	<option selected="" disabled="" required >Select Product</option>
	                                                <?php 
	                                                    $option = mysql_query("SELECT product_name from helloworld.billing_product WHERE category_name='Product'");
	                                                              while ($opt = mysql_fetch_object($option))
	                                                    { 
	                                                        echo '<option value="'.$opt->product_name.'">'.$opt->product_name.'</option>';
	                                                    } 
	                                                ?>
                                        		</select>
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-4 control-label">Product Quantity<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="number" name="stock_out" value="1" min="1" class="form-control" placeholder="eg.: Enter the Stock out of the product"/>
											</div>
										</div><br>
										<?php } ?>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-primary" name="submit">Submit</button>
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
		<script src="assets/vendor/select2/select2.js"></script>
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