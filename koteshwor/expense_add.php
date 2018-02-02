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
						<h2>Add Expense</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Expense</span></li>
								<li><span>Add Expense</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6">

								<?php
									if(isset($_POST['submit']))
									            {
									      	
										$expense_category = $_POST['expense_category'];
										$expense_transaction = $_POST['expense_transaction'];
										$expense_amount = $_POST['expense_amount'];
										$user_name = $_POST['user_name'];
										

										$result = mysql_query("INSERT INTO billing_expense (expense_category, expense_transaction, expense_amount, user_name, expense_date, expense_time)
									            VALUES('$expense_category','$expense_transaction','$expense_amount','$user_name', curdate(), curtime())") or die(mysql_error());

									            if($result)
							                    echo '<p class="success" style="color:#FA1919;">Your Expense Transaction Successfully Entered. Please <a href="expense.php">click</a> here. </p>';
							                  else
							                    echo '<p class="error" style="color:#FA1919;">Error in Expense Transaction Enter.</p>';
									        	
									     	exit;
									     	
									     	}
									?>
							<form id="form" action="" class="form-horizontal" method="post">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										</div>

										<h2 class="panel-title">Add Expense</h2>
									</header>
									<div class="panel-body">

										<!-- <div class="form-group">
											<label class="col-md-3 control-label">Deposited Date</label>
											<div class="col-md-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</span>
													<input type="text" name="deposite_date" data-plugin-datepicker data-plugin-options='{"format": "yyyy-mm-dd"}' class="form-control">
												</div>
											</div>
										</div> -->
										<div class="form-group">
											<label class="col-sm-5 control-label">Expense Category<span class="required">*</span></label>
											<div class="col-sm-7">
												<select data-plugin-selectTwo class="form-control populate" name="expense_category" id="expense_category" required>
													<option selected="" disabled="" required >Select Category</option>
														<?php
															$sql5 = mysql_query("SELECT * FROM helloworld.billing_expense_category") or die(mysql_error());
																while($row5 = mysql_fetch_object($sql5))
															{
																print '<option value="'.$row5->expense_category.'">'.$row5->expense_category.'</option>';
															}
														?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-5 control-label">Transaction Name<span class="required">*</span></label>
											<div class="col-sm-7">
												<input type="text" name="expense_transaction" class="form-control" placeholder="Transaction Name" required />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-5 control-label">Enter Amount <span class="required">*</span></label>
											<div class="col-sm-7">
												<input type="number" name="expense_amount" class="form-control" placeholder="Amount" required />
											</div>
										</div>
										<?php 
                                                $user_name=$_SESSION["systemadmin"]; 
                                                $sql="SELECT * from helloworld_koteshwor.billing_user where user_name='$user_name'";
                                                $result=mysql_query($sql);
                                                while(@$row = mysql_fetch_object($result))
                                                {
                                            ?>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Issued By</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="user_name" readonly value="<?php print ''.$row->user_name.''; ?>">
                                        </div>
                                    </div>
                                    <?php } ?>
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