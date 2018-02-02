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
						<h2>Add Vendor</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li> <a href="control.php"><span>Control</span></a></li>
								<li><a href="vendor.php"><span>Vendor</span></a></li>
								<li><a href="action"><span>Add Vendor</span></a></li>
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
                                       $vendor_name = $_POST['vendor_name'];
                                        $vendor_loc = $_POST['vendor_loc'];
                                         $vendor_address = $_POST['vendor_address'];
                                          $vendor_contact = $_POST['vendor_contact'];
                                        
                                        $query = mysql_query("SELECT vendor_name FROM billing_vendor WHERE vendor_name='$vendor_name'");
                                            if (mysql_num_rows($query) != 0)
                                                {
                                                echo '<p class="error" style="color:red;">Vendor Name is already exits. Please <a href="vendor.php">click</a> here.</p>';
                                                }
                                            else
                                                {

                                                $result = mysql_query("INSERT INTO billing_vendor (vendor_name,vendor_loc,vendor_address,vendor_contact)
                                                VALUES('$vendor_name','$vendor_loc','$vendor_address','$vendor_contact')") or die(mysql_error());

                                                if($result)
                                                echo '<p class="success" style="color:#FA1919;">Your Vendor Successfully Entered. Please <a href="vendor.php">click</a> here. </p>';
                                              else
                                                echo '<p class="error" style="color:#FA1919;">Error in Vendor Enter.</p>';
                                           		}
                                            }
                                    ?>
							<form id="form" action="" class="form-horizontal" method="POST">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>

										<h2 class="panel-title">Add Vendor</h2>
										<p class="panel-subtitle">
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">Vendor Name <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="vendor_name" class="form-control" placeholder="eg.: Vendor Name" required/>
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-3 control-label">Vendor Location<span class="required">*</span></label>
											<div class="col-sm-9">
												<select class="form-control" name="vendor_loc">
                                            			<option selected="" disabled="" required >Select Location</option>
                                                	<?php 
                                                    	$option = mysql_query("SELECT location_name from billing_location");
                                                              while ($opt = mysql_fetch_object($option))
                                                    	{ 
                                                        echo '<option value="'.$opt->location_name.'">'.$opt->location_name.'</option>';
                                                    	} 
                                                	?>
                                        		</select>
											</div>
										</div><br/>
										<div class="form-group">
											<label class="col-sm-3 control-label">Vendor Address <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="vendor_address" class="form-control" placeholder="eg.: Vendor Address" required/>
											</div>
										</div><br>
										<div class="form-group">
											<label class="col-sm-3 control-label">Vendor Contact <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="vendor_contact" class="form-control" placeholder="eg.: Vendor Contact" required/>
											</div>
										</div><br>
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