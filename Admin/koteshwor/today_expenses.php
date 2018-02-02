<?php 
include('../connect.php');
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

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

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
			  include '../header.php';
			?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php
					include('../admin.php');
				?>	
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Todays Expenses</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Todays Expenses</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<p>&nbsp;</p>
						<div class="col-md-12 col-lg-12 col-xl-4">
							<section class="panel">
										<header class="panel-heading">
											<div class="panel-actions">
											<form action="export_generate_collection.php" method="post" name="export_excel">
												<button type="submit" id="export" name="export" class="btn btn-primary">Download Excel File</button>
												<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
												<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
											</form>
											</div>
													&nbsp
											<h2 class="panel-title"><?php
														$sql = mysql_query("SELECT *, sum(expense_amount) as dayexp FROM helloworld_koteshwor.billing_expense WHERE expense_date= CURDATE()") or die(mysql_error());
														while($row = mysql_fetch_object($sql))
														{
															print '<h2 class="panel-title" style="font-weight: bold;">Total Sales:&nbsp Nrs.'.$row->dayexp.'</h2>';
														}
													?></h2>	
										</header>
									<div class="panel-body">
										<table class="table table-bordered table-striped mb-none" id="datatable-editable">
											<thead>
												<tr>
													<th>Serial Number</th>
													<th>Expense Transaction</th>
													<th>Expene Category</th>
													<th>Expense Amount</th>
												</tr>
											</thead>
											<tbody>
											<?php
							                    $sql="SELECT * FROM helloworld_koteshwor.billing_expense WHERE expense_date=CURDATE() ORDER BY expense_id";
							                  $result =mysql_query($sql);
							                  echo mysql_error();
							                  $counter=0;
							                  while($row=mysql_fetch_object($result))
							                  		{
									                	print '<tr class="gradeA">';
											            print '<td>'.++$counter.'</td>';
											            print '<td>'.$row->expense_transaction.'</td>';
											            print '<td>'.$row->expense_category.'</td>';
											            print '<td>'.$row->expense_amount.'</td>';
											            print '</tr>';
										            }
								                	?>						                	
											</tbody>
										</table>
									</div>
								</section>
								</div>
								<!--  -->
							
											<!-- end: page -->
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