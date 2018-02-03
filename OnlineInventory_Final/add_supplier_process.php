<?php 
	include('includes/dbconn.php');

		$suppname = $_POST['suppname'];
		$address = $_POST['address'];
		$dprefixno = $_POST['dprefixno'];
		$dtelno = $_POST['dtelno'];
		$contact = $dprefixno . $dtelno;
		$status = $_POST['status'];

		$result = mysql_query("INSERT INTO tbl_supplier VALUES(NULL,'$suppname','$address','$contact','$status')") or die(mysql_error());
		if($result){
			echo'<script>window.alert("Supplier Added!");
						 window.location="supplier.php";
			
			</script>';
			}else {echo '<script>window.alert("Error Adding supplier");</script>';}
		exit();
?>