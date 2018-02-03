<ul class="nav" id="main-menu">
    				<!-- <li class="text-center"><img src="assets/img/find_user.png" class="user-image img-responsive"/></li> -->
    				
                    <li><a href="#" class="active-menu"><img src="../img/icon/list.png" width="40px">&nbsp;Availabel Items</a>
                    <?php include('../includes/dbconn.php');
						$id = $_SESSION['id'];
						echo $id;
						$query_count = mysql_query("Select count(status) as count from tbl_requestitem where req_id='$id' and status ='approved'");
						while($row=mysql_fetch_array($query_count)){
				
					?>
                    
                    
                    <a href="notification.php" data-toggle="tooltip" title="Hey you have request!"><img src="../img/icons/web_help2.ico" width="40px">&nbsp; Notification <span class="btn btn-info">&nbsp;<?php echo $row['count'];}?></span></a></li>
                   