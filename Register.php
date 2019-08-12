<?php

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
echo "Connected successfully";

if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role']))
{
	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$psw = $_POST['password'];
	$role = $_POST['role'];
	if($role=="Student")
	{
		$query = "INSERT INTO `Student`(`name`, `username`, `email`, `password`) VALUES ('".$name."','".$username."','".$email."','".$psw."')";
		mysqli_query($conn,$query);
		mysqli_close($conn);
	}
	if($role=="Teacher")
	{
		$query = "INSERT INTO `Teacher`(`name`, `username`, `email`, `password`) VALUES ('".$name."','".$username."','".$email."','".$psw."')";
		mysqli_query($conn,$query);
		mysqli_close($conn);
	}

	header('Location: Login.html');
}
?>
