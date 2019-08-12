
<?php
//session_start();
//$_SESSION['id']=id;
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

if(isset($_POST['txt']) && isset($_POST['option1']) && isset($_POST['option2']) && isset($_POST['option3']) && isset($_POST['option4']) && isset($_POST['answer']) )
{
	$que = $_POST['txt'];
	$op1 = $_POST['option1'];
	$op2 = $_POST['option2'];
	$op3 = $_POST['option3'];
	$op4 = $_POST['option4'];
	$ans = $_POST['answer'];
	//$var = $_SESSION['id'];

	$query = "INSERT INTO `question`(`que`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`) VALUES ('".$que."','".$op1."','".$op2."','".$op3."','".$op4."','".$ans."')";
	mysqli_query($conn,$query);
	mysqli_close($conn);
	header('Location: createQuiz.html');
	exit;
}
 
?>

