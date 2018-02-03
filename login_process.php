<?php
	session_start();

    include('includes/dbconn.php');

       	$user =mysql_real_escape_string( $_POST['user']);
		$password =mysql_real_escape_string( $_POST['pass']);
        
			$sql = "SELECT * FROM user WHERE username='$user' AND password='$password'";
		
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result)==0) {
				echo '<script>
						$("#logMsg").empty();
						$("#logMsg").removeClass();
						$("#logMsg").addClass("alert alert-warning");
						$("#logMsg").html("<center>Invalid username and/or password!</center>");
					</script>';
				exit();

			} else {
					while($row=mysql_fetch_array($result))
					{
						$_SESSION['id'] = $row['id'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['password'] = $row['password'];
						$_SESSION['user_type'] = $row['user_type'];
						$_SESSION['position'] =  $row['position'];
						$_SESSION['office'] =	$row['office'];
					}
					if($_SESSION['user_type']=='user'){
						echo'<script>
						window.location.href="user/index.php"</script>';}
						else {
					echo '<script>window.location.href="index.php";</script>';}
			}
		
	mysql_close($con);

?>