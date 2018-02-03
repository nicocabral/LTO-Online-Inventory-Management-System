<?php 
	include('includes/dbconn.php');

		$suppname =mysql_real_escape_string( $_POST['suppname']);
		$address =mysql_real_escape_string( $_POST['address']);
		$dprefixno =mysql_real_escape_string( $_POST['dprefixno']);
		$dtelno =mysql_real_escape_string( $_POST['dtelno']);
		$contact =mysql_real_escape_string( $dprefixno . $dtelno);
		$status = mysql_real_escape_string($_POST['status']);

		$result = mysql_query("INSERT INTO tbl_supplier VALUES(NULL,'$suppname','$address','$contact','$status')") or die(mysql_error());
		if($result){
			echo'<script>window.alert("Supplier Added!");
						 window.location="supplier.php";
			
			</script>';
			}else {echo '<script>window.alert("Error Adding supplier");</script>';}
		exit();
?>