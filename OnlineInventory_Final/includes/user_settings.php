<?php 
	require_once 'user/dbconfig.php';
	
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
    font-size: 15px;"> Welcome <b><?php echo $_SESSION['name'];?></b>&nbsp;&nbsp;<a href="user_settings.php" data-toggle="tooltip" title="Account Settings"><span class="glyphicon glyphicon-cog"></span> </a>&nbsp;
                             
    <a href="logout_process.php?logout=1" data-toggle="tooltip" title="Logout" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Log-out</a> </div>
</nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
               <ul class="nav" id="main-menu">
    				<!-- <li class="text-center"><img src="assets/img/find_user.png" class="user-image img-responsive"/></li> -->
    				<li><a href="index.php"><img src="img/icon/home.png" width="45px">&nbsp; Home</a></li>
                    <li><a href="stockcard.php"><img src="img/icon/purchaseorder.png" width="40px">&nbsp; Items</a></li>
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
                        <h2><img src="img/icons/app.ico" width="40px"> Admin account settings. |
         <a href="view_alluser.php" data-toggle="tooltip" title="View all user" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></a></h2>
                       <hr>
                      </div>
                   </div>
    <div class="row">
    <div class="col-md-12">
 
<?php
	
	$stmt = $DB_con->prepare('SELECT id, name, address, contact, position, office, username, password, userpic, user_type FROM user where user_type="admin" ORDER BY id ASC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
   <div class="row">
   	<div class="col-xs-12">
    <center>
   		<p class="page-header"><?php echo $user_type."&nbsp;/&nbsp;".$position; ?><br />
                    <img style="padding-bottom:10px;" src="user/user_images/<?php echo $row['userpic']; ?>" class="img-rounded" width="250px" height="250px" />
                  <br />
                    <a class="btn btn-success" href="add_user.php"  data-toggle="tooltip" title="Add new user"><span class="glyphicon glyphicon-plus" ></span> Add</a> 
                      <a class="btn btn-info" href="user_edit_settings.php?edit_id=<?php echo $row['id']; ?>"  onclick="return confirm('sure to edit ?')" data-toggle="tooltip" title="click for edit"><span class="glyphicon glyphicon-edit" ></span> Edit</a> 
                      <a class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
                    
                    
               
                       </p>
      </center>
      </div>
   </div>
<div class="row">

            
            
            <div class="col-xs-6">
            <table class="table table-striped" style="height:10px;">
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
             <div class="col-xs-6">
       			 <table class="table table-striped">
            <tr>
            <td align="center"><p><strong><?php echo $row['id'];?></strong></p></td></tr> 
            <tr><td align="center"><p><strong><?php echo $row['name'];?></strong></p></td></tr>
            <tr><td align="center"><p><strong><?php echo $row['address'];?></strong></p></td></tr>
            <tr><td align="center"><p><strong><?php echo $row['contact'];?></strong></p></td></tr>
            <tr><td align="center"><p><strong><?php echo $row['position'];?></strong></p></td></tr>
            <tr><td align="center"><p><strong><?php echo $row['office'];?></strong></p></td></tr>
            <tr><td align="center"><p><strong><?php echo $row['username'];?></strong></p></td></tr>
             <tr><td align="center"><p><strong><?php echo $password;?></strong></p></td></tr>
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

                     	
                      
 
                 										
                            
                    </div>
               </div>  
					  </div>
                  
                
                <!-- /.row -->    '

<script src="assets/js/custom.js"></script>
