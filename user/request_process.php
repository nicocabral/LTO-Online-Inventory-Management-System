<?php
	session_start();
    include('../includes/dbconn.php');

       	$itemno = $_POST['itemno'];
		$st_no 	= $_POST['stno'];
		$itemname = $_POST['itemname'];
		$desc = $_POST['desc'];
		$rqty = $_POST['rqty'];
		$reqqty = $_POST['reqqty'];
		$req_id = $_POST['reqid'];
		$reqby = $_POST['reqby'];
		$div_office = $_POST['div_office'];
		$dateclaim = $_POST['dateclaim'];
		$date = date('Y-m-d');
		$approved_by = '';
		$status = 'new';
		$r_qty='';
	
        
			$sql = "INSERT INTO tbl_requestitem VALUES(NULL,'$itemno','$st_no','$itemname','$desc','$reqqty', '$req_id', '$reqby','$r_qty','$div_office','$approved_by', '$dateclaim','$date','$status')" or die(mysql_error());
			$result = mysql_query($sql); 
			
			if($result) {
				echo '<script>
						$("#logMsg").empty();
						$("#logMsg").removeClass();
						$("#logMsg").addClass("alert alert-success");
						$("#logMsg").html("<center>Your request has been sent.</center>");
						window.location="index.php";
					</script>';
					
					//$new_qty = $rqty - $reqqty;
					//$sql_r = mysql_query("UPDATE tbl_supplies SET remaining_supply='$new_qty' WHERE itemno=$itemno") or die(mysql_error());

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