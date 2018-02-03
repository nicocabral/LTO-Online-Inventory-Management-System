<?php include('./includes/header.php');
 session_start();
 ?>  

<body>
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
				</span>
            </div>
  
        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
               
    				<!-- <li class="text-center"><img src="assets/img/find_user.png" class="user-image img-responsive"/></li> -->
    	</div>			
        </nav>  
        <!-- /. NAV SIDE  -->
         <div id="page-wrapper" >
            <div id="page-inner">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                      <div class="col-md-12">
                       <h2><img src="../img/icon/request.png" width="40px"> Please Fill-up the space provided below:</h2>
                       <hr>
                      </div>
                    </div>
                    <br>

                    <div id="logMsg"></div>

                    <div class="row">
                    <div class="col-md-12">
                    <?php 
                        include('../includes/dbconn.php');
 						$itemno =intval( $_GET['id']);
                        $result = mysql_query("SELECT * FROM tbl_supplies WHERE itemno = $itemno") or die(mysql_error());
                        while($row = mysql_fetch_array($result)){
                    ?>
                        <form id="frmRequest" name="frmRequest" class="form-horizontal">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Item No.</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $itemno; ?>" id="itemno" name="itemno" required readonly />
                                    </div>
                                </div> 
                                 <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Stock no:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['stock_no']; ?>" id="stno" name="stno" required readonly>
                                    </div>
                                    </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Item Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['itemname']; ?>" id="itemname" name="itemname" required readonly>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="desc" class="col-sm-3 control-label">Description:</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="desc" rows="3" readonly><?php echo $row['description']; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Remaining Qty:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $row['remaining_supply']; ?>" id="name" name="rqty"  required readonly>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Date to be Claim:</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="name" name="dateclaim"  required>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Request Qty:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="reqqty" name="reqqty" required>
                                    </div>
                                </div> 
                                 <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Request by:</label>
                                    <div class="col-sm-8">
                                        <input type="type" class="form-control" id="reqby" name="reqby" required >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Division Office:</label>
                                    <div class="col-sm-8">
                                        <input type="type" class="form-control" id="div_office" name="div_office" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-8">
                                        <input type="hidden" class="form-control" id="reqid" name="reqid" value="<?php $req_id = $_SESSION['id']; echo $req_id; ?>"  readonly>
                                    </div>
                                </div>
                               <br>
                                <div class="pull-right" style="padding-right:50px;">
                                    <a href="index.php" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Send Request</button> 
                                </div>
                            </div>
                            </form>
                        <?php } ?>
                        </div>
                    </div>
                   <br><br>
                 
      <?php include('includes/footer.php');?>

</body>
</html>
