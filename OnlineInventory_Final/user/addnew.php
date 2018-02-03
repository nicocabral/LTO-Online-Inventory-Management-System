<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$name = $_POST['name'];// user name
		$address = $_POST['address'];// user email
		$contact = $_POST['contact'];
		$pos 	=$_POST['position'];
		$office	=$_POST['office'];
		$uname	=$_POST['username'];
		$pass	=$_POST['password'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		
		
		if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO user (name,address,contact,position,office,username,password,userpic) VALUES(:name, :add, :con, :pos, :off, :uname, :pass, :upic)');
			$stmt->bindParam(':name',$name);
			$stmt->bindParam(':add', $address);
			$stmt->bindParam(':con', $contact);
			$stmt->bindParam(':pos', $pos);
			$stmt->bindParam(':off',$office);
			$stmt->bindParam(':uname',$uname);
			$stmt->bindParam(':pass',$pass);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "New record succesfully inserted ...";
				header("refresh:5;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LTO - Inventory system / user - add new user</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

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
    	<h1 class="h2">Add New user. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View all </a></h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
    <tr>
    	<td><label class="control-label">Name.</label></td>
        <td><input class="form-control" type="text" name="name" placeholder="Name"   required/></td>
    </tr>
    <tr>
    	<td><label class="control-label">Address.</label></td>
        <td><input class="form-control" type="text" name="address" placeholder="Address" required/></td>
    </tr>
	<tr>
    	<td><label class="control-label">Contact.</label></td>
        <td><input class="form-control" type="text" name="contact" placeholder="Contact"  required/></td>
    </tr>
    <tr>
    	<td><label class="control-label">Position.</label></td>
        <td><input class="form-control" type="text" name="position" placeholder="Position" required/></td>
    </tr>
    <tr>
    	<td><label class="control-label">Office.</label></td>
        <td><input class="form-control" type="text" name="office" placeholder="Office" required/></td>
    </tr>
    <tr>
    	<td><label class="control-label">Username.</label></td>
        <td><input class="form-control" type="text" name="username" placeholder="Username" required/></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Password.</label></td>
        <td><input class="form-control" type="text" name="password" placeholder="Password"  required/></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Profile Img.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" required/></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
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



	


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>