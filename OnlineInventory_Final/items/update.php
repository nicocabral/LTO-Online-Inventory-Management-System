<?php
require_once 'dbconfig.php';

	
	if($_POST)
	{
		$itemno = $_POST['itemno'];
		$unit = $_POST['unit'];
		$itemname = $_POST['itemname'];
		$des= $_POST['des'];
		$u_cost	=$_POST['u_cost'];
		$t_cost	=$_POST['t_cost'];
		$sup	=$_POST['sup'];
		$r_supply	=$_POST['r_supply'];
		$date	=$_POST['date'];
		
		$stmt = $db_con->prepare("UPDATE tbl_supplies SET unit=:a, itemname=:b, description=:c , unit_cost =:d, total_cost=:e, supplier=:f, remaining_supply =:g, arrival_date=:h  WHERE itemno=:itemno");
		$stmt->bindParam(":a", $u_cost);
		$stmt->bindParam(":b", $itemname);
		$stmt->bindParam(":c", $des);
		$stmt->bindParam(":d", $u_cost);
		$stmt->bindParam(":e", $t_cost);
		$stmt->bindParam(":f", $sup);
		$stmt->bindParam(":g", $r_supply);
		$stmt->bindParam(":h", $date);
		$stmt->bindParam(":itemno", $itemno);
		if($stmt->execute())
		{
			echo "Successfully updated";
		}
		else{
			echo "Query Problem";
		}
	}

?>