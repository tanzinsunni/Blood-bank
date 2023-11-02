<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood bank Management System</title>
        <link href="css/custom.css" rel="stylesheet" type="text/css" />		
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		

  <style>


  
  </style>

</head>

		<body>
			<?php include('admin/function.php'); ?>

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
		<div class="request_main">
				 <form method="post" enctype="multipart/form-data">
					<table cellpadding="0" cellspacing="0"  class="request_table" >

				   <tr>
					<td colspan="2" align="center"><img src="Images/brequest.png" height="90px" /></td>
				   </tr>

				   <tr>
					<td>&nbsp;</td><td>&nbsp;</td>
				   </tr>   

								   

					<tr>
						<td class="lefttd" align="center"> Name:</td><td><input type="text" name="t1" required="required" pattern="[a-zA-Z _]{5,15}" title="please enter only character  between 5 to 15 for donor name" /></td>
				    </tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td class="lefttd" align="center">Gender:</td><td><input name="r1" type="radio" value="male" checked="checked">Male<input name="r1" type="radio" value="female">Female</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td class="lefttd" align="center">Age:</td><td><input type="number" name="t2" required="required" pattern="[0-9]{2,2}" title="please enter only  numbers between 2 to 2 for age" /></td>
					</tr>
					 <tr>
						<td>&nbsp;</td>
					 </tr>
					<tr>
						<td class="lefttd" align="center">Mobile No:</td><td><input type="text" name="t3"  required="required" pattern="[0-9]{10,12}" title="please enter only numbers between 10 to 12 for mobile no." /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td class="lefttd" align="center">Select Blood Group:</td>
						<td>
						<select name="t4" required><option value="">Select</option>
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



						</select>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td class="lefttd" align="center">E-Mail:</td><td><input type="email" name="t5" required="required" /></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
			
				
					<tr>
						<td class="lefttd" align="center">Till Required Date:</td><td><input type="date" name="t6" style="width:50px"/></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td class="lefttd" align="center">Detail:</td><td><textarea placeholder="what type patient " name="t7"></textarea></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td>&nbsp;</td><td><input type="submit" value="Submit" name="sbmt" class="request_button"></td>
					</tr>
				</table>

			</form>
		</div>
				  
				<div class="clear"></div>
		<div class="ftr-bg">
		<div class="wrap">
		 <?php include 'inc/footer.php';?>
		</div>
		</div>

		<?php
			if(isset($_POST["sbmt"])) 
			{
						
					
				$cn=makeconnection();
					$d=$_POST["year"]."/".$_POST["month"]."/".$_POST["day"];
						$s="insert into requestes(name,gender,age,mobile,bgroup,email,reqdate,detail) values('" . $_POST["t1"] ."','" . $_POST["r1"] . "','" . $_POST["t2"] . "','" . $_POST["t3"] . "','" . $_POST["t4"] . "','" . $_POST["t5"] . "','" . $_POST["t6"] .  "','" .  $_POST["t7"]  ."')";
						
						
				$q=mysqli_query($cn,$s);
				mysqli_close($cn);
				if($q>0)
				{
				echo "<script>alert('Record Save');</script>";
				}
				else
				{echo "<script>alert('Saving Record Failed');</script>";
				}
					
					}	
			

		?> 
		</body>
</html>