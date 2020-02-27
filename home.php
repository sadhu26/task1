<?php
include('connection.php');
	$con=$dbConn;
	session_start();
	$uname=$_SESSION['current_user'];
	$email=$_SESSION['email_id'];
?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="Upload_images.php">Upload Images</a></li>
  <li><a href="explore.php">Explore</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="hero" style="height:620px;">
<center><br><br><b><font size="18">Welcome <?php echo $uname;?>!</center></b><br><br>
</div>
</body>
</html>