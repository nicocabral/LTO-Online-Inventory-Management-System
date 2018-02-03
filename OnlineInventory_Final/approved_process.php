<?php
	session_start();
    include('includes/dbconn.php');

    	$remaining_qty = $_POST['r_qty'];
    	$rqty = $_POST['rqty'];
    	$balance_qty = $remaining_qty - $rqty;
       	$itemno = $_POST['itemno'];
       	$req_id = $_POST['req'];
		$ok	='approved';
		
			$update = mysql_query("UPDATE tbl_supplies SET remaining_supply = $balance_qty WHERE itemno=$itemno") or die(mysql_error());
			$sql = "UPDATE tbl_requestitem SET remaining_qty = '$balance_qty', status = '$ok' where request_id='$req_id' " or die(mysql_error());
			$result = mysql_query($sql); 

			if($update&&$result){
				echo '<script>
						alert("Request has been approved");
						window.location="notification.php";
					</script>';
				
				exit();}	
				mysql_close($con);

?>