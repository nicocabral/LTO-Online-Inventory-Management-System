<?php
	session_start();
    include('includes/dbconn.php');

       	$req_id=$_POST['itemno'];
			$sql = ("UPDATE tbl_requestitem SET status = 'reject' where request_id='$req_id' ") or die(mysql_error());
			$result = mysql_query($sql); 
			if($result) {
				echo '<script>
						
						alert("Rejecting process");
						window.location="notification.php";
					</script>';
				exit();	
			} else {
				echo '<script>
					alert("Error Rejecting Request");
					window.location="notification.php";
				</script>';
				exit();
			}
		
	mysql_close($con);

?>