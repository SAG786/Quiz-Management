<?php
if(isset($_POST['user_name']))
{
	session_start();
	$_SESSION['name']=$_POST['user_name'];
	header("location: profile.php");
}
?>
<html>
	<head>
		<title>Session Handling in PHP - CodeforGeek Demo's</title>
		</head>
		<body>
			<h2>Session handling in PHP</h2>
			<h3>To use the demo do following</h3>
			<ul>
				<li>Type in your name and log in</li>
				<li>See your profile with your name</li>
				<li>Log out to destroy session</li>
			</ul>
			<form action="" method="post" id="main_form">
				<input type="text" name="user_name" size="40" placeholder="Type in your name"><br />
				<input type="submit" value="Log in">				
			</form><br><br>
			<span>Tutorial link : </span>
		</body>
</html>
