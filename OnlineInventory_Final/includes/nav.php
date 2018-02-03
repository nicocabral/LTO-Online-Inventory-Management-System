<ul class="nav" id="main-menu">
    				<!-- <li class="text-center"><img src="assets/img/find_user.png" class="user-image img-responsive"/></li> -->
    				<li><a href="index.php" class="active-menu"><img src="img/icon/home.png" width="45px">&nbsp; Home</a></li>
                    <li><a href="stockcard.php"><img src="img/icon/list.png" width="40px">&nbsp;Items <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                            <li> <a href="stockcard.php">Supplies</a></li>
                            <li><a href="supplier.php">Supplier</a></li>
                            <li><a href="ris.php">RIS</a></li>
                            <li><a href="stockcard_ris.php">Stockcard</a></li>
                    </ul>
                    <li>
                    <?php include('dbconn.php');
						$query_count = mysql_query("Select count(status) as count from tbl_requestitem where status ='new'");
						while($row=mysql_fetch_array($query_count)){
				
					
					?>
                    
                    
                    <a href="notification.php" data-toggle="tooltip" title="Hey you have request!"><img src="img/icons/web_help2.ico" width="40px">&nbsp; Notification <span class="btn btn-info">&nbsp;<?php echo $row['count'];}?></span></a></li>
                    <li><a href="view_inventory.php"><img src="img/icon_png/a_dispatch_order_256.png" width="45px" />&nbsp; Inventory</a></li>  
                    <li>
                        <a href="settings.php"><img src="img/icon/tools.png" width="40px">&nbsp; Tools<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="about_settings.php">About Settings</a></li>
                              <li>
                                <a href="#">Database<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="backup.php">Backup Database</a></li>
                                    <li><a href="restore.php">Restore Database</a></li>
                                </ul>
                            </li> 
                        </ul>
                    </li> 
                   </li>
                </ul>