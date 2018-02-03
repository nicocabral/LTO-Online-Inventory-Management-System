<?php  session_start();
        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
			echo "<script>window.location.assign('../login.php')</script>";}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LTO - Inventory System /Items Supply</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link href="assets/datatables.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="assets/jquery-1.11.3-jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	$("#btn-view").hide();
	
	$("#btn-add").click(function(){
		$(".content-loader").fadeOut('slow', function()
		{
			$(".content-loader").fadeIn('slow');
			$(".content-loader").load('add_form.php');
			$("#btn-add").hide();
			$("#btn-view").show();
		});
	});
	
	$("#btn-view").click(function(){
		
		$("body").fadeOut('slow', function()
		{
			$("body").load('index.php');
			$("body").fadeIn('slow');
			window.location.href="index.php";
		});
	});
	
});
</script>

</head>

<body>
    <br />

  <div class="container-fluid">
      
        <h2 class="form-signin-heading"><strong>Item(s) Record</strong>.</h2><p align="right"> <?php echo '<script> document.write(Date());</script>';?></p><hr />
        <button class="btn btn-info" type="button" id="btn-add"> <span class="glyphicon glyphicon-pencil"></span> &nbsp; Add Item</button>
        <a href="../stockcard.php"><button class="btn btn-success">Back to Item Dashboard</button></a>
        <button class="btn btn-info" type="button" id="btn-view"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View Item(s)</button>
        <a href="../print.php"><button class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</button></a>
        <hr />
        
        <div class="content-loader">
        <table cellspacing="0" width="100%" id="example" class="table table-bordered table-hover table-responsive">
        <thead>
        <tr class="success">
        <th>Item no</th>
        <th>Unit</th>
        <th>Item Name</th>
        <th>Description</th>
        <th>Unit Cost</th>
        <th>Total Cost</th>
        <th>Supplier</th>
        <th>Remaining Supply</th>
        <th>Arrival Date</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'dbconfig.php';
        
        $stmt = $db_con->prepare("SELECT * FROM tbl_supplies ORDER BY itemno DESC");
        $stmt->execute();
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
			<td><?php echo $row['itemno']; ?></td>
			<td><?php echo $row['unit']; ?></td>
			<td><?php echo $row['itemname']; ?></td>
			<td><?php echo $row['description']; ?></td>
            <td><?php echo $row['unit_cost'];?></td>
			<td><?php echo $row['total_cost'];?></td>
			<td><?php echo $row['supplier'];?></td>
            <td><?php echo $row['remaining_supply'];?></td>
            <td><?php echo $row['arrival_date'];?></td>
			<td align="center">
			<a id="<?php echo $row['itemno']; ?>"  class="edit-link" href="#" title="Edit">
			<img src="edit.png" width="20px" /></a>
            </a> | <a id="<?php echo $row['itemno']; ?>" class="delete-link" href="#" title="Delete">
			<img src="delete.png" width="20px" />
            </a></td>
			</tr>
			<?php
		}
		?>
        </tbody>
        </table>
        
        </div>

    </div>
    
    <br />
    
    <div class="container-fluid">
      
        <div class="alert alert-info">
        <footer>
                        <p style="font-size:12px; text-align:right";> Copyright &copy; <em>Land Transportation Office - Inventory System</em> <?php echo date('Y');?></p>
                    </footer>
        </div>

    </div>
    

    
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/datatables.min.js"></script>
<script type="text/javascript" src="crud.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').DataTable();

	$('#example')
	.removeClass( 'display' )
	.addClass('table table-bordered');
});
</script>
</body>
</html>