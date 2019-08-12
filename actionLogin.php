<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname="quiz";

// Create connection
$conn = new mysqli($servername,$username,$password,$dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

if(isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$psw = $_POST['password'];
	$query_num_rows=0;
	$query = "SELECT * FROM `Student` WHERE username = '".$username."' and password='".$psw."'";
	if($query_run = mysqli_query($conn,$query))
	{
		$query_num_rows = mysqli_num_rows($query_run);
	}
	if($query_num_rows==1)
	{
		try
		{
			$row = mysqli_fetch_assoc($query_run);
		}
		catch(Exception $e)
		{
				echo $e;
		}
		$user_id =$row['id'];
		$_SESSION['id']=$user_id;
		header('Location: Student.html');
	}
	$query = "SELECT * from `Teacher` where username = '".$username."' and password='".$psw."'";
	if($query_run = mysqli_query($conn,$query))
	{
		$query_num_rows = mysqli_num_rows($query_run);
	}
	if($query_num_rows==1)
	{
		try
		{
			$row = mysqli_fetch_assoc($query_run);
		}
		catch(Exception $e)
		{
				echo $e;
		}
		$user_id =$row['id'];
		$_SESSION['id']=$user_id;
		header('Location: Teacher.html');
	}
	else
	{
		echo "Invalid userID and password combination";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="Login.html">Try Again</a>
</body>
</html>