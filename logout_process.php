<?php
	session_start();
	if(isset($_GET['logout'])) {
		unset ($_SESSION['id']);
		unset ($_SESSION['name']);
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		
	header('location:login.php');
	
	} else {
		echo mysql_error();
	}
?>