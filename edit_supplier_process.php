<?php
	include('includes/dbconn.php');
	
	$id = mysql_real_escape_string($_POST['suppno']);
	$name	=mysql_real_escape_string($_POST['name']);
	$add	=mysql_real_escape_string($_POST['add']);
	$contact=mysql_real_escape_string($_POST['con']);
	$stat	=mysql_real_escape_string($_POST['stat']);
	$query="UPDATE tbl_supplier SET suppname='$name',
									address='$add',
									contact='$contact',
									status='$stat' where suppno='$id'" or die(mysql_error());
		$result=mysql_query($query);
		if($result){
			echo'<script>window.alert("Supplier Info has been updated!");
						 window.location="supplier.php";</script>';
			}
			else{
				echo'<script>window.alert("Error Updating Info");</script>';
				}
						
exit();
?>