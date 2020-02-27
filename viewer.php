<?php
	include('connection.php');
	$con=$dbConn;
	session_start();
	$id=$_GET['id'];
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>360&deg; Image</title>
    <meta name="description" content="360&deg; Image - A-Frame">
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
<style>
.right {
	
	margin-right:-100px;
}
</style>
  </head>
  <body>
    <?php 
	$q=mysqli_query($con,"select * from image where id='{$id}'") or die('error in query');
	$imgdata=mysqli_fetch_array($q);
	$sql = "UPDATE image set views = views+1 where id ='{$id}'";
    $result=mysqli_query($con,$sql);
	//echo '<img style="visibility:hidden; margin-top:-200px;"id="pic" src="data:image/jpeg;base64,'.base64_encode( $imgdata['imgtmp']).'"/>';
    echo '<a class="right"href="explore.php">&#10006;</a>
	<a-scene embedded>
	<a-assets> 
	<img id="pic" src="data:image/jpeg;base64,'.base64_encode( $imgdata['imgtmp']).'"/>
	</a-assets>
      <a-sky src="#pic" style="width:50px;height:60px;"rotation="0 -45 0"></a-sky>
    </a-scene>';
	?>
  </body>
</html>
