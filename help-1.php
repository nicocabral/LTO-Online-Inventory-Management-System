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
                       <h2><img src="img/icons/desktop.ico" width="40px"> Using the system (Admin Panel)</h2>
                       <hr>
                       <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#inventory" aria-controls="inventory" role="tab" data-toggle="tab"><strong>7.Inventory Form</strong></a></li>
    <li role="presentation"><a href="#tools" aria-controls="tools" role="tab" data-toggle="tab">8.Tools Form</a></li>
    <li role="presentation"><a href="#backup" aria-controls="backup" role="tab" data-toggle="tab">9.Back up database Form</a></li>
    <li role="presentation"><a href="#restore" aria-controls="restore" role="tab" data-toggle="tab">10.Restore form</a></li>
    
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="inventory">
    <br>
    <div class="row">
    <div class="col-lg-6">
    <ul>
    <li><img src="img/help/7.png" class="img-responsive"></li>
    <li><img src="img/help/7-1.png" class="img-responsive"></li>
	</ul></div>
    <div class="col-lg-6"><ul>
    <li style="list-style-type:none;">1.	Click the inventory button to proceed to the inventory form </li>
    <li style="list-style-type:none;">2.	Search option to print by all, single or date range </li>
    <li style="list-style-type:none;">3.	Click the print icon to proceed in printing the inventory report. </li>
    </ul>
    </div></div>
    </div>
    <!--------------------->
    <div role="tabpanel" class="tab-pane" id="tools"><br>
    <div class="row">
    <div class="col-lg-6">
    <img src="img/help/8.png" class="img-responsive"></div>
    <div class="col-lg-6"><ul>
    <li style="list-style-type:none;">1.	Click the about settings button to proceed to the about settings form.</li>
    <li style="list-style-type:none;">2.	Click update button to update the information.</li>
  
    </ul>
    </div>
    
    </div></div>
    
    
    <!-------------------->
    <div role="tabpanel" class="tab-pane" id="backup"><br>
    <div class="row">
    <div class="col-lg-6">
    <img src="img/help/9.png" class="img-responsive">
    </div>
    <!------------>
    <div class="col-lg-6">
    <ul>
    <li style="list-style-type:none;">1.	Click the backup database button to proceed to the next form.</li>
    <li style="list-style-type:none;">2.	Click the backup button to backup the database </li>
  

    </ul>
    
    </div>
    </div>    
    </div>
    <!------------------------>
    <div role="tabpanel" class="tab-pane" id="restore"><br>
    <div class="row">
    <div class="col-lg-6">
    <ul>
    <li><img src="img/help/10.png" class="img-responsive"></li>
</ul>
    </div>
    <div class="col-lg-6">
    <ul>
    <li style="list-style-type:none;">1.	Click the restore database to proceed.</li>
    <li style="list-style-type:none;">2.	Click choose file button </li>
    <li style="list-style-type:none;">3.	Click restore button to restore the database</li>
    <li style="list-style-type:none;"><br><a href="help-user.php" data-toggle="tooltip" title="Click here for users panel"><strong>For user panel</strong></a></li>

    

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
