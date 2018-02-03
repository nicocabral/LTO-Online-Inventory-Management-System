<?php
	include('includes/dbconn.php');
	$itemno = $_POST['itemno'];
	mysql_query("DELETE FROM tbl_supplies WHERE itemno='$itemno'") or die(mysql_error());
?>