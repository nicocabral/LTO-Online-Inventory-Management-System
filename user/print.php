<?php include('../includes/header.php');?>
<?php session_start();?>
<body style="background-color: #F3F3F3;">
 
    <div class="hidden-print">
        <div class="row">
            <div class="col-md-3">
       <a data-toggle="tooltip" title="Back" href="notification.php" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>
        	    <span><button onClick="window.print();"><img src="../img/icon/printer.ico" style="width:30px; height:auto;"></button></span>
    	    </div>
        </div>
  </div>  <div class="container-fluid">
	<div class="row">
        <div class="print-wrapper">
            <center><p>
                Republic of the Philippines<br>
                Department of Transportation and Communications<br>
                <strong>LAND TRANSPORTATION OFFICE</strong><br>
                Regional Office No. 8<br>
                Tacloban City
            </p></center>
            <hr>
            <h2 style="text-align:center; font-weight:bold;"> Requisition and Issue Slip</h2>  
            <br>
    		<div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="info">
                            <th  style="text-align:center;">No.</th>
                            <th style="text-align:center; width:auto;">Stock No.</th>
                            <th style="text-align:center; width:auto;">Item name.</th>
                            <th style="text-align:center; width:auto;">Description</th>
                            <th style="text-align:center; width:auto;">Quantity</th>
                            <th style="text-align:center; width:auto;">Request by</th>
                            <th style="width:auto; text-align:center;">Division Office</th>
                            <th style="text-align:center; width:auto;">Approved by</th>
                            <th style="text-align:center; width:auto;">Date Requested</th>
                            <th style="text-align:center; width:auto;">Date Claim</th>
                            <th style="text-align:center; width:auto;">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        include('../includes/dbconn.php');
                        $search =mysql_real_escape_string( @$_POST['search']);
                        $btn_all =mysql_real_escape_string( @$_POST['btn-all']);
                        $range = mysql_real_escape_string (@$_POST['range']);
                        $from =mysql_real_escape_string( @$_POST['from']);
                        $to = mysql_real_escape_string(@$_POST['to']);
						$name=$_SESSION['name'];

                        $result = mysql_query("SELECT * FROM tbl_requestitem where status='approved'") or die(mysql_error());
                        $ctr = 1;
                       if(@mysql_num_rows($result)>0){
                            while($row = mysql_fetch_array($result)){
                    ?>
                            <tr>
                                <td style="text-align:center; width:auto;"><?php echo $ctr;?></td>
                                <td style="text-align:center; width:auto;"><?php echo $row['itemno'];?></td>
                                <td style="text-align:center; width:auto;"><?php echo $row['itemname'];?></td>
                                <td style="text-align:center; width:auto;"><?php echo $row['description'];?></td>
                                <td style="text-align:center; width:auto;"><?php echo $row['qty'];?> </td>
                               
                                <td style="text-align:center; width:auto;"><?php echo $row['requestby'];?></td>
                                <td style="text-align:center; width:auto;"><?php echo $row['division_office'];?></td>
                                <td style="text-align:center; width:auto;"><?php echo $row['approved_by'];?></td>
                                <td style="text-align:center; width:auto;"><?php echo $row['date_request'];?></td>
                                <td style="text-align:center; width:auto;"><?php echo $row['date_claim'];?></td>
                                <td style="text-align:center; width:auto;"><?php echo $row['status'];?></td>
                               
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
            }

        });
    }).change();
    });
  </script>