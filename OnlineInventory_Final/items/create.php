<?php
require_once 'dbconfig.php';

	
	if($_POST)
	{
		$itmno = $_POST['itmno'];
		$unit = $_POST['unit'];
		$itmname = $_POST['itmname'];
		$des = $_POST['des'];
		$u_cost  =$_POST['u_cost'];
		$t_cost = $_POST['t_cost'];
		$sup	=$_POST['suplier'];
		$r_supply	=$_POST['r_supply'];
		$date	=$_POST['date'];
		
		try{
			
			$stmt = $db_con->prepare("INSERT INTO tbl_supplies(itemno,unit,itemname,description,unit_cost,total_cost,supplier,remaining_supply,arrival_date) VALUES(:a, :b, :c , :d, :e, :f, :g, :h, :i)");
			$stmt->bindParam(":a", $itmno);
			$stmt->bindParam(":b", $unit);
			$stmt->bindParam(":c", $itmname);
			$stmt->bindParam(":d", $des);
			$stmt->bindParam(":e", $u_cost);
			$stmt->bindParam(":f", $t_cost);
			$stmt->bindParam(":g", $sup);
			$stmt->bindParam(":h", $r_supply);
			$stmt->bindParam(":i", $date);
			if($stmt->execute())
			{
				echo "Successfully Added";
			}
			else{
				echo "Query Problem";
			}	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>