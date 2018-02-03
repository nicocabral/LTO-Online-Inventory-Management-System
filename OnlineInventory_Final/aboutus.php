<?php include('includes/header.php');?>

 <?php 
        session_start();
        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
?>   
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
                    <li><a  href="#" class="active-menu"><img src="img/icon/about.png" width="40px">&nbsp; About Us</a></li>
                    <li><a  href="available_items.php"><img src="img/icon/report.png" width="40px">&nbsp; Avaialable Items</a></li>
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
                       <h3><img src="img/icon/about.png" width="40px">&nbsp;About us</h3>
                       <hr>
                    <div class="row">
                    <?php 
                        include('includes/dbconn.php');
                        $result = mysql_query("SELECT * FROM tbl_about") or die(mysql_error());
                        while($row = mysql_fetch_array($result)){
                    ?>
                    <div class="panel panel-success">
      					<div class="panel-heading">
                            <h3 class="btn-default"><u><strong><?php echo $row['heading'];?></strong></u></h3></div>
                        <div class="panel-body">
                            <ul>
                                <li><?php echo $row['description'];?></li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <?php } ?>
                    <!-- /.row -->
<?php } ?>
            <?php include('includes/footer.php');?>

</body>
</html>
