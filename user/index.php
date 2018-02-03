<?php include('./includes/header.php');?>

 <?php 
        session_start();
        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
			
  echo "<script>window.location.assign('../login.php')</script>";
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
                    <li><a  href="aboutus.php"><img src="img/icon/about.png" width="40px">&nbsp; About Us</a></li>
                    <li><a  href="available_items.php"><img src="img/icon/report.png" width="40px">&nbsp; Available Items</a></li>
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
                    <div class="row carousel-holder">
                        <div class="col-md-12">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img class="slide-image" src="img/slider/bg0.png" alt="">
                                    </div>
                                    <div class="item">
                                        <img class="slide-image" src="img/slider/bg1.png" alt="">
                                    </div>
                                    <div class="item">
                                        <img class="slide-image" src="img/slider/bg2.png" alt="">
                                    </div>
                                    <div class="item">
                                        <img class="slide-image" src="img/slider/bg3.png" alt="">
                                    </div>
                                     <div class="item">
                                        <img class="slide-image" src="img/slider/bg4.png" alt="">
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
        <?php }else if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
                    include('mainpage.php');
                }
        ?>

            <?php include('../includes/footer.php');?>

</body>
</html>
