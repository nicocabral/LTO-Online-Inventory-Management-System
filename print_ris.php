<?php include('includes/header.php');?>
<?php session_start();?>
<body style="background-color: #F3F3F3;" onLoad="window.print();">
  <div class="container-fluid">
    <div class="hidden-print">
    <?php 
        $name = mysql_real_escape_string($_GET['name']);
    ?>	<a class="btn btn-danger" data-toggle="tooltip" title="Back to notification" href="notification.php"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to notification</a></span>&nbsp; 
	    <span><a class="btn btn-success" data-toggle="tooltip" title="Click to Complete Request/s" href="ris_complete_process.php?name=<?php echo $name;?>"><span class="glyphicon glyphicon-ok"></span>&nbsp;Complete</a></span>&nbsp; 
	  <button onClick="window.print();" data-toggle="tooltip" title="Print Requisition"><img src="img/icon/printer.ico" width="30px;"></button>
	</div>
	<div class="row">
		<div class="print-wrapper">
            <p>
                Republic of the Philippines<br>
                Department of Transportation and Communications<br>
                <strong>LAND TRANSPORTATION OFFICE</strong><br>
                Regional Office No. 8<br>
                Tacloban City
            </p>
            <hr>
            <div style="text-align:center;">
    			<h2><strong>Requisition and Issue Slip</strong></h2>
                <span style="font-size:15px; font-weight:bold;"><u>Land Transportation Office - Region VIII</u></span><br />	
                <em>Agency</em><br /><br />
            </div>		
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-2">
                        <span><u>Division:</u> <strong>LTO VIII</strong></span>
                    </div>
                    <div class="col-sm-2">
                        <span><u>Office:</u> <strong>LTO Tacloban</strong></span>
                    </div>
                    <div class="col-sm-2">
                        <span><u>RIS No.:</u> <strong>0003</strong></span>
                    </div>
                    <div class="col-sm-2">
                        <span><u>SAI No.:</u> <strong><?php $rand=rand(1000000,.999999).'-'.rand(999999,.999999);echo $rand?></strong></span>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="success">
                                <th style="text-align:center; width:20px;">No.</th>
                               	<th style="text-align:center; width:auto;">Item No.</th>
                                <th style="text-align:center; width:auto;">Item Name</th>
                                <th style="text-align:center; width:auto;">Description</th>
                                <th style="text-align:center; width:auto;">Request Qty</th>
                                <th style="text-align:center; width:auto;">Date Requested</th>
                                <th style="width:auto; text-align:center;">Date to be Claim</th>
                                <th style="text-align:center; width:auto;">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
		                    include('includes/dbconn.php');
                            // $itemno = $_GET['itemno'];
                            // $req_id = $_GET['req'];
		                    $result = mysql_query("SELECT * FROM tbl_requestitem WHERE requestby = '$name' AND status='approved'") or die(mysql_error());
                            $ctr = 1;
		                    while($row = mysql_fetch_array($result)){
		                ?>
                            <tr>
                                <td style="text-align:center; font-weight:bold;"><?php echo $ctr;?></td>
                                <td align="center"><?php echo $row['itemno'];?></td>
                                <td align="center"><?php echo $row['itemname'];?></td>
                                <td align="center"><?php echo $row['description'];?></td>
                                <td align="center"><?php echo $row['qty'];?></td>
                                <td align="center"><?php echo $row['date_request'];?></td>
                                <td align="center"><?php echo $row['date_claim'];?></td>
                                <td align="center"><?php echo $row['status'];?></td>
                            </tr>

                            <?php $ctr++; ?>
						<?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="issue-wrap">
                        
                        <div class="col-sm-2">
                            <span>Requested by:<br><br> <strong><?php echo $name;?></strong><br/>
                            <em>Officer</em></span><br />
                            <em><?php echo $row['date_request'];?></em></span>
                        </div>
                        <div class="col-sm-2">
                            <span>Approved by:<br><br> <strong><?php echo $_SESSION['name'] ;?></strong><br/>
                            <em><?php echo $_SESSION['position'];?></em></span><br />
                            <em><?php echo date('Y-m-d');?></em></span>
                        </div>
                        <div class="col-sm-2">
                            <span>ISSUED TO:<br><br> <strong><?php echo $name;?></strong><br/>
                            <em>Supply Officer</em></span><br />
                            <em><?php echo date('Y-m-d');?></em></span>
                        </div>
                        <div class="col-sm-2">
                            <span>Received by:<br><br> <strong><?php echo $name;?></strong><br/>
                            <em>Supply Officer</em></span><br />
                            <em><?php echo date('Y-m-d');?></em></span>
                        </div>
                    </div>
                </div>
     

        <hr>
            <p style="font-size:12px; text-align:right";> Copyright &copy; <em>Land Transportation Office - Inventory System</em> <?php echo date('Y');?></p>
        </footer>
       </div>
		</div>
	</div>
</body>
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<script src="assets/js/custom.js"></script>
<script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/jasny-bootstrap.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>