<?php include('includes/header.php');?>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
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
                  <li><a  href="aboutus.php"><img src="img/icon/about.png" width="40px">&nbsp; About Us</a></li>

                  <li><a  href="available_items.php"><img src="img/icon/report.png" width="40px">&nbsp;Available Items</a></li>
                   <li class="active"><a  href="help.php"><img src="img/icons/help.ico" width="40px">&nbsp;Help</a></li>
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
                       <h2><img src="img/icons/desktop.ico" width="40px"> Using the system (User's Panel)</h2>
                       <hr>
                       <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab"><strong>1.Login Form (User)</strong></a></li>
    <li role="presentation"><a href="#available" aria-controls="available" role="tab" data-toggle="tab">2.Available Supply Form</a></li>
    <li role="presentation"><a href="#request" aria-controls="request" role="tab" data-toggle="tab">3.Request Form</a></li>
    <li role="presentation"><a href="#confirm" aria-controls="confirm" role="tab" data-toggle="tab">4.Confirmation Request form</a></li>
    
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="login">
    <br>
    <div class="row">
    <div class="col-lg-6">
    <ul>
    <li><h4>Before the user could request the supplies, the user should have an account.
The admin is the only one who could access to make an account for the users.
</h4></li>
    <li><img src="img/help/u-1.png" class="img-responsive"></li>
	</ul></div>
    <div class="col-lg-6"><ul>
    <li style="list-style-type:none;">1.	Click the inventory button to proceed to the inventory form </li>
    <li style="list-style-type:none;">2.	Search option to print by all, single or date range </li>
    <li style="list-style-type:none;">3.	Click the print icon to proceed in printing the inventory report. </li>
    </ul>
    </div></div>
    </div>
    <!--------------------->
    <div role="tabpanel" class="tab-pane" id="available"><br>
    <div class="row">
    <div class="col-lg-6">
    <img src="img/help/u-2.png" class="img-responsive"></div>
    <div class="col-lg-6"><ul>
    <li style="list-style-type:none;">Click the request button to request products.</li>
   
    
    </ul>
    </div>
    
    </div></div>
    
    
    <!-------------------->
    <div role="tabpanel" class="tab-pane" id="request"><br>
    <div class="row">
    <div class="col-lg-6">
    <img src="img/help/u-3.png" class="img-responsive">
    </div>
    <!------------>
    <div class="col-lg-6">
    <ul>
    <li style="list-style-type:none;">1. Fill up the blank space to complete the form.</li>
    <li style="list-style-type:none;">2. Click the request button to send demand supply </li>
  

    </ul>
    
    </div>
    </div>    
    </div>
    <!------------------------>
    <div role="tabpanel" class="tab-pane" id="confirm"><br>
    <div class="row">
    <div class="col-lg-6">
    <ul>
    <li><img src="img/help/u-4.png" class="img-responsive"></li>
</ul>
    </div>
    <div class="col-lg-6">
    <ul>
    <li style="list-style-type:none;">1.	Click the approved button.</li>
    <li style="list-style-type:none;">2.	Click the print button to print the request supply</li>
    <li style="list-style-type:none;">3.	Click the reject button to reject the supply.</li>
    <li style="list-style-type:none;">3.	Click the X button to delete the request.</li>
    

    

    </ul>
    </div>
    </div>
    </div>
    <!--------------------------------->
   
  </div>

</div>
                      </div>
                    </div>
                    <!-- /.row -->
                   
                <!-- /.row -->
      <?php }else{ header('location:index.php'); }?>
      <?php include('includes/footer.php');?>

</body>
</html>
