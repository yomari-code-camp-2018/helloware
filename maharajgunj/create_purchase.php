<?php 
session_start();
include('common/connect.php');
if(isset($_SESSION["systemadmin"])=='')
header('location: index.php');

?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Hello Ware | Team Hello World</title>
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- <meta http-equiv="refresh" content="5" /> -->
		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
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
						<h2>Purchase</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Suppliers</span></li>
								<li><span>Purchase</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
						<section role="main" class="body-sign body-locked">
							<div class="center-sign fixed">
								<div class="panel panel-sign">
									<div class="panel-body">
										
										<form action="purchase.php?purchase_id=<?php
					                                    include('common/line_connect.php');  
					                                    $sql = "SHOW TABLE STATUS LIKE 'billing_purchase'";
					                                    $result=$connect->query($sql);
					                                    $row = $result->fetch_assoc();

					                                    echo $row['Auto_increment'];
					                                ?>" method="POST">
											<div class="current-user text-center">
												<img src="assets/images/logo-default.png" alt=""/>
											</div>
											<div class="form-group mb-lg">
												<select data-plugin-selectTwo class="form-control populate" name="vendor_name" id="vendor_name" required="">
															<option selected="" disabled="" required >Select Vendor</option>
															<?php
																$sql5 = mysql_query("SELECT * FROM helloworld.billing_vendor") or die(mysql_error());
																while($row5 = mysql_fetch_object($sql5))
																{
																	print '<option value="'.$row5->vendor_name.'">'.$row5->vendor_name.' </option>';
																}
															?>
												</select><br>
													<?php 
													      $user_name=$_SESSION["systemadmin"]; 
													      $sql="SELECT * from billing_user where user_name='$user_name'";
													      $result=mysql_query($sql);
													      while(@$row = mysql_fetch_assoc($result))
				        								{
				    								?>
												<div class="input-group input-group-icon">
													<input type="text" name="user_name" class="form-control input-lg" value="<?php echo $row['user_name']; ?>" readonly /><p></p>
													<span class="input-group-addon">
														<span class="icon icon-lg">
															<i class="fa fa-lock"></i>
														</span>
													</span>
												</div><br>
												<input type="text" name="purchase_id" class="form-control input-lg" value="<?php 
										                 include('common/line_connect.php'); 
										                  $sql = "SHOW TABLE STATUS LIKE 'billing_purchase'";
										                  $result=$connect->query($sql);
										                  $row = $result->fetch_assoc();

										                  echo $row['Auto_increment'];
										                ?>" readonly />
											</div>
											<div class="text-center">
												<button type="submit" name="submit1" class="btn-lg btn-primary">Create</button>
											</div>
											<?php } ?>
										</form>
									</div>
								</div>
							</div>
						</section>
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
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.editable.js"></script>
		<script src="assets/javascripts/extra/examples.ajax.made.easy.js"></script>
	</body>
</html>