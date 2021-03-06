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

		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />
		<!--Link Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png" />
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
						<h2>Purchase Transaction</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Transaction</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<p>&nbsp;</p>
							<div class="col-md-6">
							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#cash" data-toggle="tab">Purchase Transaction</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="cash" class="tab-pane active">
									
										<form class="form-horizontal" action="purchase_transaction_vendor.php" method="post">
											<?php
					                        if(isset($_POST["search"])){
					                          $vendor_name=$_POST["vendor_name"];
					                          $sql="SELECT  * FROM billing_vendor WHERE vendor_name LIKE '%$vendor_name%'";
					                        }
					                        else{
					                        $sql="SELECT * FROM billing_vendor";
					                        }
					                        $result =mysql_query($sql);
					                        echo mysql_error();
					                        while($row=mysql_fetch_assoc($result))
					                        ?>

											<p>
											<select class="form-control" name="vendor_name" required>
													<option value="" selected disabled>Select Vendor Name</option>
													<?php 
									                    	$option = mysql_query("SELECT * FROM billing_vendor");
									                      	while ($opt = mysql_fetch_object($option))
									                        { 
									                         echo '<option value="'.$opt->vendor_name.'">'.$opt->vendor_name.'</option>';
									                        } 
									                    ?>
											</select>
					                      	<div class="submit-text">
					                          <input type="submit" name="search" class="btn btn-primary btn-mini" value="Search Collection">
					                        </div>
										</form>
										<div class="clearfix"> </div>
									</div>
								
									</div>
								</div>
								<div class="row">
									<section class="panel">
										<header class="panel-heading">
											<div class="panel-actions">
												<form action="export_generate_collection.php" method="post" name="export_excel">
													<!-- <button type="submit" id="export" name="export" class="btn btn-primary">Download Excle File</button> -->
													<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
													<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
												</form>
											</div>
												<h2 class="panel-title">Purchase Transactions</h2>
										</header>
									<div class="panel-body col-md-12">
										<table class="table table-bordered table-striped mb-none" id="datatable-editable">
											<thead>
												<tr>
													<th>Date</th>
													<th>Transaction</th>
													<th>Debit</th>
													<th>Credit</th>
												</tr>
											</thead>
											<tbody>
												<?php
		    
									                $sql = mysql_query("SELECT *, sum(item_price * item_quantity) AS sum1, date(purchase_tran_date) AS date1, sum(item_quantity * purchase_paid) AS sum2 FROM billing_purchase_transaction GROUP BY purchase_id") or die(mysql_error());
									                while($row = mysql_fetch_object($sql))
									                {
									                	print '<tr class="gradeA">';
									                	print '<td>'.$row->date1.'</td>';
									                	print '<td><a href="purchase_summary.php?purchase_id='.$row->purchase_id.'">'.$row->purchase_id.'|'.$row->transaction_type.'</a></td>';
									                	print '<td>'.$row->sum1.'</td>';
									                	print '<td>'.$row->sum2.'</td>';
									                	print '</tr>';
									                } 
									            ?>
											</tbody>
										</table>
								</div>
								</div>
							</div>
							</div>	
						</div>
						
					</section>


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
	</body>
</html>