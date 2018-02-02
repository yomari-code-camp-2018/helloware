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
		<!--Link Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png" />
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
						<h2>Bank Transaction</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Bank Transaction</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
								<form action="" method="post">
<!-- 									<button type="submit" name="submit_collection_details" class="btn btn-primary">Download Excle File</button> -->
									<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
									<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
								</form>
								</div>
						
								<h2 class="panel-title">Bank Transaction List</h2>
							</header>
							<div class="panel-body">
								<h4><b>Balance: </b> 
								 <?php
								        $bank_name=$_GET['bank_name'];
                                        $sql = mysql_query("SELECT *, sum(credit-debit) as balance FROM billing_bank_balance WHERE bank_name='$bank_name'") or die(mysql_error());
                                        while($row = mysql_fetch_object($sql))
                                        {
                                            print '<td>Nrs.'.$row->balance.'</td>';
                                        }
                                    ?>
								
								</h4>
								<div class="row">
									<div class="col-sm-6">
										<!-- <div class="mb-md">
											<a href="cash_withdrawn.php"><button class="btn btn-primary">Add Cash Withdrawn <i class="fa fa-plus"></i></button></a>
										</div> -->
									</div>
								</div>
								 <table class="table table-striped table-bordered datatable-extended">
                                    <thead>
                                        <tr>
                                            <!-- <p><h3>Recent Invoices</h3></p> -->
                                            <th>BB ID</th>
                                            <th>Date</th>
                                            <th>Bank Name</th>
                                            <th>Particular</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php
                                            $bank_name= $_GET['bank_name'];
                                            $sql = mysql_query("SELECT *, date(transaction_date) as date11 FROM billing_bank_balance WHERE bank_name='$bank_name' ORDER BY date11 DESC ") or die(mysql_error());
                                            while($row = mysql_fetch_object($sql))
                                            {
                                                print '<tr class="gradeA">';
                                                print '<td>'.$row->bb_id.'</a></td>';
                                                print '<td>'.$row->date11.'</td>';
                                                print '<td>'.$row->bank_name.'</td>';
                                                print '<td>'.$row->transaction.'-'.$row->branch_name.'</td>';
                                                print '<td>'.$row->debit.'</td>';
                                                print '<td>'.$row->credit.'</td>';
                                                print '</tr>';
                                            }
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
		</section>

		<div id="dialog" class="modal-block mfp-hide">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title">Are you sure?</h2>
				</header>
				<div class="panel-body">
					<div class="modal-wrapper">
						<div class="modal-text">
							<p>Are you sure that you want to delete this row?</p>
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button id="dialogConfirm" class="btn btn-primary">Confirm</button>
							<button id="dialogCancel" class="btn btn-default">Cancel</button>
						</div>
					</div>
				</footer>
			</section>
		</div>

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