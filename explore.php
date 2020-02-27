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
  <li><a href="Upload_images.php">Upload Images</a></li>
  <li><a href="explore.php">Explore</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="hero"style="height:2000px;">
	
<b><center><font size="6">Click the thumbnail for full view</font></b>
<br><br><br><table align ="center" width="280px">


<?php 
	$q=mysqli_query($con,"select * from image") or die('error in query');
	$imgdata=mysqli_fetch_array($q);
	$bool=mysqli_affected_rows($con);
	if($bool>0)
	{
		while($r=mysqli_fetch_array($q))
		{
			$id=$r['user_id'];
			$img_id=$r['id'];
			echo '<tr><td colspan="2"><a href="viewer.php?id='.$r['id'].'"> 
			<img style="height:100px;"src="data:image/jpeg;base64,'.base64_encode( $r['imgtmp']).'"/></a><br>
			&#128065;Views&nbsp;'.$r["views"].'
			</td><td></td>';
			$q1=mysqli_query($con,'select * from user where id="'.$id.'"') or die('error in query');
			while($row=mysqli_fetch_array($q1))
				{
					echo '<td><font size="4">&ensp;Uploaded by <br>&ensp;'.$row['uname'].'</td></tr>';
				}

			
			echo '<tr><td><form method="post" action="upvote.php">
			<input type="hidden" name="id" value="'.$img_id.'" autocomplete="off"/>
			<button type="submit" name="upvote">&#128077;&#127995;</button>&nbsp'.$r["upvotes"].'</form><br></td>';
			echo '<td><form method="post" action="downvote.php">
			<input type="hidden" name="id" value="'.$img_id.'" autocomplete="off"/>
			<button type="submit" name="downvote">&#128078;&#127995;</button>&nbsp;'.$r["downvotes"].'</form><br></td></tr>';
			
			
		}	
	}
?>
</table>
</center>
</div>
</body>
</html>;