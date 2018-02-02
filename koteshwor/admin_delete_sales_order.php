<?php
	include('common/connect.php');
	$sales_order_id=$_GET['sales_order_id'];
	$sales_id = $_GET['sales_id'];
	//edit qty

	$sql = mysql_query("DELETE FROM billing_sales_order where sales_order_id='$sales_order_id'")
												or die(mysql_error($sql));
												
	@header("location:running_sales_edit.php?sales_id=$sales_id");
?>