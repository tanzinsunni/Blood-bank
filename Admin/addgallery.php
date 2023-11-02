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

				<form method="post" enctype="multipart/form-data">
					<table border="0" align="center" width="400" height="300px" class="shaddoww">
					 <tr><td colspan="2" align="center" class="toptd">Add Camp Gallery </td></tr>
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

					 </td></tr>
					 <tr><td class="lefttd">Pic Title</td><td><input type="text" name="t3" value="<?php if(isset($_POST["show"])){echo $_POST["t3"];} ?>"/ required="required" pattern="[a-zA-Z0-9 ]{5,15}" title="please enter only character or numbers between 5 to 15 for pic title"></td></tr>
					 </td></tr>
					 <tr><td class="lefttd">Uplode Pic</td><td><input type="file" name="t1" required="required"/></td></tr>

					<tr><td>&nbsp;</td><td><input type="submit" value="SAVE" name="sbmt"></td></tr>
					</table>
			    </form>
		   </div>



	   </div>
    </center>
    
    <?php
if(isset($_POST["sbmt"])) 
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
		$cn=makeconnection();
			$s="insert into gallary(camp_id,title,pic) values('" . $_POST["s1"] ."','" . $_POST["t3"] . "','" . basename($_FILES["t1"]["name"]) . "')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Save');</script>";
			
		} else{
			echo "sorry there was an error uploading your file.";
		}	
	
	}
}
?> 
<?php include('bottom.php'); ?>
   
</body>
</html>