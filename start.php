<?php

session_start();
$_SESSION['qno']=-1;

$_SESSION['correct']=0;

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
//echo "Connected successfully";

$query = "SELECT * from `question`";

$query_run = mysqli_query($conn,$query);

$query_num_rows = mysqli_num_rows($query_run);

$_SESSION['rows'] = $query_num_rows;

//echo $_SESSION['rows'];
$_SESSION['countdown'] = 180;
    //Store the timestamp of when the countdown began.
$_SESSION['time_started'] = time();

$array=array();
while($row= mysqli_fetch_assoc($query_run))
{	
	$array[]=$row;
}
shuffle($array);

$_SESSION['que']=$array;



?>

<!DOCTYPE html>
<html>
<head>
	<head>
	<title>Student Home Page</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
	<style type="text/css">
		.card{
			margin: 0 auto;
			margin-top: 100px;
			border-radius: 25px;
		}
		.img
		{
			border-radius: 50%;
		}
	</style>	
</head>
</head>
<body>
	<div class="card bg-primary text-center" style="width:60rem; height:37rem">
		  <img class="card-img-top" src="readyforquiz.jpg" style="width: 300px; height: 45%; margin-top:20px; margin-bottom: 30px">
		  <div class="card-body">
    			<p class="card-text"><h4>Duration : 3 Min &nbsp;&nbsp;&nbsp;&nbsp; Max Score: 8<br><br> Total Questions: 8</h4><br>
		  <div class="card-footer">
		    <a href="startQuiz.php" class="btn btn-primary">Click to start</a>
		  </div>
	</div>
</body>
</html>
