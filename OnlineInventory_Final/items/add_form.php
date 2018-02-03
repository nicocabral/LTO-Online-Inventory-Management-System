
<style type="text/css">
#dis{
	display:none;
}
</style>


	
    
    <div id="dis">
    <!-- here message will be displayed -->
	</div>
        
 	
	 <form method='post' id='emp-SaveForm' action="#">
 
    <table class='table table-bordered'>
 
        <tr>
            <td>Item no</td>
            <td><input type='text' name='itmno' class='form-control' placeholder='Item no' required /></td>
        </tr>
 
        <tr>
            <td>Unit</td>
            <td><input type='text' name='unit' class='form-control' placeholder='Unit og measure' required></td>
        </tr>
 
        <tr>
            <td>Item name</td>
            <td><input type='text' name='itmname' class='form-control' placeholder='Item name' required></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type='text' name='des' class='form-control' placeholder='Description' required></td>
        </tr>
        </tr>
        <tr>
            <td>Unit Cost</td>
            <td><input type='text' name='u_cost' class='form-control' placeholder='Unit Cost' required></td>
        </tr>
        </tr>
        <tr>
            <td>Total Cost</td>
            <td><input type='text' name='t_cost' class='form-control' placeholder='Total Cost' required></td>
        </tr>
        </tr>
        <tr>
            <td>Supplier</td>
            <td><input type='text' name='suplier' class='form-control' placeholder='Supplier name' required></td>
        </tr>
        </tr>
        <tr>
            <td>Remaining Supply</td>
            <td><input type='text' name='r_supply' class='form-control' placeholder='Remaining Supply' required></td>
        </tr>
        </tr>
        <tr>
            <td>Arrival Date</td>
            <td><input type='date' name='date' class='form-control' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Save this Record
			</button>  
            </td>
        </tr>
 
    </table>
</form>
     
