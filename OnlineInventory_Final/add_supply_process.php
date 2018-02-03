<?php 
	include('includes/dbconn.php');
		$stockno =	$_POST['stockno'];
		$q	=	$_POST['qty'];
		$unit = $_POST['unit'];
		$itemname = $_POST['itemname'];
		$desc = $_POST['desc'];
		$u_cost = $_POST['u_cost'];
		$supplier = $_POST['select'];
		$qty = $_POST['qtyu'];
		$date = date('Y-m-d');
		$serial_no = $_POST['serialno'];

		$result = mysql_query("INSERT INTO tbl_supplies VALUES(NULL, '$stockno', '$q', '$unit','$itemname','$desc','$u_cost','$supplier','$qty','$date','$serial_no')") or die(mysql_error());
		if($result){
			echo'<script>window.alert("New item has been added.");
			window.location="stockcard.php"</script>';
			}else {echo '<script>  window.alert("Error Adding supply");</script>';}
			exit();
?>