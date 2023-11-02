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
<div style="height:300px; width:800px; margin:auto; margin-top:50px; margin-bottom:50px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
     <form method="post" enctype="multipart/form-data">
  <table cellspacing="0" cellpadding="0" width="800px" style="margin:auto" class="tableborder" >
        
        <tr><td colspan="4" align="center"><img src="Images/viewdonation.png" height="80px" /> </td></tr>
        <tr><td colspan="4">&nbsp;</td></tr>
   
             <tr style="background-color:bisque" align="center" class="bold">     
           <td>Camp Name</td><td>Date of Donation</td><td>No. of Units</td><td>Email Id</td>
        </tr>
          <tr><td colspan="4">&nbsp;</td></tr>
    <?php

	
$cn=mysqli_connect("localhost","root","","bloodbank");
$s="select * from camp,donation where camp.camp_id=donation.camp_id and donation.email='" . $_SESSION["email"] . "'";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
				echo"<tr><td  style=' padding-left:50px'>$data[1]</td><td  style=' padding-left:50px'>$data[9]</td><td  style=' padding-left:40px'>$data[10]</td><td  style=' padding-left:30px'>$data[12]</td></tr>";
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