<?php
	session_start();

    include('includes/dbconn.php');

       	$user = $_POST['user'];
		$password = $_POST['pass'];
        
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
						$_SESSION['position'] = $row['position'];
						$_SESSION['office'] = $row['office'];
					}
					
					echo '<script>window.location.href="index.php";</script>';
			}
		
	mysql_close($con);

?>