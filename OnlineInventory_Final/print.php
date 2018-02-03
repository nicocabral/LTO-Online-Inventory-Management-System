<?php include('includes/header.php');?>
<body style="background-color: #F3F3F3;">
<br><p></p>

  <div class="container-fluid">
	    <span data-toggle="tooltip" title="Back"><a class="btn btn-danger" href="supplier/index.php"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</a></span>
	    <span data-toggle="tooltip" title="Print"><button onClick="window.print();return false" type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"></span></button></span>
	
	<div class="row">
		<div id="print-wrapper">
			<h2 style="text-align:center;">Items Records</h2>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="success">
                               	<th align="center">Item No.</th>
                                <th align="center">Unit</th>
                                <th align="center">Item Name</th>
                                <th align="center">Description</th>
                                <th align="center">Unit Cost</th>
                                <th align="center">Total Cost</th>
                                <th align="center">Supplier</th>
                                <th align="center">Remaining Supply</th>
                                <th align="center">Arrival Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
		                    include('includes/dbconn.php');
		                    $result = mysql_query("SELECT * FROM tbl_supplies") or die(mysql_error());
		                    while($row = mysql_fetch_array($result)){
		                ?>
                            <tr>
                                <td align="center"><?php echo $row['itemno'];?></td>
                                <td align="center"><?php echo $row['unit'];?></td>
                                <td align="center"><?php echo $row['itemname'];?></td>
                                <td align="center"><?php echo $row['description'];?></td>
                                <td align="center"><?php echo $row['unit_cost'];?></td>
                                <td align="center"><?php echo $row['total_cost'];?></td>
                                <td align="center"><?php echo $row['supplier'];?></td>
                                <td align="center"><?php echo $row['remaining_supply'];?></td>
                                <td align="center"><?php echo $row['arrival_date'];?></td>
                            </tr>
						<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</div>
   

<div class="container-fluid">
      
      
        <footer>
                        <p style="font-size:12px; text-align:right";> Copyright &copy; <em>Land Transportation Office - Inventory System</em> <?php echo date('Y');?></p>
                    </footer>
        

    </div>
    </div></body>
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<script src="assets/js/custom.js"></script>
<script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/jasny-bootstrap.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>