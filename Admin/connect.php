<?php

$con = mysql_connect("localhost", "root", "");

if (!$con)
{
	die("error in database connection");
}

$db = mysql_select_db ("helloworld");

if (!$db)
{
	die("Error in Database Selection");
}
function isLoginSessionExpired() 
	{
		$login_session_duration = 10000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000; 
		$current_time = time(); 
		if(isset($_SESSION['loggedin_time']) and isset($_SESSION["systemadmin"])){  
			if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
				return true; 
			} 
		}
		return false;
	}

		if(isset($_SESSION["systemadmin"])) 
		{
			if(isLoginSessionExpired()) {
				header("Location:logout.php?session_expired=1");
			}
		}

?>