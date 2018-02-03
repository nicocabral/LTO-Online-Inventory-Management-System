<?php 
	include('includes/dbconn.php');
	$id = $_POST['id'];
	$heading = $_POST['heading'];
	$desc = $_POST['desc'];

	$result = mysql_query("UPDATE tbl_about SET heading = '$heading', description='$desc' WHERE id='$id'");
	if($result){
		echo '<script>
				window.alert("Updated.")
				window.location="about_settings.php";
			</script>';
	}else{

		die(mysql_error());
	}
?>