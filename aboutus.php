<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood bank Management System</title>
<link href="css/lightbox.css" rel="stylesheet" />
  <link href="css/custom.css" rel="stylesheet" type="text/css" />

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--slider-->
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
     <script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.min.js"></script>
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/jquery.flexslider.js" type="text/javascript"></script>
  
 <script type="text/javascript">
     $(function () {
         SyntaxHighlighter.all();
     });
     $(window).load(function () {
         $('.flexslider').flexslider({
             animation: "slide",
             animationLoop: false,
             itemWidth: 210,
             itemMargin: 5,
             minItems: 2,
             maxItems: 4,
             start: function (slider) {
                 $('body').removeClass('loading');
             }
         });
     });
  </script>
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
  
   
<div style="height:500px;">
     <form method="post" enctype="multipart/form-data">
<div class="s_bg">
<div class="wrap">
<div class="cont_main">
	<div class="content">
		<img src="Images/about.png" height="70px"  />
		
			<h4><span class="bold">News Letter from the Founders</span></h4>
			
			  <p><img src="Images/123.jpg" height="200px" style="margin-bottom:40px" /></a>
			 LifeStream Services aims to provide a reliable platform to connect plocal blood donors with patients. Conventionally, when a patient needs blood, they have to contact a blood bank or a compatible blood group of a donor in their circle, family, and friends. However, it is difficult to find suitable donor within a limited group of people in a given time. In addition, there is no guarantee that blood banks will have compatible blood group in stock.</p>
			 
			 <p class="top">
			 Donors can be individuals and blood banks. Donor users can register to the application to receive notification about blood donation requests when their blood type is required for an admitted patient to a clinic. In the online registration, users need to provide information about their blood type and address. Once the user login, he would be able to see the latest blood donation requests in their city/region using the View request option and see details about the donor profile in order to request for blood.
			 </p>
			 
			<p class="top">When a patient needs a blood, the clinic where he/she is addmitted would request registered volunteers in the same or nearby city/state to donate using the “Send Request” of the app. Using the history, Recipients can know how many requests they requested and how many donations made and analyze the data for further research. </p>
		<p class="top">Thank you and Happy blood donating!</p>	
        <p class="top"> LifeStream Services</p>
        <p>Tahmina Tanzin Sunni</p>
        <p>Safwana Nasir Nijhum</p>
        <p class="top"> </p>
        <p> </p>
       
	</div>
	<div class="sidebar">
			<div>  
<br /><br /><br /><br /><br />
			       <div>
                       <img src="Images/doc.png" width="250px" height="200px" class="tableborder" />
						<br /><br />
                            <img src="Images/camp1.png" width="250px" height="500px" class="tableborder" />
                            
				  </div>
				 
					 <div class="clear"></div>	
				</div>	
	</div>
	
</div>
</div>
		
</form>
</div>

       
        <div class="clear"></div>
<div class="ftr-bg">
<div class="wrap">
 <?php include 'inc/footer.php';?>
</div>
</div>
		
	
</div>


<?php
if(isset($_POST["sbmt"])) 
{
	
	$cn=makeconnection();			

			$s="insert into contacts(name,email,mobile,subj) values('" . $_POST["t1"] ."','" . $_POST["t2"] . "','" . $_POST["t3"] . "','" . $_POST["t4"]   ."')";
			
			
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