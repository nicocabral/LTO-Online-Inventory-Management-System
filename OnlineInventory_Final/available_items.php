<?php include('includes/header.php');?>
  
<body>
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
				</span>
            </div>
    <div style="color: white;
    padding: 15px 50px 5px 50px;
    float: right;
    font-size: 15px;">LTO - Inventory System &nbsp; 
    <a href="login.php" data-toggle="tooltip" title="Login" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-log-in"></span>&nbsp;</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
    				<!-- <li class="text-center"><img src="assets/img/find_user.png" class="user-image img-responsive"/></li> -->
    				<li><a  href="index.php"><img src="img/icon/home.png" width="45px">&nbsp; Home</a></li>
                    <li><a  href="aboutus.php" ><img src="img/icon/about.png" width="40px">&nbsp; About Us</a></li>
                    <li><a  href="#" class="active-menu"><img src="img/icon/report.png" width="40px">&nbsp; Available Items</a></li>
    				<li><a  href="login.php"><img src="img/icon/admin.png" width="40px">&nbsp; Login</a></li>
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
                       <h3><img src="img/icon/report.png" width="40px">&nbsp;Available Items List</h3>
                     <?php 
                        include('includes/dbconn.php');
                        $ctr_result = mysql_query("SELECT COUNT(*) as counter FROM tbl_supplies") or die(mysql_error());
                        while($ctr_row = mysql_fetch_array($ctr_result)){
                    ?>
                    <div class="btn btn-warning"><strong>Item(s)</strong>&nbsp;<span class="badge pull-right"><?php echo $ctr_row['counter']; ?></span></div>
                    <?php } ?>
                    </div>
                    <div class="row">  
                    <div class="col-md-12">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-responsive table-hover">
                                    <thead>
                                        <tr class="success">
                                            <th style="width:90px; text-align:center;">Item No.</th>
                                            <th style="text-align:center;">Unit</th>
                                            <th style="text-align:center;">Item Name</th>
                                            <th style="text-align:center;">Description</th>
                                            <th style="text-align:center;">Quantity</th>
                                            <th style="text-align:center;">Availability</th>
                                            <th style="text-align:center; width:250px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        include('includes/dbconn.php');
                                        $result = mysql_query("SELECT * FROM tbl_supplies") or die(mysql_error());
                                        while($row = mysql_fetch_array($result)){
                                    ?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $row['itemno']; ?></td>
                                            <td><?php echo $row['unit']; ?></td>
                                            <td><?php echo $row['itemname']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td  style="text-align:center;"><?php echo $row['remaining_supply']; ?></td>
                                            <?php 
                                              if($row['remaining_supply']>0){
                                                $avail = 'Available';
												$dis = 'enabled';
                                              }else{
                                                $avail = 'Out of Stock';
												$dis = 'disabled';
                                              }
                                            ?>
                                            <td  style="text-align:center;"><?php echo $avail; ?></td>
                                            <td style="font-family:verdana;">
                                              <center>
                                                <button <?php echo $dis;?> class="btn btn-success btn-sm"><a href="request_form.php?id=<?php echo $row['itemno'];?>"><span id="edit_href">Request Item</a></span></button>
                                              </center>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- /.row -->
     

            <?php include('includes/footer.php');?>

</body>
</html>
