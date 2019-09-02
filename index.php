<?php 
session_start();
if(isset($_SESSION['logged_id']))
{
	header("Location:user_home.php");
}
else {
	header("Location:user_login.php");
}

?>


