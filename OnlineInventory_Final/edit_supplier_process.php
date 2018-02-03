<?php
	include('includes/dbconn.php');
	
	$id = $_POST['suppno'];
	$name	=$_POST['suppname'];
	$add	=$_POST['add'];
	$contact=$_POST['con'];
	$stat	=$_POST['stat'];
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