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

?>