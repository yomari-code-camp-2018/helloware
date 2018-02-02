<?php 
include('connect.php');
session_start();
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
						<h2>Enter Opening Balance</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Enter Opening Balance</span></li>
								
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
									    $transaction_type  = $_POST['transaction_type'];
									    $sales_id  = $_POST['sales_id'];
										$item_price  = $_POST['item_price'];
										$client_name = $_POST['client_name'];
										$user_name = $_POST['user_name'];
										
										 $sql = "INSERT INTO billing_sales(sales_id,client_name,user_name) VALUES ('$sales_id','$client_name','$user_name')";
											  mysql_query($sql);
											  echo mysql_error();

										$sql1 = "INSERT INTO billing_sales_transaction(transaction_type,sales_id,item_price) VALUES ('$transaction_type','$sales_id','$item_price')";
											  mysql_query($sql1);
											  echo mysql_error();

											 /* header('location:sales_transaction.php');*/
										}
									?>
							<form id="form" action="" class="form-horizontal" method="post">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										</div>

										<h2 class="panel-title">Add Cash Received</h2>
									</header>
									<div class="panel-body">

										<div class="form-group">
					                        <label class="col-md-3 control-label" for="sales_id">Transaction ID</label>
					                          	<div class="col-md-9">
						                                <input type="text" class="form-control" hidden name="sales_id" id="profileFirstName" value="<?php 
						                              $connect = mysqli_connect("localhost", "root", "", "billing"); 
						                              $sql = "SHOW TABLE STATUS LIKE 'billing_sales'";
						                              $result=$connect->query($sql);
						                              $row = $result->fetch_assoc();

						                              echo $row['Auto_increment'];
						                            ?>" readonly="readonly">
					                          	</div>
					                    </div>
										<?php 
                                                $user_name=$_SESSION["systemadmin"]; 
                                                $sql="SELECT * from billing_user where user_name='$user_name'";
                                                $result=mysql_query($sql);
                                                while(@$row = mysql_fetch_object($result))
                                                {
                                            ?>
                                            <div class="form-group">
		                                        <label class="col-md-3 control-label">Issued By</label>
		                                        <div class="col-md-9">
		                                           <input type="text" class="form-control" name="user_name" readonly value="<?php print ''.$row->user_name.''; ?>">
		                                        </div>
                                    		</div>
                                    		<?php } ?>
                                    		<div class="form-group">
		                                        <label class="col-md-3 control-label">Transaction Type</label>
		                                        <div class="col-md-9">
		                                           <input type="text" class="form-control" name="transaction_type" readonly value="Client Opening Balance">
		                                        </div>
                                    		</div>
                                    	<div class="form-group">
											<label class="col-sm-3 control-label">Costumer Name <span class="required">*</span></label>
												<div class="col-sm-9">
													<select class="form-control" name="client_name" required>
														<option value="" disabled selected>Select Costumer</option>
														<?php $option = mysql_query("SELECT * FROM billing_costumer");
															while ($opt = mysql_fetch_object( $option ))
															{ 
																echo '<option value="'.$opt->client_name.'">'.$opt->client_name.'</option>';
															} 
														?>
													</select>
												</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Enter Amount <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="item_price" class="form-control" placeholder="Amount" required />
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button name="submit" class="btn btn-primary">Submit</button>
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