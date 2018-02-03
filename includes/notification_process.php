
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
				<?php echo '<script> document.write(Date());</script>'?></marquee></span>
        </div>
    <div style="color: white;
    padding: 15px 50px 5px 50px;
    float: right;
    font-size: 15px;"> Welcome <b><?php echo $_SESSION['name'];?></b>&nbsp;<a href="user/index.php" data-toggle="tooltip" title="Account Settings"><span class="glyphicon glyphicon-cog"></span> </a>&nbsp;&nbsp;
                             
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
                    
                    <a href="notification.php"><img src="img/icons/web_help2.ico" width="40px">&nbsp; Notification <span class="btn btn-info">&nbsp;<?php echo $row['count'];?></span></a></li>
                    <?php }?>
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
                        <h2><img src="img/icon_png/a_inventory_256.png" width="40px">Confirm Request Items?</h2>
                       <hr>
                      </div>
                   </div>
					<div class="row">
                    <div class="col-md-12">
                     <?php 
                        include('includes/dbconn.php');
 						$req_id =intval( $_GET['id']);
                        $result = mysql_query("SELECT * FROM tbl_requestitem WHERE request_id = $req_id") or die(mysql_error());
                        while($row = mysql_fetch_array($result)){
                    ?>
                  
                    <p>Confirm to approved this item(s) request</p>
                        <form name="frmApproved" action="approved_process.php" method="post" class="form-horizontal">
                        <input type="hidden" name="req" value="<?php echo $req_id;?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Item No.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['itemno']; ?>" id="itemno" name="itemno" required readonly />
                                    </div>
                                </div> 
                                
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Item Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['itemname']; ?>" id="itemname" name="itemname" required readonly>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="desc" class="col-sm-3 control-label">Description:</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="desc" rows="3" readonly><?php echo $row['description']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Request Qty:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['qty']; ?>" id="rqty" name="rqty"  required readonly>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Date to be Claim:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="dateclaim" value="<?php echo $row['date_claim'];?>" readonly>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Request Office/ Request by:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="reqby" name="reqby" value="<?php echo $row['requestby']; ?>" readonly >
                                         <?php
							$itmno = $row['itemno']; 
							$q=mysql_query("SELECT * FROM tbl_supplies where itemno='$itmno'");
							while($row=mysql_fetch_array($q)){
							?>
                            <input type="hidden" id="r_qty" name="r_qty" value="<?php echo $row['remaining_supply'];?>"/><?php }}?>
                                    </div>
                                </div>
                             
                               <br>
                             
                                <div class="pull-right" style="padding-right:50px;">
                                
                                    <a href="notification.php" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Approved</button> 
                                </div>
                            </div>
                            </form>
                            <?php ?>
   </div>
               </div>  
					  </div>
                  
                
                <!-- /.row -->    '

<script src="assets/js/custom.js">
</script>
<?php /*?><script type="text/javascript">
	$("#frmApproved").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'approved_process.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#logMsg").empty();
	     $("#logMsg").html(data);
	    //alert(returndata);
	  }
	  });
	  return false;
	});
</script><?php */?>