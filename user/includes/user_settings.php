<?php 
	require_once 'dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userpic FROM user WHERE id =:uid');
		$stmt_select->execute(array(':uid'=>intval($_GET['delete_id'])));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userpic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM user WHERE id =:uid');
		$stmt_delete->bindParam(':uid',intval($_GET['delete_id']));
		$stmt_delete->execute();
		
		header("Location: index.php");
	}?>
 <div id="wrapper">
    <section class="img-wrap">
        <img src="../img/banner.png" class="img-responsive" width="100%">
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
    				<li><a href="index.php"><img src="../img/icon/home.png" width="45px">&nbsp; Home</a></li>
                   
                  
                   
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="container-fluid">
                <!-- Page Heading -->
				      <div class="row">
                      <div class="col-md-12">
                        <h2><img src="../img/icons/app.ico" width="40px"> User account Information.</h2>
                       <hr>
                      </div>
                   </div>
    <div class="row">
    <div class="col-md-12">
 
<?php
	$name = $_SESSION['name'];
	$stmt = $DB_con->prepare("SELECT id, name, address, contact, position, office, username, password, userpic, user_type FROM user where user_type='user' and name='$name' ORDER BY id ASC");
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
                    <img style="padding-bottom:5px;" src="user_images/<?php echo $row['userpic']; ?>" class="img-rounded" width="200px" height="200px" />
                   
               
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
