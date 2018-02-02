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
						<h2>Sales Report</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Report</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">

							<p>&nbsp;</p>
							<div class="col-md-12 col-lg-6">
							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#cash" data-toggle="tab">Sales Report</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="cash" class="tab-pane active">
									
										<form class="form-horizontal" action="sales_report_date_summary.php?date=<?php 
			                                    $connect = mysqli_connect("localhost", "root", "", "helloworld"); 
			                                    $sql = "SHOW TABLE STATUS LIKE 'sales'";
			                                    $result=$connect->query($sql);
			                                    $row = $result->fetch_assoc();

			                                    echo $row['Auto_increment'];
			                                ?>" method="post">
											<?php
					                        if(isset($_POST["search"])){
					                          $date=$_POST["date"];
					                      
					                          $sql="SELECT  * FROM billing_sales WHERE date='$date'";
					                        }
					                        else{
					                        $sql="SELECT * FROM billing_sales";
					                        }
					                        $result =mysql_query($sql);
					                        echo mysql_error();
					                        while($row=mysql_fetch_assoc($result))
					                        ?>

											<p>
											<select class="form-control" name="date" required>
													<option value="" selected disabled>Select Transaction Date</option>
													<?php 
									                    	$option = mysql_query("SELECT date FROM billing_sales GROUP BY date");
									                      	while ($opt = mysql_fetch_object($option))
									                        { 
									                         echo '<option value="'.$opt->date.'">'.$opt->date.'</option>';
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
												
													<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
													<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
												</form>
											</div>
												<h2 class="panel-title">Sales Transactions</h2>
										</header>
									<div class="panel-body col-md-12">
										<table class="table table-bordered table-striped mb-none" id="datatable-editable">
											<thead>
												<tr>
													<th>Date</th>
													<th>Total Invoices</th>
													<th>Billed</th>
													<th>Paid</th>
													<th>Balance</th>
												</tr>
											</thead>
											<tbody>
												<?php
		    
									                $sql = mysql_query("SELECT *, count(*) AS sum0, sum(amount) AS sum1, sum(due_date) AS sum2, sum(due_date-amount) as sum3 FROM sales GROUP BY date DESC") or die(mysql_error());
									                while($row = mysql_fetch_object($sql))
									                {
									                	print '<tr class="gradeA">';
									                	print '<td><a href="sales_report_date_summary.php?date='.$row->date.'">'.$row->date.'</a></td>';
									                	print '<td>'.$row->sum0.'</td>';
									                	print '<td>'.$row->sum1.'</td>';
									                	print '<td>'.$row->sum2.'</td>';
									                	print '<td>'.$row->sum3.'</td>';
									                	print '</tr>';
									                } 
									            ?>
											</tbody>
										</table>
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