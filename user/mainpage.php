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
				<?php echo '<script> document.write(Date());</script>'?></marquee>
        </div>
    <div style="color: white;
    padding: 15px 50px 5px 50px;
    float: right;
    font-size: 15px;"> Welcome <b><?php echo $_SESSION['name'];?></b> &nbsp;
         <a href="user_settings.php" data-toggle="tooltip" title="Account Settings"><span class="glyphicon glyphicon-cog"></span> </a>
                                &nbsp; &nbsp;
    <a href="logout_process.php?logout=1" data-toggle="tooltip" title="Logout" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Log-out</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <?php include('nav.php');?>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <h3><img src="../img/icon/report.png" width="40px">&nbsp;Available Items List</h3>
                     <?php 
                        include('../includes/dbconn.php');
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
                                            <th style="text-align:center; width:auto;">Quantity</th>
                                            <th style="text-align:center; width:auto;">Unit</th>
                                            <th style="text-align:center; width:auto;">Item Name</th>
                                            <th style="text-align:center; width:auto;">Description</th>
                                            <th style="text-align:center; width:auto;">Quantity</th>
                                            <th style="text-align:center; width:auto;">Availability</th>
                                            <th style="text-align:center; width:auto;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        include('../includes/dbconn.php');
                                        $result = mysql_query("SELECT * FROM tbl_supplies") or die(mysql_error());
                                        while($row = mysql_fetch_array($result)){
                                    ?>
                                        <tr>
                                            <td style="text-align:center; width:auto;"><?php echo $row['itemno']; ?></td>
                                            <td style="text-align:center; width:auto;"><?php echo $row['qty']; ?></td>
                                            <td style="text-align:center; width:auto;"><?php echo $row['unit']; ?></td>
                                            <td style="text-align:center; width:auto;"><?php echo $row['itemname']; ?></td>
                                            <td style="text-align:center; width:auto;"><?php echo $row['description']; ?></td>
                                            <td  style="text-align:center; width:auto;"><?php echo $row['remaining_supply']; ?></td>
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
              
                <!-- /.row -->    '

<script src="assets/js/custom.js"></script>
