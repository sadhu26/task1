<?php
	include('connection.php');
	$con=$dbConn;
	session_start();
	$id=$_POST['id'];
	$sql = "UPDATE image set downvotes = downvotes+1 where id ='{$id}'";
    $result=mysqli_query($con,$sql);                           
    if($sql){
		header("location:explore.php");
	}
	?>