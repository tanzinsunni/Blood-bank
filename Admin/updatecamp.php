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

       <form method="post" enctype="multipart/form-data">
<table border="0" align="center" width="400" height="500px" class="shaddoww">
<tr><td colspan="2" align="center" class="toptd">Update Camp </td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td class="lefttd">Select camp </td><td><select name="s3" required><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from camp";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["s3"])
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
<?php
if(isset($_POST["show"]))
{
$cn=makeconnection();
$s="select * from camp where camp_id='" .$_POST["s3"] ."'";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	$data=mysqli_fetch_array($result);
	$camp_id=$data[0];
	$camp_title=$data[1];
	$organized_by=$data[2];
	/*$state=$data[3];*/
	$city=$data[3];
	$pic=$data[4];
	$detail=$data[5];
		
		
	mysqli_close($cn);
}
?>
</td></tr>
<tr><td class="lefttd">Camp Title</td><td><input type="text" name="t3" value="<?php if(isset($_POST["show"])){echo $camp_title;} ?>"/ required="required"  title="please enter only character or numbers between 5 to 40 for camp title"></td></tr>
<tr><td class="lefttd">Organized By</td><td><input type="text" name="t2" value="<?php if(isset($_POST["show"])){echo $organized_by;} ?>" required="required"  title="please enter only character or numbers between 5 to 45 for organizer name"/></td></tr>
<!--<tr><td class="lefttd">State </td><td><select name="s1" required><option value="">Select</option>

<?php
/*$cn=makeconnection();
$s="select * from state";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $state==$data[0])
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

</td></tr>-->
<tr><td class="lefttd">City </td><td><select name="s2" required><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from city";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"]))
		{
			if($city==$data[0])
			echo "<option value=$data[0] selected='selected' >$data[1]</option>";
			else
						echo "<option value=$data[0]  >$data[1]</option>";
		}
		else
		{
			
			echo "<option value=$data[0]>$data[1]</option>";
		}
		
		
		
	}
	mysqli_close($cn);

?>



</select>
</td></tr>
<tr><td class="lefttd">Old Pic</td><td><img src="pic/<?php echo @$pic; ?>" width="150px" height="100px"/>
<input type="hidden" name="h1" value="<?php if(isset($_POST["show"])){echo $pic;} ?>" />
</td></tr>
<tr><td class="lefttd">Uplode Pic</td><td><input type="file" name="t1" ></td></tr>
<tr><td class="lefttd">Detail</td><td><textarea name="t4" /><?php if(isset($_POST["show"])){echo $detail;} ?></textarea></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" value="UPDATE" name="sbmt"></td></tr>
</table>
</form>
       </div>



   </div>
    </center>
    
    <?php
if(isset($_POST["sbmt"])) 
{
	$imagename=$_POST["h1"];
if(file_exists($_FILES['t1']['tmp_name']) || is_uploaded_file($_FILES['t1']['tmp_name'])) 
 	{
$target_dir = "pic/";
$target_file = $target_dir . basename($_FILES["t1"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["t1"]["tmp_name"]);
    if($check !== false) {
      //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
//aloow certain file formats
	if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
		echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["t1"]["tmp_name"], $target_file)){
$imagename=basename($_FILES["t1"]["name"]);
		} else{
			echo "sorry there was an error uploading your file.";
		}	
	
	}
	}
	
		$cn=makeconnection();
		
		
		if (empty($_FILES['t1']['name'])) {
   $s="UPDATE camp SET camp_title='" . $_POST["t3"] . "',organised_by='" .$_POST["t2"] . "'/*,state='" .$_POST["s1"] ."',city='" .$_POST["s2"] ."',pic='" . $_POST["h1"] . "',detail='" . $_POST["t4"] ."' WHERE camp_id='".$_POST["s3"] ."'";
}
else
{
		$s="UPDATE camp SET camp_title='" . $_POST["t3"] . "',organised_by='" .$_POST["t2"] . "',city='" .$_POST["s2"] ."',pic='" .basename($_FILES["t1"]["name"]). "',detail='" . $_POST["t4"] ."' WHERE camp_id='".$_POST["s3"] ."'";
}
//$s="update camp set camp_title='" . $_POST["t3"] . "',organized_by='" .$_POST["t2"] . "',state='" .$_POST["s1"] ."',city='" .$_POST["s2"] ."',pic='" .$imagename. "',detail='" . $_POST["t4"] ."' where camp_id='" . $_POST["s3"] ."'";
	$i=mysqli_query($cn,$s);
	mysqli_close($cn);
	
	echo "<script>alert('Record update');</script>";
	
}
?> 
<?php include('bottom.php'); ?>
   
</body>
</html>