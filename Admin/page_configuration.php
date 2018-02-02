<?php 
include('connect.php');
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
					<header class="page-header">
						<h2>Add Product</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<!-- <li> <a href="control.php"><span>Control</span></a></li>
								<li><a href="product.php"><span>Product</span></a></li>
								<li><a href="Active"><span>Add Product</span></a></li> -->
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
                                       $product_name = $_POST['product_name'];
                                        $product_price = $_POST['product_price'];

                                        $query = mysql_query("SELECT product_name FROM billing_product WHERE product_name='$product_name'");
                                            if (mysql_num_rows($query) != 0)
                                                {
                                                echo '<p class="error" style="color:red;">Product Name is already exits. Please <a href="product.php">click</a> here.</p>';
                                                }
                                            else
                                                {

                                                $result = mysql_query("INSERT INTO billing_product (product_name, product_price)
                                                VALUES('$product_name', '$product_price')") or die(mysql_error());

                                                if($result)
                                                echo '<p class="success" style="color:#FA1919;">Your Product Successfully Entered. Please <a href="product.php">click</a> here. </p>';
                                              else
                                                echo '<p class="error" style="color:#FA1919;">Error in Product Enter.</p>';
                                           		}
                                            }
                                    ?>
							<form class="form-horizontal" action="" method="POST">
                                    <?php
                                        @$sales_id=$_GET['sales_id'];
                                        $sql = mysql_query("SELECT * FROM billing_sales_transaction WHERE sales_id='$sales_id'") or die(mysql_error());
                                        while($row = mysql_fetch_object($sql))
                                            {
                                    ?>
                               
                               <div class="form-group">
                                    <label class="col-md-2 control-label" for="sales_id">Invoice No.</label>
                                    <div class="col-md-4">
                                       <label class="col-md-2 control-label"><?php print ''.$row->sales_id.''; ?></label>
                                    </div>
                                </div>
                                
                                <div class="form-group">

                                    <label class="col-md-2 control-label">Product Name</label>
                                    <div class="col-md-4"  > 
                                       <input type="text" class="form-control" readonly required name="product_name" placeholder="Product Name" value="<?php print ''.$row->product_name.''; ?>">
                                        
                                    </div>
                                </div>
                                <?php }?>
                                <?php
                                    @$product_id=$_GET['product_id'];
                                    $sql = mysql_query("SELECT product_price FROM billing_product WHERE product_id='$product_id')") or die(mysql_error());
                                    while($row = mysql_fetch_object($sql))
                                        {
                                ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"> Product Amount</label>
                                    <div class="col-md-4">
                                       <input type="text" readonly required class="form-control" name="amount" value="<?php print ''.$row->product_price.''; ?>">
                                    </div>
                                </div>
                                <?php } ?>
                                <button class="btn btn-success btn-icon-fixed" name="submit55" type="submit"><span class="icon-papers"></span>Paid</button>
                            </form>
						</div>
					</div>
					<!-- end: page -->
				</section>
			</div>
			<?php
				include('calendar_task.php');
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