<?php 
	session_start();
    include('common/connect.php');
	if(isset($_SESSION["systemadmin"])=='')
	header('location: index.php');
	
	if(isset($_POST['submit']))
	{
		$sales_id = $_GET['sales_id'];
	}
?>
<html>
	<head>

		<title>Hello Ware | Team Hello World</title>
		
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<!--Link Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png" />
		<!-- Invoice Print Style -->
		<link rel="stylesheet" href="assets/stylesheets/invoice-print.css" />
	</head>
	<body>
			<div class="invoice">
				<header class="clearfix">
					<div class="row">
						<h2 style="font-size: 14px;">Laxmee Hair & Beauty Studio Cum Academy</h2>
						<h5 style="padding-left: 20px; font-size: 15px;">Koteshwor, Kathmandu, PH: 01-5100736</h5>
						<h5 style="padding-left: 120px; font-size: 15px;">Sales Receipt</h5>
						<div class="col-md-2" style="float: left;">
							<h6 style="font-size: 14px; ">Bill No: <?php $sales_id=$_GET['sales_id']; $sql = mysql_query("SELECT * FROM billing_sales WHERE sales_id='$sales_id'") or die(mysql_error()); while($row = mysql_fetch_object($sql)) { print ''.$row->sales_id.'';} ?> Date: <?php $sql = mysql_query("SELECT *, date(billing_date) AS salesdate FROM billing_sales_order WHERE sales_id='$sales_id' LIMIT 1") or die(mysql_error()); while($row = mysql_fetch_object($sql)){ print ''.$row->salesdate.''; } ?></h6>
							<h6 style="font-size: 14px;">Time: <?php $sql = mysql_query("SELECT *, time(billing_date) AS salestime FROM billing_sales_order WHERE sales_id='$sales_id' LIMIT 1") or die(mysql_error());
								while($row = mysql_fetch_object($sql)){ print ''.$row->billing_time.''; } ?></h6>
							<h6 style="font-size: 14px;">Cashier: <?php $user_name=$_SESSION["systemadmin"]; $sql="SELECT * from billing_user where user_name='$user_name'"; $result=mysql_query($sql); while(@$row =mysql_fetch_assoc($result)){ ?> <?php echo $row["first_name"]; } ?></h6>
						</div>
						
					</div>
				</header>
					<div class="table-responsive">
						<table class="table invoice-items">
							<thead>
								<tr>
									<th style="font-size: 14px; text-align: center;">S.N</th>
									<th style="font-size: 14px; text-align: center;">Particular</th>
									<th style="font-size: 14px;">Rate</th>
									<th style="font-size: 14px;">Qty</th>
									<th style="font-size: 14px;">Amount</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sales_id=$_GET['sales_id'];
									$sql = mysql_query("SELECT *, sum(product_price*billing_qty) AS ttotal, sum(billing_qty) AS billing_qty FROM billing_sales_order WHERE sales_id='$sales_id' GROUP BY product_name") or die(mysql_error());
					                $counter=0;
					                while($row = mysql_fetch_object($sql))
					                {
					                    print '<tr>';
					                    print '<td style="font-size: 13px; text-align: center;">'.++$counter.'</td>';
					                    print '<td style="font-size: 13px;">'.$row->product_name.'</td>';
					                    print '<td style="font-size: 13px;">'.$row->product_price.'</td>';
					                    print '<td style="font-size: 13px;">'.$row->billing_qty.'</td>';
					                    print '<td style="font-size: 13px;">'.$row->ttotal.'</td>';
					                    print '</tr>';
					                }
					            ?>
				            </tbody>
				        </table>
					</div>
			<div class="invoice-summary">
				<div class="row">
					<div class="col-sm-2 col-sm-offset-8">
						<table class="table h5 text-dark">
							<tbody>
								<tr class="b-top-none">
									<td style="font-size: 16px;">Total</td>
									<td class="text-right">
										<?php
											{
	                                        $sql = mysql_query("SELECT sum(billing_qty*product_price) AS tran_total FROM billing_sales_order WHERE sales_id='$sales_id'") or die(mysql_error());

			                                		 		while($row = mysql_fetch_object($sql))
	                                            
	                                            print '<td>&nbsp;'.$row->tran_total.'</td>';
	                                            
	                                        }
	                                    ?>
                                    </td>
                                </tr>
								<tr class="b-top-none">
									<td style="font-size: 16px;">Discount</td>
									<td class="text-right">
										<?php
											
	                                       $sql = mysql_query("SELECT discount_rate FROM billing_sales WHERE sales_id='$sales_id'") or die(mysql_error());

			                               	while($row = mysql_fetch_object($sql))
	                                        {
	                                            
	                                            print '<td>&nbsp;'.$row->discount_rate.'</td>';
	                                            
	                                        }
	                                    ?>
                                    </td>
								</tr>
								<tr class="b-top-none">
									<td style="font-size: 16px;">M.Discount</td>
									<td class="text-right">
										<?php
											
	                                       $sql = mysql_query("SELECT cast(sum((product_price*billing_qty)*(SELECT member_discount FROM billing_sales WHERE sales_id='$sales_id')/100) AS DECIMAL(18, 2)) AS discount_member FROM billing_sales_order WHERE sales_id='$sales_id' AND category_name='Service'") or die(mysql_error());

			                                while($row = mysql_fetch_object($sql))
			                                		 		
	                                        {
	                                            
	                                            print '<td>&nbsp;'.$row->discount_member.'</td>';
	                                            
	                                        }
	                                    ?>
                                    </td>
								</tr>
								<tr class="b-top-none">
									<td style="font-size: 16px;">G.Total</td>
									<td class="text-right">
										<?php
											
	                                      $sql = mysql_query("SELECT cast(sum(product_price*billing_qty)-(SELECT coalesce(sum(product_price*billing_qty),0)*(SELECT member_discount/100 FROM billing_sales WHERE sales_id='$sales_id') FROM billing_sales_order WHERE sales_id='$sales_id' AND category_name='Service') AS decimal(18, 2))-(SELECT discount_rate FROM billing_sales WHERE sales_id='$sales_id') AS grand_total FROM billing_sales_order WHERE sales_id='$sales_id'") or die(mysql_error());

			                               	while($row = mysql_fetch_object($sql))
	                                        {
	                                            
	                                            print '<td>&nbsp;'.$row->grand_total.'</td>';
	                                            
	                                        }
	                                    ?>
                                    </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<p class="text-uppercase" style=" padding-left: 90px; font-size: 14px;">We are also available at</p>
			<p style=" padding-left: -5px; font-size: 14px;">Maharajgunj: 01-4016099 & Pulchowk: 01-5520907</p>
			<p style=" padding-left: 70px; font-size: 14px;">***Thank You Visit Again***</p>
		</div>

		<script>
			window.print();
		</script>
	</body>
</html>