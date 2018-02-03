
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
                            <li> <a   href="stockcard.php">Supplies</a></li>
                            <li><a class="active-menu" href="supplier.php">Supplier</a></li>
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
                       <h3><img src="img/icon/supplier.png" width="40px"> Supplier</h3>
                       <hr>
                      </div>
                    </div>
					<div class="row">
                    <div class="wrap-btn">
                        <div class="col-md-6">
                            <span data-toggle="tooltip" title="Add Supplier"><a data-toggle="modal" class="btn btn-primary" data-target=".bs-example-modal-md" style="cursor:pointer;"><span class="glyphicon glyphicon-plus"></span></a></span>
                             <span><a href="print_supplier.php" data-toggle="tooltip" title="Print"><button><img src="img/icon/printer.ico" style="width:30px; height:auto;"></button></a></span>
                   
                            <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                <div class="modal-header" style="background-color:#228B22;">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="img/icon_png/b_demographic_256.png" width="45px"/> Add Supplier</span>
                                                                 </div> 
                                        <div class="col-md-2">
                                            <div class="a_close"><a  href="#" data-dismiss="modal" data-toggle="tooltip" title="Close" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                    <form class="form-horizontal" method="POST" action="add_supplier_process.php">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 control-label">Supplier Name:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="name" name="suppname" onKeyPress="return isNotAlphanumeric(event)" required />
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 control-label">Address:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="name" name="address" onKeyPress="return isNotAlphanumeric(event)" required>
                                            </div>
                                        </div> 
                                         <div class="form-group">
                                              <label for="telno" class="col-sm-3 control-label"> Contact:</label>
                                                  <div class="col-sm-3">
                                                  <select name="dprefixno" class="form-control">
                                                      <option value="">------</option>
                                                      <option value="+63905">+63905</option>
                                                      <option value="+63906">+63906</option>
                                                      <option value="+63907">+63907</option>
                                                      <option value="+63908">+63908</option>
                                                      <option value="+63909">+63909</option>
                                                      <option value="+63910">+63910</option>
                                                      <option value="+63912">+63912</option>
                                                      <option value="+63915">+63915</option>
                                                      <option value="+63916">+63916</option>
                                                      <option value="+63917">+63917</option>
                                                      <option value="+63918">+63918</option>
                                                      <option value="+63919">+63919</option>
                                                      <option value="+63920">+63920</option>
                                                      <option value="+63921">+63921</option>
                                                      <option value="+63922">+63922</option>
                                                      <option value="+63923">+63923</option>
                                                      <option value="+63924">+63924</option>
                                                      <option value="+63925">+63925</option>
                                                      <option value="+63926">+63926</option>
                                                      <option value="+63927">+63927</option>
                                                      <option value="+63928">+63928</option>
                                                      <option value="+63929">+63929</option>
                                                      <option value="+63930">+63930</option>
                                                      <option value="+63932">+63932</option>
                                                      <option value="+63933">+63933</option>
                                                      <option value="+63934">+63934</option>
                                                      <option value="+63935">+63935</option>
                                                      <option value="+63936">+63936</option>
                                                      <option value="+63937">+63937</option>
                                                      <option value="+63938">+63938</option>
                                                      <option value="+63939">+63939</option>
                                                      <option value="+63942">+63942</option>
                                                      <option value="+63943">+63943</option>
                                                      <option value="+63946">+63946</option>
                                                      <option value="+63947">+63947</option>
                                                      <option value="+63948">+63948</option>
                                                      <option value="+63949">+63949</option>
                                                      <option value="+63989">+63989</option>
                                                      <option value="+63994">+63994</option>
                                                      <option value="+63996">+63996</option>
                                                      <option value="+63997">+63997</option>
                                                      <option value="+63998">+63998</option>
                                                      <option value="+63999">+63999</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                  <input type="tel" maxlength="7" class="form-control" id="dtelno" name="dtelno" required>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 control-label">Status:</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" id="name" name="status">
                                                <option value="Active">Active</option>
                                                <option value="In-Active">In-Active</option>
                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="padding-right:110px;">
                                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-save"></span> Save</button> 
                                            <button type="reset" class="btn btn-default"><span class="glyphicon glyphicon-erase"></span> Clear</button>
                                        </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <span class="pull-right" style="padding-top:5px; font-weight:bold;"></span>
                        </div>
                        <div class="col-md-3">
                            </div>
                            <form method="post" action="search_supplier.php">
                            <div class="form-group input-group">
                        <select class="form-control" id="select" name="select" data-container="body" data-toggle="popover" data-placement="left" data-content="sample">
                                    <option>Search supplier name</option>
                                    <option>---------------------</option>
                                    <?php $query=mysql_query("Select* from tbl_supplier") or die(mysql_error());
				  		while($row=mysql_fetch_assoc($query)){ 
				  ?>
                                   <option title="<?php echo $row['suppname'];?>" value="<?php echo $row['suppno']?>"><?php echo  $row['suppno']."&nbsp;"."|"."&nbsp; ".$row['suppname'] . " &nbsp;-&nbsp;".$row['status']."&nbsp; - &nbsp;".$row['contact'];}?></option>
                                    </select>
                               
                            </div>
                            </form>
                        </div>
                    </div>
                
                </div>
                <div class="row">
                    <div class="list-wrap">
                        <div class="col-md-12">
                            <!--    Striped Rows Table  -->
                           
                                    <?php 
                                        include('includes/dbconn.php');
                                        $ctr_result = mysql_query("SELECT COUNT(*) as counter FROM tbl_supplier") or die(mysql_error());
                                        while($ctr_row = mysql_fetch_array($ctr_result)){
                                    ?>
                                    <div id="counter">
                                        <span class="btn btn-info">    <strong>Number Records: <span class="badge btn btn-info"><?php echo $ctr_row['counter'];?></span></strong></span>
                                        <br />
                                    
                            <br />
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" style="font-size:13px;">
                                            <thead>
                                                <tr class="info">
                                                    <th style="text-align:center; width:70px;">Actions</th>
                                                    <th style="text-align:center; width:100px;">Supplier No.</th>
                                                    <th style="text-align:center; width:200px;">Supplier Name</th>
                                                    <th style="text-align:center; width:400px; text-align:center;">Address</th>
                                                    <th style="text-align:center; width:100px;">Contact</th>
                                                    <th style="text-align:center; width:100px;">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                include('includes/dbconn.php');
                                                $result = mysql_query("SELECT * FROM tbl_supplier Limit 10") or die(mysql_error());
                                                while($row = mysql_fetch_array($result)){
                                            ?>
                                                <tr id="list<?php echo $row['suppno']; ?>" class="record">
                                                    <td width="60px" class="text-center hidden-print">
                                                        <a class="del<?php echo $row['suppno']; ?>" href="#" id="<?php echo $row['suppno']; ?>" data-toggle="tooltip" title="Remove"><img src="img/icons/stop.ico" alt="Delete" width="17px"></a>
                                                            <script>
                                                                $('.del<?php echo $row['suppno']; ?>').click( function() {
                                                                    var id = $(this).attr("id");
                                                                    if(confirm("Are you sure you want to delete supplier?")){
                                                                        $.ajax({
                                                                            type: "POST",
                                                                            url: "supplier_del_process.php",
                                                                            data: ({suppno: id}),
                                                                            cache: false,
                                                                            success: function(html){
                                                                                $("#list<?php echo $row['suppno']; ?>").animate({ backgroundColor: "#fbc7c7" }, "fast")
                                                                                    .animate({ opacity: "hide" }, "fast");
                                                                                $("#counter").html('<strong>Number Records: <input type="text" style="width:80px;  text-align:center; color:#000;" value="<?php echo $ctr_row["counter"]-1;?>"></strong>');
                                                                            }
                                                                        }); 
                                                                    }else{
                                                                        return false;}
                                                                });
                                                            </script>
                                                         <a href="edit_supplier.php?id=<?php echo $row['suppno']; ?>" data-toggle="tooltip" title="Edit"><img src="img/icons/pen_yellow.ico" width="17px"></a>
                                                         
                                                    </td>
                                                    <td style="text-align:center;"><?php echo $row['suppno'];?></td>
                                                    <td style="text-align:center;"><?php echo $row['suppname'];?></td>
                                                    <td style="text-align:center;"><?php echo $row['address'];?></td>
                                                    <td style="text-align:center;"><?php echo $row['contact'];?></td>
                                                    <td style="text-align:center;"><?php echo $row['status'];?></td>
                                                </tr>

                                            <?php } ?>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                           
                  
             </div></div></div>
                <!-- /.row -->    '

<script src="assets/js/custom.js"></script>
