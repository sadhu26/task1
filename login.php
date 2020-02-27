<?php
		include('connection.php');
		$con=$dbConn;
		session_start();
		$email=$_POST['email'];
		$pwd=$_POST['pwd'];
		$query=mysqli_query($con,"select * from user where email='{$email}'and pwd='{$pwd}'") or die(mysqli_error($con));
		$user_name=mysqli_fetch_array($query);
		$bool=mysqli_affected_rows($con);
		if($bool>0){
			$_SESSION["current_user"]=$user_name['uname'];
			$_SESSION["email_id"]=$user_name['email'];
			header("location:home.php");
		}
		else
		{
			echo '<script type = "text/javascript">';
			echo 'window.alert("Email or password incorrect. Try again!");';
			echo 'window.location.href="index.html";';
			echo '</script>';
		
		}
		
mysqli_close($con);
?>