
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
                            <li> <a  class="active-menu" href="stockcard.php">Supplies</a></li>
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
                    <li><a href="inventory.php"><img src="img/icon_png/a_dispatch_order_256.png" width="45px" />&nbsp; Inventory</a></li>  
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
                       <?php 
                                        include('includes/dbconn.php');
                                        $ctr_result = mysql_query("SELECT COUNT(*) as counter FROM tbl_supplies") or die(mysql_error());
                                        while($ctr_row = mysql_fetch_array($ctr_result)){
                                    ?>
                        <h2><img src="img/icon/purchaseorder.png" width="40px">Supplies Record/s (<?php echo $ctr_row['counter'];}?>)</h2>
                       <hr>
                      </div>
                   </div>
					<div class="row">
                     <div class="wrap-btn">
                        <div class="col-md-6"><p></p>
 <a href="print.php" data-toggle="tooltip" title="Print"><img src="img/icon/printer.ico"  width="45px;"/></a>&emsp;
                            <span data-toggle="tooltip" title="Add Item"><a data-toggle="modal" data-target=".bs-example-modal-md" style="cursor:pointer;"><img src="img/icons/add.ico" width="45px;" /></a></span>
                         
                             
                            <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                <div class="modal-header" style="background-color:#ff7800;">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="img/icon/inventory.png" width="45px"/> Add Item</span>
                                        </div> 
                                        <div class="col-md-2">
                                            <div class="a_close"><a  href="#" data-dismiss="modal" data-toggle="tooltip" title="Close" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                    <form class="form-horizontal" method="POST" action="add_supply_process.php">
                                    <div class="form-group">
                                            <label for="name" class="col-sm-4 control-label">Stock no:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="stockno" name="stockno" onKeyPress="return isNotAlphanumeric(event)" required />
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="name" class="col-sm-4 control-label">Serial no:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="srno" name="srno" onKeyPress="return isNotAlphanumeric(event)" required />
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="name" class="col-sm-4 control-label">Quantity:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="qty" name="qty" onKeyPress="return isNotAlphanumeric(event)" required />
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="name" class="col-sm-4 control-label">Unit:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="name" name="unit" onKeyPress="return isNotAlphanumeric(event)" required />
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="name" class="col-sm-4 control-label">Item Name:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="name" name="itemname" onKeyPress="return isNotAlphanumeric(event)" required>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="desc" class="col-sm-4 control-label">Description:</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" name="desc" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-4 control-label">Unit Cost:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="name" name="u_cost" onKeyPress="return isNotAlphanumeric(event)" required>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label">Supplier:</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" id="select" name="select">
                                            <option>Select Supplier</option>
                                            <option>----------------</option>
                                            <?php $sel=mysql_query("Select * from tbl_supplier") or die (mysql_error());
												while($row=mysql_fetch_array($sel)){
											?>
                                            <option value="<?php echo $row['suppname'];?>"><?php echo $row['suppname'];}?></option>
                                            </select>
                                           
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="name" class="col-sm-4 control-label">Remaining Supply:</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="qtyu" name="qtyu" onKeyPress="return isNotAlphanumeric(event)" required>
                                            </div>
                                        </div>
                                         
                                       <br>
                                        <div class="modal-footer" style="padding-right:110px;">
                                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Save</button> 
                                            <button type="reset" class="btn btn-default"><span class="glyphicon glyphicon-erase"></span> Clear</button>
                                        </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-5">
                                <span class="pull-right" style="padding-top:5px; font-weight:bold;"></span>
                            </div>
                            <div class="col-sm-6">
                             
                            </div>
                        </div>
                        <div class="col-md-3">
                          </div>
                        </div>
                    </div>
                </div></div>
               
                <div class="row">
                    <div class="list-wrap">
                        <div class="col-md-12">
                            <!--    Striped Rows Table  -->
                     <form method="post">
                         <input type="text" id="search" name="search" placeholder="Search Stock no"  class="TField"/>
                         <button type="submit" id="submit" name="submit" ><img src="img/icons/search.ico" width="30px;" height="auto;" /></button>										&emsp;			<a href="stockcard.php" data-toggle="tooltip" title="Reload Page"><img src="img/icons2/reload.ico" width="30px;" height="auto;" /></a>
                         &emsp;<label>Search by date Arrival&nbsp;</label><input type="date" id="date" name="date" class="TField" />
                         <button type="submit" id="s_date" name="s_date" ><img src="img/icons/search.ico" width="30px;" height="auto;" /></button>
                                     </form>
                                     
                                     
                                    <div class=" table table-hover table-bordered table-striped">
                                        <table class="table table-hover table bordered table-striped" style="font-size:13px;">
                                            <thead>
                                                <tr style="background-color:#ff7800; color:#fff;">
                                                    <th style="text-align:center; width:auto;">Actions</th>
                                                    <th style="text-align:center; width:auto;">Stock No.</th>
                                                     <th style="text-align:center; width:auto;">Serial No</th>
                                                    <th style="text-align:center; width:auto;">Quantity.</th>
                                                    <th style="text-align:center; width:auto;">Unit of Measure</th>
                                                    <th style="text-align:center; width:auto;">Item Name</th>
                                                    <th style="width:auto; text-align:center;">Description</th>
                                                    <th style="text-align:center; width:auto;">Unit Cost</th>
                                                    <th style="text-align:center; width:auto; ">Supplier</th>
                                                    <th style="width:auto; text-align:center;">Remaining Balance</th>
                                                    <th style="width:auto; text-align:center;">Arrival Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php include('includes/dbconn.php');
										$search=mysql_real_escape_string(@$_POST['search']);
										$date = mysql_real_escape_string(@$_POST['date']);
										$s_date = @$_POST['s_date'];
										$submit =@$_POST['submit'];
										
							
                                                $result = mysql_query("SELECT * FROM tbl_supplies") or die(mysql_error());
								if($search){
									$result=mysql_query("SELECT * FROM tbl_supplies where stock_no LIKE '$search'") or die (mysql_error());
										}
								 if($date){
										$result=mysql_query("SELECT * FROM tbl_supplies where arrival_date LIKE '$date'") or die (mysql_error());
									}
										if(@mysql_num_rows($result)>0){
											while($row = mysql_fetch_array($result)){
                                            ?>
                                                <tr id="list<?php echo $row['itemno']; ?>" class="record">
                                                    <td width="60px" class="text-center hidden-print">
                                                        <a class="del<?php echo $row['itemno']; ?>" href="#" id="<?php echo $row['itemno']; ?>" data-toggle="tooltip" title="Remove"><img src="img/icons/stop.ico" alt="Delete" width="17px"></a>
                                                            <script>
                                                                $('.del<?php echo $row['itemno']; ?>').click( function() {
                                                                    var id = $(this).attr("id");
                                                                    if(confirm("Are you sure you want to delete supply?")){
                                                                        $.ajax({
                                                                            type: "POST",
                                                                            url: "supply_del_process.php",
                                                                            data: ({itemno: id}),
                                                                            cache: false,
                                                                            success: function(html){
                                                                                $("#list<?php echo $row['itemno']; ?>").animate({ backgroundColor: "#fbc7c7" }, "fast")
                                                                                    .animate({ opacity: "hide" }, "fast");
                                                                                $("#counter").html('<strong>Number Records: <input type="text" style="width:80px;  text-align:center; color:#000;" value="<?php echo $ctr_row["counter"]-1;?>"></strong>');
                                                                            }
                                                                        }); 
                                                                    }else{
                                                                        return false;}
                                                                });
                                                            </script>
                                                         <a href="edit_supply.php?id=<?php echo $row['itemno'];?>" data-toggle="tooltip" title="Edit supply"><img src="img/icons/pen_yellow.ico" width="17px"></a>
                                                         
                                                    </td>
                                                    
                                                    <td style="text-align:center; width:auto;"><?php echo $row['stock_no'];?></td>
                                                     <td style="text-align:center; width:auto;"><?php echo $row['serial_no'];?></td>
                                                    <td style="text-align:center; width:auto;"><?php echo $row['qty'];?></td>
                                                    <td style="text-align:center; width:auto;"><?php echo $row['unit'];?></td>
                                                    <td style="text-align:center; width:auto;"><?php echo $row['itemname'];?></td>
                                                    <td style="text-align:center; width:auto;"><?php echo $row['description'];?></td>
                                                    <td style="text-align:center; width:auto;"><?php echo $row['unit_cost'];?></td>
                                                 
                                                    <td style="text-align:center; width:auto;"><?php echo $row['supplier'];?></td>
                                                    <td style="text-align:center; width:auto;"><?php echo $row['remaining_supply'];?></td>
                                                    <td style="text-align:center; width:auto;"><?php echo $row['arrival_date'];?></td>
                                                </tr>

                                            <?php }} else {
													echo'<script>window.alert("No Data Found!");
																</script>';
												} ?>
                                            <?php  ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
   
					  </div>
                  
                <!-- /.row -->    '

<script src="assets/js/custom.js"></script>
