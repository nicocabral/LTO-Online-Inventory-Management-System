<?php
	include('includes/dbconn.php');
	$itemno = $_POST['itemno'];
	$stockno =$_POST['stock_no'];
	$qty = $_POST['qty'];
	$unit = $_POST['unit'];
	$itmname = $_POST['itmname'];
	$des	=$_POST['des'];
	$ucost	=$_POST['ucost'];
	$tcost	=$_POST['tcost'];
	$supp	=$_POST['select'];
	$rsup	=$_POST['rsup'];
	$date	=$_POST['date'];
	$sql="UPDATE tbl_supplies set 
								  stock_no ='$stockno',
								  qty	= '$qty',
								  unit	= '$unit',
								  itemname	='$itmname',
								  description	='$des',
								  unit_cost	= '$ucost',
								  total_cost = '$tcost',
								  supplier = '$supp',
								  remaining_supply = '$rsup',
								  arrival_date = '$date' where itemno = '$itemno'" or die (mysql_error());
								  $result = mysql_query($sql);
						if($result){
							echo '<script>
								window.alert("Supplier successfully updated!");
								window.location="stockcard.php";
							
							</script>';
							
							
							}
						
						else{
							echo '<script>window.alert("Error updating supplies");</script>';
							
							}
						
exit();
?>