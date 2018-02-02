<?php
	include('connect.php');
	$purchase_order_id=$_GET['purchase_order_id'];
	$purchase_id = $_GET['purchase_id'];
	//edit qty

	$sql = mysql_query("DELETE FROM billing_purchase_transaction WHERE purchase_order_id='$purchase_order_id'")
		or die(mysql_error($sql));
		
	header("location:purchase.php?purchase_id=$purchase_id");
?>