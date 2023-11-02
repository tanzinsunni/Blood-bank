<?php if(!isset($_SESSION)) {session_start();}  ?>

<?php include 'inc/header.php'?>
<body>
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:admimlogin.php");
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
	$s="update users set pwd='" .$_POST["t2"] . "',typeofuser='". $_POST["s1"] ."' where username='" . $_POST["s2"] ."'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Update');</script>";
}

?>
       <form method="post">
<table border="0" align="center" width="400" height="300px" class="shaddoww">
<tr><td colspan="2" align="center" class="toptd">Update User</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td class="lefttd">Select User Name</td><td><select name="s2" required><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from users";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["s2"])
		{
			echo "<option value=$data[0] selected>$data[0]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[0]</option>";
		}
		
		
		
	}
	mysqli_close($cn);

?>



</select>
<input type="submit" value="Show" name="show" formnovalidate="formnovalidate" />
<?php
if(isset($_POST["show"]))
{
$cn=makeconnection();
$s="select * from users where username='" .$_POST["s2"] ."'";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	$data=mysqli_fetch_array($result);
	$username=$data[0];
	$pass=$data[1];
	$usertype=$data[2];
		
		
	mysqli_close($cn);
}
?>

</td></tr>
<tr><td class="lefttd">Password</td><td><input type="password"  value= "<?php  if(isset($_POST["show"])){ echo $pass ;}  ?>"  required="required" pattern="[a-zA-Z0-9]{3,10}" title="please enter only character and numbers between 3 to 10 for password" name="t2"  /></td></tr>
<tr><td class="lefttd">Confirm Password</td><td><input type="password"  value= "<?php  if(isset($_POST["show"])){ echo $pass ;}?>" name="t3" required="required" pattern="[a-zA-Z0-9]{3,10}" title="please enter only character and numbers between 3 to 10 for password"/></td></tr>
<tr><td class="lefttd">Type Of User</td><td><select name="s1" required  ><option value="">Select</option>
<option value="Admin" <?php if(isset($_POST["show"])&& $usertype=="Admin"){ echo "selected "; } ?>>Admin</option>
<option value="General" <?php if(isset($_POST["show"])&& $usertype=="General"){ echo "selected "; } ?>>General</option>
</select></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" value="UPDATE" name="sbmt"></td></tr>
</table>
</form>
       </div>

   </div>
    </center>
<?php include('bottom.php'); ?>
   
</body>
</html>