<?php
include_once 'dbconfig.php';

if($_GET['edit_id'])
{
	$id = $_GET['edit_id'];	
	$stmt=$db_con->prepare("SELECT * FROM tbl_supplies WHERE itemno =:id");
	$stmt->execute(array(':id'=>$id));	
	$row=$stmt->fetch(PDO::FETCH_ASSOC);

}
?>
<style type="text/css">
#dis{
	display:none;
}
</style>


	
    
    <div id="dis">
    
	</div>
        
 	
	 <form method='post' id='emp-UpdateForm' action='#'>
 
    <table class='table table-bordered'>
 		<input type='hidden' name='itemno' value='<?php echo $row['itemno']; ?>' />
        <tr>
            <td>Unit</td>
            <td><input type='text' name='unit' class='form-control' value='<?php echo $row['unit']; ?>' required></td>
        </tr>
 
        <tr>
            <td>Item Name</td>
            <td><input type='text' name='itemname' class='form-control' value='<?php echo $row['itemname']; ?>' required></td>
        </tr>
 
        <tr>
            <td>Description</td>
            <td><textarea name='des' class='form-control' value='<?php echo $row['description']; ?>' required> </textarea></td>
        </tr>
        <tr>
        	<td>Unit Cost</td>
            <td><input type='text' name='u_cost' class='form-control' value='<?php echo $row['unit_cost']; ?>' required></td>
        </tr>
         <tr>
        	<td>Total Cost</td>
            <td><input type='text' name='t_cost' class='form-control' value='<?php echo $row['total_cost']; ?>' required></td>
        </tr>
         <tr>
        	<td>Supplier</td>
            <td><input type='text' name='sup' class='form-control' value='<?php echo $row['supplier']; ?>' required></td>
        </tr>
         <tr>
        	<td>Remaining Supply</td>
            <td><input type='text' name='r_supply' class='form-control' value='<?php echo $row['remaining_supply']; ?>' required></td>
        </tr>
         <tr>
        	<td>Arrival Date</td>
            <td><input type='date' name='date' class='form-control' value='<?php echo $row['arrival_date']; ?>' required></td>
        </tr>
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-update" id="btn-update">
    		<span class="glyphicon glyphicon-plus"></span> Save Updates
			</button>
            </td>
        </tr>
 
    </table>
</form>
     
