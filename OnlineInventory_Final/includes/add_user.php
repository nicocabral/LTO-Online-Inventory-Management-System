<?php 
	require_once 'user/dbconfig.php';
	

	if(isset($_POST['btnsave']))
	{
		$name = $_POST['name'];// user name
		$address = $_POST['address'];// user email
		$contact = $_POST['contact'];
		$pos 	=$_POST['position'];
		$office	=$_POST['office'];
		$uname	=$_POST['username'];
		$pass	=$_POST['password'];
		$tos	=$_POST['type_of_user'];
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		
		
		if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'user/user_images/'; // upload directory
	
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
			$stmt = $DB_con->prepare('INSERT INTO user (name,address,contact,position,office,username,password,userpic,user_type) VALUES(:name, :add, :con, :pos, :off, :uname, :pass, :upic, :u_type)');
			$stmt->bindParam(':name',$name);
			$stmt->bindParam(':add', $address);
			$stmt->bindParam(':con', $contact);
			$stmt->bindParam(':pos', $pos);
			$stmt->bindParam(':off',$office);
			$stmt->bindParam(':uname',$uname);
			$stmt->bindParam(':pass',$pass);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':u_type', $tos);
			
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
	}?>
 <div id="wrapper">
    <section class="img-wrap">
        <img src="img/banner.png" class="img-responsive" width="100%">
    </section>
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand" href="index.php"><marquee>
				<?php echo '<script> document.write(Date());</script>'?></marquee>
        </div>
    <div style="color: white;
    padding: 15px 50px 5px 50px;
    float: right;
    font-size: 15px;"> Welcome <b><?php echo $_SESSION['name'];?></b>&nbsp;&nbsp;<a href="user/index.php" data-toggle="tooltip" title="Account Settings"><span class="glyphicon glyphicon-cog"></span> </a>&nbsp;
                             
    <a href="logout_process.php?logout=1" data-toggle="tooltip" title="Logout" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Log-out</a> </div>
</nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
               <ul class="nav" id="main-menu">
    				<!-- <li class="text-center"><img src="assets/img/find_user.png" class="user-image img-responsive"/></li> -->
    				<li><a href="index.php"><img src="img/icon/home.png" width="45px">&nbsp; Home</a></li>
                    <li><a  href="stockcard.php"><img src="img/icon/purchaseorder.png" width="40px">&nbsp; Items</a></li>
                    <li>
                     <?php include('dbconn.php');
						$query_count = mysql_query("Select count(status) as count from tbl_requestitem where status ='new'");
						while($row=mysql_fetch_array($query_count)){
				
					
					?>
                    <a href="notification.php" data-toggle="tooltip" title="Hey you have request!"><img src="img/icons/web_help2.ico" width="40px">&nbsp; Notification <span class="btn btn-info">&nbsp;<?php echo $row['count'];}?></span></a></li>
                    <li><a href="#"><img src="img/icon_png/a_dispatch_order_256.png" width="45px" />&nbsp; Inventory</a></li>  
                    <li>
                        <a href="settings.php"><img src="img/icon/tools.png" width="40px">&nbsp; Tools<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="#">Activity Logger</a></li>
                              <li>
                                <a href="#">Database<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="#">Backup Database</a></li>
                                    <li><a href="#">Restore Database</a></li>
                                </ul>
                            </li> 
                        </ul>
                    </li> 
                   </li>
              </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="container-fluid">
                <!-- Page Heading -->
				      <div class="row">
                      <div class="col-md-12">
                        <h2><img src="img/icons/app.ico" width="40px"> Admin account settings.</h2>
                       <hr>
                      </div>
                   </div>
    <div class="row">
    <div class="col-md-12">



	<div class="page-header">
    	<h1 class="h2">Add New user. <a class="btn btn-default" href="user_settings.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View all </a></h1>
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
	    
	<table class="table table-responsive">
    <tr align="center">
    	<td><label class="control-label">Name.</label></td>
        <td align="center"><input class="TField" type="text" name="name" placeholder="Name"   required/></td>
    </tr>
    <tr align="center">
    	<td><label class="control-label">Address.</label></td>
        <td align="center"><input class="TField" type="text" name="address" placeholder="Address" required/></td>
    </tr>
	<tr align="center">
    	<td><label class="control-label">Contact.</label></td>
        <td align="center"><input class="TField" type="text" name="contact" placeholder="Contact"  required/></td>
    </tr>
    <tr align="center">
    	<td><label class="control-label">Position.</label></td>
        <td align="center"><input class="TField" type="text" name="position" placeholder="Position" required/></td>
    </tr>
    <tr align="center">
    	<td><label class="control-label">Office.</label></td>
        <td align="center"><input class="TField" type="text" name="office" placeholder="Office" required/></td>
    </tr>
    <tr align="center">
    	<td><label class="control-label">Username.</label></td>
        <td align="center"><input class="TField" type="text" name="username" placeholder="Username" required/></td>
    </tr>
    
    <tr align="center">
    	<td><label class="control-label">Password.</label></td>
        <td align="center"><input class="TField" type="text" name="password" placeholder="Password"  required/></td>
    </tr>
    <tr align="center">
    	<td><label class="control-label">User type.</label></td>
        <td align="center"><select name="type_of_user" class="TField">
        					<option value="admin">Admin</option>
                            <option value="user">User</option>
        </select></td>
    </tr>
    
    <tr align="center">
    	<td><label class="control-label">Profile Img.</label></td>
        <td align="center"><input class="input-group" type="file" name="user_image" accept="image/*" required/></td>
    </tr>
     
    
    <tr align="center">
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>


</div>	

                     	
                      
 
                 										
                            
                    </div>
               </div>  
					  </div>
                  
                
                <!-- /.row -->    '

<script src="assets/js/custom.js"></script>
