<?php
	include('includes/dbconn.php');
	$itemno = mysql_real_escape_string($_POST['itemno']);
	$stockno =mysql_real_escape_string($_POST['stock_no']);
	$qty = mysql_real_escape_string($_POST['qty']);
	$unit = mysql_real_escape_string($_POST['unit']);
	$itmname =mysql_real_escape_string( $_POST['itmname']);
	$des	=mysql_real_escape_string($_POST['des']);
	$ucost	=mysql_real_escape_string($_POST['ucost']);
	$tcost	=mysql_real_escape_string($_POST['tcost']);
	$supp	=mysql_real_escape_string($_POST['select']);
	$rsup	=mysql_real_escape_string($_POST['rsup']);
	$date	=mysql_real_escape_string($_POST['date']);
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