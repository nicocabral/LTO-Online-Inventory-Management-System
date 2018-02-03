                    <hr>
                    <footer>
                        <p style="font-size:12px; text-align:right";> Copyright &copy; <em>Land Transportation Office - Inventory System</em> <?php echo date('Y');?></p>
                    </footer>
                </div>
                <!-- /.container-fluid -->
            </div>
             <!-- /. PAGE INNER  -->
        </div>
     <!-- /. PAGE WRAPPER  -->
    </div>
 <!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/jasny-bootstrap.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>


<script>
    <!---------------------------------------------------------------------------------------->
    
    $(function () {
         $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script>
    var now = Date(<?php echo time() * 1000 ?>);
    function startInterval(){  
        setInterval('updateTime();', 1000);  
    }
    startInterval();//start it right away
    function updateTime(){
        var nowMS = now.getTime();
        nowMS += 1000;
        now.setTime(nowMS);
        var clock = document.getElementById('mydate');
        if(clock){
            clock.innerHTML = now.toTimeString();//adjust to suit
        }
    } 
 </script>

<script type="text/javascript">
	$("#formLogin").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'login_process.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#logMsg").empty();
	     $("#logMsg").html(data);
	    //alert(returndata);
	  }
	  });
	  return false;
	});
	<?php /*?>$("#frmRequest").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'request_process.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#logMsg").empty();
	     $("#logMsg").html(data);
	    //alert(returndata);
	  }
	  });
	  return false;
	});
	<?php */?>
</script>

<script type="text/javascript">
	$(".myDiv").mouseleave(function(){
	  $(this).fadeOut(350);
	});

	$("#user").keypress(function(){
	  $("#logMsg").empty();
	  $("#logMsg").removeClass();
	});
</script>
<script type="text/javascript">
	$("#frmRequest").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'request_process.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#logMsg").empty();
	     $("#logMsg").html(data);
	    //alert(returndata);
	  }
	  });
	  return false;
	});
</script>