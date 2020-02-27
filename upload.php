<?php
	include('connection.php');
	$con=$dbConn;
	session_start();
	$email=$_POST['email'];
	$uname=$_SESSION['current_user'];
	$img_name=$_FILES["image"]["name"];
	$imgtmp=addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$query=mysqli_query($con,"select * from user where email='{$email}'") or die(mysqli_error($con));
	$q=mysqli_fetch_array($query);
	$res=mysqli_affected_rows($con);
		if($res>0)
		{
		  $id=$q['id'];
		  $query= mysqli_query($con,"insert into image(user_id,img_name,imgtmp) values('{$id}','{$img_name}','{$imgtmp}')") or die(mysqli_error($con));
		  echo '<script type="text/javascript">';
		  echo 'window.alert("Image uploaded successfully!");';
		  echo 'window.location.href="home.php";';
		  echo '</script>';
	    }
		else
		{
		  echo '<script type="text/javascript">';
		  echo 'window.alert("Cannot upload file!");';
		  echo 'window.location.href="home.php";';
		  echo '</script>';
		}
?>

		  
