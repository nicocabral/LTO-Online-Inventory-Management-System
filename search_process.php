<?php 
include('includes/dbconn.php');
$search =mysql_real_escape_string( $_POST['search']);
$sql=mysql_query("SELECT * from tbl_requestitem where itemno='$search'") or die(mysql_error());
$res=mysql_fetch_array($sql);
if(!$res){
	echo '<script>
		window.location="ris_stockcard.php";
		window.alert("No data found!");
	</script>';
	
	
exit();	}
else{
	echo'<script>window.alert("Data found!");
				window.location="ris_stockcard_searchresult.php";</script>';
	}
	exit();
	?>
           