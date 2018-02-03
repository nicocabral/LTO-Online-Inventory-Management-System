<?php include('includes/header.php');?>
<?php session_start();?>
<body style="background-color: #F3F3F3;">
<br><p></p>

  <div class="container-fluid">
    <div class="hidden-print">
	    <span><a class="btn btn-danger" data-toggle="tooltip" title="Back" href="stockcard.php"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</a></span>
	    <span><button onClick="window.print();" data-toggle="tooltip" title="Print" class="btn btn-default"><span class="glyphicon glyphicon-print"></span></button></span>
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
			<h2 style="text-align:center; font-weight:bold;">Item Records</h2>			
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="success">
                                <th style="text-align:center; width:20px;">No.</th>
                               	<th style="text-align:center; width:auto;">Stock No.</th>
                                <th style="text-align:center; width:auto;">Quantity.</th>
                                <th style="text-align:center; width:auto;">Unit of Measure</th>
                                <th style="text-align:center; width:auto;">Item Name</th>
                                <th style="width:auto; text-align:center;">Description</th>
                                <th style="text-align:center; width:auto;">Unit per-piece</th>
                                <th style="text-align:center; width:auto;">Total per-pice</th>
                                <th style="text-align:center; width:auto; ">Supplier</th>
                                <th style="width:auto; text-align:center;">Remaining Balance</th>
                                <th style="width:auto; text-align:center;">Arrival Date</th>
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
                                <td style="text-align:center; font-weight:bold;"><?php echo $ctr;?></td>
                                <td align="center"><?php echo $row['stock_no'];?></td>
                                <td align="center"><?php echo $row['qty'];?></td>
                                <td align="center"><?php echo $row['unit'];?></td>
                                <td align="center"><?php echo $row['itemname'];?></td>
                                <td align="center"><?php echo $row['description'];?></td>
                                <td align="center"><?php echo $row['unit_cost'];?></td>
                                <td align="center"><?php echo $row['total_cost'];?></td>
                                <td align="center"><?php echo $row['supplier'];?></td>
                                <td style="text-align:center;"><?php echo $row['remaining_supply'];?></td>
                                <td align="center"><?php echo $row['arrival_date'];?></td>
                            </tr>
                            <?php $ctr++; ?>
						<?php } ?>
                        </tbody>
                    </table>
                     <span>Printed by:<br><br> <strong><?php echo $_SESSION['name'] ;?></strong><br/><em><?php echo $_SESSION['position'];?></em></span>
                </div>
            </div>
		</div>
	</div>
    <div class="container-fluid">
        <footer>
        <hr>
            <p style="font-size:12px; text-align:right";> Copyright &copy; <em>Land Transportation Office - Inventory System</em> <?php echo date('Y');?></p>
        </footer>
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