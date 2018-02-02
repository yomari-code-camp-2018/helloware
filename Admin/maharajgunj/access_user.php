<?php 
include('../connect.php');
session_start();
if(isset($_SESSION["systemadmin"])=='')
header('location: login.php');

if(isset($_POST['submit1']))
{
  $user_name=$_GET['user_name'];
  $bank_menu = $_POST['bank_menu'];
  $bank_cash_deposite = $_POST['bank_cash_deposite'];
  $suppliers_menu = $_POST['suppliers_menu'];
  $suppliers_create_purchase = $_POST['suppliers_create_purchase'];
  $suppliers_create_purchase_return = $_POST['suppliers_create_purchase_return'];
  $suppliers_purchase_transaction = $_POST['suppliers_purchase_transaction'];
  $suppliers_purchase_payment = $_POST['suppliers_purchase_payment'];
  $stock_management_menu = $_POST['stock_management_menu'];
  $stock_check = $_POST['stock_check'];
  $report_menu = $_POST['report_menu'];
  $report_today = $_POST['report_today'];
  $dashboard_do_sales = $_POST['dashboard_do_sales'];
  $dashboard_complimentry_sales = $_POST['dashboard_complimentry_sales'];
  $dashboard_sales_report = $_POST['dashboard_sales_report'];
  $dashboard_do_expense = $_POST['dashboard_do_expense'];
  $dashboard_total_invoice = $_POST['dashboard_total_invoice'];
  $dashboard_total_sales = $_POST['dashboard_total_sales'];
 
 $sql = "UPDATE helloworld_maharajgunj.billing_user_access SET bank_menu='$bank_menu', bank_cash_deposite='$bank_cash_deposite', suppliers_menu='$suppliers_menu', suppliers_create_purchase='$suppliers_create_purchase', suppliers_create_purchase_return='$suppliers_create_purchase_return', suppliers_purchase_transaction='$suppliers_purchase_transaction', suppliers_purchase_payment='$suppliers_purchase_payment', stock_management_menu='$stock_management_menu', stock_check='$stock_check', report_menu='$report_menu', report_today='$report_today', dashboard_do_sales='$dashboard_do_sales', dashboard_complimentry_sales='$dashboard_complimentry_sales', dashboard_sales_report='$dashboard_sales_report', dashboard_do_expense='$dashboard_do_expense', dashboard_total_invoice='$dashboard_total_invoice', dashboard_total_sales='$dashboard_total_sales' WHERE user_name='$user_name'";

  mysql_query($sql);
  echo mysql_error();

  header("Location: usermanage_maharajgunj.php"); 
  exit;
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
				include('../header.php');
			?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php
					include('../admin.php')
				?>
				<!-- end: sidebar -->


				<section role="main" class="content-body">

					<header class="page-header">
						<h2>Access user</h2>
					<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li> <a href="control.php"><span>Control</span></a></li>
								<li><a href="user_manage.php"><span>User Manage</span></a></li>
								<li><a href="#"><span>Access User</span></a></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-8">
										<?php
		                                    $user_name = $_GET['user_name'];  
		                                    $sql = mysql_query("SELECT * FROM helloworld_maharajgunj.billing_user_access WHERE user_name='$user_name'") or die(mysql_error());
		                                    while($row = mysql_fetch_object($sql))
		                                    {
		                                ?>
							<form id="form" class="form-horizontal" action="" method="POST">
										
								<section class="panel">
									<div class="panel-body">
		                                
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">User Name</label>
		                                    <div class="col-md-6">
		                                       <input type="text" name="user_name" class="form-control" value="<?php print ''.$row->user_name.'' ?>" readonly>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Bank Menu</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="bank_menu">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->bank_menu.''; ?>"><?php print ''.$row->bank_menu.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    	</select>
		                                    </div>
		                                </div><br>
		                                 <div class="form-group">
		                                    <label class="col-md-6 control-label">Bank Cash Deposite</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="bank_cash_deposite">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->bank_cash_deposite.''; ?>"><?php print ''.$row->bank_cash_deposite.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    	</select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Suppliers Menu</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="suppliers_menu">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->suppliers_menu.''; ?>"><?php print ''.$row->suppliers_menu.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Suppliers Create Purchase</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="suppliers_create_purchase">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->suppliers_create_purchase.''; ?>"><?php print ''.$row->suppliers_create_purchase.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                   	<label class="col-md-6 control-label">Suppliers Create Purchase Return</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="suppliers_create_purchase_return">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->suppliers_create_purchase_return.''; ?>"><?php print ''.$row->suppliers_create_purchase_return.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Suppliers Purchase Transaction</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="suppliers_purchase_transaction">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->suppliers_purchase_transaction.''; ?>"><?php print ''.$row->suppliers_purchase_transaction.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Suppliers Purchase Payment</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="suppliers_purchase_payment">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->suppliers_purchase_payment.''; ?>"><?php print ''.$row->suppliers_purchase_payment.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Stock Management Menu</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="stock_management_menu">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->stock_management_menu.''; ?>"><?php print ''.$row->stock_management_menu.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Check Stock</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="stock_check">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->stock_check.''; ?>"><?php print ''.$row->stock_check.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Report Menu</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="report_menu">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->report_menu.''; ?>"><?php print ''.$row->report_menu.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Todays Report</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="report_today">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->report_today.''; ?>"><?php print ''.$row->report_today.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Dashboard Do Sales</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="dashboard_do_sales">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->dashboard_do_sales.''; ?>"><?php print ''.$row->dashboard_do_sales.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Dashboard Do Complimentry Sales</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="dashboard_complimentry_sales">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->dashboard_complimentry_sales.''; ?>"><?php print ''.$row->dashboard_complimentry_sales.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Dashboard Sales Report</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="dashboard_sales_report">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->dashboard_sales_report.''; ?>"><?php print ''.$row->dashboard_sales_report.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Dashboard Do Expense</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="dashboard_do_expense">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->dashboard_do_expense.''; ?>"><?php print ''.$row->dashboard_do_expense.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Dashboard Total Invoice</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="dashboard_total_invoice">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->dashboard_total_invoice.''; ?>"><?php print ''.$row->dashboard_total_invoice.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-6 control-label">Dashboard Total Sales</label>
		                                    <div class="col-md-6">
		                                       <select class="form-control" name="dashboard_total_sales">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->dashboard_total_sales.''; ?>"><?php print ''.$row->dashboard_total_sales.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                              	</div><br>
<!-- 
                                	<div class="col-md-3">
											<a href="user_manage.php"><button class="btn btn-warning">Back</button></a>
									</div> -->

									<div class="col-md-3">
                                		<button class="btn btn-primary" name="submit1" type="submit"></span>Submit</button><p></p>
                                	</div><p></p>
                                	
                               	</section>
                               	 
                            </form>
                           <?php } ?>
						</div>
					</div>
					<!-- end: page -->
				</section>
			</div>
			<?php 
			  include '../calendar_task.php';
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