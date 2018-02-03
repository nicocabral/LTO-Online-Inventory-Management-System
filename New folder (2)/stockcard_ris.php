<?php 
    session_start(); 
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
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
        </div>
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
                            <li><a class="active-menu" href="stockcard_ris.php">Stockcard</a></li>
                    </ul>
                    </li>
                    <li>
                     <?php include('includes/dbconn.php');
                        $query_count = mysql_query("Select count(status) as count from tbl_requestitem where status ='new'");
                        while($row=mysql_fetch_array($query_count)){
                    
                    ?>
                    <a href="notification.php" data-toggle="tooltip" title="Hey you have request!"><img src="img/icons/web_help2.ico" width="40px">&nbsp; Notification <span class="btn btn-info">&nbsp;<?php echo $row['count'];}?></span></a></li>
   
                    <li><a href="#"><img src="img/icon_png/a_dispatch_order_256.png" width="45px" />&nbsp; Inventory</a></li>  
                    <li>
                        <a href="settings.php"><img src="img/icon/tools.png" width="40px">&nbsp; Tools<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="#">Activity Logger</a></li>
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
                            <h2><img src="img/icon/request.png" width="40px"> Item Stock Card</h2>
                        <hr><br />
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="warning">
                                            <th  style="text-align:center;" class="hidden-print">Action</th>
                                            <th style="text-align:center; width:auto;">Stock No.</th>
                                            <th style="text-align:center; width:auto;">Item No.</th>
                                            <th style="text-align:center; width:auto;">Item Name</th>
                                            <th style="text-align:center; width:auto;">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        include('includes/dbconn.php');
                                        $result = mysql_query("SELECT * FROM tbl_supplies") or die(mysql_error());
                                        $ctr = 1;
                                        while($row = mysql_fetch_array($result)){
                                    ?>
                                        <tr>
                                            <td class="text-cente"><center>
                                                <a href="view_stockcard_ris.php?itemno=<?php echo $row['itemno'];?>&&stockno=<?php echo $row['stock_no'];?>&&balance=<?php echo $row['remaining_supply'];?>" data-toggle="tooltip" title="View Item StockCard"><img src="img/icons/pen_yellow.ico" width="17px"></a>

                                            </center></td>
                                            <td align="center"><?php echo $row['stock_no'];?></td>
                                            <td align="center"><?php echo $row['itemno'];?></td>
                                            <td align="center"><?php echo $row['itemname'];?></td>
                                            <td align="center"><?php echo $row['description'];?></td>
                                        </tr>

                                        <?php $ctr++; ?>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                <!-- /.row -->    '


<script src="assets/js/custom.js"></script>
<?php include('includes/footer.php');?>

</body>
</html>
<?php 
}else{
    header('location:index.php');
}   
?>