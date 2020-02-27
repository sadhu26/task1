<?php
	include('connection.php');
	$con=$dbConn;
	session_start();
    $uname=$_SESSION['current_user'];
	$email=$_SESSION['email_id'];
	?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="#">Upload Images</a></li>
  <li><a href="explore.php">Explore</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="hero">	
<br><br><center><b>
<font size="6">Click below to upload your images for 360 degree view (Insert panorama image).<br><br>
		
		<form id="upload_img" method="post" action="upload.php" enctype="multipart/form-data">
		<input type="file" name="image" class="form-control" required="required" onchange="return ValidateFileUpload()" id="choose_file"><br><br>
		<input type="hidden" name="email" value="<?php echo $email;?>">
		<input type="submit" class="submit-btn" value="Upload image">
		</form>
	</div>
		<script>
		var x= document.getElementById("upload_img");
		var y= document.getElementById("explore");
		var z= document.getElementById("btn");
		
		function uplaod_img(){
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0px";
		}
		function explore(){
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";
		}
			
		</script>
</body>
</html>