<?php include('includes/header.php');?>
<?php session_start();?>
<body style="background-color: #F3F3F3;">
  <div class="container-fluid">
    <div class="hidden-print">
	    <span><a class="btn btn-danger" data-toggle="tooltip" title="Back" href="stockcard_ris.php"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</a></span>
	   <button onClick="window.print();" data-toggle="tooltip" title="Print"><img src="img/icon/printer.ico" width="30px;"></button>
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
                <h2 style="font-weight:bold;"> Stock Card</h2>  
                <span style="font-size:15px; font-weight:bold;"><u>Land Transportation Office - Region VIII</u></span><br />    
                <em>Agency</em><br />
            </div>		
            <div class="panel-body">
                <?php 
                    $stockno = $_GET['stockno'];
                ?>
                <div class="table-responsive">
                    Stock Number: <strong><?php echo $stockno; ?></strong><br/><br/>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="success">
                                <th style="text-align:center; width:20px;">No.</th>
                                <th style="text-align:center; width:auto;">Item Name</th>
                                <th style="text-align:center; width:auto;">Re-order Point</th>
                                <th style="text-align:center; width:auto;">Description</th>
                                <th style="text-align:center; width:auto;">Reference</th>
                                <th style="text-align:center; width:auto;">Receipt No</th>
                                <th style="width:auto; text-align:center;">Issuance Qty</th>
                                <th style="text-align:center; width:auto;">Issuance Office</th>
                                <th style="text-align:center; width:auto;">Balance Qty</th>
                                <th style="text-align:center; width:auto; ">Date Requested</th>
                                <th style="width:auto; text-align:center;">No. of Days to Consume</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
		                    include('includes/dbconn.php');
                            $itemno = $_GET['itemno'];
		                    $result = mysql_query("SELECT * FROM tbl_requestitem WHERE status='completed' AND itemno=$itemno") or die(mysql_error());
                            $ctr = 1;
		                    while($row = mysql_fetch_array($result)){
		                ?>
                            <tr>
                                <td style="text-align:center; font-weight:bold;"><?php echo $ctr;?></td>
                                <td align="center"><strong><?php echo $row['itemname'];?></strong></td>
                                <td align="center"></td>
                                <td align="center"><?php echo $row['description'];?></td>
                                <td align="center"></td>
                                <td align="center"><?php echo 'ORN-' . rand(000,999)?></td>
                                <td align="center"><?php echo $row['qty'];?></td>
                                <td align="center">LTO</td>
                                <td style="text-align:center;"><?php echo $row['remaining_qty'];?></td>
                                <td align="center"><?php echo $row['date_request'];?></td>
                                <td align="center">20 Days</td>
                            </tr>
                            <?php $ctr++; ?>
						<?php } ?>
                        </tbody>
                    </table>
                     <span>Printed by:<br><br> <strong><?php echo $_SESSION['name'] ;?></strong><br/><em><?php echo $_SESSION['position'];?></em></span>
                </div>
      

        <footer>
        <hr>
            <p style="font-size:12px; text-align:right";> Copyright &copy; <em>Land Transportation Office - Inventory System</em> <?php echo date('Y');?></p>
        </footer>
         </div>
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