<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Blood bank Management System</title>

        <link href="css/custom.css" rel="stylesheet" type="text/css" />

		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

		


</head>

<body>
	<?php include 'admin/function.php'; ?>
	 <div class="h_bg">
		<div class="wrap">
			<div class="header">
					<div class="logo">
						<a href="index.php"><img src="Images/logo1.PNG" alt=""></a>
					</div>
			</div>
		</div>
	</div>
<div class="nav_bg">
		<div class="wrap">
			<?php require('header.php');?>
		</div>
		<div class="registration_main">
			<form method="post" enctype="multipart/form-data">
					<table cellpadding="0" cellspacing="0" class="registration_table" >

						<tr><td colspan="2"  align="center"><img src="Images/donor.png" width="300px" height="80px"  /></td></tr>
					   
					<tr><td colspan="2">&nbsp;</td></tr>
					   
									<tr><td  class="registration_img" ><img src="Images/sidebanner.jpg" width="170px" class="shaddoww"/>&nbsp; </td>
										<td class="registratin_content">
										<table cellpadding="0" cellspacing="0" style="width:100%; height:400px;">

											<tr>
												<td >Donor Name:</td><td><input type="text" name="t1" required="required" pattern="[a-zA-Z _]{4,15}" title="please enter only character  between 4 to 15 for donor name" /></td>
											</tr>

											<tr>
												<td >Gender</td><td><input name="r1" type="radio" value="male" checked="checked">Male<input name="r1" type="radio" value="female" >Female</td>
											</tr>

											<tr>
												<td >Age</td><td><input type="number" name="t2" required="required" pattern="[0-9]{2,2}" title="please enter only  numbers between 2 to 2 for age" /></td>
											</tr>
											<tr>
												<td >Mobile No</td><td><input type="text" pattern="[0-9]{10,12}" name="t3" required="required"  title="please enter only numbers between 10 to 11 for mobile no." /></td>
											</tr>
											<tr><td > Blood Group </td><td><select name="t4" required><option value="">Select</option>
									<?php
										$cn=makeconnection();
										$s="select * from bloodgroup";
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
											mysqli_close($cn);

									?>



									</select></td></tr>
									<tr>
										<td >E-Mail</td><td><input type="email" name="t5" required="required" /></td>
									</tr>

									<tr>
										<td >Password</td><td><input type="password" name="t6" required="required" pattern="[a-zA-Z0-9]{8,100}" title="please enter only character or numbers between 8 to 10 for password" /></td>
									</tr>
									<tr>
										<td >Confirm Password</td><td><input type="password" name="t7" required="required" pattern="[a-zA-Z0-9 ]{8,100}" title="please enter only character or numbers between 8 to 10 for password" /></td>
									</tr>

									<tr>
										<td >Upload Pic</td><td><input type="file" name="t8" /></td>
									</tr>
									<tr>
										<td>&nbsp;</td><td><input type="submit" value="submit" name="sbmt" class="registration_button"></td>
									</tr>
									</table>
									</td>
					         </tr>
					</table>
		</form>
	</div>
          
        <div class="clear">
		</div>
	<div class="ftr-bg">
			<div class="wrap">
			 <?php include 'inc/footer.php';?>
			</div>
	</div>


		<?php
		if(isset($_POST["sbmt"])) 
		{
		$target_dir = "doner_pic/";
		$target_file = $target_dir . basename($_FILES["t8"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image

			$check = getimagesize($_FILES["t8"]["tmp_name"]);
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
				if(move_uploaded_file($_FILES["t8"]["tmp_name"], $target_file)){
				$cn=makeconnection();
					$s="insert into donarregistration(name,gender,age,mobile,b_id,email,pwd,pic) values('" . $_POST["t1"] ."','" . $_POST["r1"] . "','" . $_POST["t2"] . "','" . $_POST["t3"] . "','" . $_POST["t4"] . "','" . $_POST["t5"] . "','" . $_POST["t6"] .  "','" . basename($_FILES["t8"]["name"])  ."')";
					
					//$s="INSERT INTO donarregistration(name,gender,age,mobile,b_id,email,pswd,pic) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])"
			mysqli_query($cn,$s);
			mysqli_close($cn);
			if($s>0)
			{
			echo "<script>alert('Record Save');</script>";
			}
			else
			{echo "<script>alert('Record  save');</script>";
			}
				} else{
					echo "sorry there was an error uploading your file.";
				}	
			
			}
		}
		?> 
		



</body>

<script type="text/javascript">

 


</script>
</html>