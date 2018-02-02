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
					include('sidebar.php')
				?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Add Costumer</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Add Costumer</span></li>
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
										$client_name = $_POST['client_name'];
										$mob_no = $_POST['mob_no'];
										$loc_id = ($_POST['loc_id']);
										$address = ($_POST['address']);
										$land_con = ($_POST['land_con']);
										
										$query = mysql_query("SELECT client_name FROM billing_costumer WHERE client_name='$client_name'");
											if (mysql_num_rows($query) != 0)
									            {
									        	echo '<center><p class="error" style="color:red;">Costumer Name is already exits. Please <a href="costumer.php">click</a> here.</p></center>';
									            }
									        else
									        	{

									            $result = mysql_query("INSERT INTO billing_costumer (client_name,mob_no,loc_id,address,land_con)
									            VALUES('$client_name','$mob_no','$loc_id','$address','$land_con')") or die(mysql_error());

									            if($result)
							                    echo '<p class="success" style="color:#FA1919;">Your Costumer Successfully Entered. Please <a href="costumer.php">click</a> here. </p>';
							                  else
							                    echo '<p class="error" style="color:#FA1919;">Error in Costumer Enter.</p>';
									        	}
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

										<h2 class="panel-title">Add Costumer</h2>
										<p class="panel-subtitle">
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">Full Name <span></span></label>
											<div class="col-sm-9">
												<input type="text" name="client_name" class="form-control" placeholder="eg.: Costumer Name" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Mobile<span></span></label>
											<div class="col-sm-9">
												<input type="text" name="mob_no" class="form-control" placeholder="eg.: 980000000" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Location<span></span></label>
											<div class="col-sm-9">
												<select class="form-control" name="loc_id">
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
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Address<span></span></label>
											<div class="col-sm-9">
												<input type="text" name="address" class="form-control" placeholder="eg.: Costumer Address" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Landline<span></span></label>
											<div class="col-sm-9">
												<input type="text" name="land_con" class="form-control" placeholder="eg.: XX-XXXXX" />
											</div>
										</div>
										<!-- <div class="form-group">
											<label class="col-sm-3 control-label">Email <span></span></label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envelope"></i>
													</span>
													<input type="email" name="e_mail" class="form-control" placeholder="eg.: email@example.com" />
												</div>
											</div>
											<div class="col-sm-9">

											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Username<span> </span></label>
											<div class="col-sm-9">
												<input type="text" name="cuser" class="form-control" placeholder="eg.: Costumer Username" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Password<span></span></label>
											<div class="col-sm-9">
												<input type="text" name="cpass" class="form-control" placeholder="eg.: Costumer Password" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Secrity Question<span></span></label>
											<div class="col-sm-9">
												<select class="form-control" name="cques"> <option selected="" disabled="">Select Question</option> <option>What is your Pet name?</option><option>What is your favourite book name?</option><option>What is your childhood name?</option></select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Security Password <span></span></label>
											<div class="col-sm-9">
												<input name="csec_ans" class="form-control" placeholder="Please remember your password" />
											</div>
										</div> -->
									</div>
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