
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
        </div></span>
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
                            <li> <a href="stockcard.php">Supplies</a></li>
                            <li><a href="supplier.php">Supplier</a></li>
                            <li><a href="ris.php">RIS</a></li>
                            <li><a href="stockcard_ris.php">Stockcard</a></li>
                    </ul>
                    </li>
                    <li>
                     <?php include('dbconn.php');
						$query_count = mysql_query("Select count(status) as count from tbl_requestitem where status ='new'");
						while($row=mysql_fetch_array($query_count)){
				
					
					?>
                    <a  href="notification.php"><img src="img/icons/web_help2.ico" width="40px">&nbsp; Notification <span class="btn btn-info" data-toggle="tooltip" title="Hey you have Notification">&nbsp;<?php echo $row['count'];}?></span>
                    <?php $query=mysql_query("SELECT count(status) as countp from tbl_requestitem where status='approved'");
						while($row=mysql_fetch_array($query)){?>
                    <span class="btn btn-info" data-toggle="tooltip" title="You have Aprroved Message" data-placement="right">&nbsp;<?php echo $row['countp'];?></span>
                    </a></li>
                    <?php }?>
                    <li><a href="#" class="active-menu"><img src="img/icon_png/a_dispatch_order_256.png" width="45px" />&nbsp; Inventory</a></li>  
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
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="container-fluid">
                <!-- Page Heading -->
				      <div class="row">
                      <div class="col-md-12">
                        <h2><img src="img/icon_png/a_dispatch_order_256.png" width="40px" />Inventory | <a href="print_allInventory.php" data-toggle="tooltip" title="Print Data?"><img src="img/icon/printer.ico" width="40px;" /></a></h2>
                       <hr>
                      </div>
                   </div>
					<div class="row">
                     <div class="wrap-btn">
                        <div class="col-md-12"><p></p>
 <?php /*?><a href="print.php" data-toggle="tooltip" title="Print"><img src="img/icon/printer.ico"  width="45px;"/></a><?php */?>
 		<div class="form-group">
            	<form method="post" class="form-horizontal" action="print_Inventory.php">
                  <div class="col-sm-3">
                	     <label>From:</label>
                  &emsp;
                			<input type="date" class="form-group" id="dateFrm" name="dateFrm" required/>
                  </div>        
         
                    	<div class="col-sm-3">
                        <label>To:</label>&emsp;
                            <input type="date" class="form-group" id="dateTo" name="dateTo" required/>
                             
                		</div>
                        
                       <button type="submit" id="submit" name="submit" data-toggle="tooltip" title="Search"><img src="img/icons/search.ico" width="35px;"/></button>
                        
                       
                
                </form>
                </div>
                <div class="table tabel-responsive">
                 <table class="table table-bordered table-striped table-hover">
                 
                 <tr class="success">	<th style="text-align:center; width:auto;">Itemno</th>
                 		<th style="text-align:center; width:auto;">Stock no</th>
                 		<th style="text-align:center; width:auto;">Item name</th>
                        <th style="text-align:center; width:auto;">Description</th>
                        <th style="text-align:center; width:auto;">Request Qty</th>
                        <th style="text-align:center; width:auto;">Request By</th>
                        <th style="text-align:center; width:auto;">Division Office</th>
                        <th style="text-align:center; width:auto;">Aprroved by</th>
                        <th style="text-align:center; width:auto;">Date Requested</th>
                        <th style="text-align:center; width:auto;">Date Claim</th>
                        <th style="text-align:center; width:auto;">Status</th>
                        <th style="text-align:center; width:auto;">Remaining Supply</th>
                       
                    </tr>
                <?php 
				
			
				
				$result=mysql_query("SELECT * FROM tbl_requestitem") or die (mysql_error());
				
				if(mysql_num_rows($result)>0){
					while($row=mysql_fetch_array($result)){
				?>
               
                	<tr>
                    	<td style="text-align:center; width:auto;"><?php echo $row['itemno'];?></td>
                        <td style="text-align:center; width:auto;"><?php echo $row['stock_no'];?></td>
                        <td style="text-align:center; width:auto;"><?php echo $row['itemname'];?></td>
                        <td style="text-align:center; width:auto;"><?php echo $row['description'];?></td>
                        <td style="text-align:center; width:auto;"><?php echo $row['qty'];?></td>
                        <td style="text-align:center; width:auto;"><?php echo $row['requestby'];?></td>
                        <td style="text-align:center; width:auto;"><?php echo $row['division_office'];?></td>
                        <td style="text-align:center; width:auto;"><?php echo $row['approved_by'];?></td>
                        <td style="text-align:center; width:auto;"><?php echo $row['date_request'];?></td>
                        <td style="text-align:center; width:auto;"><?php echo $row['date_claim'];?></td>
                        <td style="text-align:center; width:auto;"><?php echo $row['status'];?></td>
                         <td style="text-align:center; width:auto;"><?php echo $row['remaining_qty'];}}?></td>
                       
                    
                    </tr>
                
                
                </table>
                          </div>
                                </div>
                            </div>
   
					  </div>
                  
                <!-- /.row -->    '

<script src="assets/js/custom.js"></script>
