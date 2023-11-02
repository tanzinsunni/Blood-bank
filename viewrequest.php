<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood bank Management System</title>
<link href="css/lightbox.css" rel="stylesheet" />
 <link href="css/custom.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

 
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
						 <table cellpadding="20" cellspacing="20" width="1000px" height="200px"  style="margin:auto" >

									<tr><td colspan="7" style='text-align:center'><img src="Images/brequest.png" height="90px" /></td></tr>

									<tr><td>&nbsp;</td><td>&nbsp;</td></tr>   
									<tr style="background-color:bisque;text-align:center"  class="bold">            
										   
										   <td >Name</td>
										   <td >Gender</td>
										  
										 
										   <td >Mobile No</td>
										   <td >Email</td>
										   <td >Till Required Date</td>
											<td >patient type</td>
										   <td >Blood Grououp</td>
										   
									
									 </tr>          



								<?php

									
									$cn=mysqli_connect("localhost","root","","bloodbank");
									$s="select * from requestes,bloodgroup where requestes.bgroup=bloodgroup.bg_id";
									$result=mysqli_query($cn,$s);
									$r=mysqli_num_rows($result);
									//echo $r;
									if($r){

									}
									while($data=mysqli_fetch_array($result))
									{
												echo"<tr style='text-align:center'>
												<td  >$data[1]</td>
												<td  >$data[2]</td>
												<td >$data[4]</td>
												<td >$data[5]</td>
												<td  >$data[7]</td>
												<td  >$data[8]</td>
												<td  >$data[10]</td>
												</tr>";
											}
											mysqli_close($cn);
								?>
								
								 
									
									
								

						</table>
			</form>
	</div>
          
   
		<div class="ftr-bg">
		<div class="wrap">
		 <?php include 'inc/footer.php';?>
		</div>
		</div>




			
			
	
</body>
</html>