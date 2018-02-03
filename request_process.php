<?php
	session_start();
    include('includes/dbconn.php');

       	$itemno =mysql_real_escape_string( $_POST['itemno']);
		$itemname =mysql_real_escape_string( $_POST['itemname']);
		$desc = mysql_real_escape_string($_POST['desc']);
		$rqty = mysql_real_escape_string($_POST['rqty']);
		$reqqty =mysql_real_escape_string( $_POST['reqqty']);
		$reqby = mysql_real_escape_string($_POST['reqby']);
		$dateclaim =mysql_real_escape_string( $_POST['dateclaim']);
		$date =mysql_real_escape_string( date('Y-m-d'));
		$status =mysql_real_escape_string( 'new');
        
			$sql = "INSERT INTO tbl_requestitem VALUES(NULL,'$itemno','$itemname','$desc','$reqqty','$reqby','$dateclaim','$date','$status')" or die(mysql_error());
			$result = mysql_query($sql); 
			
			if($result) {
				echo '<script>
						$("#logMsg").empty();
						$("#logMsg").removeClass();
						$("#logMsg").addClass("alert alert-success");
						$("#logMsg").html("<center>Your request has been sent.</center>");
						window.location="index.php";
					</script>';
					
					$new_qty = $rqty - $reqqty;
					$sql_r = mysql_query("UPDATE tbl_supplies SET remaining_supply='$new_qty' WHERE itemno=$itemno") or die(mysql_error());

				exit();	
			} else {
				echo '<script>
					$("#logMsg").empty();
					$("#logMsg").removeClass();
					$("#logMsg").addClass("alert alert-warning");
					$("#logMsg").html("<center>Error has found!.</center>");
				</script>';
				exit();
			}
		
	mysql_close($con);

?>