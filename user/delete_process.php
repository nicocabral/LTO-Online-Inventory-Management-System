<?php
	include('../includes/dbconn.php');
	$del = mysql_real_escape_string($_POST['request_id']);
	mysql_query("DELETE FROM tbl_requestitem WHERE request_id='$del'") or die(mysql_error());
?>