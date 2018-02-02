<?php 
session_start();
include('common/connect.php');;
if(isset($_SESSION["systemadmin"])=='')
header('location: login.php');
?>
<?php
	if(isset($_POST['submit5']))
	{
		$sales_id = $_GET['sales_id'];
		$sales_id = $_POST['sales_id'];
		$payment_type = $_POST['payment_type'];
		$sales_amount = $_POST['sales_amount'];
		$recieved_amount = $_POST['recieved_amount'];
		$service_by = $_POST['service_by'];


	//edit qty
			$sql1 = "UPDATE billing_sales SET sales_id='$sales_id', payment_type='$payment_type', sales_amount='$sales_amount', recieved_amount='$recieved_amount', service_by='$service_by' WHERE sales_id='$sales_id' ";
  	mysql_query($sql1);

		@header("location:create_sales.php");
	}
?>