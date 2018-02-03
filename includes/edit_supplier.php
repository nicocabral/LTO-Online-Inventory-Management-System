
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
                    <li><a href="#"><img src="img/icon/purchaseorder.png" width="40px">&nbsp; Items <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                            <li> <a  class="active-menu" href="stockcard.php">Supplies</a></li>
                            <li><a href="#">Supplier</a></li>
                            <li><a href="#">RIS</a></li>
                            <li><a href="#">Stockcard</a></li>
                    </ul>
                    </li>
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
                        <h2><img src="img/icon/purchaseorder.png" width="40px">Supplies Record</h2>
                       <hr>
                      </div>
                   </div>
					<div class="row">
                     <div class="wrap-btn">
                        <div class="col-md-12">
                        <?php include('includes/dbconn.php');
						$id =intval($_GET['id']);
						$query = mysql_query("Select * from tbl_supplier where suppno =  '$id'") or die (mysql_error());
						while($row=mysql_fetch_array($query)){
						?>
                      <h3>Edit supplier Info</h3>
                       
                             <form action="edit_supplier_process.php" method="post" class="form-horizontal">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">ID no.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['suppno']; ?>" id="suppno" name="suppno"  readonly />
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['suppname'];?>" id="name" name="name">
                                    </div></div>
                                   
                                    <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Address:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['address'];?>" id="add" name="add">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Contact:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['contact'];} ?>" id="con" name="con">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Status:</label>
                                    <div class="col-sm-8">
                                        <select id="stat" name="stat" class="form-control">
                                        <option value="Active">Active</option>
                                        <option value="In-Active">In-Active</option>
                                        </select>
                                    </div>
                               </div>
                               <br>
                                <div class="pull-right" style="padding-right:50px;">
                                    <a href="supplier.php" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>&nbsp;Update</button> 
                                </div>
                            </div>
                            </form>
                            </div>
                            
                </div></div></div>

<script src="assets/js/custom.js"></script>
