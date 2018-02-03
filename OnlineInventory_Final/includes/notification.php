
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
    font-size: 15px;"> Welcome <b><?php echo $_SESSION['name'];?></b>&nbsp;<a href="user_settings.php" data-toggle="tooltip" title="Account Settings"><span class="glyphicon glyphicon-cog"></span> </a>&nbsp;&nbsp;
                             
    <a href="logout_process.php?logout=1" data-toggle="tooltip" title="Logout" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Log-out</a> </div>
</nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
               <ul class="nav" id="main-menu">
    				<!-- <li class="text-center"><img src="assets/img/find_user.png" class="user-image img-responsive"/></li> -->
    				<li><a href="index.php"><img src="img/icon/home.png" width="45px">&nbsp; Home</a></li>
                    <li><a  href="stockcard.php"><img src="img/icon/purchaseorder.png" width="40px">&nbsp; Items <span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                            <li> <a href="stockcard.php">Supplies</a></li>
                            <li><a href="supplier.php">Supplier</a></li>
                            <li><a href="ris.php">RIS</a></li>
                            <li><a href="stockcard_ris.php">Stockcard</a></li>
                    </ul>
                    <li>
                    <li>
                    
                    <?php include('dbconn.php');
						$query_count = mysql_query("Select count(status) as count from tbl_requestitem where status ='new'");
						while($row=mysql_fetch_array($query_count)){
				
					
					?>
                    
                    <a class="active-menu" href="#"><img src="img/icons/web_help2.ico" width="40px">&nbsp; Notification <span class="btn btn-info">&nbsp;<?php echo $row['count'];?></span></a></li>
                    <?php }?>
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
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="container-fluid">
                <!-- Page Heading -->
				      <div class="row">
                      <div class="col-md-12">
                        <h2><img src="img/icon_png/a_stamp_paper_256.png" width="40px"> List of Requested Items  </h2>
                       <hr>
                      </div>
                   </div>
					<div class="row">
                    <div class="col-md-12">
                     	
                         <div class="col-md-2" style="padding-left:5px; padding-top:10px; padding-bottom:10px;">
                                          <!-- Nav tabs --><?php include('includes/dbconn.php');?>
                                          <ul class="nav nav-pills nav-stacked" >
                                            <li role="presentation" class="active">
                                             <?php 
											 
											 $count_item = mysql_query("select count(status) as sts from tbl_requestitem where status='new' ");
												while($row=mysql_fetch_array($count_item)){
					?>
                                            <a href="#new" aria-controls="home" role="tab" data-toggle="tab" title="New Request">New&nbsp;<span class="badge pull-right"><?php echo $row['sts'];?></span></a></li>
                                            <?php }?>
                                            <li role="presentation">
                                            <?php 
											 
											 $count_item = mysql_query("select count(distinct requestby) as sts from tbl_requestitem where status='approved'");
												while($row=mysql_fetch_array($count_item)){
					?>
                                            <a href="#approved" aria-controls="profile" role="tab" data-toggle="tab" title="Approved">Approved &nbsp;<span class="badge pull-right"><?php echo $row['sts'];}
										
											?></span></a></li>
                                            <li role="presentation">
                                            <?php 
											 
											 $count_item = mysql_query("select count(status) as sts from tbl_requestitem where status='reject' ");
												while($row=mysql_fetch_array($count_item)){
					?>
                                            
                                            <a href="#rejected" aria-controls="messages" role="tab" data-toggle="tab" title="Rejected">Rejected &nbsp;<span class="badge pull-right"><?php echo $row['sts'];}?></span></a></li>
                                          </ul>
                                        </div>
                                        <!--------------------nav------------------------->
                                        <div id="logMSG"></div>
                                        <div class="col-md-10"><?php 
											 
											 $count_item = mysql_query("select count(status) as sts from tbl_requestitem where status='new'");
												while($row=mysql_fetch_array($count_item)){
					?>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                          <div role="tabpanel" class="tab-pane active" id="new">
                                              <div class="panel-body">
                                                <div class="table table-responsive">
                                                    <span style="font-size: 18px; color:#002268; font-weight:bold;"><?php echo $row['sts'];}?> &nbsp;New Request </span>
                                                    <table class="table table-striped table-hover" style="font-size:14px; margin-top:5px;">
                                                        <thead>
                                                            <tr class="success">
                                                                <th align="center">Item No.</th>
                                                                <th align="center">Item Name</th>
                                                                <th align="center">Description</th>
                                                                <th align="center">Quantity</th>
                                                                <th align="center">Requested by</th>
                                                                <th align="center">Date Requested</th>
                                                                <th align="center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                                                            include('includes/dbconn.php');
                                                            $status = 'new';
                                                            $result = mysql_query("SELECT * FROM tbl_requestitem WHERE status = '$status' limit 10") or die(mysql_error());
                                                            while($row = mysql_fetch_array($result)){
                                                        ?>
                                                            <tr>
                                                           
                                                                <td align="center"><?php echo $row['itemno'];?></td>
                                                                <td align="center"><?php echo $row['itemname'];?></td>
                                                                <td align="center"><?php echo $row['description'];?></td>
                                                                <td align="center"><?php echo $row['qty'];?></td>
                                                                <td align="center"><?php echo $row['requestby'];?></td>
                                                                <td align="center"><?php echo $row['date_request'];?></td>
                                                                <td align="center">
                                                             
                                                                    <a href="notification_process.php?id=<?php echo $row['request_id'];?>" data-toggle="tooltip" title="View Request Info"><button class="btn btn-success btn-sm" type="submit"><span class="glyphicon glyphicon-eye-open"></span></button></a>
                                                                    
          <!--------------------------------------Reject------------------------------------------------->                                                                    <a href="notification_rejectprocess.php?id=<?php echo $row['request_id'];?>" data-toggle="tooltip" title="Reject"><button class="btn btn-danger btn-sm" type="button"><span class="glyphicon glyphicon-thumbs-down"></span></button></a>
                                                                 
                                                                </td>
                                                            </tr>
                                                        <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                              </div>
                                        </div>
                                        <!-- End Tab panes -->
                                        <?php 
											 
											 $count_item = mysql_query("select count(distinct requestby) as sts from tbl_requestitem where status='approved' ");
												while($row=mysql_fetch_array($count_item)){
					?>
                                        <div role="tabpanel" class="tab-pane" id="approved">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                <div id="counter">
                                                    <span style="font-size: 18px; color:#209900; font-weight:bold;"><?php echo $row['sts'];}?> &nbsp;Approved</span></div>
                                                    <table class="table table-striped table-hover" style="font-size:14px; margin-top:10px;">
                                                        <thead>
                                                            <tr class="success">
                                                                <th style="text-align:center;">Actions</th>
                                                                <th style="text-align:center;">No.</th>
                                                                <th style="text-align:center; width:400px;">No. of Item Requested</th>
                                                                <th style="text-align:center; width:200px;">Requested by</th>
                                                                <th style="text-align:center; width:200px;">Contact</th>
                                                                <th style="text-align:center; width:200px;">Designation</th>
                                                                <th style="text-align:center; width:200px;">Office</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                                                            include('includes/dbconn.php');
                                                            $status = 'approved';
                                                            $result = mysql_query("SELECT * FROM tbl_requestitem WHERE status = '$status' GROUP BY requestby") or die(mysql_error());
                                                            $ctr = 1;
                                                            while($row = mysql_fetch_array($result)){
                                                              $requestby = $row['requestby'];
                                                        ?>
                                                      	<tr id="list<?php echo $row['request_id'];?>" class="record">

                                                              <td style="font-family:verdana;">
                                                                <center>
                                                                  <a href="print_ris.php?name=<?php echo $row['requestby'];?>" data-toggle="tooltip" title="View & Print Request Item/s"><img src="img/icons/print_preview.ico" alt="Delete" width="20px"></a>
                                                                </center> 
                                                              </td>

                                                            	<td style="text-align:center;"><?php echo $ctr;?></td>
                                                              <?php
                                                                $count_item = mysql_query("SELECT COUNT(requestby) AS sts FROM tbl_requestitem WHERE status='$status' AND requestby='$requestby'");
                                                                while($row2=mysql_fetch_array($count_item)){
                                                              ?>
                                                                <td style="text-align:center;"><strong><?php echo $row2['sts'];?></strong></td>
                                                              <?php } ?>
                                                              <td style="text-align:center;"><?php echo $row['requestby'];?></td>
                                                              <td style="text-align:center;">+639093077234</td>
                                                              <td style="text-align:center;">CEO</td>
                                                              <td style="text-align:center;">LTO</td>
                                                            </tr>
                                                            <?php $ctr++;?>
                                                        <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                              </div>

                                        </div>
                                        <?php 
											 
											 $count_item = mysql_query("select count(status) as sts from tbl_requestitem where status='reject' ");
												while($row=mysql_fetch_array($count_item)){
					?>
                              
                                        <div role="tabpanel" class="tab-pane" id="rejected">
                                          
                                             <div class="panel-body">
                                                <div class="table-responsive">
                                                    <span style="font-size: 18px; color:#c02a26; font-weight:bold;"><?php echo $row['sts'];}?> &nbsp;Rejected</span>
                                                    <table class="table table-striped table-hover" style="font-size:13px; margin-top:10px;">
                                                        <thead>
                                                            <tr class="danger">
                                                            	<th style="text-align:center;"> ID</th>
                                                                <th style="text-align:center; width:100px;">Item No.</th>
                                                                <th style="text-align:center; width:200px;">Item Name</th>
                                                                <th style="text-align:center; width:300px; text-align:center;">Description</th>
                                                                <th style="text-align:center; width:100px;">Quatity</th>
                                                                <th style="text-align:center; width:200px;">Date Requested</th>
                                                                <th style="text-align:center">Requested by</th>
                                                                <th style="text-align:center; width:200px;">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                                                            include('includes/dbconn.php');
                                                            $status = 'reject';
                                                            $result = mysql_query("SELECT * FROM tbl_requestitem WHERE status = '$status'") or die(mysql_error());
                                                            while($row = mysql_fetch_array($result)){
                                                        ?>
                                                            <tr id="<?php echo $row['request_id'];?>" class="record">
                                                            	<td style="text-align:center;"><?php echo $row['request_id'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['itemno'];?></td>
                                                                <td style="text-align:center"><?php echo $row['itemname'];?></td>
                                                                <td style="text-align:center"><?php echo $row['description'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['qty'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['date_request'];?></td>
                                                                 <td style="text-align:center;"><?php echo $row['requestby'];?></td>
                                                                <td style="font-family:verdana;">
                                                                  <center>
                                                               <!---------------delet reject--------------->
 <a class="del<?php echo $row['request_id'];?>" href="#" id="<?php echo $row['request_id'];?>" data-toggle="tooltip" title="Delete?"><img src="img/icons/stop.ico" alt="Delete" width="17px"></a> 
 </center>
 	 <!------------------delete process----------------->
         <script>  
                                                                   $('.del<?php echo $row['request_id']; ?>').click( function() 
	{
      var req_id = $(this).attr("id");
     if(confirm("Are you sure you want to delete request?"))
	 {
     $.ajax({
          type: "POST",
           url: "delete_process.php",
          data: ({request_id: req_id}),
         cache: false,
       success: function(html){
      $("#list<?php echo $row['request_id']; ?>").animate({ backgroundColor: "#fbc7c7" }, "fast")
       .animate({ opacity: "hide" }, "fast");
	   window.location="notification.php";
        }
           }); 
                      }else{
                                                                        return false;}
                                                                });
																
																</script>

                                                              
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                              </div>

                    </div>
               </div>  
					  </div>
                  
                
                <!-- /.row -->    '

<script src="assets/js/custom.js">
</script>
<script type="text/javascript">
	$("#frmRequest").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'notification_process.php',
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
</script>