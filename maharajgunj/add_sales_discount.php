<?php 
session_start();
include('common/connect.php');
if(isset($_SESSION["systemadmin"])=='')
header('location: login.php');
?>
<?php
	if(isset($_POST['submit3']))
	{
		$sales_id = $_GET['sales_id'];
		$sales_id = $_POST['sales_id'];
		$discount_rate = $_POST['discount_rate'];
		$discount_reason = $_POST['discount_reason'];


	//edit qty
			$sql1 = "UPDATE billing_sales SET sales_id='$sales_id', discount_rate='$discount_rate', discount_reason='$discount_reason' WHERE sales_id='$sales_id' ";
  	mysql_query($sql1);

		@header("location:sales.php?sales_id=$sales_id");
	}
?>