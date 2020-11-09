<?php session_start();

if(!isset(  $_SESSION["loggedIn"]))
{
	$_SESSION["CurrentTab"]  = "main";
}

if(!isset(  $_SESSION["loggedIn"]))
{
	$_SESSION["loggedIn"]  = false;
}
if($_SESSION["loggedIn"] == true)
{
	//echo "You are logged in";
}
else{
	//echo "You are not logged in";
}

?>
