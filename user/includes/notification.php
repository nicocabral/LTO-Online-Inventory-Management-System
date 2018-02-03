
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
    				<li><a href="index.php"><img src="../img/icon/home.png" width="45px">&nbsp; Home</a></li>
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
                        <h2><img src="../img/icon_png/a_stamp_paper_256.png" width="40px">Approved Request</h2>
                       <hr>
                      </div>
                   </div>
					<div class="row">
                    <div class="col-md-12">
                                          <!-- Nav tabs --><?php include('../includes/dbconn.php');
										  $id = intval($_SESSION['id']);
											
										  ?>
                                        <?php 
											 
											 $count_item = mysql_query("select count(status) as sts from tbl_requestitem where req_id='$id' and status='approved'"); 
												while($row=mysql_fetch_array($count_item)){
					?>
                                        <div role="tabpanel" class="tab-pane" id="approved">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                <div id="counter">
                                                    <span style="font-size: 18px; color:#209900; font-weight:bold;"><?php echo $row['sts'];}?> &nbsp;Approved</span>
                                                   <?php $count_r = mysql_query("SELECT count(status) as stsr from tbl_requestitem where req_id='$id' and status='reject'");
												   while($row=mysql_fetch_array($count_r)){
													   ?>
											&emsp; <a href="print.php" data-toggle="tooltip" title="Print"><img src="../img/icon/printer.ico" width="30px;" /></a> &emsp;<a href="print_completed.php" data-toggle="tooltip" title="Print Complete Status"><img src="../img/icons/ok.ico" width="30px;" /></a>
									 &emsp;| &emsp;<a href="notification_reject.php"><span style="font-size: 18px; color:#F00; font-weight:bold;"><?php echo $row['stsr'];}?> &nbsp;Rejected</span></a>
                                                      </div>
                                                    <table class="table table-striped table-hover" style="font-size:13px; margin-top:10px;">
                                                        <thead>
                                                            <tr class="success">
                                                            	<th style="text-align:center;">&nbsp;ID</th>
                                                                <th style="text-align:center;">Item no.</th>
                                                                <th style="text-align:center;">Item Name</th>
                                                                <th style="text-align:center;">Description</th>
                                                                <th style="text-align:center;">Quantity</th>
                                                                <th style="text-align:center;">Date Requested</th>
                                                                <th style="text-align:center">Requested by</th>
                                                                <th style="text-align:center">Division Office</th>
                                                                <th style="text-align:center">Aproved by</th>
                                                                <th style="text-align:center;">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                                                            include('../includes/dbconn.php');
                                                            $status = 'approved';
                                                            $result = mysql_query("SELECT * FROM tbl_requestitem WHERE req_id='$id' and status = '$status'") or die(mysql_error());
                                                            while($row = mysql_fetch_array($result)){
                                                        ?>
                                                      	    <tr id="list<?php echo $row['request_id'];?>" class="record">
                                                            	<td style="text-align:center;"><?php echo $row['request_id'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['itemno'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['itemname'];?></td>
                                                                <td style="text-align:center"><?php echo $row['description'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['qty'];?>&nbsp;pc/s</td>
                                                                <td style="text-align:center;"><?php echo $row['date_request'];?></td>
                                                                 <td style="text-align:center;"><?php echo $row['requestby'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['division_office'];?></td> 
                                                                 <td style="text-align:center;"><?php echo $row['approved_by'];?></td>
                                                                <td style="font-family:verdana;">
                                                                  <center>
<a class="del<?php echo $row['request_id'];?>" href="#" id="<?php echo $row['request_id'];?>" data-toggle="tooltip" title="Delete?"><img src="../img/icons/stop.ico" alt="Delete" width="17px"></a></center>
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
        }
           }); 
		   window.location="notification.php";
                      }else{
                                                                        return false;}
                                                                });
										</script>
                                                                  <center>
                                                                   <!----------------------delete------------------>  
                                                                   
                                                                  </center>
                                                                </td>
                                                            </tr>
                                                        <?php }?>
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