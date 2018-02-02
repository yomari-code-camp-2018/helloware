<?php 
include('common/connect.php');
session_start();
if(isset($_SESSION["systemadmin"])=='')
header('location: login.php');
?>
<?php
	if(isset($_POST['submitmember']))
	{
		$sales_id = $_GET['sales_id'];
		$member_card = $_GET['member_card'];
		$member_card = $_POST['member_card'];
		$sales_id = $_POST['sales_id'];
	//edit qty
        $sql = mysql_query("UPDATE billing_sales SET member_card='$member_card' WHERE sales_id='$sales_id'")or die(mysql_error($sql));
		
		$sql1 = mysql_query("UPDATE billing_sales SET member_name=(SELECT member_name FROM helloworld.billing_member WHERE member_card='$member_card'), member_discount=(SELECT member_discount FROM helloworld.billing_member WHERE member_card='$member_card') WHERE sales_id='$sales_id'")or die(mysql_error($sql1));
		
		header("location:sales.php?sales_id=$sales_id");
	}
?>