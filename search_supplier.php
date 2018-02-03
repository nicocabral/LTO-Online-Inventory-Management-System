<?php 
include('includes/dbconn.php');
$search = mysql_real_escape_string($_POST['select']);
$sql=mysql_query("SELECT * from tbl_supplier where suppname = '$search'") or die (mysql_error());
if($sql){
	echo'<script>window.alert("Data Found!");
					window.location.href="supplier.php";
	</script>';
	
	
	}


?>