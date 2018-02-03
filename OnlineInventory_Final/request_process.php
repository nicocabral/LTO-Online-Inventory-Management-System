<?php
	session_start();
    include('includes/dbconn.php');

       	$itemno = $_POST['itemno'];
		$itemname = $_POST['itemname'];
		$desc = $_POST['desc'];
		$rqty = $_POST['rqty'];
		$reqqty = $_POST['reqqty'];
		$reqby = $_POST['reqby'];
		$dateclaim = $_POST['dateclaim'];
		$date = date('Y-m-d');
		$status = 'new';
        
			$sql = "INSERT INTO tbl_requestitem VALUES(NULL,'$itemno','$itemname','$desc','$rqty','$reqqty','$reqby','$date','$dateclaim','$status')" or die(mysql_error());
			$result = mysql_query($sql); 
			
			if($result) {
				echo '<script>
						$("#logMsg").empty();
						$("#logMsg").removeClass();
						$("#logMsg").addClass("alert alert-success");
						$("#logMsg").html("<center>Your request has been sent.</center>");
						window.location="index.php";
					</script>';
					
					// $new_qty = $rqty - $reqqty;
					// $sql_r = mysql_query("UPDATE tbl_supplies SET remaining_supply='$new_qty' WHERE itemno=$itemno") or die(mysql_error());

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