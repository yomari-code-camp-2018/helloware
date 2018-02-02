<?php 
session_start();
include('common/connect.php');
if(isset($_SESSION["systemadmin"])=='')
header('location: login.php');
?>
<?php
	if(isset($_POST['submit2']))
	{
		$purchase_id = $_GET['purchase_id'];
		$product_name = $_POST['product_name'];
		$purchase_id = $_POST['purchase_id'];
		$item_price = $_POST['item_price'];
		$item_quantity = $_POST['item_quantity'];
	//edit qty

		$sql = mysql_query("INSERT INTO billing_purchase_transaction (purchase_id, product_name, item_price, item_quantity, branch_name, transaction_type) VALUES('$purchase_id', '$product_name', '$item_price', '$item_quantity', 'Maharajgunj','Purchase')")
			or die(mysql_error($sql));

		$sql1 = mysql_query("INSERT INTO billing_stock (purchase_id, product_name, stock_in) VALUES('$purchase_id', '$product_name', '$item_quantity')")
			or die(mysql_error($sql1));	
			
		header("location:purchase.php?purchase_id=$purchase_id");
	}
?>