<?php 
	include('common/connect.php');
	session_start();
	if(isset($_SESSION["systemadmin"])=='')
	header('location: login.php');
?>
<?php
	if(isset($_POST['submit1']))
	{
		$sales_id = $_GET['sales_id'];
		@$member_card = $_GET['member_card'];
		$sales_id = $_POST['sales_id'];
		@$member_card = $_POST['member_card'];
		

		$sql = mysql_query("INSERT INTO billing_sales (sales_id, member_card, billing_date, billing_time) VALUES('$sales_id', '$member_card', curdate(), curtime())")
			or die(mysql_error($sql));
		$sql = mysql_query("UPDATE billing_sales SET member_discount=(SELECT member_discount FROM helloworld.billing_member WHERE member_card='$member_card'), member_name=(SELECT member_name FROM helloworld.billing_member WHERE member_card='$member_card') WHERE sales_id='$sales_id'")
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
						<h2>Do Sales</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Do Sales</span></li>
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
						
										<h2 class="panel-title">Select Sales</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="add_sales_order.php" method="POST">
											<div class="form-group">
												<label class="col-md-3 control-label">Product</label>
												<div class="col-md-6">
													<select data-plugin-selectTwo class="form-control populate" name="product_id" required>
														<option selected="" disabled="">Select Product</option>
															<?php
																$sql5 = mysql_query("SELECT * FROM helloworld.billing_product") or die(mysql_error());
																while($row5 = mysql_fetch_object($sql5))
																{
																	print '<option value="'.$row5->product_id.'">'.$row5->product_name.'</option>';
																}
															?>
													</select>
												</div>
													<?php   
														$sales_id = $_GET['sales_id'];
														$sql = mysql_query("SELECT sales_id FROM billing_sales WHERE sales_id='$sales_id'") or die(mysql_error());
										                while($row = mysql_fetch_object($sql))
			                                                    { 
			                                                        print '<input type="hidden" value="'.$row->sales_id.'" name="sales_id">';
			                                                    }
			                                        ?>

												<div class="col-md-1">
													<input type="number" value="1" min="1" class="form-control" name="billing_qty">
												</div>
												<div class="col-md-1">
													<button class="btn btn-primary" type="submit" name="submit2">Add</button>
												</div>
											</div>
										</form>
									</div>

									<div class="panel-body">
										<?php 
											$sales_id = $_GET['sales_id'];
											$sql = mysql_query("SELECT * FROM billing_sales WHERE sales_id='$sales_id'") or die(mysql_error());
											while($row = mysql_fetch_object($sql))
											{
										?>
												<form class="form-horizontal" action="add_sales_discount.php" method="POST">
													
												<div class="form-group">
													<div class="col-md-3">
													</div>
													<div class="col-md-6">
															<input class="col-md-6" type="hidden" name="sales_id" value="<?php print ''.$row->sales_id.''?> ">
															<input type="number" min="0" name="discount_rate" class="form-control col-md-4" placeholder="Enter Discount">
															<input type="text" name="discount_reason" class="form-control col-md-4" required placeholder="Enter Discount Reason">
													</div>

													<div class="col-md-1">
														<button class="btn btn-primary" type="submit" name="submit3">Submit</button>
													</div>
												</div>
									            </form>
									    <?php
									  		}
									   	?>
									</div>
									<div class="panel-body">
										<?php
											$sales_id = $_GET['sales_id'];
											$sql = mysql_query("SELECT * FROM helloworld.billing_member WHERE member_card IN(SELECT member_card FROM billing_sales WHERE sales_id='$sales_id')") or die(mysql_error());
											while($row = mysql_fetch_object($sql))
											{
										?>
												<form class="form-horizontal" action="" method="GET">
													
												<div class="form-group">
													<div class="col-sm-3">
													</div>
													<div class="col-md-2">
														 <input type="text" class="form-control" name="member_name"  value="<?php print ''.$row->member_name.''?> " readonly>
													</div>
													<div class="col-sm-2">
														 <input type="text" class="form-control" name="member_phone"  value="<?php print ''.$row->member_phone.''?> " readonly>
													</div>
													<div class="col-sm-2">
														 <input type="text" class="form-control" name="member_card"  value="<?php print ''.$row->member_card.''?> " readonly>
													</div>
													<div class="col-sm-1">
														 <input type="text" class="form-control" name="member_discount"  value="<?php print ''.$row->member_discount.'%'?> " readonly>
													</div>
												</div>
												</form>
									    <?php
									  		}
									   	?>
									</div>
									<div class="panel-body col-md-12">
										<table class="table table-bordered table-striped mb-none" id="datatable-editable">
											<thead>
												<tr>
													<th>S.N</th>
													<th>Product Name</th>
													<th>Category Name</th>
													<th>Product Price</th>
													<th>Product quantity</th>
													<th>Total (Rs)</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
									                $sql = mysql_query("SELECT *, sum(billing_qty) AS totalqty, sum(product_price*billing_qty) AS ttotal  FROM billing_sales_order WHERE sales_id='$sales_id' GROUP BY product_name") or die(mysql_error());
									                $counter=0;
									                while($row = mysql_fetch_object($sql))
									                {
									                	print '<tr>';
									                	print '<td>'.++$counter.'</td>';
									                	print '<td>'.$row->product_name.'</td>';
									                	print '<td>'.$row->category_name.'</td>';
									                	print '<td>'.$row->product_price.'</td>';
									                	print '<td>'.$row->totalqty.'</td>';
									                	print '<td>'.$row->ttotal.'</td>';
									                	print '<td class="actions"><a href="delete_sales_order.php?sales_order_id='.$row->sales_order_id.'&sales_id='.$row->sales_id.'" class="on-default" title="Delete"><i class="fa fa-trash-o" style="font-size: 20px;" aria-hidden="true"></i></a>
								                			</td>';
									                	print '</tr>';
									                }
									                
									            ?>
									          <?php 
			                                		 $sql = mysql_query("SELECT sum(billing_qty*product_price) AS tran_total FROM billing_sales_order WHERE sales_id='$sales_id'") or die(mysql_error());

			                                		 		while($row = mysql_fetch_object($sql))
			                                		 		{
					                                			print'<tr>';
																print'<th></th>';
																print'<th></th>';
																print'<th></th>';
																print'<th></th>';
																print'<td><strong>Total</strong></td>';
																print'<th>'.$row->tran_total.'</th>';
																print'<td></td>';
																print'</tr>';
													}
												?>
												<?php 
			                                		 $sql = mysql_query("SELECT discount_rate FROM billing_sales WHERE sales_id='$sales_id'") or die(mysql_error());

			                                		 		while($row = mysql_fetch_object($sql))
			                                		 		{
					                                			print'<tr>';
																print'<th></th>';
																print'<th></th>';
																print'<th></th>';
																print'<th></th>';
																print'<td><strong>Discount (Rs)</strong></td>';
																print'<th>'.$row->discount_rate.'</th>';
																print'<td></td>';
																print'</tr>';
													}
												?>
												<?php 
			                                		$sql = mysql_query("SELECT cast(sum((product_price*billing_qty)*(SELECT member_discount FROM billing_sales WHERE sales_id='$sales_id')/100) AS DECIMAL(18, 2)) AS discount_member FROM billing_sales_order WHERE sales_id='$sales_id' AND category_name='Service'") or die(mysql_error());

			                                		 		while($row = mysql_fetch_object($sql))
			                                		 		{
					                                			print'<tr>';
																print'<th></th>';
																print'<th></th>';
																print'<th></th>';
																print'<th></th>';
																print'<td><strong>Member Discount (Rs)</strong></td>';
																print'<th>'.$row->discount_member.'</th>';
																print'<td></td>';
																print'</tr>';
													}
												?>
												<?php 
			                                		 $sql = mysql_query("SELECT cast(sum(product_price*billing_qty)-(SELECT coalesce(sum(product_price*billing_qty),0)*(SELECT member_discount/100 FROM billing_sales WHERE sales_id='$sales_id') FROM billing_sales_order WHERE sales_id='$sales_id' AND category_name='Service') AS decimal(18, 2))-(SELECT discount_rate FROM billing_sales WHERE sales_id='$sales_id') AS sales_amount FROM billing_sales_order WHERE sales_id='$sales_id'") or die(mysql_error());

			                                		 		while($row = mysql_fetch_object($sql))
			                                		 		{
					                                			print'<tr>';
																print'<th></th>';
																print'<th></th>';
																print'<th></th>';
																print'<th></th>';
																print'<td><strong>Gross Total</strong></td>';
																print'<th>'.$row->sales_amount.'</th>';
																print'<td></td>';
																print'</tr>';
													}
												?>
											</tbody>
										</table><br>
											<?php 
												$sales_id = $_GET['sales_id'];
									            $sql = mysql_query("SELECT sales_id, cast(sum(product_price*billing_qty)-(SELECT coalesce(sum(product_price*billing_qty),0)*(SELECT member_discount/100 FROM billing_sales WHERE sales_id='$sales_id') FROM billing_sales_order WHERE sales_id='$sales_id' AND category_name='Service') AS decimal(18, 2))-(SELECT discount_rate FROM billing_sales WHERE sales_id='$sales_id') AS sales_amount FROM billing_sales_order WHERE sales_id='$sales_id'") or die(mysql_error());
									                while($row = mysql_fetch_object($sql))
									                {
									        ?>
									        	<form class="form-horizontal" action="sales_checkout_verification.php" method="POST">
									        		<div class="col-md-1">
									        			<input class="col-md-6" type="hidden" name="sales_id" value="<?php print ''.$row->sales_id.''?>">
									        			<input class="col-md-6" type="hidden" name="sales_amount" value="<?php print ''.$row->sales_amount.''?>">
									        		</div>
									        		<div class="col-md-3" style="padding-left: 100px;">
														<select data-plugin-selectTwo class="form-control populate" name="service_by" style="height: 40px;">
															<option value="">Service By</option>
															<?php
																$sql5 = mysql_query("SELECT * FROM helloworld.billing_employee") or die(mysql_error());
																while($row5 = mysql_fetch_object($sql5))
																{
																	print '<option value="'.$row5->employee_first_name.'">'.$row5->employee_first_name.' </option>';
																}
															?>
		                                    			</select>
		                                    		</div>
									        		<div class="col-md-3" style="padding-right: 100px;">
														<select class="form-control" name="payment_type" style="height: 40px;">
															<option value="Cash">Cash</option>
					                                       	<option value="Card">Card</option>
		                                    			</select>
		                                    		</div>
		                                    		<div class="col-md-3" style="padding-right: 100px;">
														<input class="col-md-6 form-control" type="number" name="recieved_amount" placeholder="Enter Recieved Amount" style="height: 40px;" required="">
		                                    		</div>
									        		<div class="form-group" style="padding-left: 220px;">
									        			<button class="btn btn-primary" type="submit" name="submit5">Submit</button>
									        		</div>
												</form>
											<?php } ?>
									</div>
									 	<div class="panel-body">
										<form class="form-horizontal form-bordered" action="add_member.php" method="POST">
											<div class="form-group">
												<label class="col-md-3 control-label">Member Search</label>
												<div class="col-md-6">
													<select data-plugin-selectTwo class="form-control populate" name="member_card" required>
														<option selected="" disabled="">Select Product</option>
															<?php
																$sql5 = mysql_query("SELECT * FROM helloworld.billing_member WHERE member_valid_upto>1") or die(mysql_error());
																while($row5 = mysql_fetch_object($sql5))
																{
																	print '<option value="'.$row5->member_card.'">'.$row5->member_card.' , '.$row5->member_phone.'</option>';
																}
															?>
													</select>
												</div>
													<?php   
														$sales_id = $_GET['sales_id'];
														$sql = mysql_query("SELECT sales_id FROM billing_sales WHERE sales_id='$sales_id'") or die(mysql_error());
										                while($row = mysql_fetch_object($sql))
			                                                    { 
			                                                        print '<input type="hidden" value="'.$row->sales_id.'" name="sales_id">';
			                                                    }
			                                        ?>
												<div class="col-md-1">
													<button class="btn btn-primary" type="submit" name="submitmember">Search</button>
												</div>
											</div>
										</form>
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