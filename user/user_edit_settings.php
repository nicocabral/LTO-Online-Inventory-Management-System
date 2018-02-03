<?php include('./includes/header.php');?>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
			echo "<script>window.location.assign('../login.php')</script>";
    ?>  
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
    font-size: 15px;"> LTO -Inventory System &nbsp; <img src="img/icon/admin.png" width="30px"> </div>
        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                  <!-- <li class="text-center"><img src="assets/img/find_user.png" class="user-image img-responsive"/></li> -->
                  <li><a href="index.php"><img src="img/icon/home.png" width="45px">&nbsp; Home</a></li>
                  <li><a  href="about.php"><img src="img/icon/about.png" width="40px">&nbsp; About Us</a></li>
                  <li><a  href="location.php"><img src="img/icon/location.png" width="40px">&nbsp; Location</a></li>
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
                       <h2><img src="img/icon/purchaseorder.png" width="40px"> List of Items</h2>
                       <hr>
                      </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">  
    				<div class="col-md-5">
                        <div class="b-form">
                        
                </div>
				</div>
				</div>
			
			
                <!-- /.row -->
      <?php }else{ include('includes/user_edit_settings.php'); }?>
      <?php include('../includes/footer.php');?>

</body>
</html>
