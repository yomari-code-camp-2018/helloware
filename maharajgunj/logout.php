<?php
session_start();
unset($_SESSION["systemadmin"]);
$url = "login.php";
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url");
?>