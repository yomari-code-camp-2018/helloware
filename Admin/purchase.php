<?php 
	include('connect.php');
	session_start();
	if(isset($_SESSION["systemadmin"])=='')
	header('location: login.php');
?>
<?php
	if(isset($_POST['submit1']))
	{
		@$purchase_id = $_GET['purchase_id'];
		@$purchase_id = $_POST['purchase_id'];
		@$vendor_name = $_GET['vendor_name'];
		@$vendor_name = $_POST['vendor_name'];
		@$user_name = $_POST['user_name'];
		@$branch_name = $_POST['branch_name'];

		$sql = mysql_query("INSERT INTO billing_purchase (purchase_id, vendor_name, user_name, branch_name) VALUES('$purchase_id', '$vendor_name', '$user_name', 'Koteshwor')")
			or die(mysql_error($sql));	
												
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

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/vendor/dropzone/css/basic.css" />
		<link rel="stylesheet" href="assets/vendor/dropzone/css/dropzone.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs3.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="assets/vendor/codemirror/theme/monokai.css" />

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
					include('sidebar.php');
				?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Do Purchase</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Supplier's Account</span></li>
								<li><span>Do Purchase</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
						<div class="row">
							<div class="col-xs-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>
						
										<h2 class="panel-title">Purchase</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="add_purchase_order.php" method="post">
											<div class="form-group">
												<label class="col-md-3 control-label">Product</label>
												<div class="col-md-4">
														<select data-plugin-selectTwo required="" class="form-control populate" name="product_name" id="product_name">
															<option selected="" disabled="" required="" >Select Product</option>
															<?php
																$sql5 = mysql_query("SELECT * FROM billing_product WHERE category_name='Product'") or die(mysql_error());
																while($row5 = mysql_fetch_object($sql5))
																{
																	print '<option value="'.$row5->product_name.'">'.$row5->product_name.'</option>';
																}
															?>
														</select>
												</div>
													<div class="col-md-2">
														<input type="text" name="item_price" class="form-control" required="" placeholder="Enter Price">
													</div>
													<?php   
														$purchase_id = $_GET['purchase_id'];
														$sql = mysql_query("SELECT purchase_id FROM billing_purchase WHERE purchase_id='$purchase_id'") or die(mysql_error());
										                while($row = mysql_fetch_object($sql))
			                                                    { 
			                                                        print '<input type="hidden" value="'.$row->purchase_id.'" name="purchase_id">';
			                                                    }
			                                        ?>

												<div class="col-md-1">
													<input type="number" value="1" min="1" class="form-control"  required="" name="item_quantity">
												</div>
												<div class="col-md-1">
													<button class="btn btn-primary" type="submit" name="submit2">Add</button>
												</div>
											</div>
										</form>
									
									<div class="panel-body col-md-12">
										<table class="table table-bordered table-striped mb-none" id="datatable-editable">
											<thead>
												<tr>
													<th>S.N</th>
													<th>Product Name</th>
													<th>Product Price</th>
													<th>Product quantity</th>
													<th>Total (Rs)</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												    $purchase_id = $_GET['purchase_id'];
									                $sql = mysql_query("SELECT *, item_price, sum(item_quantity) AS totalqty, sum(item_price) AS totalprice, sum(item_price * item_quantity) AS totalpurchase FROM billing_purchase_transaction WHERE purchase_id='$purchase_id' GROUP BY product_name") or die(mysql_error());
									                $counter=0;
									                while($row = mysql_fetch_object($sql))
									                {
									                	print '<tr>';
									                	print '<td>'.++$counter.'</td>';
									                	print '<td>'.$row->product_name.'</td>';
									                	print '<td>'.$row->totalprice.'</td>';
									                	print '<td>'.$row->totalqty.'</td>';
									                	print '<td>'.$row->totalpurchase.'</td>';
									                	print '<td class="actions"><a href="delete_product_purchase.php?purchase_order_id='.$row->purchase_order_id.'&purchase_id='.$row->purchase_id.'" class="on-default" title="Delete"><i class="fa fa-trash-o" style="font-size: 20px;" aria-hidden="true"></i></a>
								                			</td>';
									                	print '</tr>';
									                }
									                
									            ?>
									          	<?php 
			                                		 $sql = mysql_query("SELECT sum(item_quantity*item_price) AS tran_total FROM billing_purchase_transaction WHERE purchase_id='$purchase_id'") or die(mysql_error());

			                                		 		while($row = mysql_fetch_object($sql))
			                                		 		{
					                                			print'<tr>';
																print'<th></th>';
																print'<th></th>';
																print'<th></th>';
																print'<th></th>';
																print'<td><strong>Total</strong></td>';
																print'<th>'.$row->tran_total.'</th>';
																print'</tr>';
													}
												?>
											</tbody>
										</table><br>

										<a href="index.php" style="float: right;"><button class="btn btn-primary">Done</button></a>
									
											
									</div>
								</div>
									
								</section>
							</div>
						</div>
				</section>
			</div>
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
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="assets/vendor/fuelux/js/spinner.js"></script>
		<script src="assets/vendor/dropzone/dropzone.js"></script>
		<script src="assets/vendor/bootstrap-markdown/js/markdown.js"></script>
		<script src="assets/vendor/bootstrap-markdown/js/to-markdown.js"></script>
		<script src="assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
		<script src="assets/vendor/codemirror/lib/codemirror.js"></script>
		<script src="assets/vendor/codemirror/addon/selection/active-line.js"></script>
		<script src="assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>
		<script src="assets/vendor/codemirror/mode/javascript/javascript.js"></script>
		<script src="assets/vendor/codemirror/mode/xml/xml.js"></script>
		<script src="assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
		<script src="assets/vendor/codemirror/mode/css/css.js"></script>
		<script src="assets/vendor/summernote/summernote.js"></script>
		<script src="assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="assets/vendor/ios7-switch/ios7-switch.js"></script>
		<script src="assets/vendor/bootstrap-confirmation/bootstrap-confirmation.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/forms/examples.advanced.form.js"></script>

	</body>
</html>