<?php 
	include('includes/dbconn.php');
		$stockno =mysql_real_escape_string(	$_POST['stockno']);
		$srno	=mysql_real_escape_string($_POST['srno']);
		$q	=	mysql_real_escape_string($_POST['qty']);
		$unit = mysql_real_escape_string($_POST['unit']);
		$itemname =mysql_real_escape_string( $_POST['itemname']);
		$desc = mysql_real_escape_string($_POST['desc']);
		$u_cost =mysql_real_escape_string( $_POST['u_cost']);
		$supplier =mysql_real_escape_string( $_POST['select']);
		$qty = mysql_real_escape_string($_POST['qtyu']);
		$date = mysql_real_escape_string(date('Y-m-d'));
		
		$result = mysql_query("INSERT INTO tbl_supplies VALUES(NULL, '$stockno', '$q', '$unit','$itemname','$desc','$u_cost','$supplier','$qty','$date','$srno')") or die(mysql_error());
		if($result){
			echo'<script>window.alert("Supplies successfully addded!");
			window.location="stockcard.php"</script>';
			}else {echo '<script>  window.alert("Error Adding supply");</script>';}
			exit();
?>