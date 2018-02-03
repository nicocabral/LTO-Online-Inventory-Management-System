<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset(intval($_GET['edit_id'])) && !empty(intval($_GET['edit_id'])))
	{
		$id = intval($_GET['edit_id']);
		$stmt_edit = $DB_con->prepare('SELECT name, address, contact, position, office, username, password, userpic FROM user WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset(mysql_real_escape_string($_POST['btn_save_updates'])))
	{
		$name	=mysql_real_escape_string($_POST['name']);
		$add	=mysql_real_escape_string($_POST['add']);
		$con	=mysql_real_escape_string($_POST['con']);
		$pos	=mysql_real_escape_string($_POST['pos']);
		$office	=mysql_real_escape_string($_POST['office']);
		$username =mysql_real_escape_string( $_POST['username']);// user name
		$pass = mysql_real_escape_string($_POST['password']);// user email
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['userpic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['userpic']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE user
									     SET name = :name,
										 	 address =:add,
											 contact =:con,
											 position =:pos,
											 office =:o,
										 	 username=:uname, 
										     password=:pass, 
										     userpic=:upic 
								       WHERE id=:uid');
			$stmt->bindParam(':name',$name);
			$stmt->bindParam(':add',$add);
			$stmt->bindParam(':con',$con);
			$stmt->bindParam(':pos',$pos);
			$stmt->bindParam(':o',$office);
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':pass',$pass);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='../index.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LTO - Inventory system / user setting - edit</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="jquery-1.11.3-jquery.min.js"></script>
</head>
<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
        <br />
           <p style="float:right"><?php echo '<script> document.write(Date());</script>'?></p>
        </div>
 
    </div>
</div>


<div class="container">


	<div class="page-header">
    	<h1 class="h2">Update Username and Password. <a class="btn btn-default" href="index.php"> All members </a></h1>
    </div>

<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">
     <tr>
    	<td><label class="control-label">Admin Name.</label></td>
        <td><input class="form-control" type="text" name="name" value="<?php echo $row['name'];?>" required /></td>
    </tr>
    <tr>
    	<td><label class="control-label">Address.</label></td>
        <td><input class="form-control" type="text" name="add" value="<?php echo $row['address'];?>" required /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Contact.</label></td>
        <td><input class="form-control" type="text" name="con" value="<?php echo $row['contact'];?>" required /></td>
    </tr>
    <tr>
    	<td><label class="control-label">Position.</label></td>
        <td><input class="form-control" type="text" name="pos" value="<?php echo $row['position'];?>" required /></td>
    </tr>
    <tr>
    	<td><label class="control-label">Office.</label></td>
        <td><input class="form-control" type="text" name="office" value="<?php echo $row['office'];?>" required /></td>
    </tr>
    <tr>
    	<td><label class="control-label">Username.</label></td>
        <td><input class="form-control" type="text" name="username" value="<?php echo $username; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Password.</label></td>
        <td><input class="form-control" type="text" name="password" value="<?php 
		
		echo $password; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Profile Img.</label></td>
        <td>
        	<p><img src="user_images/<?php echo $userpic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>


<div class="alert alert-info">
    <footer>
                        <p style="font-size:12px; text-align:right";> Copyright &copy; <em>Land Transportation Office - Inventory System</em> <?php echo date('Y');?></p>
                    </footer>
</div>

</div>
</body>
</html>