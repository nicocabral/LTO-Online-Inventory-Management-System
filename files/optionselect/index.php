<?php 
	$cn = mysql_connect('localhost','root','');
	if($cn)
	{
		mysql_select_db('optionselect',$cn);
	}

	if(isset($_POST['pr']))
	{
		$id = $_POST['id'];
		$dis = mysql_query("SELECT * FROM tbdistrick WHERE country_id = '$id'");
		while($r = mysql_fetch_object($dis))
		{
			echo '<option value='.$r->id .'>'.$r->districk .'</option>';
		}
		exit();
	}


	if(isset($_POST['di']))
	{
		$id = $_POST['id'];
		$vl = mysql_query("SELECT * FROM tbvillage WHERE dis_id  = '$id'");
		while($r = mysql_fetch_object($vl))
		{
			echo '<option value='.$r->id .'>'.$r->village_name .'</option>';
		}
		exit();
	}
?>
	
<html>
<head>
	
	<title>Option Select</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>

</head>
<body style="background-color:brown"><br/>
  <div class="container" style="background-color:#eee;">
      <center><h3 style="color:blue">Option Select Province District Village</h3></center>
   		<table class="table">
   				<tr>
   					<td>
   						<label>Province</label>
   						<select id="province" class="form-control">
   						        <option value="">Select Province</option>
   								<?php 
   									$pr = mysql_query("SELECT * FROM tbprovince");
   									while($row = mysql_fetch_object($pr))
   									{
   										?>
   												<option value="<?= $row->id ?>"><?= $row->province_name ?></option>
   										<?php 
   									}
   								?>
   						</select>
   					</td>
   					<td>
   						<label>District</label>
   						<select id="district" class="form-control">   						        
   								
   						</select>
   					</td>
   					<td>
   						<label>Village</label>
   						<select id="village" class="form-control">   						        
   								
   						</select>
   					</td>
   				</tr>

   		</table>
  </div>
</body>
</html>

<script type="text/javascript">
	$(function(){



		$('#province').change(function(){
			var id = $(this).val();
			$.ajax({
		         url  : "<?= $_SERVER['PHP_SELF'] ?>",
				 type : "POST",
				 async: false,
				 data : 
				 {
				 	'pr'   : 1,
				 	'id'   : id
				 },
				 success:function(re)
				 {
				 	$('#district').html(re);
				 }
			  });
		});

       $('#district').change(function(){
			var id = $(this).val();
			$.ajax({
		         url  : "<?= $_SERVER['PHP_SELF'] ?>",
				 type : "POST",
				 async: false,
				 data : 
				 {
				 	'di'   : 1,
				 	'id'   : id
				 },
				 success:function(re)
				 {
				 	$('#village').html(re);
				 }
			  });
		});







    });	
</script>