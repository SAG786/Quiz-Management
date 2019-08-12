<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname="quiz";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$score = $_SESSION['correct'];
$id = $_SESSION['id'];
$query = "INSERT INTO `ScoreTable`(`id`, `score`) VALUES ('".$id."','".$score."')";
mysqli_query($conn,$query);

session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.text
		{
			text-align: center;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="text">
		<h2>Your final score is:<?php echo $score ?></h2>
		<a href="Login.html">Back to login page</a>
	</div>
</body>
</html>