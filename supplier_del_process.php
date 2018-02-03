<?php
	include('includes/dbconn.php');
	$suppno = $_POST['suppno'];
	mysql_query("DELETE FROM tbl_supplier WHERE suppno='$suppno'") or die(mysql_error());
?>