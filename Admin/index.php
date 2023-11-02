<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php include 'inc/header.php'?>


<body>
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:adminlogin.php");
}
?>
<?php include('topbar.php'); ?>
    <center>
   <div style="width:1000px; height:700px; box-shadow:-10px 10px 5px #CCC">
   
       <div style="width:200px; float:left;text-align:center;">
         <?php include('left.php'); ?>
       </div>
	   
	   <div style="width:800px;float:left;">
				 <div style="height:400px; width:400px; margin:auto; margin-top:50px; margin-bottom:50px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
					<img src="images/admin.png" height="400px"/>
					
						
						
				</div>
	  </div>

   </div>
    </center>
<?php include('bottom.php'); ?>
   
</body>
</html>