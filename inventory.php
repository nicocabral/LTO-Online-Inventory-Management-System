<?php include('includes/header.php');?>
<?php session_start();?>
<body style="background-color: #F3F3F3;" class="col-lg-12">
&emsp;
  <div class="container-fluid">
    <div class="hidden-print">
        <div class="row">
            <div class="col-md-3">
        	    <span><a class="btn btn-danger" data-toggle="tooltip" title="Back" href="view_inventory.php" data-placement="bottom"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</a></span>
        	  <button onClick="window.print();" data-toggle="tooltip" title="Print?" data-placement="right"><img src="img/icon/printer.ico" width="35px;"></button>
    	    </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select style="width:100%;" id="option" class="form-control">
                        <option>------------ Search by ------------</option>
                        <option value="all">Search All</option>
                        <option value="single">Single Search</option>
                        <option value="range">Date Range</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">

                <!-- single search and all search -->
                <form action="inventory.php" method="POST">
                     <div id="single" class="form-group input-group">
                        <input type="text" name="search" class="form-control" placeholder="Enter item name to be search.">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <div id="btn-all" class="form-group input-group">
                        <input type="hidden" name="btn-all" value="completed" class="form-control">
                        <button type="submit" data-toggle="tooltip" title="Search all" data-placement="bottom" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>&emsp;Search all</button>
                    </div>
                 </form>
                 <!-- end -->

                 <!-- search by date range -->
                 <form action="inventory.php" method="POST">
                    <div id="range" class="form-group input-group">
                 
                        <div class="col-md-6">   From
                      <input type="date" name="from" class="form-control"></div>
                     
                        <div class="col-md-6">To
                     <input type="date" name="to" class="form-control"></div>
                        <span class="col-md-6">
                            <button  name="range" type="submit" data-toggle="tooltip" title="Search"><img src="img/icons/search.ico" width="30px;"></button>
                        </span>
                    </div>
                 </form>
                 <!-- end -->
            </div>
        </div>
    </div>
	<div class="row">
        <div class="print-wrapper2">
            <p>
                Republic of the Philippines<br>
                Department of Transportation and Communications<br>
                <strong>LAND TRANSPORTATION OFFICE</strong><br>
                Regional Office No. 8<br>
                Tacloban City
            </p>
            <hr>
            <div style="text-align:center;">
                <h3 style="color:#000080; font-size:26px;"><strong>Report on Physical Count of Inventories</strong></h3>
                <span style="font-size:18px; font-weight:bold;"><u>Accountable Form</u></span><br /><br /> 
            <?php 
                $from = @$_POST['from'];
                $to = @$_POST['to'];
            ?>
                <span>As of <strong><?php echo $from.' -to- '.$to; ?></strong></span><br /><br />
            </div>      
            <div class="row">
                <div class="col-md-12">
                   <h5> <strong>For which:</strong></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-3">
                        <span><i>Accountable Officer:</i> <strong> <?php echo $_SESSION['name'];?></strong></span>
                    </div>
                    <div class="col-sm-3">
                        <span><i>Designation:</i> <strong> <?php echo $_SESSION['position'];?></strong></span>
                    </div>
                    <div class="col-sm-2">
                        <span><i>Bureau or Office:</i> <strong> <?php echo $_SESSION['office'];?></strong></span>
                    </div>
                    <div class="col-sm-4">
                        <span><strong>is accountable having assumed such accountability on <u><?php echo date('M, d, Y');?></u></strong></span>
                    </div>
                </div>
            </div>
            <br> 
    		<div class="table-responsive table-hover">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr style="background-color:#000080; color:#fff;">
                            <th style="text-align:center; width:auto;">Item No.</th>
                            <th style="text-align:center; width:auto;">Item Name</th>
                            <th style="text-align:center; width:auto;">Description</th>
                            <th style="text-align:center; width:auto;">Stock Number</th>
                            <th style="text-align:center; width:auto;">Unit of Measure</th>
                            <th style="text-align:center; width:auto;">Unit of Value</th>
                            <th style="width:auto; text-align:center;">Balance Per Card</th>
                            <th style="text-align:center; width:auto;">OHPC Quantity</th>
                            <th style="text-align:center; width:auto;">Serial No.</th>
                            <th style="text-align:center; width:auto;">SO Qty</th>
                            <th style="text-align:center; width:auto;">SO Value</th>
                            <th style="text-align:center; width:auto;">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        include('includes/dbconn.php');
                        $search = @$_POST['search'];
                        $btn_all = @$_POST['btn-all'];
                        $status = 'completed';

                        $result = mysql_query("SELECT tbl_requestitem.itemno, tbl_requestitem.itemname,
                        tbl_requestitem.description, tbl_requestitem.remaining_qty, tbl_requestitem.qty,
                        tbl_requestitem.requestby, tbl_requestitem.date_claim, tbl_requestitem.status, 
                        tbl_supplies.stock_no, tbl_supplies.unit, tbl_supplies.unit_cost, tbl_supplies.serial_no
                        FROM tbl_requestitem LEFT JOIN tbl_supplies ON tbl_requestitem.itemno=tbl_supplies.itemno WHERE tbl_requestitem.status='$status'") or die(mysql_error());

                        if($search){
                            $result = mysql_query("SELECT tbl_requestitem.itemno, tbl_requestitem.itemname,
                            tbl_requestitem.description, tbl_requestitem.remaining_qty, tbl_requestitem.qty,
                            tbl_requestitem.requestby, tbl_requestitem.date_claim, tbl_requestitem.status, 
                            tbl_supplies.stock_no, tbl_supplies.unit, tbl_supplies.unit_cost, tbl_supplies.serial_no
                            FROM tbl_requestitem LEFT JOIN tbl_supplies ON tbl_requestitem.itemno=tbl_supplies.itemno WHERE tbl_requestitem.status='$status' AND tbl_requestitem.itemname LIKE '$search'") or die(mysql_error());
                        }else if($btn_all){
                            $result = mysql_query("SELECT tbl_requestitem.itemno, tbl_requestitem.itemname,
                            tbl_requestitem.description, tbl_requestitem.remaining_qty, tbl_requestitem.qty,
                            tbl_requestitem.requestby, tbl_requestitem.date_claim, tbl_requestitem.status, 
                            tbl_supplies.stock_no, tbl_supplies.unit, tbl_supplies.unit_cost, tbl_supplies.serial_no
                            FROM tbl_requestitem LEFT JOIN tbl_supplies ON tbl_requestitem.itemno=tbl_supplies.itemno WHERE tbl_requestitem.status='$btn_all'") or die(mysql_error());
                        }else if(isset($from) && isset($to)){
                             $result = mysql_query("SELECT tbl_requestitem.itemno, tbl_requestitem.itemname,
                            tbl_requestitem.description, tbl_requestitem.remaining_qty, tbl_requestitem.qty,
                            tbl_requestitem.requestby, tbl_requestitem.date_claim, tbl_requestitem.status, 
                            tbl_supplies.stock_no, tbl_supplies.unit, tbl_supplies.unit_cost, tbl_supplies.serial_no
                            FROM tbl_requestitem LEFT JOIN tbl_supplies ON tbl_requestitem.itemno=tbl_supplies.itemno WHERE tbl_requestitem.status='$status' AND tbl_requestitem.date_claim BETWEEN '$from' AND '$to'") or die(mysql_error());
                        }

                        $ctr = 1;
                        $total_value = 0;
                        $total_qty = 0;
                        if(@mysql_num_rows($result)>0){
                            while($row = mysql_fetch_array($result)){
                            $unit_value = $row['unit_cost'];
                            $request_quan = $row['qty'];
                            $onhand_qty = 1;

                            $unit_bal = $unit_value * $request_quan;
                        ?>
                            <tr>
                                <td align="center"><?php echo $row['itemno'];?></td>
                                <td align="center"><?php echo $row['itemname'];?></td>
                                <td align="center"><?php echo $row['description'];?></td>
                                <td align="center"><?php echo $row['stock_no'];?></td>
                                <td align="center"><?php echo $row['unit'];?></td>
                                <td align="center"><?php echo $unit_bal;?></td>
                                <td align="center"><?php echo $row['remaining_qty'];?></td>
                                <td align="center"><?php echo  $onhand_qty;?></td>
                                <td align="center"><?php echo $row['serial_no'];?></td>
                                <td align="center"><?php echo '';?></td>
                                <td align="center"><?php echo '';?></td>
                                <td align="center"><?php echo $row['requestby'];?></td>
                            </tr>

                                <?php 
                                    $total_value = $total_value + $unit_bal;
                                    $total_qty = $total_qty + $onhand_qty;
                                ?>

                            <?php $ctr++; ?>
                            <?php } ?>
                        <?php }else{ 
                           echo '<span style="color:red;"><strong><em>No record/s found.</strong></em></span>'; 
                        } ?>
                            <tr>
                                <td colspan="5" style="background-color:#36648B; color:#fff; text-align:center; font-weight:bold; font-size:18px;">T O T A L</td>
                                <td style="background-color:#FFFF00; text-align:center; font-weight:bold; font-size:16px;"><?php echo $total_value;?></td>
                                <td style="visibility:hidden"></td>
                                <td style="background-color:#FFFF00; text-align:center; font-weight:bold; font-size:16px;"><?php echo $total_qty;?></td>
                                
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3">
                            <center>
                               <div class="col-sm-2">
                                    <span>Inventory conducted by:<br><br><br>  <strong><u>Juan Dela Cruz</u></strong><br/>
                                    <small><em>OIC, Supply and Property Section</em></small></span><br />
                                </div>
                                <div class="col-sm-2">
                                    <span>Certified Correct by:<br><br><br>  <strong><u>Juan Dela Cruz</u></strong><br/>
                                    <small><em>Administrative Officer V</em></small></span><br />
                                </div>
                                <div class="col-sm-2">
                                    <span>NOTED by:<br><br><br>  <strong><u>Juan Dela Cruz</u></strong><br/>
                                    <small><em>Regional Director</em></small></span><br />
                                </div>
                            </center>
                        </div>
                    </div>
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
<script src="assets/js/jquery.js"></script>
   <script type="text/javascript">
    $("#range").hide();
    $("#single").hide();
    $("#btn-all").hide();

   $(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="range"){
                $("#single").hide();
                $("#range").show(200);
                $("#btn-all").hide();
            }
            else if($(this).attr("value")=="single"){
                 $("#single").show(200);
                $("#range").hide();
                $("#btn-all").hide();
            }
            else if($(this).attr("value")=="all"){
                 $("#btn-all").show(200);
                $("#range").hide();
                $("#single").hide();
            }else{
                $("#single").hide();
                $("#range").hide();
                $("#btn-all").hide();
            }

        });
    }).change();
    });
  </script>