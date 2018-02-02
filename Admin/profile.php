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
				include('header.php');
			?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php
					include('sidebar.php');
				?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<?php 
				      $user_name=$_SESSION["systemadmin"]; 
				      $sql="SELECT * from billing_user where user_name='$user_name'";
				      $result=mysql_query($sql);
				      while(@$row = mysql_fetch_assoc($result))
				        {
				    ?>
					<header class="page-header">
						<h2><?php echo $row["user_fname"];?> Profile</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><?php echo $row["user_fname"];?> Profile</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<div class="row">
						<div class="col-md-4 col-lg-3">

							<section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">
										<img src="assets/images/!logged-user.jpg" class="rounded img-responsive" alt="">
										<div class="thumb-info-title">
											<span class="thumb-info-inner"><?php echo $row["user_fname"];?></span>
											<span class="thumb-info-type"><?php echo $row["user_post"];?></span>
										</div>
									</div>

									<hr class="dotted short">

									<!-- <h6 class="text-muted">About</h6>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vulputate quam. Interdum et malesuada</p>
									<div class="clearfix">
										<a class="text-uppercase text-muted pull-right" href="#">(View All)</a>
									</div> -->

									<hr class="dotted short">

									<div class="social-icons-list">
										<a rel="tooltip" data-placement="bottom" target="_blank" href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
										<a rel="tooltip" data-placement="bottom" href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
										<a rel="tooltip" data-placement="bottom" href="#" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
									</div>

								</div>
								<?php } ?>
							</section>
						</div>
							<div class="col-md-8 col-lg-6">
								<div class="tabs">
									<form class="form-horizontal" method="get">
										<h4 class="mb-xlg">About Me</h4>
										<fieldset>
											<?php
		                                        $sql2 = mysql_query("SELECT * FROM billing_user WHERE user_name='$user_name'") or die(mysql_error());
		                                        while($row= mysql_fetch_object($sql2))
                                            	{
                                    		?>
											<div class="form-group">
												<label class="col-md-3 control-label">First Name</label>
													<div class="col-md-8">
														<input type="text" class="form-control" readonly value="<?php print ''.$row->user_fname.''; ?>">
													</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" >Last Name</label>
													<div class="col-md-8">
														<input type="text" class="form-control" readonly value="<?php print ''.$row->user_lname.''; ?>" >
													</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" >Address</label>
													<div class="col-md-8">
														<input type="text" class="form-control" readonly value="<?php print ''.$row->address.''; ?>" >
													</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" >Post</label>
													<div class="col-md-8">
														<input type="text" class="form-control" readonly value="<?php print ''.$row->user_post.''; ?>" >
													</div>
											</div>
											<?php }?>
										</fieldset>
										<hr class="dotted tall">
									</form>
								</div>
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
		<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>