<?php 


	error_reporting( ~E_NOTICE );
	
	require_once 'user/dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT name, address, contact, position, office, username, password, userpic, user_type FROM user WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$name	=$_POST['name'];
		$add	=$_POST['add'];
		$con	=$_POST['con'];
		$pos	=$_POST['pos'];
		$office	=$_POST['office'];
		$username = $_POST['username'];// user name
		$pass = $_POST['password'];// user email
		$tos	=$_POST['type_of_user'];
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'user/user_images/'; // upload directory	
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
										     userpic=:upic,
											 user_type =:utype 
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
			$stmt->bindParam(':utype', $tos);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='index.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>
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
                    <li><a class="active-menu" href="#"><img src="img/icon/purchaseorder.png" width="40px">&nbsp; Items</a></li>
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
                        <h2><img src="img/icons/app.ico" width="40px"> Update username and Password settings.</h2>
                       <hr>
                      </div>
                   </div>
    <div class="row">
    <div class="col-md-12">
<h2>Update Username and Password. <a class="btn btn-info" href="user_settings.php"> All members </a></h2>
    </div>

<div class="clearfix"></div>
<div id="container-fluid">
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
    
	<table class="table table-responsive">
     <tr align="center">
    	<td><label class="control-label">Admin Name.</label></td>
        <td><input class="TField"  type="text" name="name" value="<?php echo $name;?>"/></td>
    </tr>
    <tr align="center">
    	<td><label class="control-label">Address.</label></td>
        <td><input class="TField" type="text" name="add" value="<?php echo $address;?>"/></td>
    </tr>
	<tr align="center">
    	<td><label class="control-label">Contact.</label></td>
        <td><input class="TField" type="text" name="con" value="<?php echo $contact;?>"/></td>
    </tr>
    <tr align="center">
    	<td><label class="control-label">Position.</label></td>
        <td><input class="TField" type="text" name="pos" value="<?php echo $position;?>"/></td>
    </tr>
    <tr align="center">
    	<td><label class="control-label">Office.</label></td>
        <td><input class="TField" type="text" name="office" value="<?php echo $office;?>"/></td>
    </tr>
    <tr align="center">
    	<td><label class="control-label">Username.</label></td>
        <td><input class="TField" type="text" name="username" value="<?php echo $username; ?>" /></td>
    </tr>
    
    <tr align="center">
    	<td><label class="control-label">Password.</label></td>
        <td><input class="TField" type="text" name="password" value="<?php echo $password; ?>" /></td>
    </tr>
    <tr align="center">
    	<td><label class="control-label">User type.</label></td>
        <td><select name="type_of_user" class="TField">
        					<option value="admin">Admin</option>
                            <option value="user">User</option>
        </select></td>
    </tr>
    
    <tr align="center">
    	<td><label class="control-label">Profile Img.</label></td>
        <td>
        	<p><img src="user/user_images/<?php echo $userpic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="user_settings.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>

                                  										
                            
                    </div>
               </div>  
					  </div>
                  
                
                <!-- /.row -->    '

<script src="assets/js/custom.js"></script>
