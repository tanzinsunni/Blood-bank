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
					$s="insert into city(city_name,pin_code,district) values('" . $_POST["t3"] . "','" .$_POST["t2"] . "','" .$_POST["t1"] . "')";
					mysqli_query($cn,$s);
					mysqli_close($cn);
					echo "<script>alert('Record Save');</script>";
				}

			?>

			<form method="post">
				<table border="0" align="center" width="400" height="300px" class="shaddoww">
				 <tr><td colspan="2" align="center" class="toptd">Add City </td></tr>
				 <tr><td colspan="2">&nbsp;</td></tr>
				 <tr><td class="lefttd">City Name</td><td><input type="text" name="t3" required="required" pattern="[a-zA-Z _]{5,15}" title="please enter only character between 5 to 15 for city name"/></td></tr>
				 <tr><td class="lefttd">Pin Code</td><td><input type="number" name="t2" required="required" pattern="[0-9]{6,10}" title="please enter only numbers between 6 to 10 for pin code"/></td></tr>
				 <tr><td class="lefttd">District</td><td><input type="text" name="t1" required="required" pattern="[a-zA-Z _]{5,15}" title="please enter only character between 5 to 15 for city name"/></td></tr>
				<!--<tr><td class="lefttd">State </td><td><select name="s2" required><option value="">Select</option>-->

				<?php
				/*$cn=makeconnection();
				$s="select * from state";
					$result=mysqli_query($cn,$s);
					$r=mysqli_num_rows($result);
					//echo $r;
					while($data=mysqli_fetch_array($result))
					{
						if(isset($_POST["show"])&& $data[0]==$_POST["s2"])
						{
							echo "<option value=$data[0] selected>$data[1]</option>";
						}
						else
						{
							echo "<option value=$data[0]>$data[1]</option>";
						}
						
						
						
					}
					mysqli_close($cn);*/

				?>



				 </select>
				 <tr><td>&nbsp;</td><td><input type="submit" value="SAVE" name="sbmt"></td></tr>
				</table>
			</form>
		   </div>

	   </div>
    </center>
<?php include('bottom.php'); ?>
   
</body>
</html>