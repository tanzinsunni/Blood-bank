<?php if(!isset($_SESSION)) {session_start();}  ?>

<?php include 'header.php';?>

<body>

<?php

if($_SESSION['donorstatus']=="")
{
	header("location:../login.php");
}
?>
<?php include('function.php'); ?>

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
	<ul class="nav">
			<li class="active"><a href="chngpwd.php">Change Password</a></li>	
			<li><a href="updateprofile.php">Update Profile</a></li>            
			<li><a href="blooddonated.php">Blood Donated</a></li>
            <li><a href="viewdonations.php">View Donations</a></li>
            <li><a href="viewrequest.php">View Requestes</a></li>
            <li><a href="logout.php">log Out</a></li>
           
            </ul>
	</div>
<div style="height:300px; width:1000px; margin:auto; margin-top:50px; margin-bottom:50px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
				<form method="post" enctype="multipart/form-data">
						 <table cellpadding="20" cellspacing="20" width="1000px" height="200px"  style="margin:auto" >

									<tr><td colspan="7" align="center"><img src="Images/brequest.png" height="90px" /></td></tr>

									<tr><td>&nbsp;</td><td>&nbsp;</td></tr>   
									<tr style="background-color:bisque" align="center" class="bold">            
										   
										   <td align="center">Name</td>
										   <td align="center">Gender</td>
										  
										 
										   <td align="center">Mobile No</td><td align="center">Email</td>
										   <td align="center">Till Required Date</td>
											<td align="center">patient type</td>
										   <td align="center">Blood Grououp</td>
										   
									
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
												echo"<tr><td  style=' padding-left:10px'>$data[1]</td><td  style=' padding-left:20px'>$data[2]</td><td  style=' padding-left:50px'>$data[4]</td><td  style=' padding-left:50px'>$data[5]</td><td  style=' padding-left:60px'>$data[6]</td><td  style=' padding-left:60px'>$data[8]</td><td  style=' padding-left:60px'>$data[10]</td></tr>";
											}
											mysqli_close($cn);
								?>
								
								 
									
									
								

						</table>
			</form>
	</div>
          
        <div class="clear"></div>
<div class="ftr-bg">
<div class="wrap">
 <?php include 'footer.php';?>
</div>
</div>




			
			
	
</body>
</html>