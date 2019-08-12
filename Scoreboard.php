<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
tr{
	text-align: center;
}
</style>
</head>
<body>

	<h1 style="margin-left: 100px;">Leaderboard</h1>
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

$query = "SELECT s.name as name,sc.score as score from Student s,ScoreTable sc where  s.id=sc.id";

$query_run = mysqli_query($conn,$query);

$query_num_rows = mysqli_num_rows($query_run);

if($query_num_rows==0)
{
	echo "No results found";
}

else
{
	echo "<table style='margin-left:100px; margin-top:-60px; width:230px; '><tr><th>Name</th><th>Score</th></tr>";
    
	while($query_row = mysqli_fetch_assoc($query_run))
	{
		$name = $query_row['name'];
		$score = $query_row['score'];
		echo "<tr><td>".$name."</td><td>".$score."</td><br>";
	}
	echo "</table>";
}

?>
</body>
</html>