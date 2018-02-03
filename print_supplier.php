<?php include('includes/header.php');?>
<?php session_start();?>
<body style="background-color: #F3F3F3;">
&nbsp;
  <div class="container-fluid">
    <div class="hidden-print">
	    <span><a class="btn btn-danger" data-toggle="tooltip" title="Back" href="supplier.php" data-placement="bottom"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</a></span>
	     <span><button onClick="window.print();" data-toggle="tooltip" title="Print Supplier?" data-placement="right"><img src="img/icon/printer.ico" style="width:30px; height:auto;"></button></span>
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
			<h2 style="text-align:center; font-weight:bold;">Supplier Records</h2>			
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="success">
                                <th style="text-align:center; width:20px;">No.</th>
                               	<th style="text-align:center; width:100px;">Supplier No.</th>
                                <th style="text-align:center; width:200px;">Supplier Name</th>
                                <th style="text-align:center; width:400px; text-align:center;">Address</th>
                                <th style="text-align:center; width:100px;">Contact</th>
                                <th style="text-align:center; width:100px;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
		                    include('includes/dbconn.php');
		                    $result = mysql_query("SELECT * FROM tbl_supplier") or die(mysql_error());
                            $ctr = 1;
		                    while($row = mysql_fetch_array($result)){
		                ?>
                            <tr>
                                <td style="text-align:center; font-weight:bold;"><?php echo $ctr;?></td>
                                <td style="text-align:center;"><?php echo $row['suppno'];?></td>
                                <td align="center"><?php echo $row['suppname'];?></td>
                                <td align="center"><?php echo $row['address'];?></td>
                                <td style="text-align:center;"><?php echo $row['contact'];?></td>
                                <td style="text-align:center;"><?php echo $row['status'];?></td>
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