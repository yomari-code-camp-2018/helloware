<?php 
session_start();
include('common/connect.php');
if(isset($_SESSION["systemadmin"])=='')
header('location: login.php');
?>
<?php
	if(isset($_POST['submit2']))
	{
		@$sales_id = $_GET['sales_id'];
		@$product_id = $_GET['product_id'];
		$product_id = $_POST['product_id'];
		$sales_id = $_POST['sales_id'];
		$billing_qty = $_POST['billing_qty'];
        $stock_out = $_POST['billing_qty'];
        $service_by = $_POST['service_by'];

	
		$sql1 = mysql_query("INSERT INTO billing_sales_order (sales_id, product_id, product_name, category_name, product_price, billing_qty, billing_date, billing_time, service_by) VALUES('$sales_id', '$product_id', (SELECT product_name FROM helloworld.billing_product WHERE product_id='$product_id'), (SELECT category_name FROM helloworld.billing_product WHERE product_id='$product_id'), (SELECT product_price FROM helloworld.billing_product WHERE product_id='$product_id'), '$billing_qty', curdate(), curtime(), '$service_by')")
			or die(mysql_error($sql1));

		$sql = mysql_query("INSERT INTO billing_stock (sales_order_id, product_name, category_name, stock_out) VALUES((SELECT sales_order_id FROM billing_sales_order ORDER BY sales_order_id DESC LIMIT 1), (SELECT product_name FROM helloworld.billing_product WHERE product_id='$product_id'), (SELECT category_name FROM helloworld.billing_product WHERE product_id='$product_id'), '$billing_qty')")
			or die(mysql_error($sql));

		$sql2 = mysql_query("DELETE FROM billing_stock WHERE category_name='Service'")
			or die(mysql_error($sql2));

		header("location:sales.php?sales_id=$sales_id");
	}
?>