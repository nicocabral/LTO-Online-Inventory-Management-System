<?php  session_start();
        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
			echo "<script>window.location.assign('../login.php')</script>";}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LTO - Inventory System / Supplier</title>
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
      
        <h2 class="form-signin-heading"><strong>Supplier Records.</strong></h2><p align="right"> <?php echo '<script> document.write(Date());</script>';?></p><hr />
        <a href="../stockcard.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-backward"></span>&nbsp;Back to homepage</button></a>
        <button class="btn btn-info" type="button" id="btn-add"> <span class="glyphicon glyphicon-pencil"></span> &nbsp; Add Supplier</button>
        
         <a href="../print_supplier.php"><button class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</button></a>
        <button class="btn btn-info" type="button" id="btn-view"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View Supplier</button>
        <hr />
        
        <div class="content-loader">
        
        <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
        <th>Supplier ID</th>
        <th>Supplier Name</th>
        <th>address</th>
        <th>Contact</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'dbconfig.php';
        
        $stmt = $db_con->prepare("SELECT * FROM tbl_employees ORDER BY emp_id DESC");
        $stmt->execute();
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
			<td><?php echo $row['emp_id']; ?></td>
			<td><?php echo $row['emp_name']; ?></td>
			<td><?php echo $row['emp_dept']; ?></td>
			<td><?php echo $row['emp_salary']; ?></td>
            <td><?php echo $row['status'];?></td>
			<td align="center">
			<a id="<?php echo $row['emp_id']; ?>" class="edit-link" href="#" title="Edit">
			<img src="edit.png" width="20px" />
            </a> | <a id="<?php echo $row['emp_id']; ?>" class="delete-link" href="#" title="Delete">
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