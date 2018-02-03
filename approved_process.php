<?php
	session_start();
    include('includes/dbconn.php');
	$itemno = $_POST['itemno'];
    	$remaining_qty =intval( $_POST['r_qty']);
    	$rqty = intval($_POST['rqty']);
    	$bal_qty = intval($remaining_qty) - intval($rqty);
       	$req_id = $_POST['req'];
		$ok	='approved';
		$approved_by = $_SESSION['name'];
		$new_bal=$bal_qty;
		//$stno = $_POST['stock_no'];
			
			$sql = "UPDATE tbl_requestitem SET remaining_qty = '$bal_qty', approved_by='$approved_by' , status = '$ok' where request_id='$req_id' " or die(mysql_error());
			$update = "UPDATE tbl_supplies SET remaining_supply = '$new_bal' WHERE itemno='$itemno'" or die(mysql_error());
			$update_s=mysql_query($update);
			$result = mysql_query($sql);
			if($update_s&&$result){
				echo '<script>
						alert("Request has been approved");
						window.location="notification.php";
					</script>';
				
				exit();}	
				mysql_close($con);

?>