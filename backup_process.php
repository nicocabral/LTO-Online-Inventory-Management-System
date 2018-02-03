 <?php 
        
        $hostname = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname   = "lto";
        /****************/

        if(isset($_POST['backup'])){
          
           $command = exec('C:\wamp\bin\mysql\mysql5.6.12\bin\mysqldump --user='.$username.' --password='.$password.' --host='.$hostname.' '.$dbname.' > C:\wamp\www\OnlineInventory_Copy\backup\lto_'.date('Y-m-d-H-i-s').'.sql');
           if(isset($command)){
                echo '<script>
                        $("#logMsg").empty();
                        $("#logMsg").removeClass();
                        $("#logMsg").addClass("alert alert-success");
                        $("#logMsg").html("<center>Backup Successfully Completed. Please check your Backup folder.</center>");
                    </script>';
                exit();

           }else{
                echo '<script>
                        $("#logMsg").empty();
                        $("#logMsg").removeClass();
                        $("#logMsg").addClass("alert alert-danger");
                        $("#logMsg").html("<center>Error has found!</center>");
                    </script>';
                exit();
           }
        }

?>