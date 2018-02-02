<?php 
include('connect.php');
session_start();
if(isset($_SESSION["systemadmin"])=='')
header('location: login.php');

if(isset($_POST['submit1']))
{
  $user_name=$_GET['user_name'];
  $dashboard_menu = $_POST['dashboard_menu'];
  $dashboard_koteshwor = $_POST['dashboard_koteshwor'];
  $dashboard_maharajgunj = $_POST['dashboard_maharajgunj'];
  $dashboard_pulchowk = $_POST['dashboard_pulchowk'];
  $control_pannel_menu = $_POST['control_pannel_menu'];
  $control_pannel_product = $_POST['control_pannel_product'];
  $control_pannel_vendor = $_POST['control_pannel_vendor'];
  $control_pannel_bank = $_POST['control_pannel_bank'];
  $control_pannel_category = $_POST['control_pannel_category'];
  $control_pannel_user_manage = $_POST['control_pannel_user_manage'];
  $control_pannel_location = $_POST['control_pannel_location'];
  $control_panel_expense = $_POST['control_panel_expense'];
  $control_panel_employee = $_POST['control_panel_employee'];
  $branch_control_menu = $_POST['branch_control_menu'];
  $branch_control_koteshwor = $_POST['branch_control_koteshwor'];
  $branch_control_pulchowk = $_POST['branch_control_pulchowk'];
  $branch_control_maharajgunj = $_POST['branch_control_maharajgunj'];
  $suppliers_menu = $_POST['suppliers_menu'];
  $suppliers_create_purchase = $_POST['suppliers_create_purchase'];
  $suppliers_create_purchase_return = $_POST['suppliers_create_purchase_return'];
  $suppliers_purchase_transaction = $_POST['suppliers_purchase_transaction'];
  $suppliers_purchase_payment = $_POST['suppliers_purchase_payment'];
  $suppliers_enter_opening_balance = $_POST['suppliers_enter_opening_balance'];
  $bank_menu = $_POST['bank_menu'];
  $bank_cash_deposit = $_POST['bank_cash_deposit'];
  $bank_cash_withdrawn = $_POST['bank_cash_withdrawn'];
  $bank_bank_balance = $_POST['bank_bank_balance'];
  $stock_menu = $_POST['stock_menu'];
  $stock_check_stock = $_POST['stock_check_stock'];
  $stock_check_out_to_branch = $_POST['stock_check_out_to_branch'];  
 
$sql = "UPDATE billing_user_access SET dashboard_menu='$dashboard_menu', dashboard_koteshwor='$dashboard_koteshwor', dashboard_maharajgunj='$dashboard_maharajgunj', dashboard_pulchowk='$dashboard_pulchowk', control_pannel_menu='$control_pannel_menu', control_pannel_product='$control_pannel_product', control_pannel_vendor='$control_pannel_vendor', control_pannel_bank='$control_pannel_bank', control_pannel_category='$control_pannel_category', control_pannel_user_manage='$control_pannel_user_manage', control_pannel_location='$control_pannel_location', control_panel_expense='$control_panel_expense', control_panel_employee='$control_panel_employee', branch_control_menu='$branch_control_menu', branch_control_koteshwor='$branch_control_koteshwor', branch_control_pulchowk='$branch_control_pulchowk', branch_control_maharajgunj='$branch_control_maharajgunj', suppliers_menu='$suppliers_menu', suppliers_create_purchase='$suppliers_create_purchase', suppliers_create_purchase_return='$suppliers_create_purchase_return', suppliers_purchase_transaction='$suppliers_purchase_transaction', suppliers_purchase_payment='$suppliers_purchase_payment', suppliers_enter_opening_balance='$suppliers_enter_opening_balance', bank_menu='$bank_menu', bank_cash_deposit='$bank_cash_deposit', bank_cash_withdrawn='$bank_cash_withdrawn', bank_bank_balance='$bank_bank_balance', stock_menu='$stock_menu', stock_check_stock='$stock_check_stock', stock_check_out_to_branch='$stock_check_out_to_branch' WHERE user_name='$user_name'";

  mysql_query($sql);
  echo mysql_error();

  header("Location: user_manage.php"); exit;
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
						<div class="col-md-12">
										<?php
		                                    $user_name = $_GET['user_name'];  
		                                    $sql = mysql_query("SELECT * FROM billing_user_access WHERE user_name='$user_name'") or die(mysql_error());
		                                    while($row = mysql_fetch_object($sql))
		                                    {
		                                ?>
							<form id="form" class="form-horizontal" action="" method="POST">
										
								<section class="panel">
									<div class="panel-body">

		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">User Name: </label>
		                                    <div class="col-md-3">
		                                       <label class="col-md-3 control-label text-left"> <?php print ''.$row->user_name.'' ?><br><br></label>
		                                    </div>
		                                </div>
										
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Dashboard Menu</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="dashboard_menu">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->dashboard_menu.''; ?>"><?php print ''.$row->dashboard_menu.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Dashboard Koteshwor</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="dashboard_koteshwor">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->dashboard_koteshwor.''; ?>"><?php print ''.$row->dashboard_koteshwor.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Dashboard Maharajgunj</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="dashboard_maharajgunj">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->dashboard_maharajgunj.''; ?>"><?php print ''.$row->dashboard_maharajgunj.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Dashboard Pulchowk</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="dashboard_pulchowk">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->dashboard_pulchowk.''; ?>"><?php print ''.$row->dashboard_pulchowk.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Control Menu</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="control_pannel_menu">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->control_pannel_menu.''; ?>"><?php print ''.$row->control_pannel_menu.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Control Panel Product</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="control_pannel_product">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->control_pannel_product.''; ?>"><?php print ''.$row->control_pannel_product.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Control Panel Vendor</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="control_pannel_vendor">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->control_pannel_vendor.''; ?>"><?php print ''.$row->control_pannel_vendor.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Control Panel Bank</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="control_pannel_bank">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->control_pannel_bank.''; ?>"><?php print ''.$row->control_pannel_bank.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Control Panel Category </label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="control_pannel_category">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->control_pannel_category.''; ?>"><?php print ''.$row->control_pannel_category.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Control Panel User Manage</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="control_pannel_user_manage">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->control_pannel_user_manage.''; ?>"><?php print ''.$row->control_pannel_user_manage.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Control Pannel Location</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="control_pannel_location">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->control_pannel_location.''; ?>"><?php print ''.$row->control_pannel_location.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Control Pannel Expense</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="control_panel_expense">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->control_panel_expense.''; ?>"><?php print ''.$row->control_panel_expense.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Control Pannel Employee</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="control_panel_employee">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->control_panel_employee.''; ?>"><?php print ''.$row->control_panel_employee.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Branch Control Menu</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="branch_control_menu">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->branch_control_menu.''; ?>"><?php print ''.$row->branch_control_menu.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Branch Control Koteshwor</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="branch_control_koteshwor">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->branch_control_koteshwor.''; ?>"><?php print ''.$row->branch_control_koteshwor.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Branch Control Pulchwok</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="branch_control_pulchowk">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->branch_control_pulchowk.''; ?>"><?php print ''.$row->branch_control_pulchowk.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Branch Control Maharajgunj</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="branch_control_maharajgunj">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->branch_control_maharajgunj.''; ?>"><?php print ''.$row->branch_control_maharajgunj.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Supplier Menu </label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="suppliers_menu">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->suppliers_menu.''; ?>"><?php print ''.$row->suppliers_menu.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Supplier Create Purchase </label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="suppliers_create_purchase">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->suppliers_create_purchase.''; ?>"><?php print ''.$row->suppliers_create_purchase.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Supplier Create Purchase Return </label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="suppliers_create_purchase_return">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->suppliers_create_purchase_return.''; ?>"><?php print ''.$row->suppliers_create_purchase_return.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Supplier Purchase Transaction </label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="suppliers_purchase_transaction">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->suppliers_purchase_transaction.''; ?>"><?php print ''.$row->suppliers_purchase_transaction.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Supplier Purchase Payment </label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="suppliers_purchase_payment">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->suppliers_purchase_payment.''; ?>"><?php print ''.$row->suppliers_purchase_payment.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Supplier Enter Opening Balance </label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="suppliers_enter_opening_balance">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->suppliers_enter_opening_balance.''; ?>"><?php print ''.$row->suppliers_enter_opening_balance.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Bank Menu</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="bank_menu">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->bank_menu.''; ?>"><?php print ''.$row->bank_menu.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    	</select>
		                                    </div>
		                                </div><br>
		                                 <div class="form-group">
		                                    <label class="col-md-3 control-label">Bank Cash Deposite </label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="bank_cash_deposit">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->bank_cash_deposit.''; ?>"><?php print ''.$row->bank_cash_deposit.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    	</select>
		                                    </div>
		                                </div><br>
		                                 <div class="form-group">
		                                    <label class="col-md-3 control-label">Bank Cash Withdrawn </label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="bank_cash_withdrawn">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->bank_cash_withdrawn.''; ?>"><?php print ''.$row->bank_cash_withdrawn.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    	</select>
		                                    </div>
		                                </div><br>
		                                 <div class="form-group">
		                                    <label class="col-md-3 control-label">Bank Bank Balance </label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="bank_bank_balance">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->bank_bank_balance.''; ?>"><?php print ''.$row->bank_bank_balance.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    	</select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Stock Management Menu</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="stock_menu">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->stock_menu.''; ?>"><?php print ''.$row->stock_menu.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Stock Check</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="stock_check_stock">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->stock_check_stock.''; ?>"><?php print ''.$row->stock_check_stock.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                <div class="form-group">
		                                    <label class="col-md-3 control-label">Stock Check Out To Branch</label>
		                                    <div class="col-md-3">
		                                       <select class="form-control" name="stock_check_out_to_branch">
		                                       	<option style="background-color: #CCC;" value="<?php print ''.$row->stock_check_out_to_branch.''; ?>"><?php print ''.$row->stock_check_out_to_branch.''; ?></option>
		                                            <option value="">No</option>
		                                            <option value="Yes">Yes</option>
		                                    </select>
		                                    </div>
		                                </div><br>
		                                
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