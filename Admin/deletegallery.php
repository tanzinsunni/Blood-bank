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
	$s="delete from gallary where pic_id='"  . $_POST["s2"] ."'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record delete');</script>";
}

?>
       <form method="post" enctype="multipart/form-data">
<table border="0" align="center" width="400" height="300px" class="shaddoww">
<tr><td colspan="2" align="center" class="toptd">Delete Camp Gallery </td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td class="lefttd">Select Camp </td><td><select name="s1" required><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from camp";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["s1"])
		{
			echo "<option value=$data[0] selected>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		
		
		
	}
	mysqli_close($cn);

?>


</select>

<input type="submit" value="Show" name="show"  formnovalidate="formnovalidate" />

</td></tr>
<tr><td class="lefttd">Pic Title </td><td><select name="s2" required><option value="">Select</option>
<?php
if(isset($_POST["show"]))
{
$cn=makeconnection();
$s="select * from gallary where camp_id='" . $_POST["s1"] ."'";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		
			echo "<option value=$data[1]>$data[2]</option>";
		
		
		
		
	}
	mysqli_close($cn);
}
?>



</select>

<tr><td>&nbsp;</td><td><input type="submit" value="DELETE" name="sbmt"></td></tr>
</table>
</form>
       </div>



   </div>
    </center>
 
<?php include('bottom.php'); ?>
   
</body>
</html>