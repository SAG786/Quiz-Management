<?php
	session_start();
	if(!isset($_SESSION['name']))
	{
		header("location: index.php");
	}
	$name=$_SESSION['name'];
?>
<html>
<head>
<title>Profile of <?php echo $name;?></title>
</head>
<h1>Hello <?php echo $name;?></h1>
<h3><a href="logout.php">Click here to log out</a></h3>
</html>
