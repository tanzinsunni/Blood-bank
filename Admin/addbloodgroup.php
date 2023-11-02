<?php if(!isset($_SESSION)) {session_start();}  ?>

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
       <div style="width:200px; float:left;">
			<?php include('left.php'); ?>
       </div>
       <div style="width:800px;float:left">
        <br /><br />

		<?php include('function.php'); ?>
			<?php
				if(isset($_POST["sbmt"]))
				{
					$cn=makeconnection();
					$s="insert into bloodgroup(bg_name) values('" . $_POST["t1"] . "')";
					mysqli_query($cn,$s);
					mysqli_close($cn);
					echo "<script>alert('Record Save');</script>";
				}

			?>

			<form method="post">
				<table border="0" align="center" width="400" height="300px" class="shaddoww">
				<tr><td colspan="2" align="center" class="toptd">Add Blood Group</td></tr>
				<tr><td colspan="2">&nbsp;</td></tr>
				<tr><td class="lefttd">Blood Group Name</td><td><input type="text" name="t1" required="required"/></td></tr>

				<tr><td>&nbsp;</td><td><input type="submit" value="SAVE" name="sbmt"></td></tr>
				</table>
			</form>
       </div>

   </div>
   </center>
   <?php include('bottom.php'); ?>
   
</body>
</html>