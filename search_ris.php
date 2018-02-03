<?php include('includes/header.php');?>
<?php session_start();?>
<body style="background-color: #F3F3F3;">
&nbsp;
  <div class="container-fluid">
    <div class="hidden-print">
        <div class="row">
            <div class="col-md-3">
        	    <span><a class="btn btn-danger" data-toggle="tooltip" title="Back" href="ris.php" data-placement="bottom"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back</a></span>
        	<button onClick="window.print();" data-toggle="tooltip" title="Print?" data-placement="right"><img src="img/icon/printer.ico" width="35px;"></button>
    	    </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select style="width:100%;" id="option" class="form-control">
                        <option>---Search Option to print---</option>
                        <option value="all">Search All</option>
                        <option value="single">Single Search</option>
                        <option value="range">Search by Date Range</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">

                <!-- single search and all search -->
                <form  method="POST">
                     <div id="single" class="form-group input-group">
                        <input type="text" name="search" class="form-control" placeholder="Enter name of employee to be search.">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <div id="btn-all" class="form-group input-group">
                        <input type="hidden" name="btn-all" value="completed" class="form-control">
                        <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-search"></i> Seach All</button>
                    </div>
                 </form>
                 <!-- end -->

                 <!-- search by date range -->
                 <form action="search_ris.php" method="POST">
                    <div id="range" class="form-group input-group">
                        <div class="col-md-6"><input type="date" name="from" class="form-control"></div>
                        <div class="col-md-6"><input type="date" name="to" class="form-control"></div>
                        <span class="input-group-btn">
                            <button class="btn btn-success" name="range" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                 </form>
                 <!-- end -->
            </div>
        </div>
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
            <h2 style="text-align:center; font-weight:bold;"> Requisition and Issue Slip</h2>  
            <br>
    		<div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="info">
                            <th  style="text-align:center;">No.</th>
                            <th style="text-align:center; width:auto;">Item No.</th>
                            <th style="text-align:center; width:auto;">Item Name</th>
                            <th style="text-align:center; width:auto;">Description</th>
                            <th style="text-align:center; width:auto;">Requested Qty</th>
                            <th style="text-align:center; width:auto;">Date Requested</th>
                            <th style="width:auto; text-align:center;">Requested by</th>
                            <th style="text-align:center; width:auto;">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        include('includes/dbconn.php');
                        $search = @$_POST['search'];
                        $btn_all = @$_POST['btn-all'];
                        $from = @$_POST['from'];
                        $to = @$_POST['to'];

                        $result = mysql_query("SELECT * FROM tbl_requestitem WHERE status = 'completed'") or die(mysql_error());
                        if($search){
                            $result = mysql_query("SELECT * FROM tbl_requestitem WHERE status = 'completed' AND  requestby LIKE '$search'") or die(mysql_error());
                        }else if($btn_all){
                            $result = mysql_query("SELECT * FROM tbl_requestitem WHERE status = '$btn_all'") or die(mysql_error());
                        }else if(isset($from) && isset($to)){
                            $result = mysql_query("SELECT * FROM tbl_requestitem WHERE date_request BETWEEN '$from' AND '$to'") or die(mysql_error());
                        }

                        $ctr = 1;
                        if(@mysql_num_rows($result)>0){
                            while($row = mysql_fetch_array($result)){
                        ?>
                            <tr>
                                <td align="center"><?php echo $ctr;?></td>
                                <td align="center"><?php echo $row['itemno'];?></td>
                                <td align="center"><?php echo $row['itemname'];?></td>
                                <td align="center"><?php echo $row['description'];?></td>
                                <td align="center"><?php echo $row['qty'];?> pc/s</td>
                                <td align="center"><?php echo $row['date_request'];?></td>
                                <td align="center"><?php echo $row['requestby'];?></td>
                                <td align="center"><?php echo $row['status'];?></td>
                            </tr>

                            <?php $ctr++; ?>
                            <?php } ?>
                        <?php }else{ 
                           echo '<span style="color:red;"><strong><em>No record/s found.</strong></em></span>'; 
                        } ?>
                        </tbody>
                    </table>
                    <div class="pull-right">Number of Record/s: <span style="font-size:13px;" class="label label-default"><strong><?php echo $ctr-1;?></strong></span></div>
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