<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood bank Management System</title>
<link href="css/lightbox.css" rel="stylesheet" />

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
  
  <style>
     
    .header_form{
		 height:530px; width:700px; margin:auto; margin-top:10px; margin-bottom:10px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;
	 }
	 .header_form h1{
		 text-align:center;
		 font-size:30px;
		 margin-top:20px;
	 }
     .form{
		 margin:100px 150px;
	 }
	 .form input{
	      width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  box-sizing: border-box;
	 }
	 .form input[type=submit]{
	     border:0px; 
		 background:linear-gradient(#900,#D50000); 
		 width:300px; 
		 height:50px; 
		 border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black;
		 color:white; 
		 font-weight:bold; 
		 font-size:14px; 
		 text-shadow:1px 1px 6px black; 
		
		 
	 }
  
  </style>
  
</head>

<body>
<?php include('function.php'); ?>
	 <div class="h_bg">
		<div class="wrap">
			<div class="header">
				<div class="logo">
					<h1><a href="#"><img src="Images/logo.png" alt=""></a></h1>
				</div>
			</div>
		</div>
     </div>
	 
<div class="nav_bg">
	<div class="wrap">
			<?php require('inc/header.php');?>
	</div>


    
   
            
   
                  


					
					

				


<div class="header_form">
 <h1>Registration Here</h1>
    
	          <?php
				$cn=makeconnection();



				?>


				<?php
				$cn=makeconnection();
				if(isset($_POST["sbmt"])) 
				{
				   $username= $_POST["username"];
				   $password= $_POST["pwd"];
				   $s="insert into users(username,pwd,typeofuser) values('$username','$password','')";
				   mysqli_query($cn,$s);
				   mysqli_close($cn);
				   if($s){
					   echo "<span style='color:green;'>Registration success</span>";
				   }else{
					  echo "<span style='color:green;'>Registration not success</span>";
				   }
							
				   
				   

				}

				?> 
	
	
     <form action="" method="post" enctype="multipart/form-data">
		
         <div class="form">
		   
		    <label>User Name:<input type="text" name="username"  required/><br></label>

			<label>Password:<input type="password" name="pwd"  required="required" pattern="[a-zA-Z0-9]{8,100}" title="please enter only character or numbers between 2 to 10 for password" /><label> <br>
			<label><input type="submit" value="submit" name="sbmt" /><br>
			<label>Registration complete?</td><td ><a href="adminlogin.php" style="color:#C30">Click here</a> to Login</label>.
			
		 </div>
			
	     
     </form>
</div>
          
        <div class="clear"></div>
<div class="ftr-bg">
	<div class="wrap">

	</div>
</div>

<?php include('bottom.php'); ?>
</body>
</html>