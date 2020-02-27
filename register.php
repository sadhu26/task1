<?php
		include('connection.php');
		$con=$dbConn;
		session_start();
		$uname=$_POST['uname'];
		$email=$_POST['email'];
		$pwd=$_POST['pwd'];
		$pwd1=$_POST['pwd1'];
		$query=mysqli_query($con,"select * from user where email='{$email}'") or die('error occured');
		$user_name=mysqli_fetch_array($query);
		$res=mysqli_affected_rows($con);
		if($res>0){
			echo '<script type="text/javascript">';
			echo 'window.alert("Already Registered User! Go to log In");';
			echo 'window.location.href = "index.html";';
			echo '</script>';
		}
		else{
			if($pwd==$pwd1)
			{
			$query=mysqli_query($con,"insert into user(uname,email,pwd) values('{$uname}','{$email}','{$pwd}')") or die('error in query');
			echo '<script type="text/javascript">';
			echo 'window.alert("Registeration successfull!");';
			echo 'window.location.href = "index.html";';
			echo '</script>';
			}
			else
			{
			    echo '<script type="text/javascript">';
			echo 'window.alert("Password does not match. Please try again!");';
			echo 'window.location.href = "index.html";';
			echo '</script>';
			}
			}
mysqli_close($con);
?>