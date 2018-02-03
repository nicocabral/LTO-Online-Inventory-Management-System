<?php 
	include('includes/dbconn.php');
	$name = mysql_real_escape_string($_GET['name']);
	$complete = 'completed';
	$up_result = mysql_query("UPDATE tbl_requestitem SET status = '$complete' WHERE requestby = '$name'");
	if($up_result){
		echo '<script>
				window.alert("Request Completed.")
				window.location = "notification.php";
			 </script>';
	}else{

		die(mysql_error());
	}
?>