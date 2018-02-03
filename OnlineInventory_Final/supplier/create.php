<?php
require_once 'dbconfig.php';

	
	if($_POST)
	{
		$emp_name = $_POST['emp_name'];
		$emp_dept = $_POST['emp_dept'];
		$emp_salary = $_POST['emp_salary'];
		$stat = $_POST['stat'];
		
		try{
			
			$stmt = $db_con->prepare("INSERT INTO tbl_employees(emp_name,emp_dept,emp_salary,status) VALUES(:ename, :edept, :esalary , :stat)");
			$stmt->bindParam(":ename", $emp_name);
			$stmt->bindParam(":edept", $emp_dept);
			$stmt->bindParam(":esalary", $emp_salary);
			$stmt->bindParam(":stat", $stat);
			
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