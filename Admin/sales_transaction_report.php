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
		<!--Link Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png" />
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
						<h2>Account Transaction</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Account Transaction</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
								<form action="export_generate_collection.php" method="post" name="export_excel">
									<button type="submit" id="export" name="export" class="btn btn-primary">Download Excle File</button>
									<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
									<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
								</form>
								</div>

									<?php
					                  if(isset($_POST["search"])){
					                    $date=$_POST["date"];
					                    $sql="SELECT  * FROM sales WHERE date='$date' LIMIT 1";
					                  }
					                  else{
					                  }
					                  $result =mysql_query($sql);
					                  echo mysql_error();
					                  while($row=mysql_fetch_assoc($result))
					                  { ?>
						                	<h2 class="panel-title"><?php echo $row["date"]; ?></h2>
						               <?php  }
						            ?>

						    
							</header>
							<div class="panel-body">
								<h5><b>Total Billed: </b>  
								<?php
									$sql="SELECT sum(amount) AS sumtotal1 FROM sales WHERE date='$date'";

									$result = mysql_query($sql);

									while ($row = mysql_fetch_assoc($result))
									{ 
									   echo $row['sumtotal1'];
									}
									?>

                                    |

									<b>Total Paid: </b>  
								<?php
									$sql="SELECT sum(due_date) AS sumtotal2 FROM sales WHERE date='$date'";

									$result = mysql_query($sql);

									while ($row = mysql_fetch_assoc($result))
									{ 
									   echo $row['sumtotal2'];
									}
									?>
								 |

									<b>Balance: </b>  
								<?php
									$sql="SELECT sum(due_date-amount) AS sumtotal3 FROM sales WHERE date='$date'";

									$result = mysql_query($sql);

									while ($row = mysql_fetch_assoc($result))
									{ 
									   echo $row['sumtotal3'];
									}
									?>
								</h5>
								<table class="table table-bordered table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>SN.</th>
											<th>Invoice No. | User</th>
											<th>Billed</th>
											<th>Paid</th>
											<th>Balance</th>
										</tr>
									</thead>
									<tbody>
									<?php
					                    $date=$_POST["date"];
					                    $sql="SELECT  *, sum(due_date-amount) as balance from sales WHERE date='$date' GROUP BY invoice_number";
					                    $counter = 0;
					                    $result =mysql_query($sql);
					                  echo mysql_error();
					                  while($row=mysql_fetch_object($result))
					                  { ?>
						                	<tr class="gradeA">
						                	<td><?php print ''.++$counter.''; ?></td>
						                	<td><?php print '<a href="sales_invoice_wise_report.php?invoice='.$row->invoice_number.'">'.$row->invoice_number.'</a>'; ?></td>
						                	<td><?php print ''.$row->amount.''; ?></td>
						                	<td><?php print ''.$row->due_date.''; ?></td>
						                	<td><?php print ''.$row->balance.''; ?></td>
						                	</tr>
						               <?php  }
						            ?>
									</tbody>
								</table>
							</div>
						</section>
					<!-- end: page -->
				</section>
			</div>

			
			<?php 
			  include 'calendar_task.php';
			?>

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