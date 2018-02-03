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
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><strong>1.Login Form</strong></a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">2.Supply Form</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">3.Supplier Form</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">4.Requisition and issue slip form</a></li>
    <li role="presentation"><a href="#stockcard" aria-controls="stockcard" role="tab" data-toggle="tab">5.Stockcard form</a></li>
    <li role="presentation"><a href="#notification" aria-controls="notification" role="tab" data-toggle="tab">6.Notification form</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    <br>
    <div class="row">
    <div class="col-lg-6">
    <img src="img/help/1.png" class="img-responsive">
	</div>
    <div class="col-lg-6"><ul>
    <li style="list-style-type:none;">1.	Enter the username </li>
    <li style="list-style-type:none;">2.	Enter the password </li>
    <li style="list-style-type:none;">3.	After entering the username and the password, click the log-in button to proceed</li>
    <li style="list-style-type:none;">4.	Click the clear button to delete</li> 
</li>
    </ul>
    </div></div>
    </div>
    <!--------------------->
    <div role="tabpanel" class="tab-pane" id="profile"><br>
    <div class="row">
    <div class="col-lg-6">
    <img src="img/help/2.png" class="img-responsive"></div>
    <div class="col-lg-6"><ul>
    <li style="list-style-type:none;">1.	To be able to proceed to the supply form, click the supply button. </li>
    <li style="list-style-type:none;">2.	To add a supply </li>
    <li style="list-style-type:none;">3.	To search the product by arrival date</li>
    <li style="list-style-type:none;">4.	To search the supply stock number</li> 
    <li style="list-style-type:none;">5.	To edit or delete the existing supply</li> 
	<li style="list-style-type:none;">6.	To print the available supplies </li>
    </ul>
    </div>
    
    </div></div>
    
    
    <!-------------------->
    <div role="tabpanel" class="tab-pane" id="messages"><br>
    <div class="row">
    <div class="col-lg-6">
    <img src="img/help/3.png" class="img-responsive">
    </div>
    <!------------>
    <div class="col-lg-6">
    <ul>
    <li style="list-style-type:none;">1.	To be able to open the supplier form, click the supplier button. </li>
    <li style="list-style-type:none;">2.	To add a supplier  </li>
    <li style="list-style-type:none;">3.	To edit or delete an existing supplier</li>
    <li style="list-style-type:none;">4.	To print the information about the supplier</li> 
    <li style="list-style-type:none;">5.	To search the suppliers name</li> 

    </ul>
    
    </div>
    </div>    
    </div>
    <!------------------------>
    <div role="tabpanel" class="tab-pane" id="settings"><br>
    <div class="row">
    <div class="col-lg-6">
    <ul>
    <li><img src="img/help/4-1.png" class="img-responsive"></li>
    <li><img src="img/help/4-2.png" class="img-responsive"></li></ul>
    </div>
    <div class="col-lg-6">
    <ul>
    <li style="list-style-type:none;">1.	To be able to precede to the requisition an issue slip form, click the RIS button </li>
    <li style="list-style-type:none;">2.	To view more requisition and issuance of supplies.</li>
    <li style="list-style-type:none;">3.	Search option to print by all, single or date range.</li>
    <li style="list-style-type:none;">4.	To print the requisition and issuance slip</li> 
    

    </ul>
    </div>
    </div>
    </div>
    <!--------------------------------->
    <div role="tabpanel" class="tab-pane" id="stockcard"><br>
    <div class="row">
    <div class="col-lg-6">
    <ul>
    <li><img src="img/help/5-1.png" class="img-responsive"></li>
    <li><img src="img/help/5-2.png" class="img-responsive"></li></ul>
    </div>
    <div class="col-lg-6">
    <ul>
    <li style="list-style-type:none;">1.	To be able to proceed to the stockcard form, click the stockcard button. </li>
    <li style="list-style-type:none;">2.	To view item stockcard</li>
    <li style="list-style-type:none;">3.	To print the updated supplies in the stockcard</li>
    
    

    </ul>
    </div>
    </div>
    </div>
    <!--------------------------------->
	 <div role="tabpanel" class="tab-pane" id="notification"><br>
    <div class="row">
    <div class="col-lg-6">
    <ul>
    <li><img src="img/help/6.png" class="img-responsive"></li>
    </ul>
    </div>
    <div class="col-lg-6">
    <ul>
    <li style="list-style-type:none;">1.	Click the notification button , to proceed to the notification form</li>
    <li style="list-style-type:none;">2.	Open the new request of supplies, approved supplies and rejected supplies.</li>
    <li style="list-style-type:none;">3.	To view the request information and to rejected the request.</li>
    
    <li style="list-style-type:none;"></li>
    <li style="list-style-type:none;"><br><a href="help-1.php" data-toggle="tooltip" title="Click here to continue"><strong>Next Page</strong></a></li>

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
