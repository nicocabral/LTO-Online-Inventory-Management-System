<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password']))
{
  echo "<script>window.location.assign('../login.php')</script>";
}

	require_once 'dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userpic FROM user WHERE id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userpic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM user WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: index.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>LTO - Inventory system/User account</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
</head>

<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
        <br />
           <p style="float:right; text-align:right"><?php echo '<script> document.write(Date());</script>'?></p>
        </div>
 
    </div>
</div>

<div class="container">

	<div class="page-header">
    	<h2>Admin account settings. | 
         <a href="../index.php" data-toggle="tooltip" title="Back to Homepage" class="btn btn-danger">Back to home</a>
        
        </h2>
       
            
    </div>
    
<br />

<div class="row">
<?php
	
	$stmt = $DB_con->prepare('SELECT id, name, address, contact, position, office, username, password, userpic FROM user ORDER BY id DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
            
			<div class="col-xs-3">
				<p class="page-header"><?php echo $username."&nbsp;/&nbsp;".$position; ?></p>
				<img src="user_images/<?php echo $row['userpic']; ?>" class="img-rounded" width="250px" height="250px" />
				<p class="page-header">
              
				<span>
				  <a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['id']; ?>"  onclick="return confirm('sure to edit ?')" data-toggle="tooltip" title="click for edit"><span class="glyphicon glyphicon-edit" ></span> Edit</a> 
				<?php /*?><a class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a><?php */?>
				
                </span>
			
                </p>
			</div> 
            
            <div class="col-xs-4">
            <table class="table table-striped">
            <tr>
            <td align="center"><p> Account ID:</p></td></tr> 
            <tr><td align="center"><p>Account name: </p></td></tr>
            <tr><td align="center"><p>Address:</p></td></tr>
            <tr><td align="center"><p>Contact:</p></td></tr>
            <tr><td align="center"><p>Position:</p></td></tr>
            <tr><td align="center"><p>Office: </p></td></tr>
            <tr><td align="center"><p>Username:</p></td></tr>
            <tr><td align="center"><p>Password:</p></td></tr>
            </table>
            </div>
             <div class="col-xs-4">
       			 <table class="table table-striped">
            <tr>
            <td align="center"><p><strong><?php echo $row['id'];?></strong></p></td></tr> 
            <tr><td align="center"><p><strong><?php echo $row['name'];?></strong></p></td></tr>
            <tr><td align="center"><p><strong><?php echo $row['address'];?></strong></p></td></tr>
            <tr><td align="center"><p><strong><?php echo $row['contact'];?></strong></p></td></tr>
            <tr><td align="center"><p><strong><?php echo $row['position'];?></strong></p></td></tr>
            <tr><td align="center"><p><strong><?php echo $row['office'];?></strong></p></td></tr>
            <tr><td align="center"><p><strong><?php echo $row['username'];?></strong></p></td></tr>
             <tr><td align="center"><p><strong><?php
			 			echo $password;
			 ?></strong></p></td></tr>
            </table>
             </div>
         
            
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>
</div>	



<div class="alert alert-info">
    <footer>
                        <p style="font-size:12px; text-align:right";> Copyright &copy; <em>Land Transportation Office - Inventory System</em> <?php echo date('Y');?></p>
                    </footer>
</div>

</div>


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>