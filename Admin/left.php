<?php if(!isset($_SESSION)) {session_start();}  ?>
<?php include 'inc/header.php';?>
<body>

 
   <div style="width:1000px; height:700px; box-shadow:-10px 10px 5px #CCC">
      
      <div style="width:380px;float:left;background:#dfe6e9; height:700px">
			<table style="width:100%; height:600px">
				<tr class="adminwelcome"><td >Welcome To Admin</td></tr>
				<br />
				
					<?php if($_SESSION["usertype"]=="Admin")
					{?>
				
				<tr><td class="lefttd"><a href="adduser.php" >Add User</a></td></tr>
				<tr><td class="lefttd"><a href="upuser.php">Update User</a></td></tr>
				<tr><td class="lefttd"><a href="deluser.php">Delete User</a></td></tr>

				  <?php }?>

				<tr><td class="lefttd"><a href="addcity.php">Add City</a></td></tr>
				
				<?php if($_SESSION["usertype"]=="Admin")
				{?>
			
				<tr><td class="lefttd"><a href="updatecity.php">Update City</a></td></tr>
				<tr><td class="lefttd"><a href="deletecity.php">Delete City</a></td></tr>

				<?php }?>

				

				
				<tr><td class="lefttd"><a href="addcamp.php">Add Camp</a></td></tr>
				<?php if($_SESSION["usertype"]=="Admin")
				{?>

				
				<tr><td class="lefttd"><a href="updatecamp.php">Update Camp</a></td></tr>
				<tr><td class="lefttd"><a href="deletecamp.php">Delete Camp</a></td></tr>

				
				<?php }?>

				<tr><td class="lefttd"><a href="addbloodgroup.php">Add Blood Group</a></td></tr>

				<?php if($_SESSION["usertype"]=="Admin")
				{?>

				<tr><td class="lefttd"><a href="upbloodgroup.php">Update Blood Group</a></td></tr>
				<tr><td class="lefttd"><a href="deletebloodgroup.php">Delete Blood Group</a></td></tr>

				<?php }?>

				<tr><td class="lefttd"><a href="addgallery.php">Add Gallery</a></td></tr>

				<?php if($_SESSION["usertype"]=="Admin")
				{?>

				<tr><td class="lefttd"><a href="deletegallery.php">Delete Gallery</a></td></tr>

				<?php }?>

				<tr><td class="lefttd"><a href="addnews.php">Add News</a></td></tr>
				
				<?php if($_SESSION["usertype"]=="Admin")
				{?>

				<tr><td class="lefttd"><a href="deletenews.php">Delete News</a></td></tr>

				<?php }?>

				<!--<tr><td class="lefttd"><a href="addadvertise.php">Add Advertisement</a></td></tr>

				<?php if($_SESSION["usertype"]=="Admin")
				{?>

				<tr><td class="lefttd"><a href="deleteadver.php">Delete Advertisement</a></td></tr>

				<?php }?>-->

				<tr><td class="lefttd"><a href="viewcity.php">View City</a></td></tr>
			
				<!--<tr><td class="lefttd"><a href="viewadver.php">View Advertusement</a></td></tr>-->
				<tr><td class="lefttd"><a href="viewnews.php">View News</a></td></tr>

				<tr><td class="lefttd"><a href="viewbloodgroup.php">View Blood Group</a></td></tr>
				<tr><td class="lefttd"><a href="viewcamp.php">View camps</a></td></tr>

			</table>
    </div>

  </div>

</body>
</html>