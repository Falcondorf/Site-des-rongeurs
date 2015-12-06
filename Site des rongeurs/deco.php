<?php
	session_start();
	
	session_unset();
	
	$_SESSION['user_logged'] = "0";
	
	header("Location:http://localhost/Site%20des%20rongeurs/index.php");
?>